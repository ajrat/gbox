<?php


$imgpass = Array();

for ($i=1; $i <= 25; $i++) {
	$color['red'] = mt_rand(0,255);
	$color['green'] = mt_rand(0,255);
	$color['blue'] = mt_rand(0,255);
	$imgpass[$i] = $color;
}


//echo $imgpass[1]['red'];


$current = '';

header('Content-type: image/png');
$img = imagecreatetruecolor(150, 150) or die('Ошибка при создании изображения'); 
$color = imagecolorallocate($img, $imgpass[1]['red'], $imgpass[1]['green'], $imgpass[1]['blue']);

$i=1;
for ($x=0; $x <5 ; $x++) { 
	for ($y=0; $y <5 ; $y++) {
		$color = imagecolorallocate($img, $imgpass[$i]['red'], $imgpass[$i]['green'], $imgpass[$i]['blue']);
		$current .= $imgpass[$i]['red'].$imgpass[$i]['green'].$imgpass[$i]['blue'];
		
		$i++;
		ImageFilledRectangle($img, $x*30, $y*30, ($x*30)+30, ($y*30)+30, $color);
	}
}

$password = $_GET['password'];
$options = [
    'cost' => 11,
    'salt' => md5($current),
];

$cryptpass = password_hash($password, PASSWORD_BCRYPT, $options);


$file = 'application/databases/user.php';
$f_array = file($file);
$f_array[2] = '$salt="'.$cryptpass.'";'.PHP_EOL;
file_put_contents( $file, $f_array );

//file_put_contents($file, $cryptpass);
imagepng($img);
imagedestroy($img);

//ImageFilledRectangle($im, 0, 0, 25, 25, $imgpass[1]);

?>