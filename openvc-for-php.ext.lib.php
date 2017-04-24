<?php
/**
 * Created by PhpStorm.
 * User: goforbroke
 * Date: 22.04.17
 * Time: 14:20
 *
 * Fake classes for IDE syntax highlighting
 */

namespace OpenCV;

if (!in_array('CV_HIST_ARRAY', get_defined_constants())) {
    define('CV_HIST_ARRAY', 0);
}

if (!class_exists('OpenCV\Image')) {
    class Image
    {
        const DEPTH_8U = 8;
        const DEPTH_8S = 2147483656;
        const DEPTH_16U = 16;
        const DEPTH_16S = 2147483664;
        const DEPTH_32S = 2147483680;
        const DEPTH_32F = 32;
        const DEPTH_64F = 64;
        const LOAD_IMAGE_COLOR = 1;
        const LOAD_IMAGE_GRAYSCALE = 0;
        const LOAD_IMAGE_UNCHANGED = -1;
        const BLUR_NO_SCALE = 0;
        const BLUR = 1;
        const GAUSSIAN = 2;
        const MEDIAN = 3;
        const BILATERAL = 4;
        const INTER_NN = 0;
        const INTER_LINEAR = 1;
        const INTER_AREA = 3;
        const INTER_CUBIC = 2;
        const GAUSSIAN_5x5 = 7;
        const BGR2BGRA = 0;
        const RGB2RGBA = 0;
        const BGRA2BGR = 1;
        const RGBA2RGB = 1;
        const BGR2RGBA = 2;
        const RGB2BGRA = 2;
        const RGBA2BGR = 3;
        const BGRA2RGB = 3;
        const BGR2RGB = 4;
        const RGB2BGR = 4;
        const BGRA2RGBA = 5;
        const RGBA2BGRA = 5;
        const BGR2GRAY = 6;
        const RGB2GRAY = 7;
        const GRAY2BGR = 8;
        const GRAY2RGB = 8;
        const GRAY2BGRA = 9;
        const GRAY2RGBA = 9;
        const BGRA2GRAY = 10;
        const RGBA2GRAY = 11;
        const BGR2BGR565 = 12;
        const RGB2BGR565 = 13;
        const BGR5652BGR = 14;
        const BGR5652RGB = 15;
        const BGRA2BGR565 = 16;
        const RGBA2BGR565 = 17;
        const BGR5652BGRA = 18;
        const BGR5652RGBA = 19;
        const GRAY2BGR565 = 20;
        const BGR5652GRAY = 21;
        const BGR2BGR555 = 22;
        const RGB2BGR555 = 23;
        const BGR5552BGR = 24;
        const BGR5552RGB = 25;
        const BGRA2BGR555 = 26;
        const RGBA2BGR555 = 27;
        const BGR5552BGRA = 28;
        const BGR5552RGBA = 29;
        const GRAY2BGR555 = 30;
        const BGR5552GRAY = 31;
        const BGR2XYZ = 32;
        const RGB2XYZ = 33;
        const XYZ2BGR = 34;
        const XYZ2RGB = 35;
        const BGR2YCrCb = 36;
        const RGB2YCrCb = 37;
        const YCrCb2BGR = 38;
        const YCrCb2RGB = 39;
        const BGR2HSV = 40;
        const RGB2HSV = 41;
        const BGR2Lab = 44;
        const RGB2Lab = 45;
        const BayerBG2BGR = 46;
        const BayerGB2BGR = 47;
        const BayerRG2BGR = 48;
        const BayerGR2BGR = 49;
        const BayerBG2RGB = 48;
        const BayerGB2RGB = 49;
        const BayerRG2RGB = 46;
        const BayerGR2RGB = 47;
        const BGR2Luv = 50;
        const RGB2Luv = 51;
        const BGR2HLS = 52;
        const RGB2HLS = 53;
        const HSV2BGR = 54;
        const HSV2RGB = 55;
        const Lab2BGR = 56;
        const Lab2RGB = 57;
        const Luv2BGR = 58;
        const Luv2RGB = 59;
        const HLS2BGR = 60;
        const HLS2RGB = 61;
        const TM_SQDIFF = 0;
        const TM_SQDIFF_NORMED = 1;
        const TM_CCORR = 2;
        const TM_CCORR_NORMED = 3;
        const TM_CCOEFF = 4;
        const TM_CCOEFF_NORMED = 5;


        /**
         * @param string $filename
         * @param integer $mode
         * @return $this
         */
        public static function load($filename, $mode)
        {
            return sprintf('%s %s', $filename, $mode) ? null : null;
        }

        /**
         * @param string $filename
         */
        public function save($filename)
        {
        }

        /**
         * @param integer $mode
         * @return $this
         */
        public function convertColor($mode)
        {
            return $mode ? null : null;
        }

        /**
         * @return array|Image[]
         */
        public function split()
        {
            return array();
        }

        /**
         * @param Histogram $histogram
         * @return $this
         */
        public function backProject($histogram)
        {
            return $histogram ? null : null;
        }

        /**
         * @param integer $count
         * @return $this
         */
        public function dilate($count)
        {
            return $count ? null : null;
        }

        /**
         * @param integer $coef1
         * @param integer $coef2
         * @param integer $coef3
         * @return $this
         */
        public function sobel($coef1, $coef2, $coef3)
        {
            return ($coef1 + $coef2 + $coef3) ? null : null;
        }

        /**
         * @param integer $lowErrRate
         * @param integer $goodLocalization
         * @param integer $minimalResponse
         * @return $this
         */
        public function canny($lowErrRate, $goodLocalization, $minimalResponse)
        {
            return ($lowErrRate + $goodLocalization + $minimalResponse) ? null : null;
        }

        /**
         * @param string $haarCascadeFilename
         * @return array
         */
        public function haarDetectObjects($haarCascadeFilename)
        {
            return array($haarCascadeFilename);
        }

        /**
         * @param integer $x
         * @param integer $y
         * @param integer $w
         * @param integer $h
         */
        public function rectangle($x, $y, $w, $h)
        {
        }

        /**
         * @param Image $imgOrigin
         * @param Image $imgTemplate
         * @return $this
         */
        public function matchTemplate($imgOrigin, $imgTemplate)
        {
            return sprintf('%s %s', $imgOrigin, $imgTemplate) ? null : null;
        }
    }
}

if (!class_exists('OpenCV\Histogram')) {
    class Histogram
    {
        const TYPE_SPARSE = 1;
        const TYPE_ARRAY = 0;

        /**
         * @param $plane
         * @return $this
         */
        public function calc($plane)
        {
            return $plane ? null : null;
        }
    }
}