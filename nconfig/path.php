<?

//BO domain name
define('BO_DOMAIN_','http://admin-test.edit-place.co.uk/');

//BO domain path
define('BO_PATH_','BO/');
define('BO_PATH','/BO');

//FO domain path
define('FO_PATH_','FO/');

//root path
define('ROOT_PATH','/home/sites/site8/web/');

//resources path
define('RESOURCES_PATH','/home/sites/site8/users/');

//html cache path
define('HTML_PATH','/home/sites/site8/html/');

//VDS cache path
define('SSD_CACHE_PATH','/home/sites/site8/data_s117/');

//spec file path
define('SPEC_FILE_PATH','/home/sites/site7/web/FO/client_spec');

// Set application root path
define('APP_PATH_ROOT', ROOT_PATH. BO_PATH_);

//Black list kws folder path
define('BLKWS_PATH','clientblkws/');

// Set environment root path
define('ENV_PATH_ROOT',  ROOT_PATH);

// Set model root path
define('MODEL_PATH_ROOT', ROOT_PATH . BO_PATH_ . 'models/');

// Set the view script root path
define('SCRIPT_VIEW_PATH',  ROOT_PATH . BO_PATH_ . 'views/scripts/');

// Set the versions script root path
define('SCRIPT_VERSION_PATH',  ROOT_PATH . BO_PATH_ . 'views/versions/');

// Set the view compile root path
define('COMPILE_PATH',  ROOT_PATH . BO_PATH_ . 'views/compile/');

// Set the view cache root path
define('CACHE_PATH',  ROOT_PATH . BO_PATH_ . 'views/cache/');

// Set the data path
define('DATA_PATH',  RESOURCES_PATH . 'xmldb_editplace/');

// Set the library path
define('LIB_PATH',  ROOT_PATH . 'library/');

// Set the library path
define('SMARTY_PATH',  ROOT_PATH . 'library/Smarty/');

// Set the config path
define('CONFIG_PATH',  ROOT_PATH . BO_PATH_ . 'nconfig/');

// Seo tools -- Upload path
define('SEO_UPLOAD_POS',  ROOT_PATH . BO_PATH_ . 'seo_upload/position/');
define('SEO_UPLOAD_GSUGGEST',  ROOT_PATH . BO_PATH_ . 'seo_upload/gsuggest/');
define('SEO_UPLOAD_PLAG',  ROOT_PATH . BO_PATH_ . 'seo_upload/plagiarism/');
define('SEO_UPLOAD_POS_COMP',  ROOT_PATH . BO_PATH_ . 'seo_upload/seopositioncompare/');
define('SEO_UPLOAD_LKWS',  ROOT_PATH . BO_PATH_ . 'seo_upload/longtailkws/');
define('SEO_UPLOAD_FBTWITTER',  ROOT_PATH . BO_PATH_ . 'seo_upload/fbtwitter/');
define('SEO_UPLOAD_GNEWS',  ROOT_PATH . BO_PATH_ . 'seo_upload/gnews/');
define('SEO_UPLOAD_PR',  ROOT_PATH . BO_PATH_ . 'seo_upload/pagerank/');
define('SEO_UPLOAD_KW_GENERATOR',  ROOT_PATH . BO_PATH_ . 'seo_upload/kwgenerator/');
define('SEO_UPLOAD_FREQUENCY',  ROOT_PATH . BO_PATH_ . 'seo_upload/frequency/');
define('SEO_UPLOAD_FBLIKESHARE',  ROOT_PATH . BO_PATH_ . 'seo_upload/fblikeshare/');
define('SEO_FB_XML',  'seo_upload/fblikeshare/xmls/');

// Seo tools -- Download path
define('SEO_DOWNLOAD_POS',  ROOT_PATH . BO_PATH_ . 'seo_download/position/');
define('SEO_DOWNLOAD_GSUGGEST',  ROOT_PATH . BO_PATH_ . 'seo_download/gsuggest/');
define('SEO_DOWNLOAD_PLAG',  ROOT_PATH . BO_PATH_ . 'seo_download/plagiarism/');
define('SEO_DOWNLOAD_PLAG_',  'seo_download/plagiarism/');
define('SEO_PLAG_',  'plagarism/');
define('SEO_DOWNLOAD_POS_COMP',  ROOT_PATH . BO_PATH_ . 'seo_download/seopositioncompare/');
define('SEO_DOWNLOAD_COMP',  ROOT_PATH . BO_PATH_ . 'seo_download/seocompare/');
define('SEO_DOWNLOAD_LKWS',  ROOT_PATH . BO_PATH_ . 'seo_download/longtailkws/');
define('SEO_DOWNLOAD_FBTWITTER',  ROOT_PATH . BO_PATH_ . 'seo_download/fbtwitter/');
define('SEO_DOWNLOAD_GNEWS',  ROOT_PATH . BO_PATH_ . 'seo_download/gnews/');
define('SEO_DOWNLOAD_PR',  ROOT_PATH . BO_PATH_ . 'seo_download/pagerank/');
define('SEO_DOWNLOAD_KW_GENERATOR',  ROOT_PATH . BO_PATH_ . 'seo_download/kwgenerator/');
define('SEO_DOWNLOAD_FREQUENCY',  ROOT_PATH . BO_PATH_ . 'seo_download/frequency/');
define('SEO_DOWNLOAD_LINKS',  ROOT_PATH . BO_PATH_ . 'seo_download/links/');
define('SEO_DOWNLOAD_SCRAPER',  ROOT_PATH . BO_PATH_ . 'seo_download/scraper/');
define('SEO_DOWNLOAD_WIKI',  ROOT_PATH . BO_PATH_ . 'seo_download/wiki/');
define('SEO_DOWNLOAD_FBLIKESHARE',  ROOT_PATH . BO_PATH_ . 'seo_download/fblikeshare/');
define('SEO_ARTICLES',  'articles/');

// sftp file
define('SEO_SFTP_FILE',  ROOT_PATH . BO_PATH_ . 'nlibrary/script/Net/SFTP.php');

// Xls reader file - php
define('SEO_XLS_READER',  ROOT_PATH . BO_PATH_ . 'nlibrary/script/reader.php');

// html to doc - php
define('SEO_HTML_TO_DOC',  ROOT_PATH . BO_PATH_ . 'nlibrary/script/html_to_doc.inc.php');

// xlsx class - php
define('SEO_XLSX_READER',  ROOT_PATH . BO_PATH_ . 'simplexlsx.class.php');

// Include xls writer
define('SEO_XLS_WRITER_INCLUDE',  'Spreadsheet/Excel/Writer.php');

// File convertion - php
define('SEO_FILE_CONVERTION',  ROOT_PATH . BO_PATH_ . 'nlibrary/script/filecontent.php');

// Ruby constants
define('SEO_RB_SWITCH_PREFIX', 'source ~/.rvm/scripts/rvm; rvm use 1.9.3-head ');
define('SEO_RVM_NOTATION', 'Using /home/oboulo/.rvm/gems/ruby-1.9.3-head');

// facebook api url
define('FBAPI', "https://api.facebook.com/method/fql.query?query=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count%20FROM%20link_stat%20WHERE%20url%20IN%20");

// twitter api url
define('TWITERAPI', 'http://urls.api.twitter.com/1/urls/count.json?url=');

// utf-8 header
define('HTML_UTF_HEADER', '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>');

// Ruby execution files
define('SEO_TAG_RB', "checkscript.rb");
define('SEO_TAG_SAVE_RB', "validate_save_info.rb");
define('SEO_TAG_EXEC', "./test_check_script.sh ");

define('SEO_LONG_KW_RB', "longkeyword.rb");
define('SEO_LONG_KW_EXEC', "./test_long_keyword_exec.sh ");
define('SEO_GNEWS_RB', "keyword_url_hlink.rb");
define('SEO_GNEWS_EXEC', "./test_ep_keyword_exec.sh ");
define('SEO_GNEWS_UPLOAD', "./test_google_news_upload.sh ");
define('SEO_GNEWS_DOWNLOAD', "./test_google_news_download.sh ");

define('SEO_PR_RB', "page_rank.rb");
define('SEO_PR_EXEC', "./test_page_ranker.sh ");
define('SEO_PR_UPLOAD', "./test_page_ranker_upload.sh ");
define('SEO_PR_DOWNLOAD', "./test_page_ranker_download.sh ");

define('SEO_KW_GENERATOR_RB', "meta_keyword.rb");
define('SEO_KW_GENERATOR_EXEC', "./test_meta_keyword_generator.sh ");
define('SEO_KW_GENERATOR_UPLOAD', "./test_meta_keyword_generator_upload.sh ");
define('SEO_KW_GENERATOR_DOWNLOAD', "./test_meta_keyword_generator_download.sh ");

define('SEO_SCRAPER_RB', "scrapper.rb");
define('SEO_SCRAPER_EXEC', "./test_ep_scrapper.sh");
define('SEO_SCRAPER_DOWNLOAD', "./test_ep_scrapper_download.sh");

define('SEO_BROKEN_URLS_RB', "broken.rb");
define('SEO_BROKEN_URLS_EXEC', "./test_ep_broken.sh");
define('SEO_BROKEN_URLS_DOWNLOAD', "./test_ep_broken_download.sh");

define('SEO_ORPHAN_URLS_RB', "orphan.rb");
define('SEO_ORPHAN_URLS_EXEC', "./test_ep_orphan.sh");
define('SEO_ORPHAN_URLS_DOWNLOAD', "./test_ep_orphan_download.sh");

define('SEO_LINKS_RB', "check_link.rb");
define('SEO_LINKS_EXEC', "./test_ep_linksearch.sh");
define('SEO_LINKS_DOWNLOAD', "./test_ep_linksearch_download.sh");

define('SEO_UPDATE_GOOGLE_URL_RB', "update_url.rb");
define('SEO_UPDATE_GOOGLE_URL_EXEC', "./test_url_update.sh ");

define('SEO_FB_TWITTER_RB', "fbtwitter.rb");
define('SEO_FB_TWITTER_EXEC', "./test_fbtwitter.sh ");
define('SEO_FB_TWITTER_UPLOAD', "./test_fbtwitter_upload.sh ");
define('SEO_FB_TWITTER_DOWNLOAD', "./test_fbtwitter_download.sh ");

define('SEO_FB_TWITTER_PHP', "fblikesharecount.php");
define('SEO_FB_TWITTER_PHP_EXEC', "./test_fbtwitter_php.sh");
define('SEO_FB_TWITTER_PHP_UPLOAD', "./test_fbtwitter_upload_php.sh");
define('SEO_FB_TWITTER_PHP_DOWNLOAD', "./test_fbtwitter_download_php.sh");

define('SEO_COMPARE_RB', "marketing.rb");
define('SEO_COMPARE_EXEC', "./test_marketing.sh ");
define('SEO_COMPARE_DOWNLOAD', "./test_marketing_download.sh");

define('SEO_POSITION_COMPARE_RB', "position_compare.rb");
define('SEO_POSITION_COMPARE_EXEC', "./test_position_compare.sh ");
define('SEO_POSITION_COMPARE_UPLOAD', "./test_position_compare_upload.sh");
define('SEO_POSITION_COMPARE_DOWNLOAD', "./test_position_compare_download.sh");

define('SEO_POSITION_EXEC', "./test_ep_position.sh ");

define('SEO_POSITION_RB', "v1test.rb");
define('SEO_POSITION_RB2', "v7test.rb");
define('SEO_POSITION_RB3', "v10test.rb");
define('SEO_POSITION_RB4', "v11test.rb");
define('SEO_POSITION_RB5', "v12test.rb");
define('SEO_POSITION_SCHEDULE_RB', "position_save_file_info.rb");

define('SEO_POSITION_UPLOAD5', "./test_ep_uploadv12.sh ");
define('SEO_POSITION_UPLOAD4', "./test_ep_uploadv11.sh ");
define('SEO_POSITION_UPLOAD3', "./test_ep_uploadv10.sh ");
define('SEO_POSITION_UPLOAD2', "./test_ep_uploadv7.sh ");
define('SEO_FREQUENCY_UPLOAD', "./test_ep_frequency_upload.sh ");
define('SEO_POSITION_UPLOAD', "./test_ep_uploadv1.sh ");

define('SEO_POSITION_DOWNLOAD5', "./test_ep_download_v12.sh ");
define('SEO_POSITION_DOWNLOAD4', "./test_ep_download_v11.sh ");
define('SEO_POSITION_DOWNLOAD3', "./test_ep_download_v10.sh ");
define('SEO_POSITION_DOWNLOAD2', "./test_ep_download_v7.sh ");
define('SEO_FREQUENCY_DOWNLOAD', "./test_ep_frequency_download.sh ");
define('SEO_POSITION_DOWNLOAD', "./test_ep_download_v1.sh ");

define('SEO_PLAG_RB', "check_backup.rb");
define('SEO_PLAG2_RB', " check_url_plag.rb");
define('SEO_PLAG_EXEC', "./test_ep_plag_exec.sh ");
define('SEO_PLAG_UPLOAD', "./test_ep_plag_upload.sh");
define('SEO_PLAG_DOWNLOAD', "./test_ep_plag_download.sh");

define('SEO_FREQUENCY_RB', "render_frequency.rb");
define('SEO_FREQUENCY_EXEC', "./test_ep_frequency_exec.sh ");
define('SEO_FREQUENCY_DOWNLOAD', "./test_ep_frequency_zip_download.sh");

define('SEO_GSUGGEST_RB', "soovle.rb");
define('SEO_GSUGGEST_EXEC', "./test_soovle.sh ");
define('SEO_GSUGGEST_UPLOAD', "./test_soovle_upload.sh");
define('SEO_GSUGGEST_DOWNLOAD', "./test_soovle_download.sh");

// seo messages
define('SEO_SUCCESS_MSG1', "Requ&#234;te trait&#233;e");//File Successfully uploaded and processed
define('SEO_SUCCESS_MSG2', "Output created successfully");
define('SEO_SUCCESS_MSG3', "Processed successfully");
define('SEO_DOWN_OP_FILE', "T&#233;l&#233;charger les fichier de r&#233;sultats");//Download the processed file
define('SEO_DOWN_RESULT_FILE', "Download the result file");
define('SEO_VIEW_RESULTS', "Voir r&#233;sultats");//View result
define('SEO_TBL_TG', '<table class="table table-striped table-bordered dTableR" id="smpl_tbl">');
define('SEO_TBL_TG_', '</table>');

// --Ruby execution files--

// SSH Credentials for TOR
define('SSH2_SERVER', "50.116.62.9");
define('SSH2_USER', "oboulo");
define('SSH2_PWD', "3DitP1ace");


/*added by naseer */
define('FO_ARTICLE_PATH', ROOT_PATH."FO/articles/");
/*end of added by naseer */
// Set include path
set_include_path('.:/usr/share/php/:/usr/share/pear/'. PATH_SEPARATOR . ENV_PATH_ROOT . PATH_SEPARATOR .MODEL_PATH_ROOT . PATH_SEPARATOR . ENV_PATH_ROOT . PATH_SEPARATOR . APP_PATH_ROOT);

/* *** added on 14.04.2016 rose *** */
define('ASSETS',ROOT_PATH.'BO/assets/');
define('FO_ARTICLE', "/home/sites/site7/web/FO/articles/");
/* ***end added on 14.04.2016 rose *** */