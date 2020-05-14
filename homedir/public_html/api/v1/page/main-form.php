<form action="/search" class="col-md-10 col-sm-10 p-5" style="margin:0 auto;float:none">
    <div class="col-md-2 col-sm-2 p-5 search-control">
        <input type="submit" class="btn btn-pliro-secondary btn-block btn-xlg text-mediumbold" value="جستجو">
    </div>
    <div class="col-md-7 col-sm-6  p-5 search-control">
        <div class="has-feedback has-feedback-left">
            <span class="twitter-typeahead" style="position: relative; display: inline-block;">
		 <input name="q" class="border-primary-800 form-control input-xlg  typeahead-remote tt-input" type="text" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;direction:rtl" placeholder="جستجوی نام پزشک یا مرکز درمانی...">
        </span>
            <div class="form-control-feedback">
                <i class="icon-search4 text-muted text-size-base"></i>
            </div>
        </div>
    </div>
	<div class="col-md-3 col-sm-3 p-5 location-control">
        <select name="state" class="select-location form-control input-xlg select2 state" style="height:50px;border-style:none">
            <option>استان</option>
        </select>
    </div>
  
</form>
<script>
    $(document).ready(function() {
        var state = '<option value="">استان</option>';
        $.ajax({
            type: "GET",
            url: "/api/v1/settings/state",
            success: function(msg) {
                for (var i = 0; i < msg.length; i++) {
                    state = state + '<option>' + msg[i].name + '</option>';
                }
                $('.state').html(state)
            }
        })
    });
</script>