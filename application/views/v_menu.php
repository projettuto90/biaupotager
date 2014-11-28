<div class="menu">

    <a href="#">Bonjour <?php echo $this->session->userdata('prenom');?></a>
    <a href="#"><?= anchor('users_c/deconnexion','se deconnecter');?></a>


<?php if($this->session->userdata('droit')=='administrateur'){?>

    <a href="<?= site_url('/users_c/afficherUtilisateur/');?>">Voir la liste des Utilisateurs</a>
    <a href="<?= site_url('/users_c/afficheUtilisateur/');?>">UTILISATEUR GROCERY CRUD</a>
    <a href="<?= site_url('/users_c/creerUtilisateur/');?>">Ajouter un nouvel utilisateur</a>
    <a href="<?= site_url('/produit_c/afficheProduit/');?>">PRODUIT GROCERY CRUD</a>


<?php }?>

</div>
<br><br><br>