<?php
function  h($strings) {
	return htmlspecialchars($strings);
}
function css() {
	echo '
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/wider.css"
 media="screen and (min-width: 1367px)">
 	<link rel="stylesheet" type="text/css" href="css/portrait.css"
 media="screen and (orientation: portrait)">
	';
}