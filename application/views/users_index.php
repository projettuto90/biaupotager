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

        <?php if($titre=="connexion"):?>
        <h1>Page de connexion</h1>

        <?php echo form_open('users_c/aff_connexion'); ?>
            <label for="mail">mail:</label>
            <input type="text" name="mail" value="<?php echo set_value('mail');?>" />
            <?php echo form_error('mail','<span class="error">',"</span>");?>
            <br>
            <label for="mdp">Mot de passe:</label>
            <input type="password" name="mdp" value="<?= set_value('mdp');?>" />
            <?php echo form_error('mdp','<span class="error">',"</span>");?>
            <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
            <br>
            <input type="submit" value="Connexion" />

            <?php echo form_close(); ?>
            <p><?= anchor('users_c/inscription','Inscrivez vous!')?></p>
            <p><?= anchor('users_c/mdp_oublie','Mot de passe oublié ?')?></p>
        <?php endif?>
        <?php if($titre=="deconnexion"):?>
            <?php echo form_open('users_c/deconnexion'); ?>
            <input type="submit" value="deconnexion" />
            <?php echo form_close(); ?>
        <?php endif?>

	</div>

</div>

</body>
</html>