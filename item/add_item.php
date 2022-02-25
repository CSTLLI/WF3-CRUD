<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: CRUD	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- add_item.php                                  	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/21 15:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/21 15:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->


		<?php include_once "../header.php"; ?>

		<main>
				<div class="card my-5 mx-auto w-50 text-center text-dark">

					<form action="" method="post" class="card-body cardbody-color p-lg-5">

						<h2 class="text-center">Ajouter une guitare dans la Base de Données</h2>

						<div class="mb-2">
							<input type="text" class="form-control" name="fabricant" id="fabricant" placeholder="Fabricant">
						</div>

						<div class="mb-2">
							<input type="text" class="form-control" name="modele" id="modele" placeholder="Modèle">
						</div>

						<div class="mb-2">
							<input type="number" class="form-control" name="annee_fabrication" id="annee_fabrication" min="1900" placeholder="Année de fabrication">
						</div>

						<div class="mb-2">
							<input type="number" class="form-control" name="prix" id="prix" placeholder="Prix">
						</div>

						<select name="checkbox" class="mb-2 form-select" aria-label="Default select example">
							<option value="default" selected>Sélectionner un type de guitare</option>
							<option value="electrique">electrique</option>
							<option value="acoustique">acoustique</option>
							<option value="electroacoustique">electroacoustique</option>
							<option value="basse">basse</option>
						</select>
					
						<div class="mb-2">
							<input type="number" class="form-control" name="nb_cordes" id="nb_cordes" placeholder="Nombre de cordes">
						</div>

						<div class="text-center">
							<button type="submit" class="btn btn-danger px-5 mb-5 text-uppercase">Envoyer</button>
						</div>
					</form>
				</div>
			</div>
		</main>
	</body>
</html>

<?php 

include_once "../config.php";

if (empty($_POST['fabricant']) && empty($_POST['modele']) && empty($_POST['checkbox'])){
	die();
}

if (checkInput($_POST['fabricant']) && checkInput($_POST['modele']) && $_POST['checkbox'] != "default"){

	$fabricant = $_POST['fabricant'];
	$modele = $_POST['modele'];
	$categorie = $_POST['checkbox'];

	if (checkInput($_POST['prix']) && checkInput($_POST['annee_fabrication']) && checkInput($_POST['nb_cordes'])){
		$prix = $_POST['prix'];
		$annee = $_POST['annee_fabrication'];
		$nb_cordes = $_POST['nb_cordes'];

		try {
			//echo $categorie;

			$sth = $conn->query("INSERT IGNORE INTO guitare (fabricant, modele, annee, prix, categorie, nb_cordes) VALUES ('$fabricant', '$modele', '$annee', '$prix', '$categorie', '$nb_cordes')");

			if ($sth){
				header("Location: ../index.php");				
			}

			
		} catch(PDOException $e){
				echo "<div class='container alert alert-danger' role='alert'> Une erreur est survenue. </div>";
		}
	}else{
		echo "<div class='container alert alert-danger' role='alert'> Les numéros sont vides. </div>";
	}
}else{
	echo "<div class='container alert alert-danger' role='alert'> Les noms sont vides. </div>";
}

?>