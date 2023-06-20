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
                                ici, un message possible pour vos actions
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Ajouter une Annonce
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                    <?php
                                        if(isset($_GET['error'])){
                                            print_r("<p>".$_GET['error']."</p>");
                                        }
                                        ?>    
                                    <form action="annonce_add.php" method="GET">
                                        <tr>
                                            <th>Title </th>
                                            <th><input type="text" name="title" value="" /> </th>
                                        </tr>
                                        <tr>
                                            <th>Description </th>
                                            <th>	<textarea name="description" style="width: 600px; height: 150px;" type="text" required class="textbox"></textarea> </th>
                                        </tr>
                                        <tr>
                                            <th>Prix </th>
                                            <th><input type="number" name="prix" value="" /> </th>
                                        </tr>
                                        <tr>
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
                                        </tr>
                                        <tr>
                                        <th>Image </th>           
					                    <th><input  name="image" type="file"  accept="image/png, image/jpeg"></th>
                                        </tr>
                                        <tr>
                                            <th>
				                                 <input type="submit" value="ajouter annonce">
                                            </th>
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
