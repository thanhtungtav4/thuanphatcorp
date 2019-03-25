
function update_status(el) {//alert('sdfd');
        var element = $(el);
        var vle = parseInt(element.attr('value'));
        vle=(vle+1)%2;

        $.ajax({
            url: base_url+module+"/update_status/"+element.attr('item-id'),
            data:"status="+vle,
            dataType:'json',
            success:function(data){
                if(data.status){
                    if(vle==1){
                        element.addClass("active");
                    }
                    if(vle==0){
                        element.removeClass("active");
                    }
                    element.attr('value',vle);
                }
            }
          });
}
var last_data_save = "";
/**
 * submit form
 */
function update_form(form,callback_function) {
    if(!validation(form)){
        
        return false;
    }
    if(typeof on_form_submit == 'function'){
        if(on_form_submit(form)===false) return false;
    } 
    
     
    var data_to_submit = make_serialize_form(form);
    
   
    ajax_upload_form(form,function(){
        
        $.ajax({
            url: form.attr('action'),
            data:data_to_submit,
            type :'post',
            dataType:'json',
            success:function(data){
                if(data.status&&data.id){
                    $("#txt_primary_id").val(data.id);
                    if($(".btn-review-yt").length>0){
                        $(".btn-review-yt").show();
                        if($(".btn-review-yt").attr("href").indexOf("review")==-1) 
                            $(".btn-review-yt").attr("href",$(".btn-review-yt").attr("href")+"review/"+data.id);
                    }
                    if($("#old-data-form").length>0) $("#old-data-form").val(data_to_submit);
                    $(".message_alert").hide().text("Đã lưu").fadeIn( 500).fadeOut( 5000);
					// alert("Đã thêm thành công!");
                }
                else if(data.error) alert(data.error);

                if(callback_function){
                    return callback_function(data);
                    
                }
				alert("Đã thêm thành công!");
            },
            error:function(data){
                alert("Lỗi kết nối: vui lòng thử lại lần nữa\n Nếu vẫn bị tình trạng này vui lòng liên hệ với bộ phận kỹ thuật!");
            }

            
        });
    });
     
}
function make_serialize_form(form){
    if(typeof CKEDITOR !== 'undefined'){
        for ( instance in CKEDITOR.instances ) {
            CKEDITOR.instances[instance].updateElement();      
        }
    }
    if(typeof tinyMCE !== 'undefined'){
        tinyMCE.triggerSave();
    }
    var sortdata = "";
    if(form.find(".input-sortable").length>0){
        form.find(".input-sortable").each(function(){
            sortdata+="&"+$(this).sortable('serialize');
//            alert(form.find(".input-sortable").html());
        });
        
    }
    var unchecked = "";
        form.find("input[type=checkbox]").each(function(){
            if(!this.checked) unchecked+="&"+this.name+"=0";
        });
    return form.serialize()+unchecked+sortdata;
}
function submit_form(form,direct_url,callback) {
   update_form(form,function(data){
        if(callback){
            callback(data);
        }
       window.location.href=direct_url;
   });
}
/**
 * validation form
 */
function validation(form) {
    var error_msg = "";
        var success = true;
    form.find("input, selected, textarea").each(function(){
        var thisok = true;
        var fieldname = "";
        var myregexp = /(.+)\[(.+)\]/;
                    var match = myregexp.exec($(this).attr("name"));
                    if (match != null) {
                       fieldname = match[2];
                       
                    } else fieldname= $(this).attr("name");
        if(typeof $(this).attr("vname")!== 'undefined'&&$(this).attr("vname")!= '')
        fieldname=$(this).attr("vname");
        if(typeof $(this).attr("required")!== 'undefined'){
            var minlength=1;
            if(typeof $(this).attr("minlength")!== 'undefined'){
                minlength = parseInt( $(this).attr("minlength"));
                
            }
            if($(this).val().length<minlength){
                    error_msg+=fieldname+": quá ngắn!<br/>";   
                    $(this).addClass("v_error");
                    thisok=false;
            }
            if(typeof $(this).attr("maxlength")!== 'undefined'){
                if($(this).val().length>parseInt( $(this).attr("minlength"))){
                    error_msg+=fieldname+": dài quá "+$(this).attr("minlength")+" ký tự!<br/>";   
                    $(this).addClass("v_error");
                    thisok=false;
                }
            }
            if(thisok) $(this).removeClass("v_error");
            else success=false;

        }
        
    });
    if(!success) $("#msg_error_msg").html(error_msg);
    else { $("#msg_error_msg").html(""); }

    return success;
}
function exit_form(url){//alert(url);
    window.location.href=url;
}
/**
 * ajax upload form
 */
function ajax_upload_form(form,finish_callback) {
    

    var countFile = 0;
    if(typeof(utype) == 'undefined') utype = 1;
	form.find("input[type='file']").each(function(){
		if(this.value&&!this.disabled&&$(this).attr("uploaded")!=this.value){
			countFile ++;
		}
    });
	
    if(countFile > 0){
		
		//var file = "";  
		form.find("input[type='file']").each(function(){
			if(this.value&&!this.disabled&& $(this).attr("uploaded")!=this.value&&!$(this).attr("data-url")=== 'undefined'){ 
                                var input_file=$(this);
				var name = this.name;
                                var fname = typeof $(this).attr("fname") !== 'undefined'?$(this).attr("fname"):"";
                                var ffolder = fname;
                                var field_name = typeof $(this).attr("field-name") !== 'undefined'?$(this).attr("field-name"):"data["+name+"]";
                                var img_container = typeof $(this).attr("img-container") !== 'undefined'?$(this).attr("img-container"):"";
                                var old_file = typeof $(this).attr("old-file") !== 'undefined'?$(this).attr("old-file"):"";
                                //var field_id = typeof $(this).attr("field-id") !== 'undefined'?$(this).attr("field-id"):"";
				var uri = base_url+"uploadfile/?fname="+fname+"&ffolder="+ffolder+"&oldfile="+old_file;
				if( this.id==''){
					 this.id=this.name;
				} 
				var id = this.id;
                                //input_file.prop('disabled', true);
				$.ajaxFileUpload({
					url:uri,
					secureuri:false,
					fileElementId:id,
					dataType:"json",
					success: function (data, status){
						countFile--;
						if(typeof(data.error) != 'undefined'||data.error==null){
							if(data.error != ''&&data.error!=null){
								alert(data.error);
							}
							else{
                                                            
                                                            $("#"+id).attr("uploaded",$("#"+id).val());
                                                            
                                                            var found=false;
                                                            $("input,textarea").each(function(){
                                                                if(this.name==field_name){found=true;$(this).val(data.src);}
                                                            });
                                                            if(!found) form.append("<input type='hidden' name='"+field_name+"' value='"+data.src+"'/>");
								//form.append("<input hidden='' name='files["+name+"]' value='"+data.id+"'/>");
                                                            if(img_container!=""){
                                                                if( $("#"+img_container).find("img").length>0){
                                                                    $("#"+img_container).find("img").attr("src",img_path+"wxhxt/"+data.src);
                                                                }else{
                                                                    $("#"+img_container).append($("<img/>").attr("src",img_path+"wxhxt/"+data.src));
                                                                }
                                                            }
								if(countFile == 0){
									if(typeof(finish_callback)=='function') {
										finish_callback();
									}
									return false;
								}
							}
						}
					},
					error: function (data, status, e){
                                            //input_file.prop('disabled', false);
						countFile--;
						alert(e);
						return false;
					}
				});
			}
		});
    }else{
          finish_callback();  
    }
}
/**
 * dialog search
 */
function show_dialog(url,value) {
    ajax_upload_form($("<form>"),function(){
        $.ajax({
                url: base_url+url, 
				data: { getdate: value },
                type :'get',
                success:function(data){//alert(data);
                    var d=$("<div>"+data+"</div>").dialog({
                        width: 450, // overcomes width:'auto' and maxWidth bug
                        maxWidth: 500,
                        maxHeight: 350,
                        height: 'auto',
                        modal: true,
                        fluid: true, //new option
                        resizable: true
                    }).bind( "dialogclose", function(event, ui) {
                            $(this).remove();
                    });
                    $(".ui-widget-overlay").click (function () {
                        d.dialog( "close" );
                   });

                }


        });
    });
    
    
}
/**
 * ajax submit form
 */
function ajax_submit_form_link(form,callback_id) {
    $.ajax({
        
            url: "http://localhost/vtvthethao.vn/admincp/"+$(form).attr("action"),
            data: $(form).serialize(),
            type :'get',
            success:function(data){//alert( $("#"+callback_id).html());
                $("#"+callback_id).html(data);
            
            }

            
    });
}
function ajax_submit_form(form,callback_id) {
    $.ajax({
        
            url: base_url+$(form).attr("action"),
            data: $(form).serialize(),
            type :'get',
            success:function(data){//alert( $("#"+callback_id).html());
                $("#"+callback_id).html(data);
                
            }

            
    });
}
String.prototype.replaceAll = function(target, replacement) {
  return this.split(target).join(replacement);
};
/*************global javascript***********************/
$(document).ajaxStart(function(){
    $(".wait_model").show();
  //$("#wait").css("display","block");
});
$(document).ajaxComplete(function(){
    
  $(".wait_model").hide();
});
/*************End global javascript***********************/
/************input-sortable****************/
function delete_sort_item(el){
    $(el).parents("li").attr('id',"_del_"+$(el).parents("li").attr('id')).hide();
    $(".input-sortable").sortable('refreshPositions');
}
/************End input-sortable****************/