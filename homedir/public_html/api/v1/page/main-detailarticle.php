<?php
 $id=str_replace('.php','',$_GET['id']);
 $article = new settings($db,'help_articles');
 $article->id=$id;
 
 $stmt_article=$article->detail_article();
 while ($newrow = $stmt_article->fetch(PDO::FETCH_ASSOC)){
  extract($newrow);
  $title_article=$article;
  $view=$total_views;
  $article_slug=$article_slug;
 }
 if (isset($article_slug)){
    $article_slug=explode('-',$article_slug);
 }
?>
    <main id="pageContent" class="main-wrapper">
        <div class="container video-page container-padding-set-child">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 pull-right">
                    <div class="main-video">
                        <div class="video hasTvFrame" data-small-screen="">
                            <div class="vid-present  vjs-played vjs-playing">
                                <div class="vjs-player fkplayer fkplayer-desktop vjs-played vjs-playing fkplayer-medium-view" data-small-screen-block="">
                                
                                <img class="vid-thumbnail" src="/moderator/files/article_images/<?php echo $image; ?>">                            

                                </div>
                            </div>
                        </div>
                        <div class="panel overflow-visible">

                            <div class="vid-meta">
                                <div class="row">
                                    <!-- video name -->
                                    <div class="col-xs-6 pull-right" style="padding-top:5px; width: 100%;">
                                        <h1 class="vid-name"><?php echo $title; ?></h1>
                                     <p><?php echo $description; ?></p>                                        
                                    </div>
                                    <div class="col-xs-4">
                                            <div class="social_media_style1" style="width:100%;margin:0">
                                <ul class="step no_bullet">
                                    <li class="item" style="float:left;margin:0"><a href="https://telegram.me/share/url?url=" target="_blank" class="link" style="background-color:#fff"><i title="ارسال در تلگرام" class="icon-paper-plane" style="font-size:18px;color:#37aed6"></i></a></li>
                                    <li class="item" style="float:left;margin:0"><a href="https://web.whatsapp.com/send?text=" target="_blank" class="link" style="background-color:#fff"><i title="ارسال در واتس اپ" class="icon-whatsapp" style="font-size:18px;color:#27c31e"></i></a></li>
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
							<?php foreach($article_slug as $slug){ ?>
                             <li style="margin-right:5px">
                                <a href="" title=""><?php echo $slug; ?></a>
                             </li>
							<?php } ?>
                        </ul>

                    </div>
                </div>
            </div>
<!--             <div class="panel panel-default comment-box" id="commentBox">
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
            </div> -->
        </div>

        <aside class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right ">
            <div style="display: block;">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div id="recommendVideoBox" class="recommendVideoBox">
                            <ul class="nav nav-tabs nav-justified tab-select" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#" aria-controls="similarVideo" role="tab" data-toggle="tab" style="text-align:right">آخرین مقالات</a>
                                </li>
                            </ul>

                            <div class="tab-content container-padding-set">
                                <div role="tabpanel" class="tab-pane video-list row active" id="similarVideo">
                                    
									<?php
									 $stmt_article=$article->left_article();						 
                                     while($newrow = $stmt_article->fetch(PDO::FETCH_ASSOC)){
                                      extract($newrow);
									?>
									<div class="video compact-video hr col-xs-12 border_left_side">
                                        <div class="row pull-right-child">
                                            <div class="col-xs-6">
                                                <a class="vid-present video-special has-link" href="/article/v/<?php echo $id; ?>">
                                                    <img class="vid-thumbnail" src="/moderator/files/article_images/<?php echo $image; ?>">
                                                </a>
                                            </div>
                                            <div class="col-xs-6 vid-meta">
                                                <a href="/article/v/<?php echo $id; ?>" class="vid-name">
                                                    <span><?php echo $title; ?></span>
                                                    <pre style="height: 250px; background: white; text-decoration: none; border: none; overflow-x: hidden; overflow-y: hidden;" class="limit_height"><?php echo $description; ?></pre>
                                                    <p>...</p>
                                                    <a href="/article/v/<?php echo $id; ?>" class="continue_reading">ادامه مطلب</a>

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