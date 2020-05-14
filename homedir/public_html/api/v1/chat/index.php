<?php 
  
    include_once 'api/v1/settings/header.php';
    include_once 'api/v1/objects/chat.php';    
  
    if(isset($username)){ 
        if (isset($first_name)) {            
        $client_name = $first_name.' '.$last_name;
        }
    }else{
        $client_name = null;
    }
        ?>
        <form action="">
             <input type="hidden" id="client_name" value="<?php if(isset($client_name)){echo $client_name;}  ?>">
        </form>
        
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>چت آنلاین</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport">
    <link href="/api/v1/chat/client.css" rel="stylesheet">
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
            right: 50px;


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
        <div class="direct-chat" style="height:95vh;">
            <div id="abzar_chat_clz" onclick="closebigwin()" style="display: block;">
                <svg fill="#ffffff" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"></path>
                </svg>
            </div>
            <div class="box-header">
                <div style="width:55px" class="pull-right opaxha"><span><img src="/api/v1/chat/profile.png" style="width:100%;height:100%" alt="avatar" width="40" height="40"></span></div>
                <div class="pull-right textha">
                    <div class="nametop">پشتیبان سایت</div>
                    <div class="texttop">پاسخگوی سوالات شما هستیم</div>
                </div>
            </div>

            <div class="box-body chatpm dragandrophandler">                
                <div id="show_date"></div>
                <div id="chatbox">
                    <input type="hidden" id="unique_id" value="<?php echo $_COOKIE['uniqueID']; ?>">
                </div>
            </div>
            <!-- reply section -->
                <div id="reply_message">
                    
                </div>
            <!-- reply section -->

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
 <div id="abzar_chat_icon" onclick="openbigwin()" class="fadeInUp"><div class="widgeticon"><img src="/api/v1/chat/icon.png" width="60" height="60"></div><div class="unread_num"></div>
</div>
 </div>

 <script>
    var unique_id_var = $('#unique_id').val();
    function openbigwin(){
        show_message();

// window.scrollTo(0,document.chatbox.scrollHeight);

        // refreshing data in chat box
        // var auto_refresh = setInterval(
        // function ()
        // {
        //     $('#show_date').load(show_message()).fadeIn("slow");
        // }, 10 ); // refresh every 10 milliseconds


        // window.scrollTo(0,document.body.scrollHeight);
        window.scrollTo(0,document.getElementById("#chatbox").scrollHeight);

    }
    function show_message(){
        $.ajax({
            type: 'GET',
            url:"/api/v1/chat/fetch_message",
            data: {unique_id: unique_id_var},
            success : function(data){
                var reply = "";
                var text = "";
                var i;
                var date = "";
                var datum = "";
                for (i = 0; i < data.length; i++) {
                    // for date yesterday
                    var j;
                    if (i != 0 ) {
                        j = i-1;                    
                    }else{
                        j = 0;
                    }
                    var str_1 = data[j].created_at;
                    var res_1 = str_1.split(" ");
                    var date_1 = res_1[0];
                    var split_date_1 = date_1.split("-");
                    // yesterday_split_date = split_date_1[0]+split_date_1[1]+split_date_1[2];
                    yesterday_split_date = split_date_1[2];
                    // for today date
                    var str = data[i].created_at;
                    var res = str.split(" ");
                    var date = res[0];
                    var split_date = date.split("-");
                    // today_split_date = split_date[0]+split_date[1]+split_date[2];
                    today_split_date = split_date[2];
                    // for time hour an minutes
                    var split_time = res[1].split(":");
                    var time = split_time[0] + ":" +split_time[1];
                    // for create difrance between admin and client message
                    var client_float = "";
                    var client_backgroundcolor = "";
                    if (data[i].created_by == 1) {
                        client_backgroundcolor = "#ffffff";
                        client_float = "left";
                    }else{
                        client_backgroundcolor = "rgb(177, 219, 224)";                    
                        client_float = "right";
                    }  
                    // for reply button
                    var reply_button_float = "";
                    if (data[i].created_by != 1) {
                        reply_button_float = "left";
                        reply_margin = "0px";
                    }else{                    
                        reply_button_float = "right";
                        reply_margin = "64px";

                    }  
                    //end for reply button
                    // for print date of codes in a day
                    if (yesterday_split_date != today_split_date) {                 
                        text += "<span id='dasdvcte' style='text-align: center; left: 61%; margin: 0px 42% 10px 0px;     padding: 5px; float: right; border-radius: 5px; background: #345; color: white; font-size: 12px;'>" + split_date[0] +"/" + split_date[1] +"/" + split_date[2] + "</span>";
                    }else if (i == 0) {
                        text += "<span id='dasdvcte' style='text-align: center; left: 61%; margin: 0px 42% 10px     0px; padding: 5px; float: right; border-radius: 5px; background: #345; color: white;    font-size: 12px;'>" + split_date[0] +"/" + split_date[1] +"/" + split_date[2] + "</span>";
                    }
                //end for print date of codes in a day
                // for printing chat history
                  if (data[i].reply != 0) {
                    var k = data[i].source_description;
                    text +="<div style='width: 80%; height: auto; background: #aec1c3;border-radius: 10px 0px 10px 0px; color: gray; margin: 0px "+ reply_margin +" 0px 0px;'>"+ k + "</div>";
                  }

                    text += "<span style='width:80%;height:auto;min-height:30px;border-radius:4px;background-color:" + client_backgroundcolor;
                    text += ";padding:3px 0px;font-size:12px; float:" + client_float;
                    text += "'>";
                    text += "<p style=' padding: 0px 15px 0px 0px; margin: 0px;'>";
                    text += data[i].description + "<br>";
                    text += "</p>";
                    // for reply button
                    text += "<img src='api/v1/chat/reply.png' id='"+ data[i].description +"' onclick='reply_click(this.id)' style='border-radius: 50%; width: 15px; height: 15px; background:#aeb5bb; cursor: pointer; margin: -15px 0px 0px 9px;  float:"+ reply_button_float +"'>";
    
                    //end for reply button                    
                    text += "<p style='float:left; padding: 0px 0px 5px 5px; margin: 0px;'>";
                    text += time;       
                    text += "</p>";
                    text += "</span><div style='height:20px;clear:both;width:100%'></div>";
                    // reply += "<input type='hidden' value='" + data[i].id + "'>";
                }                    
            document.getElementById("chatbox").innerHTML = text;
            document.getElementById("show_date").innerHTML = datum;
            // document.getElementById("show_date").innerHTML = reply;

            }
        });

        $('.main_chat_div').css('height','calc(100% - 70px)')
        $('.main_chat_div').css('width','360px')
        $('#allchatbox').css('display','block')
        $('#abzar_chat_icon').css('display','none')

    }

  var reply_condition = true;
  function reply_click(source_id)
  {
    reply_condition = false;
    if (!reply_condition) {
            var reply_sourse_message = "";
    reply_sourse_message = "<div style='width: 100%; height: 30px; background: #aec1c3; color: gray;'>" + source_id + "</div>";
    document.getElementById("reply_message").innerHTML = reply_sourse_message;
        
          // inset messages
    $('#m').keypress(function (e) {
        if (e.which == 13) {
                $.ajax({
                type: 'POST',
                url:"/api/v1/chat/insert_reply",
                    data: { unique_id: unique_id_var, description: $('#m').val(), client_name: $('#client_name').val(), source_description: source_id },
                success: function(data)
                {}
            });                     
            // document.location.load = show_message();    
            $('#m').val('');
            document.getElementById("reply_message").innerHTML = '';            
            return false;
        }
    });  
    }         
    }

    function closebigwin(){
     $('.main_chat_div').css('height','100px')
     $('.main_chat_div').css('width','100px')
     $('#allchatbox').css('display','none')
     $('#abzar_chat_icon').css('display','block')
    }
  // inset messages
    if (reply_condition) {

    $('#m').keypress(function (e) {
        if (reply_condition) {        
            if (e.which == 13) {
                    $.ajax({
                    type: 'POST',
                    url:"/api/v1/chat/insert_message",
                        data: { unique_id: unique_id_var, description: $('#m').val(), client_name: $('#client_name').val() },
                    success: function(data)
                    {}
                });                     
                // document.location.load = show_message();    
                $('#m').val('')
                return false;
            }
        }
    });
    
    }
 </script>
</body>
</html>
