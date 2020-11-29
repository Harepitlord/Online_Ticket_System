<?php
function convertInt(&$rw,$c) {
  foreach($rw as $r) {
    $r[$c] = (int)$r[$c];
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="myscript.js"></script>
  <title>Train search results</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="mystyles.css"/>
</head>
<body>
  <h1 id="he1">Online Ticket Reservation System</h1>
  <h2 id="he1"> The search result for your specifications:</h2><br><br>
  <?php
    $sno=1;
    require_once "sqlconnect.php";
    if(isset($_POST['frst']) && isset($_POST['tost']) && isset($_POST['day'])) {
      if($_POST['frst']==$_POST['tost']) {
        echo 'Invalid selection of station';
        header('location:chktrain.php');
        exit;
      }
      $first = (int)$_POST['frst'];
      $tostion = (int)$_POST['tost'];
      $dayid = (int)$_POST['day'];
      $sql = "SELECT name,pantry FROM train WHERE beg_station = :first and end_station = :second and day_id = :day";
      $stmt=$pdo->prepare($sql);
      $stmt->execute(array(
        ':first'=>$first,
        ':second'=>$tostion,
        ':day'=>$dayid));
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $sqls = "SELECT * FROM station";
      $stmts = $pdo->prepare($sqls);
      $stmts->execute();
      $rowss = $stmts->fetchAll(PDO::FETCH_ASSOC);
      convertInt($rowss,'station_id');
      $beg_station = $rowss[$first-1]['title'];
      $end_station = $rowss[$tostion-1]['title'];
      $sqld = "SELECT * FROM day";
      $stmtd = $pdo->prepare($sqld);
      $stmtd->execute();
      $rowsd = $stmtd->fetchAll(PDO::FETCH_ASSOC);
      convertInt($rowsd,'day_id');
      $day = $rowsd[$dayid-1]['days'];
      // echo "<tb>" Table Intialization
      echo "<table id='tabe1'> <tr>";
      echo "<th>Sno:</th><th>Train name:</th><th>From Station:</th><th>To Station:</th><th>Frequency</th><th>Pantry</th></tr>";
      foreach($rows as $row) {
        echo "<tr><td>".$sno++."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$beg_station."</td>";
        echo "<td>".$end_station."</td>";
        echo "<td>".$day."</td>";
        echo "<td>".$row['pantry']."</td></tr>";
      }
    }
    else{
      header('Location: index.html');
    }
  ?>
</body>
</html>
