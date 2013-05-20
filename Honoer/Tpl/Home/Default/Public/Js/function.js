//图片异步
$("img").lazyload({
    effect : "fadeIn"
});

var t;

$(document).ready(function(){
    //语法高亮
    SyntaxHighlighter.defaults['toolbar'] = true;
    SyntaxHighlighter.defaults['gutter'] = false;
    SyntaxHighlighter.config.clipboardSwf = PUBLIC +'/Plugins/syntaxhighlighter/scripts/clipboard.swf';
    SyntaxHighlighter.all();
    
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
