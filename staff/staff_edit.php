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
    try
    {
      $staff_code = $_GET['staffcode'];

      $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
      $user = 'root';
      $password = '';
      $dbh = new PDO($dsn, $user, $password);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = 'SELECT name FROM mst_staff WHERE code=?';
      $stmt = $dbh->prepare($sql);
      $data[] = $staff_code;
      $stmt->execute($data);

      $rec = $stmt->fetch(PDO::FETCH_ASSOC);
      $staff_name = $rec['name'];

      $dbh = null;
    }
    catch (Exception $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      exit();
    }
  ?>

  <div class="form container">
    <span class="text-center d-block m-3">スタッフ修正</span>
    <form method="POST" action="staff_edit_check.php">
      <input type="hidden" name="code" value="<?php print $staff_code; ?>">
      <div class="form-group">
        <label>スタッフコード</label>
        <input class="form-control" type="text" value="<?php print $staff_code; ?>" readonly>
      </div>
      <div class="form-group">
        <label>スタッフ名</label>
        <input class="form-control" type="text" name="name" placeholder="名前" value="<?php print $staff_name; ?>">
      </div>
      <div class="form-group">
        <label>パスワードを入力してください</label>
        <input class="form-control" type="password" name="pass" placeholder="半角英数8文字以上">
      </div>
      <div class="form-group">
        <label>パスワードをもう一度入力してください</label>
        <input class="form-control" type="password" name="pass2" placeholder="パスワードの確認">
      </div>
      <div class="text-center mt-3">
        <input class="btn btn-outline-secondary mr-2" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-outline-primary" type="submit" value="OK">
      </div>
    </form>
  </div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>