<?php 

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les utilisateurs
$query = $db->prepare('SELECT * FROM users INNER JOIN roles WHERE users.role = roles.id');
$query->execute();
$users = $query->fetchAll();

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
                  <div class="col-lg-8">
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
                  <div class="col-lg-5">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Ajouter un utilisateur</h3>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal" method="post">
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Nom</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Prénom</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" name="">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Adresse email</label>
                            <div class="col-sm-8">
                              <input type="email" name="" class="form-control">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-4 form-control-label">Rôle</label>
                            <div class="col-sm-8 select">
                              <select name="" class="form-control">
                                <option>Choisir...</option>
                                <option>Vendeur</option>
                                <option>Admin</option>
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