<?php
header('Content-Type:text/plain');
$ctr=0;
$csv='F:\xampp\htdocs\hacmo\test.csv';
function read_csv($filename)
{
  $row=array();
  foreach (file($filename,FILE_IGNORE_NEW_LINES) as $line){
    $row[]=str_getcsv($line);
  }
  return $row;
}
function write($filename,$rows)
{
  $file=fopen($filename,'w');
  foreach ($rows as $row) {
    fputcsv($file,$row);
  }
  fclose($file);
}
$fp=fopen($csv,'r');
print_r(read_csv('test.csv'));
$data=read_csv('test.csv');
$data[1][4]='Available';
write('test.csv',$data);
?>
