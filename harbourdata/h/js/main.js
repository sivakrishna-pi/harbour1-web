$(document).ready(function() {


    $(function() {

        var pull = $('#pull');
        menu = $('nav > ul');
        menuHeight = menu.height();

        $(pull).on('click', function(e) {
            e.preventDefault();
            menu.slideToggle();
            jQuery(".nav-icon").toggleClass('close');
        });

        $(window).resize(function() {
            var w = $(window).width();
            if (w > 320 && menu.is(':hidden')) {
                menu.removeAttr('style');
            }
        });
    });
});

function setCookie(e, t, a) {
	var o = new Date;
	o.setDate(o.getDate() + a);
	var n = escape(t) + (null == a ? "" : "; expires=" + o.toUTCString()) + "; path=/";
	document.cookie = e + "=" + n
}

function bindMenuHover() {


    var w = $(window).width();
    if (w > 1000) {
        jQuery("nav li").hover(function() {

            $(this).children(".sub-menu").stop(true, true).slideDown("slow");

        }, function() {

            $(this).children(".sub-menu").slideUp("slow");

        }
        );

    } else {
        jQuery("nav li").unbind('mouseenter mouseleave')
    }



}

$(document).ready(function() {

    bindMenuHover();

    jQuery("nav li .sub-menu-icon").click(function(e) {
        $(this).toggleClass("open");

      el = $(this).parent('li').children(".sub-menu").first();
      el.slideToggle();

       //$(this).parents('li').find("li.menu-item-depth-1").find(".sub-menu-icon").not($(this)).removeClass("open");

       el_parent = el.parents();
       $(this).parents('li').find("li.menu-item-depth-1").find(".sub-menu").not(el).not(el_parent).slideUp(function(){
          $(this).parent('li').find(".sub-menu-icon").removeClass("open");
       });


        e.preventDefault();

    });


    $(".sub-menu").hover(function() {
        $(this).parents("li").find("a").addClass("navActive2");
        $(this).children("li").find("a").removeClass("navActive2");
    },
            function() {
                $(this).parents("li").find("a").removeClass("navActive2");
                $(this).children("li").find("a").removeClass("navActive2");
            });




});


$("body").on("contextmenu", "img", function(e) {
  return false;
});

$(window).resize(function() {
    bindMenuHover();

});