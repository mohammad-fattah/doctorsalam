<style>.col-md-2{float:right}</style>
<div id="page-content" class="p220 row">

    <div class="col-sm-3 col-lg-2" style="background-color:#37b1c0">
        <?php
        $tab_view['active_tab'] = "merchant_category";
        if($this->login_user->user_type=='club'):
		  $this->load->view("settings/club_tabs", $tab_view);
		else:
          $this->load->view("settings/tabs", $tab_view);
		endif;
        ?>
    </div>

    <div class="col-sm-9 col-lg-10" style="background-color:#fff">
        <div class="panel panel-default">
            <div class="page-title clearfix">
                <h4>دسته ها</h4>
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("merchant_category/modal_form"), "<i class='fa fa-plus-circle'></i> " . "دسته", array("class" => "btn btn-default", "title" =>"افزودن دسته")); ?>
                </div>
            </div>
            <div class="table-responsive">
                <table id="team-table" class="display" cellspacing="0" width="100%">            
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#team-table").appTable({
            source: '<?php echo_uri("merchant_category/list_data") ?>',
            columns: [
                {title: "نام دسته"},
                {title: "نام دسته (انگلیسی )"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1]
        });
    });
</script>