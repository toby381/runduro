<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/header.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>


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

<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/footer.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>
