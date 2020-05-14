<div id="page-content" class="p20 clearfix">
    <div class="panel panel-default">
        <div class="page-title clearfix">
            <h1>ویدئوها</h1>
            <div class="title-button-group">
                <?php
                echo anchor(get_uri("videos/article_form/".$type), "<i class='fa fa-plus-circle'></i> " . lang('add_video'), array("class" => "btn btn-default", "title" => lang('add_video')));
                ?>
            </div>
			<ul class="nav navbar-nav navbar-right">
		     <li class="pr15" style="padding:15px"><span style="float:left;padding:0 8px">دیده شود</span><div class="togglebutton" style="margin:0;float:left"><label><input class="website_show_tv more" type="checkbox" <?php if(get_setting("website_show_tv")=='on'): ?> name="on" checked="" <?php else: ?> name="off" <?php endif; ?>onclick="status_on_off('website_show_tv')"><span class="toggle"></span></label></div><span style="float:left;padding:0 5px">دیده نشود</span></li>
			</ul>
        </div>
        <div class="table-responsive">
            <table id="article-table" class="display" cellspacing="0" width="100%">            
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $("#article-table").appTable({
            source: '<?php echo_uri("videos/articles_list_data/" . $type) ?>',
            order: [[0, "desc"]],
            columns: [
                {title: 'شناسه', "class": "w50"},
                {title: '<?php echo lang("title") ?>', "class": "w100"},
                {title: 'تصویر شاخص', "class": "w50"},
                {title: '<?php echo lang("total_views") ?>', "class": "w50"},
                {title: '<i class="fa fa-bars"></i>', "class": "text-center option w50"}
            ],
            printColumns: [0, 1, 2, 3]
        });
    });
</script>