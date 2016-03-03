<?php
namespace Admin\Controller;
use Think\Controller;
class ExcelController extends AdminController {
    public function export(){
		$table=I('table','');
		if(!$table){
			$this->error('数据表不存在');
		}
    	//合成数据表
		$sql='SHOW FULL COLUMNS FROM '.C('DB_PREFIX').$table;
		$array=M()->query($sql);
		$arr2=array();
		foreach($array as $v){
			array_push($arr2,$v['comment']);
		}
		$arr1[0]=$arr2;
		$arr2=M($table)->select();
		$data=array_merge($arr1,$arr2);

        //导入PHPExcel类库         
        import("Common.Org.PHPExcel");        
        import("Common.Org.PHPExcel.Writer.Excel5");         
        import("Common.Org.PHPExcel.IOFactory.php");         
        $filename=$table."_excel"; 
        $this->getExcel($filename,$data);    
    }  

    private function getExcel($fileName,$data){             
    //对数据进行检验            
     	if(empty($data)||!is_array($data)){                 
     		die("data must be a array");             
     	}             
		$date=date("Y_m_d",time()); 
		$fileName.="_{$date}.xls";              
		//创建PHPExcel对象，注意，不能少了\             
		$objPHPExcel=new \PHPExcel();             
		$objProps=$objPHPExcel->getProperties();  

		$column=1;             
		$objActSheet=$objPHPExcel->getActiveSheet();   
		$objPHPExcel->getActiveSheet()->getStyle()->getFont()->setName('微软雅黑');//设置字体
		$objPHPExcel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(25);//设置默认高度
		
		foreach ($data as $ke=>$row){      

			//行写入                     
			$span = ord("A");                       
			foreach($row as $keyName=>$value){			    	
				//列写入 
				$j=chr($span);
				if($value=='主键'){
					$value='序号';
				}
				$objActSheet->setCellValue($j.$column, $value);                        
				$span++;                     
			}                     
			$column++;  
		} 
		$fileName = iconv("utf-8", "gb2312", $fileName);             
		//设置活动单指数到第一个表,所以Excel打开这是第一个表             
		$objPHPExcel->setActiveSheetIndex(0);             
		header('Content-Type: application/vnd.ms-excel');             
		header("Content-Disposition: attachment;filename=\"$fileName\"");             
		header('Cache-Control: max-age=0');                
		$objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');             
		$objWriter->save('php://output'); //文件通过浏览器下载             
		exit;     
	}
}