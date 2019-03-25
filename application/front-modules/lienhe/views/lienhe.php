<br>
<br>
<br>
<br>
<br>
<br>
<br>
<script> 

  function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
    // alert( pattern.test(emailAddress) );
    return pattern.test(emailAddress);
  }; 

  function submit_cart(){
    var error = false;
    var message_error = ''; 
    
    
    if (!isValidEmailAddress(jQuery("#email").val())) {
      error = true;
      message_error += "Email.\n";
    }
    if (jQuery("#name").val() == '') {
      error = true;
      message_error += "Tên.\n";
    }
    if (jQuery("#phone").val() == '') {
      error = true;
      message_error += "Số điện thoại.\n";
    }
    
    if (jQuery("#address").val() == '') {
      error = true;
      message_error += "Địa chỉ.\n";
    }
    

    // end check
    if (error == true) {
      alert("Vui lòng nhập: "+message_error);
      return false;

    } else {
      return true;
    }
    
    
    
  }
</script>

<div class="page-contact" id="fullpage">
  <section class="contact">
    <div class="container">
      <h1>THÔNG TIN LIÊN HỆ</h1>
      <p>Qúy khách vui lòng điền yêu cầu vào Form bên dưới , chuyên viên sẽ liên hệ để tư vấn cho quý khách.Thông tin của quý khách sẽ 100% được bảo mật </p>

      <div class="contact-form">
        <div class="col-md-7">
          <div class="row">
            <h2>FORM LIÊN HỆ</h2>
          </div>
          <div class="row">
           <form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo base_url('lienhe/lienhe11'); ?>" onsubmit="return submit_cart();">
            <div id="frmContact">
              <div class="input-group input-group-50-left">
                <input type="text" name="name" id="name" class="textbox txtcontactName" placeholder="Tên" autocomplete="off">
                <i class="fa fa-user icon-input"></i>
              </div>
              <div class="input-group input-group-50-right">
                <input type="text" name="phone" id="phone" class="textbox txtcontactMobile" placeholder="Phone" autocomplete="off">

                <i class="fa fa-phone icon-input"></i>
              </div>
              <div class="input-group">
                <input type="email" name="email" id="email" class="textbox txtcontactEmail" placeholder="Email" autocomplete="off">
                <i class="fa fa-envelope-o icon-input"></i>
              </div>
              <div class="input-group">
                <textarea rows="8" id="content" name="content" class="textbox textarea txtcontactMessage" placeholder="Nội dung" autocomplete="off"></textarea>
                <i class="fa fa-comments icon-input"></i>
              </div>


              <div class="clearfix"></div>


              <div class="span6"> 
               <div class="buttons-set ">  
                <input type="submit" class="btn btn-primary" value="Đăng Ký" style="background: #000000 !important;"> 
              </div>
            </div>



          </div></form>
        </div>
      </div>

      <div class="col-md-5">
        <div class="row">
          <div class="contact-info">
            <div class="border">
              <h3>CÔNG TY CỔ PHẦN ĐỊA ỐC PHÚ THÀNH SƠN</h3>
              <h4>Địa Chỉ</h4>
              <p>40 Đặng Đức Thuật, P.Tân Phong, Quận 7 TP.HCM</p>
              <div class="group-info-icon">
                <p>
                  <i class="round fa fa-phone"></i><strong>Holine</strong><br>
                  093.351.2727
                </p>
                <p>
                  <i class="round fa fa-envelope-o"></i><strong>Email</strong><br>
                  info@uniqueland.com.vn
                </p>
                <p>
                  <i class="round fa fa-home"></i><strong>Website</strong><br>
                  <a href="http://uniqueland.com.vn/">www.uniqueland.com.vn</a>
                </p>
              </div>
            </div>
          </div></div></div></div></div></section>
        </div>
     