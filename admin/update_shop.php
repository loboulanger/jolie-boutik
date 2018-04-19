<?php 

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les coordonnées
$query = $db->prepare('SELECT * FROM infos');
$query->execute();
$infos = $query->fetch();

// Requête à la base de données pour récupérer les info du slider
$query = $db->prepare('SELECT * FROM slider');
$query->execute();
$slider = $query->fetchAll();

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

  # Vérification du champ address__update
  if(empty($post['address__update'])){
    // On affichera l'erreur correspondante
    $errors['address__update'] = 'Vous devez entrer une adresse';
  }

  # Vérification du champ zip_code__update
  if(empty($post['zip_code__update']) OR !preg_match("#^[0-9]{5}$#", $post['zip_code__update'])){
    // On affichera l'erreur correspondante
    $errors['zip_code__update'] = 'Vous devez entrer un code postal valide';
  }

  # Vérification du champ city__update
  if(empty($post['city__update'])){
    // On affichera l'erreur correspondante
    $errors['city__update'] = 'Vous devez entrer une ville';
  }

  # Si aucune erreur, on met à jour les coordonnées dans la base de données
  if(empty($errors)){
    $stmt = $db->prepare('UPDATE infos SET address = :address__update, city = :city__update, zip_code = :zip_code__update WHERE id = :id');
    $stmt -> bindValue(':address__update', $post['address__update']);
    $stmt -> bindValue(':city__update', $post['city__update']);
    $stmt -> bindValue(':zip_code__update', $post['zip_code__update']);
    $stmt -> bindValue(':id', $infos['id']);

    # Si tout s'est bien passé
    if($stmt->execute()){
      // On crée un tableau pour affichage
      $success = "Le produit a bien été mis à jour";
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
                <h2 class="no-margin-bottom">Boutique</h2>
              </div>
            </header>
            <!-- Forms Section-->
            <section class="forms"> 
              <div class="container-fluid">
                <div class="row">
                  <!-- Add Picture -->
                  <div class="col-lg-12">
                      <div class="card">
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Slider de la page d'accueil</h3>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Titre</th>
                                  <th>Sous-titre</th>
                                  <th>CTA</th>
                                  <th>Image</th>
                                  <th></th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                foreach ($slider as $slideId) {
                                  ?>
                                  <tr>
                                  <th scope="row"><?= $slideId['id'] ?></th>
                                  <td><?= $slideId['title'] ?></td>
                                  <td><?= $slideId['subtitle'] ?></td>
                                  <td><?= $slideId['cta'] ?></td>
                                  <td><?= $slideId['images'] ?></td>
                                  <td>
                                    <a href="update_slide.php?id=<?= $slideId['id'] ?>">
                                      <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                    </a>
                                  </td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Supprimer</button>
                                          </div>
                                        </form>
                                  </td>
                                </tr>
                                  <?php
                                }
                                ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>

                  <!-- Coordonnées Boutik-->
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Coordonnées</h3>
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
                        
                        <form class="form-horizontal" method="POST">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Adresse</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="address__update" value="<?php
                                              if (!empty($errors) OR !empty($success)) {
                                                echo $_POST['address__update'];
                                              } else {
                                                echo($infos['address']);
                                              }
                                              ?>"></input>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Code postal</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="zip_code__update" value="<?php
                                              if (!empty($errors) OR !empty($success)) {
                                                echo $_POST['zip_code__update'];
                                              } else {
                                                echo($infos['zip_code']);
                                              }
                                              ?>"></input>
                            </div>
                            <label class="col-sm-2 form-control-label">Ville</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="city__update" value="<?php
                                              if (!empty($errors) OR !empty($success)) {
                                                echo $_POST['city__update'];
                                              } else {
                                                echo($infos['city']);
                                              }
                                              ?>"></input>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                              <button type="submit" class="btn btn-primary">Modifier</button>
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