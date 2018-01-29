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

function course_info_box_mod_page($course_id) 
{
  global $DB,$USER,$CFG;
  
  $course_sql     = "SELECT * FROM {course} WHERE id = " . $course_id;
  $course         = $DB->get_record_sql($course_sql);

  $category_sql   = "SELECT name FROM {course_categories} WHERE id = $course->category";
  $categories     = $DB->get_record_sql($category_sql);
  //$teacher        = get_teacher($course_id);

  //$seats_open       = get_nseats($course_id) - get_nstudents($course_id);

  $content        = '';
  $content       .= '
    <div id="container">
      <div class="headerCourse">
        <h2>$course->fullname</h2>
      </div><!-- end header -->';


  $content .= '
      <div class="content">
     ';

      return $content;
}