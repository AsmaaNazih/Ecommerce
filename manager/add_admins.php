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
                                ici, un message possible pour vos actions
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ajouter une Admin
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                    <?php
                                        if(isset($_GET['error'])){
                                            print_r("<p>".$_GET['error']."</p>");
                                        }
                                        ?>    
                                    <form action="membres_add.php" method="POST">
                                        <tr>
                                            <th>Username </th>
                                            <th><input type="text" name="username" value="" required/> </th>
                                        </tr>
                                        <tr>
                                            <th>Password </th>
                                            <th><input type="password" name="password" value="" required/></th>
                                        </tr>
                                        <tr>
                                            <th>Mail </th>
                                            <th><input type="email" name="mail" value="" required/> </th>
                                        </tr> 
                                        <tr>
                                            <th>Nom </th>
                                            <th><input type="text" name="nom" value="" required/> </th>
                                        </tr> 
                                        <tr>
                                            <th>Prenom </th>
                                            <th><input type="text" name="prenom" value="" required/> </th>
                                        </tr> 
                                       
                                        <tr>
                                            <th></th>
                                            <th>
				                                 <input type="submit" name="type" value="ajoute admin">
                                            </th>
                                            <?php
                                            if(isset($_GET['error'])){
                                             echo "<th>". $_GET['error']."</th>";
                                            }
                                            ?>
                                        </tr>
                                    </form>
                                    </thead>
                                    
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                                <!-- fin contenu -->
               
               
<?php
include("inc/bottom.php");
?>
