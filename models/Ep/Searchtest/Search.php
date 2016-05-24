<?php
class Ep_Searchtest_Search extends Ep_Db_Identifier{

public function edit_user($uid,$data1,$data2,$data3){

	/*$edituserQuery = "update User set email ='".$userdetails['email']."' where identifier =".$uid;*/
	        $UpdateQuery1 = "update User, UserPlus, Contributor ";
			$UpdateQuery1 .= "set User.email = '".$data1['email']."' ,";
			$UpdateQuery1 .= "UserPlus.first_name= '".$data2['fname']."' ,";
			$UpdateQuery1 .= "UserPlus.last_name= '".$data2['lname']."' ,";
			$UpdateQuery1 .= "UserPlus.address= '".$data2['address']."' ,";
			$UpdateQuery1 .= "UserPlus.city= '".$data2['city']."' ,";
			$UpdateQuery1 .= "UserPlus.state= '".$data2['state']."' ,";
			$UpdateQuery1 .= "UserPlus.zipcode= '".$data2['zipcode']."' ,";
			$UpdateQuery1 .= "UserPlus.phone_number= '".$data2['ph']."' ,";
			$UpdateQuery1 .= "Contributor.dob= '".$data2['dob']."' ,";
			$UpdateQuery1 .= "Contributor.twitter_id= '".$data3['twitter_id']."' ,";
			$UpdateQuery1 .= "Contributor.facebook_id= '".$data3['facebook_id']."',";
			$UpdateQuery1 .= "Contributor.website= '".$data3['website']."' ";
			$UpdateQuery1 .= "where User.identifier = UserPlus.user_id ";
			$UpdateQuery1 .= "and User.identifier = Contributor.user_id ";
			$UpdateQuery1 .= "and User.identifier =".$uid;
		
			$edituserQuery=$this->getQuery($UpdateQuery1,true);
			return $edituserQuery;
			
	//$userUpdateResult = $this->getQuery($edituserQuery,true);
	//$this->_name = "User";
    //$where1 = " identifier='" .$uid. "' ";
	//$result = $this->updateQuery($userdetails, $where1);
	//return true;
}

public function get_profile($id){
	
		    /*$profileQuery = " select User.*, Contributor.* from User join Contributor on User.identifier = Contributor.user_id where  User.identifier='".$id."' ";*/	
	$profileQuery  = "select User.*, Contributor.*, UserPlus.* "; 
	$profileQuery .= "from User ";
	$profileQuery .= "inner join Contributor on User.identifier = Contributor.user_id ";
	$profileQuery .= "inner join UserPlus on User.identifier = UserPlus.user_id ";
	$profileQuery .= "where User.identifier = ".$id;
	$profileresult = $this->getQuery($profileQuery,true);
	return $profileresult[0];
}

public function serachresult_test($conditions){
	//Array ( [controller] => searchtest [action] => check [module] => default [user_type] => Array ( [0] => 1 [1] => 2 [2] => 3 ) [rank] => Array ( [0] => 1 [1] => 2 [2] => 3 ) [lang] => Array ( [0] => uk ) [status] => Array ( [0] => 1 [1] => 2 ) )
	if( in_array('writer',$conditions['user_type'])  ) { 
            $status = ($conditions['rank']) ? 'AND User.`profile_type` IN ( \'' . implode("','", $conditions['rank']) . '\')' : '';
            $condition .= ' '.$status;
        }
		
	if(in_array('corrector',$conditions['user_type'])){
            $status = ($conditions['rank']) ? ' AND User.`profile_type` IN ( \'' . implode("','", $conditions['rank']) . '\')' : '';

            $type2  = "AND type2 IN ('corrector')";
            $condition .= ' '.$status.' '.$type2;
        }
     if(in_array('translator',$conditions['user_type']) ){

            $translator = ($conditions['rank']) ? ' AND Contributor.`translator` = \'yes\' AND Contributor.`translator_type` IN ( \'' . implode("','", $conditions['rank']) . '\')' : '';
            $condition .= ' '.$translator;
        }
		
	$searchQuery  = "select User.*, Contributor.*,UserPlus.* "; 
	$searchQuery .= "from User ";
	$searchQuery .= "join Contributor on User.identifier = Contributor.user_id ";
	$searchQuery .= "join UserPlus on User.identifier = UserPlus.user_id ";
	
	$searchQuery .= "where  User.`type` = 'contributor' ".$condition." ";
	
	$searchResult = $this->getQuery($searchQuery,true);
    return $searchResult;
}
		
public function serachresult($conditions){
    
    	$usertype=$conditions['user_type'];
    	$rank=$conditions['rank'];
   	 	$lan=$conditions['lang'];
    	$status=$conditions['status'];
    
    $searchQuery  = "select User.*, Contributor.*,UserPlus.* "; 
	$searchQuery .= "from User ";
	$searchQuery .= "join Contributor on User.identifier = Contributor.user_id ";
	$searchQuery .= "join UserPlus on User.identifier = UserPlus.user_id ";
	
	$searchQuery .= "where ";
	
		foreach($usertype as $datauser)
    	{
        	if($datauser == 'writer') {$searchQuery .= "User.type ='contributor' ";
		                    $writer="TRUE";
			}
        	if($datauser == 'corrector') {
				if($writer=="TRUE"){
				$searchQuery .= "OR User.type2 ='corrector' ";
				}
				else{$searchQuery .= "User.type2 ='corrector' ";
			    $corrector="TRUE";
				}
			}
        	if($datauser == 'translator') {
				if($writer=="TRUE" || $corrector=="TRUE"){
				$searchQuery .= "OR Contributor.translator ='yes' ";
				}
				else{
				$searchQuery .= "Contributor.translator ='yes' ";
				}
			}
		}

		foreach($rank as $datarank)
    	{
        	if($datarank == 'senior') {$searchQuery .= "AND User.profile_type='senior' ";
			                     $senior="TRUE";}
        	if($datauser == 'junior') {
				if($senior="TRUE"){
				$searchQuery .= "OR User.profile_type = 'junior' ";
				}
				else{
				$searchQuery .= "AND User.profile_type = 'junior' ";
				$junior="TRUE";
				}
			}
       		if($datauser == 3) {
				if($senior="TRUE" || $junior="TRUE"){
				$searchQuery .= "OR User.profile_type = 'sub-junior' ";
				}
				else{
					$searchQuery .= "AND User.profile_type = 'sub-junior' ";
				}
			}
		}
	
	/*foreach($lan as $datalan)
    {
        if($datarank == 1) {$searchQuery .= "OR User.type='contributor' ";}
        if($datauser == 2) {$searchQuery .= "OR User.type2 = 'corrector' ";}
        if($datauser == 3) {$searchQuery .= "where Contributor.translator = 'yes' ";}

    }*/
	
	foreach($status as $datastatus)
    {
        if($datarank == 1) {$searchQuery .= "AND User.status='Active' ";
		                    $active="TRUE";
		}
        if($datauser == 2) {
			if($active="TRUE"){
			$searchQuery .= "OR User.status = 'Inactive' ";
			}
			else{
			$searchQuery .= "AND User.status = 'Inactive' ";
			}
		}
    }
	//echo $searchQuery;
	//exit;
    $searchResult = $this->getQuery($searchQuery,true);
    return $searchResult;

	
}


public function get_customers($id){
	
	/*$customerQuery  = "select User.*,Delivery.user_id "; 
	$customerQuery .= "from User ";
	$customerQuery .= "inner join Participation on User.identifier = Participation.user_id ";
	$customerQuery .= "inner join Article on Participation.article_id = Article.id ";
	$customerQuery .= "inner join Delivery on Article.delivery_id = Delivery.id ";
	$customerQuery .= "where User.identifier = ".$id;
	$customerQuery .= "group by User.identifier ";
	$customerresult = $this->getQuery($customerQuery,true);
	return $customerresult;*/
	        $customerQuery = "select Client.user_id,Client.company_name from User ";
			$customerQuery .= "inner join Client on User.identifier = Client.user_id ";
			$customerQuery .= "inner join Delivery on User.identifier = Delivery.user_id ";
			$customerQuery .= "inner join Article on Delivery.id =  Article.delivery_id ";
			$customerQuery .= "inner join Participation on Article.id = Participation.article_id ";
			$customerQuery .= "where Participation.user_id = ".$id." ";
			$customerQuery .= "group by User.identifier ";
			$customerresult = $this->getQuery($customerQuery,true);
			return $customerresult;
}

public function get_articlerticles($wid,$cid){
	//cid=145932458349449&wid=145932113941406
	$query = "SELECT * FROM ArticleProcess
                    WHERE participate_id
                    IN (
                        SELECT Participation.id
                        FROM Delivery
                        INNER JOIN Article ON Article.delivery_id = Delivery.id
                        INNER JOIN Participation ON Participation.article_id = Article.id
                        WHERE Participation.status = 'published'
                        AND Participation.current_stage = 'client'
                        AND Participation.user_id = '".$wid."'
                        AND Delivery.user_id = '".$cid."'
                    )
                 
                    AND STATUS = 'approved'
                    ORDER BY ArticleProcess.article_sent_at DESC
                    LIMIT 0 , 3";


        $result = $this->getQuery($query, true);
        return $result;
        //AND stage = 's2'
   
}

public function quote_test($row_min,$row_max,$search_conditions,$search_name){
	
	 $status = ($search_conditions) ? 'AND Q.sales_review IN ( \'' . implode("','", $search_conditions) . '\')' : '';
	 $condition .= ' '.$status;
	 
	 if($search_name){
		 $condition .= "AND (C.company_name LIKE '%".$search_name."%' OR Q.title LIKE '%".$search_name."%') ";
	 }
	 
	 $quoteListQuery = "SELECT C.company_name AS Client,Q.category as Category,Q.title as QuoteTitle, Q.created_at as DateOfCreation,
	                    U.first_name as CreatedBy,Q.sales_review as Status,Q.final_turnover as Turnover,Q.sales_suggested_currency as Currency
			            FROM Quotes AS Q
						INNER JOIN UserPlus AS U on Q.created_by = U.user_id 
			            INNER JOIN Client AS C on Q.client_id = C.user_id
						WHERE  Q.is_new_quote = 1 ".$condition." 
						  
						ORDER BY Q.created_at DESC
						LIMIT ".$row_min.",".$row_max;
						
			$quoteListResult = $this->getQuery($quoteListQuery,true);
			return $quoteListResult;
}

}
?>