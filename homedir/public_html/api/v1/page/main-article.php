<main id="pageContent" class="main-wrapper">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="pull-right">پر بازدیدترین اخبار <?php echo $site_name; ?></h2>
            </div>

            <div class="container-padding-set">
                <div class="panel-body row pull-right-child video-list video-row more-box-video-em">
				   <?php 
                    $article = new settings($db,'help_articles');
					$article->limit=5;
                    $stmt_article=$article->article();						 
				    while ($newrow = $stmt_article->fetch(PDO::FETCH_ASSOC)){
                     extract($newrow);
				   ?>
                    <div class="video compact-video vr compact-video col-lg-15 col-md-15 col-sm-3 col-xs-4 col-xxs-6 news">
                        <!-- video presentation -->
                        <a href="/blog/v/<?php echo $id; ?>" class="vid-present hover-logo has-link">
                            <i class="icon-logo-tamasha"></i>
                            <img class="vid-thumbnail" src="/moderator/files/article_images/<?php echo $image; ?>">                            
                        </a>
                        <!-- video meta -->
                                            <div class="col-xs-6 vid-meta">
                                                <a href="/blog/v/<?php echo $id; ?>" class="vid-name">
                                                    <span class="limit_height">
                                                        <span><?php echo $title; ?></span>
                                                        <p><?php echo $description; ?></p>
                                                        <p>...</p>
                                                    </span>
                                                    <a href="/blog/v/<?php echo $id; ?>" class="continue_reading">ادامه مطلب</a>

                                                </a>
                                            </div>
                        <!-- end video meta -->

                    </div>
                           
				   <?php } ?>
                </div>
            </div>
        </div>
    </div>

   

    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="pull-right">آخرین اخبار <?php echo $site_name; ?></h2>
            </div>

            <div class="container-padding-set">
                <div class="panel-body row pull-right-child video-list video-row more-box-video-Na">
                  <?php
                       $article = new settings($db,'help_articles');
					   $article->limit=100;
                       $stmt_article=$article->article();						 
				       while ($newrow = $stmt_article->fetch(PDO::FETCH_ASSOC)){
                        extract($newrow);
				  ?>
					<div class="video compact-video vr compact-video col-lg-15 col-md-15 col-sm-3 col-xs-4 col-xxs-6 news">

                        <!-- video presentation -->
                        <a href="/article/v/<?php echo $id; ?>" class="vid-present hover-logo has-link">
                            <i class="icon-logo-tamasha"></i>
                            <img class="vid-thumbnail" src="/moderator/files/article_images/<?php echo $image; ?>">                            
                        </a>
                        <!-- video meta -->
                                            <div class="col-xs-6 vid-meta">
                                                <a href="/article/v/<?php echo $id; ?>" class="vid-name">
                                                    <span class="limit_height">
                                                        <span><?php echo $title; ?></span>
                                                        <p><?php echo $description; ?></p>
                                                        <p>...</p>
                                                    </span>
                                                    <a href="/article/v/<?php echo $id; ?>" class="continue_reading">ادامه مطلب</a>

                                                </a>
                                            </div>
                        <!-- end video meta -->
                       </div>
                            
				  <?php } ?>
                </div>
            </div>
        </div>
    </div>
</main>