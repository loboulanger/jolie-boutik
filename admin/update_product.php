<?php

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les catégories dans le formulaire
$query = $db->prepare('SELECT * FROM categories');
$query->execute();
$categories = $query->fetchAll();
// debug($categories);

// Requête à la base de données pour récupérer les infos du produit concerné
$query = $db->prepare('SELECT * FROM products WHERE id_products = ?');
$query->execute(array($_GET['id']));
$productSheet = $query->fetch();
debug($productSheet);

// Requête à la base de données des disposnibilités
$query = $db->prepare('SELECT * FROM availability');
$query->execute();
$availability = $query->fetchAll();
// debug($availability);

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
  debug($post);

  // Avant de commancer les vérifications, on crée le tableau pour contenir les éventuelles erreurs
  $errors = [];

  # Vérification du champ product_name__update
  if(empty($post['product-name__update'])){
    // On affichera l'erreur correspondante
    $errors['product_name__update'] = 'Vous devez entrer le nom du produit';
  }

  # Vérification du champ product_desc__update
  if(empty($post['product-desc__update'])){
    // On affichera l'erreur correspondante
    $errors['product_desc__update'] = 'Vous devez entrer une description pour le produit';
  }

  # Vérification du champ product_price__update
  if(empty($post['product-price__update']) OR !is_numeric($post['product-price__update'])){
    // On affichera l'erreur correspondante
    $errors['product_price_update'] = 'Vous devez entrer un prix valide pour le produit';
  }

  # Si aucune erreur, on met à jour le produit dans la base de données
  if(empty($errors)){
    $statement = $db->prepare('UPDATE products SET name = ?, price = ?, desc = ?, category = ?, dispo  = ? 
                                WHERE id_products = ?');
    $statement->execute(array(
      $post['product-name__update'],
      $post['product-price__update'],
      $post['product-desc__update'],
      $post['product-cat__update'],
      $post['product-dispo__update'],
      $productSheet['id_products']
    ));

    // $statement -> bindValue(':name__updated', $post['product-name__update']);
    // $statement -> bindValue(':price__updated', $post['product-price__update']);
    // $statement -> bindValue(':desc__updated', $post['product-desc__update']);
    // $statement -> bindValue(':cat__updated', $post['product-cat__update']);
    // $statement -> bindValue(':dispo__updated', $post['product-dispo__update']);
    // $statement -> bindValue(':id', $productSheet['id_products']);
    // $statement->execute();
    
    # Si tout s'est bien passé
    // if($query->execute(){
    //   // On crée un tableau pour affichage
    //   $success = "Le produit a bien été mis à jour";
    // }
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
                        <h3 class="h4">#<?= $productSheet['id_products'] ?> > Modifier le produit </h3>
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
                              <input  name="product-name__update" type="text" class="form-control" 
                                      value="<?php
                                              if (!empty($errors) OR !empty($success)) {
                                                echo $post['product-name__update'];
                                              } else {
                                                echo($productSheet['name']);
                                              }
                                              ?>">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Description</label>
                            <div class="col-sm-9">
                              <textarea name="product-desc__update" class="form-control" rows="10"><?php
                                if (!empty($errors) OR !empty($success)) {
                                  echo $post['product-desc__update'];
                                } else {
                                  echo($productSheet['desc']);
                                }
                                ?></textarea>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Catégorie</label>
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-md-7">
                                    <select name="product-cat__update" class="form-control">
                                        <?php
                                        foreach ($categories as $category) {
                                          ?>
                                          <option 
                                            <?php
                                            if ($productSheet['category'] == $category['id_category']) {
                                              echo "selected";
                                            }
                                            ?>
                                            value="<?= $category['id_category'] ?>"
                                          ><?= $category['title'] ?></option>
                                          <?php
                                        }
                                        ?>
                                    </select>
                                  </div>
                                  <div class="col-md-2">
                                      <label class="form-control-label">Prix</label>
                                  </div>
                                  <div class="col-md-3">
                                    <input  name="product-price__update" type="text" class="form-control" 
                                    value="<?php
                                              if (!empty($errors) OR !empty($success)) {
                                                echo $post['product-price__update'];
                                              } else {
                                                echo($productSheet['price']);
                                              }
                                              ?>">
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Disponibilité</label>
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-md-5">
                                      <select name="product-dispo__update" class="form-control">
                                      <?php
                                        foreach ($availability as $dispo) {
                                          ?>
                                          <option 
                                            <?php
                                            if ($productSheet['dispo'] == $dispo['id']) {
                                              echo "selected";
                                            }
                                            ?>
                                            value="<?= $dispo['id'] ?>"
                                          ><?= $dispo['type'] ?></option>
                                          <?php
                                        }
                                        ?>
                                      </select>
                                  </div>
                                </div>
                              </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                              <button type="submit" class="btn btn-primary">Modifier le produit</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-5">
                      <!-- Pictures Product -->
                      <div class="card">
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Images du produit</h3>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Titre</th>
                                  <th></th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Titre 1</td>
                                  <td><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Voir</button></td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">Supprimer</button>
                                          </div>
                                        </form>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Titre 2</td>
                                  <td><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Voir</button></td>
                                  <td>
                                    <form class="form-inline">
                                      <div class="form-group">
                                          <button type="submit" class="btn btn-primary">Supprimer</button>
                                      </div>
                                    </form>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Titre 3</td>
                                  <td><button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Voir</button></td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary">Supprimer</button>
                                          </div>
                                        </form>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">4</th>
                                  <td></td>
                                  <td></td>
                                  <td>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Add Picture -->                       
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