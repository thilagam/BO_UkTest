<?php
/**
 * Followup for the SEO, Tech and Prod Missions
 * @version 1.0
*/
class FollowupController extends Ep_Controller_Action
{
	var $url='';
	var $mail_from = "work@edit-place.com";
	
	public function init()
	{
		parent::init();	
		$this->_view->fo_path = $this->_config->path->fo_path;
		$this->url = $this->_config->path->bo_base_path;
		$this->quote_documents_path=APP_PATH_ROOT.$this->_config->path->quote_documents;
		$this->mission_documents_path=APP_PATH_ROOT.$this->_config->path->mission_documents;
		$this->task_documents_path=APP_PATH_ROOT.$this->_config->path->task_documents;
		//$this->_view->ebookerid = $this->ebookerid = $this->_config->wp->ebookerid;
		$this->_view->ebookerid = $this->ebookerid = $this->configval['ebooker_id'];
		$this->product_array=array(
    							"redaction"=>"Writing",
								"translation"=>"Translation",
								"autre"=>"Other",
								"proofreading"=>"Correction",
								"seo_audit"=>"SEO Audit",
								"smo_audit"=>"SMO Audit",
        						);
		 $this->producttype_array=array(
    							"article_de_blog"=>"Article de blog",
								"descriptif_produit"=>"Desc.Produit",
								"article_seo"=>"Article SEO",
								"guide"=>"Guide",
								"news"=>"News",
								"autre"=>"Others"
        						);
	$this->_view->tempo_duration_array = $this->duration_array=array(
						"days"=>"Days",
						"week"=>"Week",
						"month"=>"Month",
						"year"=>"Year"
					);	
		$this->adminLogin = Zend_Registry::get('adminLogin');
		$this->_view->tempo_duration_array=$this->duration_array=array(
							"days"=>"Days",
							"week"=>"Week",
							"month"=>"Month",
							"year"=>"Year"
						);		
		$this->_view->tempo_array=$this->tempo_array=array(
							"max"=>"Max",
							"fix"=>"Fix"
						);	
		$this->_view->volume_option_array=$this->volume_option_array=array(
							"every"=>"Every",
							"within"=>"Within"
						);	
		$this->_view->user_type= $this->adminLogin->type ;
		$this->_view->userId = $this->adminLogin->userId;
		Zend_Loader::loadClass('Ep_Ebookers_Stencils');
	}
	
	function getCustomName($type,$name)
	{
		$categories_array = $this->_arrayDb->loadArrayv2($type, $this->_lang);
		return $categories_array[$name];
	}
	
	function techAction()
	{
		$request = $this->_request->getParams();
		$id = $request['cmid'];
		
		$contract_obj = new Ep_Quote_Quotecontract();
		$res = $contract_obj->getContractTechMissions(array('cmid'=>$id));
		$client_obj = new Ep_Quote_Client();
		if($res)
		{
			$view = array();
			if($res[0]['title'])
			$view['title'] = $res[0]['title'];
			else
			$view['title'] = 'New Tech Mission';
			if($res[0]['before_prod']=='yes')
			$view['priority'] = 'blocker';
			else
			$view['priority'] = 'non blocker';
		/* 	if($res[0]['from_contract'])
			$view['chargeble'] = 'free';
			else
			$view['chargeble'] = 'chargable';
			$view['percentage'] = '50';
			*/
			if($res[0]['package']=='team')
			$view['turnover'] = $res[0]['turnover']+$res[0]['team_fee']*$res[0]['team_packs'];
			else
			$view['turnover'] = $res[0]['turnover'];
			$view['production_cost'] = $res[0]['cost'];
			$view['contract_name'] = $res[0]['contractname'];
			$view['contract_files'] = $res[0]['contractfilepaths'];
			$view['contract_id'] = $res[0]['quotecontractid'];
			$view['mission_id'] = $res[0]['tmid'];
			$view['contract_date'] = date('d M Y',strtotime($res[0]['expected_launch_date']))." - ".date('d M Y',strtotime($res[0]['expected_end_date']));
			$view['tech_team'] = $res[0]['assigned_to'];
			$view['cm_status'] = $res[0]['cm_status'];
			$userDetails = $client_obj->getQuoteUserDetails($res[0]['assigned_to']);
			$view['tech_name'] = $userDetails[0]['first_name']." ".$userDetails[0]['last_name'];
			$quote_obj = new Ep_Quote_Quotes();
			$quote_details = $quote_obj->getQuoteDetails($res[0]['quoteid']);
			$view['client_id'] = $quote_details[0]['client_id'];
			$view['cname'] = $quote_details[0]['company_name'];
			$view['cano'] = $quote_details[0]['ca_number'];
			$view['client_code'] = $quote_details[0]['client_code'];
			$view['category_name'] = $this->getCategoryName($quote_details[0]['category']);
			$view['cmid'] = $id;
			$userDetails = $client_obj->getQuoteUserDetails($quote_details[0]['created_by']);
			$view['sales_owner'] = $userDetails[0]['first_name']." ".$userDetails[0]['last_name'];
			$view['mailto'] = $userDetails[0]['email'];
			$view['sales_id'] = $quote_details[0]['created_by'];
			$view['telphone'] = $userDetails[0]['phone_number'];
			$view['city'] = $userDetails[0]['city'];
			$view['currency'] =  $res[0]['sales_suggested_currency'];
			$view['assigned'] = $res[0]['assigned_to'];
			$view['quote_signed_at'] = date('d M Y',strtotime($quote_details[0]['signed_at']));
			$view['from_date'] = date('d M Y',strtotime($res[0]['assigned_at']));
			if($res[0]['delivery_option']=='hours')
			$no_days = ceil($res[0]['delivery_time']/24);
			else
			$no_days = $res[0]['delivery_time'];
			
			$view['to_date'] = date('d M Y',strtotime($res[0]['assigned_at']."+ $no_days days"));
		
			$user_obj=new Ep_User_User();
			
			$user_info = $user_obj->getAllUsersDetails($quote_details[0]['created_by']);
				
			if($user_info)
			$quote_details[0]['created_name'] = $user_info[0]['first_name']." ".$user_info[0]['last_name'];
			else
			$quote_details[0]['created_name'] = "";
			$quote_details[0]['created_time'] = time_ago($quote_details[0]['created_at']);
			
			$this->_view->quote_details = $quote_details[0];
			/* Comments */
			$comment = array();
			if($quote_details[0]['sales_comment'])
			{
				$comments['created_by'] = $quote_details[0]['created_by'];
				$comments['created_name'] = $quote_details[0]['created_name'];
				$comments['created_time'] = $quote_details[0]['created_time'];
				$comments['comment'] = $quote_details[0]['sales_comment'];
				$comments['created_at'] = $quote_details[0]['created_at'];
				$comment[] = $comments;
			}
			
			if($res[0]['comments'])
			{
				$comments['comment'] = $res[0]['comments'];
				$comments['created_by'] = $res[0]['created_by'];
				
				$user_info = $user_obj->getAllUsersDetails($res[0]['created_by']);
				
				if($user_info)
				$comments['created_name'] = $user_info[0]['first_name']." ".$user_info[0]['last_name'];
				else
				$comments['created_name'] = "";
				$comments['created_time'] = time_ago($res[0]['created_at']);
				$comments['created_at'] = $res[0]['created_at'];
				$comment[] = $comments;
			}
			
			$contractcomments = array();
			if($res[0]['contractcomment'])
			{
				$comments['comment'] = $res[0]['contractcomment'];
				$comments['created_by'] = $res[0]['sales_creator_id'];
				
				$user_info = $user_obj->getAllUsersDetails($res[0]['sales_creator_id']);
				
				if($user_info)
				$comments['created_name'] = $user_info[0]['first_name']." ".$user_info[0]['last_name'];
				else
				$comments['created_name'] = "";
				$comments['created_time'] = time_ago($res[0]['qctime']);
				$comments['created_at'] = $res[0]['qctime'];
				$comment[] = $comments;
			}
			
			$contractmissioncomments = array();
			if($res[0]['cmcomment'])
			{
				$comments['comment'] = $res[0]['cmcomment'];
				if($res[0]['updated_by'])
				{
					$comments['created_by'] = $res[0]['updated_by'];
					$user_info = $user_obj->getAllUsersDetails($res[0]['updated_by']);
				}
				else
				{
					$comments['created_by'] = $res[0]['assigned_by'];
					$user_info = $user_obj->getAllUsersDetails($res[0]['assigned_by']);
				}
				
				if($user_info)
				$comments['created_name'] = $user_info[0]['first_name']." ".$user_info[0]['last_name'];
				else
				$comments['created_name'] = "";
				$comments['created_time'] = time_ago($res[0]['updated_at']);
				$comments['created_at'] = $res[0]['updated_at'];
				$comment[] = $comments;
			}
			
			//$this->_view->contractmissioncomments = $contractmissioncomments;
			$this->_view->comments = $this->sortTimewise($comment);
			$this->_view->files = "";
			$this->_view->quotefiles = "";
			$files = "";
			$quotefiles = "";
			if($quote_details[0]['documents_path'])
			{
				$exploded_file_paths = explode("|",$quote_details[0]['documents_path']);
				$exploded_file_names = explode("|",$quote_details[0]['documents_name']);
				
				$k=0;
				foreach($exploded_file_paths as $row)
				{
					$file_path=$this->quote_documents_path.$row;
					if(file_exists($file_path) && !is_dir($file_path))
					{
						$fname = $exploded_file_names[$k];
						if($fname=="")
							$fname = basename($row);
						$ofilename = pathinfo($file_path);
						/* <span class="deletequote" rel="'.$k.'_'.$quote_details[0]['identifier'].'"> <i class="icon-adt_trash"></i></span> */
						$quotefiles .= '<tr><td width="30%">'.$fnam