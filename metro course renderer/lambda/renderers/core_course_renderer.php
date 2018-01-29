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
 * Lambda theme.
 *
 * @package    theme
 * @subpackage lambda
 * @copyright  &copy; 2014-onwards G J Barnard in respect to modifications of the Bootstrap theme.
 * @author     G J Barnard - gjbarnard at gmail dot com and {@link http://moodle.org/user/profile.php?id=442195}
 * @author     Based on code originally written by Bas Brands, David Scotson and many other contributors.
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
include_once($CFG->dirroot.'/course/renderer.php');

class theme_lambda_core_course_renderer extends core_course_renderer {
   
    public function course_category($category) {
        global $OUTPUT, $CFG,$DB,$PAGE;
        require_once($CFG->libdir . '/coursecatlib.php');
        $PAGE->set_context(context_system::instance());
        //$categories = coursecat::make_categories_list();
        //print_object($categories);
        //return $output;
		$catlistlang = get_string('ccategorylist','theme_lambda') ;
		$courselistlang = get_string('cviewcourselist','theme_lambda') ;
		$viewalllang = get_string('viewall','theme_lambda') ;
 
		
        if(!empty(optional_param('categoryid','',PARAM_INT))){
           return parent::course_category($category); 
        }
		
        $content = '';
        $output = '';
        $catlist = array();
        $courselist = array();
        $categorylist = $DB->get_records_sql("Select * from {course_categories} where visible=1 and name !='Meeting'");
         
         		foreach($categorylist as $cid => $catlist) 
                {
                    $list[]=array('id'=>$catlist->id,'name'=>$catlist->name,'count'=>$catlist->coursecount,'parent'=>$catlist->parent);
                }
				$content.='<div class="page-header">
                                <h1>'."$catlistlang".'</h1>
                            </div>
                            <div id="ribb">
                                <p class="ribbon">
                                    <strong class="ribbon-content">
                                        '."$courselistlang".'
                                    </strong>
                                </p>
                            </div>';
                $count = 0;
                $categories2 = array();        
                foreach($list as $categories)
                {      
                 $categories2 [] = $categories;  
               	 $count = $count + 1;	
               	 if($count == 2){
               	 	//print_object($categories2);
               	 	$content.= '<div class="row">';
               	 	foreach ($categories2 as $key => $category) {
               	 		
						$courselist= $DB->get_records('course', array('category'=>$category['id'],'visible'=>1),'startdate DESC','id,fullname,startdate',0,100);
						$content.= '<div id="coursecats" class="panel panel-default col">
							           <div class="panel-heading">
							               <h3 class="panel-title"><i class="fa fa-bookmark" aria-hidden="true"></i>';
							               if($category['parent'] >= 1){ 
							                    $pid = $category['parent'];
							                    $parent = $DB->get_record('course_categories',array('id'=>$pid),'name');
							                    $parentname = $parent->name.' / ';
							                    $namelist = substr($parentname.''.$category['name'],0,38).'..'; 
							             	}else{$namelist = $category['name'];}

						                    $content .= '<span class="shift-left">'.$namelist.'</span>
					                    			 	<span class="shift-right">
						                    			 	<a href="'.$CFG->wwwroot.'/course/index.php?categoryid='.$category['id'].'">'."$viewalllang".'
						                    			 	</a>
					                    			 	</span>
					                    	</h3>
					                    </div>
				                    	<div class="panel-body">';
											foreach ($courselist as $course) {
												if(!empty($course->startdate)){
													$startdate = date('d-M-Y', $course->startdate);
												}else{$startdate = '&#8213;';}
											$content .= '<span class="dates">'.$startdate.'</span> <strong>&#10072;</strong> <a href="'.$CFG->wwwroot.'/course/view.php?id='.$course->id.'">'.substr($course->fullname,0,500).'</a></br>';
											}
						$content.= '	</div>
									</div>'; 
               	 	}
               	 	$content.= '</div>';
               	 	unset($count);
               	 	unset($categories2);
               	 }
                }

                $output .= html_writer::div(html_writer::div($content, 'coursecatbox'), 'col-md-3 col-sm-3');
                return $output;
            }
}