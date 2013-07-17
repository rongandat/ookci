<script type="text/javascript" src="includes/js/jquery.min.js"></script>
<script type="text/javascript">
function getStates(countryid) {
	$.post('<?php echo get_href_link(PAGE_GLOBAL_AJAX); ?> ', {doajax : 'get_states',country_id: countryid}, function(data) {
			$("select:#state").html(data);
		});
}
</script>