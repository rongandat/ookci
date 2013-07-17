<script type="text/javascript" src="includes/js/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){  
		 $("#buttonSearch").click(function() {
                 if ($("#ajaxSearchContent").css("display") =='none')  {
			        $("#ajaxDetailsContent").hide();				 				 				 
                    $("#ajaxSearchContent").fadeIn();
				 } else {
				 	document.frmSearch.submit();
				 }
		});	
	});
	
	function getTransactionDetails(transactionid)
	{
		$.post('<?php echo get_href_link(PAGE_ACCOUNT_TRANSACTIONS_AJAX,tep_get_all_get_params(array('action','module','page'))); ?>',{doajax:'get_transaction_details',transaction_id:transactionid}, function(data)
			{
				$("#ajaxSearchContent").hide();
				$("#ajaxDetailsContent").html(data);
				$("#ajaxDetailsContent").fadeIn();
			}
		);
	}
	
	// close delete new confirmform
	function closeTransactionDetailsContent()
	{

		$("#ajaxDetailsContent").hide();
	    if ($("#ajaxSearchContent").css("display") !='none')  {		
			$("#ajaxSearchContent").fadeIn();
		}
	}
	
	// get Progcess Form
	function getProcessForm(transactionid)
	{
	}
	
</script>