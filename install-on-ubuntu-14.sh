#!/usr/bin/env bash

### ========== Install libs which required for OpenCV ==========

sudo add-apt-repository ppa:mc3man/trusty-media
sudo apt-get update
#sudo apt-get dist-upgrade
sudo apt-get install -y ffmpeg
sudo apt-get install -y \
    libopencv-dev build-essential checkinstall cmake pkg-config yasm \
    libtiff4-dev libjpeg-dev libjasper-dev libavcodec-dev libavformat-dev \
    libswscale-dev libdc1394-22-dev libxine-dev libgstreamer0.10-dev \
    libgstreamer-plugins-base0.10-dev libv4l-dev python-dev python-numpy \
    libtbb-dev libqt4-dev libgtk2.0-dev libfaac-dev libmp3lame-dev \
    libopencore-amrnb-dev libopencore-amrwb-dev libtheora-dev libvorbis-dev \
    libxvidcore-dev x264 v4l-utils


### ========== Compile OpenCV from sources ==========

cd ~
rm -rf opencv
git clone https://github.com/opencv/opencv.git ./opencv && cd opencv && git checkout tags/2.4.9
mkdir release && cd release
cmake -Wno-dev \
    -D CMAKE_BUILD_TYPE=RELEASE -D CMAKE_INSTALL_PREFIX=/usr/local \
    -D WITH_TBB=ON -D BUILD_NEW_PYTHON_SUPPORT=ON -D WITH_V4L=ON \
    -D INSTALL_C_EXAMPLES=ON -D INSTALL_PYTHON_EXAMPLES=ON -D BUILD_EXAMPLES=ON \
    -D WITH_QT=ON -D WITH_OPENGL=ON ..
make && sudo make install
sudo ldconfig
PKG_CONFIG_PATH=$PKG_CONFIG_PATH:/usr/local/lib/pkgconfig && export PKG_CONFIG_PATH


### ========== Compile PHP-FaceDetect ==========

cd ~
rm -rf php-facedetect
mkdir php-facedetect && cd php-facedetect
git clone https://github.com/infusion/PHP-Facedetect.git ./
sudo apt-get install -y php5.6-dev
phpize && ./configure && make && sudo make install

sudo echo '/usr/lib/php/20131226/facedetect.so' >> /etc/php/5.6/cli/php.ini