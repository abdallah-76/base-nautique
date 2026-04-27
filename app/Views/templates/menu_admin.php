<?php
$session = session();
$role = $session->get('role'); // A, M ou I
?>

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- TITRE ESPACE -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" 
       href="#">

        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>

        <div class="sidebar-brand-text mx-3">
            <?php if ($role == 'A') : ?>
                Espace administrateur
            <?php elseif ($role == 'M') : ?>
                Espace membre
            <?php else : ?>
                Espace INVITÉ
            <?php endif; ?>
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- ======================
         ADMIN MENU
    ======================= -->
    <?php if ($role == 'A') : ?>

        <!-- Accueil admin -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/afficher'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Accueil administrateur</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Profil -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/afficher_profil'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <!-- Séances réservées -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/seances'); ?>">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Séances réservées</span>
            </a>
        </li>

        <!-- Demandes -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/demandes'); ?>">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Contact</span>
            </a>
        </li>

        <!-- Comptes -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/lister'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Comptes / Profils</span>
            </a>
        </li>

        <!-- Ressources -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/ressources'); ?>">
                <i class="fas fa-fw fa-boxes"></i>
                <span>Gestion des ressources</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- ======================
         MEMBRE MENU
    ======================= -->
    <?php if ($role == 'M') : ?>

        <!-- Accueil membre -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('admin/afficher'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Accueil membre</span>
            </a>
        </li>

        <hr class="sidebar-divider">

        <!-- Profil -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/afficher_profil'); ?>">
                <i class="fas fa-fw fa-user"></i>
                <span>Profil</span>
            </a>
        </li>

        <!-- Séances réservées -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/seances'); ?>">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Séances réservées</span>
            </a>
        </li>

        <!-- Liste adhérents -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/liste_adherents'); ?>">
                <i class="fas fa-fw fa-users"></i>
                <span>Liste adhérents</span>
            </a>
        </li>

    <?php endif; ?>

    <!-- ======================
         INVITÉ MENU (ULTRALÉGER)
    ======================= -->
    <?php if ($role == 'I') : ?>

        <!-- Accueil invité -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('compte/accueil_invite'); ?>">
                <i class="fas fa-fw fa-home"></i>
                <span>Accueil</span>
            </a>
        </li>

    <?php endif; ?>

    <hr class="sidebar-divider">

    <!-- Déconnexion -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('compte/deconnecter'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Déconnexion</span>
        </a>
    </li>

</ul>
