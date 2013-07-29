<?php
	include('includes/admin_login_check.php');

	include(_CLASSES_DIR.'paginator.php');

	$action	=	$_POST['action'];
	//bof: date
		$this_year	=	date('Y');	
		$months_array[0]	=	'--';			
		for ($i=1; $i<13; $i++)	{
			$months_array[$i]	=	$i;
		}				
	// day of month array
		$days_array[0]	=	'--';
		for ($i=1; $i<32; $i++)	{
			$days_array[$i]	=	 $i;
		}
		
		$smarty->assign('days_array',$days_array);
		// search years	
		$smarty->assign('months_array',$months_array);
		
		$years_array	=	array();
		$years_array[0]	=	'----';
		for ($i=$this_year-3; $i<$this_year+1; $i++) {
			$years_array[$i]=$i;
		}
		$smarty->assign('years_array',$years_array);			
		
		$smarty->assign('fromdateDay',date('d'));
		$smarty->assign('fromdateMonth',date('m'));
		$smarty->assign('fromdateYear',date('Y'));		
		$smarty->assign('todateDay',date('d'));
		$smarty->assign('todateMonth',date('m'));
		$smarty->assign('todateYear',date('Y'));	
				
		
	//eof: date
			
	switch ($action) {	
		case 'process_search':			
			$batch_number	=	db_prepare_input($_POST['batch_number']);
			$from_account	=	db_prepare_input($_POST['from_account']);
			$to_account	=	db_prepare_input($_POST['to_account']);
			$note	=	db_prepare_input($_POST['transaction_note']);									
			
			$search_date_filter	=	(int)$_POST['search_date_filter'];

			if ($search_date_filter) {
				$fromdateDay	=	db_prepare_input($_POST['fromdateDay']);
				$fromdateMonth	=	db_prepare_input($_POST['fromdateMonth']);
				$fromdateYear	=	db_prepare_input($_POST['fromdateYear']);
				$todateDay	=	db_prepare_input($_POST['todateDay']);
				$todateMonth	=	db_prepare_input($_POST['todateMonth']);
				$todateYear	=	db_prepare_input($_POST['todateYear']);															
			
				if ($fromdateDay!=0 && $fromdateMonth!=0 && $fromdateYear!=0) {
					$from_date	=	date('Y-m-d',strtotime($fromdateDay.'-'.$fromdateMonth.'-'.$fromdateYear));			
					$where_filter	.=	" AND DATE_FORMAT(transaction_time,'%Y-%m-%d')>='".$from_date."' ";				
				}
	
				if ($todateDay!=0 && $todateMonth!=0 && $todateYear!=0) {
					$to_date	=	date('Y-m-d',strtotime($todateDay.'-'.$todateMonth.'-'.$todateYear));			
					$where_filter	.=	" AND DATE_FORMAT(transaction_time,'%Y-%m-%d')<='".$to_date."' ";									
				}
			}
			
			if (tep_not_null($batch_number)) $where_filter	.=	" AND batch_number='".$batch_number."' ";			
			if (tep_not_null($from_account)) $where_filter	.= " AND from_account LIKE '".$from_account."%' ";
			if (tep_not_null($to_account)) $where_filter	.= " AND to_account LIKE '".$to_account."%' ";
			if (tep_not_null($note)) $where_filter	.= " AND transaction_memo LIKE '%".$note."%' ";			
						
			postAssign($smarty);
			break;
			
	}		
	
	$smarty->assign('link_transaction',get_admin_link(PAGE_TRANSACTIONS,tep_get_all_get_params(array('action','module','page'))) );		
	
	$sql_transaction	=	"SELECT * FROM "._TABLE_TRANSACTIONS." WHERE 1 $where_filter ";
	$sql_transaction_page	=	"SELECT * FROM "._TABLE_TRANSACTIONS." WHERE 1 $where_filter ORDER BY transaction_time DESC, transaction_id DESC";
	
	$transaction_query		=	db_query($sql_transaction);	
	$transaction_numbers	=	 db_num_rows($transaction_query);
				
	$transactionpage =& new Paginator($_GET['pg'],$transaction_numbers);
	$transactionpage->set_Limit(25);	
	$transactionpage->pagename	=	get_admin_link(PAGE_TRANSACTIONS,tep_get_all_get_params(array('pg', 'x', 'y','action','module','page')));
	
	$transactionpage->set_Links(6);
	$limit1 = $transactionpage->getRange1(); 
	$limit2 = $transactionpage->getRange2(); 		
	
	$sql_transaction_page	.=	" LIMIT $limit1, $limit2";	
	$transaction_page_query	=	db_query($sql_transaction_page);	
	
	// get smarty transaction list
	$transaction_array	=	array();
	while ($transaction	=	db_fetch_array($transaction_page_query) )
	{
		$transactions_array[]	=	$transaction;
	}
	
	$smarty->assign('page_links',$transactionpage->getPageLinks());							
	$smarty->assign('transactions',$transactions_array);
	
// get all transaction transactions
$_html_main_content = $smarty->fetch('transactions/history.html');
?>