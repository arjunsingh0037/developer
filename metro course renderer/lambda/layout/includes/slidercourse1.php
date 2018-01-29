 <div id="myCarousel" class="carousel slide" data-ride="carousel">
   		 <!-- Wrapper for slides -->
	  	      <?php
				$i = 1;
				global $DB,$CFG;
				require_once $CFG->libdir . '/coursecatlib.php';
				require_once $CFG->libdir . '/datalib.php';
				$getcourses = get_config('theme_lambda','carousel_courses');
	  	      		$getcourse = explode(',',$getcourses);
	  	      		foreach($getcourse as $row)  	
	  	      		{
	  	      		   $courses [] = $DB->get_record('course', array('id' => $row),'id,fullname,summary');
	  	      		  
	  	      		}	
				echo '<div class="carousel-inner" role="listbox">
						<div class="item active">';
							$cid =  $courses[0]->id;
							$cname =  $courses[0]->fullname;
							$csummary =  $courses[0]->summary;
							$imglink = '#';//changes for Moodle 3.2 by Arjun on 15/12/2016
							if ($courses[0] instanceof stdClass) {
								
								$COURSE = new course_in_list($courses[0]);
							    }
							foreach ($COURSE->get_course_overviewfiles() as $file) {
							$isimage = $file->is_valid_image();

								if ($isimage) {
									$imglink =  file_encode_url("$CFG->wwwroot/pluginfile.php",
								'/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
									$file->get_filearea() . $file->get_filepath() . $file->get_filename(), !$isimage);
								} else {
									$imglink = $CFG->dirroot.'/theme/lambda/pix/slider/photo_default.png';
								}
							}
							
						echo '<img src="'.$imglink.'" width="460" height="345">';
						echo '<div class="carousel-caption">';
						echo '<h3><a href='.$CFG->wwwroot.'/course/view.php?id='.$cid.'>'.$cname.'</a></h3>';
						echo '<p>'.substr($csummary,0,700).'..'.'</p></div></div>';
						unset($courses[0]);
						foreach ($courses as $course) {
						if ($course instanceof stdClass) {
								$COURSE = new course_in_list($course);
							    }
							foreach ($COURSE->get_course_overviewfiles() as $file) {
							$isimage = $file->is_valid_image();

							if ($isimage) {
							$imglinks =  file_encode_url("$CFG->wwwroot/pluginfile.php",
							'/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
							$file->get_filearea() . $file->get_filepath() . $file->get_filename(), !$isimage);
							} else {
							$imglink = $CFG->dirroot.'/theme/lambda/pix/slider/photo_default.png';
							}
							}
							
						echo '<div class="item">';
							echo '<img src="'.$imglinks.'" width="460" height="345">';
							echo '<div class="carousel-caption">';
							echo '<h3><a href='.$CFG->wwwroot.'/course/view.php?id='.$course->id.'>'.$course->fullname.'</a></h3>';	                           	echo '<p>'.$course->summary.'</p>';
							echo '</div></div>';
						}
			      
		     		 ?>
				 	
  		</div>
		<div class="carousel-back">
 	 	 
   			 <ol class="carousel-indicators">
   			    <?php 
			     	echo '<a href="#myCarousel" role="button" data-slide="prev">
			     	      <li data-target="#myCarousel" data-slide-to="'.($i-1).'" class="active">'.$i.'
			     	      </li></a>';
				      foreach ($courses as $course) {
				      		$i = $i + 1;
				      		echo '<a href="#myCarousel" role="button" data-slide="next">
			     	      <li data-target="#myCarousel" data-slide-to="'.($i-1).'" class="">'.$i.'
			     	      </li></a>';
				      }
			      ?>
   			</ol>
 	 </div>
 	 </div>
 	 
        
        
        
        

