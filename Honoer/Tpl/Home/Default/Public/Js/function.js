$(function(){
    var t;
    $(".nav-child").parent("li").hover(function(){
        $(this).addClass("this").find("dl").show();
    },function(){
        $(this).removeClass("this").find("dl").hide();
    });
    
    $(".tab-title").find("a").hover(function(){
        var thisTab =$(this);
        t = setTimeout(function(){
            thisTab.parent("li").addClass("active").siblings("li").removeClass("active");
            $(thisTab.attr("data-toggle")).fadeIn().siblings("div").hide();
        },300);
    },function(){
        clearTimeout(t);
    });
    
})
