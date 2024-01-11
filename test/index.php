<?php

use Ay4t\PHPImage\PHPImage;

require_once '../vendor/autoload.php';

$image          = __DIR__ . '/03.jpg';

$generate_filename  = new \Ay4t\PHPImage\Helper\FilenameGenerator();
$generate_filename->setStyleFilename('timestamp');
$result_name        = $generate_filename
    ->setPrefixFilename('100')
    ->generateFilename();

$destination    = __DIR__ .'/'.$result_name.'.jpg';

$phpImage = new PHPImage( $image );
$phpImage->resize(1024, 1024);
$phpImage->setQuality(75);

$save = $phpImage->save( $destination, false);
var_dump($save);
