<?php $this->load->view("includes/cropbox"); ?>
<style>.general-form.white label{float:right}</style>
<div id="page-content" class="p220 clearfix">
    <ul data-toggle="ajax-tab" class="nav nav-tabs" role="tablist">
        <li><a role="presentation" href="<?php echo_uri("archive/general_info/" . $id); ?>" data-target="#tab-general-info">مشخصات زونکن</a></li>
		<li><a role="presentation" href="<?php echo_uri("archive/insurance/" . $id); ?>" data-target="#tab-insurance-info">تخصص ها</a></li>
	</ul>

    <div class="tab-content" style="background-color:#fff">
        <div role="tabpanel" class="tab-pane fade" id="tab-general-info"></div>
        <div role="tabpanel" class="tab-pane fade" id="tab-insurance-info"></div>
    </div>
</div>