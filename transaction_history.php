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

  <!--Transaction Table-->
	<div class="container">
    <h2 class="text-center pt-4">Transaction History</h2><br>
    <div class="table-responsive-sm">
      <table class="table table-hover table-striped table-condensed table-bordered table-dark">
        <thead>
          <tr class="text-uppercase">
            <th class="text-center">Sr.No.</th>
            <th class="text-center">Sender</th>
            <th class="text-center">Receiver</th>
            <th class="text-center">Amount(Rs)</th>
            <th class="text-center">Date & Time</th>
          </tr>
        </thead>
        <tbody>
          <?php
            include 'config.php';
            $sql ="select * from transaction";
            $query =mysqli_query($conn, $sql);
          //While Start
            while($rows = mysqli_fetch_assoc($query))
            {
          ?>
          <tr>
            <td class="py-2"><?php echo $rows['sno']; ?></td>
            <td class="py-2"><?php echo $rows['sender']; ?></td>
            <td class="py-2"><?php echo $rows['receiver']; ?></td>
            <td class="py-2"><?php echo $rows['balance']; ?> </td>
            <td class="py-2"><?php echo $rows['datetime']; ?> </td>
          </tr>
          <!--!While End-->
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
  <!--!Transaction Table-->

  <!--Footer-->
  <footer style="margin-top: 30px;">
    <p>© GRIP August-2021. Made with ❤️ by <a class="" target="_blank" href="https://github.com/SumeetShelar">Sumeet Shelar</a><br></p>  
  </footer>
  <!--!Footer-->
</body>
</html>