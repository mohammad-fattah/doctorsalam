<main id="pageContent" class="main-wrapper">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="pull-right">پربیننده ترین ها</h2>
            </div>

            <div class="container-padding-set">
                <div class="panel-body row pull-right-child video-list video-row more-box-video-em">
				   <?php
                    $video = new settings($db,'videos');
					$video->limit=5;
                    $stmt_video=$video->videos();						 
				    while ($newrow = $stmt_video->fetch(PDO::FETCH_ASSOC)){
                     extract($newrow);
				   ?>
                    <div class="video compact-video vr compact-video col-lg-15 col-md-15 col-sm-3 col-xs-4 col-xxs-6">

                        <!-- video presentation -->
                        <a href="/video/v/<?php echo $id; ?>" class="vid-present hover-logo has-link">
                            <i class="icon-logo-tamasha"></i>
                            <img class="vid-thumbnail" src="<?php echo $yt_thumb; ?>">
                            <time class="vid-time"><?php $c=floor($yt_length/60); echo $c.':'.$yt_length%60; ?></time>

                        </a>
                        <!-- video meta -->
                        <div class="vid-meta">
                            <!-- video name -->
                            <a href="blog/v" class="vid-name">
                                <span><?php echo $video_title; ?></span>
                            </a>
                        </div>

                    </div>
				   <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="feature-home-event solid-violet-dark  panel">
        <div class="container video-list-row-home-page">
            <div class="panel">
                <div class="container-padding-set">

                    <div class="row event pull-right-child
                                event-unset-description
                                event-unset-emblem">

                        <div class="col-sm-9 col-xs-8 col-xxs-10 event-text">
                            <h3 style="font-size:14px">برگزیده ها</h3>
                        </div>
                    </div>
                    <div class="panel-body pull-right-child video-list video-row event-list row">
                      <?php
                       $video = new settings($db,'videos');
					   $video->limit=5;
                       $stmt_video=$video->videos();						 
				       while ($newrow = $stmt_video->fetch(PDO::FETCH_ASSOC)){
                        extract($newrow);
				      ?>                       
					   <div class="video compact-video vr compact-video col-lg-15 col-md-15 col-sm-3 col-xs-4 col-xxs-6">

                        <!-- video presentation -->
                        <a href="/video/v/<?php echo $id; ?>" class="vid-present hover-logo has-link">
                            <i class="icon-logo-tamasha"></i>
                            <img class="vid-thumbnail" src="<?php echo $yt_thumb; ?>">
                            <time class="vid-time"><?php $c=floor($yt_length/60); echo $c.':'.$yt_length%60; ?></time>

                        </a>
                        <!-- video meta -->
                        <div class="vid-meta">
                            <!-- video name -->
                            <a href="blog/v" class="vid-name">
                                <span><?php echo $video_title; ?></span>
                            </a>
                        </div>

                       </div>
					  <?php } ?>
					</div>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="pull-right">ویژه های <?php echo $site_name; ?></h2>
            </div>

            <div class="container-padding-set">
                <div class="panel-body row pull-right-child video-list video-row more-box-video-Na">
                  <?php
                       $video = new settings($db,'videos');
					   $video->limit=10;
                       $stmt_video=$video->videos();						 
				       while ($newrow = $stmt_video->fetch(PDO::FETCH_ASSOC)){
                        extract($newrow);
				  ?>
					<div class="video compact-video vr compact-video col-lg-15 col-md-15 col-sm-3 col-xs-4 col-xxs-6">

                        <!-- video presentation -->
                        <a href="/video/v/<?php echo $id; ?>" class="vid-present hover-logo has-link">
                            <i class="icon-logo-tamasha"></i>
                            <img class="vid-thumbnail" src="<?php echo $yt_thumb; ?>">
                            <time class="vid-time"><?php $c=floor($yt_length/60); echo $c.':'.$yt_length%60; ?></time>

                        </a>
                        <!-- video meta -->
                        <div class="vid-meta">
                            <!-- video name -->
                            <a href="blog/v" class="vid-name">
                                <span><?php echo $video_title; ?></span>
                            </a>
                        </div>

                       </div>
				  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>