$(document).ready(function(){
    $('#menu a').each(function(){
        id = $(this).attr('href');
        id = id.substring(id.lastIndexOf('/'));
        id = id.substring(0,id.indexOf('.'));
        $(this).attr('rel',id);
    });
    $('#dog').show();
    $('#menu a').click(function(e){
        e.preventDefault();
        $('.content').hide();
        $('#'+$(this).attr('rel')).show();
        location.hash = '/'+$(this).attr('rel');
       
        $(this).parent().addClass('active').siblings().removeClass('active');
       
        return false;
    });
});

$(document).ready(function () {

    $(window).scroll(function () {
        if ($(this).scrollTop() > 500) {
            $('.poleznoe_scrollup').fadeIn();
        } else {
            $('.poleznoe_scrollup').fadeOut();
        }
    });

    $('.poleznoe_scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });

});