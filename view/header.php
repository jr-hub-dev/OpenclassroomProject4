<header> 
	<nav id="banniere">

		<ul id="menu">
			<li><a href= "index.php?action=home">Accueil</a></li>
			<li><a href=>A proros de l'auteur</a></li>						
			<li><a href= 'index.php?objet=post&action=postsList'>Chapitres</a></li>
			<li><a href=>Contact</a></li>
			<li><a href= 'index.php?objet=user&action=create'>S'enregistrer</a></li>
		</ul>
		<form method="post" > 
			<label name="userLogin">Login : </label><input type="text" id="login" placeholder="login" required/><br />
			<label name="userPassword"> Mot de passe : </label><input type="text" id="password" placeholder="Mot de passe" required><br />
			<input type="submit" name="submit" id="connexion" value="Se connecter">
		</form>
	</nav>
</header>