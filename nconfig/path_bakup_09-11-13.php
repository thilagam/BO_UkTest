<?

//root path
define('ROOT_PATH','/home/sites/site4/web/');

//resources path
define('RESOURCES_PATH','/home/sites/site4/users/');

//html cache path
define('HTML_PATH','/home/sites/site4/html/');

//VDS cache path
define('SSD_CACHE_PATH','/home/sites/site4/data_s117/');

// Set application root path
define('APP_PATH_ROOT', ROOT_PATH. 'BO/');

// Set environment root path
define('ENV_PATH_ROOT',  ROOT_PATH);

// Set model root path
define('MODEL_PATH_ROOT', ROOT_PATH . 'BO/models/');

// Set the view script root path
define('SCRIPT_VIEW_PATH',  ROOT_PATH . 'BO/views/scripts/');

// Set the versions script root path
define('SCRIPT_VERSION_PATH',  ROOT_PATH . 'BO/views/versions/');

// Set the view compile root path
define('COMPILE_PATH',  ROOT_PATH . 'BO/views/compile/');

// Set the view cache root path
define('CACHE_PATH',  ROOT_PATH . 'BO/views/cache/');

// Set the data path
define('DATA_PATH',  RESOURCES_PATH . 'xmldb_editplace/');

// Set the library path
define('LIB_PATH',  ROOT_PATH . 'library/');

// Set the library path
define('SMARTY_PATH',  ROOT_PATH . 'library/Smarty/');

// Set the config path
define('CONFIG_PATH',  ROOT_PATH . 'BO/nconfig/');


// Set include path
set_include_path('.:/usr/share/php/:/usr/share/pear/'. PATH_SEPARATOR . ENV_PATH_ROOT . PATH_SEPARATOR .MODEL_PATH_ROOT . PATH_SEPARATOR . ENV_PATH_ROOT . PATH_SEPARATOR . APP_PATH_ROOT);
