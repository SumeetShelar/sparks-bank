<?php 
    include 'config.php';
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn,$sql);
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

  <!--User Table-->
  <div class="main">
    <div class="container">
      <h2 class="text-center pt-4">Transfer Money</h2><br>  
        <div class="table-responsive-sm">
          <table class="table table-hover table-sm table-striped table-condensed table-bordered table-dark">
            <thead>
                <tr class="text-uppercase">
                <th scope="col" class="text-center py-2">Id</th>
                <th scope="col" class="text-center py-2">Name</th>
                <th scope="col" class="text-center py-2">E-Mail</th>
                <th scope="col" class="text-center py-2">Balance</th>
                <th scope="col" class="text-center py-2">Operation</th>
                </tr>
            </thead>
            <tbody>
              <!--While Start-->
              <?php while($rows=mysqli_fetch_assoc($result)){ ?>
              <tr>
                <td class="py-2"><?php echo $rows['id'] ?></td>
                <td class="py-2"><?php echo $rows['name']?></td>
                <td class="py-2"><?php echo $rows['email']?></td>
                <td class="py-2"><?php echo $rows['balance']?></td>
                <td><a href="selecteduser.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-info">Transfer</button></a></td> 
              </tr>
              <?php } ?>
              <!--While End-->
            </tbody>
          </table>
        </div>
    </div>
  </div>
  <!--!User Table-->

  <!--Footer-->
  <footer style="margin-top: 30px;">
    <p>?? GRIP August-2021. Made with ?????? by <a class="" target="_blank" href="https://github.com/SumeetShelar">Sumeet Shelar</a><br></p>  
  </footer>
  <!--!Footer-->

  <!--Bootstrap Script tags-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script> 
  <!--!Bootstrap Script tags-->

</body>
</html>
