<!--**************************************************************************************-->
<!-- 																					  -->
<!-- Project: CRUD	                                    / $$      /$$ /$$$$$$$$ /$$$$$$   -->
<!--                  			                        | $$  /$ | $$| $$_____//$$__  $$  -->
<!-- index.php                                    	    | $$ /$$$| $$| $$     |__/  \ $$  -->
<!--                                                  	| $$/$$ $$ $$| $$$$$     /$$$$$/  -->
<!-- By: vcastell <valeriocastellipro@gmail.com>	    | $$$$_  $$$$| $$__/    |___  $$  -->
<!--                                              		| $$$/ \  $$$| $$      /$$  \ $$  -->
<!-- Created: 2022/02/18 14:30:00 vcastell   	        | $$/   \  $$| $$     |  $$$$$$/  -->
<!-- Updated: 2022/02/18 23:29:28 vcastell              |__/     \__/|__/      \______/   -->
<!--                                                                     				  -->
<!--**************************************************************************************-->

		<main>
			<?php 

			include_once "./setup/header.php";
			include_once "./setup/config.php";
			
			echo "
				<table class='table table-hover table-dark w-75 mx-auto my-5 shadow-lg p-3 mb-5 bg-body rounded text-center'>
					<thead>
						<tr>
							<th>Fabricant</th>
							<th>Modèle</th>
							<th>Année</th>
							<th>Prix</th>
							<th>Type</th>
							<th>Nombre de Cordes</th>
							<th>Modification</th>
							<th>Supression</th>
						</tr>
					</thead>		

					<tbody>";

			$sth = $conn -> query("SELECT * FROM guitare");
			$result = $sth -> fetchAll();

			//echo var_dump($result);

			forEach($result as $guitare){
				echo 	"<tr>";
				echo 		"<td>". $guitare['fabricant'] . "</td>";
				echo		"<td>". $guitare['modele'] . "</td>";
				echo		"<td>". $guitare['annee'] . "</td>";
				echo		"<td>". $guitare['prix'] . "</td>";
				echo		"<td>". $guitare['categorie'] . "</td>";
				echo		"<td>". $guitare['nb_cordes'] . "</td>";
				echo		"<td><a href='//crud.test/item/edit_item.php?id=" . $guitare['id'] . "'><i class='bi bi-pencil-square'></i></a></td>";
				echo		"<td><a href='//crud.test/item/delete_item.php?id=" . $guitare['id'] . "'><i class='bi bi-trash3'></i></a></td>";
				echo 	"</tr>";
			}
		
			echo "
					</tbody>
				</table>";
			?>
		</main>

	</body>
</html>