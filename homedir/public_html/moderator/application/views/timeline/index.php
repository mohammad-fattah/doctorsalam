<style>
    .modal-footer .btn+.btn{float:left}
    

</style>
            <!-- *********************************for input chat -->
            <div class="box-footer fixdown"  style="width: 50%; height: 70px; margin: 0px 50px 0px 0px; position: fixed; bottom: 0px;  z-index: 2;">  

            <!-- reply section -->
                <div id="reply_message">
                    
                </div>
            <!-- reply section -->

                <form action="<?php echo base_url();?>index.php/Timeline/save" id="sendchata" class="sendbox hasmic" style="height:15px;">
                    <div class="form-group is-empty">
                        <textarea maxlength="2000" id="m" type="text" name="message" placeholder="پیام..." class="form-control" style="overflow-x: hidden; overflow-wrap: break-word; height: 31px;"></textarea>
                        <span class="material-input"></span>
                    </div>
                </form>
            </div>
<!-- *********************************for input chat -->
<div class="box">
    <div class="box-content" id="out">
        <div id="timeline-content" class="clearfix p15 mb20"> 
            <table id="message_table" class="display" cellspacing="0" width="100%">  
            <ul class="nav nav-tabs">   

            </ul>          
            </table>
        </div>
                    <!-- *********************************for show chat -->
            <div class="box-body chatpm dragandrophandler" style="height: 0px;">
                <div id="chatbox" style="width: 50%; position: absolute; top: 75px; "> 
                </div>
            </div>
            <!-- *********************************for show chat -->
    </div>
    <div class="hidden-xs box-content bg-white" style="width: 250px; min-height: 100%;left:0;top:60px">
        <div id="user-list-container" >
            <div class="p15"> 
                <form action="<?php echo base_url();?>index.php/Timeline/list_data">
                    <table id="team_member-table" class="display" cellspacing="0" width="100%">
                    </table>
                </form>
            </div>
        </div>
                    <input type="hidden" id="hidden_unique_id" value="">
    </div>
</div>





<script type="text/javascript">





// on click in each of unique codes show description row of post table for each of them
        function get_input_value(data){
        document.getElementById("timeline-content").innerHTML = "";
        document.getElementById("hidden_unique_id").value = data;         
        $.ajax({
            url:"<?php echo base_url();?>index.php/Timeline/list_data",           
            type: "POST",
            data: { unique_id:  $('#hidden_unique_id').val()},           
            success : function(data){    
                var image_url = "<?php echo base_url();?>assets/images/reply.png"        
                var jsonObj = $.parseJSON(data);
                var text = "";  
                var reply = "";
                var i;
                var date = "";
                var datum = "";              
            for (var i = 0; i<jsonObj.length; i++) { 
               // for date yesterday
                    var j;
                    if (i != 0 ) {
                        j = i-1;                    
                    }else{
                        j = 0;
                    }
                    var str_1 = jsonObj[j].created_at;
                    var res_1 = str_1.split(" ");
                    var date_1 = res_1[0];
                    var split_date_1 = date_1.split("-");
                    // yesterday_split_date = split_date_1[0]+split_date_1[1]+split_date_1[2];
                    yesterday_split_date = split_date_1[2];
                    // for today date
                    var str = jsonObj[i].created_at;
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
                    if (jsonObj[i].created_by == 1) {
                        client_backgroundcolor = "#ffffff";
                        client_float = "left";
                    }else{
                        client_backgroundcolor = "rgb(177, 219, 224)";                    
                        client_float = "right";
                    }  
                    // for reply button
                    var reply_button_float = "";
                    if (jsonObj[i].created_by != 1) {
                        reply_button_float = "left";
                        reply_text_float ="right";
                        reply_margin = "0px";
                    }else{                    
                        reply_button_float = "left";
                        reply_text_float = "left";
                        reply_margin = "132px";

                    }  
                    //end for reply button
                    // for print date of codes in a day
                    if (yesterday_split_date != today_split_date) {                 
                        text += "<span id='dasdvcte' style='text-align: center; left: 61%; margin: 0px 42% 10px 0px;     padding: 5px; float: right; border-radius: 5px; background: #345; color: white; font-size: 12px;'>" + split_date[0] +"/" + split_date[1] +"/" + split_date[2] + "</span>";
                    }else if (i == 0) {
                        text += "<span id='dasdvcte' style='text-align: center; left: 61%; margin: 0px 42% 10px 0px; padding: 5px; float: right; border-radius: 5px; background: #345; color: white;    font-size: 12px;'>" + split_date[0] +"/" + split_date[1] +"/" + split_date[2] + "</span>";
                    }
                //end for print date of codes in a day
                // for printing chat history
                  if (jsonObj[i].reply != 0) {
                    var k = jsonObj[i].source_description;
                    text +="<div style='width: 80%; height: auto; background: #aec1c3;border-radius: 10px 0px 10px 0px; color: gray; margin: 0px "+ reply_margin +" 0px 0px;'>"+ k + "</div>";
                  }

                    text += "<span style='width:80%;height:auto;min-height:30px;border-radius:4px;background-color:" + client_backgroundcolor;
                    text += ";padding:3px 0px;font-size:12px; float:" + client_float;
                    text += "'>";
                    text += "<p style=' padding: 0px 15px 0px 0px; margin: 0px;'>";
                    text += jsonObj[i].description + "<br>";
                    text += "</p>";
                    // for reply button
                    text += "<img src='"+ image_url + "' id='"+ jsonObj[i].description +"' onclick='reply_click(this.id)' style='border-radius: 50%; width: 15px; height: 15px; background:#aeb5bb; cursor: pointer; margin: -15px 0px 0px 9px;  float:"+ reply_button_float +"'>";
    
                    //end for reply button                    
                    text += "<p style='float:left; padding: 0px 0px 5px 5px; margin: 0px;'>";
                    text += time;       
                    text += "</p>";
                    text += "</span><div style='height:20px;clear:both;width:100%'></div>";

                }          
                    text += "<div style='height:55px;' ></div>"

            document.getElementById("chatbox").innerHTML = text;
            document.getElementById("show_date").innerHTML = datum; 
            }
        })
    }


    //     function get_input_value_refresh(data){        
    //     document.getElementById("hidden_unique_id").value = data;         
    //     $.ajax({
    //         url:"<?php echo base_url();?>index.php/Timeline/list_data",           
    //         type: "POST",
    //         data: { unique_id:  $('#hidden_unique_id').val()},
    //         success : function(data){
    //             document.getElementById('timeline-content').innerHTML = data;
    //         }
    //     })
    //     document.getElementById('user-list-container').innerHTML = "<a href='<?php echo base_url();?>index.php/Timeline' style='float: right; padding: 58px;'>بازگشت به منو مشتریان  </a>";
        
    // }


//end on click in each of unique codes show description row of post table for each of them

    $(document).ready(function () {
        $("#team_member-table").appTable({
            source: '<?php echo_uri("clients/list_data_for_chat/") ?>',
            order: [[1, "asc"]],
            columns: [
                {title: "نام مشتری", "class": "ck1"},                              
                {title: " کد یکای چت", "class": "unique_id"}                 
            ]
        });

    });

</script>  
<script type="text/javascript">
    $(document).ready(function () {
        setTimelineScrollable()
        $(window).resize(function () {
            setTimelineScrollable();
        });
    });
    setTimelineScrollable = function () {
        var options = {
            setHeight: $(window).height() - 65
        };

        initScrollbar('#user-list-container', options);

        //don't apply scrollbar for mobile devices
        if ($(window).width() <= 640) {
            $('#timeline-content').css({"overflow": "auto"});
        } else {
            options.callbacks = {
                onTotalScroll: function () {
                    if (!$(".load-more").hasClass("inline-loading")) {
                        $(".load-more").trigger("click"); //auto load more data
                    }
                }
            };
            initScrollbar('#timeline-content', options);
        }

    };

var reply_condition = true;
  function reply_click(source_id)
    {
        reply_condition = false;
        if (!reply_condition) {
            var reply_sourse_message = "";
            reply_sourse_message = "<div id='reply_section' style='width: 100%; height: 30px; background: #aec1c3; color: gray;'>" + source_id + "</div>";
            document.getElementById("reply_message").innerHTML = reply_sourse_message;
          // inset messages
            $('#m').keypress(function (e) {
                if (e.which == 13) {
                    $.ajax({
                        type: 'POST',
                        url:"<?php echo base_url();?>index.php/Timeline/save",
                        data: {source_description: source_id, unique_id: $('#hidden_unique_id').val(),description: $('#m').val()},
                        success: function(data)
                        {
                            // alert(source_id)  
                        }
                    });
                    $('#m').val('');
                    document.getElementById("reply_message").innerHTML = '';            
                    return false;
                }
            });
        }         
    }
// insert message
    if (reply_condition) {
        $('#m').keypress(function (e) {
        if (reply_condition) {                    
            if (e.which == 13) {
          $.ajax({
        type: 'POST',
        url:"<?php echo base_url();?>index.php/Timeline/save",
        data: { unique_id: $('#hidden_unique_id').val(), description: $('#m').val() },
        success: function(data)
        {
            // alert()
        }
    });
    $('#m').val('')        
    return false;
   }
   }
  });
  }

</script>
