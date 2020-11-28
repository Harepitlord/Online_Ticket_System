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
  <?php
    require_once "sqlconnect.php";
    if(isset($_GET['frst']) && isset($_GET['tost']) && isset($_GET['day'])) {
      if($_GET['frst']==$_GET['tost']) {
        echo 'Invalid selection of station';
        header('location:chktrain.php');
        exit;
      }
      $first = (int)$_GET['frst'];
      $tostion = (int)$_GET['tost'];
      $dayid = (int)$_GET['day'];
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
      foreach($rows as $row) {
        echo "<b>".$row['name'].'----'.$beg_station.'----'.$end_station.'----'.$day.'----'.$row['pantry']."</b><br>";
      }
    }
  ?>
</body>
</html>
