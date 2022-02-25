<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: CRUD	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- edit_item.php                                 	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/21 15:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/21 15:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

<?php 

include_once "../header.php";
include_once "../config.php";

try{

	$item_id = intval($_GET['id']);

	$sth = $conn -> query("SELECT * FROM guitare WHERE id = '$item_id'");
	$result = $sth -> fetch();
	
} catch(PDOException $e){
	echo "<div class='container alert alert-danger' role='alert'> Une erreur est survenue. </div>";
}
?>

<main>
			<div class="text-center mb-5 text-dark"></div>
				<div class="card mx-auto w-50">

					<form action="" method="post" class="card-body cardbody-color p-lg-5">

						<h2 class="text-center text-dark">Modifier les données d'une guitare dans la Base de Données</h2>
						<div class="mb-2">
							<input type="text" class="form-control" name="fabricant" id="fabricant" value="<?=$result['fabricant']?>" placeholder="Fabricant">
						</div>

						<div class="mb-2">
							<input type="text" class="form-control" name="modele" id="modele" value="<?=$result['modele']?>" placeholder="Modèle">
						</div>

						<div class="mb-2">
							<input type="number" class="form-control" name="annee_fabrication" id="annee_fabrication" value="<?=$result['annee']?>" placeholder="Année de fabrication">
						</div>

						<div class="mb-2">
							<input type="number" class="form-control" name="prix" id="prix" value="<?=$result['prix']?>" placeholder="Prix">
						</div>

						<select name="checkbox" class="mb-2 form-select" aria-label="Default select example">
							<!-- <option value="default">Sélectionner un type de guitare</option>
							<option value="electrique">electrique</option>
							<option value="acoustique">acoustique</option>
							<option value="electroacoustique">electroacoustique</option>
							<option value="basse">basse</option> -->

						<?php 
						
						$values = ['electrique', 'acoustique', 'electroacoustique', 'basse'];

						for($i = 0; $i < count($values); $i++){
							if ($values[$i] == $result['categorie']){
								echo "<option value='" . $values[$i] . "' selected>" . $values[$i] . "</option>";
							}else{
								echo "<option value=' " . $values[$i] . "'>" . $values[$i] . "</option>";
							}
						}

						?>

						</select>
					
						<div class="mb-2">
							<input type="number" class="form-control" name="nb_cordes" id="nb_cordes" value="<?=$result['nb_cordes']?>" placeholder="Nombre de cordes">
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

