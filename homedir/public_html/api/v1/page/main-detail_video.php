<?php
 $nid=str_replace('.php','',$_GET['id']);
 $video = new settings($db,'videos');
 $video->id=$nid;
 $stmt_video=$video->detail_videos();
 while ($newrow = $stmt_video->fetch(PDO::FETCH_ASSOC)){
  extract($newrow);
  $id_video=$id;
  $title=$video_title;
  $view=$site_views;
  $video_slug=$video_slug;
 }
 if(isset($video_slug)) $video_slug=explode('-',$video_slug);
?>
    <main id="pageContent" class="main-wrapper">

        <div class="container video-page container-padding-set-child">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-right">
                    <!--<div class="up-next margin-bottom">
                        <div class="switch ">
                            <input id="playNext" class="play-next" type="checkbox" checked="checked">
                            <label for="playNext">
                                <span class="checked"></span>
                                <span class="toggle"></span>
                                <span class="unchecked"></span>
                            </label>
                        </div>
                        <span class="separator">پخش خودکار بعدی</span>
                    </div>-->
                    <div class="main-video">
                        <div class="video hasTvFrame" data-small-screen="">
                            <div class="vid-present  vjs-played vjs-playing">
                                <div class="vjs-player fkplayer fkplayer-desktop vjs-played vjs-playing fkplayer-medium-view" data-small-screen-block="" >
								<?php if(isset($id_video)): ?>
								 <video style="width:75%;margin:0 auto" controls poster="<?php echo $yt_thumb; ?>">
                                  <source src="<?php echo $url_flv; ?>" type="video/mp4">
                                 </video>
								 <?php else: ?>
								  <div style="display: flex; justify-content: center; align-items: center;height:435px;width:100%;position: absolute;">
								   <div style="color:#fff;text-align:center;font-size:18px;width:200px;padding:25px;border-radius:5px;height:120px;z-index:100">خطا<br>ویدیویی یافت نشد</div>
								  </div>
								  <div style="height:435px;width:100%;background-image:url(/assets/img/download.gif);opacity:0.4">
								  </div>
								 <?php endif; ?>
                                </div>
                            </div>
                        </div>
						<?php if(isset($id_video)): ?>
                        <div class="panel overflow-visible">

                            <div class="vid-meta">
                                <div class="row">
                                    <div class="col-xs-6 pull-right" style="padding-top:5px">
                                        <h1 class="vid-name"><?php echo $title; ?></h1>
                                     <p><?php echo $description; ?></p>
                                        
                                    </div>
                                    <div class="col-xs-4">

                                            <div class="social_media_style1" style="width:100%;margin:0">
                                <ul class="step no_bullet">
                                    <li class="item" style="float:left;margin:0"><a href="https://telegram.me/share/url?url=" target="_blank" class="link" style="background-color:#fff"><i class="icon-paper-plane" style="font-size:18px;color:#37aed6"></i></a></li>
                                    <li class="item" style="float:left;margin:0"><a href="https://web.whatsapp.com/send?text=" target="_blank" class="link" style="background-color:#fff"><i class="icon-whatsapp" style="font-size:18px;color:#27c31e"></i></a></li>
                                </ul>
                            </div>
                                    </div>
                                </div>
                            </div>

                            <div class="vid-description">

                        <div class="vid-publish-date">
                            <span class="separator">تاریخ انتشار</span>
                            <span data-date=""><?php echo date('Y/m/d','1534873855'); ?></span>
                        </div>
                        <ul class="vid-tags">
                            <li class="separator">برچسب&zwnj;ها</li>
							<?php foreach($video_slug as $slug){ ?>
                             <li style="margin-right:5px">
                                <a href="" title=""><?php echo $slug; ?></a>
                             </li>
							<?php } ?>
                        </ul>

                    </div>
                        </div>
					   <?php endif; ?>
            </div>
            <!--<div class="panel panel-default comment-box" id="commentBox">
                <div class="panel-heading">
                    نظرات کاربران
                </div>

                <div class="panel-body">

                    <p class="pls-signin">
                        برای ارسال نظر لطفا <a href="/signin">وارد حساب کاربری خود</a> شوید.
                    </p>
                    <div class="more-comment ">
                        <div class="empty-state">
                            نظری برای نمایش وجود ندارد.
                        </div>

                    </div>
                </div>
            </div>-->
        </div>

        <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right ">

            <div style="display: block;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="recommendVideoBox" class="recommendVideoBox">

                            <ul class="nav nav-tabs nav-justified tab-select" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#" aria-controls="similarVideo" role="tab" data-toggle="tab" style="text-align:right">ویدیوهای مشابه</a>
                                </li>
                            </ul>

                            <div class="tab-content container-padding-set">
                                <div role="tabpanel" class="tab-pane video-list row active" id="similarVideo">
                                    
									<?php
									 $stmt_video=$video->left_videos();						 
                                     while($newrow = $stmt_video->fetch(PDO::FETCH_ASSOC)){
                                      extract($newrow);
									?>
									<div class="video compact-video hr col-xs-12">
                                        <div class="row pull-right-child">
                                            <div class="col-xs-6">
                                                <a class="vid-present video-special has-link" href="/video/v/<?php echo $id; ?>">
                                                    <img class="vid-thumbnail" src="<?php echo $yt_thumb; ?>">
                                                    <time class="vid-time"><?php $c=floor($yt_length/60); echo $c.':'.$yt_length%60; ?></time>
                                                </a>
                                            </div>
                                            <div class="col-xs-6 vid-meta">
                                                <a href="/video/v/<?php echo $id; ?>" class="vid-name">
                                                    <span><?php echo $video_title; ?></span>

                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
									
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <div class="theater-overlay"></div>
        </div>
        </div>
    </main>