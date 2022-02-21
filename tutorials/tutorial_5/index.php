<?php

//Excel Read
require "vendor/autoload.php";

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("excel.xlsx");
$worksheet = $spreadsheet->getActiveSheet();
foreach($worksheet->getRowIterator() as $row){
    $cellIterate = $row->getCellIterator();
    $cellIterate->setIterateOnlyExistingCells(false);

    foreach($cellIterate as $cell){
        echo $cell->getValue(); 
    }   
}

//Txt Read

$file = "text.txt";
$handler = fopen($file, 'r');
$size = filesize($file);
$data = fread($handler, $size);
fclose($handler);
echo $data;


//CSV Read

echo '<table border="1">';
$start_row = 1;
if (($csv_file = fopen("csv.csv", "r")) !== FALSE) {
    while (($read_data = fgetcsv($csv_file, 1000, ",")) !== FALSE) {
        $column_count = count($read_data);
        echo '<tr>';
        $start_row++;
        for ($c = 0; $c < $column_count; $c++) {
            echo "<td>" . $read_data[$c] . "</td>";
        }
        echo '</tr>';
    }
    fclose($csv_file);
}
echo '</table>';



//Doc Read


$phpWord = \PhpOffice\PhpWord\IOFactory::load("doc.docx");

$text = '';

$sections = $phpWord->getSections();

$section = $sections[0];
$arrays = $section->getElements();

foreach($arrays as $key => $value){
    print_r($value->getElements()[0]->getText());
}

?>





