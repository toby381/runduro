<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $page->title; ?></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400|Rubik:400,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo $config->urls->templates?>styles/main.css" />
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>
	<body>
        <?php if($page->id != 1) { ?>
        <section class="header">
            <div class="logo"><a href="/stirally">STIRALLY</a></div>

            <div class="login"> 
                <?php
                if($page->isStravaConnected()) {
                    ?>
                    <div><?php echo $page->strava('user')->athlete->firstname . ' ' . $page->strava('user')->athlete->lastname;  ?></div>
                <?php } else {
                    ?>
                    <div><a href="<?php echo $page->strava('url'); ?>"><img width="124" src="<?php echo $config->urls->templates?>images/LogInWithStrava.png" /></a></div>
                <?php }?>
            </div>

        </section>
        <?php } ?>