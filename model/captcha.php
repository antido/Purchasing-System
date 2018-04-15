<?php
	session_start();
	$code = rand(1000, 100000);
	$_SESSION['code'] = $code;
	$im = imagecreatetruecolor(175, 50);
	$bg = imagecolorallocate($im, 22, 86, 165);
	$fg = imagecolorallocate($im, 255, 255, 255);
	imagefill($im, 0, 0, $bg);
	imagestring($im, 10, 75, 15, $code, $fg);
	header('Cache-Control: no-cache, must-revalidate');
	header('Content-type: iamge/png');
	imagepng($im);
	imagedestroy($im);
?>