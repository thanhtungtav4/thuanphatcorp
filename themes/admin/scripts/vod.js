function editInfo(value,id,nameDB)
{
	 
	//var value = $( "#popular_"+id ).val(); alert(value);
	var html = ' <input type="text" id="txt_popular_'+id+'" name="txt_popular_'+id+'" value="'+value+'" /> <input type="button" class="bntAll" onclick="xl_editInfo('+id+',';
	html += "'"+nameDB+"'";
	html += ')" value="Save" />';
	
	$('#itemEdit_'+id).html(html);
}
function xl_editInfo(id,nameDB)
{ 
	var txt_popular = $( "#txt_popular_"+id ).val() ;
	if(txt_popular > 0 ){
	var data 			= new Object();
	var href 			= 'items/saveRecommend'; 
	data.id		 		= id;
	data.txt_popular 	= txt_popular ;
	data.info 			= nameDB; //resolution
	 
	$.post(href, data, function(html){
		html = '<label style=" background-color:#E7EAEE ; padding:5px" onclick="editInfo(';
		html += "'"+txt_popular+"',"+id+","+"'"+nameDB+"');";
		html += '"  >'+txt_popular+'</label>';
		$('#itemEdit_'+id).html(html);
	});
	} else alert('Nhập số lớn hơn 0');
}



function viewDetail( element , data )
	{  
		var href = element.attr('href');
		data.type 	   = 'ajax';
		mang = href.split("/");
		id_obj = mang[mang.length-2];
		$.post(href, data, function(html){
			$('#detailObj').html(html);
			$('#tr_' + obj_id_old).removeClass('active'); 
			$('#tr_' + id_obj).addClass('active');
			
			obj_id_old  =  id_obj;
		});
		 
	}
	
	function editlink(obj_id)
	{  
		
		var data 	= new Object();
		var href 	= 'admin/vod/editlink';
		data.id 	= obj_id;
		id_obj 		= obj_id ; 
		
		$.post(href, data, function(html){
			$('#detailObj').html(html);
			$('#tr_' + obj_id_old).removeClass('active');
			$('#tr_' + id_obj).addClass('active');
			
			obj_id_old  =  id_obj;
		});
	}
	
	function change(publish,obj_id){  
		 if (confirm("Xác nhận thay đổi")) {
				var data 		= new Object();
				var href 		= 'admin/vod/publishvod';
				data.publish 	= publish; 
				data.id 		= obj_id;
				 
				$.post(href, data, function(html){
					$('#td_'+obj_id).html(html);
				});
				
		} else {}
		
	}
	function managerlink(obj_id)
	{   
		var data 	= new Object();
		var href 	= 'admin/vod/managerlink';
		data.id 	= obj_id;
		id_obj 		= obj_id ; 
		
		$.post(href, data, function(html){
			$('#detailObj').html(html);
			$('#tr_' + obj_id_old).removeClass('active');
			$('#tr_' + id_obj).addClass('active');
			
			obj_id_old  =  id_obj;
		});
	}
	
	function save_link(obj_id)
	{ 
		var data 		= new Object();
		var href 		= 'admin/vod/savelink'; 
		data.vod_id 	= obj_id;
		data.http240 	= $( "#http_240" ).val() ;
		data.http360 	= $( "#http_360" ).val() ;
		data.http480 	= $( "#http_480" ).val() ;
		data.http720 	= $( "#http_720" ).val() ;
		data.http1080 	= $( "#http_1080" ).val() ;
		data.video_id 	= $( "#video_id" ).val() ;
		
		data.type    	= $( "#type" ).val() ;
		 
		$.post(href, data, function(html){
			$('#detailObj').html(html);
		});
		
		managerlink(obj_id);
	}
	
	var check_240p = check_360p = check_480p = check_720p = check_1080p = 0 ;
	
	function checklink(value)
	{ 
		value = value + 0 ;
	 
		// http://media.accessasia.tv:1935/vod_film/mp4:Nhiem.Vu.Dac.Biet.01.02.03.480p/playlist.m3u8
		var http_host = $( "#http_host" ).val() ;
		var file = $( "#name_vod" ).val() ;
		
		if(value == 1 ){
			if(check_240p == 0)
			{
				$( "#http_240" ).val( http_host + '/mp4:' + file + '.240p/playlist.m3u8' ) ;
				check_240p = 1;
			}else
			{
				$( "#http_240" ).val('') ;
				check_240p = 0;
			}
		} 
		if(value == 2 ){  
			if(check_360p == 0)
			{
				$( "#http_360" ).val( http_host + '/mp4:' + file + '.360p/playlist.m3u8' ) ;
				check_360p = 1;
			}else
			{
				$( "#http_360" ).val('') ;
				check_360p = 0;
			}
		} 
		if(value == 3 ){
			if(check_480p == 0)
			{
				$( "#http_480" ).val( http_host + '/mp4:' + file + '.480p/playlist.m3u8' ) ;
				check_480p = 1;
			}else
			{
				$( "#http_480" ).val('') ;
				check_480p = 0;
			}
		} 
		if(value == 4 ){
			if(check_720p == 0)
			{
				$( "#http_720" ).val( http_host + '/mp4:' + file + '.720p/playlist.m3u8' ) ;
				check_720p = 1;
			}else
			{
				$( "#http_720" ).val('') ;
				check_720p = 0;
			}
		} 
		if(value == 5 ){
			if(check_1080p == 0)
			{
				$( "#http_1080" ).val( http_host + '/mp4:' + file + '.1080p/playlist.m3u8' ) ;
				check_1080p = 1;
			}else
			{
				$( "#http_1080" ).val('') ;
				check_1080p = 0;
			}
		} 
		
	}
	
	
	
	function editTM(value,id)
	{
		//var value = $( "#popular_"+id ).val(); alert(value);
		var html = ' <select id="value_tm'+id+'" name="value_tm'+id+'"> <option value="0">Phụ đề</option> <option value="1">Thuyết minh</option> </select> <input type="button" class="bntAll" onclick="xl_editTM('+id+')" value="Save" />';
		 
		$('#infoTM_'+id).html(html);
	}
	
	function xl_editTM(id)
	{ 
		var value_tm = $( "#value_tm"+id ).val() ;
		 
		var data 			= new Object();
		var href 			= 'admin/vod/saveDate'; 
		data.id		 		= id;
		data.txt_popular 	= 'Phụ đề' ;
		if(value_tm == 1)	data.txt_popular 	= 'Thuyết Minh' ;
		data.txt_popular 	= value_tm ;
		 
		if(value_tm == 1)	value_tm 	= 'Thuyết Minh' ;
		else 				value_tm 	= 'Phụ đề' ;
		
		data.info 			= 'is_voice';
		 
		$.post(href, data, function(html){
			html = '<label style=" background-color:#E7EAEE ; padding:5px" onclick="editTM(';
			html += "'"+value_tm+"',"+id+");";
			html += '"  >'+value_tm+'</label>';
			$('#infoTM_'+id).html(html);
		});
	}
	
	