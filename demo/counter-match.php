<?php
/**
 * Created by PhpStorm.
 * User: goforbroke
 * Date: 24.04.17
 * Time: 19:29
 */

require_once __DIR__ . '/../openvc-for-php.ext.lib.php';

use OpenCV\Image as Image;
use OpenCV\Histogram as Histogram;

define('SIGNATURES_HOME', '/usr/local/share/OpenCV/haarcascades');

/**
 * @param string $filename
 * @param integer $x
 * @param integer $y
 * @param integer $w
 * @param integer $h
 * @return resource
 */
function image_get_part($filename, $x, $y, $w, $h)
{
    $imageRes = imagecreatefromjpeg($filename);
    $resultImg = imagecreatetruecolor($w, $h);
    imagecopy(
        $resultImg, $imageRes,
        0, 0,
        $x, $y,
        $w, $h
    );
    return $resultImg;
}

/**
 * @param string $origImg
 * @param string $detectImg
 * @param array $detection
 */
function save_detection_to_file($origImg, $detectImg, array $detection)
{
    $faceImg = image_get_part($origImg,
        $detection['x'], $detection['y'],
        $detection['width'], $detection['height']
    );
    imagejpeg($faceImg, $detectImg, 100);
}

// ================================================================================

$i = Image::load(__DIR__ . '/../sample/face4.jpg', Image::LOAD_IMAGE_COLOR);
$preparedImgFilename = __DIR__ . '/../output/prepared.jpg';
$i->save($preparedImgFilename);
//$result = $i->haarDetectObjects(SIGNATURES_HOME . "/haarcascade_frontalface_default.xml");
$result = $i->haarDetectObjects(SIGNATURES_HOME . "/haarcascade_frontalface_alt.xml");
if (count($result) == 0) {
    die('Face not found!');
}
$imgFilename = __DIR__ . '/../output/face.jpg';
$detection = $result[0];
save_detection_to_file($preparedImgFilename, $imgFilename,$detection);


//$faceImg = image_get_part($preparedImgFilename,
//    $detection['x'], $detection['y'],
//    $detection['width'], $detection['height']
//);
//
//imagejpeg($faceImg, $imgFilename, 100);


//$dst2 = $i->canny(40, 80, 3);
//$dst2->save(__DIR__ . '/../output/test_canny.jpg');
?>

    <!--<img src="/output/prepared.jpg" height="800"/><br/>-->
    <!--<img src="/output/test_canny.jpg" height="800"/><br/>-->
    <img src="/output/face.jpg" height="800"/><br/>


<?php
$i = Image::load(__DIR__ . '/../sample/face.jpg', Image::LOAD_IMAGE_COLOR);
$result = $i->haarDetectObjects(SIGNATURES_HOME . "/haarcascade_mcs_mouth.xml");
if (count($result) == 0) {
    die('Mouth not found!');
}