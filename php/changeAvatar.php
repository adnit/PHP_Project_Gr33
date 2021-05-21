<?php
  namespace Verot\Upload;
  include('./php/checkState.php');
  require_once './session.php';
  require_once './connect.php';
  require_once './class.upload.php';
	$UserId=$_POST['UserId'];
  
    if ( 0 < $_FILES['file']['error'] ) {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
    }
    else {
      $handle = new Upload($_FILES['file']['tmp_name']);
      if ($handle->uploaded) {
        if(!($handle->file_is_image)){
          $forceRedirect = true;
        }else{
          $newFileName = md5(time() . $handle->file_src_name_body);
          $handle->file_new_name_body    = $newFileName;  
          $handle->image_convert         = 'png';
          $handle->image_resize          = true;
          $handle->image_ratio_crop      = true;
          $handle->image_y               = 444;
          $handle->image_x               = 300;
          header('Content-type: ' . $handle->file_src_mime);
          $handle->process('../assets/img/posters');
          if ($handle->processed) {
            $avatar = $handle->file_dst_pathname;
            $handle->clean();
          } else {
            $avatar = $handle->error;
            $handle->clean();
          }
        }
      }
      $sql = "UPDATE Users SET UserAvatar=? WHERE UserId=?";
      $update = $con->prepare($sql);
      
	      if ($update->execute([$avatar, $movieID])){
          $_SESSION["avatar"] = $avatar;
		    ;
    	} 
	    else {
	    }
    }
?>