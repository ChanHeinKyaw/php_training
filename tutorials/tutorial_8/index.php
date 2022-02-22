<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Information Page</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="user-info clearfix">
      <h2>User Information</h2>
      <a href="create.php">+ Create</a>
    </div>
  <table>
    <?php if(isset($_SESSION['successMsg'])){ ?>
      <div class="alert-msg">
        <?php
            echo $_SESSION['successMsg'];
            unset($_SESSION['successMsg']);
        ?>
      </div>
    <?php } ?>
    <thead>
      <th>ID</th>
      <th>Name</th>
      <th>Email</th>
      <th>Phone</th>
      <th>Address</th>
      <th>Action</th>
    </thead>
    <tbody>
      <?php
        require "connect.php";
        $query = "SELECT * FROM users";

        $users = mysqli_query($db,$query);
        foreach($users as $user){
      ?>
        <tr>
          <td><?php echo $user['id']; ?></td>
          <td><?php echo $user['name']; ?></td>
          <td><?php echo $user['email']; ?></td>
          <td><?php echo $user['phone']; ?></td>
          <td><?php echo $user['address']; ?></td>
          <td>
            <a href="edit.php?userId=<?php echo $user['id']?>">Edit</a>
            <a href="index.php?userId=<?php echo $user['id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a>
          </td>
        </tr>
      <?php
        }
      ?>
      
    </tbody>
  </table>
</body>
</html>

<?php
  if(isset($_GET['userId'])){
    $user_id = $_GET['userId'];
    $query = "DELETE FROM users WHERE id=$user_id";
    mysqli_query($db,$query);
    $_SESSION['successMsg'] = "User Successfully Deleted";
    header("Location:index.php");
  }
?>