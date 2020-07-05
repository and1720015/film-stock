<!DOCTYPE html>
<html>
<head>
<title>Home | Film Stock</title>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="author" content="">
    
<link rel="stylesheet" href="data/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="page.css">
<script type="text/javascript"  src="data/lib/jquery-3.2.1.min.js" ></script> 
<script src="data/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript"  src="data/js/main.js" ></script> 
<link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.typekit.net/six8ant.css">
<link rel="icon" type="image/png" href="pictures/fabikonfilm.png">
<link href="https://fonts.googleapis.com/css?family=Sawarabi+Gothic&display=swap" rel="stylesheet">
</head>

<body>  
<header class="page-header wrapper" >
<h1>Film Stock</h1>

<nav>
<form method="get">
<input class="form-control form-control-sm" type="text" name="word" placeholder="タイトル検索">
</form>
</nav>
</header>

<!-- NOTICEを非表示 -->
<?php
error_reporting(E_ALL & ~E_NOTICE);
?>

<?php

$dsn = 'mysql:host=localhost;port=8889;dbname=movie01;charset=utf8';
$user = 'root';
$password = 'root';
$PDO = new PDO($dsn, $user, $password); 


// if(isset($_GET['word'])){s
	$word=$_GET["word"];
	$search="'%".$word."%'";
	
// }



try{

$PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

$sql="SELECT * FROM movie_list WHERE watched ORDER BY watched DESC";
$stmt = $PDO->query($sql);
if($search=""){
$sql="SELECT * FROM movie_list WHERE title LIKE ".$search;

// //全検索
// $sql="SELECT * FROM movie_list";
// //URLのクエリーからcategoryを取得
// $getCATEGORY=$_GET["category"];
// //genreが空でなければSQL文を変更して絞り込む
// if($getCATEGORY != ""){
// 	//アクションのみ検索(.で続きを書ける)
// 	$sql.="WHERE category='$getCATEGORY'";
// }
	
}
	
	


?>
	

<div class="tag">
<div class="tag-items">
<a class="tag-item01" href="category.php?category=<?= category('SF') ?>" style="color: #fff; background: #569383;"><span class="tag-top01">SF</span></a>
<a class="tag-item01" href="category.php?category=<?= $row['category'] ?>" style="color: #fff; background: #B0555A;"><span class="tag-top01">アクション</span></a>
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


	<div class="main-contents">
    <div class="contents">
        <div class="movie-grid">
		<?php foreach($stmt as $row){ ?> 
            <div class="movie-item">
                <a href="movie.php?id=<?=$row['id']?>">
                    <div class="movie-item_jacket">
                    <img src="<?=$row['image'] ?>" width="150" height="200">
					</div>
				</a>
                <h3 class="movie-item_title">
					<a href="movie.php?id=<?=$row['id']?>">
					<!-- 改行再現（ただしスタイルもそのまま） -->
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