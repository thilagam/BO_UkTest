<?php
/**
 * Registration Model
 * This Model  is responsible for Registration actions*
 * @author Arun
 * @editor Arun
 * @version 1.0
 */
class EP_Participation_Participation extends Ep_Db_Identifier
{
    protected $_name = 'Participation';
    private $id;
    private $article_id;
    private $watchlist_id;
    private $user_id;
    private $price_user;
    private $status ;
    private $created_at;
    private $updated_at;


    public function loadData($array)
    {
        //$this->id=$array["id"] ;
        return $this;
    }
    public function loadintoArray()
    {
        $array = array();
        //$array["identifier"] = $this->getIdentifier();
        return $array;
    }
    public function __set($name, $value) {
            $this->$name = $value;
    }
    public function __get($name){
            return $this->$name;
    }
    /////////get aritcle and participation deatails w.r.t participation id  ///////////////////////////
    public function stage0PartArtProcDetails()
    {
        /*
        $query = "select p.id as partId,p.article_id,p.user_id, ap.article_path, ap.article_name, a.correction FROM ".$this->_name." p
                            INNER JOIN Article a  ON a.id=p.article_id
                            LEFT JOIN ArticleProcess ap  ON ap.participate_id=p.id
                            WHERE p.current_stage='stage0' AND p.status IN ('plag_exec') GROUP BY p.id
                            ORDER BY ap.version DESC " ; //, 'under_study'*/
       
                    
        $query = "select p.id as partId,p.article_id,p.user_id, ap.id AS apId, ap.article_path, ap.article_name, ap.plag_stuck, a.title, a.correction,ap.version, d.id as delId, d.title as delName,a.correction_jc_resubmission,a.correction_sc_resubmission, a.correction_participationexpires FROM ".$this->_name." p
                    INNER JOIN Article a  ON a.id=p.article_id
                    INNER JOIN Delivery d  ON d.id=a.delivery_id
                    INNER JOIN ArticleProcess ap  ON ap.participate_id=p.id
                    WHERE p.current_stage='stage0' AND p.status IN ('plag_exec') AND ap.version IN(SELECT MAX(version) FROM ArticleProcess WHERE participate_id= p.id)
                    ORDER BY RAND()
                    " ; //, 'under_study'
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get aritcleprocess deatails w.r.t participation id  ///////////////////////////
    public function s0CorrectionArtProcDetails($partId)
    {
        $query = "select p.id as partId,p.article_id,p.user_id, ap.id AS apId, ap.article_path, ap.article_name, a.title, a.correction, a.column_xls, d.urlsexcluded, d.id as delId, d.title as delName,a.correction_jc_resubmission,a.correction_sc_resubmission, a.correction_participationexpires FROM ".$this->_name." p
                   INNER JOIN Article a  ON a.id=p.article_id
                   INNER JOIN Delivery d  ON d.id=a.delivery_id
                   LEFT JOIN ArticleProcess ap  ON ap.participate_id=p.id
                   WHERE p.id = ".$partId." AND p.current_stage='stage0' AND p.status IN ('plag_exec', 'under_study') AND ap.version=(select max(version) FROM ArticleProcess WHERE participate_id=".$partId.")";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all records of writers profile ///////////////////////////
    public function profilesList($params)
    {   $condition = '';
        if($params['search'] == 'search')
        {
            if($params['startdate'] !='' && $params['enddate']!='')
            {
                 $start_date = str_replace('/','-',$params['startdate']);
                 $end_date = str_replace('/','-',$params['enddate']);
                 $start_date = date('Y-m-d', strtotime($start_date));
                 $end_date = date('Y-m-d', strtotime($end_date));
                 $condition.= " AND d.created_at BETWEEN '".$start_date."' AND DATE_ADD('".$end_date."', INTERVAL 1 DAY)";
            }
            if($params['aoId'])
            {
                $condition.= " AND d.id =".$params['aoId']."";
            }
            if($params['inchargeId'])
            {
                $condition.= " AND d.created_user =".$params['inchargeId']."";
            }
            if($params['clientId'])
            {
                $condition.= " AND d.user_id =".$params['clientId']."";
            }
            /*if($params['closed']!='0')
            {
                if($params['closed'] != 'all')
                    $condition.= " AND d.id IN (".$params['searchaosarray'].")";
                else
                    $condition.= " ";
            }*/
        }
        if($params['loginUserType'] != 'superadmin')
        {
            if($params['profilelist'] == 'own')
            {
                $condition.= " AND d.created_user='".$params['loginUserId']."'";
            }
        }else{
            $condition.= '';
        }

            /*$query = "select d.id, a.id as artid, count(a.title) AS artCount, a.category, a.bo_closed_status, a.price_bo, a.type, a.nbwords,
                a.sign_type, a.price_min, a.price_max, a.contrib_percentage, a.participation_expires, a.contrib_price, d.created_at,
                d.title AS deliveryTitle, d.AOtype, u.email, c.company_name, up.first_name as incharge, u.created_at AS doj FROM Delivery d
                INNER JOIN Article a ON a.delivery_id=d.id
                INNER JOIN User u ON u.identifier=d.user_id
                LEFT JOIN Client c ON c.user_id=u.identifier
                LEFT JOIN UserPlus up ON up.user_id = d.created_user
                WHERE d.premium_option != '0' ".$condition." GROUP BY d.id ORDER BY d.created_at DESC";*/
                
             $query = "SELECT d.id, a.id as artid, count(a.id) AS artCount, a.category, a.bo_closed_status, a.price_bo, a.type, a.nbwords,
                            a.sign_type, a.price_min, a.price_max, a.contrib_percentage, a.participation_expires, a.contrib_price, d.created_at,
                            d.title AS deliveryTitle, d.AOtype, u.email, c.company_name, u.created_at AS doj,
                            (SELECT login FROM User u1 where u1.identifier=IF(d.created_by='BO',d.created_user,d.user_id))as incharge
                    FROM Delivery d
                INNER JOIN Article a ON a.delivery_id=d.id
                INNER JOIN User u ON u.identifier=d.user_id
                LEFT JOIN Client c ON c.user_id=u.identifier                
                WHERE d.premium_option != '0' ".$condition." AND ".$this->visibility." GROUP BY d.id ORDER BY d.created_at DESC";
            
           // echo $query;exit;
                
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all articles which profile are selected ///////////////////////////
    public function getAffectedArticles($delId)
    {
        $query = "SELECT count(DISTINCT a.id) AS affectedart FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            INNER JOIN Participation p ON p.article_id=a.id
            WHERE p.status  IN ('bid', 'under_study','published','plag_exec', 'disapproved', 'disapproved_temp', 'disapproved_client' ) AND p.cycle = 0 AND d.id='".$delId."'";
        //echo $query;exit;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    
    //get Affected articles w.r.t all AO's
    public function getAllAffectedArticles()
    {
        $query = "SELECT d.id,count(DISTINCT a.id) AS affectedart FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            INNER JOIN Participation p ON p.article_id=a.id
            WHERE p.status  IN ('bid', 'under_study','published','plag_exec', 'disapproved', 'disapproved_temp', 'disapproved_client' ) AND p.cycle = 0
            Group By d.id
            ";
        //echo $query;exit;
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            foreach($result as $delivery)
            {
                $affecte[$delivery['id']]=$delivery['affectedart'];
            }
            return $affecte;
        }            
        else
            return "NO";
    }
    
    /////////get all articles which profile are not selected or article not with profiles//////////////////
    public function getNotAffectedArticles($delId)
    {
        /*$query = "SELECT count( DISTINCT a.id) AS notaffectedart FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            LEFT JOIN Participation p ON p.article_id=a.id
            WHERE  p.cycle != 0 AND a.id NOT in (select article_id from Participation where cycle=0 ) AND d.id='".$delId."'";
        //echo $query;exit;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";*/
       $query1 = "SELECT count(DISTINCT a.id) AS firstcount FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            LEFT JOIN Participation p ON p.article_id=a.id
            WHERE  p.status IN ('closed', 'bid_refused') AND d.id='".$delId."'";
       $result1 = $this->getQuery($query1,true);
       $query2 = "SELECT count(DISTINCT a.id) AS secondcount FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            LEFT JOIN Participation p ON p.article_id=a.id
            WHERE d.id='".$delId."' AND a.id NOT IN (SELECT article_id FROM Participation)";
        $result2 = $this->getQuery($query2,true);
        $query3 = "SELECT count(DISTINCT a.id) AS thirdcount FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            LEFT JOIN Participation p ON p.article_id=a.id
            WHERE  p.status IN ('bid_premium', 'bid_temp','bid', 'under_study','published','plag_exec', 'disapproved', 'disapproved_temp', 'disapproved_client') AND p.cycle = 0 AND d.id='".$delId."'";
        $result3 = $this->getQuery($query3,true);
        if($result1[0]['firstcount']+$result2[0]['secondcount'] > $result3[0]['thirdcount'])
           $result4 = $result1[0]['firstcount']+$result2[0]['secondcount']-$result3[0]['thirdcount'];
        else
            $result4 = $result1[0]['firstcount']+$result2[0]['secondcount'];
        if($result4 != 0)
            return $result4;
        else
            return 0;
    }
    /////////get all articles which are ongoing///////////////////////////
    public function getBidEncoursArticles($delId)
    {
        $query = "SELECT count(DISTINCT a.id) AS bidencours FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            INNER JOIN Participation p ON p.article_id=a.id
            WHERE p.status IN ('bid_premium', 'bid_temp') AND p.cycle = 0 AND d.id='".$delId."'";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all articles which are ongoing///////////////////////////
    public function getAllBidEncoursArticles()
    {
        $query = "SELECT d.id,count(DISTINCT a.id) AS bidencours FROM Delivery d
            INNER JOIN Article a ON a.delivery_id=d.id
            INNER JOIN Participation p ON p.article_id=a.id
            WHERE p.status IN ('bid_premium', 'bid_temp') AND p.cycle = 0
            Group By d.id
            ";
       if(($result = $this->getQuery($query,true)) != NULL)
        {
            foreach($result as $delivery)
            {
                $bid_encours[$delivery['id']]=$delivery['bidencours'];
            }
            return $bid_encours;
        }            
        else
            return "NO";
    }
    /////////get all records of rest of detials fot writers profile ///////////////////////////
    public function articleProfiles($artId)
    {
        /*$query = "select  p.*, u.email, u.profile_type, up.first_name, up.last_name, count(p.user_id) AS cycle0UserCount, u.identifier,max(p.cycle) +1 AS step  FROM ".$this->_name." p
                  INNER JOIN User u ON u.identifier=p.user_id
                  LEFT JOIN UserPlus up ON up.user_id=p.user_id
                  WHERE p.article_id = ".$artId." AND p.cycle='0' ";*/
        $status_array="'bid', 'under_study', 'disapproved', 'published', 'bid_refused'";
        $query = "select  p.*, u.email, u.profile_type, up.first_name, up.last_name,
                   (select count(p1.id) FROM Participation p1 Where p1.cycle=0 and p1.article_id=p.article_id) as cycle0UserCount
                  FROM ".$this->_name." p
                  INNER JOIN User u ON u.identifier=p.user_id
                  LEFT JOIN UserPlus up ON up.user_id=p.user_id
                  WHERE p.article_id = '".$artId."' AND p.cycle='0'
                  ORDER BY IF(p.updated_at!='',p.updated_at,p.created_at) DESC, FIELD(p.status,$status_array)
                   ";
        //echo $query;exit;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    ////////getting marks of contributor given by corrector in correction article///////////////
    public function getContributorMarks($userId)
    {
           $query = "SELECT ap.marks FROM ".$this->_name." p
                 LEFT JOIN ArticleProcess ap ON p.id=ap.participate_id WHERE ap.stage = 'corrector' AND p.user_id='".$userId."'";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
             $marks = 0; $count = 0;
             foreach($result as $markslist)
             {
                 if($markslist['marks'] != NULL)
                 {
                     $marks+= $markslist['marks'];
                     $count++;
                 }
             }
            if($marks != '0')
                return  round($marks/$count, 2);
            else
                return 0;
        }
        else
            return 0;
    }
    ////////getting marks of contributor given by the EP user IN BO///////////////
    public function getEpContributorMarks($userId)
    {
         $query = "SELECT ap.marks FROM ".$this->_name." p
                 LEFT JOIN ArticleProcess ap ON p.id=ap.participate_id WHERE ap.stage != 'corrector' AND p.user_id='".$userId."'";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            $marks = 0; $count = 0;
            foreach($result as $markslist)
            {
                if($markslist['marks'] != NULL)
                {
                    $marks+= $markslist['marks'];
                    $count++;
                }
            }
            if($marks != '0')
                return  round($marks/$count, 2);
            else
                return 0;
        }
        else
            return 0;
    }
    /////////get all paritcipated users ids in article who involved in bidding///////////////////////////
    public function  getGroupParticipants($artId)
    {
        $query = "select user_id, id  FROM ".$this->_name." WHERE article_id=".$artId." ORDER BY FIELD(status, 'bid','under_study','validated','published','bid_temp','bid_refused_temp','disapproved','bid_refused','closed','on_hold')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all paritcipated users count in article for some stages///////////////////////////
    public function  getPartsCount($artId)
    {
        $query = "(select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status='bid')
                UNION ALL
                       (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status='bid_refused')
                UNION ALL
                       (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status='bid_premium')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all paritcipated users count in article///////////////////////////
    public function  getUserCountInArticle($artId)
    {
       $query = "select count(id) AS userCount  FROM ".$this->_name." WHERE article_id=".$artId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates in article at any status///////////////////////////
    public function getAllPartsStatusOfArt($artId)
    {
        // $query = "select status FROM ".$this->_name." WHERE article_id=".$artId."";
        $status_array="'bid', 'under_study', 'disapproved', 'published', 'bid_refused'";
       $query = "select p.status, p.updated_at, u.identifier, u.profile_type, u.email, up.first_name, up.last_name, p.current_stage,c.translator_type FROM ".$this->_name." p
            INNER JOIN User u ON u.identifier=p.user_id
            LEFT JOIN UserPlus up ON up.user_id=u.identifier 
			LEFT JOIN Contributor c ON u.identifier=c.user_id WHERE p.article_id='".$artId."' AND p.cycle=0
            ORDER BY IF(p.updated_at!='',p.updated_at,p.created_at) DESC, FIELD(p.status,$status_array)";
       //echo $query; exit;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
           return "NO";
    }
    /////////geting the participate id all participates in article for stage0 from plag cron///////////////////////////
    public function getParticipationsIdStage0($artId, $userId)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND user_id=".$userId." AND current_stage='stage0' AND status IN ('under_study', 'plag_exec')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /*get refused count of a article**/
    public function getRefusedPartsCount($artId)
    {
        $query = "select count(id) AS refused_count  FROM ".$this->_name." WHERE article_id='".$artId."' AND status IN ('bid_refused')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result[0]['refused_count'];
        else
            return 0;
    }
    /*get refused count of a article**/
    public function getRefusedParts($artId)
    {
        $query = "select count(id) AS refused_count  FROM ".$this->_name." WHERE article_id='".$artId."' AND status IN ('bid_refused')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result[0]['refused_count'];
        else
            return 0;
    }
    /////////get list of contributor who going to be get refused mail ///////////////////////////
    public function getToBeRefusedParticipants($artId)
    {
        $query = "select count(id) AS refusedcount  FROM ".$this->_name." WHERE article_id='".$artId."' AND cycle=0 AND status IN ('bid_premium', 'bid_temp', 'bid','disapproved', 'time_out')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result[0]['refusedcount'];
        else
            return "NO";
    }
    /////////finding the any contirbutor validiate in selection profiles//////////////////////////
    public function anyValidatedContributor($artId)
    {
        $query = "select article_id  FROM ".$this->_name." WHERE article_id='".$artId."' AND cycle='0' AND status IN ('bid', 'plag_exec', 'under_study','disapproved', 'published', 'closed')";
        if(($result = $this->getQuery($query,true)) != NULL)
           return $result;
        else
           return "NO";
    }
     /////////checking for articles to go back again to publesh from Fo///////////////////////////
    public function getArticlesBackToFo($artId)
    {
       $query = "select article_id  FROM ".$this->_name." WHERE article_id='".$artId."' AND cycle='0' AND current_stage='contributor' AND (status IN ('bid_premium','under_study','disapproved','published','time_out'))";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
     /////////get all cycles count to know how many time the article got permanently refused in all stage///////////////////////////
    public function getParticipationCycles($artId)
    {
        $query = "select max(cycle) as cycle  FROM ".$this->_name." WHERE article_id=".$artId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all cycles count to know how many time the article got permanently refused in all stage///////////////////////////
    public function findAnyCycleZero($artId)
    {
        $query = "select cycle FROM ".$this->_name." WHERE cycle=0 AND article_id=".$artId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
     /////////get all cycles count to know how many time the article got permanently refused in all stage///////////////////////////
    public function getParticipationCyclesOnPartId($partId)
    {
         $query = "select cycle  FROM ".$this->_name." WHERE id=".$partId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get aritcle and participation deatails w.r.t participation id  ///////////////////////////
    public function getParticipateDetails($partId)
    {
          $query = "select p.id as participateId,p.article_id,p.user_id,p.price_user,p.updated_at,a.title, a.category, a.currency,
                d.submitdate_bo, a.price_bo, a.type, a.nbwords,a.sign_type, d.id AS deliveryId, d.title AS deliveryTitle,
                d.created_at, a.jc0_resubmission, a.jc_resubmission, a.sc_resubmission, d.user_id as clientId,d.deli_anonymous,p.* from ".$this->_name." p
                   INNER JOIN Article a  ON a.id=p.article_id
                   INNER JOIN Delivery d ON a.delivery_id=d.id WHERE p.id=".$partId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////checking for accepted and undergoing participants///////////////////////////
    public function getAcceptedParticipant($artId)
    {
        $query = "select id, user_id FROM ".$this->_name." WHERE article_id='".$artId."' AND cycle=0 AND status IN ('bid', 'disapproved', 'time_out','under_study')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////checking for just participated participants///////////////////////////
    public function getNewParticipants($artId)
    {
        $query = "select id, user_id FROM ".$this->_name." WHERE article_id='".$artId."' AND cycle=0 AND status IN ('bid_premium', 'bid_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    ////////////udate the Participation table//////////////////////
    public function updateParticipation($data,$query)
    {
        //echo $query;
        //print_r($data);
        $data['updated_at']=date("Y-m-d H:i:s", time());
       $this->updateQuery($data,$query);
    }
    /////////checking for last paricipation when it is refused the article will be sent back to FO again to publish from Fo///////////////////////////
    public function getlastArticlesBackToFo($artId)
    {
        $query = "select count(id) AS lastpartcount  FROM ".$this->_name." WHERE article_id='".$artId."' AND status IN ('bid','bid_premium','bid_nonpremium','under_study','disapproved','published','time_out','bid_temp','bid_refused_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////checking for last paricipation and get the detials for the republish in article profile to display refuse mail popup //////////////////////////
    public function getDetailsForRepublish($artId)
    {
        $query = "select id, article_id, user_id, status, current_stage FROM ".$this->_name." WHERE article_id='".$artId."' AND status IN ('bid','bid_premium','bid_nonpremium','under_study','disapproved','published','time_out','bid_temp','bid_refused_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get refused contributors when one of them got selected in selection profile after the bid///////////////////////////
    public function getRefusedContributors($artId)
    {
        $query = "select id, user_id  FROM ".$this->_name." WHERE article_id='".$artId."' AND current_stage='contributor' AND status IN ('bid_refused', 'bid_premium', 'bid_temp', 'bid_refused_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
     /////////get all participated users to send mails///////////////////////////
    public function getParticipationsUserIds($artId)
    {
         $query = "select p.user_id, u.profile_type  FROM ".$this->_name." p  INNER JOIN User u ON p.user_id=u.identifier WHERE p.article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all paritcipated users count in article for all stage///////////////////////////
    public function  getCountOnStatus($contribId)
    {
         $query = "select count(id) AS partscount  FROM ".$this->_name." WHERE user_id=".$contribId." AND status IN ('bid_premium', 'bid', 'bid_nonpremium', 'disapproved')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates in article for stages///////////////////////////
    public function getAllParticipationsStage($artId, $stage)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='".$stage."' AND status IN ('plag_exec','under_study')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates in article for stages///////////////////////////
    public function getAllParticipationsModeration($artId)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='corrector' AND status IN ('disapproved_temp','closed_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all details for the client rejected arts///////////////////////////
    public function getAllClientRejectedArts($artId)
    {
        $query = "select id,refusecomment FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage = 'client' AND status IN ('closed_client_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get refused participates count in article for all stage///////////////////////////
    public function  getRefusedCount($partId)
    {
        $query = "select refused_count  FROM ".$this->_name." WHERE id=".$partId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all paritcipated users count in article for all stage///////////////////////////
    public function  getContribCount($artId, $stage)
    {
        $query = "select count(user_id) AS contribcount  FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='$stage' AND status IN ('under_study', 'plag_exec')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
     /////////get all paritcipated users count in article for all stage///////////////////////////
    public function  getMaxCycle($artId)
    {
        $query = "select max(cycle) AS maxcycle  FROM ".$this->_name." WHERE article_id=".$artId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all paritcipated users count in article for all stage///////////////////////////
    public function  getToolTipDetails($artId)
    {
        $query = "(select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='stage1' AND status='under_study')
                UNION ALL
                       (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='stage2' AND status='under_study')
                UNION ALL
                       (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status='bid')
                UNION ALL
                        (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status='disapproved')
                UNION ALL
                        (select count(id) AS partcount  FROM ".$this->_name." WHERE article_id=".$artId." AND status NOT IN('bid_premium', 'bid_refused'))";
        $query = "select count(a.id) AS stageCount from Article a INNER JOIN Delivery d ON d.id=a.delivery_id
                INNER JOIN Participation p ON p.article_id=a.id WHERE d.id='".$aoId."' AND p.status IN ('under_study', 'plag_exec') AND p.cycle=0 AND p.current_stage='".$stage."'";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    public function getNotClosedSelectProfiles($aoId)
    {
        $query1 = "select a.id AS artId, d.total_article FROM Delivery d
                    LEFT JOIN Article a ON a.delivery_id=d.id  Where d.id=".$aoId;
        $result1 = $this->getQuery($query1,true);
        if(count($result1) != ''){
            for($i=0; $i<count($result1); $i++)
            {
               if($result1[$i]['artId'] != '') {
                 $query2 = "select id  FROM ".$this->_name." WHERE status IN ('published', 'closed') AND cycle=0 AND article_id=".$result1[$i]['artId'];
                   $result2 = $this->getQuery($query2,true);
                   if($result2 != "")
                      $resarr[$i] = $result2[0]['id'];
                   else
                      $resarr[$i] = '';
                }
            }
        }
        $arrfinal = count(array_filter($resarr));
        if($result1[0]['total_article'] == $arrfinal)
            return "yes"; ///means closed
        else
            return  "NO"; ///means not closed
    }
    /////////get count of article not been processed ///////////////////////////
    public function getCountOfNotProcessed($aoId)
    {
        $query1 = "select a.id AS artId, d.total_article FROM Delivery d
                    LEFT JOIN Article a ON a.delivery_id=d.id  Where d.id=".$aoId;
        $result1 = $this->getQuery($query1,true);
        if(count($result1) != ''){
            for($i=0; $i<count($result1); $i++)
            {
                if($result1[$i]['artId'] != '') {
                    $query2 = "select p.id  FROM ".$this->_name." p INNER JOIN ArticleProcess ap  ON ap.participate_id=p.id
                    WHERE p.current_stage='stage0' AND p.cycle=0 AND p.status IN ('plag_exec') AND ap.version IN (SELECT MAX(version) FROM ArticleProcess WHERE participate_id= p.id)
                    AND ap.plag_percent is NULL AND article_id=".$result1[$i]['artId'];
                    $result2 = $this->getQuery($query2,true);
                    if($result2 != "")
                        $resarr[$i] = $result2[0]['id'];
                    else
                        $resarr[$i] = '';
                }
            }
        }
        $arrfinal = count(array_filter($resarr));
        if($arrfinal > 0)
            return $arrfinal; ///means closed
        else
            return  0; ///means not closed
    }
    /////////Contributor publishe rate detials to show in popover/////
    public function getContributorSuccessRate($userId)
    {
        $query1 = "select count(id) AS totalparts  FROM ".$this->_name." WHERE user_id=".$userId;
        $query2 = "select count(id) AS publishedparts FROM ".$this->_name." WHERE user_id=".$userId." AND status='published'";
        $result1 = $this->getQuery($query1,true);
        $result2 = $this->getQuery($query2,true);
        if($result2[0]['publishedparts'] != 0)
        {
            $percent = ($result2[0]['publishedparts']/$result1[0]['totalparts']) * 100;
            return $result2[0]['publishedparts']."/".$result1[0]['totalparts']." <b>(".round($percent, 2)."%)</b>";
        }
        else
            return $result2[0]['publishedparts']."/".$result1[0]['totalparts']." <b>(0%)</b>";
    }
    /////////get all number of paritcipation in article //////////////////////////
    public function  getPartsCountInArticle($artId)
    {
        $query = "select count(distinct user_id) AS partcountinart  FROM ".$this->_name." WHERE article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all active participants to send refuse mail when article republished //////////////////////////
    public function  getActiveParicipants($artId)
    {
         $query = "select user_id FROM ".$this->_name." WHERE cycle=0 AND status IN ('bid_refused','closed') AND article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get participante to show refuse mail in republished popup//////////////////////////
    public function  getParticipantsForRefuse($artId)
    {
        $query = "select user_id FROM ".$this->_name." WHERE cycle=0 AND status IN ('bid_premium', 'bid_temp','bid', 'disapproved', 'time_out') AND article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get participante to show refuse mail in republished popup in ao wise//////////////////////////
    public function  getParticipantsForRefuseAo($aoId)
    {
        $query = "select p.user_id FROM ".$this->_name." p
                        INNER JOIN Article a ON a.id=p.article_id
                        INNER JOIN Delivery d ON d.id=a.delivery_id
                        WHERE p.cycle=0 AND p.status IN ('bid_premium', 'bid_temp','bid', 'disapproved', 'time_out') AND d.id=".$aoId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get participante on the liberty missions contributors/////////////////////////
    public function  getLibertyMissionsParts($aoId)
    {
       $query = "select count(p.id) AS partCount, p.status, up.first_name, up.last_name FROM ".$this->_name." p
                        INNER JOIN Article a ON a.id=p.article_id
                        INNER JOIN Delivery d ON d.id=a.delivery_id
                        LEFT JOIN UserPlus up ON up.user_id=p.user_id
                        WHERE p.status IN ('bid_nonpremium', 'bid_nonpremium_timeout', 'bid') AND d.id=".$aoId."";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get participated contributor list//////////////////////////
    public function  participatedContributors($artId)
    {
        $query = "select user_id FROM ".$this->_name." WHERE article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            for($i=0; $i<count($result); $i++)
            {
                $result[$i]= $result[$i]['user_id'];
            }
            return $result;
        }
        else
            return "NO";
    }
    /////////get participated contributor list w rt AO id//////////////////////////
    public function  participatedContributorsAo($aoId)
    {
        $query = "select p.user_id FROM ".$this->_name." p
                        INNER JOIN Article a ON a.id=p.article_id
                        INNER JOIN Delivery d ON d.id=a.delivery_id WHERE d.id=".$aoId."";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            for($i=0; $i<count($result); $i++)
            {
                $result[$i]= $result[$i]['user_id'];
            }
            return $result;
        }
        else
            return "NO";
    }
    /////////get participated contributor list//////////////////////////
    public function  participatedContributorsList($artId)
    {
        $query = "select count(user_id) FROM ".$this->_name." WHERE article_id=".$artId."";
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            return $result;
        }
        else
            return "NO";
    }
    /**Get over Due articles List**/
   public function getOverDueArticlespopup($participationId=NULL)
    {
        if($participationId)
        {
            $addQuery=" AND p.id='".$participationId."'";
            $limit=" LIMIT 1";
        }
        else
        {
            $addQuery="";
            $limit="";
        }
        $overDueQuery="SELECT p.id,a.title,d.title as deliveryTitle,d.user_id,d.id as did,p.article_submit_expires,CONCAT(u.first_name,' ',UPPER(SUBSTRING(u.last_name, 1,1))) as first_name
                        FROM Article a
                        INNER JOIN Participation p ON a.id=p.article_id
                        INNER JOIN Delivery d ON d.id=a.delivery_id
                        INNER JOIN UserPlus u ON u.user_id=p.user_id
                        WHERE p.article_submit_expires!=0 AND p.article_submit_expires < UNIX_TIMESTAMP()
                             AND p.status in('bid','disapproved')".$addQuery."
                        GROUP BY p.id,a.id
                        ORDER BY p.article_submit_expires ASC".$limit;
        if(($result = $this->getQuery($overDueQuery,true)) != NULL)
            return $result;
        else
            return "NO";
    }

    public function getOverDueArticles($bouser,$usertype)
    {
       if($usertype!="superadmin")
       {
            $addQuery=" AND d.created_user='".$bouser."'";
       }


        $overDueQuery="SELECT p.id,a.title,d.title as deliveryTitle,d.user_id,d.id as did,d.created_user,p.article_submit_expires,CONCAT(u.first_name,' ',UPPER(SUBSTRING(u.last_name, 1,1))) as first_name
                        FROM Article a
                        INNER JOIN Participation p ON a.id=p.article_id
                        INNER JOIN Delivery d ON d.id=a.delivery_id
                        INNER JOIN UserPlus u ON u.user_id=p.user_id
                        WHERE p.article_submit_expires!=0 AND p.article_submit_expires < UNIX_TIMESTAMP()
                             AND p.status in('bid','disapproved')".$addQuery."
                        GROUP BY p.id,a.id
                        ORDER BY p.article_submit_expires ASC";
            //echo $overDueQuery;
        if(($result = $this->getQuery($overDueQuery,true)) != NULL)
            return $result;
        else
            return "NO";
    }

    public function getAllParticipationsArchives($artId)
    {
        $query = "SELECT ap.id, ap.participate_id, ap.user_id, ap.stage, ap.status, ap.article_path, ap.article_name,
                    ap.version, ap.article_sent_at, ap.article_doc_content, ap.article_words_count, ap.comments, ap.plag_percent, ap.marks, u.login, u.email,
                    u.type, up.user_id, up.first_name, u.blackstatus FROM Participation p INNER JOIN  ArticleProcess ap ON p.id=ap.participate_id
                    LEFT JOIN User u ON u.identifier=ap.user_id
                    LEFT JOIN UserPlus up ON up.user_id=ap.user_id WHERE
                    p.article_id=".$artId." AND p.current_stage in ('client') AND p.status in ('published')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates which dissaproved by corrector///////////////////////////
    public function getAllParticipationsCorrectorDisapprove($artId)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND current_stage='corrector' AND status IN ('disapproved_temp', 'closed_temp')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates in article for stage1///////////////////////////
    public function getParticipationsStatus($partId)
    {
        $query = "select status, user_id, refused_count, DATE_FORMAT(accept_refuse_at, '%d/%m/%Y %k:%i') AS correcteddate FROM ".$this->_name." WHERE id=".$partId;
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participated users who are just refused to send mails///////////////////////////
    public function getNotRefusedParticipationsUserIds($artId)
    {
        $query = "select user_id  FROM ".$this->_name." WHERE article_id=".$artId." AND status NOT IN ('bid_refused')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participants in cycle 0/////////////////////////
    public function getNoOfParticipants($artId)
    {
        $query = "select count(user_id) AS partsCount  FROM ".$this->_name." WHERE article_id=".$artId." AND cycle!=0";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participants detials wiht article id in currrent cycle/////////////////////////
    public function getParticipantsDetailsCycle0($artId)
    {
         $query = "select status, user_id, current_stage  FROM ".$this->_name." WHERE article_id=".$artId." AND cycle=0";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }

    public function getWriter($article)
    {
        $query = "select id,user_id ,price_user FROM ".$this->_name." WHERE article_id='".$article."' ";
        $result = $this->getQuery($query,true);
        return $result;
    }
    /////////get all liberty status in all different stages/////////////////////////
    public function getLibMissionsPartsStatus($artId)
    {
        $query = "select status, created_at  FROM ".$this->_name." WHERE article_id=".$artId." AND cycle=0";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////get all participates in article for stages///////////////////////////
    public function getvalidatedParticipations($artId)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND status IN ('published')";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    /////////check whether record is present with given statuses/////////////////////////
    public function checkRecordPresent($artId, $status, $current_stage)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND status = '".$status."' AND current_stage = '".$current_stage."' AND cycle=0";
        if(($result = $this->getQuery($query,true)) != NULL)
            return "YES";
        else
            return "NO";
    }
    /////////for testing of wrong date in article process/////////////////////////
    public function getAllPartIds()
    {
        $query = "select id FROM ".$this->_name." WHERE year(created_at) = '2015' AND id IN (select participate_id from ArticleProcess)";
        if(($result = $this->getQuery($query,true)) != NULL)
            return $result;
        else
            return "NO";
    }
    public function partidInArticleProcess($partId)
    {
        $query = "select id FROM ".$this->_name." WHERE article_id=".$artId." AND status = '".$status."' AND current_stage = '".$current_stage."' AND cycle=0";
        if(($result = $this->getQuery($query,true)) != NULL)
            return "YES";
        else
            return "NO";
    }
    public function checkUserWithParticipation($partId, $userId)
    {
        $query = "select id FROM ".$this->_name." WHERE id=".$partId." AND user_id = '".$userId."' ";
        if(($result = $this->getQuery($query,true)) != NULL)
            return "YES";
        else
            return "NO";
    }

	public function getSelectedwriters($article)
	{
		$query1 = "select user_id  FROM ".$this->_name." WHERE article_id=".$article." AND status IN ('bid','plag_exec','under_study','validated','published','disapproved','time_out') AND cycle=0"; 

        if(($result1 = $this->getQuery($query1,true)) != NULL)
            return $result1[0]['user_id'];
        else
            return "NO";
	}
	
	public function getParticipateId($user,$art)
	{
		$query2 = "select id  FROM ".$this->_name." WHERE article_id=".$art." AND user_id='".$user."' AND cycle=0"; 
		$result2 = $this->getQuery($query2,true);
        return $result2[0]['id'];
    }
	
	public function getParticipationCount($art)
	{
		$query3 = "select count(*) as partcount  FROM ".$this->_name." WHERE article_id=".$art." AND cycle=0"; 
		$result3 = $this->getQuery($query3,true);
        return $result3[0]['partcount'];
	}
	
	public function getParticipationDetail($part)
	{
		$query4 = "select *  FROM ".$this->_name." WHERE id='".$part."'"; 
		$result4 = $this->getQuery($query4,true);
        return $result4;
	}
	
	public function checkParticipation($art,$user)
	{
		$query2 = "select *  FROM ".$this->_name." WHERE article_id='".$art."' AND user_id='".$user."' AND status IN ('bid_premium','bid_nonpremium','bid_temp') AND cycle=0"; 
		
       if(($result2 = $this->getQuery($query2,true)) != NULL)
            return $result2;
        else
            return "NO";
	}
	
	public function getArticleStatus($art)
	{
		$query5 = "select * FROM ".$this->_name." WHERE article_id=".$art." AND cycle='0'"; 
		$result5 = $this->getQuery($query5,true);
        return $result5[0]['status'];
	}
	
}
