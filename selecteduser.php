<?php
include('config.php');

//Start if(1)
if(isset($_POST['submit'])) 
{
  $from = $_GET['id'];
  $to = $_POST['to'];
  $amount = $_POST['amount'];

  $sql = "SELECT * from users where id=$from";
  $query = mysqli_query($conn,$sql);
  $sql1 = mysqli_fetch_array($query);

  $sql = "SELECT * from users where id=$to";
  $query = mysqli_query($conn,$sql);
  $sql2 = mysqli_fetch_array($query);

  // Start if(2)
  // check for negative value
  if (($amount)<0) {
    echo '<script type="text/javascript">';
    echo ' alert("Oops! Negative values cannot be transferred")';
    echo '</script>';
  }

  // check for insufficient balance
  else if($amount > $sql1['balance']) { 
    echo '<script type="text/javascript">';
    echo ' alert("Bad Luck! Insufficient Balance")';
    echo '</script>';
  }
  
  // check for zero values
  else if($amount == 0){
    echo "<script type='text/javascript'>";
    echo "alert('Oops! Zero value cannot be transferred')";
    echo "</script>";
  }

  else { 
    // deducting amount from sender's account
    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE users set balance=$newbalance where id=$from";
    mysqli_query($conn,$sql);

    // adding amount to reciever's account
    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE users set balance=$newbalance where id=$to";
    mysqli_query($conn,$sql);
    
    // Inserting in Transaction table
    $sender = $sql1['name'];
    $receiver = $sql2['name'];
    $sql = "INSERT INTO transaction(`sender`, `receiver`, `balance`) VALUES ('$sender','$receiver','$amount')";
    $query=mysqli_query($conn,$sql);

    // Start if(3)
    // Successfull Transaction alert
    if($query){
      echo "<script> alert('Your Transaction was Successful');
                      window.location='transaction_history.php';
            </script>";  
    }
    // End if(3)

  $newbalance = 0;
  $amount = 0;
}
//End if(2)
 
}
//End if(1)
?>
 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sparks Bank</title>
  <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./css/index.css">
  <link rel="stylesheet" type="text/css" href="./css/table.css">
  <link rel="stylesheet" type="text/css" href="./css/createuser.css">
  <script type="text/javascript" src="./bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel = "icon" href = "./img/logo2.png">        <!--LOGO-->
</head>


<body>

  <!--Navigation-->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #141d3a;">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <!--Sparks Bank-->
        <h1 class="heading"><a href="index.php">Sparks Bank</a></h1>
        <!--!Sparks Bank-->

        <!--Nav Links-->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="link" href="#">Contact Us</a>
          </li>
        </ul>
        <!--!Nav Links-->
      </div>
    </div>
  </nav>
  <!--!Navigation-->

  <!--Main-->
	<div class="container">
    <h2 class="text-center pt-4">Transfer Money</h2>
    <?php
      include 'config.php';
      $sid=$_GET['id'];
      $sql = "SELECT * FROM  users where id=$sid";
      $result=mysqli_query($conn,$sql);
      if(!$result) {
          echo "Error : ".$sql."<br>".mysqli_error($conn);
      }
      $rows=mysqli_fetch_assoc($result);
    ?>
    <form method="post" name="tcredit" class="tabletext" ><br>
      <!--Selected User Table-->
      <div>
        <table class="table table-striped table-condensed table-bordered">
          <thead class="table-dark">
            <tr class="text-uppercase text-center">
              <th>Id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Balance</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td class="py-2"><?php echo $rows['id'] ?></td>
              <td class="py-2"><?php echo $rows['name'] ?></td>
              <td class="py-2"><?php echo $rows['email'] ?></td>
              <td class="py-2"><?php echo $rows['balance'] ?></td>
            </tr>
          </tbody>
        </table>
      </div><br>
      <!--!Selected User Table-->

      <!--Transfer to section-->
      <label>Transfer To:</label>
      <select name="to" class="form-control" required>
        <option value="" disabled selected>Choose</option>
        <?php
          include 'config.php';
          $sid=$_GET['id'];
          $sql = "SELECT * FROM users where id!=$sid";
          $result=mysqli_query($conn,$sql);
          if(!$result) {
              echo "Error ".$sql."<br>".mysqli_error($conn);
          }

          // Start While
          while($rows = mysqli_fetch_assoc($result)) {
        ?>
        <option class="table" value="<?php echo $rows['id'];?>" >
          <?php echo $rows['name'] ;?> (Balance: 
          <?php echo $rows['balance'] ;?> ); 
        </option>
        <?php } ?>
        <!--End While-->
      </select><br><br>
      <!--!Transfer to section-->

      <!--Amount section-->
      <label>Amount:</label>
      <input type="number" class="form-control" name="amount" required><br><br>
      <div class="text-center" >
        <button class="btn btn-primary" name="submit" type="submit" id="btn">Transfer</button>
      </div>
      <!--!Amount section-->
    </form>
  </div>
  <!--!Main-->
  
  <!--Footer-->
  <footer style="margin-top: 30px;">
    <p>© GRIP August-2021. Made with ❤️ by <a class="" target="_blank" href="https://github.com/SumeetShelar">Sumeet Shelar</a><br></p>  
  </footer>
  <!--!Footer-->
</body>
</html>