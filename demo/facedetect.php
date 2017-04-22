<?php
/**
 * Created by PhpStorm.
 * User: goforbroke
 * Date: 19.04.17
 * Time: 3:34
 */

if (!function_exists('face_detect')) {
    /**
     * @param string $imgFilename
     * @param string $signatureFilename
     * @return array
     */
    function face_detect($imgFilename, $signatureFilename)
    {
        trigger_error('OpenCV or PHP-facedetect does not work!');
        return array();
    }
}

/**
 * @param resource $imageRes
 * @return string
 */
function img2base64($imageRes)
{
    ob_start();
    {
        imagejpeg($imageRes);
        $contents = ob_get_contents();
    }
    ob_end_clean();
    return "data:image/jpeg;base64," . base64_encode($contents);
}

/**
 * @param string|resource $img
 * @param $signatureFilename
 * @return null|resource
 */
function markDetectedAreas($img, $signatureFilename)
{
    $imgRes = null;
    $imgFilename = null;

    if (is_resource($img)) {
        $imgFilename = sys_get_temp_dir() . '/' . md5(mktime() + rand(0, 10000000) * rand(0, 10000000) * rand(0, 10000000)) . '.jpg';
        imagejpeg($img, $imgFilename, 100);
        $imgRes = imagecreatefromjpeg($imgFilename);
    } elseif (is_string($img)) {
        $imgFilename = $img;
        $imgRes = imagecreatefromjpeg($img);
    } else {
        trigger_error('Unexpected images type!');
        die;
    }

    $detect = face_detect($imgFilename, $signatureFilename);
    foreach ($detect as $d) {
        imagerectangle($imgRes, $d['x'], $d['y'], $d['x'] + $d['w'], $d['y'] + $d['h'], 0);
    }

    return $imgRes;
}

$signaturesDir = '/usr/local/share/OpenCV/haarcascades';

$filename = __DIR__ . '/../sample/' . $_GET['img'];
$signature = $signaturesDir . '/haarcascade_frontalface_alt.xml';
$eyeSignature = $signaturesDir . '/haarcascade_eye.xml';
$lefteyeSignature = $signaturesDir . '/haarcascade_mcs_lefteye.xml';
$righteyeSignature = $signaturesDir . '/haarcascade_mcs_righteye.xml';
$noseSignature = $signaturesDir . '/haarcascade_mcs_nose.xml';
$mouthSignature = $signaturesDir . '/haarcascade_mcs_mouth.xml';
$smileSignature = $signaturesDir . '/haarcascade_smile.xml';

$detectionData = face_detect($filename, $signature);
echo 'Founded faces: ' . count($detectionData) . '<br/>';

$imageRes = imagecreatefromjpeg($filename);
?>

    <style>
        .table__head {
            width: 180px;
            display: inline-block;
        }

        .table__row > img {
            height: 180px;
        }
    </style>

    <nav>
        <a href="/">Homepage</a> |

        <a href="?img=party.jpg">Party</a>
        <a href="?img=party_grayscale.jpg">Party gray-scale</a>

        <?php for ($i = 1; $i <= 9; $i++) { ?>
            <a href="/demo/facedetect.php?img=<?php echo 'face' . $i . '.jpg' ?>">Face #<?php echo $i ?></a>
        <?php } ?>
    </nav>

    <span class="table__head">Origin</span>
    <span class="table__head">Eyes</span>
    <span class="table__head">Left eye</span>
    <span class="table__head">Right eye</span>
    <span class="table__head">Nose</span>
    <span class="table__head">Mouth</span>
    <span class="table__head">Smile</span>
    <br/>

<?php
$padding = 10; // percents
$parts = array();
foreach ($detectionData as $datum) {
    $x = $datum['x'];
    $y = $datum['y'];
    $w = $datum['w'];
    $h = $datum['h'];

    $currPaddingX = ($w / 100) * $padding;
    $currPaddingY = ($h / 100) * $padding;

    $faceImgRes = imagecreatetruecolor($w + $currPaddingX * 2, $h + $currPaddingY * 2);

    imagecopy(
        $faceImgRes, $imageRes,
        0, 0,
        $x - $currPaddingX, $y - $currPaddingY,
        $w + $currPaddingX * 2, $h + $currPaddingY * 2
    );

    ?>
    <div class="table__row">
        <img src="<?php echo img2base64($faceImgRes); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $eyeSignature)); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $lefteyeSignature)); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $righteyeSignature)); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $noseSignature)); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $mouthSignature)); ?>"/>
        <img src="<?php echo img2base64(markDetectedAreas($faceImgRes, $smileSignature)); ?>"/>
    </div>
    <?php
}
