<?php include("./header.php"); ?>

<section class="title">
    <?php if($page->editable()) echo "<p><a href='$page->editURL'>Edit</a></p>"; ?>
    <h1><?php echo $page->title; ?></h1>
    <div class="date fa fas fa-calendar">
        <span><?php echo $page->startdate;?></span> 
        <span> - </span> 
        <span><?php echo $page->enddate;?></span>
        <span> / </span> 
        
        <a class="strava-link"  target="_blank"  href="https://www.strava.com/routes/<?php echo $page->routeID ?>">Show route on Strava</a>

    </div>
</section>
<!--<nav class="menu">
    <ul>
        <li data-page="#info" class="active">Info</li>
        li data-page="#result">Resultatliste</li>
        <li data-page="#join">Registrering</li>
    </ul>
</nav>-->
<section data-type="page" id="info" class="content active">
    
    <div class="dashboard">
        <div class="dashboard__about">
            <section>
            <?php 
            if($page->isStravaConnected()) {
                ?>    <div id="myActivities">
                <button type="button">Hent mine forsøk</button>
                <img class="loader" style="display: none; margin: 0 auto;" src="<?php echo $config->urls->templates?>images/Gear Set-3.5s-200px.gif" />
            </div><?php
            } else {
                ?>
                Du må <a class="strava-link" href="<?php echo $page->strava('url'); ?>">koble deg mot Strava</a> for å registrere løp
            <?php
            }
            ?>
        </section>
            <!--<h3>&nbsp;</h3><p><?php echo $page->about; ?></p>-->
        </div>
        <div class="dashboard__stats">
            <div><h3>distance</h3> <p><?php echo $page->distance;?></p></div>
            <div><h3>elevation</h3> <p><?php echo $page->elevation;?></p></div>
        </div>
    </div>
    <section class="segments">
        <h2>Segmenter</h2>
        <div class="segments__table">
            <div class="segments__head segments__row">
                <div class="segments__row-title">Navn</div>
                <div>dst</div>
                <div>hm</div>
                <div></div>
            </div>
            <?php
            $counter = 0;
            foreach($page->segments as $item) {
                $counter++;
            ?>
                <div class="segments__row">
                    <div class="segments__row-title">
                        <?php echo $counter ?> 
                        <span> / </span> 
                        <a target="_blank" href="https://www.strava.com/segments/<?php echo $item->{segmentID} ?>">
                            <?php echo $item->{title};?>
                        </a>
                    </div>
                    <div><?php echo $item->{distance};?> m</div>
                    <div><?php echo $item->{elevation};?> m</div>
                    <div><a class="strava-link" target="_blank" href="https://www.strava.com/segments/<?php echo $item->{segmentID} ?>">vis</a></div>
                </div>
            <?php 
            } 
            ?>
        </div>
    </section>
    <section style="margin-top: 3rem;">
            <h2>Resultater</h2>

    <div class="result__wrapper">
        <div class="result__table">
        <div class="result__row result__head">
            <div class="result__cell">#</div>
            <div style="text-align: left;" class="result__cell">Løper</div>
            <!--<div class="result__cell">Tidbruk løype</div>-->

            <?php
            $count = 0;
            foreach($page->segments as $segment) {
                $count++;
                ?><div data-segment-title="<?php echo $segment->title ?>" class="result__cell">#<?php echo $count ?></div><?php
            }
            ?>
            <div class="result__cell">Sammenlagt</div>
        </div>
    <?php
    $plassering = 1;
    foreach($page->children('template=effort, sort=sum') as $child) {
        ?>
        <div class="result__row">
            <div class="result__cell"><?php echo $plassering ?></div>
            <div  style="text-align: left;" class="result__cell"><?php echo $child->athlete_name ?></div>
            <!--<div class="result__cell">(<?php echo timeFormat($child->time) ?>)</div>-->
            <?php
            foreach($child->segments_effort as $segment) {
                ?><div class="result__cell"><?php echo timeFormat($segment->time) ?></div><?php
            }
            ?>
            <div class="result__cell"><?php echo timeFormat($child->sum) ?></div>
        </div>
        <?php 
        $plassering++;
    } ?>
    </div>
</div>
</section>
    
    
</section>






<script>
    function loadUserRuns() {
        $('#myActivities button').hide();
        $('#myActivities .loader').fadeIn();
        $.ajax({url:'<?php echo $config->urls->root?>?webservice', data: {action: 'getFilteredActivities', pageid: <?php echo $page->id ?>}, method: 'get'}).done(function(data){
            $('#myActivities').html(data);
        });
    }
    
    $('#myActivities').on('click', 'button', loadUserRuns);
    
    $('nav.menu').on('click', 'li', function () {
        $('nav.menu li').removeClass('active');
        $(this).addClass('active');
        $('[data-type="page"]').hide();
        $($(this).data('page')).show();
    });
    

</script>

<?php include("./footer.php"); ?>

<?php
function timeFormat($seconds) {
    $hours = floor($seconds / 3600);
    $mins = floor($seconds / 60 % 60);
    $secs = floor($seconds % 60);
    return sprintf('%02d:%02d:%02d', $hours, $mins, $secs);
}










