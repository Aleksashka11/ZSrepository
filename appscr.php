<?php
$date_cons0=$_POST['dateapp'];
$date_cons= (date('d-m-Y',strtotime($date_cons0)));

$Time_start=$_POST['timeapp'];
$Time_end=date('H:i',strtotime($Time_start . ' +30 minutes'));;
$Id_doctor=$_POST['doctor'];
$Id_doctor+=1;
$Id_doctor-=1;
$Id_schedule=1;
$Type=$_POST['type'];

$dateavailable=true;

/*
$mysql3 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
$lookupDate = "SELECT Count(Id_consultation) FROM Consultation WHERE Id_doctor = '$Id_doctor' AND data_cons = '$date_cons' AND (Time_start <= '$Time_start' AND Time_end >= '$Time_start') OR (Time_start <= '$Time_end' AND Time_end >= '$Time_end') ";
$res3 = mysql_query($mysql3, $lookupDate);
$row = mysql_fetch_row($res3);
$res=$row[0];
if ($res>=1)
{
  $dateavailable=false;
  echo " The chosen doctor is not available at this time ";
  echo '</br>';
  echo "Try again";
}
else
{
      echo "время доступно!";
}
$mysql3->close();
*/
 $date_conscheck=$date_cons;
$datenow=date('d-m-Y');
$datecheck=(strtotime($datenow)>strtotime($date_conscheck));

if($datecheck || $Id_doctor==0){
    $dateavailable=false;
}

if ($dateavailable==true){
  $mysql = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');

    $lookupID = "SELECT Id_user FROM User WHERE  Login ='". $_COOKIE['userL']."'";
    $result = mysqli_query($mysql, $lookupID);
    $row = mysqli_fetch_row($result);
    $Id_user = $row[0];
    $mysql->close();

    $mysql2 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');

      $lookupID = "SELECT Id_patient FROM Patient WHERE  Id_User ='$Id_user'";
      $result = mysqli_query($mysql2, $lookupID);
      $row = mysqli_fetch_row($result);
      $Id_patient = $row[0];
      $mysql2->close();

    $mysql1 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $lookupDI = "SELECT Id_diagnosis FROM Test WHERE  Id_patient ='$Id_patient' ";
    $result1 = mysqli_query($mysql1, $lookupDI);
    $row1 = mysqli_fetch_row($result1);
    $Id_diagnosis = $row1[0];
    $mysql1->close();




    error_reporting(0);
    echo "Date is appropriate. Please pay now to confirm:";
    //echo '<script>location.replace("https://tridimensional-laun.000webhostapp.com/Calendar.php");</script>'; exit;
  $mysql4 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
$query = "SELECT date_cons from Consultation where Id_patient='$Id_patient' AND date_cons='$date_cons' ";
$result = mysqli_query($mysql4,$query);

if(mysqli_num_rows($result) > 0)
{
  //package sale
  echo " </br> Congratulations you got 15% discount.  Check the special offers section if you wonder why";
    echo '<form method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
<input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJwdWJsaWNfa2V5IjoiaTEyODkyMjE4NDciLCJhbW91bnQiOiI4NSIsImN1cnJlbmN5IjoiVUFIIiwiZGVzY3JpcHRpb24iOiJDb25zdWx0YXRpb24iLCJ0eXBlIjoiYnV5Iiwic2VydmVyX3VybCI6Imh0dHBzOi8vdHJpZGltZW5zaW9uYWwtbGF1bi4wMDB3ZWJob3N0YXBwLmNvbS9BcHBvaW50LnBocCIsInJlc3VsdF91cmwiOiJodHRwczovL3RyaWRpbWVuc2lvbmFsLWxhdW4uMDAwd2ViaG9zdGFwcC5jb20vQ2FsZW5kYXIucGhwIiwibGFuZ3VhZ2UiOiJ1ayJ9" />
<input type="hidden" name="signature" value="uHApedHn/XA6fAQlqdCEgFGLhbk=" />
<button style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
  color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
  background: rgb(43,119,183) !important;"onmouseover="this.style.opacity="0.5";" onmouseout="this.style.opacity="1";">
  <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
    style="margin-right: 7px !important; vertical-align: middle !important;"/>
  <span style="vertical-align:middle; !important">Payment 85 UAH</span>
</button>
</form>
';
$mysql4->close();
}
else{

  $mysql4->close();

  $mysql5 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
$query2 = "SELECT DOB from Patient where Id_patient='$Id_patient'  ";
$res1 = mysqli_query($mysql5, $query2);
$row1 = mysqli_fetch_row($res1);
$dob = $row1[0];
$mysql1->close();
$dob_dm= (date('d-m',strtotime($dob)));
$date_cons_dm= (date('d-m',strtotime($date_cons)));
  if ($dob_dm == $date_cons_dm){
    echo " </br> Congratulations you got 5% discount (Birthday discount). Check the special offers section if you wonder why";
    echo '<form method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
  <input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJwdWJsaWNfa2V5IjoiaTEyODkyMjE4NDciLCJhbW91bnQiOiI5NSIsImN1cnJlbmN5IjoiVUFIIiwiZGVzY3JpcHRpb24iOiJDb25zdWx0YXRpb24iLCJ0eXBlIjoiYnV5Iiwic2VydmVyX3VybCI6Imh0dHBzOi8vdHJpZGltZW5zaW9uYWwtbGF1bi4wMDB3ZWJob3N0YXBwLmNvbS9BcHBvaW50LnBocCIsInJlc3VsdF91cmwiOiJodHRwczovL3RyaWRpbWVuc2lvbmFsLWxhdW4uMDAwd2ViaG9zdGFwcC5jb20vQ2FsZW5kYXIucGhwIiwibGFuZ3VhZ2UiOiJ1ayJ9" />
  <input type="hidden" name="signature" value="JJbOL4B5aDAaG0HnVRAw47P0tok=" />
  <button style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
    color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
    background: rgb(43,119,183) !important;"onmouseover="this.style.opacity="0.5";" onmouseout="this.style.opacity="1";">
    <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
      style="margin-right: 7px !important; vertical-align: middle !important;"/>
    <span style="vertical-align:middle; !important">Payment 95 UAH</span>
  </button>
</form>
';
  }
  else{
  $today1=date("Y-m-d");
$futureDate=date('Y-m-d', strtotime('+60 year', strtotime($dob)) );
$res6=(strtotime($today1)>=strtotime($futureDate));
  if($res6){
    echo " </br> Congratulations you got 4% discount. Check the special offers section if you wonder why";
    echo '<form method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
<input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJwdWJsaWNfa2V5IjoiaTEyODkyMjE4NDciLCJhbW91bnQiOiI5NiIsImN1cnJlbmN5IjoiVUFIIiwiZGVzY3JpcHRpb24iOiJDb25zdWx0YXRpb24iLCJ0eXBlIjoiYnV5Iiwic2VydmVyX3VybCI6Imh0dHBzOi8vdHJpZGltZW5zaW9uYWwtbGF1bi4wMDB3ZWJob3N0YXBwLmNvbS9BcHBvaW50LnBocCIsInJlc3VsdF91cmwiOiJodHRwczovL3RyaWRpbWVuc2lvbmFsLWxhdW4uMDAwd2ViaG9zdGFwcC5jb20vQ2FsZW5kYXIucGhwIiwibGFuZ3VhZ2UiOiJ1ayJ9" />
<input type="hidden" name="signature" value="q9kCbpTYkT5NQpMZI6xoEmxtGiQ=" />
<button style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
  color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
  background: rgb(43,119,183) !important;"onmouseover="this.style.opacity="0.5";" onmouseout="this.style.opacity="1";">
  <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
    style="margin-right: 7px !important; vertical-align: middle !important;"/>
  <span style="vertical-align:middle; !important">Payment 96 UAH</span>
</button>
</form>';
  }
  else{
    echo '<form method="POST" accept-charset="utf-8" action="https://www.liqpay.ua/api/3/checkout">
    <input type="hidden" name="data" value="eyJ2ZXJzaW9uIjozLCJhY3Rpb24iOiJwYXkiLCJwdWJsaWNfa2V5IjoiaTEyODkyMjE4NDciLCJhbW91bnQiOiI1IiwiY3VycmVuY3kiOiJVQUgiLCJkZXNjcmlwdGlvbiI6ImFwcG9pbnRtZW50IiwidHlwZSI6ImJ1eSIsInNlcnZlcl91cmwiOiJodHRwczovL3RyaWRpbWVuc2lvbmFsLWxhdW4uMDAwd2ViaG9zdGFwcC5jb20vQXBwb2ludC5waHAiLCJyZXN1bHRfdXJsIjoiaHR0cHM6Ly90cmlkaW1lbnNpb25hbC1sYXVuLjAwMHdlYmhvc3RhcHAuY29tL2luZGV4LnBocCIsImxhbmd1YWdlIjoiZW4ifQ==" />
    <input type="hidden" name="signature" value="2w+yaE87DyrwKSDC7GHqW6N3y3Q=" />
    <button style="border: none !important; display:inline-block !important;text-align: center !important;padding: 7px 20px !important;
      color: #fff !important; font-size:16px !important; font-weight: 600 !important; font-family:OpenSans, sans-serif; cursor: pointer !important; border-radius: 2px !important;
      background: rgb(43,119,183) !important;"onmouseover="this.style.opacity="0.5";" onmouseout="this.style.opacity="1";">
      <img src="https://static.liqpay.ua/buttons/logo-small.png" name="btn_text"
        style="margin-right: 7px !important; vertical-align: middle !important;"/>
      <span style="vertical-align:middle; !important">Payment 100 UAH</span>
    </button>
   </form>';
  }

  }
}

 $mysql2 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
    $mysql2->query("INSERT INTO `Consultation`(`Id_doctor`, `Id_patient`, `Id_diagnosis`,`date_cons`,`Id_schedule`,`Time_start`,`Time_end`,`Type`)
    VALUES('$Id_doctor', '$Id_patient', '$Id_diagnosis','$date_cons','$Id_schedule','$Time_start','$Time_end','$Type')");
    $mysql2->close();
   
  }
  else{
      echo "время не доступно, выберите другое!";
  }

/*
$mysql = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');


$mysql->query("INSERT INTO `User`(`Login`, `Password`, `Role`)
VALUES('$login', '$Password', '$UserRole')");
$mysql->close();


$mysql2 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
$lookupID = "SELECT Id_user FROM User WHERE Login = '$login'";
$result = mysqli_query($mysql2, $lookupID);
$row = mysqli_fetch_row($result);
$idUser = $row[0];

$mysql2->close();
$mysql3 = new mysqli('localhost','id13682932_hh','123123123-Asd','id13682932_hbd');
$mysql3->query("INSERT INTO `Patient`(`Surname`, `Name`, `DOB`,`Address`, `Email`, `Id_user`)
VALUES('$Surname', '$Name', '$Date', '$Address','$Email','$idUser')");
$mysql3->close();
*/
 ?>
