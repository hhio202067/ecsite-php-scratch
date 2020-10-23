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
    $pro_code = filter_input(INPUT_POST, 'code');
    $pro_name = filter_input(INPUT_POST, 'name');
    $pro_price = filter_input(INPUT_POST, 'price');
    $pro_picture_name_old = filter_input(INPUT_POST, 'picture_name_old');
    $pro_picture_name = filter_input(INPUT_POST, 'picture_name');
   
    $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'UPDATE mst_product SET name=?,price=?,picture=? WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[] = $pro_name; 
    $data[] = $pro_price; 
    $data[] = $pro_picture_name; 
    $data[] = $pro_code;
    $stmt->execute($data);

    $dbh = null;

    if ($pro_picture_name_old !== '') {
      unlink('./picture/'.$pro_picture_name_old);
    }
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
  <a href='pro_list.php' class="btn btn-secondary">戻る</a>


  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>