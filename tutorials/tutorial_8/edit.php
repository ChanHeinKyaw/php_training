<?php 
  session_start();
  require "connect.php";

  $user_id = "";
  $nameError = "";
  $emailError = "";
  $phoneError = "";
  $passwordError = "";
  $addressError = "";
  
  if(isset($_GET['userId'])){
    $user_id = $_GET['userId'];

    $user = mysqli_query($db,"SELECT * FROM user_crud.users WHERE id=$user_id");
    if(mysqli_num_rows($user) == 1){
      foreach($user as $data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $password = $data['password'];
        $address = $data['address'];
      }
    }
  }

  //update user

  if(isset($_POST['update-btn'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"];
    $address = $_POST["address"];

    $hash_password = md5($password);

    if(empty($name)){
      $nameError = "The name field is required.";
    }

    if(empty($email)){
      $emailError = "The email field is required.";
    }

    if(empty($phone)){
      $phoneError = "The phone field is required.";
    }

    if(empty($password)){
      $passwordError = "The password field is required.";
    }

    if(empty($address)){
      $addressError = "The address field is required.";
    }

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($password) && !empty($address)){
      $query = "UPDATE user_crud.users SET name='$name',email='$email',phone=$phone,password='$hash_password',address='$address' WHERE id=$user_id";
      $_SESSION['successMsg'] = "User Successfully Updated";
      mysqli_query($db,$query);
      header("Location:index.php");
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Edit Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="card">
      <div class="user-create clearfix">
        <h2>User Edit</h2>
        <a href="index.php"><< Back</a>
      </div>
      <form action="<?php $_PHP_SELF ?>" method="POST">

        <input type="text" name="name" placeholder="Name" value="<?php echo $name; ?>">
        <span style="color: red;"><?php echo $nameError ?></span><br><br>
        
        <input type="email" name="email" placeholder="Email" value="<?php echo $email; ?>">
        <span style="color: red;"><?php echo $emailError ?></span><br><br>
        
        <input type="number" name="phone" placeholder="Phone" value="<?php echo $phone; ?>">
        <span style="color: red;"><?php echo $phoneError ?></span><br><br>

        <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>">
        <span style="color: red;"><?php echo $passwordError ?></span><br><br>
        
        <textarea name="address" placeholder="Address....." rows="5"><?php echo $address; ?></textarea>
        <span style="color: red;"><?php echo $addressError ?></span>
        
        <button type="submit" name="update-btn">Update</button>
      
      </form>
  </div>
</body>
</html>