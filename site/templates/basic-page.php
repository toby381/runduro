<?php include("./header.php"); ?>
<h1><?php echo $page->title; ?></h1>
<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>

<?php include("./footer.php"); ?>
