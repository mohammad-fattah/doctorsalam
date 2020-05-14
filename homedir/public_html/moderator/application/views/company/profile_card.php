<style>.panel .panel-body{background-color:#fff}</style>
<div id="page-content" class="p20 clearfix">
    <div class="page-title clearfix mb20">
        <h1>فروشگاه ها</h1>
    </div>
    
    <div class="row">
        <?php foreach ($team_members as $team_member) { ?>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default  text-center ">
                    <div class="panel-body">
                        <span class="avatar avatar-md mt15"><img src="<?php echo get_avatar($team_member->image); ?>" alt="..."></span> 
                        <h4><?php echo $team_member->first_name . " " . $team_member->last_name; ?></h4>
                        <p class="text-off"><?php echo $team_member->job_title ? $team_member->job_title : "Untitled"; ?></p>
                    </div>
                    <div class="panel-footer bg-info p15 no-border">
					    <a href="store/<?php echo $team_member->id; ?>" class="btn btn-xs btn-info">دیدن جزئیات</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>