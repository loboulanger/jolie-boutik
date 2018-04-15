<?php 

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les catégories dans le formulaire
$query = $db->prepare('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll();

//-----------------------------------------------------
// Début des vérifications sur le formulaire
//-----------------------------------------------------

# Si le formulaire a été envoyé
if (!empty($_POST)) {
  // Création du tableau pour recueillir et "nettoyer" les données envoyées
  $post = [];
  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
  }

  // Avant de commancer les vérifications, on crée le tableau pour contenir les éventuelles erreurs
  $errors = [];

  # Vérification du champ product_name
    if(!isset($post['product_name']) OR empty($post['product_name'])){
      // On affichera l'erreur correspondante
      $errors['product_name'] = 'Vous devez entrer le nom du produit';
    }

  # Vérification du champ product_desc
    if(!isset($post['product_desc']) OR empty($post['product_desc'])){
      // On affichera l'erreur correspondante
      $errors['product_desc'] = 'Vous devez entrer une description pour le produit';
    }

  # Vérification du champ product_cat
    // Tableau définissant les catégories acceptées
    $cat = [];
    foreach($categories as $categorie) {
    $cat[] = $categorie['id_category'];
    }
    // Puis on vérifie que le champ sélectionné appartient bien au tableau $cat (en plus des autres vérifs)
    if( !in_array($post['product_cat'], $cat)){
      // On affichera l'erreur correspondante
      $errors['product_cat'] = 'Vous devez choisir une catégorie pour le produit';
    }

  # Vérification du champ product_price
    if(!isset($post['product_price']) OR empty($post['product_price']) OR !is_numeric($post['product_price'])){
      // On affichera l'erreur correspondante
      $errors['product_price_null'] = 'Vous devez entrer un prix valide pour le produit';
    }
  
  # Si aucune erreur, on enregistre le nouveau produit dans la base de données
    if(empty($errors)){
      $query = $db->prepare('INSERT INTO products SET name = ?, price = ?');
      
      # Si tout s'est bien passé
      if($query->execute([$_POST['product_name'], $_POST['product_price']])){
        // On crée un tableau pour affichage
        $success = "Le produit a bien été ajouté";
      }
    }

}

?>
      <div class="page-content d-flex align-items-stretch"> 

        <!-- Side Navbar -->
        <?php require "templates/side-navbar.php"; ?>

        <div class="content-inner" style="padding-bottom: 59px;">
            <!-- Page Header-->
            <header class="page-header">
              <div class="container-fluid">
                <h2 class="no-margin-bottom">Produits</h2>
              </div>
            </header>
            <!-- Forms Section-->
            <section class="forms"> 
              <div class="container-fluid">
                <div class="row">
                  <!-- Form Elements -->
                  <div class="col-lg-7">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Ajouter un produit</h3>
                      </div>
                      <div class="card-body">
                        <!-- Affichage des messages d'erreurs -->
                        <?php if(!empty($errors)): ?>
                          <div class="alert alert-danger">
                              <p>Le formulaire n'a pas été rempli correctement :</p>
                              <ul>
                              <?php foreach($errors as $error): ?>
                                  <li><?= $error; ?></li>
                              <?php endforeach; ?>
                              </ul>
                          </div>
                        <?php endif; ?>

                        <!-- Affichage des messages de suucès -->
                        <?php if(!empty($success)): ?>
                          <div class="alert alert-success">
                            <p><?= $success ?></p>
                          </div>
                        <?php endif; ?>

                        <form method="POST" class="form-horizontal">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nom</label>
                            <div class="col-sm-9">
                              <input type="text" name="product_name" class="form-control" value="<?php if(isset($_POST['product_name']) AND empty($success)){ echo $_POST['product_name']; } ?>">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="product_desc" rows="10"><?php if(isset($_POST['product_desc']) AND empty($success)){ echo $_POST['product_desc']; } ?></textarea>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Catégorie</label>
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-md-7">
                                      <select name="product_cat" class="form-control">
                                        <option>Choisir une catégorie</option>
                                        <?php
                                        foreach ($categories as $categorie) {
                                          ?>
                                          <option value="<?= $categorie['id_category'] ?>"><?= $categorie['title'] ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                  </div>
                                  <div class="col-md-2">
                                      <label class="form-control-label">Prix</label>
                                  </div>
                                  <div class="col-md-3">
                                    <input type="text" name="product_price" class="form-control" value="<?php if(isset($_POST['product_price']) AND empty($success)){ echo $_POST['product_price']; } ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                              <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <!-- Add Picture -->
                  <div class="col-lg-5">                           
                      <div class="card">
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Ajouter une photo</h3>
                        </div>
                        <div class="card-body">
                          <form class="form-inline">
                              <div class="form-group row">
                                  <div class="col-sm-12">
                                    <input id="fileInput" type="file" class="form-control-file">
                                  </div>
                                </div>
                                <div class="line"></div>
                                <div class="form-group row">
                                  <div class="col-sm-4">
                                    <button type="submit" class="btn btn-primary disabled">Ajouter</button>
                                  </div>
                          </form>
                        </div>
                      </div>
                  </div>
                  
                </div>
              </div>
            </section>

            <!-- Page Footer-->
            <?php require "templates/footer.php"; ?>