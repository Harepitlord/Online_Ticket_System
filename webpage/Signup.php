<?php
require_once "sqlconnect.php";
if(isset($_POST['uname']) && isset($_POST['email']) && isset($_POST['psw']))) {
  $sql1= "SELECT uname from  users where users.uname = :uname";
  $sql2= "SELECT email from users where users.email = :email";
  $stmt1 = $pdo->prepare($sql1);
  $stmt2 = $pdo->prepare($sql2);
  $stmt1 = execute(array(':uname' => $_POST['uname']));
  $stmt2 = execute(array(':email' => $_POST['email']));
  if((stmt1->rowCount() > 0) && (stmt2->rowCount() > 0))
    echo "Username and Email already exists\n";
  else if($stmt1->rowCount() > 0)
    echo "Username already exists \n";
  else if($stmt2->rowCount() > 0)
    echo "Email already exists \n";
  else {
    $sql = "INSERT INTO users (uname,email,pass)
              values (:uname,:email,:pass)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
      ':uname' => $_POST['uname'],
      ':email' => $_POST['email'],
      ':pass'  => $_POST['psw'] ));
    header("location: chktrain.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="mystyles.css"/>
    <script src="myscript.js"></script>
</head>
<body>
  <div id="head">
    <h1 id="he1"> Online Ticket Reservation System</h1>
    <h3 id="he1">Software Engineering Laboratory <br></h3>
    <h2 id="he1"> Signup</h2>
  </div>
  <form method="post">
  <div id="form_page">
    <div id="form_body">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required><br>
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder-"Enter Email ID" name="email" required><br>
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required><br>
      <label for="rpsw"><b>Re-enter Password</b></label>
      <input type="password" placeholder="Enter Password" name="rpsw" required><br>
      <button type="submit">Signup</button><br>
    </div>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" class="cancelbtn">Cancel</button>
    </div>
  </form>
</body>
</html>
