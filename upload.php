<?php
$target_dir ="";
echo $_FILES["fileToUpload"]["name"];
echo " <----- ";
echo $_FILES["fileToUpload"]["tmp_name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

?>
<br><br>
<a href="../index.html">New Enlightenment Site</a>
<a href="upload.html">Upload Another File</a>