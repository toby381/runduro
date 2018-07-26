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
            <div>
                <div><a href="/runduro"><img class="logo" src="<?php echo $config->urls->templates?>images/runduro.png" /></a></div>
                <?php
                if(!isset($_COOKIE["code"])) {
                    ?>
                    <div><a href="<?php echo $page->strava('url'); ?>"><img width="124" src="<?php echo $config->urls->templates?>images/LogInWithStrava.png" /></a></div>
                <?php } else {
                    ?>
                    <div><?php echo $page->strava('user')->athlete->firstname . ' ' . $page->strava('user')->athlete->lastname;;  ?></div>
                <?php }?>
            </div>
            <h1><?php echo $page->title; ?></h1>
            <?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
            
        </section>