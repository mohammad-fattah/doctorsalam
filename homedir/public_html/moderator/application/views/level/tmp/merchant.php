<div class="content dashboard_page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose"><i class="material-icons">language</i></div>
                    <div class="card-content">
                        <p class="category">کمپین ها فعال</p>
                        <h3 class="card-title" id="dash_onlinevis">0</h3></div>
                    <div class="card-footer">
                        <div class="stats"> کل کمپین ها : <span class="dash_allvisitor">1</span> </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange"><i class="material-icons">perm_identity</i></div>
                    <div class="card-content">
                        <p class="category">فروشگاه آنلاین فعال</p>
                        <h3 class="card-title" id="dash_onlineop">0</h3></div>
                    <div class="card-footer">
                        <div class="stats"> کل فروشگاه آنلاین : <span class="dash_alloperator">0</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category">خریدهای جدید</p>
                        <h3 class="card-title" id="dash_activechat">0</h3></div>
                    <div class="card-footer">
                        <div class="stats">کل خریدها : <span class="dash_allchat">0</span> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">timeline</i></div>
                    <div class="card-content font14">
                        <h4 class="card-title">آخرین تراکنش‌ها</h4></div>
                    <div style="height:300px">
                        <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                            <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                            </div>
                        </div>
                        <canvas id="Chart-chat" width="817" height="300" class="chartjs-render-monitor" style="display: block; width: 817px; height: 300px;"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header card-header-icon" data-background-color="blue"><i class="material-icons">tune</i></div>
                    <div class="card-content">
                        <h4 class="dash_h3">سطح کاربری</h4>
                        <div class="col-md-12">
                            <div>
                                <br>شما در سطح <b>نقره ای</b> می باشید</div>
                            <br>
                            <p class="dash_bar_t"><i class="material-icons">chat_bubble_outline</i>مبلغ تراکنش ها : <span class="dash_c1">100</span></p>
                            <div class="progress progress-line-info">
                                <div class="progress-bar progress-bar-info dash_c11" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <br>
                            <p class="dash_bar_t"><i class="material-icons">perm_identity</i>تعداد تراکنش ها : <span class="dash_c2">0 از 100</span></p>
                            <div class="progress progress-line-warning">
                                <div class="progress-bar progress-bar-warning dash_c22" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="col-md-12" rel="tooltip" data-placement="top auto" title="" data-original-title="بسته شما اتوماتیک بصورت رایگان ماهانه تمدید خواهد شد">
                            <br>
                            <p class="dash_bar_t"><i class="material-icons">history</i>دعوت از دوستان : <span class="dash_c3">3</span> نفر</p>
                            <div class="progress progress-line-success">
                                <div class="progress-bar progress-bar-success dash_c33" style="width: 0%;"></div>
                            </div>
                        </div>
                        <div class="col-md-12 text-center"><a class="btn btn-danger btn-round btn-normal font14" id="bill_but" href="/upgrade" data-navigo="">ارتقا به سطح بالاتر</a>
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card changelog_box">
                    <div class="card-content font14">
                        <h4 class="card-title"><i class="material-icons text-warning">new_releases</i>آخرین به روز رسانی بیمیتک <a href="/app" target="_blank"><i class="material-icons text-info">launch</i></a><div class="version">نسخه 1.4.5<span>97/12/19</span></div></h4></div>
                    <div class="col-md-12 changelog_box_c">
                        <div><i class="material-icons text-warning">chevron_left</i>انتشار اپلیکیشن اندروید بیمیتک نسخه 1.0.2</div>
                        <div><i class="material-icons text-warning">chevron_left</i>امکان خرید اینترنتی و خرید اقساطی اضافه شده است</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>