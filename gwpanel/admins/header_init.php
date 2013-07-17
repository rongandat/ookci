<script type="text/javascript">
	function getDeleteConfirmForm(adminid)
	{
		$.post('<?php echo get_admin_link(PAGE_ADMIN_AJAX,tep_get_all_get_params(array('action','module','page'))); ?>',{action:'ajax', ajaxaction:'getDeleteForm',adminid:adminid}, function(data)
			{
				$("#ajaxContent").html(data);
				$("#ajaxContent").fadeIn();
			}
		);
	}
	
	// close delete new confirmform
	function closeConfirmForm()
	{
		$("#ajaxContent").fadeOut();
	}
	
</script>