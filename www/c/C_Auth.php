<?php//// ����������� �������� ������.//class C_Auth extends C_Base{	//	// �����������.	//	public function __construct(){		parent::__construct();	}		public function before(){		parent::before();	}		public function action_login(){		$this->title .= ' �����������';		$mUsers = M_Users::Instance();		$mUsers->Logout();		$this->head = '<script src="js/auth.js"></script>' ;                    $this->title .=isset($_POST['mail']);                		if($this->isPost())		{                    			if($mUsers->Login($_POST['mail'], $_POST['password'], isset($_POST['remember'])))                                alert($_POST['mail']);                               //$this->redirect('/');                        else                            alert('Something wrong');                }		$this->content = $this->Template('v/v_auth.php');		}                public function action_register(){		$this->title .= '�����������';		$mUsers = M_Users::Instance();		$mUsers->Logout();		$this->head = '<script src="js/registration.js"></script>' ;                                		if($this->isPost())		{			if($mUsers->Login($_POST['login'], $_POST['password'], isset($_POST['remember'])))				$this->redirect('/');		}		$this->content = $this->Template('v/v_register.php');		}}