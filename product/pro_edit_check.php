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
  
  $pro_code = $_POST['code'];
  $pro_name = $_POST['name'];
  $pro_price = $_POST['price'];
  $pro_picture_name_old = $_POST['picture_name_old'];
  $pro_picture = $_FILES['picture'];

  $pro_code = htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
  $pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
  $pro_price = htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');
  $pro_picture_name_old = htmlspecialchars($pro_picture_name_old, ENT_QUOTES, 'UTF-8');
  $pro_picture['name'] = htmlspecialchars($pro_picture['name'], ENT_QUOTES, 'UTF-8');

  if ($pro_name == '') {
    print '商品名が入力されていません。' . nl2br(PHP_EOL);
  } else {
    print '商品名: ';
    print $pro_name . nl2br(PHP_EOL);
  }

  if (preg_match('/^[\d]+$/', $pro_price) == 0) {
    print '価格は半角数字のみで入力してください' . nl2br(PHP_EOL);
  }

  if ($pro_picture['size'] > 0) {
    // ネスト
    if ($pro_picture['size'] > 1000000) {
      print '画像が大きすぎます。';
    } else {
      // $data['tmp_name']には仮にアップロードされている場所と名前
      // move_uploaded_file(移動元, 移動先)
      move_uploaded_file($pro_picture['tmp_name'], './picture/' . $pro_picture['name']);
      print '<img src="./picture/' . $pro_picture['name'] . '">';
      print '<br />';
    }
  }

  if ($pro_name == '' || preg_match('/^[\d]+$/', $pro_price) == 0 || $pro_picture['size'] > 1000000) {
    print '<form>';
    print '<input class="btn btn-outline-secondary" type="button" onclick="history.back()" value="戻る">';
    print '</form>';
  } else {
    print '上記の内容で修正します。<br />';
    print '<form method="POST" action="pro_edit_done.php">';
    print '<input type="hidden" name="code" value="' . $pro_code . '">';
    print '<input type="hidden" name="name" value="' . $pro_name . '">';
    print '<input type="hidden" name="price" value="' . $pro_price . '">';
    print '<input type="hidden" name="picture_name_old" value="' . $pro_picture_name_old . '">';
    print '<input type="hidden" name="picture_name" value="' . $pro_picture['name'] . '">';
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