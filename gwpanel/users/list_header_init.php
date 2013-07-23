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
            $("#ajaxSearchContent").fadeIn();
        }
    }
	
    // get Progcess Form
    function getProcessForm(userid)
    {
    }
	
</script>