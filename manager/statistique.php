<?php
include("inc/top.php");
$cat_plus_annonces="Select name,count(annonceId) as number_of_annonces from categories,annonces where annonces.categorie=categories.id group by categorie order by number_of_annonces DESC limit 1  ";
$cat_moins_annonces="Select name,count(annonceId) as number_of_annonces from categories,annonces where annonces.categorie=categories.id group by categorie order by number_of_annonces ASC limit 1  ";
$annonce_plus_ancien="SELECT * FROM `annonces` order by DATE ASC limit 1";
$cat_nb_annonces="Select name,count(annonceId) as number_of_annonces from categories,annonces where annonces.categorie=categories.id group by categorie order by number_of_annonces ASC";
$dix_membres_plus_annonces="SELECT users.username, users.nom, users.prenom,count(annonceId) as nb_annonces FROM users,annonces where userId=users.id group by userId ORDER by nb_annonces DESC limit 10";
$cat_prix_moyenne_plus_cher="SELECT name,AVG(price) as prix_moyenne from categories,annonces where categorie=categories.id GROUP BY name ORDER by prix_moyenne DESC ";

$get_cat_plus_annonces=$bd->prepare($cat_plus_annonces);
$get_cat_plus_annonces->execute();
$plus_annonces=$get_cat_plus_annonces->fetchall();

$get_cat_moins_annonces=$bd->prepare($cat_moins_annonces);
$get_cat_moins_annonces->execute();
$moins_annonces=$get_cat_moins_annonces->fetchall();

$get_an_plus_ancien=$bd->prepare($annonce_plus_ancien);
$get_an_plus_ancien->execute();
$plus_ancienne=$get_an_plus_ancien->fetchall();

$get_cat_nb_annonces=$bd->prepare($cat_nb_annonces);
$get_cat_nb_annonces->execute();
$cat_nb_annonces=$get_cat_nb_annonces->fetchall();

$get_dix_membres=$bd->prepare($dix_membres_plus_annonces);
$get_dix_membres->execute();
$dix_membres=$get_dix_membres->fetchall();

$get_cat_prix_moyenne=$bd->prepare($cat_prix_moyenne_plus_cher);
$get_cat_prix_moyenne->execute();
$cat_prix_moyenne=$get_cat_prix_moyenne->fetchall();

?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Statistique</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Statistique</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                La catégorie ayant le nombre d'annonces maximum
                            </div>
                            <div class="card-body">
                                <p><?php echo $plus_annonces[0][0]." avec :".$plus_annonces[0][1]." annonces"; ?></p>
                        
                             </div>
                         </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                La catégorie ayant le nombre d'annonces minimum
                            </div>
                            <div class="card-body">
                                <p><?php echo $moins_annonces[0][0]." avec :".$moins_annonces[0][1]." annonces"; ?></p>
                        
                             </div>
                         </div>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                L'annonce le plus ancienne
                            </div>
                            <div class="card-body">
                            <div class="grid">
                                    <div class="grid-img">
                                        <?php
                                            echo '<img src="../images/'.$plus_ancienne[0]['image'].'" alt="" width=200px height=200px/>';
                                        ?>
                                    </div>
                                    <div class="grid-para">
                                        <?php
                                        echo '<h3>'.$plus_ancienne[0]['title'].'</h3>'; 
                                        
                                        echo '<p>'.$plus_ancienne[0]['description'].'</p>';
                                        ?>
                                    </div>
                                    <div class="clear"></div>
                                    </div>
                                </div>
                        
                             </div>
                         </div>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Les catégories avec le nombre d'annonces par ordre croissant
                            </div>
                            <div class="card-body">
                            <table style="  border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Nb Annonces</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php

                                foreach($cat_nb_annonces as $cat_nb_annonces){
                                echo    '<tr  style="padding: 8px;  text-align: left; border-right: 1px solid #ddd;">
                                            <td  style="padding: 8px;  text-align: left; border-bottom: 1px solid #ddd;">'.$cat_nb_annonces['name'].'</td>
                                            
                                            <td  style="padding: 8px;  text-align: left; border-bottom: 1px solid #ddd;">'.$cat_nb_annonces['number_of_annonces'].'</td>
                                            
                                         </tr>';
                                }
                                ?>
                                    </tbody>
                                </table>
                   
                        
                             </div>
                         </div>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                L'Affichage des 10 membres qui ont le plus d'annonces
                            </div>
                            <div class="card-body">
                            <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Nb_annonces</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>  
                                            <th>Username</th>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>Nb_annonces</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php

                                foreach($dix_membres as $dix){
                                echo    '<tr>
                                            <td>'.$dix['username'].'</td>
                                            
                                            <td>'.$dix['nom'].'</td>
                                            
                                            <td>'.$dix['prenom'].'</td>
                                            
                                            <td>'.$dix['nb_annonces'].'</td>
                                            
                                         </tr>';
                                }
                                ?>
                                    </tbody>
                                </table>
                        
                             </div>
                         </div>
                         <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                L'Affichage des catégories qui ont le produit moyen le plus cher
                            </div>
                            <div class="card-body">
                            <table style="  border-collapse: collapse; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Prix Moyenne</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php

                                foreach($cat_prix_moyenne as $prix_moyenne){
                                echo    '<tr  style="padding: 8px;  text-align: left; border-right: 1px solid #ddd;">
                                            <td  style="padding: 8px;  text-align: left; border-bottom: 1px solid #ddd;">'.$prix_moyenne['name'].'</td>
                                            
                                            <td  style="padding: 8px;  text-align: left; border-bottom: 1px solid #ddd;">'.$prix_moyenne['prix_moyenne'].'</td>
                                            
                                         </tr>';
                                }
                                ?>
                                    </tbody>
                                </table>
                        
                             </div>
                         </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
