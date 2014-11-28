<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title><?= $titre?></title>
	<link rel="stylesheet" href="<?= base_url(); ?>monCSS/mesStyles1.css" >
</head>
<body>

<div id="container">
    <div><center>
        <h1>Inscription</h1>
            <br><?php echo form_open('users_c/inscription'); ?>

            <br><label for="nom">Nom : </label> <br>
        <input type="text" name="nom" value="<?php echo set_value('nom');?>" />
            <br><?php echo form_error('nom','<span class="error">',"</span>");?>
        <br>

            <br> <label for="prenom">Prenom : </label> <br>
        <input type="text" name="prenom" value="<?php echo set_value('prenom');?>" />
            <br><?php echo form_error('prenom','<span class="error">',"</span>");?>
        <br>

            <br><label for="numTel">Numero de telephone : </label> <br>
        <input type="text" name="numTel" value="<?php echo set_value('numTel');?>" />
            <br><?php echo form_error('numTel','<span class="error">',"</span>");?>
        <br>

            <br><label> Adresse </label><br>

            <br><label for="codePostal"> code postal : </label> <br>
        <input type="text" name="codePostal" value="<?php echo set_value('codePostal');?>" />
            <br><?php echo form_error('codePostal','<span class="error">',"</span>");?>
        <br>

            <br><label for="ville">Ville : </label> <br>
        <input type="text" name="ville" value="<?php echo set_value('ville');?>" />
            <br><?php echo form_error('ville','<span class="error">',"</span>");?>
        <br>

            <br><label for="rue"> Rue : </label> <br>
        <input type="text" name='rue' value="<?php echo set_value('rue');?>" />
            <br><?php echo form_error('rue','<span class="error">',"</span>");?>
        <br>



            <br><label for="mail">email:</label> <br>
        <input type="text" name="mail" value="<?php echo set_value('mail');?>" />
            <br><?php echo form_error('mail','<span class="error">',"</span>");?>
        <br>

            <br><label for="pass">Mot de passe:</label> <br>
        <input type="password" name="pass" value="<?= set_value('pass');?>" />
            <br><?php echo form_error('pass','<span class="error">',"</span>");?>
        <br>
            <br><label for="pass2">Confirmation du mot de passe:</label> <br>
        <input type="password" name="pass2" value="<?= set_value('pass2');?>" />
            <br><?php echo form_error('pass2','<span class="error">',"</span>");?>
        <br>
        <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
        <input type="submit" value="Envoyer" />

        <?php echo form_close(); ?>
		<p><?= anchor('users_c/deconnexion','retour')?></p>
        <p><?= anchor('users_c/mdp_oublie','Mot de passe oublié ?')?></p>
        </center></div>

	<p class="footer">DUT info Belfort <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>