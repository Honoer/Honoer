$(function(){
    $("ul.dc-list").find("li").hover(function(){
        $(this).find("a").animate({
            paddingLeft:30
        },300);
    },function(){
        $(this).find("a").animate({
            paddingLeft:12
        },300);
    });
    
})
