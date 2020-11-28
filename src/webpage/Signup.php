<?php

require_once "sqlconnect.php";
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
      <input type="text" placeholder-"Enter Email ID" name="email" required><br>
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
