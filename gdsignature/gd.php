<?php
/**
 ***************************************************************************
 *  Referrer Log plugin (/inc/plugins/Signature-GD.php)
 *  Author Code: DiegoPino, diegopino@gmail.com
 *  Website: http://diegopino.blogspot.com/
 *  License: Creative Commons http://creativecommons.org/licenses/by/4.0/legalcode
 *
 *  Signature GD Library: Dynamic Creation of Images Graphics Draw with Stats Forum software MyBB 
 *  Graphics Draw signaturegd
 *
 ***************************************************************************​/
 */

//hacemos el codigo MyBB
define("IN_MYBB", 1);
define("KILL_GLOBALS", 1);
define("NO_ONLINE", 1);
require "../inc/init.php";
$stats = $cache->read("stats");  
$query = mysqli_query("SELECT * FROM mybb_users");


//Inicio de la Creacion de Imagen
Header ("Content-type: image/png");

//Definimos el Template a Usar, el Default
$imagen = imagecreatefrompng('template_01.png');

// Dimensiones de la imagen: 450px x 150px
$w_im = imagesx($imagen);
$h_im = imagesy($imagen);

// Listado de Fuentes
$ttf_black = "black.ttf";

// Colores
$clr_negro = imagecolorallocate($imagen,0,0,0);
$clr_blanco = imagecolorallocate($imagen,255,255,255);
$clr_rojo = imagecolorallocate($imagen,255,60,60);
$clr_amarillo = imagecolorallocate($imagen,255,220,0);
$clr_azul = imagecolorallocate($imagen,41,93,224);


// Posición Texto de Presentacion de la Firma GD Dinamica
	$texto = "Signature GD";
	$tamano = 14;
	$fuente = $ttf_black;
//	$w_txt = imagettfbbox($tamano,0,$fuente,$texto);
	$x = 10;
	$y = 23;
	imagefilledrectangle($imagen,0,0,450,30,imagecolorallocatealpha($imagen, 1, 10, 255, 75)); //Color se Rellena con alpha
  
	$color = $clr_blanco;
// outline del Codigo
	$ol = array(-2,-1,1,2);
	foreach($ol as $val_x) {
		foreach($ol as $val_y) {
			imagettftext( $imagen, $tamano, 0, $x+$val_x, $y+$val_y, $clr_negro, $fuente, $texto );
			}
		}
	imagettftext($imagen,$tamano,0,$x,$y,$color,$fuente,$texto);
		
// Codigo para leer Stats de MyBB

imagefttext($imagen, 14, 0, 10, 50, $clr_amarillo, $ttf_black , "Forum: ". $mybb->settings['homename']);
imagefttext($imagen, 14, 0, 10, 70, $clr_azul, $ttf_black , "Username: ". $mybb->users['username']);
imagefttext($imagen, 14, 0, 10, 90, $clr_rojo, $ttf_black, "Members: ". my_number_format($stats['numusers']));
imagefttext($imagen, 14, 0, 10, 110, $clr_blanco, $ttf_black, "Posts: ". my_number_format($stats['numposts']));
imagefttext($imagen, 14, 0, 10, 130, $clr_blanco, $ttf_black, "Threads: ". my_number_format($stats['numthreads']));
imagefttext($imagen, 14, 0, 310, 90, $clr_azul, $ttf_black , "Avatar: ". $mybb->users['avatar']);
//Relleno de amarillo para el avatar	
imagefilledrectangle($imagen, 310, 90, 4000, 4000, imagecolorallocatealpha($imagen, 1, 10, 255, 75));

// Grosor para la imagen, se ve mejor
	$grosor = 7;

	$sombra = array(0,0,	$grosor-1,$grosor-1,	$grosor-1,$h_im-$grosor,	$w_im-$grosor,$h_im-$grosor,	$w_im,$h_im,	0,$h_im);

	imagefilledpolygon($imagen, $sombra, 6, imagecolorallocatealpha($imagen,0,0,0,80)); // 0-127

	$brillo = array(0,0,	$w_im,0,	$w_im,$h_im,	$w_im-$grosor,$h_im-$grosor,	$w_im-$grosor,$grosor,	$grosor,$grosor);

	imagefilledpolygon($imagen, $brillo, 6, imagecolorallocatealpha($imagen,255,255,255,60)); // 0-127

// Borde Para la Imagen
	imagerectangle($imagen,0,0,$w_im-1,$h_im-1,$clr_negro);

//Definimos la imagen
imagepng ($imagen);

//Destruimos la imagen 
imagedestroy ($imagen);


?>
