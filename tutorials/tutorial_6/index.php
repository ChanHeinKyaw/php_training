<?php
  if(isset($_POST["submit"])){
    $file = $_FILES["file"];

    $folder_name = $_POST["name"];

    $create_folder = mkdir($folder_name);
    
    move_uploaded_file($file["tmp_name"] , "$folder_name/" . $file["name"]);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tutorial 6</title>
</head>
<body>
  <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="file"><br><br>
    <input type="text" name="name" placeholder="Floder Name"><br><br>
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>