<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Membres<?php print_r("($count_members)"); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_membres.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Categories<?php   print_r("($count_cat)"); ?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_categories.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Annonces <?php print_r("($count_annonces)");?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_annonces.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Contact</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="list_contacts.php">En savoir plus</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Membres enregistres
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Username</th>
                                            <th>Nom </th>
                                            <th>Prenom</th>
                                            <th>e-mail</th>
                                            <th>password</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>id</th>
                                            <th>Username</th>
                                            <th>Nom </th>
                                            <th>Prenom</th>
                                            <th>e-mail</th>
                                            <th>password</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                <?php
                                foreach($members as $member){
                                 echo   '<tr>
                                        <td>'.$member['id'].'</td>
                                            <td>'.$member['username'].'</td>
                                            <td>'.$member['nom'].' </td>
                                            <td>'.$member['prenom'].'</td>
                                            <td>'.$member['mail'].'</td>
                                            <td>'.$member['password'].'</td>
                                        </tr>';
                                }
                                ?>
                                       
                                    </tbody>
                                </table>
                            </div>
                            <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                 Annonces  par Categorie
                            </div>
                            <div class="card-body">
                                <table style="  border-collapse: collapse; width: 100%;">
                                        <tr>
                                            <?php
                                            foreach($categories as $cat){
                                            echo '<tr><th>'.$cat['NAME'].': <th>';
                                            $get_annonce_par_categorie=$bd->prepare(   "SELECT title from annonces where categorie=".$cat['id']);
                                            $get_annonce_par_categorie->execute();
                                            $annonce_par_cat=$get_annonce_par_categorie->fetchall();
                                            foreach($annonce_par_cat as $an)   {
                                            echo '<td style="padding: 8px;  text-align: left; border-bottom: 1px solid #ddd;">'.$an['title'].'</td>';
                                            }
                                            echo '</tr>';
                                            }
                                            ?>
                                        </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                
                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
