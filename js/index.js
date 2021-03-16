




         $('.owl-carousel').owlCarousel({
             loop: true,
             margin: 10,
             nav: true,
             autoplay: true,
             autoplayHoverPause: false,
             responsiveClass:true,
             responsive: {
                 0: {
                 items: 2
                 },
                 600: {
                 items: 3
                 },
                 1000: {
                 items: 7,
                 },
                 3000: {
                 items:7   ,
                 }
             }
         });


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
         
$(document).ready(function(){
  
  $('.hb-topss').click(function(){
    $(this).toggleClass('active');
    $('.hb-slideMenuCo').toggleClass('active');
     $('#overlay').toggleClass('active')
  })
      $('.tab-link').click(function(){
        var tab_id = $(this).attr('data-tab');

        $('.skltbs-tab-item').removeClass('current');
        $('.skltbs-panel').removeClass('current');

        $(this).parent().addClass('current');
        $("#"+tab_id).addClass('current');
      })

    })
    $('.hb-slideArrow').click(function(){
      $(this).siblings().slideToggle(500);
    })


         $('.hb_mobile-view-btn').click(function(){
            $('#overlay').toggleClass('active')
            $('.hb-navmenu').toggleClass('open');
            $(this).toggleClass('closeToggle');
            $('.hb-megaDropdown ,  .hb-inDrpCo').removeClass('active')
         })
         $('.hb-navLists >li>a').click(function(){
          $(this).siblings().addClass('active')
         })
         $('.hb-knMob').click(function(){
          $(this).siblings().addClass('active')
         })
         $('.backtoMenu').click(function(){
          $('.hb-megaDropdown , .hb-inDrpCo').removeClass('active');
          
         })
         $('#overlay').click(function(){
            $(this).removeClass('active');
            $('.hb-casePop').removeClass('active');
            $('.hb_mobile-view-btn').removeClass('closeToggle');
             $('.hb-navmenu').removeClass('open');
             $('.hb-topss').removeClass('active');
             $('.hb-slideMenuCo').removeClass('active');
            $('.hb-megaDropdown ,  .hb-inDrpCo').removeClass('active')
         })



         $(document).mousedown(function (n){
                      var t = $(".dept-list-group");
                      var h = $(".full-cont");
                      t.is(n.target) || t.has(n.target).length !== 0 || $(".dept-list-group.dep-active").removeClass("dep-active").addClass('eg-heiAuto')
                       h.is(n.target) || h.has(n.target).length !== 0 || $(".full-cont.open").removeClass("open")
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


          $('.hb-ourScop >li >p').click(function(){
            $(this).siblings().slideToggle(500);
            $(this).parent().removeClass('inActive')
             $(this).toggleClass('active');
              $(this).parent().siblings().addClass('inActive')
          
          })


          $('.hb-downLoadTest').on('click' , function(){
            id = $(this).data('post_id');
          //  alert(id);
           document.getElementById('post_id').value = id;
            $('.hb-casePop').addClass('active');
            $('#overlay').addClass('active')

          })

          $('#caseStudiesForm').bind('submit', function () {
            $.ajax({
              type: 'post',
              url: 'caseStudiesFormSubmit.php',
              data: $('#caseStudiesForm').serialize(),
              success: function (data) {
                alert('form was submitted');
                var blob = new Blob([data]);
                var link = document.createElement('a');
                link.href = window.URL.createObjectURL(blob);
                link.download = "Sample.pdf";
                link.click();
              }
            });
            return false;
          });
           