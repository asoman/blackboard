<?phpfunction __autoload($classname){	switch($classname[0])	{		case 'C':			include_once("c/$classname.php");			break;		case 'M':			include_once("m/$classname.php");			break;	}}header("Content-Type: text/html; charset=utf-8");define('BASE_URL', '/');define('MYSQL_SERVER', 'localhost');define('MYSQL_USER', 'root');define('MYSQL_PASSWORD', '');define('MYSQL_DB', 'blackboard0_1_1');