<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>ろくまる農園</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <style>
    .btn {
      width: 80px;
    }

    .form {
      max-width: 440px;
    }
  </style>
</head>

<body>

  <?php
  try {
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM mst_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    print 'スタッフ一覧</br></br>';

    print '<form method="POST" action="staff_branch.php">';
    while (true) {
      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($rec == false) {
        break;
      }
      print '<input type="radio" name="staffcode" value="' . $rec['code'] . '">';
      print $rec['name'] . nl2br(PHP_EOL);
      print '<input type="submit" name="edit" value="修正" class="btn btn-outline-warning">';
      print '<input type="submit" name="delete" value="削除" class="btn btn-outline-danger">';
      }
  } catch (Exception $e) {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>