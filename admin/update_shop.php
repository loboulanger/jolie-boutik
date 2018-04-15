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
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <th scope="row">1</th>
                                  <td>Titre 1</td>
                                  <td>Sous-titre 1</td>
                                  <td>CTA 1</td>
                                  <td>img-1</td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                          </div>
                                        </form>
                                  </td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Supprimer</button>
                                          </div>
                                        </form>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">2</th>
                                  <td>Titre 2</td>
                                  <td>Sous-titre 2</td>
                                  <td>CTA 2</td>
                                  <td>img-2</td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                          </div>
                                        </form>
                                  </td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Supprimer</button>
                                          </div>
                                        </form>
                                  </td>
                                </tr>
                                <tr>
                                  <th scope="row">3</th>
                                  <td>Titre 3</td>
                                  <td>Sous-titre 3</td>
                                  <td>CTA 3</td>
                                  <td>img-3</td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Modifier</button>
                                          </div>
                                        </form>
                                  </td>
                                  <td>
                                      <form class="form-inline">
                                          <div class="form-group">
                                              <button type="submit" class="btn btn-primary btn-sm">Supprimer</button>
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

                  <!-- Coordonnées Boutik-->
                  <div class="col-lg-5">
                    <div class="card">
                      <div class="card-header d-flex align-items-center">
                        <h3 class="h4">Coordonnées</h3>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Adresse</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="" ></input>
                            </div>
                          </div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Code postal</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" name="" ></input>
                            </div>
                            <label class="col-sm-2 form-control-label">Ville</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" name="" ></input>
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