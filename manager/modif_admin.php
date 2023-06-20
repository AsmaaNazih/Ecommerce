<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                            <?php
                                        if(isset($_GET['error'])){
                                            print_r("<p>".$_GET['error']."</p>");
                                        }
                                        ?> 
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Modifier une Admin
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>  
                                    <tr>
                                        <form action="user_modif.php" method="GET">
                                            <th>Username </th>
                                            <th><input type="text" name="username" value="" /> </th>
                                            <th> <input type="submit" value="modifier le username"> </th>
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                           
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="user_modif.php" method="GET">
                                            <th>Nom </th>
                                            <th><input type="text" name="nom" value="" /> </th>
                                            <th> <input type="submit" value="modifier le nom"> </th>
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                           
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="user_modif.php" method="GET">
                                            <th>Prenom </th>
                                            <th><input type="text" name="prenom" value="" /></th>
                                            <th> <input type="submit" value="modifier le prenom"> </th>
                                            
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="user_modif.php" method="GET">
                                            <th>Email </th>
                                            <th><input type="e-mail" name="mail" value="" /> </th>
                                            <th> <input type="submit" value="modifier l'email"> </th>
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                           
                                        </form>
                                        </tr>
                                      
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
