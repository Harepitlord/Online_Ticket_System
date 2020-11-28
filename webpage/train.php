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
  echo "hello world world";
    require_once "sqlconnect.php";
    var_dump($_POST);
    if(isset($_POST['frst']) && isset($_POST['tost']) && isset($_POST['day'])) {
      $first = (int)$_POST['frst'];
      $tostion = (int)$_POST['tost'];
      $dayid = (int)$_POST['day'];
      echo $_POST['frst'];
      var_dump($_POST);
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
      $beg_station = $rowss[$first];
      $end_station = $rowss[$tostion];
      $sqld = "SELECT * FROM day";
      $stmtd = $pdo->prepare($sqld);
      $stmtd->execute();
      $rowsd = $stmtd->fetchAll(PDO::FETCH_ASSOC);
      $day = $rowsd[$dayid];
      echo "<pre>\n";
      foreach($rows as $row) {
        echo "<b>".$row['name'].'----'.$beg_station.'----'.$end_station.'----'.$day.'----'.$row['pantry']."</b><br>";
      }
    }
    echo "end of file";
  ?>
</body>
</html>
