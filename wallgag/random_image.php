<?php
 $images = [
 ['file' 	=> '1',
  'caption' => 'Cat'],
 ['file'	=> '2',
  'caption' => 'Earth'],
 ['file'	=> '3',
  'caption' => 'Anonymus'],
 ['file'	=> '4',
  'caption' => 'Stormtrooper'],
 ['file' 	=> '5',
  'caption' => 'Suit'],
 ['file'	=> '6',
  'caption' => 'Aliens']
 ];
 $i = rand(0, count($images)-1);
 $selectedImage = "images/{$images[$i]['file']}.jpg";
 $caption = $images[$i]['caption'];
 if (file_exists($selectedImage) && is_readable($selectedImage)) {
 	$imageSize = getimagesize($selectedImage);
 }
 ?>