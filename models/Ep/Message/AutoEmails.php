<?php
/**
 * Ep_Message_AutoEmails
 * @author Admin
 * @package Message
 * @version 1.0
 */
class Ep_Message_AutoEmails extends Ep_Db_Identifier
{


    function getUserDetails($user)
	{
		$senderQuery="select IF(u.type='client',company_name,first_name) as username ,u.email,u.login,up.first_name, up.last_name, u.menuId  from User u
		                    LEFT JOIN UserPlus up ON u.identifier=up.user_id
		                    LEFT JOIN Client c ON u.identifier=c.user_id
		                    where identifier='".$user."'";
		//echo $senderQuery;exit;
		if(($result=$this->getQuery($senderQuery,true))!=NULL)
		{
			return $result;
		}

	}
    function getContribUserDetails($user)
	{
		$senderQuery="select first_name as firstname , UPPER(LEFT(last_name,1)) as lastname, email from User u
		                    LEFT JOIN UserPlus up ON u.identifier=up.user_id
		                    LEFT JOIN Client c ON u.identifier=c.user_id
		                    where identifier='".$user."'";
		//echo $senderQuery;exit;
		if(($result=$this->getQuery($senderQuery,true))!=NULL)
		{
			return $result;
		}

	}
    function getUserType($user)
    {
        $typeQuery="select * from User u where identifier='".$user."' AND u.status='Active'";
		//echo $senderQuery;exit;
		if(($result=$this->getQuery($typeQuery,true))!=NULL)
		{
			return $result;
		}
    }
    function getArticleCreatedUserId($articleId)
    {
        $typeQuery="select IF(d.created_by='BO',d.created_user,d.user_id) AS created_user_id, a.title from Delivery d INNER JOIN Article a ON a.delivery_id = d.id where a.id='".$articleId."'";
        //echo $senderQuery;exit;
        if(($result=$this->getQuery($typeQuery,true))!=NULL)
        {
            return $result;
        }
    }
    function getAutoEmail($id)
    {
        $query="select * from AutoemailsNewversion where Id=".$id;
        if(($result=$this->getQuery($query,true))!=NULL)
         {
             return $result;
         }

    }
    public function sendAutoEmail($to,$mailid,$parameters)
    {
        //$automail=new Ep_Message_AutoEmails();
        $UserDetails=$this->getUserType($to);
        $AO_Creation_Date='<b>'.$parameters['created_date'].'</b>';
        $link='<a href="http://ep-test.edit-place.co.uk'.$parameters['document_link'].'">click here </a>';
        $contributor='<b>'.$parameters['contributor_name'].'</b>';
        $client='<b>'.$parameters['client_name'].'</b>';
        $royalty='<b>'.$parameters['royalty'].'</b>';
        $ongoinglink='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">click here </a>';
		$ongoinglinking='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">clicking here</a>';
        $AO_end_date='<b>'.$parameters['AO_end_date'].'</b>';
        $article='<b>'.stripslashes($parameters['article_title']).'</b>';
        $AO_title='<b>'.stripslashes($parameters['AO_title']).'</b>';

        $email=$this->getAutoEmail($mailid);

        $Object=html_entity_decode($email[0]['Object']);
        $Message=stripslashes($email[0]['Message']);
        eval("\$Message= \"$Message\";");

            $mail = new Zend_Mail();
            $mail->addHeader('Reply-To','support@edit-place.com');
            $mail->setBodyHtml($Message)
                ->setFrom('support@edit-place.com')
                ->addTo($to)
                ->setSubject($Object);
        if($UserDetails[0]['alert_subscribe']=='yes')  ///only for subscribed user.
        {
            if($mail->send())
                return true;
        }

        //print_r($mail);exit;
    }
    public function sendAutoPersonalEmail($receiverId,$object=NULL,$messageId=NULL,$ticketId=NULL)
    {
        $UserDetails=$this->getUserType($receiverId);
        $email=$UserDetails[0]['email'];
        $password=$UserDetails[0]['password'];
        $type=$UserDetails[0]['type'];

         if(!$object)
            $object="You have received an Edit-place email";

       if($UserDetails[0]['type']=='client')
		{
			$text_mail="<p>Dear Client,<br><br>
								You have received an email from Edit-Place!<br><br>
								Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
								Regards,<br>
								<br>
								All Edit-Place team<br><br>
								You do not wish to receive notifications ? <a href=\"http://ep-test.edit-place.co.uk/user/alert-unsubscribe?uaction=unsubscribe&user=".MD5('ep_login_'.$email)."\">Click here</a>.<br><br></p>"
			;
		}
		else if($UserDetails[0]['type']=='contributor')
		{
			$text_mail="<p>Dear writer,<br><br>
								You have received an email from Edit-Place!<br><br>
								Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
								Regards,<br>
								<br>
								All Edit-Place team<br><br>
								You do not wish to receive notifications ? <a href=\"http://ep-test.edit-place.co.uk/user/alert-unsubscribe?uaction=unsubscribe&user=".MD5('ep_login_'.$email)."\">Click here</a>.<br><br></p>"
			;
		}
        if($this->getConfiguration('mail_from') == '')
            $mail_from = "support@edit-place.com";
        else
            $mail_from = $this->getConfiguration('mail_from');
        if($UserDetails[0]['alert_subscribe']=='yes')
        {
            if($this->getConfiguration('critsend') == 'yes')
            {
                critsendMail($mail_from, $UserDetails[0]['email'], $object, $text_mail);
                return true;
            }
            else
            {
                $mail = new Zend_Mail();
                $mail->addHeader('Reply-To',$mail_from);
                $mail->setBodyHtml($text_mail)
                    ->setFrom($mail_from)
                    ->addTo($UserDetails[0]['email'])
                    ->setSubject($object);
                if($mail->send())
                    return true;
            }
        }
    }
    ////when a file is stuck up in the plagrism stage and user comments abt it /////
    public function plagStuckToPersonalEmail($errortype, $details)
    {  // echo $errortype;  print_r($details); exit;
        $object = "File stuck in the Plagiarism stage";
        $ccmailid ='rakeshm@edit-place.com';
        if($errortype == 'php'){
            $mailid = 'chandu@edit-place.com';
            $touser = 'Chandu';
        }
        if($errortype == 'ruby'){
            $mailid = 'manohar@edit-place.com';
            $touser = 'Manohar';
        }
        if($errortype == 'writer'){
            $mailid = $details['aocreateduseremail'];
            $touser = $details['aocreateduser'];
        }
        if($errortype == 'php&ruby'){
            $mailid = 'chandu@edit-place.com';
            $bccmailid = 'manohar@edit-place.com';
            $touser = 'Chandu';
        }
        $text_mail="<p>Hi ".$touser.",<br><br>
                                The details for the file stuck in the plagiarism stage !<br><br>
                                link to palgiarism stage : <a href=\"http://admin-test.edit-place.co.uk/proofread/stage-articles?submenuId=ML3-SL11&aoId=".$details['aoId']."\">Stage Plagiarism</a><br><br>
                                link to palgiarism stage : <a href=\"http://admin-test.edit-place.co.uk/proofread/plag-stuck-arts?submenuId=ML3-SL13\">List of stuck up files</a><br><br>
                                Comments : ".$details['comments']."<br><br>
                                Ao title : ".$details['aotitle']."<br>
                                Article title : ".$details['arttitle']."<br><br>
                                Cordialement,<br>
                                <br>
                                Toute l'&eacute;quipe d&rsquo;Edit-place<br><br> </p>";
        if($this->getConfiguration('mail_from') == '')
            $mail_from = "support@edit-place.com";
        else
            $mail_from = $this->getConfiguration('mail_from');
        if($this->getConfiguration('critsend') == 'yes')
        {
            critsendMail($mail_from, $mailid, $object, $text_mail);
            return true;
        }
        else
        {
            $mail = new Zend_Mail();
            $mail->addHeader('Reply-To',$mail_from);
            $mail->setBodyHtml($text_mail)
                ->setFrom($mail_from)
                ->addTo($mailid)
                ->addCc($ccmailid)
                //->addCc('chandu@edit-place.com')
                ->addCc('claurent@edit-place.com')
                ->addBcc($ccmailid)
                ->setSubject($object);
            if($mail->send())
                return true;
        }
    }
    /*get the mail message from automails table for all the pages in mail content area**/
    public function getMailComments($receiverId,$mailid,$parameters)
    {    //echo $mailid; print_r($parameters);  exit;
        $automail=new Ep_Message_AutoEmails();

        $AO_Creation_Date='<b>'.$parameters['created_date'].'</b>';
        $link='<a href="http://ep-test.edit-place.co.uk'.$parameters['document_link'].'">Click here</a>';
        $contributor='<b>'.$parameters['contributor_name'].'</b>';
        $AO_title="<b>".$parameters['AO_title']."</b>";
        $submitdate_bo="<b>".$parameters['submitdate_bo']."</b>";
        $total_articles="<b>".$parameters['noofarts']."</b>";
        $article_link='<a href="http://ep-test.edit-place.co.uk'.$parameters['articlename_link'].'">click here</a>';
        $invoicelink='<a href="http://ep-test.edit-place.co.uk'.$parameters['invoice_link'].'">Click here</a>';
        $client='<b>'.$parameters['client_name'].'</b>';
        $royalty='<b>'.$parameters['royalty'].'</b>';
        $ongoinglink='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">click here</a>';
		$ongoinglinking='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">clicking here</a>';
        $AO_end_date='<b>'.$parameters['AO_end_date'].'</b>';
        $article='<a href="'.$parameters['aoname_link'].'"><b>'.stripslashes($parameters['article_title']).'</b></a>';
        $articlewithlink='<a href="http://ep-test.edit-place.co.uk'.$parameters['articlename_link'].'">'.stripslashes($parameters['article_title']).'</a>';
        $AO_title='<b>'.stripslashes($parameters['AO_title']).'</b>';
        $aowithlink='<a href="http://ep-test.edit-place.co.uk'.$parameters['aoname_link'].'">'.stripslashes($parameters['AO_title']).'</a>';
        $resubmit_time='<b>'.stripslashes($parameters['resubmit_time']).'</b>';
        $resubmit_hours='<b>'.stripslashes($parameters['resubmit_hours']).'</b>';
        $site='<a href="http://ep-test.edit-place.co.uk">Edit-place</a>';
        $corrector_date='<b>'.$parameters['correcteddate'].'</b>';
        $submit_hours = "<b>".$parameters['crtsubmitdate_bo']."</b>";
        $corrector_ao_link = '<a href="http://ep-test.edit-place.co.uk'.$parameters['corrector_ao_link'].'">Click here</a>';
		$corrector_ao_linking = '<a href="http://ep-test.edit-place.co.uk'.$parameters['corrector_ao_link'].'">Clicking here</a>';
        $articleclient_link  = '<a href="'.$parameters['clientartname_link'].'">'.stripslashes($parameters['AO_title']).'</a>';
        $client_link = '<a href="'.$parameters['clientartname_link'].'">click here</a>';
        $editplace='<a href="http://ep-test.edit-place.co.uk">www.edit-place.com</a>';
        $datetime='<b>'.$parameters['datetime_republish'].'</b>';
        $contribnum='<b>'.$parameters['contribnum'].'</b>';
        $sccontribnum='<b>'.$parameters['sccontribnum'].'</b>';
        $articlenum='<b>'.$parameters['articlenum'].'</b>';
		 $max_reception_writer_file_date_hour='<b>'.$parameters['max_reception_writer_file_date_hour'].'</b>';
		 
        $email=$automail->getAutoEmail($mailid);
        $Object=$email[0]['Object'];
        $Message=$email[0]['Message'];
        eval("\$Message= \"$Message\";");
        return $Message;
        /*Inserting into EP mail Box**/
        //$this->sendMailEpMailBox($receiverId,$Object,$Message);
    }
    /*Send mail to EP mail box**/
    public function messageToEPMail($receiverId,$mailid,$parameters)
    {
        $automail=new Ep_Message_AutoEmails();

        $AO_Creation_Date='<b>'.$parameters['created_date'].'</b>';
        $link='<a href="http://ep-test.edit-place.co.uk'.$parameters['document_link'].'">Click here</a>';
        $contributor='<b>'.$parameters['contributor_name'].'</b>';
        $bo_user='<b>'.$parameters['bo_user'].'</b>';

        $AO_title="<b>".$parameters['AO_title']."</b>";
        $submitdate_bo="<b>".$parameters['submitdate_bo']."</b>";
        $total_articles="<b>".$parameters['noofarts']."</b>";
        $invoicelink='<a href="http://ep-test.edit-place.co.uk'.$parameters['invoice_link'].'">Click here</a>';
        $article_link='<a href="'.$parameters['articlename_link'].'">Click here</a>';
        $client='<b>'.$parameters['client_name'].'</b>';
        $royalty='<b>'.$parameters['royalty'].'</b>';
        $ongoinglink='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">Click here</a>';
		$ongoinglinking='<a href="http://ep-test.edit-place.co.uk'.$parameters['ongoinglink'].'">Clicking here</a>';
        $AO_end_date='<b>'.$parameters['AO_end_date'].'</b>';
        $article='<b>'.stripslashes($parameters['article_title']).'</b>';
        $articlewithlink='<a href="'.$parameters['articlename_link'].'">'.stripslashes($parameters['article_title']).'</a>';
        $AO_title='<b>'.stripslashes($parameters['AO_title']).'</b>';
        $inovice_id=$parameters['invoice_id'];
        $aowithlink='<a href="'.$parameters['aoname_link'].'">'.stripslashes($parameters['AO_title']).'</a>';
        $aosearch_link = '<a href="'.$parameters['aoname_link'].'">Click here</a>';
        $articleclient_link  = '<a href="'.$parameters['clientartname_link'].'">'.stripslashes($parameters['AO_title']).'</a>';
        $client_link = '<a href="'.$parameters['clientartname_link'].'">clicking here</a>';
        $site='<a href="http://ep-test.edit-place.co.uk">Edit-place</a>';
        $editplace='<a href="http://ep-test.edit-place.co.uk">www.edit-place.com</a>';
        $resubmit_hours=$parameters['resubmit_hours'];
        $submit_hours="<b>".$parameters['submitdate_bo']."</b>";
        $corrector_ao_link='<a href="'.$parameters['aoname_link'].'">Click here</a>';
		$corrector_ao_linking='<a href="'.$parameters['aoname_link'].'">Clicking here</a>';
        $comments=$parameters['comments'];
        $article_sent_date=$parameters['article_sent_date'];
        $corrector_date='<b>'.$parameters['correcteddate'].'</b>';
        $correctorcomments=$parameters['correctorcomments'];
        $moderatorcomments=$parameters['moderatorcomments'];
        $contributorhome='<a href="http://ep-test.edit-place.co.uk/contrib/home">click here</a>';
		$time_given_to_writer='<b>'.$parameters['time_given_to_writer'].'</b>';
		$max_reception_writer_file_date_hour='<b>'.$parameters['max_reception_writer_file_date_hour'].'</b>';
		
        //Poll Priority contribs
        $poll=$parameters['poll'];
        $date='<b>'.$parameters['date'].'</b>';
        $poll_link=$parameters['poll_link'];
        $price='<b>'.$parameters['price'].'</b>';
        $hours='<b>'.$parameters['hours'].'</b>';

        //archieve email link
        $archive_email_link='<a href="'.$parameters['archive_email_link'].'">clique-ici</a>';


        $email=$automail->getAutoEmail($mailid);
        $Object=$email[0]['Object'];

        $Object=strip_tags($Object);
        eval("\$Object= \"$Object\";");

        $Message=$email[0]['Message'];
        eval("\$Message= \"$Message\";");
        /**Inserting into EP mail Box**/
		
		//Added w.r.t sending email from PM a/c
        if($parameters['mail_from'])
            $mail_from_pm=$parameters['mail_from']; 
        else
            $mail_from_pm=NULL;
        $this->sendMailEpMailBox($receiverId,$Object,$Message,$mail_from_pm);
    }

    public function sendMailEpMailBox($receiverId,$object,$content,$mail_from_pm=NULL)
    {   
        //echo $receiverId ; echo $object; echo $content; exit;
        $sender=$this->adminLogin->userId;
        if($mail_from_pm=='me')
            $sender=$this->adminLogin->userId;
        else  
			$sender='111201092609847';
        $ticket=new Ep_Message_Ticket();
        $ticket->sender_id=$sender;
        $ticket->recipient_id=$receiverId;

        $ticket->title=$object;
        $ticket->status='0';
        $ticket->created_at=date("Y-m-d H:i:s", time());
        try
        {
           
            if($ticket->insert())
            {
                $ticket_id=$ticket->getIdentifier();
                $message=new Ep_Message_Message();
                $message->ticket_id=$ticket_id;
                $message->content=$content;
                $message->type='0' ;
                $message->status='0';
                $message->created_at=$ticket->created_at;
                $message->approved='yes';
                if($mail_from_pm=='me')
                    $message->auto_mail='no';
                else
                    $message->auto_mail='yes';        

                $message->insert();

                

                $messageId=$message->getIdentifier();


                $automail=new Ep_Message_AutoEmails();
                $UserDetails=$automail->getUserType($receiverId);
                $email=$UserDetails[0]['email'];
                $password=$UserDetails[0]['password'];
                $type=$UserDetails[0]['type'];

                if(!$object)
                    $object="You have received an Edit-place email";

                $object=strip_tags($object);

                if($UserDetails[0]['type']=='client')
                {
                    $text_mail="<p>Dear Client,<br><br>
										You have received an email from Edit-Place!<br><br>
										Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
										Regards,<br>
										<br>
										All Edit-Place team</p>"
                    ;
                }
                else if($UserDetails[0]['type']=='contributor')
                {
                    $text_mail="<p>Dear writer,<br><br>
										You have received an email from Edit-Place!<br><br>
										Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
										Regards,<br>
										<br>
										All Edit-Place team</p>"
                    ;
                }
                else
                    $text_mail=$content;

                //Added w.r.t sending email from PM a/c
                 if($mail_from_pm=='me')
                 {
                    $bo_user=$this->getUserDetails($sender);
                    $mail_from=$bo_user[0]['email'];
					if($bo_user[0]['first_name']!="")
						$from_name=$bo_user[0]['first_name'].' '.$bo_user[0]['last_name'];
					else
						$from_name=$bo_user[0]['login'];
                 }
                 else
                 {
                    if($this->getConfiguration('mail_from') == '')
                        $mail_from = "support@edit-place.com";
                    else
                        $mail_from = $this->getConfiguration('mail_from');  
					$from_name='Support Edit-place';	
                 }

                $content = $this->autoLoginlinkReplace($content, $email, $password, $type);
				
				$content.="<br><br>
								You do not wish to receive notifications ? <a href=\"http://ep-test.edit-place.co.uk/user/alert-unsubscribe?uaction=unsubscribe&user=".MD5('ep_login_'.$email)."\">Click here</a>";
                if($UserDetails[0]['alert_subscribe']=='yes')
                {
                    if($this->getConfiguration('critsend') == 'yes')
                    {
                        critsendMail($mail_from, $UserDetails[0]['email'], $object, $text_mail);
                        return true;
                    }
                    else
                    {
                        $mail = new Zend_Mail();
                        $mail->addHeader('Reply-To',$mail_from);
                        $mail->setBodyHtml($content)
                            ->setFrom($mail_from,$from_name)
                            ->addTo($UserDetails[0]['email'])
                            ->setSubject($object);
                        if($mail->send())
                            return true;
                    }
                }
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    ///to send mail to personal mail ids with autologin option
    public function autoLoginlinkReplace($content, $email, $password, $type)
    {
        // preg_match_all('~<a(.*?)href="([^"]+)"(.*?)>~', $content, $matches);
        // $urls = $matches[2];
        preg_match_all("/(?<=href=(\"|'))[^\"']+(?=(\"|'))/",$content,$matches);
        $urls = $matches[0];
        if(count($urls) != 0)
        {
            $alllinks=array("/contrib/aosearch",         "http://ep-test.edit-place.co.uk/contrib/aosearch",
                "/client/quotes",                         "http://ep-test.edit-place.co.uk/client/quotes",
                "/contrib/mission-deliver",               "http://ep-test.edit-place.co.uk/contrib/mission-deliver",
                "/contrib/ongoing",                       "http://ep-test.edit-place.co.uk/contrib/ongoing",
                "/contrib/refused",                       "http://ep-test.edit-place.co.uk/contrib/refused",
                "/contrib/mission-corrector-deliver",     "http://ep-test.edit-place.co.uk/contrib/mission-corrector-deliver",
                "/client/ongoingao",                      "http://ep-test.edit-place.co.uk/client/ongoingao",
                "/client/invoice",                        "http://ep-test.edit-place.co.uk/client/invoice",
                "/contrib/mission-published",             "http://ep-test.edit-place.co.uk/contrib/mission-published",
                "/ftvchaine/index",                       "http://ep-test.edit-place.co.uk/ftvchaine/index",
                "/ftvedito/index",                        "http://ep-test.edit-place.co.uk/ftvedito/index",
                "/contrib/royalties",                     "http://ep-test.edit-place.co.uk/contrib/royalties" );


            $content=stripslashes($content);

            for($i=0; $i<count($urls); $i++)
            {
                $linkarr = explode("?", $urls[$i]); //seperating the domainand and params///
                $domain[$i] = $linkarr[0];
                ///removing the ../ adn replace with / //
                $domain[$i] = str_replace('../','/',$domain[$i]);
                if($linkarr[1]!= '')
                    $params[$i] = $linkarr[1];
                else
                    $params[$i] = '';

                if(in_array($domain[$i], $alllinks))
                {
                    $domaindetials[$i] = explode("/", $domain[$i]); //spliting the domain///
                    $action[$i] = $domaindetials[$i][count($domaindetials[$i])-1];
                    $toURL[$i]="http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&red_to=".$action[$i]."&parameters=".$params[$i];
                    if($params[$i] != '')
                        $content=str_replace($domain[$i]."?".$params[$i],$toURL[$i],$content);
                    else
                        $content=str_replace($domain[$i],$toURL[$i],$content);
                }
            }
            return  $content;
        }else{
            return $content;
        }

        /*$linkarr = explode("?", $links); //seperating the domainand and params///
        $domain = $linkarr[0];
        $params = $linkarr[1];
        if(in_array($domain, $alllinks))
        {
            $domaindetials = explode("/", $domain); //spliting the domain///
            $action = $domaindetials[count($domaindetials)+1];
            $toURL="http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&red_to=".$action."&params=".$params."";
            $content=str_replace($domain,$toURL,$content);
            return $content;
        }else{
            return $content;
        }*/


    }
	
	public function sendMailEpMailBoxPM($receiverId,$object,$content,$mail_from_pm=NULL)
    {   
        //echo $receiverId ; echo $object; echo $content; exit;
        $sender=$this->adminLogin->userId;
        if($mail_from_pm=='me')
            $sender=$this->adminLogin->userId;
        else  
			$sender='111201092609847';
        $ticket=new Ep_Message_Ticket();
        $ticket->sender_id=$sender;
        $ticket->recipient_id=$receiverId;

        $ticket->title=$object;
        $ticket->status='0';
        $ticket->created_at=date("Y-m-d H:i:s", time());
        try
        {
           
            if($ticket->insert())
            {
                $ticket_id=$ticket->getIdentifier();
                $message=new Ep_Message_Message();
                $message->ticket_id=$ticket_id;
                $message->content=$content;
                $message->type='0' ;
                $message->status='0';
                $message->created_at=$ticket->created_at;
                $message->approved='yes';
                 if($mail_from_pm=='me')
                    $message->auto_mail='no';
                else
                    $message->auto_mail='yes';       

                $message->insert();

                

                $messageId=$message->getIdentifier();


                $automail=new Ep_Message_AutoEmails();
                $UserDetails=$automail->getUserType($receiverId);
                $email=$UserDetails[0]['email'];
                $password=$UserDetails[0]['password'];
                $type=$UserDetails[0]['type'];

                if(!$object)
                    $object="You have received an Edit-place email";

                $object=strip_tags($object);

                if($UserDetails[0]['type']=='client')
                {
                    $text_mail="<p>Dear Client,<br><br>
										You have received an email from Edit-Place!<br><br>
										Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
										Regards,<br>
										<br>
										All Edit-Place team</p>"
                    ;
                }
                else if($UserDetails[0]['type']=='contributor')
                {
                    $text_mail="<p>Dear writer,<br><br>
										You have received an email from Edit-Place!<br><br>
										Thank you to <a href=\"http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&message=".$messageId."&ticket=".$ticket_id."\">click</a> here to read it.<br><br>
										Regards,<br>
										<br>
										All Edit-Place team</p>"
                    ;
                }
                else
                    $text_mail=$content;

                 
				 
                if($UserDetails[0]['alert_subscribe']=='yes')
                {
                    //Added w.r.t sending email from PM a/c
					 if($mail_from_pm=='me')
					 {
						$bo_user=$this->getUserDetails($sender);
						$mail_from=$bo_user[0]['email'];
						if($bo_user[0]['first_name']!="")
							$from_name=$bo_user[0]['first_name'].' '.$bo_user[0]['last_name'];
						else
							$from_name=$bo_user[0]['login'];
								$fromURL="http://ep-test.edit-place.co.uk/contrib/aosearch";
								$toURL="http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&red_to=aosearch";
						$content=str_replace($fromURL,$toURL,$content);
						
						$content.="<br><br>
								You do not wish to receive notifications ? <a href=\"http://ep-test.edit-place.co.uk/user/alert-unsubscribe?uaction=unsubscribe&user=".MD5('ep_login_'.$email)."\">Click here</a>";
										
					
						$mailbody=$content;
					 }
					 elseif($mail_from_pm=='editorial')
					 {
						if($this->getConfiguration('mail_from') == '')
							$mail_from = "support@edit-place.com";
						else
							$mail_from = $this->getConfiguration('mail_from');  
						$from_name='Support Edit-place';
								$fromURL="http://ep-test.edit-place.co.uk/contrib/aosearch";
								$toURL="http://ep-test.edit-place.co.uk/user/email-login?user=".MD5('ep_login_'.$email)."&hash=".MD5('ep_login_'.$password)."&type=".$type."&red_to=aosearch";
						$content=str_replace($fromURL,$toURL,$content);
						
						$content.="<br><br>
								You do not wish to receive notifications ? <a href=\"http://ep-test.edit-place.co.uk/user/alert-unsubscribe?uaction=unsubscribe&user=".MD5('ep_login_'.$email)."\">Click here</a>";
										
						
						$mailbody=$content;
					 }
					 else
					 {
						if($this->getConfiguration('mail_from') == '')
							$mail_from = "support@edit-place.com";
						else
							$mail_from = $this->getConfiguration('mail_from');  
						$from_name='Support Edit-place';
						$mailbody=$text_mail;
					 }
				 
					if($this->getConfiguration('critsend') == 'yes')
                    {
                        critsendMail($mail_from, $UserDetails[0]['email'], $object, $text_mail);
                        return true;
                    }
                    else
                    {
                        $mail = new Zend_Mail();
                       // $mail->addHeader('Reply-To',$mail_from);
                        $mail->setBodyHtml($mailbody)
                            ->setFrom($mail_from,$from_name)
                            ->addTo($UserDetails[0]['email'])
                            ->setSubject($object);
                        if($mail->send())
                            return true;
                    }
                }
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }

    }
    /**get the mail object from automails table**/
    public function getMailObject($mailid)
    {
        $automail=new Ep_Message_AutoEmails();
        $email=$automail->getAutoEmail($mailid);
        $Object=$email[0]['Object'];
        $Object=strip_tags($Object);
        eval("\$Object= \"$Object\";");
        return $Object;
    }

    //Send Auto emails w.r.t Quotes
    public function sendQuotePersonalEmail($receiverId,$messageId,$parameters)
    {
        
        $client_obj=new Ep_Quote_Client();
        $sales_user_id=$parameters['sales_user'];
        $sales_user_details=$client_obj->getQuoteUserDetails($sales_user_id);
        if($sales_user_details!='NO')
        {
            if($sales_user_details[0]['first_name'])
                $sales_user=$sales_user_details[0]['first_name'].' '.$sales_user_details[0]['last_name'];
            else
                $sales_user= $sales_user_details[0]['login'];

            if($sales_user_id==$receiverId)
                $to_email=$sales_user_details[0]['email'];            
                            
        }       

        //BO user details
            if($parameters['comment_user'])
            {
                $comment_user_id=$parameters['comment_user'];
                $comment_user_details=$client_obj->getQuoteUserDetails($comment_user_id);
                if($comment_user_details!='NO')
                {
                if($comment_user_details[0]['first_name'])
                    $comment_user='<b>'.$comment_user_details[0]['first_name'].' '.$comment_user_details[0]['last_name'].'</b>';
                else
                    $comment_user='<b>'. $comment_user_details[0]['login'].'</b>';
                }
            }
        $bo_user_id=$parameters['bo_user'];
        $bo_user_details=$client_obj->getQuoteUserDetails($bo_user_id);
        if($bo_user_details!='NO')
        {
            if($bo_user_details[0]['first_name'])
                $bo_user=$bo_user_details[0]['first_name'].' '.$bo_user_details[0]['last_name'];
            else
                $bo_user= $bo_user_details[0]['login'];

             if($bo_user_id==$receiverId)
                $to_email=$bo_user_details[0]['email']; 
        } 


        $send_user=$sales_user='<b>'.$sales_user.'</b>';
        $bo_user='<b>'.$bo_user.'</b>';
        $bo_user_type=$parameters['bo_user_type'];
        $quote_title='<b>'.$parameters['quote_title'].'</b>';
        $quote_title_link='<a href="http://'.$_SERVER['HTTP_HOST'].$parameters['quote_title_link'].'">'.$parameters['quote_title'].'</a>';
        $challenge_time=date("d/m/Y H:i",strtotime($parameters['challenge_time']));
        $followup_link='<a href="http://'.$_SERVER['HTTP_HOST'].$parameters['followup_link'].'">cliquant ici</a>';
        $followup_link_en='<a href="http://'.$_SERVER['HTTP_HOST'].$parameters['followup_link_en'].'">click here</a>';
        $challenge_link='<a href="http://'.$_SERVER['HTTP_HOST'].$parameters['challenge_link'].'">cliquer ici</a>';
        $validate_link='<a href="http://'.$_SERVER['HTTP_HOST'].$parameters['validate_link'].'">Cliquez-ici</a>';
        $challenge_hours=$parameters['challenge_hours'];
        $sales_suggested_price='<b>'.$parameters['sales_suggested_price'].'</b>';
		$client_name='<b>'.$parameters['client_name'].'</b>';
        $challenge_type=$parameters['challenge_type'];
        $turn_over='<b>'.$parameters['turn_over'].'</b>';
        $quote_version='<b>'.$parameters['quote_version'].'</b>';
        $relance_comment='<b>'.$parameters['relance_comment'].'</b>';
        $closed_reason='<b>'.$parameters['closed_reason'].'</b>';
        $closed_comments=$parameters['closed_comments']; 
        $comment=$parameters['comment'];  
        $date_time=$parameters['date_time']; 
        $photo='<img src='.$parameters['photo'].'>';        
        if($parameters['prod_only_text']=='yes')
            $prod_only_text='Le devis est donc de nouveau &agrave; valider de votre c&ocirc;t&eacute; <br><br>';
        
        $bo_user_comments=$parameters['bo_user_comments'];
		$currency=$parameters['currency'];

        $email=$this->getAutoEmail($messageId);
        $Object=$email[0]['Object'];        
        eval("\$Object= \"$Object\";");
        $Object=strip_tags($Object);

        $Message=$email[0]['Message'];
        eval("\$Message= \"$Message\";");

     //  echo $Object."<br>".$Message;exit;

        if($this->getConfiguration('mail_from') == '')
            $mail_from = "work@edit-place.com";
        else
            $mail_from = $this->getConfiguration('mail_from');

         $mail_from= "work@edit-place.com";
        $to_email='bo-test@edit-place.com';

        if($to_email!="")
        {
            if($this->getConfiguration('critsend') == 'yes')
            {
                critsendMail($mail_from, $to_email, $Object, $Message);
                return true;
            }
            else
            {
                $mail = new Zend_Mail();
                $mail->addHeader('Reply-To',$mail_from);
                $mail->setBodyHtml($Message)
                    ->setFrom($mail_from,'Workplace')
                    ->addTo($to_email)
                  //  ->addCc('naveen@edit-place.com')
                    ->setSubject($Object);
                if($mail->send())
                    return true;
            }
        }
    }

	/* Contract Emails */
	function sendContractEmail($to_email,$message_id,$parameters)
	{
		$mail_from = "support@edit-place.com";
		
		$email=$this->getAutoEmail($message_id);
		
        $Object=$email[0]['Object'];        
        eval("\$Object= \"$Object\";");
        $Object=strip_tags($Object);

		$contract_name = $parameters['contract_name'];
		$comments = $parameters['comments'];
		$missiontype = $parameters['missiontype'];
		$assigned_by = $parameters['assigned_by'];
		$missionname = $parameters['missionname'];
		$assigned_to = $parameters['assigned_to'];
		
        $Message=$email[0]['Message'];
        eval("\$Message= \"$Message\";");
		
		/*  $mail = new Zend_Mail();
		$mail->addHeader('Reply-To',$mail_from);
		$mail->setBodyHtml($Message)
			->setFrom($mail_from)
			->addTo($to_email)
			->setSubject($Object);
		if($mail->send())
			return true;  */
	}
	
	/* Send Personal Email used in CMD */
	function sendEMail($mail_from='work@edit-place.com',$message,$to_email,$subject,$attachement=false)
	{

		$mail_from='work@edit-place.com';
		$to_email='bo-test@edit-place.com';

		if($this->getConfiguration('critsend') == 'yes')
        {
            critsendMail($mail_from, $to_email, $subject, $message);
            return true;
        }
        else
        {
			$mail = new Zend_Mail();
            $mail->addHeader('Reply-To',$mail_from);
			$mail->setBodyHtml(stripslashes($message))
				->setFrom($mail_from,'Workplace')
				->addTo($to_email)
				->setSubject(stripslashes($subject));
            if($attachement){
                $fullattched = $attachement;
                $at = new Zend_Mime_Part(file_get_contents($fullattched)); //.xls is included in the filename
                $at->type = 'application/octet-stream';
                $at->disposition = Zend_Mime::DISPOSITION_ATTACHMENT;
                $at->encoding = Zend_Mime::ENCODING_BASE64;
                $at->filename = basename($fullattched); //.xls is included in the filename
                $mail->addAttachment($at);
            }
            if($mail->send())
				return true;  
		}
	}
}