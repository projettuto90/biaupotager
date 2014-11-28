<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $titre?></title>

	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div>

        <h1>Gestion des clients et des commandes</h1>
        <p>COUCOU <?= $this->session->userdata('droit');?></p>
        <?php echo $this->session->userdata('mail');?>
        <p><?= anchor('users_c/deconnexion','retour')?></p>
        <br><a href="<?= site_url('/users_c/afficherUtilisateur/');?>">Voir la liste</a>

    </div>
</div>

</body>
</html>