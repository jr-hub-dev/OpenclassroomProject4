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
			<label for="name">Login : </label><input type="text" id="name" placeholder="Votre nom" required/><br />
			<label for="firstname"> Mot de passe : </label><input type="text" id="firstname" placeholder="Votre prénom" required><br />
			<input type="submit" name="submit" id="connexion" value="Se connecter">
		</form>
	</nav>
</header>