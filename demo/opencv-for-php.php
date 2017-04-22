<?php
/**
 * Created by PhpStorm.
 * User: goforbroke
 * Date: 19.04.17
 * Time: 3:34
 */

require_once __DIR__ . '/../openvc-for-php.ext.lib.php';

use OpenCV\Image as Image;
use OpenCV\Histogram as Histogram;

//$i = Image::load(__DIR__ . '/../sample/party.jpg', Image::LOAD_IMAGE_COLOR);
$i = Image::load(__DIR__ . '/../sample/party_grayscale.jpg', Image::LOAD_IMAGE_GRAYSCALE);
$i->save(__DIR__ . '/../output/party_grayscale.jpg');

$dst = $i->sobel(1, 0, 1);
$dst->save(__DIR__ . '/../output/test_sobel.jpg');

$dst2 = $i->canny(10, 50, 3);
$dst2->save(__DIR__ . '/../output/test_canny.jpg');

?>

<img src="/output/party_grayscale.jpg" height="800"/><br/>
<img src="/output/test_sobel.jpg" height="800"/><br/>
<img src="/output/test_canny.jpg" height="800"/><br/>

<?php

/* Load the sample image */
$i = Image::load(__DIR__ . '/../output/test_sobel.jpg', Image::LOAD_IMAGE_COLOR);
$hsv = $i->convertColor(Image::RGB2HSV);
$planes = $hsv->split();
$hist = new Histogram(1, 32, CV_HIST_ARRAY);
$hist->calc($planes[0]);

/* Load the target image */
$i2 = Image::load(__DIR__ . '/../output/test_sobel.jpg', Image::LOAD_IMAGE_COLOR);
$hsv2 = $i2->convertColor(Image::RGB2HSV);
$planes2 = $hsv2->split();
$result = $planes2[0]->backProject($hist);

/* Dilate the image to make the objects more obvious */
$result = $result->dilate(2);
$result->save(__DIR__ . '/../output/back_project_output.jpg');
?>

<img src="/output/back_project_output.jpg"/><br/>

<?php
$i = Image::load(__DIR__ . '/../sample/party.jpg', Image::LOAD_IMAGE_GRAYSCALE);
//$i = Image::load(__DIR__ . '/../sample/party.jpg', Image::LOAD_IMAGE_COLOR);
$signaturesDir = '/usr/local/share/OpenCV/haarcascades';
$result = $i->haarDetectObjects($signaturesDir . "/haarcascade_frontalface_default.xml");
foreach ($result as $r) {
    $i->rectangle($r['x'], $r['y'], $r['width'], $r['height']);
}
$i->save(__DIR__ . '/../output/haar_output.jpg');
?>

<img src="/output/haar_output.jpg"/>
