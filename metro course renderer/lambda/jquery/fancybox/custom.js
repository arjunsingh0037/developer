$(document).ready(function() {

    //Set height of right column more then left column
    var currentPage = $('form').attr('id');
    var newHeight = $('div.left-column').outerHeight() + 40;
    var unit = "px";
    var cssHeight = newHeight + unit;

    $('div.right-column, iframe').css('min-height', cssHeight);
    $(".left-column").height($(".right-column").height());
    $(".without-actions").parent().remove();

    //remove header artifact
    $('#instance-2605-header').html('');

    //Tabs functionality
    $("#tabs").tabs();
    $("#tabs1").tabs({
        active: 3
    });
    $("#tabs2").tabs({
        active: 3
    });


    //Check tab ul and see if its empty
    $('ul').each(function() {
        if ($(this).html() === '') {
            $(this).parent().parent().addClass('nothingThere');
            $('.nothingThere').tabs({
                active: 2
            });
            $('.nothingThere').find('.showMore').remove();
            $('.nothingThere').tabs({
                disabled: [0, 1, 2]
            });
            //$('.nothingThere ul li').css({ 'color': '#A3A3A3', 'border': '1px solid #A3A3A3'});
            //$('.nothingThere ul li').find('.ui-tabs-active').removeClass('ui-tabs-active');
            //$('.nothingThere ul li').find('.ui-state-active').removeClass('ui-state-active');
            //$('.nothingThere ul li:last-child').addClass('ui-tabs-active').addClass('ui-state-active');
        }

        //Hide view all field
        $('#tabs ul li:nth-child(3)').click(function() {
            $(this).closest('div').find('.showMore').hide();
        });

        //Show view all field
        $('#tabs ul li:nth-child(1), #tabs ul li:nth-child(2) ').click(function() {
            $(this).closest('div').find('.showMore').show();
        });

        //disabled tabs don't click
        $('.nothingThere ul li:nth-child(1), .nothingThere ul li:nth-child(2)').click(function() {
            return false;
        });
    });

    //Tab row click functionality
    $(".extra ul li").click(function() {
        if ($(this).hasClass('activeCol')) {
            $(".activeCol").find('.gear').show();
            $(".activeCol").find('.arrow').show();
            $(".activeCol").find('.buttons').hide();
            $(".activeCol").find('.attendees').hide();
            $(".activeCol").removeClass('activeCol')
        } else {
            $(".activeCol").find('.gear').show();
            $(".activeCol").find('.arrow').show();
            $(".activeCol").find('.buttons').hide();
            $(".activeCol").find('.attendees').hide();
            $(".activeCol").removeClass('activeCol')
            $(this).addClass('activeCol');
            $(".activeCol").find('.gear').hide();
            $(".activeCol").find('.arrow').hide();
            $(".activeCol").find('.buttons').fadeIn(700);
            $(".activeCol").find('.attendees').fadeIn(700).css('display', 'block');
        }
    });


    //Controls Login Page language functionality
    $('.span').hide();
    $('span').on('click', function(event) {
        if ($(this).hasClass('current')) {
            //do nothing
        } else {
            var newCurrent = $(this).attr('id')

            if (newCurrent === "english") {
                $('.labelUsernameEnglish').html('<label for="username">Username</label>');
                $('.labelPasswordEnglish').html('<label for="password">Password</label>')
                $('.forgetpass').html('<a href="forgot_password.php">Forgotten your username or password?</a>')
                $('.spanishLan').removeClass('spanishLan');
                $('.theLogin').html(' <input type="submit" id="loginbtn" value="Login &raquo;" />');

                $('.eng').show();
                $('.span').hide();
                $('.spanish').hide();
                $('.english').show();
            } else {
                $('.labelUsernameEnglish').html('<label for="username">Usuario</label>');
                $('.labelPasswordEnglish').html('<label for="password">Contraseña</label>');
                $('.forgetpass').html('<a href="forgot_password.php">¿Olvidó su usuario o contraseña?</a>');
                $('.languages').addClass('spanishLan');
                $('.theLogin').html(' <input type="submit" id="loginbtn" value="Entrar &raquo;" />');
                
                $('.span').show();
                $('.eng').hide();
                $('.spanish').show();
                $('.english').hide();
            }
        }
    });

    //Show first 5 rows in tab and Hides the rest
    $('.extra ul li:nth-child(5)').nextAll('li').addClass('hidden');
    $('.showMore').click(function() {
        $(this).closest('div').find('.extra ul').children().removeClass('hidden');
    });

    if ($('.ui-tabs .ui-tabs-nav li:last-child').hasClass('ui-state-active')) {
      $('.showMore').hide();
    } else {
      //do nothing
    }

    //disable profile fields
    $("#id_institution").attr("disabled", "disabled");

    //hide view selector
    $(".view-mode-selector").hide();

    // $('#s6').cycle({
    //   fx:     'fade',
    //   timeout: 6000,
    //   delay:  -2000,
    //   pager: '#control'
    // });


    /** ////////////////////////////////////// **
     ** //      SCROLL TOP/BOTTOM           // **
     ** ////////////////////////////////////// **/

     // Scroll to top/bottom
      // var scrollHTML = '<div id="scrollTop"    class="scrollBoxes" style="display: none;" ><a href="#" class="scrollLink"><span class="icon-svg icon-arrow-up"  >&nbsp;</span>Scroll to<br />Top</a>   </div>';
      // $('body').append( scrollHTML );
      //   scrollHTML = '<div id="scrollBottom" class="scrollBoxes" style="display: block;"><a href="#" class="scrollLink"><span class="icon-svg icon-arrow-down">&nbsp;</span>Scroll to<br />Bottom</a></div>';
      // $('body').append( scrollHTML );

      // $('#scrollBottom a').click( function(e){
      //   e.preventDefault();
      //   $("html, body").animate({ scrollTop: $(document).height() }, 'slow');
      // });

      // $('#scrollTop a').click( function(e){
      //   e.preventDefault();
      //   $('html,body').animate({ scrollTop: 0 }, 'slow');
      // });

      // var docHeight = Math.floor( ( $(document).height() - $(window).height() ) / 3 );

      // $(window).scroll( function(){
      //   // scrollTop fade in/out
      //   if( $(window).scrollTop() > docHeight ){
      //     if( $('#scrollTop').css('display') == 'none' ){
      //       $('#scrollTop').show();
      //       $('#scrollBottom').hide();
      //     }
      //   }else{
      //     if( $('#scrollTop').css('display') != 'none' ){
      //       $('#scrollTop').hide();
      //       $('#scrollBottom').show();
      //     }
      //   }

      // });
      //


});
