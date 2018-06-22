<?php 
include 'a1.php';
include 'a2.php';
use OOP\A2 as A2;

//Overloading
$ob = new A2();
$ob->getName();

//Function ẩn danh
// $name = 'PHP';
// $anonumousfunction=function ($courseName) use($name)
// {
// 	echo $courseName.'<br>';
// 	echo 'This is anonymous function'.$name;
// };
// $anonumousfunction('Iviettech');

// function getFunctionName($functionName){
// 	return $functionName();
// }
// getFunctionName(function(){
// 	echo 'This is anonymous function';
// });
 ?>
