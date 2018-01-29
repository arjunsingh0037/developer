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
global $CFG;
$haslogo = (!empty($PAGE->theme->settings->logo));

$hasheaderprofilepic = (empty($PAGE->theme->settings->headerprofilepic)) ? false : $PAGE->theme->settings->headerprofilepic;

$checkuseragent = '';
if (!empty($_SERVER['HTTP_USER_AGENT'])) {
    $checkuseragent = $_SERVER['HTTP_USER_AGENT'];
}
if (strpos($checkuseragent, 'MSIE 7')) {
	echo get_string('ie7message', 'theme_lambda');
}
$username = get_string('username');
if (strpos($checkuseragent, 'MSIE 8')) {$username = str_replace("'", "&prime;", $username);}
?>

<?php if($PAGE->theme->settings->socials_position==1) { ?>
    	<div class="container-fluid socials-header"> 
    	<?php require_once(dirname(__FILE__).'/socials.php');?>
        </div>
<?php
} ?>

<?php
if (strpos($checkuseragent, 'MSIE 8') || strpos($checkuseragent, 'MSIE 7')) {?>
    <header id="page-header-IE7-8" class="clearfix">
<?php
} else { ?>
    <header id="page-header" class="clearfix">
<?php
} ?>
     <style>
.dropdown-backdrop {
    position: static;
}
</style>	 
    <div class="container-fluid">    
    <div class="row-fluid">
    <!-- HEADER: LOGO AREA -->
        	
            <?php if (!$haslogo) { ?>
            	<!--<div class="span6">
              		<h1 id="title" style="line-height: 2em"><?php echo $SITE->shortname; ?></h1>
                </div> -->
				<div class="logo-header">
                        <a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                            <?php
                            echo html_writer::empty_tag('img', array('src' => $CFG->wwwroot.'/theme/'.$CFG->theme.'/pix/academy_flag.jpg', 'class' => 'logo', 'alt' => 'logo'));
							$lang = current_language();
							/* if ($CFG->wwwroot =='https://cbsi-connect.org') {
								if ($lang != 'en') {
								echo 'Cursos Abiertos';
								} else {
								echo ' '.$SITE->fullname;								
								}
							} else {
								echo ' '.$SITE->fullname;
							} */
							echo ' '.$SITE->fullname;
                            ?>
                        </a>
                    </div>
            <?php } else { ?>
                <div class="logo-header">
                	<a class="logo" href="<?php echo $CFG->wwwroot; ?>" title="<?php print_string('home'); ?>">
                    <?php 
					//echo '<img src="'.$CFG->wwwroot.'/theme/lambda/pix/cbsiconnect.png" class="metrologo">';
					echo html_writer::empty_tag('img', array('src'=>$PAGE->theme->setting_file_url('logo', 'logo'), 'class'=>'logo metrologo', 'alt'=>'logo'));
						$lang = current_language();
						/* if ($CFG->wwwroot =='https://cbsi-connect.org') {
							if ($lang != 'en') {
							echo 'Cursos Abiertos';
							} else {
							echo ' '.$SITE->fullname;								
							}
						} else {
							echo ' '.$SITE->fullname;
						} */
						
						echo ' '.$SITE->fullname;
					?>
                    </a>
                </div>
            <?php } ?>      	
            
            <div class="login-header">
            <div class="profileblock">
            
            <?php 
	function get_content () {
	global $USER, $CFG, $SESSION, $COURSE;
	$wwwroot = '';
	$signup = '';}
	
	global $CFG,$DB,$USER; 
	$isadmin = is_siteadmin($USER);
			

	if (empty($CFG->loginhttps)) {
		$wwwroot = $CFG->wwwroot;
	} else {
		$wwwroot = str_replace("http://", "https://", $CFG->wwwroot);
	}

	if (!isloggedin() or isguestuser()) { ?>
		<form class="navbar-form pull-right" method="post" action="<?php echo $wwwroot; ?>/login/index.php?authldap_skipntlmsso=1">
		<div id="block-login">
		<label id="user"><i class="fa fa-user"></i></label>	
		<input class="span2" type="text" name="username" onFocus="if(this.value =='<?php echo $username; ?>' ) this.value=''" value="<?php echo $username; ?>" style="margin-bottom:10px;">
		<label id="pass"><i class="fa fa-key"></i></label>
		<input class="span2" type="text" name="password" id="password" value="<?php echo get_string('password'); ?>">
		<input type="submit" id="submit" name="submit" value=""/>
		</div>
		</form>
        
        <script type="text/javascript">
        	if (window.addEventListener)
			addEvent = function(ob, type, fn ) {
				ob.addEventListener(type, fn, false );
			};
			else if (document.attachEvent)
			addEvent = function(ob, type, fn ) {
				var eProp = type + fn;
				ob['e'+eProp] = fn;
				ob[eProp] = function(){ob['e'+eProp]( window.event );};
				ob.attachEvent( 'on'+type, ob[eProp]);
			};
 
			(function() {
				var p = document.getElementById('password');
				/*@cc_on
				  @if (@_jscript)
				  @if (@_jscript_version < 9)
				  var inp = document.createElement("<input name='password'>");
				  inp.id = 'password1';
				  inp.type = 'text';
				  inp.value = '<?php echo get_string('password'); ?>';
				  p.parentNode.replaceChild(inp,p);
				  p = document.getElementById('password1');
				  @else
				  p.type = 'text';
				  p.value = '<?php echo get_string('password'); ?>';
				  @end
				@else */
				  p.type = 'text';
				  p.value = '<?php echo get_string('password'); ?>';
				/* @end @*/
				passFocus = function() {
				if ('text' === this.type) {
				  /*@cc_on
				    @if (@_jscript)
				      @if (@_jscript_version < 9)
				  var inp = document.createElement("<input name='password'>");
				    inp.id = 'password';
				    inp.type = 'password';
				    inp.value = '';
				    this.parentNode.replaceChild(inp,this);
				    setTimeout(inp.focus,5);
				      @else
					  p.type = 'password';
				  p.value = '';
				  @end
				  @else */
				    this.value = '';
				    this.type = 'password';
				  /* @end @*/
				}
			}
			addEvent(p, 'focus', passFocus);
			}());
        </script>
        
	<?php } else if (isloggedin() and !$isadmin) { 

 		echo '<div id="loggedin-user">';
		
		echo html_writer::start_tag('div', array('id'=>'profilepic','class'=>'profilepic'));
		echo '<img src="'.$CFG->wwwroot.'/user/pix.php?file=/'.$USER->id.'/f1.jpg" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" style="width:80px;height:80px;"/>';
		echo html_writer::end_tag('div');
			
		echo '<ul class="nav pull-left">';
			echo '<li class="navbar-text">';
			echo '<div class="logininfo">';
			echo '<ul class="nav">';
				echo '<li class="dropdown" style="width:145px;">';
				echo '<a class="dropdown-toggle" data-toggle="dropdown" href="">';
				echo $USER->firstname.' '.$USER->lastname;
				echo '<b class="caret" style="vertical-align: text-top;"></b>';
				echo '</a>';
				echo '<ul class="dropdown-menu profiledrop">';
	
					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/my"><i class="fa fa-th-list"></i>';
					echo get_string('mycourses');
					echo '</a>';
					echo '</li>';

					echo '<li class="divider"></li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/profile.php"><i class="fa fa-user"></i>';
					echo get_string('viewprofile');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/edit.php?id='.$USER->id.'"><i class="fa fa-pencil-square-o"></i>';
					echo get_string('editmyprofile');
					echo '</a>';
					echo '</li>';
					
					/* echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/login/change_password.php"><i class="fa fa-pencil-square-o"></i>';
					echo get_string('changepassword');
					echo '</a>';
					echo '</li>'; */

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/files.php"><i class="fa fa-folder-open"></i>';
					echo get_string('myfiles');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/message/index.php?user1='.$USER->id.'"><i class="fa fa-comments-o"></i>';
					echo get_string('messages', 'message');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/calendar/view.php?view=month"><i class="fa fa-calendar"></i>';
					echo get_string('calendar','calendar');
					echo '</a>';
					echo '</li>';
					
					echo '<li class="divider"></li>';
					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='.sesskey().'"><i class="fa fa-sign-out"></i>';
					echo get_string('logout').'<br>'.$SITE->fullname;;
					echo '</a>';
					echo '</li>';

			echo '</ul></li></ul></div>';		
		echo '</li></ul></div>';

	} else if ($isadmin) { 

 		echo '<div id="loggedin-user">';
		
		echo html_writer::start_tag('div', array('id'=>'profilepic','class'=>'profilepic'));
		echo '<img src="'.$CFG->wwwroot.'/user/pix.php?file=/'.$USER->id.'/f1.jpg" title="'.$USER->firstname.' '.$USER->lastname.'" alt="'.$USER->firstname.' '.$USER->lastname.'" style="width:80px;height:80px;"/>';
		echo html_writer::end_tag('div');
			
		echo '<ul class="nav pull-left">';
			echo '<li class="navbar-text">';
			echo '<div class="logininfo">';
			echo '<ul class="nav">';
				echo '<li class="dropdown" style="width:145px;">';
				echo '<a class="dropdown-toggle" data-toggle="dropdown" href="">';
				echo $USER->firstname.' '.$USER->lastname;
				echo '<b class="caret" style="vertical-align: text-top;"></b>';
				echo '</a>';
				echo '<ul class="dropdown-menu profiledrop">';
	
					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/my"><i class="fa fa-th-list"></i>';
					echo get_string('mycourses');
					echo '</a>';
					echo '</li>';

					echo '<li class="divider"></li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/profile.php"><i class="fa fa-user"></i>';
					echo get_string('viewprofile');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/edit.php?id='.$USER->id.'"><i class="fa fa-pencil-square-o"></i>';
					echo get_string('editmyprofile');
					echo '</a>';
					echo '</li>';
					
					/* echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/login/change_password.php"><i class="fa fa-pencil-square-o"></i>';
					echo get_string('changedpassword');
					echo '</a>';
					echo '</li>'; */

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/user/files.php"><i class="fa fa-folder-open"></i>';
					echo get_string('myfiles');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/message/index.php?user1='.$USER->id.'"><i class="fa fa-comments-o"></i>';
					echo get_string('messages', 'message');
					echo '</a>';
					echo '</li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/calendar/view.php?view=month"><i class="fa fa-calendar"></i>';
					echo get_string('calendar','calendar');
					echo '</a>';
					echo '</li>';

					echo '<li class="divider"></li>';

					echo '<li>';
					echo '<a href="'.$CFG->wwwroot.'/login/logout.php?sesskey='.sesskey().'"><i class="fa fa-sign-out"></i>';
					echo get_string('logout').'<br>'.$SITE->fullname;
					echo '</a>';
					echo '</li>';


			echo '</ul></li></ul></div>';		
		echo '</li></ul></div>';

	}
	?>

	</div>
	</div>
            
    </div>
    </div>          
</header>

<header role="banner" class="navbar">
    <nav role="navigation" class="navbar-inner">
        <div class="container-fluid">
			<?php
			
			$lang = current_language();
			/* if ($CFG->wwwroot =='https://cbsi-connect.org') {
				if ($lang != 'en') {
				$sitetext = 'Cursos Abiertos';
				} else {
				$sitetext = $SITE->fullname;
				}
			} else {
				$sitetext = $SITE->fullname;
			} */
			// commenting the above thing as per request on 14th March 2017 Mihir as es lang also will see the same name
			$sitetext = $SITE->fullname;
			?>
			<!-- changing the brand as per request for es language 10th Aug-->
		
            <a class="brand" href="<?php echo $CFG->wwwroot;?>"><?php echo $sitetext; ?></a>
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <div class="nav-collapse collapse">
                <?php echo $OUTPUT->custom_menu(); ?>
				
				<!-- adding academy links as per request on 21-Feb-2017 
				<li><a title="RGPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rgpf'; ?>">Royal Grenada Police Force</a></li>
				<!--<li><a title="RABPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rabpf'; ?>">Royal Antigua and Barbuda Police Force</a></li> 
				<li><a title="RSCNPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rscnpf'; ?>">Royal Saint Christopher and Nevis Police Force Training</a></li>
				<li><a title="RSVGPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rsvgpf'; ?>">Royal Saint Vincent and the Grenadines Police Force Academy</a></li>
				<li><a title="CDPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=cdpf'; ?>">Dominica Police Force Training School</a></li>
				-->
				<?php 
				if ($CFG->wwwroot =='https://cbsi-connect.org') {
				?>
				<ul class="nav navbar-nav">
					<li class="dropdown"><a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" title="">Participating Institutions‎<b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a title="RSS" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rss'; ?>">Regional Security System</a></li>
							<li><a title="KPS" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=kps'; ?>">Korps Politie Suriname</a></li>
							<!--<li><a title="NPCJ" href="<?php //echo $CFG->wwwroot.'/login/acadlogin.php?acad=npcj'; ?>">National Police College of Jamaica</a></li>-->
							<li><a title="NPCJ" href="<?php echo 'http://step.npcj.edu.jm/'; ?>">National Police College of Jamaica</a></li>
							
							<li><a title="DNCD" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=dncd'; ?>">Academia Dirección Nacional de Control de Drogas</a></li>
							<li><a title="GPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=gpf'; ?>">Guyana Police Force</a></li>
							<li><a title="RBPF" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rbpf'; ?>">Royal Bahamas Police Force</a></li>
							<li><a title="DNPTA" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=dnpta'; ?>">Policía Nacional República Dominicana</a></li>
							
							
							
							<li><a title="TTPS" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=ttps'; ?>">Trinidad and Tobago Police Service</a></li>
							<li><a title="RPTC" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=rptc'; ?>">Barbados Regional Police Training Centre</a></li>
							<li><a title="REDTRAC" href="<?php echo $CFG->wwwroot.'/login/acadlogin.php?acad=redtrac'; ?>">REDTRAC</a></li>
							
							<!-- <li><a title="MSS" href="<?php //echo $CFG->wwwroot.'/login/acadlogin.php?acad=mss'; ?>">MSS Metrostar</a></li> --> 
						</ul>
					</li>
				</ul>
				<?php 
				}
				?>

				<!-- end of academy links -->
				
                <div class="nav-divider-right"></div>
                <ul class="nav pull-right">
                    <li><?php echo $OUTPUT->page_heading_menu(); ?></li>
                </ul>
                
                <form id="search" action="<?php echo $CFG->wwwroot;?>/course/search.php" method="GET">
                <div class="nav-divider-left"></div>							
					<input id="coursesearchbox" type="text" onFocus="if(this.value =='<?php echo get_string('searchcourses'); ?>' ) this.value=''" onBlur="if(this.value=='') this.value='<?php echo get_string('searchcourses'); ?>'" value="<?php echo get_string('searchcourses'); ?>" name="search">
					<input type="submit" value="">							
				</form>
                
            </div>
        </div>
    </nav>
</header>
