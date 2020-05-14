<style>.col-md-2{float:right}</style>
<div id="page-content" class="p220 row">

    <div class="col-sm-3 col-lg-2" style="background-color:#37b1c0">
        <?php
        $tab_view['active_tab'] = "psp";
        $this->load->view("settings/tabs", $tab_view);
        ?>
    </div>

    <div class="col-sm-9 col-lg-10" style="background-color:#fff">
        <div class="panel panel-default">
            <div class="page-title clearfix">
                <h4>پی اس پی</h4>
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("psp/modal_form"), "<i class='fa fa-plus-circle'></i> " . "پی اس پی", array("class" => "btn btn-default", "title" => "پی اس پی")); ?>
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
            source: '<?php echo_uri("psp/list_data") ?>',
            columns: [
                {title: "نام پی اس پی"},
                {title: "نام انگلیسی"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w100"}
            ],
            printColumns: [0, 1]
        });
    });
</script>