<?php
 
class Ep_Payment_PaymentArticle extends Ep_Db_Identifier
{
	protected $_name = 'Payment_article';
		
	public function insertPayment_article($pay_arr)
	{
		$pay_arr["id"] = $this->getIdentifier();
		$this->insertQuery($pay_arr);
		return $this->getIdentifier();
	}
	
	public function getPaymentLiberte($client,$month,$year)
	{
		$query="SELECT a.id as article,a.title,pa.amount,pa.amount_paid,c.company_name,up.address,up.city,up.zipcode FROM 
				Payment_article pa INNER JOIN Article a ON pa.id=a.invoice_id 
				INNER JOIN Delivery d ON a.delivery_id=d.id
				INNER JOIN Participation p ON p.article_id=a.id	
				LEFT JOIN Client c ON d.user_id=c.user_id
				LEFT JOIN UserPlus up ON d.user_id=up.user_id
			WHERE 
				d.user_id='".$client."' AND d.premium_option='0' AND MONTH(pa.created_at)='".$month."' AND YEAR(pa.created_at)='".$year."' 
				AND a.paid_status='paid' AND p.status='published'";
        
        $result = $this->getQuery($query,true);
        return $result;
	}
	
	public function getPaymentLibertearticle($client)
	{ 
		$query="SELECT a.id as article,a.title,d.user_id,a.created_at FROM   
				Payment_article pa INNER JOIN Article a ON pa.id=a.invoice_id 
				INNER JOIN Delivery d ON a.delivery_id=d.id
				INNER JOIN Participation p ON p.article_id=a.id	
				LEFT JOIN Client c ON d.user_id=c.user_id
				LEFT JOIN UserPlus up ON d.user_id=up.user_id
			WHERE 
				d.user_id='".$client."' AND d.premium_option='0'AND a.paid_status='paid' AND YEAR(pa.created_at)='2014' AND p.status='published' ORDER BY a.created_at DESC";
        
        $result = $this->getQuery($query,true);
        return $result;
	}
	
	public function getpaymentdetails($art)
	{
		$billQuery="SELECT 
						d.title as dtitle,a.title,d.id as did,d.client_type,a.id as aid,d.created_at as ddate,d.delivery_date,p.id as payid,p.user_id,p.amount,p.amount_paid,p.created_at,p.tax,ap.article_sent_at,
						LOWER(up.first_name) as first_name,up.last_name as last_name,a.price_payed,a.invoice_generated
					FROM 
						Payment_article p INNER JOIN Article a ON p.id=a.invoice_id 
						INNER JOIN Delivery d ON a.delivery_id=d.id 
						LEFT JOIN Participation pr ON pr.article_id=a.id
						LEFT JOIN ArticleProcess ap ON ap.participate_id=pr.id
						LEFT JOIN UserPlus up ON pr.user_id=up.user_id
					WHERE 
						a.paid_status='paid' AND a.id='".$art."' GROUP BY p.id";
		
		if(($billSet= $this->getQuery($billQuery,true)) != NULL)
            return $billSet;
		else
			return "NO";
	}
	
	public function getClientdetails($cid)  
	{
		$SelectQuery_cdetails="SELECT 
									c.company_name,u.address,u.zipcode,u.city,u.country
							  FROM 
									UserPlus u
							  INNER JOIN 
									Client c
							  ON
									u.user_id=c.user_id
							  WHERE 
									u.user_id='".$cid."'";	
		    
			$resultsettmp = $this->getQuery($SelectQuery_cdetails,true); 
			return $resultsettmp;	
	}
	
	
}	