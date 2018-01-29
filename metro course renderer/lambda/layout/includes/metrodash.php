<!--
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
-->
<!--<hr>-->
<div id="page-cnt-up" style="margin-top:40px;">
    <?php
    global $USER, $CFG;
    require_once("{$CFG->libdir}/completionlib.php");

    $salute = 'Hi';
    $course = enrol_get_my_courses();
    $currtime = time();
    ?>

           <!--<h1 class="mlistname"> <?php echo $salute . ' ' . $USER->firstname . ' ' . $USER->lastname; ?> </h1>
           <p style="font-size:15px">Welcome to your CBSI Online Training Academy!. This page outlines your personal training course at your Academy. <br> <br></p>
    -->		
    <div class="row-fluid">
        <!--<div class="">
                <section id="region-main-sitenews" class="">
                        <h2><i class="fa fa-folder-open-o fa-5"></i> Site News </h2>
        <?php
        global $CFG, $DB;
        require_once($CFG->libdir . '/blocklib.php');
        require_once($CFG->dirroot . '/blocks/moodleblock.class.php');
        //require_once($CFG->dirroot.'/blocks/badges/block_badges.php');
        $id = 'site-index';
        $instance = $DB->get_record('block_instances', array('pagetypepattern' => $id));
        $blockname = 'sitenews';
        $object2 = block_instance($blockname, $instance);

        echo $object2->get_content()->text;
        ?>
                </section>
        <hr>
        </div>-->
    </div>

    <div class="row-fluid">	   
        <div class="container-fluid">
            <div class="span12">
                <h2><i class="fa fa-folder-open-o fa-5"></i> <?php echo get_string('enrlist','theme_lambda'); ?> </h2>
            </div>
        </div>
    </div>
    <div class="panel panel-default">

        <ul id="myTab" class="nav nav-tabs" role="tablist">
            
            <li class="active">
                <a data-toggle="tab" role="tab" href="#profile"><h3><?php echo get_string('metrotrainings','theme_lambda'); ?></h3></a>
            </li>
			<li class="">
                <a data-toggle="tab" role="tab" href="#home"><h3><?php echo get_string('metromeetings','theme_lambda'); ?></h3></a>
            </li>
            <li class="">
                <!--<a data-toggle="tab" role="tab" href="#shared"><h2>Shared Open</h2></a> -->
            </li>
            <li class="">
                <a data-toggle="tab" role="tab" href="#more"><h3><?php echo get_string('metrocompleted','theme_lambda'); ?></h3></a>
            </li>
        </ul>
        <?php include('enrollmentlist.php');?>
    </div>

</div>
<div class="row-fluid">
    <div class="">
        <hr>

        <section id="region-main-badge" class="">
            <h2><i class="fa fa-folder-open-o fa-5"></i> <?php echo get_string('metrobadges','theme_lambda'); ?> </h2>
<?php
global $CFG, $DB;
require_once($CFG->libdir . '/blocklib.php');
require_once($CFG->dirroot . '/blocks/moodleblock.class.php');
require_once($CFG->dirroot . '/blocks/badges/block_badges.php');
$id = 'site-index';
$instance = $DB->get_record('block_instances', array('pagetypepattern' => $id));
$blockname = 'badges';
$object2 = block_instance($blockname, $instance);


echo $object2->get_content()->text;

?>
        </section> 

    </div>
</div>


