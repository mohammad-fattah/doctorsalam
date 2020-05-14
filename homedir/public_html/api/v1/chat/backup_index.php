<?php 
    include_once 'api/settings/header.php';
	include_once 'api/objects/chat.php';	
 ?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>چت آنلاین</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <link href="/api/chat/client.css" rel="stylesheet">
    <style>
        .clientchat .left .dc-text,
        .clientchat .box-header,
        .cssload-loader div,
        .opaxha span,
        .dc-text:before,
        .pressmic,
        .right .amazingaudioplayer-progress-played {
            background: rgb(0, 188, 212)
        }
        
        .loadbackpm,
        .emojz div,
        .right .dc-text a:hover {
            color: rgb(0, 188, 212)
        }
        
        .clientchat .opaxha img {
            border-color: rgb(0, 188, 212)
        }
        
        .textha,
        .clclose,
        .left > .dc-text {
            color: white
        }
        
        .left .dc-text svg {
            fill: white
        }
        
        #abzar_chat_icon {
            float: right
        }
        
        #chatboxm .dc-text {
            float: right;
            margin-right: 50px;
        }
        
        .unread_num {
            right: 50px
        }
        
        #chatboxm .dc-img {
            right: 0
        }
        
        .sendFormButton {
            background: rgb(0, 188, 212);
            color: white !important
        }
        
        .focus_field {
            background-image: linear-gradient(rgb(0, 188, 212), rgb(0, 188, 212)), linear-gradient(#D2D2D2, #D2D2D2)
        }
        
        .widgeticon {
            background: rgb(0, 188, 212)
        }
		.main_chat_div{position:fixed;left:10px;bottom:20px;height:100px;width:100px;z-index:5;border-radius:10px;overflow:hidden}
    </style>
</head>

<body>
 <div class="main_chat_div">
    <div id="allchatbox" class="clientchat fadeInUp" style="display:none; border-radius: 0px; width: 100%; height: 100%; margin: 0px;">
        <div class="direct-chat" style="height:100vh;">
            <div id="abzar_chat_clz" onclick="closebigwin()" style="display: block;">
                <svg fill="#ffffff" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                </svg>
            </div>
            <div class="box-header">
                <div style="width:55px" class="pull-right opaxha"><span><img src="/api/chat/profile.png" style="width:100%;height:100%" alt="avatar" width="40" height="40"></span></div>
                <div class="pull-right textha">
                    <div class="nametop">پشتیبان سایت</div>
                    <div class="texttop">پاسخگوی سوالات شما هستیم</div>
                </div>
            </div>
            <div class="box-body chatpm dragandrophandler">
                <div id="chatbox">
					<input type="hidden" id="unique_id" value="<?php echo $_COOKIE['uniqueID']; ?>">
                </div>
            </div>
            <div class="box-footer fixdown">
               
                <form action="../objects/messages.php" id="sendchata" class="sendbox hasmic" style="height:85px;">
                    <div class="form-group is-empty">
                        <textarea maxlength="2000" id="m" type="text" name="message" placeholder="پیام..." class="form-control" style="overflow-x: hidden; overflow-wrap: break-word; height: 31px;"></textarea>

                        <span class="material-input"></span>
				    </div>
                </form>
            </div>
        </div>
    </div>
 <div id="abzar_chat_icon" onclick="openbigwin()" class="fadeInUp"><div class="widgeticon"><img src="/api/chat/icon.png" width="60" height="60"></div><div class="unread_num"></div>

</div>
 </div>
 <script>
  function openbigwin(){
    $.ajax({
        type: 'GET',
        url:"/api/chat/fetch_message",
        data: {unique_id: $('#unique_id').val()},
        success : function(data){
            var text = "";
            var i;
            for (i = 0; i < data.length; i++) {
              text += "<span style='width:80%;height:auto;min-height:30px;border-radius:4px;background-color:#fff;padding:3px 0px;font-size:12px;'>";
              text += data[i].description + "<br>";
              text += data[i].created_at;
            
              text += "</span><div style='height:20px;clear:both;width:100%'></div>";
        }
document.getElementById("chatbox").innerHTML = text;

        }
    });
   $('.main_chat_div').css('height','calc(100% - 70px)')
   $('.main_chat_div').css('width','360px')
   $('#allchatbox').css('display','block')
   $('#abzar_chat_icon').css('display','none')
  }
  function closebigwin(){
   $('.main_chat_div').css('height','100px')
   $('.main_chat_div').css('width','100px')
   $('#allchatbox').css('display','none')
   $('#abzar_chat_icon').css('display','block')
  }
  $('#m').keypress(function (e) {
   if (e.which == 13) {
    $('#chatbox').append('<span style="width:auto;height:auto;min-height:30px;border-radius:4px;background-color:#fff;padding:10px 5px;font-size:12px;">'+$('#m').val()+'</span><div style="height:20px;clear:both;width:100%"></div>');
          $.ajax({
        type: 'POST',
        url:"/api/chat/insert_message",
        data: { unique_id: $('#unique_id').val(), description: $('#m').val() },
        success: function(data)
        {
        }
    });
    $('#m').val('')
    return false;
   }
  });
 </script>
</body>
</html>
