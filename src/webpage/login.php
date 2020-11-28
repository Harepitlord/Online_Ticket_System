<?php
require_once "sqlconnect.php";
if(isset($_POST['uname']) && isset($_POST['psw'])) {
  $uname = $_POST['uname'];
  if(strstr($uname,'@'))
    $sql = "SELECT email,pass from users where users.email = :email";
  else
    $sql = "SELECT uname,pass from users where users.uname = :email";

  $stmt = $pdo->prepare($sql);
  $stmt->execute(array(':email'=> $uname));
  $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
  if(strnatcmp($rows['pass'],$_POST['psw'])!=0) {
    echo "Incorrect password\n";
  }
  else
    header("Location: login.php");
    exit;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="mystyles.css"/>
    <script src="myscript.js"></script>
</head>
<body>
  <div id="head">
    <h1 id="he1"> Online Ticket Reservation System</h1>
    <h3 id="he1">Software Engineering Laboratory <br></h3>
    <h2 id="he1"> Login</h2>
  </div>
<form method="post">
<div id="form_page">
  <div id="form_body">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required><br>
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
    <button type="submit">Login</button><br>
    <label>
  </div>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>
  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</body>
</html>
