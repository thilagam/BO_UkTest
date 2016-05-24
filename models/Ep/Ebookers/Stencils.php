<?php

class Ep_Ebookers_Stencils extends Ep_Db_Identifier
{
	protected $_name = 'EB_themes';
	
	function getStencils($search = NULL)
	{
		$where = " t.status = 'active'";
		$groupby = $select = $join = "";
		if($search['theme'])
		$groupby = " GROUP BY t.theme_id";
		if($search['theme_id'])
		{
			$select = ",c.*";
			$where .=" AND t.theme_id = $search[theme_id] AND c.status='active'";
			$join = " JOIN EB_category c ON c.themes_id = t.theme_id";
			$groupby = " GROUP BY c.cat_id";
		}
		if($search['cat_id'])
		{
			$select = ",c.category_name";
			$where .=" AND c.cat_id = $search[cat_id] AND c.status='active'";
			$join = " JOIN EB_category c ON c.themes_id = t.theme_id
					  ";
			$groupby = " GROUP BY c.cat_id";
		}
		if($search['token_id'])
		{
			$select = ",st.*,c.category_name";
			$where .=" AND st.token_id = $search[token_id] AND st.status='active' AND c.status='active'";
			
			if($search['language'])
				$where .=" AND st.language='".$search['language']."'";
			
			$join = " JOIN EB_category c ON c.themes_id = t.theme_id
					  JOIN EB_token tok ON tok.category_id = c.cat_id
					  JOIN EB_sampletext st ON st.token_id = tok.token_id";
			$groupby = " GROUP BY st.sample_id";
		}
		if($search['sample_id'])
			$where .=" AND st.sample_id = $search[sample_id]";
		/* if($search['language'])
			$where .= " AND lang.language='".$search['language']."'";		
		$join .= " LEFT JOIN EB_language lang ON lang.themes_id = t.theme_id"; */
		$query = "SELECT t.description as themedesc,t.* $select FROM EB_themes t
				  $join
				  WHERE $where
				  $groupby 
				  ";
		//echo $query;
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
	function getLanguageDesc($search = NULL)
	{
		$where = " lang.status = 'active'";
		if($search['language'])
			$where .= " AND lang.language='".$search['language']."'";
		if($search['theme_id'])
			$where .= " AND lang.themes_id='".$search['theme_id']."'";
		$query = "SELECT * FROM EB_language lang 
				  WHERE $where";
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
	
	function getSampleTexts($array=NULL)
	{
		$where = " status='active' ";
		if($array['sample_id'])
		{
			$where .= " AND sample_id = $array[sample_id]";
		}
		$query = "SELECT *
				  FROM EB_sampletext 				 
				  WHERE $where
				  ";
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
	
	function getTokens($array = NULL)
	{
		$where = " token.status='active' ";
		$join = $select = "";
		if($array['cat_id'])
		{
			$where .= " AND token.category_id = $array[cat_id]";
		}
		if($array['cat_ids'])
		{
			$where .= " AND token.category_id IN($array[cat_ids])";
		}
		if($array['join'])
		{
			$select = ",cat.category_name,theme.theme_name,theme.description as themedesc";
			$join = " JOIN EB_category cat ON cat.cat_id = token.category_id JOIN EB_themes theme ON theme.theme_id = cat.themes_id";
		}
		$query = "SELECT token.*$select
				  FROM EB_token token	
				  $join
				  WHERE $where
				  ORDER BY token.token_order ASC
				  ";
				 
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
	
	function getTexts($array = NULL)
	{
		$where = "1=1";
		if($array['pid'])
			$where = "  ap.participate_id='".$array['pid']."'";
		$order_by = " ORDER BY ap.version DESC LIMIT 1";
		$query = "SELECT ap.* FROM ArticleProcess ap 
				  WHERE $where
				  $order_by
				 ";
	/* 	 echo $query;
		exit;  */
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
	
    function insertStencil($data){
        $this->_name = 'ValidStencils';
        $data['id'] = number_format(microtime(true),0,'','').mt_rand(10000,99999);
        $this->insertQuery($data);
    }
	
	function getValidStencils($search = NULL)
	{
		$where = "(1=1";
		$join = "";
		if($search['token_ids'])
			$where = "((t.token_id IN(".$search['token_ids'].") AND v.locked = 'no' AND v.used_count=0)";
		$where .= " OR (v.locked = 'yes' AND v.locked_by = '".$search['user_id']."' AND v.used_count=0))";
		if($search['language'])
		{
			$where .=" AND v.language='".$search['language']."'";
		}
		if($search['missions'])
		{
			$join = "   JOIN Delivery d ON d.id = v.delivery_id";
			$where .= " AND d.contract_mission_id IN (".$search['missions'].")";
		} 
		//$where .= " AND v.article_id NOT IN ('144379555686908','144379555612617','144379555671474')";
		$query  = "SELECT t.*,v.*,theme.theme_id,theme.theme_name,cat.category_name
		FROM  ValidStencils v 
		INNER JOIN EB_token t ON FIND_IN_SET(t.token_id,v.token_ids) > 0 
		JOIN EB_category cat ON cat.cat_id = t.category_id
		JOIN EB_themes theme ON theme.theme_id = cat.themes_id
		$join
		WHERE $where
		GROUP BY t.token_id,v.id
		ORDER BY used_count ASC,token_type,rand() ASC";
	 	/*echo $query;
		exit;*/
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
    //*** added on 06-01-2016 ***//
    //load v2 stencils only related to weateher//
	function getValidStencilsV2($search = NULL)
	{
		$where = "(1=1";
		$join = "";
		if($search['token_ids'])
			$where = "((t.token_id IN(".$search['token_ids'].") AND v.locked = 'no' AND v.used_count=0)";
		$where .= " OR (v.locked = 'yes' AND v.locked_by = '".$search['user_id']."' AND v.used_count=0))";
		if($search['language'])
		{
			$where .=" AND v.language='".$search['language']."'";
		}
		if($search['missions'])
		{
			$join = "   JOIN Delivery d ON d.id = v.delivery_id";
			$where .= " AND d.contract_mission_id IN (".$search['missions'].")";
		}
		//$where .= " AND v.article_id NOT IN ('144379555686908','144379555612617','144379555671474')";
		$query  = "SELECT t.*,v.*,theme.theme_id,theme.theme_name,cat.category_name
		FROM  ValidStencils v
		INNER JOIN EB_token t ON FIND_IN_SET(t.token_id,v.token_ids) > 0
		JOIN EB_category cat ON cat.cat_id = t.category_id
		JOIN EB_themes theme ON theme.theme_id = cat.themes_id
		$join
		WHERE $where
		GROUP BY t.token_id,v.id
		ORDER BY used_count ASC,t.`category_id`ASC, t.`category_type`ASC,token_type,rand() ASC";
	 	/*echo $query;
		exit;*/
		if(($result = $this->getQuery($query, true)) != NULL)
		   return $result;
		else
		return NULL;
	}
	
	function updateValidStencils($update,$condition)
	{
		$this->_name = 'ValidStencils';
		$where = " id IN(".implode(",",$condition).")";
		$this->updateQuery($update, $where);
	}
	
	function updateValidStencilsInc($validstencils,$user_id)
	{
		$query = "UPDATE ValidStencils SET validated='yes',locked='yes',locked_by='".$user_id."',validated_by='".$user_id."',validated_at='".date("Y-m-d H:i:s")."',locked_at='".date("Y-m-d H:i:s")."',used_count= used_count + 1 
				  WHERE id IN ($validstencils)
		";
		$this->execQuery($query,'insert');
	}
	
	function insertUsedstencils($data)
	{
		$this->_name = 'UsedStencils';
		$this->insertQuery($data);
	}
	function getStencilNumber($cat_id)
	{
		$query = "SELECT us.used_stencils_id, DATE_FORMAT(us.used_at, '%Y-%m-%d %H:%i') AS used_at_date FROM UsedStencils us
				JOIN EB_token token ON token.token_id = us.token_id
				JOIN EB_category cat ON cat.cat_id = token.category_id
				JOIN EB_themes theme ON theme.theme_id =  cat.themes_id
				WHERE theme.theme_id = '".$cat_id."'
				GROUP BY used_at_date";
		if(($result = $this->getQuery($query, true)) != NULL)	
		   return $result;
		else
		return NULL;
	}
    /*edited by naseer on 02-11-2015*/
    function getStencilsDetails($artId,$partId){
        $query = "SELECT Article.`delivery_id`,  Article.`language` AS lang,
        Article.`product`,
        Delivery.`ebooker_tokenids`,Delivery.`stencils_ebooker`, ArticleProcess.`version` , ArticleProcess.`article_doc_content`
        FROM `Article` AS Article
        LEFT JOIN `Delivery` AS Delivery ON Delivery.`id` = Article.`delivery_id`
        LEFT JOIN `ArticleProcess` AS ArticleProcess ON ArticleProcess.`participate_id` = '".$partId."'
        WHERE Article.`id` = '".$artId."'
        ORDER BY ArticleProcess.`version` DESC
        LIMIT 0 , 1";
        //echo $query;exit;
        if(($result = $this->getQuery($query, true)) != NULL)
            return $result;
        else
            return NULL;

    }
	/*get random stencils of Uk language to translate*/
	function getStencilsForTranslation($translation_lang,$token_id,$limit=NULL)
	{
		//INNER JOIN Article a ON a.id=v.article_id
		//if($limit)
		//	$limitCondition=" LIMIT 0 , ".$limit;
		if($token_id)
			$condition=" AND FIND_IN_SET($token_id,v.token_ids) > 0";
		//get transalted stencils
		$translatedStencils=$this->getTranslatedStencils($translation_lang);
		/* if($translatedStencils)
			$condition.=" AND FIND_IN_SET(v.id,'$translatedStencils')=0"; */
		
		$translateQuery = "SELECT v.id 
			FROM ValidStencils v			
			WHERE v.language='uk' $condition
			ORDER BY v.created_at ASC
			";
		//echo $translateQuery;exit;
		//echo "<pre>";print_r($translatedStencils);exit;		
		
        if(($stencils =$this->getQuery($translateQuery,true)) != NULL)
		{			
			$finalStencils=array();
			foreach($stencils as $stencil)
			{				
				if(!in_array($stencil['id'],$translatedStencils))
					$translateStencils[]=$stencil['id'];
			}
			if($limit)			
				$finalStencils=array_slice($translateStencils, 0,$limit);
			else
				$finalStencils=$translateStencils;
							
			//echo "<pre>";print_r($finalStencils);exit;		
			return $finalStencils;
		}            
        else
            return NULL;
	}
	//get translated stencils of a language
	function getTranslatedStencils($translation_lang)
	{
		$query="SELECT a.stencils_translate 
				FROM Article a 
				WHERE a.language='".$translation_lang."' 
				AND a.stencils_translate IS NOT NULL
				";
		//echo $query;exit;	
		if(($stencils = $this->getQuery($query, true)) != NULL)
		{
			foreach($stencils as $stencil)
			{
				$translatedStencils[]=$stencil['stencils_translate'];
			}
			$usedStencils=implode(",",$translatedStencils);
			return explode(",",$usedStencils);
		}            
        else
            return NULL;		
	}
	/* added by naseer on 06-10-2015*/
    function getStencilstoTranslate($article_id)
	{
        $query="SELECT v.id,v.stencil_content
 			FROM  ValidStencils v 			   	
    		INNER JOIN Article a ON FIND_IN_SET(v.id,a.stencils_translate) > 0
    		WHERE a.id='".$article_id."'
    		ORDER BY v.created_at ASC
		    ";		
        //echo $query;exit;
        if(($result = $this->getQuery($query,true)) != NULL)
        {
            /*foreach($result as $stencil)
            {
                $translateStencils[]['id']=$stencil['id'];
                //$translateStencils[]['stencil_content']=$stencil['stencil_content'];
            }*/
            return $result;
        }
        else
            return NULL;
	}
	/* To get Missions based on Tokens */
	function getMissions($search=array())
	{
		$where = "";
		$token_ids = $search['token_ids'];
		$language=$search['language'];
		# $all_token_ids = $this->getCatTokens($search['cat_variations']);
		/*$find_in = array();
		foreach($token_ids as $row)
		{
			$find_in[]= " FIND_IN_SET('".$row."',a.ebooker_tokenids) > 0 ";
		}
		$where .= implode("OR",$find_in)." )";
		 $query = "SELECT d.contract_mission_id,qm.product,qm.product_type,qm.language_source,qm.language_dest
		FROM Article a 
		JOIN Delivery d ON d.id = a.delivery_id
		JOIN ContractMissions cm ON cm.contractmissionid = d.contract_mission_id 
		JOIN QuoteContracts qc ON qc.quotecontractid = cm.contract_id
		JOIN Quotes q ON q.identifier = qc.quoteid
		JOIN QuoteMissions qm ON qm.quote_id = q.identifier
		WHERE $where
		GROUP BY d.contract_mission_id
		"; */
		$implode_token_ids = implode(",",$search['token_ids']);
		$where = " t.token_id IN ($implode_token_ids)";
		
		if($language)
			$where.=" AND a.language='".$language."'";
		
		
		$query = "SELECT a.id,a.ebooker_tokenids,d.contract_mission_id,qm.product,qm.product_type,qm.language_source,qm.language_dest
				  FROM Article a 
				  INNER JOIN EB_token t ON FIND_IN_SET(t.token_id,a.ebooker_tokenids)
				  JOIN Delivery d ON d.id = a.delivery_id
				  JOIN ContractMissions cm ON cm.contractmissionid = d.contract_mission_id
				  JOIN `QuoteMissions` qm ON qm.identifier = cm.type_id
				  WHERE $where
                  GROUP BY d.contract_mission_id";
		//echo $query;			
				  
		if(($result = $this->getQuery($query,true)) != NULL)
        {
			return $result;
		}
		else
		{
			return NULL;
		}
	}
	/* To get All tokens based on Category(Category variation) */
	function getCatTokens($cat_ids)
	{
		$query = "SELECT a.ebooker_tokenids FROM Article as a
				  WHERE  a.ebooker_cat_id IN ($cat_ids)";
		if(($result = $this->getQuery($query,true)) != NULL)
        {
			$token_ids = array();
            foreach($result as $row)
			{
				$token_ids[$row['ebooker_tokenids']] = $row['ebooker_tokenids'];
			}
			$token_ids = array_filter($token_ids);
			$token_ids = array_unique($token_ids);
            return implode(",",$token_ids);
        }
        else
            return array();
	}
    //***  added on 06.01.2015 ***//
    function getHiddenVAlue($id){
        $query  = "SELECT  `token_code` FROM `EB_token` WHERE `token_id` = '$id' LIMIT 1";
        /* 	echo $query;
            exit;  */
        if(($result = $this->getQuery($query, true)) != NULL)
            return $result[0]['token_code'];
        else
            return NULL;
    }
    // to get the theme condition based on the searched lang//
    function getThemeCondition($theme_id,$lang){
        $query  = "SELECT `title_condition`,`title`
                  FROM `EB_language`
                  WHERE `language` = '".$lang."' AND `themes_id` = '".$theme_id."' AND `status` = 'active'
                  LIMIT 1";
        /* 	echo $query;
            exit;  */
        if(($result = $this->getQuery($query, true)) != NULL)
            return $result;
        else
            return NULL;
    }
    // to get the getCategoryCondition  condition based on the searched lang//
    function getCategoryCondition($CT_id,$lang){
        $query  = "SELECT `CT_title`, `CT_title_condition`
                  FROM `EB_categorized_tokens_conditions`
                  WHERE `CT_language` = '".$lang."' AND `CT_id` = '".$CT_id."' AND `status` = 'active'
                  LIMIT 1";
        /* 	echo $query;
            exit;  */
        if(($result = $this->getQuery($query, true)) != NULL)
            return $result;
        else
            return NULL;
    }
    //function to return the name of categoriezzed token//
    function getcategoryName($id){
        $query  = "SELECT `theme_name` FROM `EB_themes` WHERE `theme_id` = '".$id."'  LIMIT 1";
         	/*echo $query;
            exit;*/
        if(($result = $this->getQuery($query, true)) != NULL)
            return $result[0]['theme_name'];
        else
            return NULL;
    }
    //*** end of  added on 06.01.2015 ***//
}
?>