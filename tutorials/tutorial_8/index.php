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
  <script src="chart.js"></script>
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
      <th>Month</th>
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
          <td><?php echo $user['month']; ?></td>
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

  <div style="width: 500px;margin:30px auto;">
    <canvas id="myChart"></canvas>
  </div>
</body>
</html>

<?php
  if(isset($_GET["userId"])){
    $user_id = $_GET["userId"];
    $query = "DELETE FROM users WHERE id=$user_id";
    mysqli_query($db,$query);
    $_SESSION["successMsg"] = "User Successfully Deleted";
    header("Location:index.php");
  }

  $qry = "SELECT count(id) as uid, month from users group by month";
  $result = mysqli_query($db,$qry);
  while($row = mysqli_fetch_array($result)){
    $count[] = $row["uid"];
    $month[] = $row["month"];
  }
?>

<script>
  const labels = <?php echo json_encode($month) ?>;
  const data = {
    labels: labels,
    datasets: [{
      label: "User Information Graph",
      data: <?php echo json_encode($count) ?>,
      backgroundColor: [
        'rgba(255, 99, 132, 0.2)',
        'rgba(255, 159, 64, 0.2)',
        'rgba(255, 205, 86, 0.2)',
        'rgba(75, 192, 192, 0.2)',
        'rgba(54, 162, 235, 0.2)',
        'rgba(153, 102, 255, 0.2)',
        'rgba(201, 203, 207, 0.2)'
      ],
      borderColor: [
        'rgb(255, 99, 132)',
        'rgb(255, 159, 64)',
        'rgb(255, 205, 86)',
        'rgb(75, 192, 192)',
        'rgb(54, 162, 235)',
        'rgb(153, 102, 255)',
        'rgb(201, 203, 207)'
      ],
      borderWidth: 1
    }]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    },
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>


 

