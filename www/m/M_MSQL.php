<?php
//
// Помощник работы с БД
//
class M_MSQL
{
	private static $instance;	// экземпляр класса
        private $mysqli; 
	//
	// Получение экземпляра класса
	// результат	- экземпляр класса MSQL
	//
	public static function Instance()
	{
		if (self::$instance == null)
			self::$instance = new M_MSQL();
			
		return self::$instance;
	}

	private function __construct()
	{
		// Языковая настройка.
		setlocale(LC_ALL, 'ru_RU.CP1251');	
		
		// Подключение к БД.
                $this->mysqli = new mysqli(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

                // проверка соединения 
                if (mysqli_connect_errno()) {
                    printf("Не удалось подключиться: %s\n", mysqli_connect_error());
                    exit();
                }
                
                if(!$this->mysqli->set_charset("cp1251")){
                    printf("Ошибка при загрузке набора символов: %s\n", $mysqli->error);
                } 
		
	}
	
	//
	// Выборка строк
	// $query    	- полный текст SQL запроса
	// результат	- массив выбранных объектов
	//
	public function Select($query)
	{
		$result = $this->mysqli->query($query, MYSQLI_STORE_RESULT);
		
		if (!$result)
			die($this->mysqli->error);
		
		$n = mysqli_num_rows($result);
		$arr = array();
	
		for($i = 0; $i < $n; $i++)
		{
			$row = $result->fetch_assoc();                //Протестить!!!!!!!!!!!!!!!!!!!!!	
			$arr[] = $row;
		}

		return $arr;				
	}
	
	//
	// Вставка строки
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// результат	- идентификатор новой строки
	//
	public function Insert($table, $object)
	{			
		$columns = array();
		$values = array();
	
		foreach ($object as $key => $value)
		{
			$key = $this->mysqli->real_escape_string($key);
			$columns[] = $key;
			
			if ($value === null)
			{
				$values[] = 'NULL';
			}
			else
			{
				$value = $this->mysqli->real_escape_string($value);							
				$values[] = "'$value'";
			}
		}
		
		$columns_s = implode(',', $columns);
		$values_s = implode(',', $values);
			
		$query = "INSERT INTO $table ($columns_s) VALUES ($values_s)";
		$result = $this->mysqli->query($query, MYSQLI_STORE_RESULT);
								
		if (!$result)
			die($this->mysqli->error);
			
		return $this->mysqli->insert_id;
	}
	
	//
	// Изменение строк
	// $table 		- имя таблицы
	// $object 		- ассоциативный массив с парами вида "имя столбца - значение"
	// $where		- условие (часть SQL запроса)
	// результат	- число измененных строк
	//	
	public function Update($table, $object, $where)
	{
		$sets = array();
	
		foreach ($object as $key => $value)
		{
			$key = $this->mysqli->real_escape_string($key . '');
			
			if ($value === null)
			{
				$sets[] = "$key=NULL";			
			}
			else
			{
				$value = $this->mysqli->real_escape_string($value . '');					
				$sets[] = "$key='$value'";			
			}			
		}
		
		$sets_s = implode(',', $sets);			
		$query = "UPDATE $table SET $sets_s WHERE $where";
		$result = $this->mysqli->query($query, MYSQLI_STORE_RESULT);
		
		if (!$result)
			die($this->mysqli->error);

		return $this->mysqli->affected_rows;	
	}
	
	//
	// Удаление строк
	// $table 		- имя таблицы
	// $where		- условие (часть SQL запроса)	
	// результат	- число удаленных строк
	//		
	public function Delete($table, $where)
	{
		$query = "DELETE FROM $table WHERE $where";		
		$result = $this->mysqli->query($query);
						
		if (!$result)
			die($this->mysqli->error);

		return $this->mysqli->affected_rows;	
	}
        
        public function real_escape_string($string)
        {
            return $this->mysqli->real_escape_string($string.'');
        }
}
