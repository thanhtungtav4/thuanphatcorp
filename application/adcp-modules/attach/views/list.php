<script>
    var module = '<?php echo $this->uri->segment(1); ?>';
    var base_url = '<?php echo base_url(); ?>';
</script>
<section id="content">
    <section class="vbox">
        <section class="scrollable padder">
            <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> Home</a></li>
                <li><a href="<?php echo base_url() . $this->uri->segment(1); ?>"><?php
                        if ($module_title) {
                            echo $module_title;
                        } else {
                            echo $this->uri->segment(1);
                        };
                        ?></a></li>
                <!--<li class="active">Static table</li>-->
            </ul>
            <div class="row">
                <div class="col-sm-6">
                    <?php
                    /* @var $menusmodel Menus_model */
//                    $menusmodel = $this->load->model("Menus_model");
//                    isset($_GET['trash']) ? $status_array = array(0, 1, 2) : $status_array = array(0, 1);
//                    $menus = $menusmodel->get_tree($status_array);
                    ?>
                    <form id="menu-sorter-form-top" data-validate="parsley" method="post" action="<?php echo base_url() . $this->uri->segment(1); ?>" >
                        <input type="hidden" name="menu_order" id="menu-top-order" value="">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">Danh sách thể loại</span>
                                <ul class="nav nav-tabs pull-right">
                                    <li <?php echo (!$this->input->get("trash") ? "class='active'" : ""); ?>><a href="<?php echo base_url() . $this->uri->segment(1); ?>" ><i class="fa fa-file-text text-default"></i>&nbsp; Menus</a></li>
                                    <li <?php
                                    echo ($this->input->get("trash") ? "class='active'" : "");
                                    ;
                                    ?>><a href="<?php echo base_url() . $this->uri->segment(1) . "?trash=1"; ?>" ><i class="fa fa-trash-o text-default"></i>&nbsp; Hiện menus đã xóa</a></li>
                                </ul>
                            </header>
                            <header class="panel-heading">
                                <span class="h4">Banner Top</span>
                            </header>
                            <div class="panel-body">
                                <div class="dd" id="menus-top" data-output="">
                                    <ol class="dd-list">
                                        <?php
                                        if (isset($cat_attach['banner'])) {
//                                            print_r($menus['top']);exit;
                                            foreach ($cat_attach['banner'] as $cat) {
												if($cat->loai == 1){
                                                ?>
                                                <li class="dd-item parent_category <?php echo "status_" . $cat->status; ?>" data-id="<?php echo $cat->id; ?>">
                                                    <div class="dd-handle"><?php echo $cat->bannerName; ?></div>
                                                    <span class="pull-right" style="position: absolute;right: 0px;top: 6px;">
                                                        <?php ?>
                                                        <a title="Chỉnh sửa danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '?id=' . $cat->id; ?>"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                                                        <?php ?>
                                                        <?php if ($cat->status != 2) { ?>
                                                            <a href="<?php echo base_url() . $this->uri->segment(1) . '/quick_trash?ids=' . $cat->id; ?>"><i class="fa fa-times icon-muted fa-fw"></i></a>
                                                        <?php } else { ?>
                                                            <a title="Hiện danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '/update_status/' . $cat->id . '?status=1&return=1' ?>"><i class="fa icon-muted  fa-fw  fa-check-circle-o"></i></a>
                                                        <?php } ?>
                                                    </span>
                                                </li>
                                                <?php
												}
                                            }
                                        }
                                        ?>
                                    </ol>
                                </div>

                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <?php ?>
                                <input type="button" onclick="update_form($('#menu-sorter-form-top'), update_menu_top_callback);
                                        return false;" class="btn btn-success btn-s-xs" value="Cập nhật thứ tự"/>
                                       <?php ?>
                            </footer>
                        </section>
                        <style>
                            .dd li.status_0 .dd-handle{
                                color: #bbb;
                                background: #F7F7F7;
                            }
                            .dd li.status_2 .dd-handle{
                                color: #bbb;
                                background: #FF6666;
                            }


                        </style>
                    </form>
					<form id="menu-sorter-form-bottom" data-validate="parsley" method="post" action="<?php echo base_url() . $this->uri->segment(1); ?>" >
                        <input type="hidden" name="menu_order" id="menu-top-bottom" value="">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">Banner Main</span>
                            </header>
                            <div class="panel-body">
                                <div class="dd" id="menus-bottom" data-output="">
                                    <ol class="dd-list">
                                        <?php
                                        if (isset($cat_attach['banner'])) {
//                                            print_r($menus['top']);exit;
                                            foreach ($cat_attach['banner'] as $cat) {
												if($cat->loai == 2){
                                                ?>
                                                <li class="dd-item parent_category <?php echo "status_" . $cat->status; ?>" data-id="<?php echo $cat->id; ?>">
                                                    <div class="dd-handle"><?php echo $cat->bannerName; ?></div>
                                                    <span class="pull-right" style="position: absolute;right: 0px;top: 6px;">
                                                        <?php ?>
                                                        <a title="Chỉnh sửa danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '?id=' . $cat->id; ?>"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                                                        <?php ?>
                                                        <?php if ($cat->status != 2) { ?>
                                                            <a href="<?php echo base_url() . $this->uri->segment(1) . '/quick_trash?ids=' . $cat->id; ?>"><i class="fa fa-times icon-muted fa-fw"></i></a>
                                                        <?php } else { ?>
                                                            <a title="Hiện danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '/update_status/' . $cat->id . '?status=1&return=1' ?>"><i class="fa icon-muted  fa-fw  fa-check-circle-o"></i></a>
                                                        <?php } ?>
                                                    </span>
                                                </li>
                                                <?php
												}
                                            }
                                        }
                                        ?>
                                    </ol>
                                </div>

                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <?php ?>
                                <input type="button" onclick="update_form($('#menu-sorter-form-bottom'), update_menu_bottom_callback);
                                        return false;" class="btn btn-success btn-s-xs" value="Cập nhật thứ tự"/>
                                       <?php ?>
                            </footer>
                        </section>
                        <style>
                            .dd li.status_0 .dd-handle{
                                color: #bbb;
                                background: #F7F7F7;
                            }
                            .dd li.status_2 .dd-handle{
                                color: #bbb;
                                background: #FF6666;
                            }


                        </style>
                    </form>
                    <form id="menu-sorter-form-bottom" data-validate="parsley" method="post" action="<?php echo base_url() . $this->uri->segment(1); ?>" >
                        <input type="hidden" name="menu_order" id="menu-top-bottom" value="">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4">Logo</span>
                            </header>
                            <div class="panel-body">
                                <div class="dd" id="menus-bottom" data-output="">
                                    <ol class="dd-list">
                                        <?php
                                        if (isset($cat_attach['logo'])) {

                                            foreach ($cat_attach['logo'] as $cat) {
                                                ?>
                                                <li class="dd-item parent_category <?php echo "status_" . $cat->status; ?>" data-id="<?php echo $cat->id; ?>">
                                                    <div class="dd-handle"><?php echo $cat->logoName; ?></div>
                                                    <span class="pull-right" style="position: absolute;right: 0px;top: 6px;">
                                                        <?php ?>
                                                        <a title="Chỉnh sửa danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '?id=' . $cat->id; ?>"><i class="fa fa-pencil icon-muted fa-fw m-r-xs"></i></a>
                                                        <?php ?>
                                                        <?php if ($cat->status != 2) { ?>
                                                            <a href="<?php echo base_url() . $this->uri->segment(1) . '/quick_trash?ids=' . $cat->id; ?>"><i class="fa fa-times icon-muted fa-fw"></i></a>
                                                        <?php } else { ?>
                                                            <a title="Hiện danh mục" href="<?php echo base_url() . $this->uri->segment(1) . '/update_status/' . $cat->id . '?status=1&return=1' ?>"><i class="fa icon-muted  fa-fw  fa-check-circle-o"></i></a>
                                                        <?php } ?>
                                                    </span>
                                                </li>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </ol>
                                </div>

                            </div>
                            <footer class="panel-footer text-right bg-light lter">
                                <?php ?>
                                <input type="button" onclick="update_form($('#menu-sorter-form-bottom'), update_menu_bottom_callback);
                                        return false;" class="btn btn-success btn-s-xs" value="Cập nhật thứ tự"/>
                                       <?php ?>
                            </footer>
                        </section>
                        <style>
                            .dd li.status_0 .dd-handle{
                                color: #bbb;
                                background: #F7F7F7;
                            }
                            .dd li.status_2 .dd-handle{
                                color: #bbb;
                                background: #FF6666;
                            }


                        </style>
                    </form>

                </div>
                <?php ?>
                <div class="col-sm-6">
                    <form id='add-insert-menu-frm' method="post" action="<?php echo base_url() . $this->uri->segment(1); ?>/addedit_process/" enctype="multipart/form-data">
                        <input type="hidden" name="data[id]" value="<?php echo $obj->id; ?>">
                        <section class="panel panel-default">
                            <header class="panel-heading">
                                <span class="h4"><?php if ($obj->id) { ?>Sửa<?php } else { ?>Thêm<?php } ?> Logo & Banner</span>
                            </header>
                            <div class="panel-body">
                                <div id="msg_error_msg" style="color:#f00;"></div>
                                <div class="form-group">
                                    <label>Chọn Loại</label>
                                    <select name="data[nameModel]" id="menus_parent_position" class="form-control">
                                        <option value="banner" <?php
                                        if ($obj->nameModel == 'banner') {
                                            echo "selected";
                                        };
                                        ?>>Banner</option>
                                        <option value="logo" <?php
                                        if ($obj->nameModel == 'logo') {
                                            echo "selected";
                                        };
                                        ?>>Logo</option>
                                    </select>
                                </div>

                                <div class="form-group is_link_row">
                                    <label>Tên</label>
                                    <input  vname="Tên menu" type="text" name="data[bannerName]" id="bannerName" class="form-control" value="<?php echo $obj->bannerName; ?>">
                                    <input  vname="Tên menu" type="text" name="data[logoName]" id="logoName" class="form-control" value="<?php echo $obj->logoName; ?>">
                                </div>
								<div class="form-group is_link_row" id="bannerLoai">
                                    <label>Loại</label>
                                    <select name="data[loai]" id="menus_parent_position" class="form-control">
										<option value="1" <?php
                                        if ($obj->loai == 1) {
                                            echo "selected";
                                        };
                                        ?>>Top</option>
                                        <option value="2" <?php
                                        if ($obj->loai == 2) {
                                            echo "selected";
                                        };
                                        ?>>Main</option>
                                    </select>
                                </div>
                                <div class="form-group is_link_row">
                                    <label>Đường dẫn</label>
                                    <input maxlength="1024" type="text" name="data[slug]" class="form-control" value="<?php echo $obj->slug; ?>">
                                </div>
                                <script>
                                    $(document).ready(function ()
                                    {
                                        $("#logoName").hide();
<?php if ($obj->nameModel == 'banner') { ?>
                                            $("#bannerName").show();
											$("#bannerLoai").show();
                                            $("#logoName").hide();
<?php } ?>
<?php if ($obj->nameModel == 'logo') { ?>
                                            $("#logoName").show();
											$("#bannerLoai").hide();
                                            $("#bannerName").hide();
<?php } ?>
                                    });
                                    $("#menus_parent_position").change(function () {
                                        if (this.value == 'banner')
                                        {
											$("#bannerLoai").show();
                                            $("#bannerName").show();
                                            $("#logoName").hide();
                                        }
                                        if (this.value == 'logo')
                                        {
											$("#bannerLoai").hide();
                                            $("#bannerName").hide();
                                            $("#logoName").show();
                                        }
                                    });

                                </script>
                                <script type="text/javascript">
                                    $(document).ready(function (e) {
                                        $('.aut_img').each(function (index, element) {
                                            $(this).error(function () {
                                                $(this).hide();
                                            });
                                        });
                                    });
                                    function readURL(input) {
                                        if (input.files && input.files[0]) {
                                            var reader = new FileReader();

                                            reader.onload = function (e) {
                                                $('#blah').attr('src', e.target.result).show();
                                            }
                                            reader.readAsDataURL(input.files[0]);
                                        }
                                    }
                                </script>
                                <div class="form-group is_link_row">
                                    <label>Hình ảnh</label>
                                    <a title="<div>Kích thước chuẩn:<div> <div>960x800 - .jpg .png .gif</div>Dung lượng tối đa: 2Mb ">
                                        <input type="file" onChange="readURL(this);" name="img" id="img" > <br />
                                    </a>
                                    <?php
                                    if ($obj->location) {
                                        ?><label for="hinhanh">Hình Cũ</label>
                                        <img src="<?php echo $this->config->item("img_path"). $obj->location; ?>" width="100%" height="100%" />
                                        <br>
                                        <label for="hinhanh">Hình Mới</label>
                                        <?php
                                    }
                                    ?><img class="aut_img" id='blah' src='' style=" max-width: 100%; max-height: 100%;" />
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-5 control-label" style="margin-left: -13px;">Hoạt động</label>
                                    <div class="col-sm-7">
                                        <label class="switch">
                                            <input type="checkbox" value="1" name="data[status]" <?php if ($obj->status || !$obj->id) { ?>checked<?php } ?>>
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <footer class="text-right bg-light lter">
                                    <input type="submit" class="btn btn-primary" value="<?php if (isset($obj->id)) { ?>Cập nhật<?php } else { ?>Thêm<?php } ?>"/>
                                </footer>
                            </div>
                        </section>
                    </form>
                </div>
                <?php ?>
            </div>
        </section>
    </section>
    <a data-target="#nav" data-toggle="class:nav-off-screen" class="hide nav-off-screen-block" href="#"></a>
</section>
<script>
    $(document).ready(function ()
    {
        // activate Nestable for list 1
        if ($('#menus-top').length)
        {
            $('#menus-top').nestable({
                group: 0,
                maxDepth: 1
            }).on('change', updateOutputTop);
        }
        if ($('#menus-bottom').length)
        {
            $('#menus-bottom').nestable({
                group: 0,
                maxDepth: 1
            }).on('change', updateOutputBottom);
        }
    });
    var topchange = false;
    var bottomchange = false;
    var updateOutputTop = function (e) {
        var list = e.length ? e : $(e.target);
        //alert(window.JSON.stringify(list.nestable('serialize')));
        topchange = true;
        $("#menu-top-order").val(window.JSON.stringify(list.nestable('serialize')));
    };
    var updateOutputBottom = function (e) {
        var list = e.length ? e : $(e.target);
        //alert(window.JSON.stringify(list.nestable('serialize')));
        bottomchange = true;
        $("#menu-top-bottom").val(window.JSON.stringify(list.nestable('serialize')));
    };
    function update_menu_top_callback(data) {
        alert('đã cập nhật thành công!');
        topchange = false;
    }
    function update_menu_bottom_callback(data) {
        alert('đã cập nhật thành công!');
        bottomchange = false;
    }
    function update_form_callback(data) {
        if (data.status)
            window.location = base_url + module;
    }
    window.onbeforeunload = function () {
        if (topchange || bottomchange)
            return 'Bạn vừa thay đổi vị trí của các danh mục bên trái, nếu thoát trang thì các vị trí sẽ không được lưu lại!';
    };
</script>