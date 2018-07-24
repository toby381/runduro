<?php include("./header.php"); ?>


<section class="content">
    <ul>
<?php 
    $events = $pages->find("template=event");
    foreach($events as $event) {?>
        <li><a href="<?php echo $event->url; ?>"><?php echo $event->title; ?></a></li>
        <?php 
   } 
?>
    </ul>
</section>

<?php include("./footer.php"); ?>
