<?php

class Ep_Bnp_Bnp extends Ep_Db_Identifier
{
	public function getCity(){
        $query = "SELECT `city_id`,`city_name` FROM `BNP_city` WHERE `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
	}
	public function getCityrewriteArticleCount(){
        $query = "SELECT * FROM `BNP_city` WHERE `status` = 'active' ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
	}
    public function getBnpSampleText($param=NULL){
        $query = "SELECT * FROM `BNP_sampletext` WHERE `city_id` = '".$param['city_id']."'";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }

    public function getSampleTextIds(){
        $query = "SELECT * FROM `BNP_sampletext` GROUP BY `city_id`";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;
    }

    public function getCityName($param=NULL){
        $query = "SELECT city_name FROM `BNP_city` WHERE `city_id` = '".$param['city_id']."'";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result[0]['city_name'];
        }
        else
            return false;
    }
    /* *** added on 15.03.2016 *** */
    //function to extraxt details required to create xlsx files for BNP Prabis Extract//
    public function fecthBnpParibasXlsx($cmid){
        $query = "SELECT AP . *,  A.`id` as article_id,D.`id` AS delivery_id,A.bnp_city_id, A.bnp_sampletext_id,A.`bnp_no_of_articles`
        FROM `ContractMissions` AS CM
        INNER JOIN `Delivery` AS D ON D.`contract_mission_id` = CM.`contractmissionid`
        INNER JOIN `Article` AS A ON A.`delivery_id` = D.`id`
        INNER JOIN `Participation` AS CP ON CP.`article_id` = A.`id`
        INNER JOIN `ArticleProcess` AS AP ON AP.`participate_id` = CP.`id`
        WHERE CP.`status` = 'published'
        AND CP.`current_stage` = 'client'
        AND AP.`stage`
        IN (
        's2'
        )
        AND AP.`status`
        IN (
        'approved'
        )
        AND CM.`bnp_mission` = 'yes' AND AP.version = (
SELECT MAX( version )
FROM `ArticleProcess`
WHERE participate_id = AP.participate_id )
AND
 CM.`contractmissionid` = '".$cmid."'
        ";
        if (($result = $this->getQuery($query, true)) != NULL){
            return $result;
        }
        else
            return false;

    }
}
