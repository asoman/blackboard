<?php//// ������� ���������� �����.//abstract class C_Base extends C_Controller{	protected $title;		// ��������� ��������        protected $head;                // ������������ ������        protected $content;		// ���������� ��������	protected $needLogin;	// ���������� �� �����������	protected $user;		// �������������� ������������ || null	//	// �����������.	//	function __construct()	{			$this->needLogin = false;		$this->user = M_Users::Instance()->Get();	}		protected function before()	{		if($this->needLogin && $this->user === null)			$this->redirect('/auth/login');                $this->style = '';        		$this->title = 'BlackBoards';		$this->content = '';                $this->head ='';	}		//	// ��������� �������� ��������	//		public function render()	{		$vars = array('title' => $this->title, 'content' => $this->content, 'style' => $this->style, 'head' => $this->head);			$page = $this->Template('v/v_main.php', $vars);						echo $page;	}	}