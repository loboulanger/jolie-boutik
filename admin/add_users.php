<?php 

require ('templates/header.php'); 

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
                  <div class="col-lg-6">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Ajouter un utilisateur</h3>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal" method="post">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nom</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Prénom</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Adresse email</label>
                            <div class="col-sm-9">
                              <input type="email" name="" class="form-control">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Rôle</label>
                            <div class="col-sm-9 select">
                              <select name="" class="form-control">
                                <option>Choisir...</option>
                                <option>Vendeur</option>
                                <option>Admin</option>
                              </select>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <div class="col-sm-4 offset-sm-3">
                              <button type="submit" class="btn btn-primary">Enregistrer</button>
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