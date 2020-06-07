<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kategori / Alt Kategori Işlemleri</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>
<body>
<?php
////// ********************************* SQL Baglantısı ******************* /////

require_once "library/db.php";
require_once "library/functions.php";
$category_list = $db->query("SELECT * from category", PDO::FETCH_OBJ)->fetchAll();

?>



<div class="container">
    <h3 class="text-center">Kategori / Alt Kategori Işlemleri</h3>
    <div class="row">
        <div class="col-md-6 jumbotron">
            <h4 class="text-center">Kategori Ekleme</h4>
            <hr>
            <form action="library/category_db.php" method="post">
                <div class="form-group">
                    <label for="">Kategori Adı</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="">Üst Kategori</label>
                    <select name="parent_id"  class="form-control">
                        <option value="0" selected>Yok</option>
                        <?php
                        foreach ($category_list as $item) {?>
                        <option value="<?=$item->id ?>"><?=$item->title ?></option>
                        <?php } ?>
                        </select>
                </div>
                <button type="submit" class="btn btn-primary btn-sm">Kaydet</button>
                <button type="reset" class="btn btn-danger btn-sm">İptal</button>
            </form>
        </div>
        <div class="col-md-6">
         <div class="col-md-11 jumbotron">
             <h4 class="text-center">Kategori Listesi</h4>
             <hr>

            <?php

            draWElements(buildTree($category_list));
            ?>

         </div>
        </div>
    </div>
</div>
</body>
</html>
