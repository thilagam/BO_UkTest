<?

/************ session registration *************/
//multiple domain cookie
session_set_cookie_params(0,'/',$config->www->domain);
session_name('PHPSESSIDTEST');
if(isset($_COOKIE['PHPSESSIDTEST']))session_id($_COOKIE['PHPSESSIDTEST']);

// Process session by farid
$userSession = new Zend_Session_Namespace('session');
Zend_Registry::set('session', $userSession);

// Start Session by ram
$userSession = new Zend_Session_Namespace('userSession');
Zend_Registry::set('userSession', $userSession);

// Start Session by ram
$customerSession = new Zend_Session_Namespace('customerSession');
Zend_Registry::set('customerSession', $customerSession);

// Start Session - milan
$rsession = new Zend_Session_Namespace('resultSession');
Zend_Registry::set('resultSession', $rsession);


//start Session - shiva
$adminLogin = new Zend_Session_Namespace('adminLogin');
Zend_Registry::set('adminLogin', $adminLogin);

//start Session - chandu
$mainMenu = new Zend_Session_Namespace('mainMenu');
Zend_Registry::set('mainMenu', $mainMenu);

$subMenu = new Zend_Session_Namespace('subMenu');
Zend_Registry::set('subMenu', $subMenu);

$listcategories = new Zend_Session_Namespace('listcategories');
Zend_Registry::set('listcategories', $listcategories);

$ao_creation = new Zend_Session_Namespace('AO_creation');
Zend_Registry::set('AO_creation', $ao_creation);

$seo_upload_files = new Zend_Session_Namespace('seo_upload_files');
Zend_Registry::set('seo_upload_files', $seo_upload_files);

$searchSession = new Zend_Session_Namespace('searchSession');
Zend_Registry::set('searchSession', $searchSession);

$poll_creation = new Zend_Session_Namespace('Poll_creation');
Zend_Registry::set('Poll_creation', $poll_creation);

$quizz_creation = new Zend_Session_Namespace('QZ_creation');
Zend_Registry::set('QZ_creation', $quizz_creation);

$quizz_modify = new Zend_Session_Namespace('QZ_modify');
Zend_Registry::set('QZ_modify', $quizz_modify);

$quizz_duplicate = new Zend_Session_Namespace('QZ_duplication');
Zend_Registry::set('QZ_duplication', $quizz_duplicate);


$quote_creation = new Zend_Session_Namespace('Quote_creation');
Zend_Registry::set('Quote_creation', $quote_creation);

/*new HOQ session*/
$quote_creation_new = new Zend_Session_Namespace('Quote_creation_new');
Zend_Registry::set('Quote_creation_new', $quote_creation_new);

$recruitment = new Zend_Session_Namespace('recruitment');
Zend_Registry::set('recruitment', $recruitment);