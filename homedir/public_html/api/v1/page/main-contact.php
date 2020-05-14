<div class="ant-row">
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-18" style="background-color:#fff;padding:10px;border-radius:5px">
        <div>
            <div id="table-wrapper">
                <div class="spinner absolute-center" style="display: none;"></div>
                <div id="table-body" class="ant-row">
                    <div class="ant-row-flex ant-row-flex-middle itemList hasgift">
                        <div class="ant-col-xs-4 ant-col-sm-5 ant-col-md-5 ant-col-lg-24" style="height:400px">
                            <iframe width="100%" height="100%" id="gmap_canvas" src="https://maps.google.com/maps?q=<?php echo $longitude ?>%2C%20<?php echo $latitude ?>&t=&z=17&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>

                        </div>
						<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
						 <h1 style="font-weight:bold;font-size:18px;margin-top:50px">ارتباط با ما</h1>
						 <p style="float:right">برا ارایه پیشنهاد , انتقاد یا درخواست لطفا فرم زیر را تکمیل نمایید </p>
						</div>
                        <form action="" class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-8">
                                <div class="ant-row ant-form-item ant-form-no-margin">
                                    <div class="ant-form-item-label" style="float:right">
                                        <label for="car_production_year" style="text-align:right;font-size:12px">نام و نام خانوادگی</label>
                                    </div>
                                    <div class="ant-form-item-control-wrapper">
                                        <div class="ant-form-item-control has-feedback ">
                                            <input type="text" class="form-control bb-select">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-8">
                                <div class="ant-row ant-form-item ant-form-no-margin">
                                    <div class="ant-form-item-label" style="float:right">
                                        <label for="years_without_incident" style="text-align:right;font-size:12px"><span>شماره همراه</span></label>
                                    </div>
                                    <div class="ant-form-item-control-wrapper">
                                        <div class="ant-form-item-control has-feedback ">
                                            <input type="text" class="form-control bb-select">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-8">
                                <div class="ant-row ant-form-item ant-form-no-margin">
                                    <div class="ant-form-item-label" style="float:right">
                                        <label for="car_usage" style="text-align:right;font-size:12px">موضوع</label>
                                    </div>
                                    <div class="ant-form-item-control-wrapper">
                                        <div class="ant-form-item-control ">
                                            <input type="text" class="form-control bb-select">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                <div class="ant-row ant-form-item ant-form-no-margin">
                                    <div class="ant-form-item-label" style="float:right">
                                        <label for="liability_property_damage" style="text-align:right;font-size:12px"><span>پیغام</span></label>
                                    </div>
                                    <div class="ant-form-item-control-wrapper">
                                        <div class="ant-form-item-control has-success">
                                            <textarea type="text" class="form-control bb-select" style="height:250px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
						  <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-3" style="float:left">
                            <button type="button" class="ant-btn btn-order-new ant-btn-lg" style="margin-top:10px;float:left"><span>ارسال</span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-6">
        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
            <form class="ant-form ant-form-vertical">
                <div class="ant-collapse">
                    <div class="ant-collapse-item ant-collapse-item-active" role="tablist">
                        <div class="ant-collapse-header" style="background-image:url('/assets/img/purchase-svgrepo-com.svg');background-position:5% center;background-repeat:no-repeat;background-size:25px">تماس با ما</div>
                        <div class="ant-collapse-content ant-collapse-content-active" role="tabpanel">
                            <div class="ant-collapse-content-box">
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                    <div style="height:140px;width:100%;text-align: center;">
                                        <img src="/assets/img/phone.png" style="max-width:100%;max-height:100%;margin:0 auto" class="photoCar" />
                                    </div>
                                </div>
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24">
                                    <div class="ant-row-flex ant-row-flex-space-between">
                                        <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24" style="text-align:center;margin-bottom:10px">
                                            ارتباط با مشاور : <?php echo $phone_site; ?>
                                        </div>
										<div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24" style="text-align:center;margin-bottom:10px">
                                            آدرس : <?php echo $company_address; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>