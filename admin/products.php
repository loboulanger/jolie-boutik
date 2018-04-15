<?php

require ('templates/header.php'); 
require_once ('../inc/functions.php'); 

// Connexion à la base de données
require_once('../inc/bdd.php');

// Requête à la base de données pour récupérer et afficher les produits
$query = $db->prepare('SELECT * FROM products INNER JOIN categories ON products.category = categories.id_category');
$query->execute();
$products = $query->fetchAll();
// debug($products);

?>
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
                  <div class="col-lg-12">
                    <div class="card">
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Liste des produits</h3>
                    </div>
                    <div class="card-body">
                      <div class="table-responsive">  
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Nom</th>
                              <th>Prix</th>
                              <th>Catégorie</th>
                              <th>Disponibilité</th>
                              <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                            foreach ($products as $product) {
                              ?>
                              <tr>
                                <th scope="row"><?= $product['id_products'] ?></th>
                                <td><?= $product['name'] ?></td>
                                <td><?= $product['price'] ?> €</td>
                                <td><?= $product['title'] ?></td>
                                <td>
                                  <?php if ($product['dispo'] == 1) {
                                    echo '<i class="fa fa-check"></i>';
                                  } else {
                                    echo '<i class="fa fa-times"></i>';
                                  } 
                                  ?>
                                </td>
                                <td>
                                  <a href="update_product.php?id=<?= $product['id_products'] ?>">
                                    <button class="btn btn-primary">Modifier le produit</button>
                                  </a>
                                </td>
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
              </div>
            </section>

            <!-- Page Footer-->
            <?php require "templates/footer.php"; ?>