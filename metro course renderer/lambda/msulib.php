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
 * This is built using the Clean template to allow for new theme's using
 * Moodle's new Bootstrap theme engine
 *
 *
 * @package   theme_mssessential
 * @copyright 2013 Julian Ridden
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Parses CSS before it is cached.
 *
 * This function can make alterations and replace patterns within the CSS.
 *
 * @param string $css The CSS
 * @param theme_config $theme The theme config object.
 * @return string The parsed CSS The parsed CSS.
 */

include_once($CFG->dirroot.'/blocks/cbsi/lib.php');

/**
 * Custom course info box for course modifications screen
 *
 * @param  [type] $course_id [description]
 * @return [type]            [description]
 */
function course_info_box_mod_page($course_id)
{
  global $DB,$USER,$CFG;

  $course_sql     = "SELECT * FROM {course} WHERE id = " . $course_id;
  $course         = $DB->get_record_sql($course_sql);

  $category_sql   = "SELECT name FROM {course_categories} WHERE id = $course->category";
  $categories     = $DB->get_record_sql($category_sql);
  $teacher        = get_teacher($course_id);

  $seats_open       = get_nseats($course_id) - get_nstudents($course_id);

  $content        = '';
  $content       .= '
    <div id="container">
      <div class="headerCourse">
        <h2><img width="100" height="100" src="' . get_course_image_url($course->id) . '">' . $course->fullname . '</h2>
      </div><!-- end header -->';


  $content .= '
      <div class="content">
     ';

      return $content;
}

/**
 * Custom course info box that display enroll button if user unenrolled
 *
 * @return string html
 */
function course_info_box_enrol()
{
  global $DB,$USER,$CFG;
  include_once('/var/www/html/moodle/theme/msu/lib.php');

    //$course_id      = $_GET['id'];
    $course_id      = null;
    if(isset($_GET['id'])) {
      $course_id      = $_GET['id'];
    } else {
      $course_id      = $_POST['id'];
    }
    $course_sql     = "SELECT * FROM {course} WHERE id = $course_id";
    $course         = $DB->get_record_sql($course_sql);

    $category_sql   = "SELECT name FROM {course_categories} WHERE id = $course->category";
    $categories     = $DB->get_record_sql($category_sql);
    $teacher = get_teacher($course_id);

    $content = '';
  $content .= '
    <div id="container">
    <div class="headerCourse">
    <h2><img width="100" height="100" src="' . get_course_image_url($course->id) . '">' . $course->fullname . '</h2>

    <!--
    <button class="editLayout">Edit Layout</button>
    <button class="editSettings">Edit Settings</button>
    <button class="manageCourse">Manage Course</button>
    -->
    <div class="classInfo">
    <ul>
      <!-- category name: ' . $categories->name . ' -->
      <li>' . get_string($categories->name, 'theme_msu') . '</li>
      <li>'.get_string('category', 'theme_msu').'</li>
      <li>' . get_nstudents($course->id) .' ' . get_string('enrolled', 'theme_msu').'</li>';

    // if(get_nseats($course_id) != null)
    // {
    //   $content .= '<li>' . get_nseats($course_id) . ' Seats open</li>';
    // }

    $content .= '</ul>
    </div><!-- end classInfo -->
    </div><!-- end header -->
    ';
    /*
    <div class="editingLayout">
    <h2>Editing Layout</h2>
    <p class="layout">Edit the layout of your course and the content.</p>
    <img src="/theme/msu/pix/editingInstructions.png" width="706" height="616" />
    <button class="down">Fold Down</button>
    <button class="up">Fold Up</button>
    </div><!-- end editingLayout -->

    <div class="editingSettings">
    <h2>Editing Settings</h2>
    <p>Edit the title, details, dates, enrollment, and more</p>
    <img src="/theme/msu/pix/editingSettings.png" width="706" height="455" />
    <button class="down">Fold Down</button>
    <button class="up">Fold Up</button>
    </div><!-- end editingSettings -->


    <div class="manageCourses">
    <h2>Managing Courses</h2>
    <p class="managing">Manage lots of courses</p>
    <img src="/theme/msu/pix/manageCourse.png" width="706" height="453" />
    <button class="down">Fold Down</button>
    <button class="up">Fold Up</button>
    </div><!-- end manageCourses -->
    */

    $content .= '
    <div class="content">
    <h2>'.get_string('description', 'theme_msu').'</h2>
    <div class="descriptionInfo">
    <ul>
      <li>'.get_string('date', 'core').': ' . date('m.d.Y',$course->startdate) . '</li>
      <li>Instructor: ' . $teacher . '</li>
    </ul>
    </div><!-- end descriptionInfo -->
    <h3>'.get_string('summary', 'theme_msu').':</h3>
    <p>' . $course->summary . '</p>';

    return $content;
}

/**
 * Custom course info box that displays additional course information
 *
 * @param  int $course_id [description]
 * @return string html
 */
function course_info_box2($course_id)
{
	global $DB,$USER,$CFG;

  $course_sql     = "SELECT * FROM {course} WHERE id = " . $course_id;
  $course         = $DB->get_record_sql($course_sql);

  $category_sql   = "SELECT name FROM {course_categories} WHERE id = $course->category";
  $categories     = $DB->get_record_sql($category_sql);
  $teacher        = get_teacher($course_id);

  $seats_open       = get_nseats($course_id) - get_nstudents($course_id);

  $content        = '';
  $content       .= '
	  <div id="container">
    <!-- course_info_box2 -->
    <div class="headerCourse">
    <h2><img width="100" height="100" src="' . get_course_image_url($course->id) . '">' . $course->fullname . '</h2>

    <!--
    <button class="editLayout">Edit Layout</button>
    <button class="editSettings">Edit Settings</button>
    <button class="manageCourse">Manage Course</button>
    -->
    <div class="classInfo">
    <ul>
      <!-- category name: ' . $categories->name .' -->
    	<li>' . $categories->name . '</li>
    	<li>' . get_string('category', 'theme_msu') . '</li>
    	<li>' . get_nstudents($course_id) .' ' . get_string('enrolled', 'theme_msu').'</li>';

    	// if(get_nseats($course_id) != null)
    	// {
    	//   $content .= '<li>' . $seats_open . ' Seats open</li>';
    	// }

    $content .= '</ul>
    </div><!-- end classInfo -->
    </div><!-- end header -->
    ';


$content .= '
<div class="content">
<h2>'.get_string('description', 'theme_msu').'</h2>
<div class="descriptionInfo">
<ul>
	<li>'.get_string('date', 'core').' ' . date('m.d.Y',$course->startdate) . '</li>
	<li>Instructor: ' . $teacher . '</li>
</ul>
</div><!-- end descriptionInfo -->
<h3>'.get_string('summary', 'theme_msu').':</h3>
<p>' . $course->summary . '</p>';

        return $content;
    }

/**
 *  function split_words
 *  $string - input string
 *  $nb_caracs - number of characters to limit
 *  $separator - '...' or the href link to 'read more'
 */
function split_words($string, $nb_caracs, $separator){
    $string = strip_tags(html_entity_decode($string));
    if( strlen($string) <= $nb_caracs ){
        $final_string = $string;
    } else {
        $final_string = "";
        $words = explode(" ", $string);
        foreach( $words as $value ){
            if( strlen($final_string . " " . $value) < $nb_caracs ){
                if( !empty($final_string) ) $final_string .= " ";
                $final_string .= $value;
            } else {
                break;
            }
        }
        $final_string .= ' ' . $separator;
    }
    return $final_string;
}

/**
 * render custom menu on right side bar top
 * @return string html
 */

function custom_menu() {
	global $OUTPUT;
   $html = '<aside class="span4 desktop-first-column block-region">';
   $html .= '  <div class="block_settings block block_with_controls" aria-labelledby="instance-5-header" data-instanceid="5" data-block="settings" role="navigation">';
   $html .= '    <div class="content">';
   $html .= '      <div class="box block_tree_box">';
   $html .=          $OUTPUT->custom_menu();
   $html .= '      </div>';
   $html .= '    </div>';
   $html .= '  </div>';
   $html .= '</aside>';
   return $html;
}

/**
 *  Get 4 incoming courses and display as slideshow in frontpage
 * @param  string  $categoryid
 * @param  string  $where
 * @param  string  $sort
 * @param  string  $fields
 * @param  integer $limit
 * @return array course objects              [
 */
function get_courses_limit($categoryid="all", $where="c.startdate>unix_timestamp()", $sort="c.sortorder ASC", $fields="c.*", $limit=4) {

    global $USER, $CFG, $DB;
    $params = array();
    if ($categoryid !== "all" && is_numeric($categoryid)) {
        $categoryselect = "WHERE c.category = :catid";
        $params['catid'] = $categoryid;
    } else {
        $categoryselect = "WHERE $where";
    }
    if (empty($sort)) {
        $sortstatement = "";
    } else {
        $sortstatement = "ORDER BY $sort";
    }
    $ccselect = ', ' . context_helper::get_preload_record_columns_sql('ctx');
    $ccjoin = "LEFT JOIN {context} ctx ON (ctx.instanceid = c.id AND ctx.contextlevel = :contextlevel)";
    $params['contextlevel'] = CONTEXT_COURSE;
    $sql = "SELECT $fields $ccselect
              FROM {course} c
              $ccjoin
              $categoryselect
              $sortstatement
              LIMIT $limit
              ";
    $courses = $DB->get_records_sql($sql, $params);
    $visiblecourses = array();
    if ($courses) {
        // loop throught them
        foreach ($courses as $course) {
            // context_helper::preload_from_record($course);
            $desc = $course->summary;
            // $course->summary must be less than 173 chars
            // for the slide to work
            // $course->summary = (strlen($desc) > 173) ? substr($desc,0,170).'...' : $desc;
            $course->summary = split_words($desc,180, '...<a href="/course/view.php?id=' . $course->id . '" style="font-size: 14px">Read More</a>');
            if (isset($course->visible) && $course->visible <= 0) {
                // for hidden courses, require visibility check
                if (has_capability('moodle/course:viewhiddencourses', context_course::instance($course->id))) {
                    $visiblecourses [$course->id] = $course;
                }
            } else {
                $visiblecourses [$course->id] = $course;
            }
        }
    }

    $view = "{$CFG->wwwroot}/course/view.php?id=";
    $coursesarray = array();
    foreach ($visiblecourses as $id => $record) {
	    $file = $DB->get_record_sql("
          SELECT c.id, c.filename FROM {files} c where c.contextid = {$record->ctxid} AND c.filearea = 'overviewfiles' AND c.source IS NOT NULL LIMIT 1");

       if ($file) {
       // image url = /pluginfile.php/$context_id/$file_component/$file_filearea/$filename
          $record->image = $CFG->wwwroot . '/pluginfile.php/' . $record->ctxid . '/course/overviewfiles/' . $file->filename ;
       }
       $record->viewurl = $view . $record->id;
       $coursesarray[] = $record;
    }
    return $coursesarray;
}

/**
 * Get cohort of current user
 *
 * @return string name
 */
function get_cohort()
{
  global $USER;
  $institution = strtolower($USER->institution);
  $institution = preg_replace('@\ @', '_', $institution);
  $json = file_get_contents('http://cbsi-connect.net/local/metrostargetcohort/client/client.php');
  $cohorts = json_decode($json, true);
  foreach ($cohorts as $cohort) {
    if($USER->institution == $cohort['idnumber'])
    {
      return $cohort['name'];
    }
  }
}

/**
 * Get module associated course id
 * @return int course id
 */
function get_module_course_id()
{
  global $DB;

  $sql = "SELECT course FROM {course_modules} where id = " . $_GET['id'];
  $course = $DB->get_record_sql($sql);
  $cid = $course->course;

  return $cid;
}

/**
 * Add entry to log file
 * @param string log entry
 * @param string log name
 * @param string path of file calling this function
 * @param string line number of code this function is being called on
 */
function cbsi_log($message, $logname, $file, $line) {
  global $CFG;
  $date = date('Y-m-d:H:i:s');
  $log = "{$date}\t{$file}:{$line}\t" . $message . "\n";

  file_put_contents("{$CFG->dataroot}/{$logname}", $log, FILE_APPEND | LOCK_EX);
}

/**
 * Determine if user has role for given course
 * @param  int  $course_id
 * @param  string  $shortname
 * @return boolean
 */
function has_role($course_id, $shortname) {
  global $USER;

  $context  = context_course::instance($course_id);
  $roles    = get_user_roles($context, $USER->id, false);

  foreach($roles as $r) {
    if($r->shortname == $shortname) {
      return true;
    }
  }

  return false;
}

/**
 * check if the current user has the site_admin role for the academy this course
 * belongs to
 *
 * @param  int  $course_id
 * @return boolean
 */
function has_siteadmin_role($course_id) {
  global $DB,$USER;

  $course   = get_course($course_id);
  $sql      = "SELECT parent FROM mdl_course_categories WHERE id = {$course->category}";

  try {
    $category = $DB->get_record_sql($sql);
    $parent   = $category->parent;
  } catch (Exception $e) {
   return false;
  }

  if($category->parent == 0) {
    $parent = $course->category;
  }

  $context  = context_coursecat::instance($parent);
  $roles    = get_user_roles($context, $USER->id, false);

  foreach($roles as $r) {
    if($r->shortname == "siteadmin") {
      return true;
    }
  }

  return false;
}

function is_user_siteadmin() {
  global $DB, $USER;


  $sql = <<<SQL
    SELECT * FROM mdl_course_categories WHERE idnumber = '{$USER->institution}'
SQL;

  $category = $DB->get_record_sql($sql);
  $context  = context_coursecat::instance(get_parent_id());
  $roles    = get_user_roles($context, $USER->id, false);

  foreach($roles as $r) {
    if($r->shortname == "siteadmin") {
      return true;
    }
  }

  return false;
}



/**
 * Get child categores of parent category
 * @param  int $parent_id
 * @return array indexed array
 */
function get_children($parent_id) {
  global $DB;

  $sql     = "SELECT id FROM {course_categories} WHERE parent = " . $parent_id;
  $results = $DB->get_records_sql($sql);
  $children = array();

  foreach($results as $r) {
    array_push($children, $r->id);
  }

  return $children;
}

/*
 * callback to be used for heredocs
 */
$cb = function($fn) {
  return $fn;
};
