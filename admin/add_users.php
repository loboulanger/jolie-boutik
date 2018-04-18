<?php 

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les utilisateurs
$query = $db->prepare('SELECT * FROM users INNER JOIN roles WHERE users.role = roles.id');
$query->execute();
$users = $query->fetchAll();

// Requête à la base de données pour récupérer et afficher les rôles
$stmt = $db->prepare('SELECT * FROM roles');
$stmt->execute();
$roles = $stmt->fetchAll();

//-----------------------------------------------------
// Début des vérifications sur le formulaire
//-----------------------------------------------------

if (!empty($_POST)) {
  // Création du tableau pour recueillir et "nettoyer" les données envoyées
  $post = [];
  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
  }

  // Avant de commancer les vérifications, on crée le tableau pour contenir les éventuelles erreurs
  $errors = [];

  # Vérification du champ name
  if(!isset($post['name']) OR empty($post['name'])){
    // On affichera l'erreur correspondante
    $errors['name'] = 'Vous devez entrer un nom valide';
  }

  # Vérification du champ firstname
  if(!isset($post['firstname']) OR empty($post['firstname'])){
    // On affichera l'erreur correspondante
    $errors['firstname'] = 'Vous devez entrer un prénom valide';
  }

  # Vérification du champ email
  if(!isset($post['email']) OR empty($post['email']) OR !filter_var($post['email'], FILTER_VALIDATE_EMAIL)){
    // On affichera l'erreur correspondante
    $errors['email'] = 'Vous devez entrer un email valide';
  }

   # Vérification du champ role
   if(!isset($post['role']) OR empty($post['role']) OR $post['role'] == 0){
    // On affichera l'erreur correspondante
    $errors['role'] = 'Vous devez choisir un rôle';
  }

  # Si aucune erreur,
  if(empty($errors)){
    // on ajoute le nouvel utilisateur dans la base de données en créant un token pour la première connexion
    $confirmation_token = str_random(60);
    $req = $db->prepare("INSERT INTO users SET name = ?, firstname = ?, email = ?, confirmation_token = ?");

    # Si tout s'est bien passé
    if($req->execute([$post['name'], $post['firstname'], $post['email'], $confirmation_token])){
      // On crée un tableau pour affichage
      $success = "L'utilisateur a bien été ajouté";
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
                <h2 class="no-margin-bottom">Utilisateurs</h2>
              </div>
            </header>
            <!-- Forms Section-->
            <section class="forms"> 
              <div class="container-fluid">
                <div class="row">

                  <!-- Form Elements -->
                  <div class="col-lg-9">
                    <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Liste des utilisateurs</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Prénom</th>
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Rôle</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($users as $user) {
                              ?>
                              <tr>
                                <th scope="row"><?= $user['id_users'] ?></th>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['firstname'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['role'] ?></td>
                                <td><button type="submit" class="btn btn-primary btn-sm">Supprimer</button></td>
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
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Ajouter un utilisateur</h3>
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
                            <label class="col-sm-4 form-control-label">Nom</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="name" value="<?php if(isset($_POST['name']) AND empty($success)){ echo $_POST['name']; } ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Prénom</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="firstname" value="<?php if(isset($_POST['firstname']) AND empty($success)){ echo $_POST['firstname']; } ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Adresse email</label>
                            <div class="col-sm-8">
                              <input type="email" id="email" name="email" class="form-control" value="<?php if(isset($_POST['email']) AND empty($success)){ echo $_POST['email']; } ?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Rôle</label>
                            <div class="col-sm-8 select">
                              <select name="role" class="form-control">
                                <option value="0">Choisir...</option>
                                <?php
                                foreach ($roles as $role) {
                                  ?>
                                  <option value="<?= $role['id'] ?>" <?php if(isset($_POST['role']) AND empty($success) AND $_POST['role'] == $role['id']){ echo "selected"; } ?>><?= $role['role']?></option>
                                  <?php
                                }
                                ?>
                              </select>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-4">
                              <button type="submit" class="btn btn-primary">Ajouter</button>
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