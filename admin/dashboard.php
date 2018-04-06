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
                    <li><a href="update_shop.php"> <i class="icon-grid"></i>Boutique </a></li>
                    <li><a href="add_users.php"> <i class="icon-user"></i>Utilisateurs </a></li>
                    <li><a href="update_profile.php"> <i class="icon-padnote"></i>Profil </a></li>
                    <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"> <i class="icon-interface-windows"></i>Produits </a>
                      <ul id="exampledropdownDropdown" class="collapse list-unstyled ">
                        <li><a href="add_product.php">Ajouter un produit</a></li>
                        <li><a href="update_product.php">Modifier un produit</a></li>
                      </ul>
                    </li>
          </ul>
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Dashboard</h2>
            </div>
          </header>
          
          <!-- Dashboard Counts Section-->
          <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Recent Updates-->
                <div class="col-lg-6">
                    <div class="recent-updates card">
                      <div class="card-header">
                        <h3 class="h4">Derniers produits mis à jour</h3>
                      </div>
                      <div class="card-body">
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>Mars</span></div>
                        </div>
                        <!-- Item-->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>Mars</span></div>
                        </div>
                        <!-- Item        -->
                        <div class="item d-flex justify-content-between">
                          <div class="info d-flex">
                            <div class="icon"><i class="icon-rss-feed"></i></div>
                            <div class="title">
                              <h5>Lorem ipsum dolor sit amet.</h5>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed.</p>
                            </div>
                          </div>
                          <div class="date text-right"><strong>24</strong><span>Mars</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- Check List -->
                <div class="col-lg-6">
                    <div class="checklist card">
                      <div class="card-header d-flex align-items-center">           
                        <h2 class="h3">To Do List </h2>
                      </div>
                      <div class="card-body">
                        <div class="item d-flex">
                          <input type="checkbox" id="input-1" name="input-1" class="checkbox-template">
                          <label for="input-1">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-4" name="input-4" class="checkbox-template">
                          <label for="input-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-5" name="input-5" class="checkbox-template">
                          <label for="input-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
                        <div class="item d-flex">
                          <input type="checkbox" id="input-6" name="input-6" class="checkbox-template">
                          <label for="input-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</label>
                        </div>
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
                  <p>Jolie Boutik &copy; 2018</p>
                </div>
              </div>
            </div>
          </footer>
        </div>
      </div>
    </div>
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