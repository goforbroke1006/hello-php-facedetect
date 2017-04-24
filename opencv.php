<?php

use \OpenCV\Image;

//$br = (php_sapi_name() == "cli")? "":"<br>";

//if(!extension_loaded('opencv')) {
//    dl('opencv.' . PHP_SHLIB_SUFFIX);
//}

//$module = 'opencv';
//$functions = get_extension_funcs($module);
//echo "Functions available in the test extension:$br\n";
//foreach($functions as $func) {
//    echo $func."$br\n";
//}
//echo "$br\n";
//$function = 'confirm_' . $module . '_compiled';
//if (extension_loaded($module)) {
//    $str = $function($module);
//} else {
//    $str = "Module $module is not compiled into PHP";
//}
//echo "$str\n";


//echo '<pre>';
//print_r(get_declared_classes());
//echo '</pre>';


//echo '<pre>';
//print_r(get_class_methods('OpenCV\Exception'));
//print_r(get_class_methods('OpenCV\Mat'));
//print_r(get_class_methods('OpenCV\Image'));
//print_r(get_class_methods('OpenCV\Histogram'));
//print_r(get_class_methods('OpenCV\Capture'));
//echo '</pre>';


echo '<pre>';
//print_r(get_class_methods('OpenCV\Exception'));
print_r(get_class_methods('OpenCV\Mat'));
print_r(get_class_methods('OpenCV\Image'));
//print_r(get_class_methods('OpenCV\Histogram'));
//print_r(get_class_methods('OpenCV\Capture'));
echo '</pre>';

$oClass = new ReflectionClass('OpenCV\Histogram');
echo '<pre>';
print_r($oClass->getConstants());
echo '</pre>';

echo '<pre>';
print_r(get_defined_functions());
echo '</pre>';
?>