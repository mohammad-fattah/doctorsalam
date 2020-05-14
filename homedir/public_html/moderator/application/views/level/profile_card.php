<style>.panel .panel-body{background-color:#fff}</style>
<div id="page-content" class="p20 clearfix">
    <div class="page-title clearfix mb20">
        <h1>فروشگاه ها<?php echo $level; ?></h1>
    </div>
    
    <div class="row">
        <?php foreach ($team_members as $team_member) { ?>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category"><?php echo $team_member->title; ?></p>
                        <h3 class="card-title" id="dash_activechat"><?php echo number_format($team_member->price_score).' تومان'; ?></h3></div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> خرید بسته</button>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>