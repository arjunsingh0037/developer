<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Parent theme: Bootstrapbase by Bas Brands
 * Built on: Essential by Julian Ridden
 *
 * @package   theme_lambda
 * @copyright 2014 redPIthemes
 *
 */

$left = (!right_to_left());
$standardlayout = (empty($PAGE->theme->settings->layout)) ? false : $PAGE->theme->settings->layout;

echo $OUTPUT->doctype() ?>
<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
</head>

<body <?php echo $OUTPUT->body_attributes('two-column'); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>

<div id="wrapper">
<?php require_once(dirname(__FILE__).'/includes/header.php');
  require_once $CFG->libdir . '/coursecatlib.php';
  require_once $CFG->libdir . '/filestorage/stored_file.php';
?>

<div class="text-center" style="line-height:1em;">
	<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/pix/bg/shadow.png" class="slidershadow" alt="">
</div>

<div id="page" class="container-fluid">

    <?php if (isloggedin() and !isguestuser()) { ?>
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
         <!--   <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div> -->
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
        </div>
    </header>
    <?php } ?>


    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span9<?php if ($left) { echo ' pull-left'; } ?><?php if ($standardlayout) { echo ' pull-right'; } ?>">
       
  		<!-- <div id="myCarousel" class="carousel slide" data-ride="carousel">
   		
	  	      <?php
				$i = 0;
				$courses = get_courses();
			       		unset($courses[1]);
			       		echo '<div class="carousel-inner" role="listbox">
						<div class="item active">';
						foreach ($courses as $course)
						{
							$cid =  $course->id;
							$cname =  $course->fullname;
							$csummary =  $course->summary;
							if ($course instanceof stdClass) {
								require_once $CFG->libdir . '/coursecatlib.php';
								$COURSE = new course_in_list($course);
							    }
							foreach ($COURSE->get_course_overviewfiles() as $file) {
							$isimage = $file->is_valid_image();

							if ($isimage) {
							$imglink =  file_encode_url("$CFG->wwwroot/pluginfile.php",
							'/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
							$file->get_filearea() . $file->get_filepath() . $file->get_filename(), !$isimage);
							} else {
							$imglink = '';
							}
							}
						}
						echo '<img src="'.$imglink.'" width="460" height="345">';
						echo '<div class="carousel-caption">';
						echo '<h3><a href='.$CFG->wwwroot.'/course/view.php?id='.$cid.'>'.$cname.'</a></h3>';
						echo '<p>'.$csummary.'</p></div></div>';
						unset($courses[$cid]);
						//$catlist = coursecat::make_categories_list();
						foreach ($courses as $course) {
						if ($course instanceof stdClass) {
								require_once $CFG->libdir . '/coursecatlib.php';
								$COURSE = new course_in_list($course);
							    }
							foreach ($COURSE->get_course_overviewfiles() as $file) {
							$isimage = $file->is_valid_image();

							if ($isimage) {
							$imglinks =  file_encode_url("$CFG->wwwroot/pluginfile.php",
							'/' . $file->get_contextid() . '/' . $file->get_component() . '/' .
							$file->get_filearea() . $file->get_filepath() . $file->get_filename(), !$isimage);
							} else {
							$imglinks = '';
							}
							}
						echo '<div class="item">';
							//<img src="http://www.iowanazarene.org/wp-content/uploads/2012/12/slider-21.jpg" alt="Chania" width="460" height="345">
							echo '<img src="'.$imglinks.'" width="460" height="345">';
							echo '<div class="carousel-caption">';
						
							echo '<h3><a href='.$CFG->wwwroot.'/course/view.php?id='.$course->id.'>'.$course->fullname.'</a></h3>';	                           	echo '<p>'.$course->summary.'</p>';
							echo '</div></div>';
						}
			      
		     		 ?>
				 	
  		</div>

   		 
		    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		      <span class="sr-only">&#8249;</span>
		    </a>
		    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		      <span class="sr-only">&#8250;</span>
		    </a>
		    
   			 <ol class="carousel-indicators">
			      <?php 
			     	echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
				      foreach ($courses as $course) {
				      		echo '<li data-target="#myCarousel" data-slide-to="'.($i+1).'"></li>';
				      }
			      ?>
   			</ol>
 	 </div>-->
	
            <?php
            echo $OUTPUT->course_content_header();
            //require_once('includes/metrodash.php');
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
        <?php
        $classextra1 = '';
		$classextra2 = '';
		if (!$standardlayout) {
            $classextra1 = ' pull-right';
        }
        if ($left or (!$left and $standardlayout)) {
            $classextra2 = ' desktop-first-column';
        }
        echo $OUTPUT->blocks('side-pre', 'span3'.$classextra1.$classextra2);
        ?>
    </div>

    <a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><p><?php print_string('backtotop', 'theme_lambda'); ?></p></a>

</div>

	<footer id="page-footer" class="container-fluid">
		<?php require_once(dirname(__FILE__).'/includes/footer.php'); ?>
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>

</div>


<!--[if lte IE 9]>
<script src="<?php echo $CFG->wwwroot;?>/theme/lambda/javascript/ie/matchMedia.js"></script>
<![endif]-->


<script>
jQuery(document).ready(function ($) {
$('.navbar .dropdown').hover(function() {
	$(this).addClass('extra-nav-class').find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
	var na = $(this)
	na.find('.dropdown-menu').first().stop(true, true).delay(100).slideUp('fast', function(){ na.removeClass('extra-nav-class') })
});

});
</script>

<script type="text/javascript">
jQuery(document).ready(function() {
    var offset = 220;
    var duration = 500;
    jQuery(window).scroll(function() {
        if (jQuery(this).scrollTop() > offset) {
            jQuery('.back-to-top').fadeIn(duration);
        } else {
            jQuery('.back-to-top').fadeOut(duration);
        }
    });
    
    jQuery('.back-to-top').click(function(event) {
        event.preventDefault();
        jQuery('html, body').animate({scrollTop: 0}, duration);
        return false;
    })
});
</script>


</body>
</html>
