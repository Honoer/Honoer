$(function(){
    $(".bs-docs-sidenav >li").find('a').hover(function(){
        $(this).stop(true,true).animate({
            paddingLeft:50
        },600);
    },function(){
        $(this).stop(true,true).animate({
            paddingLeft:14
        },600);
    });
})