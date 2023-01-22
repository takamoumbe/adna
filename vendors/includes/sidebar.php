<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="<?php echo base_url(); ?>vendors/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
      <a href="<?php echo base_url(); ?>vendors/#" class="d-block">
        <div class="row mt-2">
          <div class="col-md-12">
            <sup class="flot-left"><?php echo ucfirst($this->session->nom.' '.$this->session->prenom) ?></sup><br>
            <?php echo ucfirst($this->session->fonction) ?>
          </div>
        </div>
      </a>
    </div>
  </div>

  
<?php 
  if (($this->session->nom == '') || ($this->session->prenom == '') || ($this->session->fonction == '') || ($this->session->login == '') || ($this->session->accreditations == '') || ($this->session->idGest == '') || ($this->session->login == '') || ($this->session->password == '') || ($this->session->sigle == '') || ($this->session->nomAssociation == '')) {
      redirect(base_url("On"));
  }

?>


  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

      <!-- section dashbord -->
      <li class="nav-item">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("Home"); ?>" class="nav-link active">
              <i class="far fa-circle nav-icon"></i>
              <p>Dashboard</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section Associations -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Associations
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("associationsListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lister Association</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("associations") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ajouter Associations</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section Paroisiens -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-friends"></i>
          <p>
            Paroisiens
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("paroisienListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lister les Paroisiens</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("paroisiens") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ajouter un Paroisien</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section Paroisiens -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-hands-helping"></i>
          <p>
            Engagements
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("engagementListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lister Engageme...</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("engagements") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ajouter Engageme...</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section Paroisiens -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-money-bill-wave"></i>
          <p>
            Versements
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("versementListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lister les Verseme...</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("versements") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ajouter un Verseme..</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section statistiques -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon ion ion-pie-graph"></i>
          <p>
            Statistiques
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("gestionnairesListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Statistiques</p>
            </a>
          </li>
        </ul>
      </li>


      <!-- section gestionnaire -->
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-user-secret"></i>
          <p>
            Gestionnaires
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="<?php echo base_url("gestionnairesListe") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Lister Gestionnaires</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url("gestionnaires") ?>" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Ajouter Gestionnaire</p>
            </a>
          </li>
        </ul>
      </li>


      <li class="nav-item">
        <a href="<?php echo base_url("Logout") ?>" class="nav-link">
          <i class="fas fa-sign-out-alt ml-1"></i>
          <p>Déconnexion</p>
        </a>
      </li>


    </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>