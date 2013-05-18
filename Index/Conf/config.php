<?php
	/*
	*数据库配置
	*/
	$dbConfig = array();
    // 定义应用的配置所有目录的常量
    if(!defined('SYS_CONFIG_PATH')) {
        define('SYS_CONFIG_PATH', dirname(__file__));
    }
    // 定义应用数据库配置目录的常量
    if(!defined('SYS_DB_CONFIG_PATH')) {
        $tmpDir = realpath(str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, SYS_CONFIG_PATH . '/../../../../'));
        $tmpDir .= (substr($tmpDir, -1, 1) != DIRECTORY_SEPARATOR) ? DIRECTORY_SEPARATOR : ''; 
        define('SYS_DB_CONFIG_PATH', $tmpDir);
    }

    // 定义应用的目录
    if(!defined('SYS_ROOT_PATH')) {
        $tmpDir = realpath(str_replace(array('/', '\\'), DIRECTORY_SEPARATOR, SYS_CONFIG_PATH . '/../../../'));
        $tmpDir .= (substr($tmpDir, -1, 1) != DIRECTORY_SEPARATOR) ? DIRECTORY_SEPARATOR : '';
        $urlSplits = explode('/',$_SERVER['REQUEST_URI']);
        $systemPath = $tmpDir.$urlSplits[1];
        define('SYS_ROOT_PATH', $systemPath);
    }
    // 应用的数据库配置文件
    $configFile = SYS_DB_CONFIG_PATH . 'orange.db.config';
    if(is_file($configFile)){
        $configs = @parse_ini_file($configFile,true);
        if ($configs[SYS_ROOT_PATH]) {
            $dbConfig = $configs[SYS_ROOT_PATH];
        }
        else if($configs['*']) {
            $dbConfig 	= $configs['*'];
            if(!isset($dbConfig['DB_NAME'])) {
                $paths 					= explode('/', $_SERVER['REQUEST_URI']);
                $dbConfig['DB_NAME'] 	= $paths[1];
            }
        }
    }
    //线上数据库的配置
	$siteAry = array(
		'DB_TYPE'=> 'mysql', 
	//	'DB_HOST'=> 'localhost',
		'DB_NAME'=>'orange', 
	//	'DB_USER'=>'root', 
	//	'DB_PWD'=>'1234', 
		'DB_PORT'=>'3306',
		'DB_PREFIX'=>''
	);
	
	return array_merge($dbConfig, $siteAry);
?>
