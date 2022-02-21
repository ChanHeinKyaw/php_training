<?php
  if(isset($_POST["submit"])){
    
    if(empty($_FILES["file"])){
      echo "Image field is required";
    }else{
      $file = $_FILES["file"];
    }


    if(empty($_POST["name"])){
      echo "Folder Name Field is required";
    }else{
      $folder_name = $_POST["name"];
      if(file_exists($folder_name)){
        echo "File Exist";
      }else{
        mkdir($folder_name);
      }
    }

    if(!empty($_FILES["file"]) && !empty($_POST["name"])){
      $_SESSION['successMsg'] = "Successfully Uploaded!";
      move_uploaded_file($file["tmp_name"] , "$folder_name/" . $file["name"]);
    }

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
  <?php
    if(isset($_SESSION['successMsg'])){
      echo $_SESSION['successMsg'];
    }
  ?>
  <form action="<?php $_PHP_SELF ?>" method="POST" enctype="multipart/form-data">
    <input type="file" name="file"  accept=".jpg, .png, .jpeg"><br><br>
    <input type="text" name="name" placeholder="Folder Name"><br><br>
    <button type="submit" name="submit">Upload</button>
  </form>
</body>
</html>