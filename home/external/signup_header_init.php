<script type="text/javascript" src="includes/js/jquery.min.js"></script>
<script type="text/javascript">
function checkSecurityQuestion(security_question_id) {
	if (security_question_id==-1) {
		$("#content_custom_question").show();
	} else {
		$("#content_custom_question").hide();	
	}
}
</script>