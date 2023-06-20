<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Categories</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                                Categories
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Nom</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Numero</th>
                                            <th>Nom</th>
                                            <th>Modifier</th>
                                            <th>Supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php

                                foreach($categories as $cat){
                                echo    '<tr>
                                            <td>'.$cat['id'].'</td>
                                            <td>'.$cat['NAME'].'</td>
                                            <td><a href="modif_categorie.php?id='.$cat['id'].'">Modifier</a></td>
                                            <td><a href="delete_categorie.php?id='.$cat['id'].'">Supprimer</a></td>
                                          
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
