/*
    function setup editor with ckeditor
    function need id's textarea, width, height
    how to use it ?
        CreateEditor('editor', 500, 300);
        editor: id's textarea
*/    
var editorObj;
function CreateEditor(id, width, height){
	editorObj = CKEDITOR.replace(id, {
		height: height,
        width: width,
		/*uiColor: '#9D4F00',
        contentsCss: 'content.css',*/
        //skin: 'moono-light',
		enterMode: CKEDITOR.ENTER_BR,
		//language: 'vi',
        filebrowserBrowseUrl : './public/Admin/scripts/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : './public/Admin/scripts/ckfinder/ckfinder.html?Type=Images',
        filebrowserFlashBrowseUrl : './public/Admin/scripts/ckfinder/ckfinder.html?Type=Flash',
        filebrowserUploadUrl : './public/Admin/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : './public/Admin/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : './public/Admin/scripts/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
        toolbar: [
    		[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],
            [ 'Link', 'Unlink', 'Anchor' ],
            [ 'Image', 'Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ],
            [ 'Maximize' ],
            [ 'Source' ],
            [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ],
            [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ],
            [ 'Styles','Format','Font','FontSize' ],
			[ 'TextColor','BGColor' ]
    	]
    });
}
/*
    function refresh new captcha
*/
function new_captcha(path, id){ 
    var c_currentTime = new Date();
    var c_miliseconds = c_currentTime.getTime();
    document.getElementById(id).src = path+'captcha.php?x='+ c_miliseconds;
}
/* 
    editor tinymce 
    Javascript for TBL
    how to use it ?
        tbl.editor('description', 990, 350);
        description: id's textarea
*/
var tbl = {
	editor: function(id, w, h) {
		tinyMCE.init({
			mode : "exact",
			elements : id,
			theme : "advanced",
            width: w,
            height: h,
			plugins : "style,table,advimage,advlink,insertdatetime,preview,flash,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,imagemanager,safari,layer,media,advhr,emotions,iespell,preview,xhtmlxtras,inlinepopups",
			theme_advanced_buttons1_add_before : "save,newdocument,separator",
			theme_advanced_buttons1_add : "fontselect,fontsizeselect",
			theme_advanced_buttons2_add : "separator,insertdate,inserttime,preview,separator,forecolor,backcolor",
			//theme_advanced_buttons2_add_before: "cut,copy,paste,pastetext,pasteword,separator,search,replace,separator",
			theme_advanced_buttons3_add_before : "tablecontrols,separator",
			theme_advanced_buttons3_add : "emotions,iespell,flash,advhr,separator,print,separator,ltr,rtl,separator,fullscreen",
			//theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,teaser",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_path_location : "bottom",
			plugin_insertdate_dateFormat : "%Y-%m-%d",
			plugin_insertdate_timeFormat : "%H:%M:%S",
			extended_valid_elements : "hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",
			file_browser_callback : "ajaxfilemanager",
			theme_advanced_resize_horizontal : false,
			theme_advanced_resizing : true
		});
	}, // Action
	deleted: function(href, title) {
		if(confirm(title)) {
			document.myform.action = href;
			document.myform.submit();
			return true;
		} else return false;
	},	
	button: function(href) {
		document.myform.action = href;
		document.myform.submit();
		return true;
	}
} // end tinymce editor
