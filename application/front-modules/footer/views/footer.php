 <div class="ft-top container-fluid " >
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-lg-4" style="padding-right:0;">
                    <div class="block-socialFt">
                        <div class="Content" >
                            <h2 class="title" style="text-transform:uppercase"> Về Chúng Tôi</h2>
                            <div >
                                <div class="row container" >
                                    <div class="col-md-6" style="margin-left:-15px;max-width: 60%;flex: 0 0 60%">
                                        <!-- <h3><strong>Trần Mai Hiên</strong></h3>
                                        <h4>Kinh nghiệm: 6 năm tư vấn đầu tư bất động sản chuyên nghiệp.<br><br>Thuộc khối DKRA Việt Nam</h4>
                                        <h3> </h3>                  </div>
                                    <div class="col-md-6"  style="flex: 0 0 40%;">
                                        <a ><img src="files/image/tranmaihien.png" alt=""/></a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="block-getmail">
                        <div class="Content">
                            <h2 class="title" style="text-transform:uppercase">KẾT NỐI VỚI Giám Đốc Sàn .Com</h2>
                            <script async defer crossorigin="anonymous" src=""></script>
                            <div class="fb-like" data-href="h" data-width="300px" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                            <ul class="nav navbar-nav" style="display: block;padding-top: 10px;padding-bottom: 10px;  ">
                                <li style="padding-left:0px"><a id="fb" href="" target="_blank" ><em class="fa fa-facebook" aria-hidden="true"></em></a></li>
                                <li style="padding-left:5px"><a id="youtube" href="" target="_blank"><em class="fa fa-youtube-play" aria-hidden="true"></em></a></li>
                                <li style="padding-left:5px"><a id="google" href=" target="_blank"><em class="fa fa-google-plus" aria-hidden="true"></em></a></li>
                                <li style="padding-left:5px"><a id="zalo" href="" target="_blank"><img alt="" src="http://localhost/thuanphatcorp/themes/front/assets/img/icon_zalo.png"></a></li>
                                <li style="padding-left:5px"><a id="viber" href="" target="_blank"><img alt="" src="http://localhost/thuanphatcorp/themes/front/assets/img/icon_viber.png"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6 col-lg-4">
                    <div class="block-infoFt">
                        <div class="Content">
                            <h2 class="title" style="text-transform:uppercase">Địa CHỉ Liên Hệ</h2>
                            <ul class="nav navbar-nav">
                                <li><em class="fa fa-map-marker" aria-hidden="true"></em>
                                    <span><a>67 An Điềm, Phường 10, Quận 5, Tp.HCM</a></span>
                                </li>
                                <li><em class="fa fa-phone" aria-hidden="true"></em>
                                    <span><a>0702066686</a></span>
                                </li>
                                <li><em class="fa fa-envelope" aria-hidden="true"></em>
                                    <span><a href="mailto:thuanphatcorp@gmail.com">thuanphatcorp@gmail.com</a></span>
                                </li>
                                <li><em class="fa fa-globe" aria-hidden="true"></em>
                                    <span><a href="<?php echo base_url();?>" target="_blank"><?php echo base_url();?></a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ft-bot">
        <div class="copyright" >
            Copyright &copy; <?php echo base_url();?> All Right Reserved
        </div>
    </div>
</div>
<div class="row">
    <a id="return-to-top"><i class=" fa fa-angle-double-up" style="font-size: 35px;"></i></a>
</div>
<div class="contact-bar " style="position:fixed;bottom:0px;z-index:1">
    <ul class="nav navbar-nav" style="display: block;padding-top: 3px;padding-bottom: 3px;  ">
        <li><a id="contact-icon" href="tel:0702066686" target="_blank"><img alt="call" src="http://localhost/thuanphatcorp/themes/front/assets/img/icon_call.png"></a></li>
        <li><a id="contact-icon" href="sms:0702066686" target="_blank"><img alt="sms" src="http://localhost/thuanphatcorp/themes/front/assets/img/sms-icon.jpg"></a></li>
        <li><a id="contact-icon" href="h#" target="_blank"><img alt="messenger" src="http://localhost/thuanphatcorp/themes/front/assets/img/icon_messenger.png"></a></li>
        <li><a id="contact-icon" href="#" target="_blank"><img alt="zalo" src="http://localhost/thuanphatcorp/themes/front/assets/img/icon_zalo.png"></a></li>
    </ul>
</div>
</body>
<!-- Mirrored from demo.techdev.vn/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 17 Mar 2019 06:00:11 GMT -->
</html>
<script type="text/javascript">
    $('.carousel').carousel({
        pause: "false"
    });

    $(document).ready(function() {
        var aboveHeight = 0;
        $(window).scroll(function(){
            if ($(window).scrollTop() > aboveHeight){

                $('#left-menu-mobile').addClass('fix').next();

            } else {

                $('#left-menu-mobile').removeClass('fix').next();
            }
        });
        $(window).scroll(function(){
            if ($(window).scrollTop() > aboveHeight){
                $('sticknav').addClass('fixed').next();
                $('.top-main').addClass('main-2').next();
            } else {
                $('sticknav').removeClass('fixed').next();
                $('.top-main').removeClass('main-2').next();
            }
        });
        //Scroll to top
        $(window).scroll(function() {
            if ($(this).scrollTop() >= 100)
            {        // If page is scrolled more than 50px
                $('#return-to-top').fadeIn(200);    // Fade in the arrow
            }
            else
            {
                $('#return-to-top').fadeOut(200);   // Else fade out the arrow
            }
        });

        $('#return-to-top').click(function() {      // When arrow is clicked
            $('body,html').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });

    });
</script>
<script>
    $(document).ready(function(){
        $("#search").click(function(){
            $("#phone-hot").fadeOut();
            $("#input_search").fadeIn();
            $("#hide").fadeIn();

        });
        $("#hide").click(function(){
            $("#input_search").fadeOut();
            $("#hide").fadeOut();
            $("#phone-hot").fadeIn();
        });
    });
    function myFunction() {
        var x = document.getElementById("left-nav");

        if (x.style.display === "block") {
            x.style.display = "none";
            $('i#icon-nav-menu').removeClass('fa fa-times').next();
            $('i#icon-nav-menu').addClass('fa fa-list-ul').next().css('font-size','30px');

        } else {
            x.style.display = "block";
            $('i#icon-nav-menu').removeClass('fa fa-list-ul').next();
            $('i#icon-nav-menu').addClass('fa fa-times').next();


        }
    }

</script>
<!-- toggle sidebar -->
<script>
    function openNav() {
        document.getElementById("collapsibleNavbar").style.width = "300px";
        $('#collapsibleNavbar').click(function() {      // When arrow is clicked
            $('#collapsibleNavbar').animate({
                scrollTop : 0                       // Scroll to top of body
            }, 500);
        });
    }
    function closeNav() {
        document.getElementById("collapsibleNavbar").style.width = "0";
    }
</script>
<script>
    var dropdown = document.getElementsByClassName("dropdown-toggle");
    var i;

    for (i = 0; i < dropdown.length; i++) {
        dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
            } else {
                dropdownContent.style.display = "block";
            }
        });
    }
</script>
<script>
    if($( window ).width() <= 1024)
    {
        $('.dropdown-toggle').dropdown();
    }
</script>