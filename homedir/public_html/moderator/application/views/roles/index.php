<div id="page-content" class="p20 row">
    <div class="col-sm-3 col-lg-2" style="background-color:#37b1c0">
        <?php
        $tab_view['active_tab'] = "roles";
        if($this->login_user->user_type=='club'):
		  $this->load->view("settings/club_tabs", $tab_view);
		else:
          $this->load->view("settings/tabs", $tab_view);
		endif;
        ?>
    </div>

    <div class="col-sm-9 col-lg-10" style="background-color:#fff">
        <div class="row">
            <div class="col-md-4">
                <div id="role-list-box" class="panel panel-default">
                    <div class="page-title clearfix">
                        <h4> <?php echo lang('roles'); ?></h4>
                        <div class="title-button-group">
                            <?php echo modal_anchor(get_uri("roles/modal_form"), "<i class='fa fa-plus-circle'></i> " . lang('add_role'), array("class" => "btn btn-default", "title" => lang('add_role'))); ?>
                        </div>
                    </div>
                    <div class="table-responsiv b-t b-white">
                        <table id="role-table" class="display clickable no-thead b-b-only" cellspacing="0" width="100%">            
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div id="role-details-section"> 
                    <div id="empty-role" class="text-center p15 box panel panel-default ">
                        <div class="box-content" style="vertical-align: middle; height: 100%"> 
                            <div><?php echo lang("select_a_role"); ?></div>
                            <span class="fa fa-cogs" style="font-size: 1450%; color:#f6f8f8"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $("#role-table").appTable({
            source: '<?php echo_uri("roles/list_data") ?>',
            columns: [
                {title: '<?php echo lang("name"); ?>'},
                {title: '', class: 'text-center option w125'}
            ],
            hideTools: true,
            onInitComplete: function() {
                var $role_list = $("#role-list-box"),
                        $empty_role = $("#empty-role");
                if ($empty_role.length && $role_list.length) {
                    $empty_role.height($role_list.height() - 30);
                }
            }
        });

        /*load a message details*/
        $("body").on("click", "tr", function() {
            //don't load this message if already has selected.
            if (!$(this).hasClass("active")) {
                appLoader.show();
                var role_id = $(this).find(".role-row").attr("data-id");
                if (role_id) {
                    $("tr.active").removeClass("active");
                    $(this).addClass("active");
                    $.ajax({
                        <?php if($this->login_user->user_type=='club'): ?>
						 url: "<?php echo get_uri("roles/club_permissions"); ?>/" + role_id,
						<?php else: ?>
						 url: "<?php echo get_uri("roles/permissions"); ?>/" + role_id,
						<?php endif; ?>
                        success: function(result) {
                            appLoader.hide();
                            $("#role-details-section").html(result);
                        }
                    });
                }
            }
        });
    });
</script>