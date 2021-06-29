<?php


//redimencionar imagen
/*
img_0_big.png
img_0_small.png
img_1_big.png
img_1_small.png

img_<posición>_<tamaño>.png

$tamanhos = array(0 => array('nombre'=>'big','ancho'=>'100','alto'=>'200'),
			              1 => array('nombre'=>'small','ancho'=>'50','alto'=>'100'));
                  
                  */
				  
function redimensionar($ruta,$file_name,$uploadedfile,$posicion,$tamanhos){
	$filename = stripslashes($file_name);
 	$extension = getExtension($filename);
 	$extension = strtolower($extension);
	if (($extension != "jpg") && ($extension != "jpeg") && ($extension != "png") && ($extension != "gif")) {
 		$errors=1;
 	}else{ 
		if($extension=="jpg" || $extension=="jpeg" ){ 
			$src = imagecreatefromjpeg($uploadedfile);
		}else if($extension=="png"){ 
			$src = imagecreatefrompng($uploadedfile);
			imagealphablending($src, true);
			imagesavealpha($src, true);  
		}else{
			$src = imagecreatefromgif($uploadedfile);
		}

		list($width,$height)=getimagesize($uploadedfile);
		foreach($tamanhos as $tam){
			$newwidth = $tam['ancho'];
			$newheight=($height/$width)*$newwidth;
			
			if($newheight > $tam['alto']){
				$newheight = $tam['alto'];
				$newwidth=($width/$height)*$newheight;
				if($newwidth > $tam['ancho']){
					$nheight = $newheight;
					$nwidth = $newwidth;
					$newheight=($nheight/$nwidth)*$tam['ancho'];
				}
			}
			$tmp=imagecreatetruecolor($newwidth,$newheight);
			if($extension == "png"){
				$gris = imagecolorallocate($tmp, 234, 234, 234);
				imagefill($tmp, 0, 0, $gris);
			}
			imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);
			
			$filename = $ruta.'img_'.$posicion.'_'.$tam['nombre'].'.'.$extension;
			//$filename = $ruta.$tam['nombre'].$file_name;
			if($extension == "png"){
				imagecolortransparent($tmp,$gris);
				imagepng($tmp,$filename,9);
			}elseif($extension == 'gif'){
				imagegif($tmp,$filename,100);
			}else{
				imagejpeg($tmp,$filename,100);
			}
			imagedestroy($tmp);
		}
		imagedestroy($src);
		
	}
}

//funcion para obtener la extension
function getExtension($str) {
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

//Funcion para borrar imagenes
function eliminar_archivos($dir)
{

	if(is_dir($dir)){
		$directorio=opendir($dir); 
		while ($archivo = readdir($directorio))
		{
			if($archivo != '.' and $archivo != '..')
			{
				@unlink($dir.$archivo);
			}
		}
		closedir($directorio); 
		@rmdir($dir);
	}
}

function obtener_imagenes($ruta){
	$galeria = array();
	if(is_dir(DIR_BASE.$ruta)){
		$directorio=opendir(DIR_BASE.$ruta); 
		while ($archivo = readdir($directorio) ){
			if( $archivo != '.' and $archivo != '..' and stristr($archivo,'small') !== false){
				//img_1_small.png
				//$data = explode('_',$archivo);
				list($img,$pos,$resto) = explode('_',$archivo);
				$galeria[$pos] = URL_BASE.$ruta.$archivo;
			}
		}
		closedir($directorio); 
	}
    sort($galeria);
	return $galeria;
}

function cant_imagenes($dir){ 
	$i = 0;
	if(is_dir($dir)){
		$dh = opendir($dir);
		while (($file = readdir($dh)) !== false){
			if ($file!="." && $file!=".."){ 
				if(stristr($file,'small') !== false)
				$i++;
			}
		}
	}
	return $i;
}
?>