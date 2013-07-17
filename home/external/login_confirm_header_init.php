<script  type="text/javascript">
function checkConfirm()
{
	if (document.getElementById('confirm_message').checked) {
		document.getElementById('buttonContinue').disabled	=	false;
	}else {
		document.getElementById('buttonContinue').disabled	=	true;	
	}
}
</script>