<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admins</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admins</li>
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
                                Admins
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
                                            <th>modifier</th>
                                            <th>supprimer</th>
                                        </tr>
                                    </tfoot>
                                    <tbody> 
                                        <?php
                                            foreach($admin as $ad){
                                            echo   '<tr>
                                                    <td>'.$ad['id'].'</td>
                                                        <td>'.$ad['username'].'</td>
                                                        <td>'.$ad['nom'].' </td>
                                                        <td>'.$ad['prenom'].'</td>
                                                        <td>'.$ad['mail'].'</td>
                                                        <td><a href="modif_admin.php?id='.$ad['id'].'">Modifier</a></td>
                                                        <td><a href="delete_admin.php?id='.$ad['id'].'">Supprimer</a></td>
                                                      
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
