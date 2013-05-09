/**
 * 通用AJAX提交
 * @param  {string} url    表单提交地址
 * @param  {string} formObj    待提交的表单对象或ID
 */
function dcSubmit(url,formObj){
    if(!formObj||formObj==''){
        var formObj="form";
    }
    if(!url||url==''){
        var url=document.URL;
    }
    alert(url);
    $(formObj).ajaxSubmit({
        url:url,
        type:"POST",
        dataType:'json',
        beforeSubmit:function(){
            alert('开始提交');
        },
        success:function(data, st) {
            //var data = eval("(" + data + ")");
            if(data.status==1){
                alert(data.info);
                setTimeout(function(){
                    
                    },2000);
            }
        //            else{
        //                alert(data.info);
        //                setTimeout(function(){
        //                    },2000);
        //            }
        //            if(data.url&&data.url!=''){
        //                setTimeout(function(){
        //                    top.window.location.href=data.url;
        //                },2000);
        //            }
        //            if(data.url==''){
        //                setTimeout(function(){
        //                    top.window.location.reload();
        //                },1000);
        //            }
        }
    });
    return false;
}
