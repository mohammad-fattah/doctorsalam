<div class="content dashboard_page">
    <div class="container-fluid">
        <div class="row">
		    <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="rose"><i class="material-icons">language</i></div>
                    <div class="card-content">
                        <p class="category">برنزی</p>
                        <h3 class="card-title" id="dash_onlinevis">40,000 تومان</h3></div>
                    <div class="card-footer">
                        <div class="stats">
						 <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> خرید بسته</button>
						</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="orange"><i class="material-icons">perm_identity</i></div>
                    <div class="card-content">
                        <p class="category">موجودی تخفیف</p>
                        <h3 class="card-title" id="dash_onlineop"><?php echo to_decimal_format($client_info->total_sales); ?></h3></div>
                    <div class="card-footer">
                        <div class="stats"> کل تخفیف ها : <span class="dash_alloperator">0</span></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="card card-stats">
                    <div class="card-header" data-background-color="blue"><i class="material-icons">textsms</i></div>
                    <div class="card-content">
                        <p class="category">موجودی کارت اعتباری</p>
                        <h3 class="card-title" id="dash_activechat"><?php echo to_decimal_format($client_info->total_sales); ?></h3></div>
                    <div class="card-footer">
                        <div class="stats">موجودی کل : <span class="dash_allchat">0</span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>