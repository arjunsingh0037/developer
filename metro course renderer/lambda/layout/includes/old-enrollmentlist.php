<div id="myTabContent" class="tab-content">
    <div id="profile" class="tab-pane fade active in">
        <ul class="dashboardul">
            <?php
            global $CFG, $DB, $USER;
            $uid = $USER->id;
            if($CFG->wwwroot == 'https://cbsi-connect.org')
            {
                $catdidt2 = $DB->get_records_sql("select id from {course_categories} where name not like '%Meet%' OR name like '%Train%'");
                unset($catdidt2[1]);
            }else{
                $catdidt2 = $DB->get_records_sql("select id from {course_categories} where name like '%Train%'");
            }
            
            if ($catdidt2) {
                foreach ($catdidt2 as $key2 => $catdidtv2) {
                    $catdid2 = $catdidtv2->id;
                    $tslist2 = course_undercat($catdid2);
                   ?>
                    <?php
                    foreach ($tslist2 as $key => $value) {
                    if($value->visible == 1){
                        $cmcm = new completion_completion(array('userid' => $USER->id, 'course' => $value->id));
                        if (!$cmcm->is_complete()) {

                            //if ($value->startdate > $currtime) {
                            $clicklink = $CFG->wwwroot . '/course/view.php?id=' . $value->id;
                            $yesno = user_yes_course($value->id, $uid); // this will return 1 if user is enrolled in this course
                            if ($yesno and $yesno == 1) {
                                ?>
                                <div class="prom-box prom-box-info">
                                    <h3><?php echo $value->fullname; ?></h3>
                                    <a class="btn btn-danger pull-right" href="<?php echo $clicklink; ?>"><i class="fa fa-share fa-lg"></i> <?php echo get_string('ccontinue','theme_lambda'); ?></a>
                                    <p><?php if ($value->startdate !=0) { echo date('d-M-Y', $value->startdate);} ?></p>
                                </div>

                                <?php
                            }
                        }
                    }
                   }
                    ?>
                <?php
                }
            }
            ?>
        </ul>
    </div>
	<!-- this is for meeting -->
	<div id="home" class="tab-pane fade">

        <ul class="dashboardul">
            <?php
            global $CFG, $DB, $USER;
            $uid = $USER->id;
            $catdidt1 = $DB->get_records_sql("select id from {course_categories} where name like '%Meet%'");
            if ($catdidt1) {
                foreach ($catdidt1 as $key1 => $catdidtv1) {
                    $catdid1 = $catdidtv1->id;
                    $tslist = course_undercat($catdid1);
                    $currtime = time();
                    
                    ?>
                    <?php
                    foreach ($tslist as $key => $value) {

                        $cmcm = new completion_completion(array('userid' => $USER->id, 'course' => $value->id));
                        if (!$cmcm->is_complete()) {
                            //if ($value->startdate > $currtime) {
                            $clicklink = $CFG->wwwroot . '/course/view.php?id=' . $value->id;
                            $yesno = user_yes_course($value->id, $uid); // this will return 1 if user is enrolled in this course
                            if ($yesno and $yesno == 1) {
                                ?>
                                <div class="prom-box prom-box-info">
                                    <h3><?php echo $value->fullname; ?></h3>
                                    <a class="btn btn-danger pull-right" href="<?php echo $clicklink; ?>"><i class="fa fa-share fa-lg"></i> <?php echo get_string('ccontinue','theme_lambda'); ?></a>
                                    <p><?php if ($value->startdate !=0) { echo date('d-M-Y', $value->startdate);} ?></p>
                                </div>

                                <?php
                            }
                        }
                    }
                    ?>
                <?php
                }
            }
            ?>
        </ul>

    </div>
	
    <!--<div id="shared" class="tab-pane fade">
    <ul class="dashboardul">
    <?php
    global $CFG, $DB, $USER;
    $uid = $USER->id;
    $catdidt1 = $DB->get_records_sql("select id from {course_categories} where name like '%Share%'");
    if ($catdidt1) {
        foreach ($catdidt1 as $key1 => $catdidtv1) {
            $catdid1 = $catdidtv1->id;
            $tslist = course_undercat($catdid1);
            ?>
            <?php
            foreach ($tslist as $key => $value) {
                $clicklink = $CFG->wwwroot . '/course/view.php?id=' . $value->id;
                $yesno = user_yes_course($value->id, $uid); // this will return 1 if user is enrolled in this course
                if ($yesno and $yesno == 1) {
                    ?>
                                                                    <div class="prom-box prom-box-info">
                                                                      <h3><?php echo $value->fullname; ?></h3>
                                                                      <a class="btn btn-danger pull-right" href="<?php echo $clicklink; ?>"><i class="fa fa-share fa-lg"></i> CONTINUE</a>
                                                                      <p><?php echo date('d-M-Y', $value->startdate); ?></p>
                                                                    </div>
                                                                    
                    <?php
                }
            }
            ?>
        <?php
        }
    }
    ?>
    </ul>
    </div> -->
    <div id="more" class="tab-pane fade">
        <ul class="dashboardul">
            <?php
            global $CFG, $DB, $USER;
            $uid = $USER->id;
            $courseen = enrol_get_my_courses();
            ?>
            <?php
            foreach ($courseen as $courseensingle) {
                $cmcm = new completion_completion(array('userid' => $USER->id, 'course' => $courseensingle->id));
                if ($cmcm->is_complete()) {
                    //if ($courseensingle->startdate < $currtime) {

                    $clicklink = $CFG->wwwroot . '/course/view.php?id=' . $courseensingle->id;
                    ?>
                    <div class="prom-box prom-box-info">
                        <h3><?php echo $courseensingle->fullname; ?></h3>
                        <a class="btn btn-danger pull-right" href="<?php echo $clicklink; ?>"><i class="fa fa-share fa-lg"></i> <?php echo get_string('ccontinue','theme_lambda'); ?></a>
                        <p><?php echo date('d-M-Y', $courseensingle->startdate); ?></p>
                    </div>

                    <?php
                }
            }
            ?>

        </ul>
    </div>
</div>
