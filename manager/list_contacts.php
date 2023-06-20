<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Contacts</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Contacts</li>
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
                                            <th>Nom</th>
                                            <th>Mail</th>
                                            <th>Telephone</th>
                                            <th>Message</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Mail</th>
                                            <th>Telephone</th>
                                            <th>Message</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                <?php

                                foreach($contacts as $con){
                                echo    '<tr>
                                            <td>'.$con['nom'].'</td>
                                            <td>'.$con['mail'].'</td>
                                            <td>'.$con['telephone'].'</td>
                                            <td>'.$con['message'].'</td>
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
