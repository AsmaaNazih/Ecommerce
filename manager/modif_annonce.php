<?php
include("inc/top.php");
?>


            
            <!--  debut contenu -->
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Annonces</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Categories</li>
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
                                Modifier une Annonce
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>  

                                        <tr>
                                        <form action="annonce_modif.php" method="GET">
                                            <th>Title </th>
                                            <th><input type="text" name="title" value="" /> </th>
                                            <th> <input type="submit" value="modifier le titre"> </th>
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                           
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="annonce_modif.php" method="GET">
                                            <th>Description </th>
                                            <th>	<textarea name="description" style="width: 600px; height: 150px;" type="text" required class="textbox"></textarea> </th>
                                            <th> <input type="submit" value="modifier la description"> </th>
                                            
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="annonce_modif.php" method="GET">
                                            <th>Prix </th>
                                            <th><input type="number" name="prix" value="" /> </th>
                                            <th> <input type="submit" value="modifier le prix"> </th>
                                            <th><input type="hidden" name="id" value="<?php if(isset($_GET['id'])){ echo "".$_GET['id']; }else {echo "no";} ?>" /> </th>
                                           
                                        </form>
                                        </tr>
                                        <tr>
                                        <form action="annonce_modif.php" method="GET">
                                            <th>Categorie </th>
                                            <th>	<select class="custom-select" id="select-1" name="categorie">
                                                    <option selected="selected" value="tous">Catégorie</option>
                                                        <?php
                                                            foreach($categories as $cat ){
                                                            print_r('<option value="'.$cat['id'].'">'.$cat['NAME'].'</option>');
                                                            }
                                                        ?>
                                                    </select> 
                                            </th>
                                            <th> <input type="submit" value="modifier la categorie"> </th>
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
