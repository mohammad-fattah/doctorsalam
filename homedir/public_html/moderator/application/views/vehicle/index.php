<style>.col-md-2{float:right}</style>
<div id="page-content" class="p220 row">

    <div class="col-sm-12 col-lg-12" style="background-color:#fff">
        <div class="panel panel-default">
            <div class="page-title clearfix">
                <h4>وسایل نقلیه</h4>
                <div class="title-button-group">
                    <?php echo modal_anchor(get_uri("vehicle/modal_form"), "<i class='fa fa-plus-circle'></i> " . "افزدون وسایل نقلیه", array("class" => "btn btn-default", "title" => "افزدون وسایل نقلیه")); ?>
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
            source: '<?php echo_uri("vehicle/list_data/$insure/$type") ?>',
            columns: [
                {title: "ردیف"},
                {title: "نام وسایل نقلیه"},
                {title: "نوع وسیله نقلیه"},
                {title: "وضعیت"}
            ],
            printColumns: [0, 1]
        });
    });
</script>