<?phpclass M_Pages{	private static $instance;	// ��������� ������	public static function Instance()	{		if (self::$instance == null)			self::$instance = new M_Pages();					return self::$instance;	}		}