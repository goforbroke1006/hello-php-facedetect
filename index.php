<?php
/**
 * Created by PhpStorm.
 * User: goforbroke
 * Date: 19.04.17
 * Time: 3:34
 */

$signaturesDir = '/usr/local/share/OpenCV/haarcascades';

$filename = __DIR__ . '/party.jpg';
echo $filename . '<br/>';

$signature = $signaturesDir . '/haarcascade_frontalface_alt.xml';

echo '<pre>';
print_r(face_count($filename, $signature));
echo '</pre>';

$detectionData = face_detect($filename, $signature);
echo '<pre>';
print_r($detectionData);
echo '</pre>';

$imageRes = imagecreatefromjpeg($filename);
foreach ($detectionData as $detection) {
    $x = $detection['x'];
    $y = $detection['y'];
    imagerectangle($imageRes, $x, $y, $x + $detection['w'], $y + $detection['h'], 0);
}

ob_start();
{
    imagejpeg($imageRes);
    $contents = ob_get_contents();
}
ob_end_clean();

$dataUri = "data:image/jpeg;base64," . base64_encode($contents);
?>

<img src="<?php echo $dataUri; ?>"/>
