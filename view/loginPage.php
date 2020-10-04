<?php 
    foreach($errors as $error){
        echo $error .'<br/>';
    }

if(empty($_SESSION['userLogin'])){
	?>
	<form method="post" >
		<label for="newBilletTitle">Login</label>
		<input id="userLogin" type="text" name="userLogin" >
		<label for="userPassword"> Mot de passe :</label>
		<input id="userPassword" type="password" name="userPassword">

		<input type="submit" value="Se connecter">
	</form>
	<?php
} else {
	echo 'Vous êtes déjà loguer';
} ?>