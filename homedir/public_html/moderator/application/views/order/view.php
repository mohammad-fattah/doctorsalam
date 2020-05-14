<?php $this->load->view("includes/cropbox"); ?>
<style>.general-form.white label{float:right}</style>
<div id="page-content" class="p220 clearfix">
    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">
        <li><a role="presentation" href="<?php echo_uri("order/general_info/" . $id); ?>" data-target="#tab-general-info">اطلاعات تخصص</a></li>
		<li><a role="presentation" href="<?php echo_uri("order/document_info/" . $id); ?>" data-target="#tab-document-info">آپلود پرونده</a></li>
	</ul>

    <div class="tab-content" style="background-color:#fff">
        <div role="tabpanel" class="tab-pane fade active pl15 pr15 mb15" id="tab-timeline">
            <?php timeline_widget(array("limit" => 20, "offset" => 0, "is_first_load" => true, "user_id" => $user_info->id)); ?>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-document-info"></div>
    </div>
</div>
