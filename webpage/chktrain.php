<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Train</title>
    <link rel="stylesheet" href="mystyles.css"/>
    <script src="myscript.js"></script>
</head>
<body>
  <div style=" margin: auto; ">
    <h1 id="he1"> Online Ticket Reservation System<br></h1>
    <h3 id="he1">Software Engineering Laboratory <br></h3>
    <h2 id="he1"> Check Train</h2>
  </div>
  <form id="form_body" action="/train.php" style="height:200px;width:280px;margin:auto;"method="POST">
    <div  style=" height:40px;margin-left:15px;"><br>
      <label for ="From:">From:</label>
        <?php
          require_once "sqlconnect.php";
          $sql = "SELECT * FROM station";
          $stmt = $pdo->prepare($sql);
          $stmt->execute();
          $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
          echo "<select name='frst' id='fromst'>\n";
          echo "<option value='0'>Choose an option:</option>";
          foreach($rows as $row) {
            echo ("<option value=");
            echo $row['station_id'];
            echo ('>'.$row['title'].'-'.$row['st_code'].'</option>');
          }
          echo "</select>";
        ?>
    </div><br>
    <div  style="height:40px;margin-left:15px;">
      <label for = 'To:'> To:</label>
      <?php
        echo "<select name='tost'style='margin-left:15px;'>\n";
        echo "<option value='0'>Choose an option:</option>";
        foreach($rows as $row) {
          if($row['station_id']== $_POST['frst'])
            continue;
          echo ("<option value=");
          echo $row['station_id'];
          echo ('>'.$row['title'].'-'.$row['st_code'].'</option>');
        }
        echo "</select>";
      ?>
    </div>
    <div style="height:40px;margin-left:13px;">
      <label for='Day:'>Day:</label>
      <?php
      $sql = "SELECT * FROM day";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
      echo "<select name='day' id='dayselect'style='margin-left:10px;'>\n";
      echo "<option value='0'>Choose an option:</option>";
      foreach($rows as $row) {
        echo ("<option value=");
        echo $row['day_id'];
        echo ('>'.$row['days'].'</option>');
      }
      echo "</select>";
      ?>
    <br><br>
    <input type='submit' value='Submit'style="margin-left:50px"/>
  </div>
  </form>
</body>
</html>
