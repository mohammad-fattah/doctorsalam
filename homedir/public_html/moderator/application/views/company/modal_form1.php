<?php echo form_open(get_uri("company/save_category"), array("id" => "category-form", "class" => "general-form", "role" => "form")); ?>
<div class="modal-body clearfix">
    <input type="hidden" name="id" value="<?php echo $model_info->id; ?>" />
    <input type="hidden" name="type" value="<?php echo $type; ?>" />

    <div class="form-group">
        <label for="name" class="col-md-4">نام فارسی شرکت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "name",
                "name" => "name",
                "value" => $model_info->name,
                "class" => "form-control",
                "placeholder" => "نام فارسی شرکت",
                "autofocus" => true,
                "data-rule-required" => true,
                "data-msg-required" => lang("field_required")
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="en_name" class="col-md-4">نام انگلیسی شرکت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "en_name",
                "name" => "en_name",
                "value" => $model_info->en_name,
                "class" => "form-control",
                "placeholder" => "نام انگلیسی شرکت"
            ));
            ?>
        </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="status" class="col-md-4">شخص ثالث</label>
        <div class="col-md-8">
            <?php
            echo form_radio(array(
                "name" => "thirdparty",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->thirdparty === "1") ? true : false);
            ?>
            <label for="thirdparty" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "name" => "thirdparty",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->thirdparty === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
        </div>
		<div style="clear:both"></div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">نقدی شخص ثالث</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "cash_third",
                "name" => "cash_third",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->cash_third === "1") ? true : false);
            ?>
            <label for="cash_third" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "cash_third",
                "name" => "cash_third",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->cash_third === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
        </div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">اقساط شخص ثالث</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "name" => "credit_third",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->credit_third === "1") ? true : false);
            ?>
            <label for="credit_third" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "name" => "credit_third",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->credit_third === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
		 <div class="col-md-12" style="margin-top:10px">
		  <div class="col-md-6" >
		   <div class="col-md-12" style="background-color:#f1f1f1;border-radius:5px;">
		   <label for="prepayment_third" style="font-size:11px">عنوان طرح</label>
		   <?php
            echo form_input(array(
                "id" => "prepayment_third",
                "name" => "prepayment_third",
                "value" => $model_info->prepayment_third,
                "class" => "form-control",
                "placeholder" => "عنوان طرح",
            ));
            ?>
		   </div>
		  </div>
		  <div class="col-md-6">
		   <div class="col-md-12" style="background-color:#f1f1f1;border-radius:5px;">
		   <label for="Installments_title_third" style="font-size:11px">پیش پرداخت (درصد)</label>
		   <?php
            echo form_input(array(
                "id" => "Installments_title_third",
                "name" => "Installments_title_third",
                "value" => $model_info->Installments_title_third,
                "class" => "form-control",
                "placeholder" => "پیش پرداخت (درصد)",
            ));
            ?>
		   </div>
		  </div>
		  <div class="col-md-6" style="margin-top:5px">
		   <div class="col-md-12" style="background-color:#f1f1f1;border-radius:5px;">
		   <label for="number_installments_third" style="font-size:11px">تعداد اقساط</label>
		   <?php
            echo form_input(array(
                "id" => "number_installments_third",
                "name" => "number_installments_third",
                "value" => $model_info->number_installments_third,
                "class" => "form-control",
                "placeholder" => "تعداد اقساط",
            ));
            ?>
		   </div>
		  </div>
		  <div class="col-md-6" style="margin-top:5px">
		   <div class="col-md-12" style="background-color:#f1f1f1;border-radius:5px;">
		   <label for="Interest_rates_third" style="font-size:11px">درصد سود</label>
		   <?php
            echo form_input(array(
                "id" => "Interest_rates_third",
                "name" => "Interest_rates_third",
                "value" => $model_info->Interest_rates_third,
                "class" => "form-control",
                "placeholder" => "درصد سود",
            ));
            ?>
		  </div>
		  </div>
		 </div>
         <div class="col-md-12" style="margin-top:10px;background-color:#f1f1f1;padding:5px 5px 0;border-radius:5px;">
         <label for="description" class="col-md-3" style="padding-top:5px">هدیه شخص ثالث</label>
          <div class="col-md-9">
            <?php
            echo form_input(array(
                "id" => "gift_third",
                "name" => "gift_third",
                "value" => $model_info->gift_third,
                "class" => "form-control",
                "placeholder" => "هدیه شخص ثالث",
            ));
            ?>
          </div>
         </div>
	   </div>
    </div>
	
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="status" class="col-md-4">بدنه</label>
        <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "body",
                "name" => "body",
                "data-msg-required" => lang("field_required"),
                    ), "1",($model_info->body === "1") ? true : false);
            ?>
            <label for="body" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "body",
                "name" => "body",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->body === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
        </div>
		<div style="clear:both"></div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">نقدی بدنه</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "cash_body",
                "name" => "cash_body",
                "data-msg-required" => lang("field_required"),
                    ), "1",($model_info->cash_body === "1") ? true : false);
            ?>
            <label for="cash_body" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "cash_body",
                "name" => "cash_body",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->cash_body === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
        </div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">اقساط بدنه</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "credit_body",
                "name" => "credit_body",
                "data-msg-required" => lang("field_required"),
                    ), "1",($model_info->credit_body === "1") ? true : false);
            ?>
            <label for="credit_body" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "credit_body",
                "name" => "credit_body",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->credit_body === "0") ? true : false);
            ?>
            <label for="status_inactive" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
		 <div class="col-md-12" style="margin-top:10px">
		  <div class="col-md-4">
		   <label for="prepayment_body" style="font-size:11px">عنوان طرح</label>
		   <?php
            echo form_input(array(
                "id" => "prepayment_body",
                "name" => "prepayment_body",
                "value" => $model_info->prepayment_body,
                "class" => "form-control",
                "placeholder" => "عنوان طرح",
            ));
            ?>
		  </div>
		  <div class="col-md-4">
		   <label for="Installments_title_body" style="font-size:11px">پیش پرداخت (درصد)</label>
		   <?php
            echo form_input(array(
                "id" => "Installments_title_body",
                "name" => "Installments_title_body",
                "value" => $model_info->Installments_title_body,
                "class" => "form-control",
                "placeholder" => "پیش پرداخت (درصد)",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="number_installments_body" style="font-size:11px">تعداد اقساط</label>
		   <?php
            echo form_input(array(
                "id" => "number_installments_body",
                "name" => "number_installments_body",
                "value" => $model_info->number_installments_body,
                "class" => "form-control",
                "placeholder" => "تعداد اقساط",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="Interest_rates_body" style="font-size:11px">درصد سود</label>
		   <?php
            echo form_input(array(
                "id" => "Interest_rates_body",
                "name" => "Interest_rates_body",
                "value" => $model_info->Interest_rates_body,
                "class" => "form-control",
                "placeholder" => "درصد سود",
            ));
            ?>
		  </div>
		 </div>
       </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="status" class="col-md-4">عمر</label>
        <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "life",
                "name" => "life",
                "data-msg-required" => lang("field_required"),
                    ), "1",($model_info->life === "1") ? true : false);
            ?>
            <label for="life" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "life",
                "name" => "life",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->life === "0") ? true : false);
            ?>
            <label for="life" class=""><?php echo lang('inactive'); ?></label>
        </div>
		<div style="clear:both"></div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">نقدی عمر</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "cash_life",
                "name" => "cash_life",
                "data-msg-required" => lang("field_required"),
                    ), "1",($model_info->cash_life === "1") ? true : false);
            ?>
            <label for="cash_life" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "cash_life",
                "name" => "cash_life",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->cash_life === "0") ? true : false);
            ?>
            <label for="cash_life" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
        </div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">اقساط عمر</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "credit_life",
                "name" => "credit_life",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->credit_life === "1") ? true : false);
            ?>
            <label for="credit_life" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "credit_life",
                "name" => "credit_life",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->credit_life === "0") ? true : false);
            ?>
            <label for="credit_life" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
		 <div class="col-md-12" style="margin-top:10px">
		  <div class="col-md-4">
		   <label for="prepayment_life" style="font-size:11px">عنوان طرح</label>
		   <?php
            echo form_input(array(
                "id" => "prepayment_life",
                "name" => "prepayment_life",
                "value" => $model_info->prepayment_life,
                "class" => "form-control",
                "placeholder" => "عنوان طرح",
            ));
            ?>
		  </div>
		  <div class="col-md-4">
		   <label for="Installments_title_life" style="font-size:11px">پیش پرداخت (درصد)</label>
		   <?php
            echo form_input(array(
                "id" => "Installments_title_life",
                "name" => "Installments_title_life",
                "value" => $model_info->Installments_title_life,
                "class" => "form-control",
                "placeholder" => "پیش پرداخت (درصد)",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="number_installments_life" style="font-size:11px">تعداد اقساط</label>
		   <?php
            echo form_input(array(
                "id" => "number_installments_life",
                "name" => "number_installments_life",
                "value" => $model_info->number_installments_life,
                "class" => "form-control",
                "placeholder" => "تعداد اقساط",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="Interest_rates_life" style="font-size:11px">درصد سود</label>
		   <?php
            echo form_input(array(
                "id" => "Interest_rates_life",
                "name" => "Interest_rates_life",
                "value" => $model_info->Interest_rates_life,
                "class" => "form-control",
                "placeholder" => "درصد سود",
            ));
            ?>
		  </div>
		 </div>
       </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="status" class="col-md-4">آتش سوزی</label>
        <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "fire",
                "name" => "fire",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->fire === "1") ? true : false);
            ?>
            <label for="fire" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "fire",
                "name" => "fire",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->fire === "0") ? true : false);
            ?>
            <label for="fire" class=""><?php echo lang('inactive'); ?></label>
        </div>
		<div style="clear:both"></div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">نقدی آتش سوزی</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "cash_fire",
                "name" => "cash_fire",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->cash_fire === "1") ? true : false);
            ?>
            <label for="cash_fire" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "cash_fire",
                "name" => "cash_fire",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->cash_fire === "0") ? true : false);
            ?>
            <label for="cash_fire" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
        </div>
		<div style="background-color:#f1f1f1;padding:5px;border-radius:5px;margin-top:5px">
		 <label for="status" class="col-md-4">اقساط آتش سوزی</label>
         <div class="col-md-8">
            <?php
            echo form_radio(array(
                "id" => "credit_fire",
                "name" => "credit_fire",
                "data-msg-required" => lang("field_required"),
                    ), "1", ($model_info->credit_fire === "1") ? true : false);
            ?>
            <label for="credit_fire" class=""><?php echo lang('active'); ?></label>
			<br>
            <?php
            echo form_radio(array(
                "id" => "credit_fire",
                "name" => "credit_fire",
                "data-msg-required" => lang("field_required"),
                    ), "0", ($model_info->credit_fire === "0") ? true : false);
            ?>
            <label for="credit_fire" class=""><?php echo lang('inactive'); ?></label>
         </div>
		 <div style="clear:both"></div>
		 <div class="col-md-12" style="margin-top:10px">
		  <div class="col-md-4">
		   <label for="prepayment_fire" style="font-size:11px">عنوان طرح</label>
		   <?php
            echo form_input(array(
                "id" => "prepayment_fire",
                "name" => "prepayment_fire",
                "value" => $model_info->prepayment_fire,
                "class" => "form-control",
                "placeholder" => "عنوان طرح",
            ));
            ?>
		  </div>
		  <div class="col-md-4">
		   <label for="Installments_title_fire" style="font-size:11px">پیش پرداخت (درصد)</label>
		   <?php
            echo form_input(array(
                "id" => "Installments_title_fire",
                "name" => "Installments_title_fire",
                "value" => $model_info->Installments_title_fire,
                "class" => "form-control",
                "placeholder" => "پیش پرداخت (درصد)",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="number_installments_fire" style="font-size:11px">تعداد اقساط</label>
		   <?php
            echo form_input(array(
                "id" => "number_installments_fire",
                "name" => "number_installments_fire",
                "value" => $model_info->number_installments_fire,
                "class" => "form-control",
                "placeholder" => "تعداد اقساط",
            ));
            ?>
		  </div>
		  <div class="col-md-2">
		   <label for="Interest_rates_fire" style="font-size:11px">درصد سود</label>
		   <?php
            echo form_input(array(
                "id" => "Interest_rates_fire",
                "name" => "Interest_rates_fire",
                "value" => $model_info->Interest_rates_fire,
                "class" => "form-control",
                "placeholder" => "درصد سود",
            ));
            ?>
		  </div>
		 </div>
       </div>
    </div>
	
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="description" class="col-md-4">تخفیف ثالث</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "off_third",
                "name" => "off_third",
                "value" => $model_info->off_third,
                "class" => "form-control",
                "placeholder" => "تخفیف ثالث",
            ));
            ?>
        </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="description" class="col-md-4">تخفیف بدنه</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "off_body",
                "name" => "off_body",
                "value" => $model_info->off_body,
                "class" => "form-control",
                "placeholder" => "تخفیف بدنه",
            ));
            ?>
        </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="description" class="col-md-4">تخفیف عمر</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "off_life",
                "name" => "off_life",
                "value" => $model_info->off_life,
                "class" => "form-control",
                "placeholder" => "تخفیف عمر",
            ));
            ?>
        </div>
    </div>
	<div class="form-group" style="background-color:#f7f7f7;padding:5px;border-radius:5px;margin-top:5px">
        <label for="description" class="col-md-4">تخفیف آتش سوزی</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "off_fire",
                "name" => "off_fire",
                "value" => $model_info->off_fire,
                "class" => "form-control",
                "placeholder" => "تخفیف آتش سوزی",
            ));
            ?>
        </div>
    </div>
	
	<div class="form-group">
        <label for="description" class="col-md-4">امتیاز</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "emtiaz",
                "name" => "emtiaz",
                "value" => $model_info->emtiaz,
                "class" => "form-control",
                "placeholder" => "امتیاز",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">توانگری</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "tavangari",
                "name" => "tavangari",
                "value" => $model_info->tavangari,
                "class" => "form-control",
                "placeholder" => "توانگری",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">مدت زمان پاسخ به شکایت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "pasokh",
                "name" => "pasokh",
                "value" => $model_info->pasokh,
                "class" => "form-control",
                "placeholder" => "مدت زمان پاسخ به شکایت",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">تعداد پرداخت خسارت</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "khesarat",
                "name" => "khesarat",
                "value" => $model_info->khesarat,
                "class" => "form-control",
                "placeholder" => "تعداد پرداخت خسارت",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">رضایت مشتری</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "rezayat",
                "name" => "rezayat",
                "value" => $model_info->rezayat,
                "class" => "form-control",
                "placeholder" => "رضایت مشتری",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">سهم بازار</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "market",
                "name" => "market",
                "value" => $model_info->market,
                "class" => "form-control",
                "placeholder" => "سهم بازار",
            ));
            ?>
        </div>
    </div>
	<div class="form-group">
        <label for="description" class="col-md-4">پرداخت خسارت سیار</label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "sayar",
                "name" => "sayar",
                "value" => $model_info->sayar,
                "class" => "form-control",
                "placeholder" => "پرداخت خسارت سیار",
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
        <label for="sort" class="col-md-4"><?php echo lang('sort'); ?></label>
        <div class="col-md-8">
            <?php
            echo form_input(array(
                "id" => "sort",
                "name" => "sort",
                "value" => $model_info->sort,
                "class" => "form-control",
                "placeholder" => lang('sort'),
                "type" => "number",
                "min" => "0"
            ));
            ?>
        </div>
    </div>
    <div class="form-group">
                <label for="status" class=" col-md-3">وضعیت</label>
                <div class=" col-md-9">
                    <?php
                    echo form_radio(array(
                        "id" => "active",
                        "name" => "status",
                            ), "active", true);
                    ?>
                    <label for="gender_male">فعال</label> 
					<br>
					<?php
                    echo form_radio(array(
                        "id" => "deactive",
                        "name" => "status",
                            ), "deactive", false);
                    ?>
                    <label for="gender_female" class="">غیرفعال</label>
                </div>
            </div>

</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary"><span class="fa fa-check-circle"></span> <?php echo lang('save'); ?></button>
	<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"></span> <?php echo lang('close'); ?></button>
</div>
<?php echo form_close(); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $("#category-form").appForm({
            onSuccess: function (result) {
                $("#category-table").appTable({newData: result.data, dataId: result.id});
            }
        });
    });
</script>    