<style type="text/css">
div#left_couplet,
div#right_couplet {
	position: absolute;
	border: 1px solid #ccc;
	background-color: #FFF;
	z-index: 1000;
	width: <?php echo $width ?>px;
	height: <?php echo $height ?>px;
	top: -1000px;
	word-break: break-all;
	display:none;
}

div#left_couplet .close_button,
div#right_couplet .close_button {
	position: absolute;
	bottom:0px;
	right:0px;
	margin:2px;
	padding:2px;
	z-index:2000;
}
div#left_couplet .close_button a,
div#right_couplet .close_button a {
	text-decoration:none;
	font-size: 12px;
}
</style>