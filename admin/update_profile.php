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

  require ('templates/header.php'); 

  ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php require "templates/side-navbar.php"; ?>

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
                  <div class="col-lg-7">
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
            <?php require "templates/footer.php"; ?>