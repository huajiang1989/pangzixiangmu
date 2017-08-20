<?php
include("../include/conn_2.php");
include("../include/area.php");
include("../include/function.php");
include("../include/rank.php");
include("../include/pos.php");
	$uploads_dir = 'images/idcard/';
    foreach ($_FILES["file-card"]["error"] as $key => $error) {
		
		if ($error == UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["file-card"]["tmp_name"][$key];
			// basename() may prevent filesystem traversal attacks;
			// further validation/sanitation of the filename may be appropriate
			$name = $_SESSION["glo_userid"].".jpg";//basename($_FILES["file-card"]["name"][$key]);
			move_uploaded_file($tmp_name, "$uploads_dir/$name");
		}
    }
    return 1; //这个返回值必须要  

?>