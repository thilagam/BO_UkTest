<?php
/*class to perform task for ebooker report generation*/
class Ep_Ebookers_Report extends Ep_Db_Identifier
{
	function getThemeStencils($language='uk')
	{
		if($language)
		{
			$lcondition=" AND a.language='".$language."'";
		}
		
		/*(SELECT SUM(a.files_pack) as stencils_count
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id
				)as stencils_count*/	
		
		$query="SELECT t.theme_name,
				t.expected_stencils_count as stencils_count ,
				t.integrated_manually_count as manual_count,

				(SELECT SUM(a.files_pack) as stencils_count
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status in ('under_study','published') AND p.current_stage in ('stage1','corrector','client','stage2') $lcondition
				)as written_stencils_count,
				(SELECT SUM(LENGTH(REPLACE (ap.article_doc_content, '###$$$###', ' ')) - LENGTH(REPLACE(REPLACE (ap.article_doc_content, '###$$$###', ' '), ' ', ''))+1) as sqlwords
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN ArticleProcess ap ON ap.participate_id=p.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status in ('under_study','published') AND p.current_stage in ('stage1','corrector','client','stage2') 
					AND ap.version in (SELECT max(version) FROM ArticleProcess WHERE participate_id=p.id AND stage='contributor') $lcondition
				) as written_words,
				
				(SELECT SUM(a.files_pack) as stencils_count
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN CorrectorParticipation cp ON cp.participate_id=p.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status in ('under_study','published') AND cp.status in ('under_study','published') AND	cp.current_stage in ('stage2','client') $lcondition
				)as proofread_stencils_count,
				(SELECT SUM(LENGTH(REPLACE (ap.article_doc_content, '###$$$###', ' ')) - LENGTH(REPLACE(REPLACE (ap.article_doc_content, '###$$$###', ' '), ' ', ''))+1) as sqlwords
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN CorrectorParticipation cp ON cp.participate_id=p.id
					INNER JOIN ArticleProcess ap ON ap.participate_id=p.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status in ('under_study','published') AND cp.status in ('under_study','published') AND	cp.current_stage in ('stage2','client')
					AND ap.version in (SELECT max(version) FROM ArticleProcess WHERE participate_id=p.id AND stage='corrector') $lcondition
				)as proofreaded_words,
				
				(SELECT SUM(a.files_pack) as stencils_count
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status='published' $lcondition
				)as validated_stencils_count,
				(SELECT SUM(LENGTH(REPLACE (ap.article_doc_content, '###$$$###', ' ')) - LENGTH(REPLACE(REPLACE (ap.article_doc_content, '###$$$###', ' '), ' ', ''))+1) as sqlwords
					FROM Article a
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN ArticleProcess ap ON ap.participate_id=p.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE et.theme_id=t.theme_id AND p.status='published' 
					AND ap.version in (SELECT max(version) FROM ArticleProcess WHERE participate_id=p.id AND stage='s2') $lcondition
				)as validated_words,
				
				(SELECT count(v.article_id) as integrated_count
					FROM  ValidStencils v
					INNER JOIN Article a  ON a.id=v.article_id
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE v.validated='yes' AND et.theme_id=t.theme_id AND p.status='published' $lcondition
				)as integrated_count,
				(SELECT SUM(LENGTH(v.stencil_content) - LENGTH(REPLACE(v.stencil_content, ' ', ''))+1) as sqlwords
					FROM  ValidStencils v
					INNER JOIN Article a  ON a.id=v.article_id
					INNER JOIN Delivery d ON a.delivery_id=d.id
					INNER JOIN Participation p ON p.article_id=a.id
					INNER JOIN EB_category ea ON ea.cat_id=a.ebooker_cat_id
					INNER JOIN EB_themes et ON et.theme_id=ea.themes_id
					WHERE v.validated='yes' AND et.theme_id=t.theme_id AND p.status='published' $lcondition
				)as integrated_words
				
                FROM EB_themes t
    			WHERE 
					status='active'			
    			";
    	
    	//echo $query;exit;

    	if(($themeList=$this->getQuery($query,true))!=NULL)
        {      
            return $themeList;           
        }		
        else
        	return NULL;
		
	}
	
	function getStencilsLanguages()
	{
		$query="SELECT DISTINCT(language) as language	
				FROM Delivery 
				WHERE stencils_ebooker='yes'";
				
		if(($languageList=$this->getQuery($query,true))!=NULL)
        {      
			$languages=array();
			foreach($languageList as $lang)
			{
				$languages[]=$lang['language'];
			}
		   return $languages;           
        }		
        else
        	return NULL;
	}
	
	
}