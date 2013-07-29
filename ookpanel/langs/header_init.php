<script type="text/javascript">
	function getDeleteConfirmForm(languageid)
	{
		$.post('<?php echo get_admin_link(PAGE_LANGUAGE_AJAX,tep_get_all_get_params(array('action','module','page'))); ?>',{action:'ajax', ajaxaction:'getDeleteForm',languageid:languageid}, function(data)
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