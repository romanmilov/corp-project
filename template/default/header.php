<!doctype html>

<html>

<head>

<meta charset="utf-8">

<meta name="description" content="<?=$discription;?>" />

<meta name="keywords" content="<?=$keywords;?>" />

<?php if($styles) :?>

	<?php foreach($styles as $style) :?>

		<link rel="stylesheet" type="text/css" href="<?=$style;?>" />

	<?php endforeach;?>

<?php endif; ?>

<?php if($scripts) :?>

	<?php foreach($scripts as $script) :?>

		<script type="text/javascript" src="<?=$script?>"></script>

	<?php endforeach;?>

<?php endif; ?>



<title><?=$title;?></title>

</head>



<body>

<div class="karkas-main">

<div class="karkas">

	<div class="main">

		<div class="header">

			<a href="<?=SITE_URL;?>"><img src="<?=SITE_URL.VIEW;?>images/logo.png" class="logo" alt="Արմ-Շին | Էներգո"></a>

			<ul class="menu">

				<li><a href="<?=SITE_URL;?>catalog/type/<?=$header_menu[0]['type_id']?>" class="step1"><span class="menu_links_text"><?=$header_menu[0]['type_name']?></span></a></li>

				<li><a href="<?=SITE_URL;?>catalog/type/<?=$header_menu[1]['type_id']?>" class="step2"><span class="menu_links_text1"><?=$header_menu[1]['type_name']?></span></a></li>

				<li><a href="<?=SITE_URL;?>catalog/type/<?=$header_menu[2]['type_id']?>" class="step3"><span class="menu_links_text2"><?=$header_menu[2]['type_name']?></span></a></li>

				<li><a href="<?=SITE_URL;?>catalog/type/<?=$header_menu[3]['type_id']?>" class="step4"><span class="menu_links_text3"><?=$header_menu[3]['type_name']?></span></a></li>

			</ul>

			<div class="search">

				<p>Որոնում կայքում ...</p>

				<form action="<?=SITE_URL?>search" method="POST">

					<img src="<?=SITE_URL.VIEW;?>images/loopa.gif" alt="">

					<input class="inpt" type="text" name="txt1" />

					<input type="image" src="<?=SITE_URL.VIEW;?>images/search.gif" name="go" />

				</form>

			</div>

		</div>