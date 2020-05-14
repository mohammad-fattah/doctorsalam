<?php if($website_status=='off'): ?>
<div style="background-color:#e20d21;height:50px;width:100%;position: absolute; display: flex; justify-content: center; line-height: 50px; color: #fff; font-size: 14px;">
 <?php echo $message_off; ?>
</div>
<?php endif; ?>
<div id="bimepage" class="fadeIn">
 <div class="compare-box compareflatpage thirdpartytab">
  <div class="container">
   <div class="ant-row-flex">
    <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">
        <div class="compares">
            <h1 style="color:#fff;font-size:30px;margin-top:20px;width:100%;text-align:center;line-height:50px">سامانه مدیریت، مشاوره و خرید آنلاین بیمه</h1>
            <p style="color:#fff;font-size:16px;line-height:60px;width:100%;text-align:center"><?php echo $site_name; ?></p>
            <div class="form_start">
                  <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-16 div-element-drag" style="margin:0 auto;float: none!important;">
                    <div class="tab">
                     <?php
					  $stm_insure_tab=$settings->insure();
					  $k=0;
                      while ($newrow = $stm_insure_tab->fetch(PDO::FETCH_ASSOC)){
						extract($newrow);
					 ?>
                        <div class="tab-content <?php if($k == 0): ?>show<?php else: ?>hidden<?php endif; ?> <?php echo $description; ?>">
                            <form action="javascript:" method="post" class="ant-form ant-form-vertical <?php echo $description; ?>">
                                <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24">
                                    <div class="tab-desc-compare" style="margin:10px 0 0">
                                        <div data-show="true" class="ant-alert ant-alert-success ant-alert-with-description ant-alert-no-icon" style="padding:5px;text-align:center"><span class="ant-alert-description"><div><?php echo $tab_message; ?></div></span></div>
                                    </div>

                                    <div>
                                        <div class="ant-row fadeIn" style="margin-top:0px">
                                            <div>
											   <?php
											    $parameter = new settings($db,'insurance_parameter');
					                            $parameter->insurance=$description;
					                            $parameter->main_sub='1';
												$parameter->parameter_type='';
					                            $stm_insure_parameter=$parameter->insurance_parameter();
                                                while ($newrowparameter = $stm_insure_parameter->fetch(PDO::FETCH_ASSOC)){
						                         extract($newrowparameter);												 
											   ?>
                                                <div class="div-element-tab no-pleft ant-col-xs-24 ant-col-sm-24 ant-col-md-12 ant-col-lg-<?php echo $size; ?>" style="padding-left: 15px; padding-right: 15px;margin-top:20px">
                                                    <div class="ant-row ant-form-item ant-form-no-margin">
                                                        <div class="ant-form-item-label">
                                                            <label for="car_model"><?php //echo $name; ?></label>
                                                        </div>
                                                        <div class="ant-form-item-control-wrapper">
                                                            <div class="ant-form-item-control">
                                                                <span class="ant-form-item-children div-element-drag">
										   <div>
										    <i class="inputicon vehichicon carkind"></i>
										    <div class="ant-select ant-select-enabled">
											<?php if($type=='select'): ?>
										     <select class="ant-select-selection ant-select-selection--single js-example-basic-single dependent-<?php echo $idp; ?>" name="<?php echo $elementName; ?>" id="<?php echo $elementName; ?>" onchange="dependent('<?php echo $dependent; ?>','<?php echo $elementName; ?>')" style="direction:rtl;text-align:right">
											   <option value=""><?php echo $name; ?></option>
											   <?php
											    if($default==1):
											     $parameter_val = new settings($db,'insurance_parameter_val');
					                             $parameter_val->id=$idp;
					                             $stm_val=$parameter_val->insurance_parameter_val();
                                                 while ($parameterval = $stm_val->fetch(PDO::FETCH_ASSOC)){
						                          extract($parameterval);												 
											   ?>
											    <option value="<?php echo $type; ?>,<?php echo $id; ?>" style="direction:rtl;text-align:right"><?php echo $title; ?></option>
											   <?php } ?>
											   <?php endif; ?>
											 </select>
											 <?php elseif($type=='button'): ?>
											  <button class="btnsubmit" name="<?php echo $elementName; ?>" onClick="url('<?php echo $description; ?>')" style="margin-top:0"><?php echo $name; ?></button>
											 <?php elseif($type=='number'): ?>
											  <input type="text" class="ant-select-selection ant-select-selection--single numbermin" name="<?php echo $elementName; ?>" id="<?php echo $elementName; ?>" placeholder="<?php echo $name; ?>" />
											 <?php elseif($type=='text'): ?>
											  <input type="text" class="ant-select-selection ant-select-selection--single " name="<?php echo $elementName; ?>" id="<?php echo $elementName; ?>" placeholder="<?php echo $name; ?>" />
											 <?php elseif($type=='datepicker'): ?>
											  <input type="text" class="ant-select-selection ant-select-selection--single datepicker" name="<?php echo $elementName; ?>" id="<?php echo $elementName; ?>" placeholder="<?php echo $name; ?>" />
											 <?php endif; ?>
                                            </div>
                                           </div>
                                          </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
												<?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
					  <?php $k++; }  ?>
					</div>
                </div>
            
			      <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-24 ant-col-lg-24 div-element-drag" style="margin:20px 0">
                    <ul class="comparetab" style="justify-content: center;">
					 <?php echo $rightmenu; ?>
					</ul>
                  </div>
			</div>
        </div>
       </div>
     </div>
  </div>
  <div class="bity">
   <?php //include('api/v1/page/back.php'); ?>
  </div>
 </div>
</div>
<script>
 function dependent(id_dependent,name){
	var name=$('#'+name).val()
	var val_id=name.split(',')
	$(".dependent-"+id_dependent).html("<option value=''>لطفا منتظر بمانید ...</option>")
	$.getJSON("/api/v1/settings/dependent",{id:id_dependent,type:val_id[0],idval:val_id[1]}, function(e) {
		var a = "<option value=''>انتخاب کنید</option>";
        $.each(e, function(e, l) {
		 a = a + '<option value="' + l.type + ',' + l.id + '">' + l.title + "</option>";		 
        })
		$(".dependent-"+id_dependent).html(a)	
    })
 }
 function changeInsure(tab,tabing){
  $('.tab-content').removeClass('show').addClass('hidden') 
  $(tabing).removeClass('hidden').addClass('show') 
  $('.changeInsure').removeClass('badges').removeClass('current') 
  $(tab).addClass('badges').addClass('current') 
 }
 function url(insurance){
  var thirdparty=$('.'+insurance).serializeArray()
  var isok=true;
  var url="@";
  var j=0;
  $.each(thirdparty, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(!field.value){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false;
	}else{
	 if(j == 0){
	  url = url +field.name+"="+field.value;
	 }else{
	  url = url + "?"+field.name+"="+field.value;
	 }
	 j++;
	}
  });
  if(isok){
	window.location.href='/api/v1/url/ChangeUrl?q='+insurance+url;
  }
 }
 function insurebody(){
  var body=$('.body').serializeArray()
  var isok=true;
  $.each(body, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(field.value==''){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false
	}
  });
  if(isok){
	  $.post("/api/url/body.php",body, function(data, status){
	   window.location.href=data;
      });
  }
 }
 function fire(){
  var fire=$('.fire').serializeArray()
  var isok=true;
  $.each(fire, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(field.value==''){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false
	}
  });
  if(isok){
	  $.post("/api/url/fire.php",fire, function(data, status){
	   window.location.href=data;
      });
  }
 }
 function life(){
  var life=$('.life').serializeArray()
  var isok=true;
  $.each(life, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(field.value==''){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false
	}
  });
  if(isok){
	  $.post("/api/url/life.php",life, function(data, status){
	   window.location.href=data;
      });
  }
 }
 function travel(){
  var travel=$('.travel').serializeArray()
  var isok=true;
  $.each(travel, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(field.value==''){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false
	}
  });
  if(isok){
	  $.post("/api/url/travel.php",travel, function(data, status){
	   window.location.href=data;
      });
  }
 }
 function health(){
  var health=$('.health').serializeArray()
  var isok=true;
  $.each(health, function(i, field){
	$('#'+field.name).css('border','1px solid #f6f6f6')
	if(field.value==''){
	 $('#'+field.name).css('border','1px solid #f00')
	 isok=false
	}
  });
  if(isok){
	  $.post("/api/url/health.php",health, function(data, status){
	   window.location.href=data;
      });
  }
 }
</script>