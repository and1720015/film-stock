# 映画鑑賞記録サイト
「Film Stock」（http://film-stock.sakura.ne.jp/）

2019年9月から自力で作ったサイト。<br>
MySQLに鑑賞した映画の作品名、公開年、レビューなどの項目のデータベースを作りPHPでHTMLに引っ張ってCSSで装飾。<br>
ホーム、作品ページ、各ジャンルの一覧ページで構成。<br>

# 課題

１ジャンル１ファイル（例：SF一覧なら「search_sf.php」）で作っており、WHERE文で指定する項目だけを変えて複製している。<br>
ジャンルは全部で13個あるためこれがかなり嵩張り、変更を加える際も面倒。<br>

作品はGETでIDを取得し「movie.php」一つで表示出来ているので、同様にジャンルも一つのPHPファイルにまとめたい。

ジャンルのタグ一つ一つに各リンクを貼り、クリックでそこへ飛ぶようにしている。動きはそのままに中身をスッキリさせたい。
