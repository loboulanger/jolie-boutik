<?php require "templates/header.php"; ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php require "templates/side-navbar.php"; ?>
        <div class="content-inner">
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
                        <h3 class="h4">Modifier un produit</h3>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nom</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Catégorie</label>
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-md-5">
                                      <select name="account" class="form-control">
                                          <option>Vendeur</option>
                                          <option>Admin</option>
                                        </select>
                                  </div>
                                  <div class="col-md-2">
                                      <label class="form-control-label">Prix</label>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="text" class="form-control">
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
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                </div>
              </div>
            </section>

            <!-- Page Footer-->
            <?php require "templates/footer.php"; ?>