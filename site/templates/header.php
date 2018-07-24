<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title><?php echo $page->title; ?></title>
        <link href="https://fonts.googleapis.com/css?family=Bevan|Source+Sans+Pro" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
	</head>
	<body>
        <section class="header">
            <a href="/runduro"><img class="logo" src="<?php echo $config->urls->templates?>images/runduro.png" /></a>
            <h1><?php echo $page->title; ?></h1>
            <?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
        </section>