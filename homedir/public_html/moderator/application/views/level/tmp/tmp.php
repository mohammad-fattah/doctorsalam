<div id="page-content" class="p220 clearfix">
    <?php
    announcements_alert_widget();
    ?>
    <div class="row">
        <?php
        $widget_column = "3"; //default bootstrap column class
        $total_hidden = 0;

        if (!$show_attendance) {
            $total_hidden+=1;
        }

        if (!$show_event) {
            $total_hidden+=1;
        }

        if (!$show_timeline) {
            $total_hidden+=1;
        }

        //set bootstrap class for column
        if ($total_hidden == 1) {
            $widget_column = "4";
        } else if ($total_hidden == 2) {
            $widget_column = "6";
        } else if ($total_hidden == 3) {
            $widget_column = "12";
        }
        ?>
		<?php //$this->load->view("clients/info_widgets"); ?>
    

    </div>
    <div class="row">
	 <div class="col-md-12" style="padding:5px">
	  <div>
	   <?php $this->load->view("clients/info_widgets"); ?> 
	  </div>
	 </div>
	</div>
    <div class="row">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 text-center">
                    <?php
                     invoice_statistics_widget();
                    ?> 
                </div>
            </div>

        </div>
        <div class="col-md-8 widget-container">
            <div class="panel panel-default" style="height:390px;margin-bottom:0">
                <div class="panel-heading">
                    <i class="fa fa-clock-o"></i>&nbsp; سفارشات امروز
                </div>
                <div id="project-timeline-container" >
                    <div class="panel-body" > 
                        <?php
                        //activity_logs_widget(array("log_for" => "project", "limit" => 10));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	<div class="row" style="margin-top:10px">
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <?php
                    if ($show_ticket_status) {
                        ticket_status_widget();
                    } else if ($show_attendance) {
                        timecard_statistics_widget();
                    }
                    ?>                        
                </div>
            </div>

        </div>
        <div class="col-md-8 widget-container">
            <div class="panel panel-default" style="height:390px;margin-bottom:0">
                <div class="panel-heading">
                    <i class="fa fa-clock-o"></i>فروشگاه آنلاین جدید
                </div>
                <div id="project-timeline-container" >
                    <div class="panel-body" > 
                        <?php
                        //activity_logs_widget(array("log_for" => "project", "limit" => 10));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<div class="row">
	 <div class="col-md-12" style="padding:5px">
	  <div style="margin-top:10px">
	   <?php //$this->load->view("product/product_widgets"); ?> 
	  </div>
	 </div>
	</div>
	
</div>
<?php
load_js(array(
    "assets/js/flot/jquery.flot.min.js",
    "assets/js/flot/jquery.flot.pie.min.js",
    "assets/js/flot/jquery.flot.resize.min.js",
    "assets/js/flot/curvedLines.js",
    "assets/js/flot/jquery.flot.tooltip.min.js",
));
?>
<script type="text/javascript">
    $(document).ready(function () {
        var $stickyNote = $("#sticky-note");

        var saveStickyNote = function () {
            $.ajax({
                url: "<?php echo get_uri("dashboard/save_sticky_note") ?>",
                data: {sticky_note: $stickyNote.val()},
                cache: false,
                type: 'POST'
            });
        };

        $stickyNote.change(function () {
            saveStickyNote();
        });

        $stickyNote.keydown(function () {
            window.onbeforeunload = saveStickyNote;
        });
        initScrollbar('#project-timeline-container', {
            setHeight: 150
        });

    });
</script>