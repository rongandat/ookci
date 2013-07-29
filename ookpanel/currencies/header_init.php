<script type="text/javascript">
	function getDeleteConfirmForm(currencyid)
	{
		$.post('<?php echo get_admin_link(PAGE_CURRENCY_AJAX,tep_get_all_get_params(array('action','module','page'))); ?>',{action:'ajax', ajaxaction:'getDeleteForm',currencyid:currencyid}, function(data)
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