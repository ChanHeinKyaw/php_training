<?php 
  session_start();
  require "connect.php";

  $user_id = "";
  $nameError = "";
  $emailError = "";
  $phoneError = "";
  $monthError = "";
  $addressError = "";
  
  if(isset($_GET['userId'])){
    $user_id = $_GET['userId'];

    $user = mysqli_query($db,"SELECT * FROM users WHERE id=$user_id");
    if(mysqli_num_rows($user) == 1){
      foreach($user as $data){
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $month = $data['month'];
        $address = $data['address'];
      }
    }
  }

  //update user

  if(isset($_POST['update-btn'])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $month = $_POST["month"];
    $address = $_POST["address"];


    if(empty($name)){
      $nameError = "The name field is required.";
    }

    if(empty($email)){
      $emailError = "The email field is required.";
    }

    if(empty($phone)){
      $phoneError = "The phone field is required.";
    }

    if(empty($month)){
      $monthError = "The Month field is required.";
    }

    if(empty($address)){
      $addressError = "The address field is required.";
    }

    if(!empty($name) && !empty($email) && !empty($phone) && !empty($address)){
      $query = "UPDATE users SET name='$name',email='$email',phone=$phone,month='$month',address='$address' WHERE id=$user_id";
      mysqli_query($db,$query);
      $_SESSION['successMsg'] = "User Successfully Updated";
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
        
        <select name="month">
          <option value="">Select Month</option>  
          <option value="jan"
          <?php echo $month == 'jan' ? 'selected' : '' ?>
          >JAN</option>
          <option value="feb"
          <?php echo $month == 'feb' ? 'selected' : '' ?>
          >FEB</option>
          <option value="mar"
          <?php echo $month == 'mar' ? 'selected' : '' ?>
          >MAR</option>
          <option value="apr"
          <?php echo $month == 'apr' ? 'selected' : '' ?>
          >APR</option>
          <option value="may"
          <?php echo $month == 'may' ? 'selected' : '' ?>
          >MAY</option>
          <option value="jun"
          <?php echo $month == 'jun' ? 'selected' : '' ?>
          >JUN</option>
          <option value="jul"
          <?php echo $month == 'jul' ? 'selected' : '' ?>
          >JUL</option>
          <option value="aug"
          <?php echo $month == 'aug' ? 'selected' : '' ?>
          >AUG</option>
          <option value="sep"
          <?php echo $month == 'sep' ? 'selected' : '' ?>
          >SEP</option>
          <option value="oct"
          <?php echo $month == 'oct' ? 'selected' : '' ?>
          >OCT</option>
          <option value="nov"
          <?php echo $month == 'nov' ? 'selected' : '' ?>
          >NOV</option>
          <option value="dec"
          <?php echo $month == 'dec' ? 'selected' : '' ?>
          >DEC</option>
        </select>
        <span style="color: red;"><?php echo $monthError ?></span><br><br>

        <textarea name="address" placeholder="Address....." rows="5"><?php echo $address; ?></textarea>
        <span style="color: red;"><?php echo $addressError ?></span>
        
        <button type="submit" name="update-btn">Update</button>
      
      </form>
  </div>
</body>
</html>