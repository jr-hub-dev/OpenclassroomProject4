<header> 
	<nav id="banniere">

		<ul id="menu">
			<li><a href= "index.php?action=home">Accueil</a></li>
			<li><a href=>A proros de l'auteur</a></li>						
			<li><a href= 'index.php?objet=post&action=postsList'>Chapitres</a></li>
			<li><a href=>Contact</a></li>
			<li><a href= 'index.php?objet=user&action=create'>S'enregistrer</a></li>
			<a href= 'index.php?objet=user&action=login'>S'identifier</a>
			<?php if(!empty($_SESSION)){ //verifier que quelque chose est et pas n'est pas 
				echo '<a href="index.php?objet=user&action=logout">Logout</a>';
			}?>
		</ul>
		
	</nav>
</header>