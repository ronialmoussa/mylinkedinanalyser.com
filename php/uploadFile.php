<?php
$target_dir = "../ExcelFiles/";
$fileId = $uniqueId = md5(uniqid(rand(), true));
$newFileName = $fileId.$_FILES["fileToUpload"]["name"];
$target_file = $target_dir.$newFileName;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "csv") {
  echo "Sorry, only (.csv) file is allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    header("Location: saveToDataBase.php?fileName=".$newFileName."&targetFile=".$target_file);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

?>