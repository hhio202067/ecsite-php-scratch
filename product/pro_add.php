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

    .filebtn {
      width: 150px;
    }
  </style>
</head>

<body>
  <div class="form container">
    <span class="text-center d-block m-3">商品追加</span>
    <form method="POST" action="pro_add_check.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="pro_name">商品名を入力してください</label>
        <input class="form-control" type="text" name="name" placeholder="商品名" id="pro_name">
      </div>
      
      <div class="form-group">
        <label for="pro_price">価格を入力してください</label>
        <input class="form-control" type="text" name="price" placeholder="半角数字" id="pro_price">
      </div>
      
      <div class="form-group">
        <label for="lefile">画像を選択してください。</label>
        <input id="lefile" type="file" style="display:none" name="picture">
        <div class="input-group">
          <input type="text" id="photoCover" class="form-control" placeholder="ファイルを選択">
          <span class="input-group-btn"><button type="button" class="btn btn-outline-info" onclick="$('input[id=lefile]').click();">参照</button></span>
        </div>
      </div>

      <!-- <div class="form-group">
        <label for="pro_picture">画像を選択してください</label>
        <input class="form-control" type="file" name="picture" id="pro_picture">
      </div> -->

      <!-- <div class="form-group">
        <label for="inputFile">ファイルを選択してください</label>
        <div class="custom-file">
          <input type="file" name="picture" class="custom-file-input" id="inputFile">
          <label class="custom-file-label" for="inputFile" data-browse="参照">ファイルを選択またはここにドロップ</label>
        </div>
      </div> -->

      <div class="text-center mt-3">
        <input class="btn btn-outline-secondary mr-2" type="button" onclick="history.back()" value="戻る">
        <input class="btn btn-outline-primary" type="submit" value="OK">
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
  <script>
    bsCustomFileInput.init();
  </script> -->

  <script>
    $('input[id=lefile]').change(function() {
      $('#photoCover').val($(this).val());
    });
  </script>
</body>

</html>