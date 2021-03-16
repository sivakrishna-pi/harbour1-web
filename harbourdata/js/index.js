$('.grid_view').click(function(){
           var parentHeight = $(this).height();
           $(this).parent().parent().toggleClass('dep-active');
           $(this).parent().parent().siblings().addClass('eg-heiAuto');
           $(this).parent().parent().toggleClass('eg-heiAuto');
           $(this).parent().parent().siblings().removeClass('dep-active')
           $(this).siblings().toggleClass('open');
           $(this).parent().parent().siblings().children().children().removeClass('open')
           var childHeight =$(this).siblings('.full-cont').height();
           var total = parentHeight + childHeight +54;
           $(this).parent().parent('.dep-active').css('height', total+'px');
           $(this).parent().parent('.dept-list-group').siblings().css('height', 'auto');
         })
         

   
         $(document).click(function() {
            $('.dept-list-group').removeClass('dep-active');
             $('.dept-list-group').addClass('eg-heiAuto')
            $('.full-cont').removeClass('open');
         });

         $('.hb_mobile-view-btn').click(function(){
            $('#overlay').toggleClass('active')
            $('.hb-navmenu').toggleClass('open');
            $(this).toggleClass('closeToggle');
            $('.hb-megaDropdown').removeClass('active')
         })
         $('.hb-navLists >li>a').click(function(){
          $(this).siblings().addClass('active')
         })
         $('.backtoMenu').click(function(){
          $('.hb-megaDropdown').removeClass('active')
         })
         $('#overlay').click(function(){
            $(this).removeClass('active')
            $('.hb_mobile-view-btn').removeClass('closeToggle');
             $('.hb-navmenu').removeClass('open');
            $('.hb-megaDropdown').removeClass('active')
         })


         $("#test").click(function(e) {
             e.stopPropagation(); // This is the preferred method.
             return false;        // This should not be used unless you do not want
                                  // any click events registering inside the div
         });
         $(window).scroll(function(){
              if($(window).scrollTop() >200) {
                $(".scrollbar").addClass('scroll-open');
              }
              else {
                $(".scrollbar").removeClass('scroll-open');
                }
          })
            
           $('.scrollbar').click(function(){
               $("html, body").animate({ scrollTop: 0 }, 500);
               return false;
           });