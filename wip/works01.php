<?php
require_once "util.inc.php";

$title = "Photo Gallery";
$mainV = "images/gallery.png";
$link  = "http://zd3d10.sim.zdrv.com/photo_gallery/";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<?php css(); ?>
</head>
<body id="item">
	<main>
        	<h2><?php echo $title; ?></h2>
        	<p id="mainV"><img src="<?php echo $mainV; ?>" alt=""></p>

        	<div>
        		<p>サンプルとして制作した "フォトギャラリー" サイト。</p>
        		<p>フォトグラファーのポートフォリオサイトとして、営業ツールとなるようにデザインした。</p>
        		<p>打ち合わせや、撮影の現場での利用も念頭に置いて、タブレットやスマートフォンでの使い勝手を重視した。</p>
        	</div>

        	<?php if ($link) : ?>
        		<p><a href="<?php echo $link; ?>" target="_blank"><?php echo $title; ?></a></p>
        	<?php endif; ?>
	</main>
</body>
</html>