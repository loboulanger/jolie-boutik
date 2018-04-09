<?php require "templates/header.php"; ?>
      <div class="page-content d-flex align-items-stretch"> 
        <!-- Side Navbar -->
        <?php require "templates/side-navbar.php"; ?>
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
          <?php require "templates/footer.php"; ?>