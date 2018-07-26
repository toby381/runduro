<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/header.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>

<section class="content">
    <p><?php echo $page->about; ?></p>
    <p>Start date: <?php echo $page->startdate;?></p>
    <p>End date: <?php echo $page->enddate;?></p>
    <p>Total distance: <?php echo $page->distance; ?></p>
    <p>Total elevation: <?php echo $page->elevation; ?></p>
    <p><a class="strava-link"  target="_blank"  href="https://www.strava.com/routes/<?php echo $page->routeID ?>">Show route on Strava</a></p>
    
    <div class="segmentlist">
        <h2>Segmenter / </h2>
    <?php
    $counter = 0;
    foreach($page->segments as $item) {
        $counter++;
    ?>
        <div class="segment">
            <h2><?php echo $counter . '::'. $item->{title};?></h2>
            <p>Distance: <?php echo $item->{distance};?></p>
            <p>Elevation: <?php echo $item->{elevation};?></p>
            <p><a class="strava-link" target="_blank" href="https://www.strava.com/segments/<?php echo $item->{segmentID} ?>">Show on Strava</a></p>
        </div>
    <?php 
    } 
    ?>
    </div>
    
    <div>
    <?php
    if(isset($_COOKIE["code"])) {
        foreach($page->activities() as $item) {?>
            <li><?php echo $item->name ?></li>
        <?php 
        } 
    }
        ?>
    </div>
</section>


<?php include(\ProcessWire\wire('files')->compile(\ProcessWire\wire("config")->paths->root . "site/templates/footer.php",array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>
