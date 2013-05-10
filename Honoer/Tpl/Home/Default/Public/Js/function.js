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
    
    $(".dc-top-nav-child").parent("li").hover(function(){
        $(this).addClass("this").find("dl").show();
    },function(){
        $(this).removeClass("this").find("dl").hide();
    });
    
})
