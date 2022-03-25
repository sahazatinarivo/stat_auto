<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Stat auto | Admin</title>
  <!-- Custom fonts for this template-->

  <!-- Custom styles for this template-->
  <link href="<?php echo base_url('assets/template/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/template/css/font-awesome.min.css'); ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/template/vendor/fontawesome-free/css/all.min.css') ?>" rel="stylesheet">
  <link href="<?php echo base_url('assets/css/st_admin.css') ?>" rel="stylesheet">
</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <img class="logo_st" src="<?php echo base_url('assets/image/logo_st.png'); ?>">
      </li>
      
      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('index.php/tableau-bord.html'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tableau de bord</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fa fa-folder-plus fa-wrap"></i>
          <span>CREATION</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/creation-list.html"); ?>"><i class="fa fa-list"></i> LISTES</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/creation-page.html"); ?>"><i class="fa fa-file"></i> PAGE</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/creation-blck.html") ?>"><i class="fa fa-th-large"></i> BLOCKS</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/creation-chmp.html") ?>"><i class="fa fa-th-list"></i> CHAMPS DU BLOCK</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMontage" aria-expanded="true" aria-controls="collapseMontage">
          <i class="fa fa-tools fa-wrap"></i>
          <span>MONTAGE MASK</span>
        </a>
        <div id="collapseMontage" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/generer-block.html") ?>"><i class="fa fa-table"></i> GENERER BLOCK</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/params-block.html") ?>"><i class="fa fa-cog"></i> PARAMETRE</a>
          </div>
        </div>
      </li>

      <!--NaItem - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDatabase" aria-expanded="true" aria-controls="collapseDatabase">
          <i class="fa fa-database fa-wrap"></i>
          <span>BASE DE DONNE</span>
        </a>
        <div id="collapseDatabase" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/database.html/liste_evalue"); ?>"><i class="fa fa-plus-square"></i> CREATION TABLE</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/import-donne.html"); ?>"><i class="fa fa-file-import"></i> IMPORT DONNE</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseParams" aria-expanded="true" aria-controls="collapseParams">
          <i class="fa fa-cogs"></i>
          <span> PARAMETRES</span></a>

        <div id="collapseParams" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/theme.html"); ?>"><i class="fas fa-fw fa-tachometer-alt"></i> THEME</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/autre-setting.html"); ?>"><i class="fa fa-plus-circle"></i> AUTRE</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEtat" aria-expanded="true" aria-controls="collapseEtat">
          <i class="fa fa-keyboard-o"></i>
          <span> SAISIE</span></a>

        <div id="collapseEtat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/etat-saisie.html"); ?>"><i class="fa fa-chart-bar"></i> ETAT</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/controle-saisie.html"); ?>"><i class="fa fa-eye"></i> CONTROLE</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagestat" aria-expanded="true" aria-controls="collapsePagestat">
          <i class="fa fa-area-chart"></i>
          <span> STATISTIQUE</span></a>

        <div id="collapsePagestat" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/stat-tableau.html") ?>"><i class="fa fa-table"></i> TABLEAU</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/stat-graph.html") ?>"><i class="fa fa-area-chart"></i> GRAPHIQUE</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExport" aria-expanded="true" aria-controls="collapseExport">
          <i class="fa fa-file-export"></i>
          <span>EXPORT</span></a>

        <div id="collapseExport" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/export-donne.html") ?>"><i class="fa fa-database"></i> DONNEE</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/stat-tableau.html") ?>"><i class="fa fa-area-chart"></i> STATISTIQUE</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseWs" aria-expanded="true" aria-controls="collapseExport">
          <i class="fa fa-globe"></i>
          <span>WEBSERVICE</span></a>

        <div id="collapseWs" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/export-donne.html") ?>"><i class="fa fa-globe"></i>EQUIPEMENTS</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePageUtilisateur" aria-expanded="true" aria-controls="collapsePageUtilisateur">
          <i class="fa fa-user"></i>
          <span> UTILISATEUR</span></a>


        <div id="collapsePageUtilisateur" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?php echo base_url("index.php/user-admin.html") ?>"><i class="fa fa-user-circle"></i> ADMINISTRATEUR</a>
            <a class="collapse-item" href="<?php echo base_url("index.php/user-operat.html") ?>"><i class="fa fa-users"></i> OPERATEUR DE SAISIE</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>
    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <h1 class="h3 mb-0 text-gray-800"><strong><i>ADMINISTRATION STAT AUTO</i></strong></h1>
          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Clé de recherhce">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/image/no-image.png'); ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo base_url(); ?>index.php/deconnexion">
                  <i class="fas fa-power-off fa-sm fa-fw mr-2 text-gray-400"></i>Se déconneter
                </a>
              </div>
            </li>
          </ul>

        </nav>
        <!-- End of Topbar -->
        <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js') ?>"></script>
        <?php 
        	$layout = 'application/views/st_admin_views/';
          include $layout."st_modal.php";
          include $layout."st_stock_url.php";
        	if (isset($view)) {
        		include $layout."st_".$view.".php";
        	}

            function replace($var){
               return strtolower(str_replace(" ","_",str_replace("'","_",$var)));
            }
        ?>

      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; sahazatinarivo@gmail.com 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url('assets/template/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/template/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/creation.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/montage.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/control.js'); ?>"></script>
  <script src="<?php echo base_url('assets/js/settings.js'); ?>"></script>
  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url('assets/template/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url('assets/template/js/sb-admin-2.min.js'); ?>"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/template/vendor/chart.js/Chart.min.js'); ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('assets/template/js/demo/chart-area-demo.js'); ?>"></script>
  <script src="<?php echo base_url('assets/template/js/demo/chart-pie-demo.js'); ?>"></script>
</body>
</html>
