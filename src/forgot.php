
<html>
<head>
<link rel="stylesheet" type="text/css" media="screen" href="login.css" />
</head>
<body>
<?php

include ("mail.php");
include ("header.php");
include ("../config/database.php");

if ($_SESSION['login'])
    echo "<meta http-equiv='refresh' content='0;url=login.php' />";
if ($_GET['email'] && $_GET['login']) {
    getHead();
    $conn = getDB();
    $sql = "SELECT * FROM Users WHERE login = '" . $_GET['login'] . "';";
        foreach ($conn->query($sql) as $user) {
          if ($user['login'] == $_GET['login']) {
               mail_ver($user['id'] . "&action=fg", $_GET['email']);
               echo "Please click the link that was emailed to you.<meta http-equiv='refresh' content='3;url=login.php' />";
          }
          else
               echo "Wrong username. <meta http-equiv='refresh' content='3;url=login.php' />";
          }
        echo " Try again.. <meta http-equiv='refresh' content='3;url=login.php' />";
    }
else {
    getHead();
    echo "<div class='center'>
 <center id='login'>
 <form action='forgot.php' method='GET'>
 <br>
 <input id='login' style='width: 160px;' type='text' name='login' placeholder='Enter login' required><br>
 <br><br><br><br>
 <div class='center'>
 <input id='email' style='width: 160px;' type='text' name='email' placeholder='Enter email' required><br><br>
 </div>
 <input class='button' type='submit' value='Submit' style='margin-top: 10px;'>
 </form>
 </center>
 <div>"; 
}
?>

<html>
<head>
<link rel="stylesheet" href="css/login.css">
<title>Forgot Password</title>
</head>
<body >
    
</body>
<footer class="footer">Camagru 2018</footer>
</html>
