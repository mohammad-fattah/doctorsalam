var ghavanin="",address="",yesno="",dat="",addressi="",f="0";function adddate(){$(".delivertime").css("display","block");var a=new Date,s=new Array(7);s[0]="یکشنبه",s[1]="دوشنبه",s[2]="سه شنبه",s[3]="چهارشنبه",s[4]="پنج شنبه",s[5]="جمعه",s[6]="شنبه";var e,i,l,d,t=a.getDay(),n="",c="",r="";"تهران"==$("#city").val()?(d=a.getHours()<"12"?(6==t?(n=6,c=0,r=1):(n=t,c=parseInt(t)+1,7==(r=parseInt(t)+2)&&(r=0)),(d=(d='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>امروز</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label><span class="ant-radio"><input type="radio" name="date" class="date" value="'+(e=s[n])+' 14 تا 19"></span><span> 14 تا 19</span></label> </div></div> </div> </div>')+'<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(i=s[c])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>')+'<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(l=s[r])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" class="date" value="'+l+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+l+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" name="date" value="'+i+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>'):(6==t?(c=0,r=1):(c=parseInt(t)+1,7==(r=parseInt(t)+2)&&(r=0)),(d='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(i=s[c])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>')+'<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(l=s[r])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" class="date" value="'+l+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+l+' 14 تا 19"></span><span> 14 تا 19</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" class="date" value="'+i+' 19 تا 22"></span><span> 19 تا 22</span></label> </div></div> </div> </div>'),$(".adddati").html(d)):(r=3==t?(n=6,c=0,1):4==t?(n=0,c=1,2):2==t?(n=5,c=6,0):5==t?(n=1,c=2,3):6==t?(n=2,c=3,4):(n=a.getDay()+3,c=a.getDay()+4,a.getDay()+5),d=(d=(d='<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(e=s[n])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+e+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+e+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+e+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>')+'<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(i=s[c])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+i+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+i+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+i+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>')+'<div class="deliveryitem"> <div class="ant-row-flex ant-row-flex-middle"> <div class="item_date ant-col-xs-24 ant-col-sm-24 ant-col-md-4"> <div>'+(l=s[r])+'</div></div> <div class="ant-col-xs-24 ant-col-sm-24 ant-col-md-20"> <div class="item_time"> <label ><span class="ant-radio"><input type="radio" name="date" value="'+l+' 9 تا 13"></span><span> 9 تا 13</span></label> </div> <div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+l+' 14 تا 19"></span><span> 14 تا 19</span></label> </div><div class="item_time"> <label class="ant-radio-wrapper"><span class="ant-radio"><input type="radio" name="date" value="'+l+' 19 تا 22"></span><span> 19 تا 22</span></label> </div> </div> </div> </div>',$(".adddati").html(d))}function timebtn(a){$(".timebtn").css("background-color","#fff").css("color","#252525"),$("#timebtn"+a).css("background-color","#12a3c1").css("color","#fff"),dat=$("#timebtn"+a).html()}$(document).ready(function(a){$(".aaa").focus(function(){$(this).addClass("activei").removeClass("error")}),$(".aaa").focusout(function(){$(this).removeClass("activei")}),$("#reciverForm").on("submit",function(a){$(".banki").val("در حال پردازش ..."),$("#namei,#city,#phone2,#cellphone,#reciver,.vehiclef,.timebime,.addressbime").removeClass("error");var s=$("#namei").val();s||($("#namei").addClass("error"),f="0"),(addressi=addressi||$(".addressi").val())||address||($(".addressbime").addClass("error"),f="0",addressi=address),dat||($(".timebime").addClass("error"),f="0");var e=$("#city").val();e||($("#city").addClass("error"),f="0");var i=$("#phone2").val();i||($("#phone2").addClass("error"),f="0");var l=$("#cellphone").val();l||($("#cellphone").addClass("error"),f="0");var d=$("#reciver").val();if(d||($("#reciver").addClass("error"),f="0"),ghavanin||$(".vehiclef").css("color","#f00"),s&&e&&i&&l&&d&&dat&&addressi&&(f="1"),"new"!=address)var t="&address="+address+"&date="+dat;else t="&date="+dat;if("1"==f)if("yes"==$(".vehicle").attr("name")){var n=$("#reciverForm").serialize();$.ajax({url:"/webservice/insurance/l2.php",type:"GET",data:n+t,contentType:!1,cache:!1,processData:!1,success:function(a){window.location.href="/send"},error:function(){}})}else swal("لطفا شرایط و قوانین را مطالعه و تایید نمایید"),$(".banki").val("تایید و پرداخت");else swal("تمام موارد را کامل کنید"),$(".banki").val("تایید و پرداخت")}),$(".addressbtn").on("click",function(){var a=$(this).attr("name");"new"==a?(addressi=address="",$(".hideaddress").css("display","block")):(addressi=address=a,$(".hideaddress").css("display","none")),$(".addressbtn").css("background-color","#fff").css("color","#252525"),$(this).css("background-color","#12a3c1").css("color","#fff")}),$(".vehicle").on("click",function(){"no"==$(".vehicle").attr("name")?(ghavanin="1",f=1,$(".vehicle").css("background-color","#12a3c1").css("color","#fff"),$(".vehicle").attr("name","yes")):(ghavanin="",f="0",$(".vehicle").css("background-color","#fff").css("color","#252525"),$(".vehicle").attr("name","no"))})});