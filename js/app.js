/* Theme Name: Aparax - Responsive Landing Page Template
   Author: Themesdesign
   Version: 1.0.0
   File Description: Main JS file of the template
*/


   
// ----- STICKY ----- //
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();

                if (scroll >= 40) {
                    $(".navbar-sticky").addClass("darkheader");
                } else {
                    $(".navbar-sticky").removeClass("darkheader");
                }
            });
      
// ----- SCROLLMENU ----- //
            $('.navigation-menu a').on('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top - 0
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        
// ----- OWL-CAROUSEL ----- //
            $("#owl-carousel").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 3,
          

            itemsDesktop : [1024, 2],
            itemsDesktopSmall : [768, 1],
            itemsTablet: [568, 1]

            });
     
// ----- MAIN-MENU ----- //

            var scroll = $(window).scrollTop();

            $('.navbar-toggle').on('click', function(event) {
                $(this).toggleClass('open');
                $('#navigation').slideToggle(400);
            });

            $('.navigation-menu>li').slice(-2).addClass('last-elements');

            $('.menu-arrow,.submenu-arrow').on('click', function(e) {
                if ($(window).width() < 992) {
                    e.preventDefault();
                    $(this).parent('li').toggleClass('open').find('.submenu:first').toggleClass('open');
                }
            });
   
// ----- SCROLLSPY ----- //
            $("#navigation").scrollspy({
                offset: 50
            });
       
// ----- VIDEO-MAGNIFICPOPUP ----- //
            $('.video-play-icon').magnificPopup({
                disableOn: 700,
                type: 'iframe',
                mainClass: 'mfp-fade',
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        

// ----- VIDEO-MAGNIFICPOPUP ----- //
$('.video-play-icon-trigger').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false
});


// ----- MFP ----- //
$('.mfp-image').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    mainClass: 'mfp-fade',
    gallery: {
        enabled: true,
        navigateByImgClick: true,
        preload: [0, 1]
    }
});

// ----- CONTACT ----- //
            $('#contact-form').submit(function() {
                var action = $(this).attr('action');
                $("#message").slideUp(750, function() {
                    $('#message').hide();

                    $('#submit')
                        .before('')
                        .attr('disabled', 'disabled');

                    $.post(action, {
                            name: $('#name').val(),
                            email: $('#email').val(),
                            comments: $('#comments').val(),
                        },
                        function(data) {
                            document.getElementById('message').innerHTML = data;
                            $('#message').slideDown('slow');
                            $('#cform img.contact-loader').fadeOut('slow', function() {
                                $(this).remove()
                            });
                            $('#submit').removeAttr('disabled');
                            if (data.match('success') != null) $('#cform').slideUp('slow');
                        }
                    );

                });

                return false;

            });
        

