<!-- HEADER -->

<?php echo Modules::run('header'); ?>



<body>

    <?php
    
  
    
    
    if($this->uri->segment(1) == 'admin' && $this->uri->segment(2) == 'login' ){   // Trang login ,  Kg can TOP , LEFT , FOOTER
        
           
                echo $template['body'];  
        
        
    }else{
        ?>
                        
                <!-- TOP -->
               <?php echo Modules::run('top'); ?>
                
                    
                <div class="ch-container">
                    <div class="row">
                        
                        <!-- left menu starts -->
                        <?php echo Modules::run('left'); ?>
                        <!-- left menu ends -->
                 
                        <div id="content" class="col-lg-10 col-sm-10">
                            <!-- content starts -->
                            <?php echo $template['body']; ?>
                       
                        </div> 
                 
                    <!-- FOOTER -->
                        <?php echo Modules::run('footer'); ?>
                    
                    </div><!--/.fluid-container-->
                    
                </div><!-- external javascript -->
     
     
     
        <?php
    }
    ?>



    
    <script src="<?php echo THEMES; ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    
    <!-- library for cookie management -->
    <script src="<?php echo THEMES; ?>js/jquery.cookie.js"></script>
    <!-- calender plugin -->
    <script src='<?php echo THEMES; ?>bower_components/moment/min/moment.min.js'></script>
    <script src='<?php echo THEMES; ?>bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
    <!-- data table plugin -->
    <script src='<?php echo THEMES; ?>js/jquery.dataTables.min.js'></script>
    
    <!-- select or dropdown enhancer -->
    <script src="<?php echo THEMES; ?>bower_components/chosen/chosen.jquery.min.js"></script>
    <!-- plugin for gallery image view -->
    <script src="<?php echo THEMES; ?>bower_components/colorbox/jquery.colorbox-min.js"></script>
    <!-- notification plugin -->
    <script src="<?php echo THEMES; ?>js/jquery.noty.js"></script>
    <!-- library for making tables responsive -->
    <script src="<?php echo THEMES; ?>bower_components/responsive-tables/responsive-tables.js"></script>
    <!-- tour plugin -->
    <script src="<?php echo THEMES; ?>bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
    <!-- star rating plugin -->
    <script src="<?php echo THEMES; ?>js/jquery.raty.min.js"></script>
    <!-- for iOS style toggle switch -->
    <script src="<?php echo THEMES; ?>js/jquery.iphone.toggle.js"></script>
    <!-- autogrowing textarea plugin -->
    <script src="<?php echo THEMES; ?>js/jquery.autogrow-textarea.js"></script>
    <!-- multiple file upload plugin -->
    <script src="<?php echo THEMES; ?>js/jquery.uploadify-3.1.min.js"></script>
    <!-- history.js for cross-browser state change on ajax -->
    <script src="<?php echo THEMES; ?>js/jquery.history.js"></script>
    <!-- application script for Charisma demo -->
    <script src="<?php echo THEMES; ?>js/charisma.js"></script>
    

</body>
</html>
