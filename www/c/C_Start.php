<?phpclass C_Start extends C_Base{	//	// Конструктор.	//	public function __construct(){		parent::__construct();	}		public function before(){		//$this->needLogin = true; // раскоментируйте, чтобы закрыть доступ ко всем страницам данного контроллера		parent::before();	}		public function action_index(){		$this->title .= ' Начальная страница';		$id = isset($this->params[2]) ? (int)$this->params[2] : 1;		$mPages = M_Pages::Instance();		$text = "something";                $this->head = '<link rel="stylesheet" type="text/css" media="screen" href="v/css/start.css" />                     <script src="js/auth.js"></script>' ;		$this->content = $this->Template('v/v_index.php', array());		}		}