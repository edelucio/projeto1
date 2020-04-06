<?php include_once("header.php");?>

<head>
	<title>Mercado Artesão | Registro</title>
</head>
<body>
<h1>Login</h1>

<form method="POST" action="login.php">
	<label>Usuário</label>
	<input type="text" name="usuario" /><br /><br />
	
	<label>Senha</label>
	<input type="password" name="senha" /><br /><br />
	
	<input type="submit" value="Enviar" />
</form>

</body>

</html>

<?php include_once("footer.php");?>