<script type="text/javascript">
    $(document).ready(function(){  
        $("#buttonSearch").click(function() {
            if ($("#ajaxSearchContent").css("display") =='none')  {
                $("#ajaxDetailsContent").hide();	
                $("#ajaxDetailsAddContent").hide();
                $("#ajaxSearchContent").fadeIn();
            } else {
                document.frmSearch.submit();
            }
        });	
    });
	
    function getUserDetails(userid)
    {
        $.post('<?php echo get_admin_link(PAGE_USER_AJAX, tep_get_all_get_params(array('action', 'module', 'page'))); ?>',{doajax:'get_user_details',user_id:userid}, function(data)
        {
            $("#ajaxSearchContent").hide();
            $("#ajaxDetailsContent").html(data);
            $("#ajaxDetailsAddContent").hide();
            $("#ajaxDetailsContent").fadeIn();
        }
    );
    }
	
    function editUser(userid)
    {
        $.post('<?php echo get_admin_link(PAGE_USER_AJAX, tep_get_all_get_params(array('action', 'module', 'page'))); ?>',{doajax:'edit_user',user_id:userid}, function(data)
        {
            $("#ajaxSearchContent").hide();
            $("#ajaxDetailsContent").html(data);
            $("#ajaxDetailsAddContent").hide();
            $("#ajaxDetailsContent").fadeIn();
        }
    );
    }
    function addUser()
    {
        $("#ajaxSearchContent").hide();
        $("#ajaxDetailsContent").hide();
        $("#ajaxDetailsAddContent").show();
        $("#ajaxDetailsContent").fadeIn();
    }
	
		
    // close delete new confirmform
    function closeUserDetailsContent()
    {

        $("#ajaxDetailsContent").hide();
        $("#ajaxDetailsAddContent").hide();
       
        if ($("#ajaxSearchContent").css("display") !='none')  {		
            
            $("#ajaxSearchContent").hide();
        }
    }
	
    // get activeUser
    function activeUser(userid)
    {
        var cf = confirm('Are you sure active user #'+userid);
        if(cf)
            $.ajax({
                url: '<?php echo get_admin_link(PAGE_USER_AJAX, tep_get_all_get_params(array('action', 'module', 'page'))); ?>',
                dataType: 'HTML',
                data:{user_id:userid,doajax:'active_user'},
                type: "POST",
                success: function(json) {		
                    $('#status-'+userid).html('Active')
                    $('#action-user-'+userid).html('<a class="linkButtonDeActive" id="" href="javascript:deactiveUser('+ userid +');" >De-active</a>')
                }
        });
    }
    // get deactiveUser
    function deactiveUser(userid)
    {
        var cf = confirm('Are you sure de-active user #'+userid);
        if(cf)
            $.ajax({
                url: '<?php echo get_admin_link(PAGE_USER_AJAX, tep_get_all_get_params(array('action', 'module', 'page'))); ?>',
                dataType: 'HTML',
                data:{user_id:userid,doajax:'deactive_user'},
                type: "POST",
                success: function(json) {		
                    $('#status-'+userid).html('Deactive')
                    $('#action-user-'+userid).html('<a class="linkButtonActive" id="" href="javascript:activeUser('+ userid +');" >Active</a>')
                }
        });
    }
	
</script>