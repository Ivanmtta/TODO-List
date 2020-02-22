<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  <link href="./styles/site.css" rel="stylesheet">
  <title>TODO List</title>
</head>
<body>
  <?php include_once "database.php"; ?>
  <div class="container pt-5 pb-5 mt-5 area">
    <div class="card border-0">
      <div class="card-header text-center mb-4 p-0 border-0" style="position: relative;">
        <h2 class="text mt-5 ml-5 float-left">TODO List</h2>
        <?php
          $date = date("M d") . ', ' . date("Y");
          $pictureNumber = rand(1, 10);
          echo "<p class='text ml-2'>$date</p>";
          echo "<img class='headerPicture' src='./images/picture" . $pictureNumber . ".jfif'>";
        ?>
      </div>
      <div class="card-body">
        <form class="input-group mb-4" action="index.php" method="POST" onsubmit="return validateInput(this)">
          <input id="note" type="text" class="form-control select" placeholder="What do you need to do today?" name="note" autocomplete="off">
          <div class="input-group-append">
            <input class="btn btn-dark" type="submit" value="Add!" name="add">
          </div>
        </form>
        <ul class="list-group list-group-flush ml-5 pr-5">
          <?php 
            $query = "SELECT * FROM Notes";
            $queryResult = $connection->query($query);
            while($row = $queryResult->fetch_array(MYSQLI_NUM)){
              echo "<input type='hidden' id='doneValue" . $row[0] . "' value='$row[2]'>";
              if($row[2] == 0)
                echo "<li class='list-group-item hoverable' onclick='clicked(this, $row[0])'><i class='icon-check-sign '></i> $row[1]</li>";
              else
                echo "<li class='list-group-item hoverable' onclick='clicked(this, $row[0])'><strike><i class='icon-check-sign '></i> $row[1]</strike></li>";
            }
          ?>
        </ul>
        <form class="text-center float-left" action="index.php" method="POST">
          <input class="btn btn-dark mt-5" type="submit" value="Delete Completed Tasks" name="clear">
        </form>
      </div>
    </div>
  </div>
  <script src="./scripts/site.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>