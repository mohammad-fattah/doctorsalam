<div class="panel">
    <div class="tab-title clearfix">
        <h4>تراکنش های نقدی</h4>
    </div>
    <div class="table-responsive">
        <table id="cash-table" class="display" cellspacing="0" width="100%">
        </table>
    </div>
</div>
<script type="text/javascript">
                            $(document).ready(function() {

                                $("#cash-table").appTable({
                                    source: '<?php echo_uri("report/merchant_cash_list/".$user_id); ?>',
									
                                    order: [
                                        [1, "dec"]
                                    ],
                                    columns: [{
                                        title: "زمان ثبت",
                                        "class": "text-center w50"
                                    }, {
                                        title: "نام کاربر",
                                        "class": "text-center w50"
                                    }, {
                                        title: "شماره تماس کاربر",
                                        "class": "text-center w50"
                                    }, {
                                        title: "ترمینال خرید",
                                        "class": "text-center w50"
                                    }, {
                                        title: "هزینه",
                                        "class": "text-center w50"
                                    }, {
                                        title: "کالا فروخته شده",
                                        "class": "text-center w100"
                                    }, {
                                        title: "نوع فروش",
                                        "class": "text-center w100"
                                    },/* {
                                        title: '<i class="fa fa-bars"></i>',
                                        "class": "text-center option w100"
                                    }*/],
									printColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6, 7]),
                                    xlsColumns: combineCustomFieldsColumns([0, 1, 2, 3, 4, 5, 6, 7]),
                                    summation: [{column: 5, dataType: 'currency', currencySymbol: "none"}, {column: 6, dataType: 'currency', currencySymbol: "none"}]
                                });
                            });
                        </script>