 <?php

    require_once('../inc/bdd.php');
                    
        //traitement de changement de mdp
        if(!empty($_POST)){
        //si le formulaire a été envoyé

        //nettoyage de post
        $post = [];

          foreach($_POST as $key=>$value){
                  $post[$key] = trim(strip_tags($value));
                  }

        $errors = [];
        //vérif du mdp
            if(!isset($post['mdp']) OR !isset($post['mdp2']) OR !isset($post['mdp3']) OR mb_strlen($post['mdp']) < 4 OR mb_strlen($post['mdp']) > 12 OR ($post['mdp2']) !== ($post['mdp3'])){
               $errors['mdp'] = 'le mot de passe doit faire entre 4 et 12 caractères et les deux mdp envoyés doivent être identiques';
            }
          
            if(empty($_POST['mdp'])){
               $errors[] = 'mdp absent !';
               }

            if(empty($errors)){ 
                //on vérifie s'il y a une entrée dans la base qui correspond à l'email envoyé dans le formulaire
                $resultat = $bdd->prepare('SELECT * FROM users WHERE password = :mdp');
                $resultat->bindValue(':mdp', trim($_POST['mdp2']));
                $resultat->execute();
                //on envoie toutes les réponses éventuelles dans une variable, qui sera donc un tableau (de tableau(x))
                $user = $resultat->fetchAll(PDO::FETCH_ASSOC);
                //on compte le nombre de "cases" de ce tableau
                if(count($user) === 1){
                                // on récupère le mot de passe crypté que l'on va comparer au mot de passe enclair avec password_verify($mdpEnClair, $mdpCrypte)
                                $mdpCrypt = $user[0]['password'];

               //tout est bon on peut faire la requête de modif du mdp
                $resultat = $bdd->prepare('UPDATE users SET password = :mdp WHERE id= id_users');
                $resultat->bindValue(':mdp', password_hash($post['mdp'], PASSWORD_DEFAULT));
                $resultat->bindValue(':iduser', $post['idUser']);
                  if($resultat->execute()){
                     echo '<p class="alert alert-success">Mot de passe modifié</p>';
                   }                
                  else{
                        //il y a une erreur
                        foreach($errors as $error){
                         echo '<p class="alert alert-danger">' . $error . '</p>';
                        }
                 }
            } 
      } 
  }                  
?>
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
                <h2 class="no-margin-bottom">Profil</h2>
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
                        <h3 class="h4">Modifier le mot de passe</h3>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal">
                          <div class="form-group row">
                            <label class="col-sm-3 form-control-label">Mot de passe</label>
                            <div class="col-sm-9">
                              <input type="password" name="mdp" class="form-control"><small class="help-block-none">Votre mot de passe actuel.</small>
                            </div>
                          </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Mot de passe</label>
                              <div class="col-sm-9">
                                <input type="password" name="mdp2" class="form-control"><small class="help-block-none">Nouveau mot de passe.</small>
                              </div>
                            </div>
                          <div class="line"></div>
                          <div class="form-group row">
                              <label class="col-sm-3 form-control-label">Confirmer le mot de passe</label>
                              <div class="col-sm-9">
                                <input type="password" name="mdp3" class="form-control">
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
            <footer class="main-footer">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                    <p>Jolie Boutique © 2018</p>
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