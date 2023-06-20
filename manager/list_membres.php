<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Membres</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Membres</li>
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
                                Membres
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
                                            <th>modifier</th>
                                            <th>supprimer</th>
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
                                            <th>modifier</th>
                                            <th>supprimer</th>
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
                                                        <td><a href="modif_membre.php?id='.$member['id'].'">Modifier</a></td>
                                                        <td><a href="delete_membre.php?id='.$member['id'].'">Supprimer</a></td>
                                                      
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
