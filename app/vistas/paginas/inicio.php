<?php   
    require ruta_app.'/vistas/inc/header.php';  
    
?>
<?php 
print('
	<form class="item" method="post">
		<div class="p_25">
			<input type="text" name="idEmpleado" placeholder="usuario" required>
		</div>
		<div class="p_25">
			<input type="password" name="Contraseña" placeholder="password" required>
		</div>
		<div class="p_25">
			<input type="submit" class="button" value="Enviar">
		</div>
	</form>
');
if( isset($_GET['error']) ) {
	$template = '
		<div class="container">
			<p class="item  error">%s</p>
		</div>
	';
	printf($template, $_GET['error']);
}
?>
<?php   
    require ruta_app.'/vistas/inc/footer.php';
    
?>