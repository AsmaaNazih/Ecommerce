<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Annnonces</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Annonces</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                               if(isset($_GET['error'])){
                                   echo $_GET['error'];
                               }
                                ?>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Annonces
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                            <th>Image</th>
                                            <th>Id Categorie</th>
                                            <th>Id User</th>
                                            <th>Mis a jour</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Prix</th>
                                            <th>Date</th>
                                            <th>Image</th>
                                            <th>Id Categorie</th>
                                            <th>Id User</th>
                                             <th>Mis a jour</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php

                                foreach($annonces as $an){
                                echo    '<tr>
                                            <td>'.$an['title'].'</td>
                                            <td>'.$an['description'].'</td>
                                            <td>'.$an['price'].'€</td>
                                            <td>'.$an['DATE'].'</td>
                                            <td>'.$an['image'].'</td>
                                            <td>'.$an['categorie'].'</td>
                                            <td>'.$an['userId'].'</td>
                                             <td>'.$an['UPDATE_TIME'].'</td>
                                            <td><a href="modif_annonce.php?id='.$an['annonceId'].'">Modifier</a></td>
                                            <td><a href="delete_annonce.php?id='.$an['annonceId'].'">Supprimer</a></td>
                                          
                                         </tr>';
                                }
                                ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
