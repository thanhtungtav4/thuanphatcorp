
    get_top_bar();
  
    function get_top_bar(){
        //jQuery.get(baseurl + "top/top_bar", function(top_bar){ // Get the contents of the url cart/show_cart
		//	jQuery("#topbar").html(top_bar); // Replace the information in the div #cart_content with the retrieved data
		//}); 
    }

    function replaceUnicode(str)
    {
        var str = jQuery.trim(str);
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
        /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
        str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1-
        str = str.replace(/^\-+|\-+$/g, "");
        return str;
    }
    function isValidEmailAddress(emailAddress) {
        var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
        // alert( pattern.test(emailAddress) );
        return pattern.test(emailAddress);
    }; 
    // search
    jQuery('#keyword').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') { 
            jQuery(this).val(replaceUnicode(jQuery(this).val())); 
        } 
    }); 
    jQuery("#icon_search").click(function () {  
        if (!isValidEmailAddress(jQuery("#keyword").val())) { 
            var val = replaceUnicode(jQuery('#keyword').val()); 
        }else{
            var val = jQuery('#keyword').val(); 
        } 
        if (val == '') {
            jQuery('#keyword').focus(); 
        } else {
            jQuery("#frmSearch").submit();
        }
    }); 
    jQuery('#frmSearch').submit(function(){   
        var $this = jQuery(this),
        action = $this.attr('action');   
        jQuery('#frmSearch').attr('action', action+'/'+replaceUnicode(jQuery('#keyword').val()));   
    });  