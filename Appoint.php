<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style type="text/css">
    .wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
    }
    .wrapper {
    display: flex;
    align-items: stretch;
  }

#sidebar {
    min-width: 250px;
    max-width: 250px;
}

#sidebar.active {
    margin-left: -250px;
}

  #sidebar {
    min-width: 250px;
    max-width: 250px;
    min-height: 100vh;
  }
  a[data-toggle="collapse"] {
    position: relative;
  }

  .dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
  }
  @media (max-width: 768px) {
    #sidebar {
        margin-left: -250px;
    }
    #sidebar.active {
        margin-left: 0;
    }
  }
  @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";


  body {
    font-family: 'Poppins', sans-serif;
    background: #fafafa;
  }

  p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
  }

  a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
  }

  #sidebar {
    /* don't forget to add all the previously mentioned styles here too */
    background: #7386D5;
    color: #fff;
    transition: all 0.3s;
  }

  #sidebar .sidebar-header {
    padding: 20px;
    background: #6d7fcc;
  }

  #sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
  }

  #sidebar ul p {
    color: #fff;
    padding: 10px;
  }

  #sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
  }
  #sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
  }

  #sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
  }
  ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
  }

    </style>
</head>
  <header>
    <?php require 'head.php'; ?>
  </header>
<body>
  <div class="wrapper">
  <!-- Sidebar -->
  <nav id="sidebar">
      <div class="sidebar-header">
          <?php echo '<h3> '. $_COOKIE['userL'] .'`s profile</h3>'; ?>
      </div>

      <ul class="list-unstyled components">
          <li>
              <a href="Prof.php">Profile Settings</a>
          </li>
          <li>
              <a href="Calendar.php">My calendar</a>
          </li>
          <li class="active">
              <a href="TestRes.php">Test results</a>
          </li>
          <li>
              <a href="Cons.php">E-consultation</a>
          </li>
          <li>
              <a href="Appoint.php">Appointment</a>
          </li>
          <li>
              <a href="Advice.php">Advice</a>
          </li>
          <li>
              <a href="Offers.php">Special offers</a>
          </li>
          <li>
              <a href="help.php">Help</a>
          </li>

      </ul>
  </nav>

</div>



    <div id="content" style="margin-left: 250px; margin-top: -550px">
    <h1>Appointment</h1>
      <form class="" action="sc/appscr.php" method="post">
    <div>
      <h4>Set a <b>live</b> appointment</h4>
      <p>Choose date and time:</p>
      <input type="date" name="dateapp" min=<?php echo date('m-d-Y'); ?>/>

      <label for="appt-time">Choose an appointment time: </label>
      <input id="appt-time" type="time" name="timeapp" value="13:30">
      <label for="appt-time">Choose doctor: </label>
      <?php
       $mysql0 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
       $sql0 = "SELECT * FROM Doctor";
        $result_select = mysqli_query($mysql0, $sql0);
        	echo "<select name ='doctor'>";
        	echo "<option value='0'>Choose doctor</option>";
        		while($object = mysqli_fetch_object($result_select)){
        echo "<option value = '$object->Id_doctor' > $object->Surname </option>";}
        	echo "</select>";
          $mysql0 ->close();
       ?>
    </br>
    <input type="hidden"  name="type" value="Live">
      <input type="submit" value="Pay for appoinment" style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
    		color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
    		background: rgb(43,119,183) !important;"onmouseover="this.style.opacity='0.5';" onmouseout="this.style.opacity='1';">
    		<img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
    			style="margin-right: 7px !important; vertical-align: middle !important;"/>
    </div>
  </form>
  </br>
    <div id="content" >

    <div>
      <form class="" action="sc/appscr.php" method="post">
      <h4>Set an <b>online</b> consultation</h4>
      <p>Choose date and time:</p>
      <input type="date" name="dateapp" min=<?php echo date('m-d-Y'); ?>/>

      <label for="appt-time">Choose an appointment time: </label>
      <input id="appt-time" type="time" name="timeapp" value="13:30">
      <label for="appt-time">Choose doctor: </label>
      <?php
       $mysql0 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
       $sql0 = "SELECT * FROM Doctor";
        $result_select = mysqli_query($mysql0, $sql0);
          echo "<select name ='doctor'>";
          echo "<option value='0'>Choose doctor</option>";
            while($object = mysqli_fetch_object($result_select)){
        echo "<option value = '$object->Id_doctor' > $object->Surname </option>";}
          echo "</select>";
          $mysql0 ->close();
       ?>
    </br>
    <input type="hidden"  name="type" value="Online">
      <input type="submit" value="Pay for e-consultation" style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
        color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
        background: rgb(43,119,183) !important;"onmouseover="this.style.opacity='0.5';" onmouseout="this.style.opacity='1';">
        <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
          style="margin-right: 7px !important; vertical-align: middle !important;"/>
    </div>
    </form>
    </div>
  </br>

  <div>
    <?php
    $mysql = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $Userlogin = $_COOKIE['userL'];
    $lookupID = "SELECT Id_user FROM User WHERE Login = '$Userlogin'";
    $result = mysqli_query($mysql, $lookupID);
    $row = mysqli_fetch_row($result);
    $idUser = $row[0];
    $mysql->close();

    $mysqlP = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $lookupIdP = "SELECT Id_patient FROM Patient WHERE Id_user = '$idUser'";
    $resultP = mysqli_query($mysqlP, $lookupIdP);
    $rowP = mysqli_fetch_row($resultP);
    $idPatient = $rowP[0];
    $mysqlP ->close();

    $mysql2 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $lookupID1 = "SELECT COUNT(Id_consultation), Id_patient FROM Consultation WHERE Id_patient = '$idPatient'";
    $result1 = mysqli_query($mysql2, $lookupID1);
    $row1 = mysqli_fetch_row($result1);
    $totalcons = $row1[0];
    $mysql2->close();

 if($totalcons>=1){
   $freecons=0;
 }
 else{
   $freecons=1;
 }


    echo '<h5>You have  : '. $freecons.' free consultations!</h5>';
    ?>
    <p>

    <?php
    if($freecons==1){
    echo '<form class="" action="sc/freeappoint.php" method="post">';
    echo '<p>Choose date and time:</p>';
    echo '<input type="date" name="dateapp" min=<?php echo date("m-d-Y"); ?>/>';

    echo '<label for="appt-time"> Choose an appointment time: </label>';
    echo '<input id="appt-time" type="time" name="timeapp" value="13:30">';
    echo '<label for="appt-time">Choose doctor: </label>';

     $mysql0 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
     $sql0 = "SELECT * FROM Doctor";
      $result_select = mysqli_query($mysql0, $sql0);
        echo "<select name ='doctor'>";
        echo "<option value='0'>Choose doctor</option>";
          while($object = mysqli_fetch_object($result_select)){
      echo "<option value = '$object->Id_doctor' > $object->Surname </option>";}
        echo "</select>";
        $mysql0 ->close();

    echo '</br>';
    echo '<input type="submit" value="Get e-consultation" />';
    echo '</form>';
  }
    ?>
    </p>
  </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function () {

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

});


</body>



</html>
