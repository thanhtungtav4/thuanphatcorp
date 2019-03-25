<script language="javascript">
	var site_root_domain = "<?php echo $this->config->item('static_path'); ?>";
</script>
<script type="text/javascript" src="<?php echo $this->config->item('static_path'); ?>themes/admin/scripts/acp_attach.js"></script>
<style>
	.tbl_attach th{padding:10px; color:#232323; font-size:13px; font-family:Verdana, Geneva, sans-serif}
	.tbl_attach td{padding:5px;  font-family:Verdana, Geneva, sans-serif; font-size:13px;}
</style>
<?php

   
 
	if (count($images)>0) {
		?>
		<table style="background:white; border-collapse:collapse; width:100%" class="tbl_attach" cellpadding="0" cellpadding="20" border="1" bordercolor="#ececec">
            <tr style="background:#ececec">
                <th><?='HOME'?></th>
                <th><?='image'?></th>
                <th><?='add_image'?></th>
                <th><?='action'?></th>
            </tr>
			<?php
            $stt=0;
            foreach($images as $key=>$val) {
            ?>
            <tr>
                <td align="center">
					<?=$stt+1;?>
                </td>
                <td align="center">
					<a class="img_url" target="_blank" href="<?=$val['url']; ?>" >
                    	<img class="img_ico" alt="<?=$val['image_Name_file']; ?>" src="<?=$val['thumb_url']; ?>" style="max-width:30px; max-height:30px;" />
                    </a>
                </td>
                <td align="center">
                    <p class="align_right" style="color: #333333;">
                        [<a href="javascript:insert_thumbnail(<?php echo "'".$val['date']."'";?>, '<?=$val['image_Name_file']; ?>', '<?=$val['image_Name']; ?>', '', '');">Thumbnail</a>]&nbsp; 
                        [<a href="javascript:insert_image(<?php echo "'".$val['date']."'";?>, '<?=$val['image_Name_file']; ?>', '<?=$val['image_Name']; ?>', '', '');">Image</a>]&nbsp;
                        
                    </p>
                </td>
            
                <td align="center">
                	<a href='<?php 
                    if(isset($module_id))
                        echo base_url()."attach/delete_attach?image=".$val['image_Name']."&module_name=".$module_name."&module_id=".$module_id;
                    else
                        echo base_url()."attach/delete_attach?image=".$val['image_Name']."&module_name=".$module_name; 
                    ?>' onclick="return confirm('<?="Có chắc muốn xóa?" ?>');" >
                    	Delete
                    </a>
                </td>
            </tr> 
            <?php
            $stt++;
            }   
            ?>
        </table><br /><br /><br />
		<?php
	}
?>
<form method="post" action="<?=base_url()."attach/add?module_name=$module_name&module_id=$module_id"?>"  enctype="multipart/form-data">
    <input type="file" name="upload[]" id="upload" multiple="multiple" />
    <input type="submit" name="fsubmit" id="fsubmit" value="UPLOAD" />
</form>
			
