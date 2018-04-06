<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Espace d'administration Jolie Boutik</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">

          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="index.php" class="navbar-brand">
                  <div class="brand-text brand-big"><span>Jolie Boutik </span><strong> Dashboard</strong></div>
                  <div class="brand-text brand-small"><strong>JBD</strong></div></a>
                <!-- Toggle Button-->
                <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
              </div>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Logout    -->
                <li class="nav-item"><a href="logout.php" class="nav-link logout">Se déconnecter<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
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
                        <form class="form-horizontal" method="post">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Nom</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="nom">
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Description</label>
                            <div class="col-sm-9">
                              <textarea class="form-control" name="desc" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Catégorie</label>
                              <div class="col-sm-9">
                                <div class="row">
                                  <div class="col-md-5">
                             
                                      <select  name="category" class="form-control">
                                        <?php
                                        // connexion à la base de données
                                            try
                                          {
                                              $connexion = new PDO('mysql:host=localhost;dbname=boutik;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
                                          }

                                            // Redefini le message d'erreur pour éviter trop d'infos restitutées
                                            catch(Exception $e) {die('Erreur : ' .  $e->getmessage());};
                                            $resultat = $connexion->query('SELECT * from category');
                                            $listeCateg = $resultat->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($listeCateg as $Categ ) {
                                              ?> <option value="<?= $Categ['id_category'] ?>"> <?php echo $Categ['title'];?> </option> <?php
                                            }   
                                        ?>
                                      </select>
                                  </div>
                                  <div class="col-md-2">
                                      <label class="form-control-label">Prix</label>
                                  </div>
                                  <div class="col-md-5">
                                    <input type="text" name="price" class="form-control">
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
            <footer class="main-footer">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <p>Jolie Boutik © 2018</p>
                  </div>
                </div>
              </div>
            </footer>
          </div>
      </div>
    </div>

    <?php


    // saise non vide
    if (!empty($_POST)) {

      var_dump($_POST['category']);

      // connexion à la base de données
          try
        {
            $connexion = new PDO('mysql:host=localhost;dbname=boutik;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }

          // Redefini le message d'erreur pour éviter trop d'infos restitutées
          catch(Exception $e) {die('Erreur : ' .  $e->getmessage());};

                   
          // Je prépare ma requete
          $resultat = $connexion->prepare('INSERT INTO products (name, description, id_category, price, date_create) VALUES (:name, :description, :category, :price, "2018-03-06")');
          $resultat->bindValue(':name', $_POST['nom']);
          $resultat->bindValue(':description', $_POST['desc']);
          $resultat->bindValue(':category', $_POST['category']);
          $resultat->bindValue(':price', $_POST['price']);

          // j'execute la requete
          $resultat->execute();

    }



    ?>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>
</html>