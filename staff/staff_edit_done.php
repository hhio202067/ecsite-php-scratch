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

    // どっちでもいけるよ
    // $staff_code = $_POST['code'];
    // $staff_name = $_POST['name'];
    // $staff_pass = $_POST['pass'];    
    // $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
    // $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');

    // どっちでもいけるよ
    $staff_code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
    $staff_name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
    $staff_pass = filter_input(INPUT_POST, 'pass', FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_FLAG_NO_ENCODE_QUOTES);
   
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE mst_staff SET name=?,password=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    // $data = [$staff_name, $staff_pass, $staff_code];
    // var_dump($data);
    $data[] = $staff_name; // テーブルの構造を考えろ varchar(15)を超えたらエラーです。
    $data[] = $staff_pass; 
    $data[] = $staff_code;
    $stmt->execute($data);

    $dbh = null;

  }
  catch (Exception $e) 
  {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    var_dump($_POST);
    exit();
  }

  ?>

  修正しました。<br/>
  <br/>
  <a href='staff_list.php' class="btn btn-secondary">戻る</a>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>