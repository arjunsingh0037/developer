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

echo $OUTPUT->doctype(); 
global $PAGE;
$PAGE->requires->jquery();
?>


<html <?php echo $OUTPUT->htmlattributes(); ?>>
<head>
    <title><?php echo $OUTPUT->page_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo $OUTPUT->favicon(); ?>" />
    <?php echo $OUTPUT->standard_head_html(); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google web fonts -->
    <?php require_once(dirname(__FILE__).'/includes/fonts.php'); ?>
	<style>
	body { background:url('http://cbsi-connect.net/theme/msu/pix/loginpagebg-inl.jpg');
	background-size:cover;
    padding-top:0px!important;
    height:100%;
    }
	#page-header { display:none;}
	.navbar { display:none;}
	.text-center { display:none;}
	#page-footer{
		    background-color: rgba(34,51,76,0.6) !important;	
			border-top: 0px;
            position: absolute;
            bottom: -130px;
            width: 100%;
            margin-top:0px!important;
            padding:0px!important;
                    
	}
	.footerlinks{
		    background-color: rgba(34,51,76,0.6);	
	}
	.forgetpass {
    border-top: 1px dotted #FBC063;
    text-align: center;
    font-size: 13px;
    padding-top: 0px;
}
	#wrapper { background: transparent;
	border-top: 0px;}
	.loginpanel {
	height: 512px;
    width: 238px;
    background-color: rgba(34, 51, 76, 0.6);
    border-bottom: 8px solid #F7BC63;
    padding: 41px;
	}
	.loginbox h2 {
    background: url(http://cbsi-connect.net/theme/msu/pix/icn_login_cbsiLogo.png);
    width: 180px;
    height: 179px;
    text-indent: -9999px;
    margin: 3px 0px 8px 0px;
	}
	.loginform label {
    margin-bottom: 2px !important;
    color: #fff;
}
.loginform label {
    margin-bottom: 2px !important;
    color: #fff;
}

.languages p {
    color: #F7BC63;
    font-size: 15px;
    text-align: center;
    font-family: 'proxima_nova_rgregular';
}.languages span.current {
    color: #E5573D;
}
.disclaimer {
    font-size: 13px;
    text-align: center;
}
.spanish {
    display: none;
}
.english {
	color:#fff;
	line-height: 1.7em !important;
}
.footerlinks { display:none;}
/* for login page changes 6th april*/
.loginbox .loginform{margin-top:0em!important;}
.loginbox .loginpanel .desc {
	visibility:hidden;
}
.loginbox .loginform .form-label {
    text-align: left;
    width: 100%;
}
.loginbox .loginform .form-input input {
    width: 100% !important;
}
.loginbox .loginform .form-input {
	text-align: left;
    width: 100%;
}
#loginbtn {
    background: #F7BC63;
    border: none;
    color: #22334C !important
}
.forgetpass a {
    color: #F7BC63 !important;
    text-decoration: none;
    font-size: 11px;
}
.rememberpass {
    float: left;
    margin-bottom: 15px;
    display: none;
}
.languages p a {
    color: #F7BC63;
    text-decoration: none;
}
.fancybox-media {
    color: #F7BC63 !important;
}
body#page-login-index footer {
     width: 100%;
     position: absolute;
     background-color: rgba(34,51,76,0.6);
     bottom: -247px;
     z-index: 600;
}
.homefooter {
     width: 960px;
     margin: 0 auto;
     padding: 0px 0px 10px 0px;
}
#page-login-index #notice{
    text-align:center;
}
.sign-note{
    color: #fff;
    font-weight: 700;
    text-align: center;
    display: block;
    background: rgba(55, 93, 108, 0.67);
    margin-bottom: 10px;
}
.uniselect{
    color:#fff;
    margin-top:-5px;
}
.uniselect select{width:100%;}
.circle-or{
    margin: auto;
    text-align: center;
    background: green;
    width: 14%;
    color: #fff;
    border-radius: 47%;
    margin-bottom: 5px;}
/* end of login page pages */

</style>

</head>

<body <?php echo $OUTPUT->body_attributes(); ?>>

<?php echo $OUTPUT->standard_top_of_body_html(); ?>



<?php require_once(dirname(__FILE__).'/includes/header.php'); ?>

<div class="text-center" style="line-height:1em;">
	<img src="<?php echo $CFG->wwwroot;?>/theme/lambda/pix/bg/shadow.png" class="slidershadow" alt="">
</div>

<div id="page" class="container-fluid">

	<?php if (isloggedin() and !isguestuser()) { ?>
    <header id="page-header" class="clearfix">
        <div id="page-navbar" class="clearfix">
            <div class="breadcrumb-nav"><?php echo $OUTPUT->navbar(); ?></div>
            <nav class="breadcrumb-button"><?php echo $OUTPUT->page_heading_button(); ?></nav>
        </div>
    </header>
    <?php } ?>


    <div id="page-content" class="row-fluid">
        <section id="region-main" class="span12">
            <?php
            echo $OUTPUT->course_content_header();
            echo $OUTPUT->main_content();
            echo $OUTPUT->course_content_footer();
            ?>
        </section>
    </div>
    
    <a href="#top" class="back-to-top"><i class="fa fa-chevron-circle-up fa-3x"></i><p><?php print_string('backtotop', 'theme_lambda'); ?></p></a>
    
</div>


	<footer>
		
		<div class="homefooter">
			<div class="languages">
			 <center>
			 <p class="eng"> <span class="current" id="english">English</span> / <span id="spanish">Español</span> • <a class="fancybox-media" href="https://www.youtube.com/watch?v=0uJeMu__IZo" data-width="560" data-height="340">Caribbean Police Academy Regional Training Initiative</a> • <a href="/helpdesk/">CBSI Help</a> </p>
			 <p class="span" style="display: none;"> <span id="english">English</span> / <span class="current" id="spanish">Español</span> • <a class="fancybox-media" href="https://www.youtube.com/watch?v=0uJeMu__IZo" data-width="560" data-height="340">Iniciativa de la Capacitación Regional de las Academias de Policía del Caribe</a> • <a href="/helpdesk/">Ayuda</a> </p>
			 </center>
			</div>
			 <div style="clear:both"></div>
			 <div class="disclaimer">
			 <p class="english">This is an intranet system intended for law enforcement personnel only. This computer system, including all related equipment, networks, and the learning management system are provided only for authorized use. CBSI Connect and Intranet may be monitored for all lawful purposes; including, to ensure that use is authorized, for management of the system, to facilitate protection against unauthorized access, and to verify security procedures and operational security. During monitoring, information may be examined, recorded, copied and used for authorized purposes. All information, including personal information, placed or sent over this system may be monitored. Use of this computer system, authorized or unauthorized, constitutes consent to monitoring by this system. Unauthorized use may subject you to criminal prosecution. Evidence of unauthorized use collected during monitoring may be used for administrative, criminal, or other action. By loging into this system you are accepting these terms and conditions. </p>
			 <p class="spanish">Este sistema de intranet está solamente para el personal encargado de la aplicación de la ley. Este sistema informático, incluyendo todo el equipo relacionado,  las redes y el sistema de gestión de aprendizaje, se proporcionan solamente para el uso autorizado. El CBSI Connect y la red pueden ser monitoreados para fines legales; incluyendo, asegurar que el uso está autorizado, para la gestión del sistema, para facilitar la protección contra el acceso no autorizado, y para verificar los procedimientos de la seguridad y la seguridad operacional. La información recogida por el monitoreo, puede ser examinada, grabada, copiada y utilizada con fines autorizados. Toda la información, incluyendo la información personal, colocada o enviada sobre este sistema puede ser monitoreada. El uso de este sistema informático, autorizado o no autorizado, constituye el consentimiento a la supervisión de este sistema. El uso no autorizado puede exponerte a enjuiciamiento criminal. Evidencia del uso no autorizado, recogida por el monitoreo del sistema, puede ser usada para la acción administrativa, penal u otra. Acceder al sistema es aceptar estos términos y condiciones. </p>
			</div>
			</div>
	</footer>

    <?php echo $OUTPUT->standard_end_of_body_html() ?>


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
	
<script src="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/custom.js' ?>"></script>
<!-- Add fancyBox main JS and CSS files -->
  <script type="text/javascript" src="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/jquery.fancybox.js' ?>"></script>
  <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/jquery.fancybox.css' ?>" media="screen" />

  <!-- Add Button helper (this is optional)
  <link rel="stylesheet" type="text/css" href="https://cbsi-connect.net/theme/msu/javascript/source/helpers/jquery.fancybox-buttons.css" />
  <script type="text/javascript" src="https://cbsi-connect.net/theme/msu/javascript/source/helpers/jquery.fancybox-buttons.js"></script>-->

  <!-- Add Thumbnail helper (this is optional) -->
  <link rel="stylesheet" type="text/css" href="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/helpers/jquery.fancybox-thumbs.css' ?>" />
  <script type="text/javascript" src="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/helpers/jquery.fancybox-thumbs.js' ?>"></script>

    <!-- Add Media helper (this is optional) -->
  <script type="text/javascript" src="<?php echo $CFG->wwwroot.'/theme/lambda/jquery/fancybox/helpers/jquery.fancybox-media.js' ?>"></script>

  <script type="text/javascript">

  // Fancybox

  // Fancybox
$('.fancybox-media, .fancybox').attr('rel', 'media-gallery')
        .fancybox({
          openEffect : 'none',
          closeEffect : 'none',
          prevEffect : 'none',
          nextEffect : 'none',
          arrows : false,
          helpers : {
            media : {},
            buttons : {}
          }
});
  </script>
  

</body>
</html>
