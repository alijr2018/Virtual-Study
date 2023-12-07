<?php
$targetDirectory = "uploads/"; // Directory where uploaded files will be stored
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));


if (file_exists($targetFile)) {
	echo "Sorry, file already exists.";
	$uploadOk = 0;
}


if ($_FILES["fileToUpload"]["size"] > 500000) {
	echo "Sorry, your file is too large.";
	$uploadOk = 0;
}


if($fileType !== "jpg" && $fileType !== "png" && $fileType !== "jpeg"
	&& $fileType !== "gif" ) {
	echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	$uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

