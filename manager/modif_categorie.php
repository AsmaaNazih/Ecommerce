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
                                ici, un message possible pour vos actions
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Modifier une categorie
                            </div>
                            <div class="card-body">
                                <table>
                                    <thead>
                                        <tr>
                                            <form action="cat_mod.php" method="GET">
                                            <th>Nom </th>
                                            <th><input type="text" name="name" value="" /> </th>
                                            <th>
                                                <select class="custom-select" id="select-1" name="id">
                                                <option selected="selected" value="<?php if(isset($_GET['id'])){echo $_GET['id'];} ?>"><?php if(isset($_GET['id'])){echo "".$_GET['id'];} ?></option>
                                            </th>
                                            <th><input type="submit" name="" value="Modifier cette categorie" /></th>
                                        <?php
                                        if(isset($_GET['error'])){
                                            print_r("<p>".$_GET['error']."</p>");
                                        }
                                        ?>    
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