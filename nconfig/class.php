<?//zend resources
// require zend loader class
require_once ROOT_PATH.'Zend/Loader.php';

Zend_Loader::loadClass('Zend_View');
Zend_Loader::loadClass('Zend_Controller_Front');
Zend_Loader::loadClass('Zend_Config_Ini');
Zend_Loader::loadClass('Zend_Registry');
Zend_Loader::loadClass('Zend_Session_Namespace');
Zend_Loader::loadClass('Zend_Currency');
//Zend_Loader::loadClass('Zend_Paginator');
Zend_Loader::loadClass('Zend_Paginator');
Zend_Loader::loadClass('Zend_View_Helper_PaginationControl');
Zend_Loader::loadClass('Zend_Http_Client');

//mail files
Zend_Loader::loadClass('Zend_Mail');
//require_once 'library/tools/emailModel.php';

//pdf files
Zend_Loader::loadClass('Zend_Pdf');

//milan : database package
Zend_Loader::loadClass('Ep_Db_DbController');
Zend_Loader::loadClass('Ep_Db_DbTable');
Zend_Loader::loadClass('Ep_Db_Identifier');

//shiva : database package
Zend_Loader::loadClass('Ep_Db_Xml');
Zend_Loader::loadClass('Ep_Db_XmlDb');
Zend_Loader::loadClass('Ep_Db_NewXmlDb');
Zend_Loader::loadClass('Ep_Db_ArrayDb');
Zend_Loader::loadClass('Ep_Db_ArrayDb2');

Zend_Loader::loadClass('Ep_Db_Category');
Zend_Loader::loadClass('Ep_Db_Contract');
Zend_Loader::loadClass('Ep_Db_AdminTrack');

//farid : controller package
Zend_Loader::loadClass('Ep_Controller_Action');
Zend_Loader::loadClass('Ep_Controller_View');
Zend_Loader::loadClass('Ep_Controller_Page');
Zend_Loader::loadClass('Ep_Controller_Module');
Zend_Loader::loadClass('Ep_Controller_Pattern');
Zend_Loader::loadClass('Ep_Controller_Balance');

Zend_Loader::loadClass('Ep_Delivery_Article');
Zend_Loader::loadClass('Ep_Delivery_ArticleProcess');
Zend_Loader::loadClass('Ep_Delivery_ArticleReassignReasons');
Zend_Loader::loadClass('Ep_Delivery_Delivery');
Zend_Loader::loadClass('Ep_Delivery_Options');
Zend_Loader::loadClass('Ep_Delivery_DeliveryOptions');
Zend_Loader::loadClass('Ep_Delivery_Configuration');
Zend_Loader::loadClass('Ep_Delivery_Poll');
Zend_Loader::loadClass('Ep_Delivery_Pollarticle');
Zend_Loader::loadClass('Ep_Delivery_quizz');
Zend_Loader::loadClass('Ep_Delivery_ArticleHistory');
Zend_Loader::loadClass('Ep_Delivery_MissionTemplate');
Zend_Loader::loadClass('Ep_Delivery_Pollconfiguration');
Zend_Loader::loadClass('Ep_Delivery_Pollquestion');
Zend_Loader::loadClass('Ep_Delivery_Pollbrief');
Zend_Loader::loadClass('Ep_Delivery_CategoryDifficultyPercent');
Zend_Loader::loadClass('Ep_Delivery_LanguageSMIC');
Zend_Loader::loadClass('Ep_Delivery_Pricenbwords');
Zend_Loader::loadClass('Ep_Delivery_ArticleActions');
Zend_Loader::loadClass('Ep_Delivery_Adcomments');
Zend_Loader::loadClass('Ep_Delivery_PlagStuckComments');


Zend_Loader::loadClass('Ep_Message_Message');
Zend_Loader::loadClass('Ep_Message_Ticket');
Zend_Loader::loadClass('Ep_Message_Attachment');
Zend_Loader::loadClass('Ep_Message_Template');
Zend_Loader::loadClass('Ep_Message_AutoEmails');
Zend_Loader::loadClass('Ep_Message_ContactUs');
Zend_Loader::loadClass('Ep_Message_UserComments');
Zend_Loader::loadClass('Ep_Message_Newsletter');
Zend_Loader::loadClass('Ep_Message_NewsletterMessage');

Zend_Loader::loadClass('Ep_Participation_Participation');
Zend_Loader::loadClass('Ep_Participation_CorrectorParticipation');

Zend_Loader::loadClass('Ep_Payment_Payment');
Zend_Loader::loadClass('Ep_Payment_Royalties');
Zend_Loader::loadClass('Ep_Payment_Invoice');
Zend_Loader::loadClass('Ep_Payment_PaymentArticle');

Zend_Loader::loadClass('Ep_User_UserPlus');
Zend_Loader::loadClass('Ep_User_User');
Zend_Loader::loadClass('Ep_User_UserGroupAccess');
Zend_Loader::loadClass('Ep_User_LockSystem');
Zend_Loader::loadClass('Ep_User_Contributor');
Zend_Loader::loadClass('Ep_User_Client');
Zend_Loader::loadClass('Ep_User_Image');
Zend_Loader::loadClass('Ep_User_SaveSearch');
Zend_Loader::loadClass('Ep_User_RecentActivities');
Zend_Loader::loadClass('Ep_User_ContributorExperience');
Zend_Loader::loadClass('Ep_User_AdComments');
Zend_Loader::loadClass('Ep_Antiword_Antiword');
Zend_Loader::loadClass('Ep_User_ProfileChangeLog');
Zend_Loader::loadClass('Ep_User_WhitebookDownloads');
Zend_Loader::loadClass('Ep_User_Jobs');
Zend_Loader::loadClass('Ep_User_Theteam');
Zend_Loader::loadClass('Ep_User_Partners');
Zend_Loader::loadClass('Ep_User_References');
Zend_Loader::loadClass('Ep_User_UserLogins');
Zend_Loader::loadClass('Ep_User_UserLogs');//added by naseer on 09-11-2015//

//contract classes
Zend_Loader::loadClass('Ep_Contract_Contract');
Zend_Loader::loadClass('Ep_Contract_Delivery');
Zend_Loader::loadClass('Ep_Contract_Article');


//ongoing Classes
Zend_Loader::loadClass('Ep_Ongoing_Article');
Zend_Loader::loadClass('Ep_Ongoing_Delivery');
Zend_Loader::loadClass('Ep_Ongoing_Participation');
Zend_Loader::loadClass('Ep_Ongoing_CorrectorParticipation');

//Scraper class
Zend_Loader::loadClass('Ep_Scraper_Scraper');
Zend_Loader::loadClass('Ep_Scraper_Blacklist');
Zend_Loader::loadClass('Ep_Scraper_Broken');
Zend_Loader::loadClass('Ep_Scraper_Orphan');
Zend_Loader::loadClass('Ep_Scraper_Crawl');

Zend_Loader::loadClass('Ep_Quizz_Quizz');
Zend_Loader::loadClass('Ep_Seo_Frequency');

//stats Class
Zend_Loader::loadClass('Ep_Statistics_Stats');
Zend_Loader::loadClass('Ep_Quote_QuotesHistory');


//BO quotes page
Zend_Loader::loadClass('Ep_epcontract_Contract');

Zend_Loader::loadClass('Ep_Quote_Client');
Zend_Loader::loadClass('Ep_Quote_ClientContacts');
Zend_Loader::loadClass('Ep_Quote_Mission');
Zend_Loader::loadClass('Ep_Quote_ProdMissions');
Zend_Loader::loadClass('Ep_Quote_QuoteMissions');
Zend_Loader::loadClass('Ep_Quote_Quotes');
Zend_Loader::loadClass('Ep_Quote_QuotesLog');
Zend_Loader::loadClass('Ep_Quote_QuotesHistory');
Zend_Loader::loadClass('Ep_Quote_TechMissions');
Zend_Loader::loadClass('Ep_Quote_Quotecontract');
Zend_Loader::loadClass('Ep_Quote_Survey');
Zend_Loader::loadClass('Ep_Quote_Recruitment');
Zend_Loader::loadClass('Ep_Quote_Delivery');
Zend_Loader::loadClass('Ep_Quote_Cron');
Zend_Loader::loadClass('Ep_Quote_ArtDelHistory');
Zend_Loader::loadClass('Ep_Quote_Task');
Zend_Loader::loadClass('Ep_Quote_Ongoing');
Zend_Loader::loadClass('Ep_Quote_DeliveryRepeat');
Zend_Loader::loadClass('Ep_Quote_Invoice');
Zend_Loader::loadClass('Ep_Quote_Stats');
Zend_Loader::loadClass('Ep_Quote_HistoryQuoteMissions');
Zend_Loader::loadClass('Ep_Quote_TechMissionTypes');
Zend_Loader::loadClass('Ep_Quote_TempoEmailsTrack');

//added by naseer on 12.08.2015
Zend_Loader::loadClass('Ep_Ebookers_Managelist');
//Zend_Loader::loadClass('Ep_Ebookers_Managelist2');
Zend_Loader::loadClass('Ep_Ebookers_Stencils');
Zend_Loader::loadClass('Ep_Ebookers_Report');//by Arun
//added by naseer on 23.02.2016
Zend_Loader::loadClass('Ep_Bnp_Managelist');
Zend_Loader::loadClass('Ep_Bnp_Bnp');
/* Workplace Turnover */
Zend_Loader::loadClass('Ep_Quote_Turnover');
/* rosemaria test 31.03.2016 */
Zend_Loader::loadClass('Ep_Searchtest_Search');

