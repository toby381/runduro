<?php include("./header.php"); ?>

<section class="content">
    <p><?php echo $page->about; ?></p>
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
</section>


<?php include("./footer.php"); ?>
