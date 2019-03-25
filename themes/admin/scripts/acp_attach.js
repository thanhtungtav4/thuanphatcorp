
	function insert_thumbnail( sub_folder, name, url, width, height )
	{
		// alert(site_root_domain);
		parent.tinyMCE.execCommand("mceInsertContent",false,'<img border="0" height="'+height+'" src="'+site_root_domain+'upload/images/images/'+sub_folder+'/thumbnail/'+url+'" width="'+width+'" />');
	}

	function insert_image( sub_folder, name, url, width, height )
	{
		parent.tinyMCE.execCommand("mceInsertContent",false,'<img border="0" height="'+height+'" src="'+site_root_domain+'upload/images/images/'+sub_folder+'/'+url+'" width="'+width+'" title="'+name+'" />');
	}
	
	function insert_file( sub_folder, name, url )
	{
		parent.tinyMCE.execCommand("mceInsertContent",false,'<a href="'+site_root_domain+'upload/images/images/'+sub_folder+'/'+url+'">'+name+'</a>');
	}
	
	function insert_url( sub_folder, name, url )
	{
		parent.tinyMCE.execCommand("mceInsertContent",false,''+site_root_domain+'upload/images/images/'+sub_folder+'/'+url);
	}
	
	function delete_attach( name, url, twidth, theight, width, height )
	{
		var newdata = parent.tinyMCE.activeEditor.getContent();
		newdata = newdata.replace('<img border="0" src="'+site_root_domain+'upload/images/images/thumbnail/'+url+'" />', "");
		newdata = newdata.replace('<img border="0" height="'+theight+'" src="'+site_root_domain+'upload/images/images/thumbnail/'+url+'" width="'+twidth+'" />', "");
		newdata = newdata.replace('<img border="0" src="'+site_root_domain+'upload/images/images/'+url+'" />', "");
		newdata = newdata.replace('<img border="0" height="'+height+'" src="'+site_root_domain+'upload/images/images/'+url+'" width="'+width+'" />', "");
		newdata = newdata.replace('<a href="'+site_root_domain+'upload/images/images/'+url+'">'+name+'</a>', "");
		newdata = newdata.replace(''+site_root_domain+'upload/images/images/'+url, "");
		parent.tinyMCE.activeEditor.setContent(newdata);
	}