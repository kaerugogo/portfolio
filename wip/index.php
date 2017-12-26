<?php
require_once "util.inc.php";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>Hirokazu Tsutsumi Portfolio</title>
	<?php css(); ?>
</head>
<body class="preload">
<div id="wraper">
	<div id='outerIframe' class="">
		<span class="closer">×</span>
	</div>
	<input type="radio" name="swDisplay" id="swHome">
	<input type="radio" name="swDisplay" id="swAbout">
	<input type="radio" name="swDisplay" id="swWorks">
	<input type="radio" name="swDisplay" id="swContact">
	<h1 id="toHome"><label for="swHome">Hirokazu Tsutsumi Portfolio</label></h1>
	<nav>
		<ul>
			<li id="navAbout"><label for="swAbout">About</label></li>
			<li id="navWorks"><label for="swWorks">Works</label></li>
			<li id="navContact"><label for="swContact">Contact</label></li>
		</ul>
	</nav>
	<div id="partA"></div>
	<div id="partB"></div>
	<div id="partC">
		<section>
			<p>このページは、塘博一のポートフォリオページです。</p>
			<br>
			<p>スキル一覧</p>
			<p>言語、ツール等</p>
			<ul>
				<li>HTML5</li>
				<li>CSS3</li>
				<li>PHP</li>
				<li>JavaScript</li>
				<li>MySQL</li>
				<li>Emmet</li>
				<li>Saas</li>
				<li>jQuery</li>
				<li>Bootstrap</li>
				<li>phpMyAdmin</li>
				<li>Sublime Text</li>
				<li>Eclipse</li>
				<li>PhotoShop</li>
				<li>Illusutorator</li>
				<li>WordPress</li>

			</ul>
		</section>
	</div>
	<div id="partD">
		<section>
		</section>
	</div>
	<div id="partE">
		<section>

			<article>
				<h3><a href="works01.php" data-href="works01.php" class="toItem">Photo Gallery</a></h3>
				<p>サンプルとして制作した "フォトギャラリー" サイト</p>
				<figure>
					<img src="images/gallery.png" class="vertical">
				</figure>
			</article>

			<article>
				<h3><a href="works02.php" class="toItem">各項目のタイトル</a></h3>
				<p>各項目の説明的なものを...</p>
				<figure>
					<img src="images/2016-09-21_155835.jpg" class="vertical">
				</figure>
			</article>


			<article>
				c
			</article>
			<article>
				d
			</article>
			<article>
				e
			</article>
			<article>
			</article>
			<article>
			</article>
			<article>
			</article>
			<article>
			</article>
			<article>
			</article>
			<article>
			</article>
			<article>
				test8
			</article>

		</section>
	</div>

</div>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="js/util.js" type="text/javascript"></script>
</body>
</html>