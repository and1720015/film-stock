<!DOCTYPE html>
<html>
<head>
<title>PANIC</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
    
<link rel="stylesheet" href="data/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="page.css">
<link rel="mysql" type="text/sql" href="database.sql">
<script type="text/javascript"  src="data/lib/jquery-3.2.1.min.js" ></script> 
<script src="data/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript"  src="data/js/main.js" ></script> 
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/six8ant.css">
<link rel="icon" type="image/png" href="pictures/fabikonfilm.png">
</head>

<body>

<header class="page-header wrapper" >
<h1><a href="index.php">Film Stock</a><span><h5>-> Panic</h5></span></h1>
<nav>

</nav>
</header>

<div class="tag">
<div class="tag-items">
<a class="tag-item01" href="search_sf.php" style="color: #fff; background: #569383;"><span class="tag-top01">SF</span></a>
<a class="tag-item01" href="search_action.php" style="color: #fff; background: #B0555A;"><span class="tag-top01">アクション</span></a>
<a class="tag-item01" href="search_horror.php" style="color: #fff; background: #DB9766;"><span class="tag-top01">ホラー</span></a>
<a class="tag-item01" href="search_fantasy.php" style="color: #fff; background: #DAC596;"><span class="tag-top01">ファンタジー</span></a>
<a class="tag-item01" href="search_suspense.php" style="color: #fff; background: #764054;"><span class="tag-top01">サスペンス</span></a>
<a class="tag-item01" href="search_marvel.php" style="color: #fff; background: #554053;"><span class="tag-top01">MARVEL</span></a>
<a class="tag-item01" href="search_dc.php" style="color: #fff; background: #B19297;"><span class="tag-top01">DC</span></a>
<a class="tag-item01" href="search_disney.php" style="color: #fff; background: #626D83;"><span class="tag-top01">ディズニー</span></a>
<a class="tag-item01" href="search_thriller.php" style="color: #fff; background: #8DA0A7;"><span class="tag-top01">スリラー</span></a>
<a class="tag-item01" href="search_anime.php" style="color: #fff; background: #777568;"><span class="tag-top01">アニメ</span></a>
<a class="tag-item01" href="search_drama.php" style="color: #fff; background: #A6A98E;"><span class="tag-top01">ドラマ</span></a>
<a class="tag-item01" href="search_music.php" style="color: #fff; background: #A8D2BC;"><span class="tag-top01">音楽</span></a>
<a class="tag-item01" href="search_panic.php" style="color: #fff; background: #FABDC2;"><span class="tag-top01">パニック</span></a>
</div>
</div>

<?php
$dsn = 'mysql:host=mysql706.db.sakura.ne.jp;port=3306;dbname=film-stock_movie01;charset=utf8';
$user = 'film-stock';
$password = 'and1720015';
$PDO = new PDO($dsn, $user, $password); 

try{
$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      
$sql="SELECT * FROM movie_list WHERE category LIKE '%パニック%' ORDER BY watched ASC";
$stmt = $PDO->query($sql);

?>
	<div class="main-contents">
    <div class="contents">
        <div class="movie-grid">
		<?php foreach($stmt as $row){ ?> 
            <div class="movie-item">
			    <a href="movie.php?id=<?=$row['id']?>">
                    <div class="movie-item_jacket">
                    <img src="<?=$row['image']?>" width="150" height="200">
					</div>
				</a>
                <h3 class="movie-item_title">
				    <a href="movie.php?id=<?=$row['id']?>">
						<pre><p><?=$row['title']?><br><span><?=$row['published']?></span></p></pre>
					</a>
				</h3>
			</div>
		<?php } ?>
		</div>
	</div>
    </div>
<?php
$PDO = null;
} catch (PDOException $e) {
    exit('データベースに接続できませんでした。' . $e->getMessage());
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