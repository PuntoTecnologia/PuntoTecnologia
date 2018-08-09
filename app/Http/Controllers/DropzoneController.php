<?php

namespace app\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use app\image;
use DB;

class DropzoneController extends Controller
{
    public function drop()
	    {

	    	function resizeImagen1($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
			    $rutaImagenOriginal = $ruta.$nombre;
			    if($extension == 'GIF' || $extension == 'gif'){
			    $img_original = imagecreatefromgif($rutaImagenOriginal);
			    }
			    if($extension == 'jpg' || $extension == 'JPG'){
			    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
			    }
			    if($extension == 'png' || $extension == 'PNG'){
			    $img_original = imagecreatefrompng($rutaImagenOriginal);
			    }
			    $max_ancho = '740';
			    $max_alto = '487';
			    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
			    $x_ratio = $max_ancho / $ancho;
			    $y_ratio = $max_alto / $alto;
			    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
			  	$ancho_final = $ancho;
				$alto_final = $alto;
				} elseif (($x_ratio * $alto) < $max_alto){
					$alto_final = ceil($x_ratio * $alto);
					$ancho_final = $max_ancho;
				} else{
					$ancho_final = ceil($y_ratio * $ancho);
					$alto_final = $max_alto;
				}
				$margen_ancho_res=(740 - $ancho_final)/2;
			    $tmp=imagecreatetruecolor(740,487); $white = imagecolorallocate($tmp, 255, 255, 255); imagefill($tmp, 0, 0, $white); 
			    imagecopyresampled($tmp,$img_original,$margen_ancho_res,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			    //imagedestroy($img_original);
			    $calidad=100;
			    imagejpeg($tmp,$ruta.$nombreN,$calidad);
			    
			}

			function resizeImagen($ruta, $nombre, $alto, $ancho,$nombreN,$extension){
			    $rutaImagenOriginal = $ruta.$nombre;
			    if($extension == 'GIF' || $extension == 'gif'){
			    $img_original = imagecreatefromgif($rutaImagenOriginal);
			    }
			    if($extension == 'jpg' || $extension == 'JPG'){
			    $img_original = imagecreatefromjpeg($rutaImagenOriginal);
			    }
			    if($extension == 'png' || $extension == 'PNG'){
			    $img_original = imagecreatefrompng($rutaImagenOriginal);
			    }
			    $max_ancho = '218';
			    $max_alto = '146';
			    list($ancho,$alto)=getimagesize($rutaImagenOriginal);
			    $x_ratio = $max_ancho / $ancho;
			    $y_ratio = $max_alto / $alto;
			    if( ($ancho <= $max_ancho) && ($alto <= $max_alto) ){//Si ancho 
			  	$ancho_final = $ancho;
				$alto_final = $alto;
				} elseif (($x_ratio * $alto) < $max_alto){
					$alto_final = ceil($x_ratio * $alto);
					$ancho_final = $max_ancho;
				} else{
					$ancho_final = ceil($y_ratio * $ancho);
					$alto_final = $max_alto;
				}
				$margen_ancho_res=(218 - $ancho_final)/2;
			    $tmp=imagecreatetruecolor(218,146); $white = imagecolorallocate($tmp, 255, 255, 255); imagefill($tmp, 0, 0, $white); 
			    imagecopyresampled($tmp,$img_original,$margen_ancho_res,0,0,0,$ancho_final, $alto_final,$ancho,$alto);
			    //imagedestroy($img_original);
			    $calidad=100;
			    imagejpeg($tmp,$ruta.$nombreN,$calidad);
			    
			}

	    	$id_user = request()->id_producto;
	    	$allowed = array('png', 'jpg', 'gif','zip');
	    	$carpeta = 'uploads/'.$id_user.'/';
				if (!file_exists($carpeta)) {
				    mkdir($carpeta, 0777, true);
				}
	    	
	    	
			if(isset($_FILES['upl']) && $_FILES['upl']['error'] == 0){

				$extension = pathinfo($_FILES['upl']['name'], PATHINFO_EXTENSION);

				if(!in_array(strtolower($extension), $allowed)){
					echo '{"status":"error"}';
					exit;
				}

				if(move_uploaded_file($_FILES['upl']['tmp_name'], 'uploads/'.$id_user.'/'.$_FILES['upl']['name'])){
					
				 
				 $minFoto = 'min_'.$_FILES['upl']['name'];
			     $resFoto = 'full_'.$_FILES['upl']['name'];
			     resizeImagen('uploads/'.$id_user.'/', $_FILES['upl']['name'], 300, 300,$minFoto,$extension);
			     resizeImagen1('uploads/'.$id_user.'/', $_FILES['upl']['name'], 5000, 5000,$resFoto,$extension);
			     unlink('uploads/'.$id_user.'/'.$_FILES['upl']['name']);
					echo '{"status":"success"}';
				
				 
				//GRABO ID PRODUCTO + RUTA IMG EN BASE
				$crear_img = new image;
		    	$crear_img->producto_id = request()->id_producto;
		    	$crear_img->file_name = $_FILES['upl']['name'];
		    	$crear_img->save();
				 } 

			}
			echo '{"status":"error"}';
	    }
}
