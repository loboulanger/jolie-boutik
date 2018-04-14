<?php require "templates/header.php"; ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <nav class="side-navbar">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center">
            <div class="avatar"><img src="img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4">Paul Bernard</h1>
              <p>Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus-->
          <ul class="list-unstyled">
                    <li class="active"><a href="dashboard.php"> <i class="icon-home"></i>Accueil </a></li>
                    <li><a href="update_shop.php"> <i class="icon-screen"></i>Boutique </a></li>
                    <li><a href="add_users.php"> <i class="icon-user"></i>Utilisateurs </a></li>
                    <li><a href="update_profile.php"> <i class="icon-picture"></i>Profil </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Produits </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="add_product.php">Ajouter un produit</a></li>
                        <li><a href="update_product.php">Modifier un produit</a></li>
                      </ul>
                    </li>
          </ul>
        </nav>
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
                                    <button type="submit" class="btn btn-primary">Ajouter</button>
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