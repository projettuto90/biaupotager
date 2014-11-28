<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div>

        <h1>login : <?= $this->session->userdata('mail');?></h1>
        <h1> Droit :   <?= $this->session->userdata('droit');?></h1>
        <h1> Nom :    <?= $this->session->userdata('nom');?></h1>

        <p><?= anchor('users_c/deconnexion','se deconnecter')?></p>
	</div>
	<p class="footer">DUT info Belfort <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>