<?php include("./header.php"); ?>
<h1><?php echo $page->title; ?></h1>
<div>
<?php foreach($page->segments as $item) {
?>
        <p><?php echo $item->{title};?></p>
        <p>Distance: <?php echo $item->{distance};?></p>
        <p>Elevation: <?php echo $item->{elevation};?></p>
    <?php } 
    ?>
</div>
<?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>

<?php include("./footer.php"); ?>
