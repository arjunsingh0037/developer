  <!--
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  -->
	<hr>
	<div id="page-cnt-up" style="margin-top:40px;">
	<?php 
	   global $USER;
	   
	   $salute = 'Hi';
	   $course = enrol_get_my_courses();
	   $currtime = time();
	   ?>

	   <h1 class="mlistname"> <?php echo $salute.' '.$USER->firstname.' '.$USER->lastname; ?> </h1>
	   <p style="font-size:15px">Welcome to your CBSI Online Training Academy!. This page outlines your personal training course at your Academy. <br> <br></p>

		<div class="row-fluid">	   
		<div class="container">
		<div class="span12">
			<h1><i class="fa fa-folder-open-o fa-5"></i> Enrollment List </h1>
		</div>
		</div>
		</div>
		<div class="panel panel-default">
		
		<ul id="myTab" class="nav nav-tabs" role="tablist">
			<li class="active">
			<a data-toggle="tab" role="tab" href="#home"><h3>Meetings</h3></a>
			</li>
			<li class="">
			<a data-toggle="tab" role="tab" href="#profile"><h3>Trainings</h3></a>
			</li>
			<li class="">
			<!--<a data-toggle="tab" role="tab" href="#shared"><h2>Shared Open</h2></a> -->
			</li>
			<li class="">
			<a data-toggle="tab" role="tab" href="#more"><h3>Completed</h3></a>
			</li>
		</ul>
		<div id="myTabContent" class="tab-content">
			<div id="home" class="tab-pane fade active in">
			
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
								if ($value->startdate > $currtime) {
								$clicklink = $CFG->wwwroot.'/course/view.php?id='.$value->id;
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
							}
							?>
						<?php } 
						} ?>
				</ul>
			
			</div>
			<div id="profile" class="tab-pane fade">
			<ul class="dashboardul">
						<?php
					global $CFG, $DB, $USER;
					$uid = $USER->id;
					$catdidt1 = $DB->get_records_sql("select id from {course_categories} where name like '%Train%'");
					if ($catdidt1) {
						foreach ($catdidt1 as $key1 => $catdidtv1) {
						$catdid1 = $catdidtv1->id;
						$tslist = course_undercat($catdid1);
						
						?>
						<?php 
							foreach ($tslist as $key => $value) {
								if ($value->startdate > $currtime) {
								$clicklink = $CFG->wwwroot.'/course/view.php?id='.$value->id;
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
							}
							?>
						<?php } 
						} ?>
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
								$clicklink = $CFG->wwwroot.'/course/view.php?id='.$value->id;
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
						<?php } 
						} ?>
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
								if ($courseensingle->startdate < $currtime) {
								$clicklink = $CFG->wwwroot.'/course/view.php?id='.$courseensingle->id;
										
									?>
									<div class="prom-box prom-box-info">
									  <h3><?php echo $courseensingle->fullname; ?></h3>
									  <a class="btn btn-danger pull-right" href="<?php echo $clicklink; ?>"><i class="fa fa-share fa-lg"></i> CONTINUE</a>
									  <p><?php echo date('d-M-Y', $courseensingle->startdate); ?></p>
									</div>
									
									<?php
								}
							}
							?>
						 
			</ul>
			</div>
		</div>
		</div>
			
	</div>
	<div class="row-fluid">
	<div class="">
	<hr>

		<section id="region-main-badge" class="">
		<h2><i class="fa fa-folder-open-o fa-5"></i> Latest Badges </h2>
		<?php
		global $CFG, $DB;
		 require_once($CFG->libdir.'/blocklib.php');
			require_once($CFG->dirroot.'/blocks/moodleblock.class.php');
			require_once($CFG->dirroot.'/blocks/badges/block_badges.php');
			$id = 'site-index';
			$instance = $DB->get_record('block_instances', array('pagetypepattern' => $id));
			$blockname = 'badges';
			$object2 = block_instance($blockname, $instance);
			
			echo $object2->get_content()->text;
		?>
		</section>

	</div>
	</div>
	
	