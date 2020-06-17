<?php
/** PHPExcel root directory */
if (!defined('PHPEXCEL_ROOT')) {
    define('PHPEXCEL_ROOT', dirname(__FILE__) . '/');
    require(PHPEXCEL_ROOT . 'PHPExcel/Autoloader.php');
}

class PHPExcelReader{
	
	public $reader;
	
	public function read($fileUrl){
		if(empty($reader)){
			require_once 'PHPExcel/IOFactory.php';
			$reader = true;
		}
		$objPHPExcel = PHPExcel_IOFactory::load($fileUrl);
		$sheets = $objPHPExcel->getWorksheetIterator();
		$sheetRes = array();
		
		$i = 0;
		foreach($sheets as $sheet){
			$sheetRes[$i]['title'] = $sheet->getTitle();
			$rows = $sheet->getRowIterator();
			foreach($rows as $row){
				$cellIterator = $row->getCellIterator();
				$cellIterator->setIterateOnlyExistingCells( false);
				$cells = array();
				foreach ($cellIterator as $cell){
					$cells[] = $cell->getCalculatedValue();
            	}
            	$sheetRes[$i]['data'][]  = $cells;
			}
			$i++;
		}
		return $sheetRes;
	}
}
