<?php
class SearchtestController extends Ep_Controller_Action
{
public function init(){
		
		parent::init();
        $this->_view->lang = $this->_lang;
        $this->adminLogin  = Zend_Registry::get('adminLogin');
        $this->sid         = session_id();
        $this->configval=$this->getConfiguredval(); 		
        
        $ep_lang_array = $this->_arrayDb->loadArrayv2("EP_LANGUAGES", $this->_lang);
		$this->_view->ep_lang=$ep_lang_array;
}

public function checkAction(){
		
		if($_POST) {
	
        	$stObj=new Ep_Searchtest_Search();
			//$result=$stObj->serachresult($this->_request->getParams());
			$result=$stObj->serachresult_test($this->_request->getParams());
        
			$this->_view->searchResult=$result;
			$this->_view->searchResult_count=count($result);
        	$this->_view->render("searchresult_view");
        }
        else{
        	$this->_view->render("searchtest_view");
    	}
}

public function profiledetailsAction(){
	 
		$stObj=new Ep_Searchtest_Search();
		$profile=$stObj->get_profile($this->_request->getParam('id'));
			
			$dob = $profile['dob'];
			$newdob = date("m/d/Y", strtotime($dob));
			$this->_view->profile_details=$profile;
			$this->_view->dob_edit=$newdob;
        	$this->_view->render("profile_edit");
}

public function profileeditAction(){
	    
		 $uid=$_REQUEST['user_id'];
		 $new_dob= $_REQUEST['dateofbirth'];
		 $dob= date("Y/m/d", strtotime($new_dob));
		 $userdetails  =   array(
		                    'email'	        => $_REQUEST['user_email']
							);
							
		$userplusdetails  =   array(
		                    'fname'	   => $_REQUEST['fname'],
							'lname'	   => $_REQUEST['user_lname'],
							'address'  => $_REQUEST['user_address'],
							'city'	   => $_REQUEST['user_city'],
		 				    'state'    => $_REQUEST['user_state'],
							'zipcode'  => $_REQUEST['user_zipcode'],
							'ph'       => $_REQUEST['user_ph'],
							'dob'      => $dob);						
						
		 $contributordetails  =   array(
							'twitter_id'	=> $_REQUEST['twiter'],
							'facebook_id'	=> $_REQUEST['facebook'],
		 				    'website'       => $_REQUEST['website']);
												
		$stObj=new Ep_Searchtest_Search();
		$us_details=$stObj->edit_user($uid,$userdetails,$userplusdetails,$contributordetails);
} 

public function profileviewAction(){
	
	$stObj=new Ep_Searchtest_Search();
	$profiledata=$stObj->get_profile($this->_request->getParam('id'));
	$customerdata=$stObj->get_customers($this->_request->getParam('id'));
	//for ($i= 0; $i < count($customerdata); $i++) {
		//print_r($customerdata[$i]['user_id']);
	//}exit;
	//echo "<pre>";print_r($customerdata);exit;
		//$this->_view->profile=$profile_details;
        //$this->_view->render("profile_view");
		
		$pd= '<table class="table table-bordered table-striped table_vam tdleftalign">';
		$pd.= '<tr><td>ID</td><td>'.$profiledata['identifier'].'</td></tr>';
		$pd.= '<tr><td>Email Address</td><td>'.$profiledata['email'].'</td></tr>';
		$pd.= '<tr><td>First Name</td><td>'.$profiledata['first_name'].'</td></tr>';
		$pd.= '<tr><td>Last Name</td><td>'.$profiledata['last_name'].'</td></tr>';
		$pd.= '<tr><td>Address</td><td>'.$profiledata['address'].'</td></tr>';
		$pd.= '<tr><td>City</td><td>'.$profiledata['city'].'</td></tr>';
		$pd.= '<tr><td>State</td><td>'.$profiledata['state'].'</td></tr>';
		$pd.= '<tr><td>Zipcode</td><td>'.$profiledata['zipcode'].'</td></tr>';
		$pd.= '<tr><td>Phone Number</td><td>'.$profiledata['phone_number'].'</td></tr>';
		$pd.= '<tr><td>DOB</td><td>'.$profiledata['dob'].'</td></tr>';
		$pd.= '<tr><td>Twitter Id</td><td>'.$profiledata['twitter_id'].'</td></tr>';
		$pd.= '<tr><td>Facebook Id</td><td>'.$profiledata['facebook_id'].'</td></tr>';
		$pd.= '<tr><td>Website</td><td>'.$profiledata['website'].'</td></tr>';
		//$pd.= '<tr><td>Customers</td><td>'.$customerdata['user_id'].'</td></tr>';
		/*$pd.= '<tr><td>Customers</td><td><a href="#"  onclick="return fileZip('.$profiledata['identifier'].', \''.$customerdata['user_id'].'\');" >'.$customerdata['user_id'].'</a></td></tr>';*/
		$pd.= '<tr><td>Customers</td><td>';
		 for ($i= 0; $i < count($customerdata); $i++) {
		
		$pd.='<a href="/searchtest/articledownload?cid='.$customerdata[$i]['user_id'].'&wid='.$profiledata['identifier'].'">'.$customerdata[$i]['company_name'].',</a>';
		}
		$pd.='</td></tr>';
		$pd.= '</table>';		
		echo $pd;
}


public function articledownloadAction(){
	
	$wid=$this->_request->getParam('wid');
	$cid=$this->_request->getParam('cid');
	$fzobj = new Ep_Searchtest_Search();
    $result = $fzobj->get_articlerticles($wid,$cid);
	
	if($result){
            $file_array = array();
            for ($i= 0; $i < count($result); $i++) {
                    $file_array[] = FO_ARTICLE.$result[$i]['article_path'];
            }
			 //print_r($file_array);
            
			$downloadfilename = ASSETS.'article_zip/latest_articles.zip';
            $zip = $this->create_zip($file_array, $downloadfilename);
			
            if($zip) { 
               $this->_redirect("/BO/download-files.php?function=downloadarticlezip&fullPath=$downloadfilename");
            }
        }
        else{
            echo "No Files";
        }

    }
  
    public function create_zip($files = array(), $destination = '', $overwrite = true)
    {
	
        if (file_exists($destination) && !$overwrite) {
            return false;
        }

        $valid_files = array();

        if (is_array($files)) {
		
            foreach ($files as $file) {


                if (file_exists($file)) {
                    $valid_files[] = $file;	
                }
            }

        }

        if (count($valid_files)) {
            $zip = new ZipArchive();
            if ($zip->open($destination, $overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
            }

            foreach ($valid_files as $file) {
			
                $zip->addFile($file, basename($file));
            }

            $zip->close();
			
            return file_exists($destination);
        } else {
            return false;
        }
    }
	
public function quoteAction(){
	       
			$quote_type=array("briefing"=>"Briefing","not_done"=>"Ongoing","validated"=>"Sent","signed"=>"Signed","closed"=>"Closed","deleted"=>"Deleted");
			$this->_view->quoteType=$quote_type;
        	$this->_view->render("quote_view");
}

public function loadquoteAction(){
	
	$table_fields=$this->_request->getParam('count');
	$search_status=$this->_request->getParam('status');
	$search_name=$this->_request->getParam('name');
	
	    if($table_fields){$table_row=$table_fields;}
		else{$table_row=0;}
		
		if($search_status){$search_conditions=$search_status; print_r($search_conditions);}
		else{$search_conditions=array("0"=>"briefing","1"=>"not_done","2"=>"validated","3"=>"signed","4"=>"closed","5"=>"deleted");}
			
			$row_min=$table_row;
			$row_max=$table_row+20;
			$quotelimitObj=new Ep_Searchtest_Search();
			$result=$quotelimitObj->quote_test($row_min,$row_max,$search_conditions,$search_name);
			$this->_view->quoteResult=$result;
			
			$quote_type=array("briefing"=>"Briefing","not_done"=>"Ongoing","validated"=>"Sent","signed"=>"Signed","closed"=>"Closed","deleted"=>"Deleted");
			$this->_view->row_min=$row_min;
			$this->_view->quoteType=$quote_type;
			
			$this->_view->render("quote_action");
	
}

}
?>