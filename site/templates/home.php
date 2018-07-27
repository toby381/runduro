<?php include("./header.php"); ?>


<section class="front">
    
    <div class="front__wrapper">
        <h1><span data-label="beta">STIRALLY</span></h1>
        
        <div class="front__ingress"><p>StiRally er en konkurranse på sti der du konkurrerer med andre Strava-løpere på en rute bestående av flere segmenter. </p></div>
    </div>
    
    <div  class="front__eventlist">
    <h2>Konkurranser</h2>
    <ul>
        <?php 
        $events = $pages->find("template=event");
        foreach($events as $event) {?>
        <li><a href="<?php echo $event->url; ?>">
            <div class="front__eventlist-title"><?php echo $event->title; ?></div>
            <div class="date fa fas fa-calendar">
                <span><?php echo $event->startdate;?></span> 
                <span> - </span> 
                <span><?php echo $event->enddate;?></span>
            </div>
            <div class="dashboard__stats">
                <div><h3>segmenter</h3> <p><?php echo count($event->segments);?></p></div>
                <div><h3>distanse</h3> <p><?php echo round($event->distance/1000, 2);?> km</p></div>
            </div>
            </a>
        </li>
        <?php 
       } 
        ?>
    </ul>
        </div>
    
    <!--<div class="front__actions">
        <button  disabled="disabled">Lag konkurranse <div style="font-size:8px;">kommer snart</div></button>
    </div>-->

</section>

<?php include("./footer.php"); ?>
