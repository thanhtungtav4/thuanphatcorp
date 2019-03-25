
$(document).ready(function(){
	
	//$("#tabsholder").tytabs({
//		fadespeed:"fast"
//	});
	
	$('.mask').click(function(){
		$(this).hide();
	});
	
	$('#check_all').live('click',function(){
		if( $(this).is(':checked') ) {
			$(".check_all").attr("checked","checked");
		} else {
			$(".check_all").removeAttr('checked');
		}
	});
	
	$('#multi_delete').live('click',function(){
		var i=0;
		$('.check_all').each(function(index, element) {
			if( $(this).is(':checked') ) {
				i++;
			}
		});
		if(i>0) {
			if (confirm("Xác nhận xóa")) {
				$('#multi_delete_form').submit();
			} else {
				return false;
			}
		} else {
			return false;
		}
		
	});
	
	$('.delete_button').live('click', function(){
		var href = $(this).attr('href');
		if (confirm("Xác nhận xóa")) {
			if(href){
				window.location.href=href;	
			}
			return true;					
		}
		return false;
	});
	$('.restore_button').live('click', function(){
		var href = $(this).attr('href');
		if (confirm("Xác nhận khôi phục")) {
			if(href){
				window.location.href=href;	
			}
			return true;					
		}
		return false;
	});
	
});

function loaddingOn() {
	$('.mask').show();
	get_position($('#loadingImg'));
}

function loaddingOff() {
	$('.mask').hide();
}

function get_position(id)
{
	var h=$(window).height();
	var w=$(window).width();
	var mt=(h-id.outerHeight(true))/2;
	var ml=(w-id.outerWidth(true))/2;
	var dh=id.outerHeight(true);
	var p=dh>h?'absolute':'fixed';
	if(p=='absolute'){id.appendTo(document.body);mt=$(window).scrollTop();}
	$(id).css({'top':mt,'left':ml,'position':p,});
}

function autoResize(id){
    var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
    }

    document.getElementById(id).height= (newheight) + "px";
}

var currentValue = '';
var currentType  = '';

function script_page(element, data) {
	loaddingOn();
	var href = element.attr('href');
	
	data.sortType   = currentType;
	data.sortValue  = currentValue;
	data.type 	   = 'ajax';
	
	$.post(href, data, function(html){
		$('.boxContent').replaceWith(html);
		loaddingOff();
	});
	
}

function script_sort(element, href, data) { 
	loaddingOn();
	 
	var sortValue = element.attr('href');
	var sortType  = (sortValue==currentValue)?(currentType=='ASC'?'DESC':'ASC'):'DESC';
	 				
	currentValue  = sortValue;
	currentType   = sortType;
	 	
	sortImage = sortType=='ASC'?'asc_order.png':'desc_order.png';
	sortImage = '<img src="'+site_root_domain+'public/Admin/images/'+sortImage+'" />';
	 
	data.sortType   = sortType;
	data.sortValue  = sortValue;
	data.type 	   = 'ajax';
	 
	$.post(href, data, function(html){
		$('.boxContent').replaceWith(html);
		$('#icon_start').hide();
		$('#titleSort a[href="'+sortValue+'"]').html($('#titleSort a[href="'+sortValue+'"]').html()+' '+sortImage);
		loaddingOff();
	});
}