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

  $staff_name = $_POST['name'];
  $staff_pass = $_POST['pass'];
  $staff_pass2 = $_POST['pass2'];

  $staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
  $staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
  $staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

  if ($staff_name == '') {
    print 'スタッフ名が入力されていません。' . nl2br(PHP_EOL);
  } else {
    print 'スタッフ名: ';
    print $staff_name . nl2br(PHP_EOL);
  }

  if ($staff_pass == '') {
    print 'パスワードが入力されていません。' . nl2br(PHP_EOL);
  }

  if ($staff_pass != $staff_pass2) {
    print 'パスワードが一致しません。' . nl2br(PHP_EOL);
  }

  if ($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2) {
    print '<form>';
    print '<input class="btn btn-outline-secondary" type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  } else {
    $staff_pass = md5($staff_pass);
    print '<form method="POST" action="staff_add_done.php">';
    print '<input type="hidden" name="name" value="' . $staff_name . '">';
    print '<input type="hidden" name="pass" value="' . $staff_pass . '">' . nl2br(PHP_EOL);
    print '<input class="btn btn-outline-secondary" type="button" onclick="history.back()" value="戻る">';
    print '<input class="btn btn-primary" type="submit" value="OK">';
    print '</form>';
  }
  ?>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>