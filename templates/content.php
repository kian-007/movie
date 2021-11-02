<?php

        
        
if(!$something && !$rate_filter):
    $movies = get_all();
elseif(!$rate_filter):
    $movies = search($something, false);
else:
    $movies = search($something, true);
endif;
$counter = 0;
foreach ($movies as $movies) { ?>
    <div id="first_div">
        <p> 
            <?php
                echo $counter."- ".$movies['movies_title'];
            ?>
        </p>
<!--                <pre>        </pre>-->
        <span id="rate"><?php echo "----".$movies['rate']."----".'<br>'; ?></span>
    </div>
    <?php 
    $counter += 1;
}




