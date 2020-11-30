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
  if($stmt->rowCount() > 0) {
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if(strnatcmp($rows['pass'],$_POST['psw'])!=0) {
      echo "Incorrect password\n";
    }
    else
      header("Location: chktrain.php");
      exit;
  }
  else
    echo "Incorrect email / username\n";
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
<form method="post" style="left:200;margin:auto;padding:20px;padding-left:400px;">
  <div id="form_body" style="height:450px;width:500px" >
    <h1 id="he1"> Online Ticket Reservation System</h1>
    <h3 id="he1">Software Engineering Laboratory <br></h3>
    <h2 id="he1"> Login</h2><br><br>
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required><br>
    <br><label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required><br>
    <button type="submit">Login</button><br>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
</form>
</body>
</html>
