<!DOCTYPE html>
<html>
<head>
<title>Works | Film Stock</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" href="data/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
<script type="text/javascript"  src="data/lib/jquery-3.2.1.min.js" ></script> 
<script src="data/bootstrap/js/bootstrap.min.js"></script> 
<script type="text/javascript"  src="data/js/main.js" ></script>
<link rel="stylesheet" href="https://use.typekit.net/six8ant.css">
<link rel="icon" type="image/png" href="pictures/fabikonfilm.png">
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
</head>

<body>
<?php
$dsn = 'mysql:host=localhost;port=8889;dbname=movie01;charset=utf8';
$user = 'root';
$password = 'root';
$PDO = new PDO( $dsn, $user, $password ); //MySQLのデータベースに接続

//URLクエリーからパラメーターを取得
$getID = $_GET[ "id" ];

try {
  $PDO->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); //PDOのエラーレポートを表示

  $sql = "SELECT * FROM movie_list WHERE id='$getID'";
  $stmt = $PDO->query( $sql );
  ?>
<?php foreach($stmt as $row){ ?>
<div class="wrap">
  <div id="about" class="clearfix">
    <h2>
      <?=$row['title'] ?>
      <br>
      <span>
      <?=$row['title_org'] ?>
      </span> </h2>
    <div id="about-main" class="clearfix">
      <div id="mainstill"> <img src="<?=$row['image'] ?>"> </div>
      <div id="maintext">
        <h3>
          <?=$row['story'] ?>
        </h3>
		  <h6><?=$row['category'] ?></h6>
        <!--<div class="tag">
          <div class="tag-items"> <a class="tag-item01" href="search_dc.php" style="color: #fff; background: #B19297;"><span class="tag-top01">DC</span></a> <a class="tag-item01" href="search_suspense.php" style="color: #fff; background: #764054;"><span class="tag-top01">サスペンス</span></a> </div>
        </div>-->
        <?=$row['review'] ?>
        (
        <?=$row['watched'] ?>
        )
        <div id="cast">
          <h3>STAFF & CAST</h3>
          <p> 監督　
            <?=$row['director'] ?>
            <br>
            出演　
            <?=$row['actor'] ?>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?>
<?php
$PDO = null;
}
catch ( PDOException $e ) {
  exit( 'データベースに接続できませんでした。' . $e->getMessage() );
}

?>
</div>
<fotter class="fotter">
        <div class="wrapper">
          <p><small>&copy; 2020 Ando Works</small></p>
        </div>
      </fotter>
</body>
</html>