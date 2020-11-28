<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Train</title>
    <link rel="stylesheet" href="mystyles.css"/>
    <script src="myscript.js"></script>
</head>
<body>
  <div id="form_page">
    <h1 id="he1"> Online Ticket Reservation System</h1>
    <h3 id="he1">Software Engineering Laboratory <br></h3>
    <h2 id="he1"> Check Train</h2>
  </div>
  <div>
    <form id="form_body" method="post">
      <label for ="station">From:</label>
        <?php
          require_once "sqlconnect.php";
          $sql = "SELECT * FROM station";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo "<select name='frst' id='fromst'>"
          foreach($rows as $row) {
            echo "<option value=".$row['station_id'].'>'.$row['title'].'-'.$row['st_code'].'</option>';
          }
          ?>

</body>
</html>
