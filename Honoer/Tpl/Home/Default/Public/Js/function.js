$(function(){
    $(".ho-docs-list").find("li").hover(function(){
        $(this).find("a").animate({
            paddingLeft:30
        },300);
    },function(){
        $(this).find("a").animate({
            paddingLeft:12
        },300);
    });
    
//    $("html").click(function(){
//        alertHtml('这只是测试');
//    });
//    var alertHtml=function(message){
//        $("#wrap").append('<div class="ho-docs-flash">'+message+'</div>').fadeIn(1000);
//        setTimeout(function(){
//            $(".ho-docs-flash").fadeOut(1000);
//        },2000);
//    } 
})
    

SyntaxHighlighter.defaults['auto-links'] = false;
SyntaxHighlighter.defaults['gutter'] = false;
SyntaxHighlighter.defaults['smart-tabs'] = false;
SyntaxHighlighter.config.clipboardSwf = _Public+'syntaxhighlighter/scripts/clipboard.swf';
//SyntaxHighlighter.defaults.toolbar = false;
SyntaxHighlighter.config.toolbarItemWidth = 16;
SyntaxHighlighter.config.toolbarItemHeight = 16;
SyntaxHighlighter.config.strings = {
    expandSource : '展开代码',
    viewSource : '查看代码',
    copyToClipboard : '复制代码',
    copyToClipboardConfirmation : '代码复制成功',
    print : '打印',
    //help : '?',
    alert: '语法高亮\n\n',
    noBrush : '不能找到刷子: ',
    brushNotHtmlScript : 'Brush wasn\'t configured for html-script option: '
// this is populated by the build script
}
//SyntaxHighlighter.config.tagName = 'div';
SyntaxHighlighter.all();
