<?/*
Шаблон авторизации пользователя
===============================
$login - логин пользователя

*/?>
<h1>Авторизация</h1>
<form method="post">
	Логин:
	<br/>
	<input name="login" type="text" value="<?=$login?>"/>
	<br/>
	Пароль:
	<br/> 
	<input name="password" type="password"/>
	<br/>
	<input type="checkbox" name="remember" /> запомнить меня
	<br/>	
	<input type="submit" value="Войти"/>
	<br/>
	<br/>	
	<a href="index.php">Главная страница</a>
</form>
