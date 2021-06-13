<?php 
// Include the database configuration file  
require_once './sql/startDB.php'; 

$db = startDB();
 
// If file upload form is submitted 

$id = $_SESSION['user']['userid'];

if (isset($_POST['submit'])) {
	$file = $_FILES['file'];

	$fileName = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg');

	if (in_array($fileActualExt, $allowed)) {
		if ($fileError === 0) {
			if ($fileSize < 5000000) {
				$fileNameNew = "profile".$id.".".$fileActualExt;
				$fileDestination = './uploads/'.$fileNameNew;
				move_uploaded_file($fileTmpName, $fileDestination);
                echo "succsess";
			} else {
				$_SESSION['error'] = "Your file is too big, max 500KB allowed!";
			}
		} else {
			$_SESSION['error'] = "There was an error uploading your file!";
		}
	} else {
		$_SESSION['error'] = "Only .jpg images allowed!";
	}
}
header("Location: dashboard");
$db->close();
?>