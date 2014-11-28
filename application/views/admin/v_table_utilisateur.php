<center>
    <table class="tableau-utilisateur">
<thead>
<tr><th>id</th><th>Nom</th><th>Prenom</th><th>Telepphone</th><th>adresse</th><th>email</th><th>Mot de passe</th><th>Operation</th>
<th>opération</th>
</tr>
</thead>
<tbody>
<?php if($user != null): ?>
	<?php foreach ($user as $r): ?>
		<tr><td>
		<?php echo $r->id_User; ?>
		</td><td>
		<?= $r->nom; ?>
		</td><td>
		<?= $r->prenom; ?>
		</td><td>
		<?= $r->num_Tel; ?>
		</td><td>
        <?= $r->adresse; ?>
            </td><td>
        <?= $r->mail; ?>
            </td><td>
                <?= $r->mdp; ?>
            </td><td>
                <?= $r->droit; ?>
            </td>
		<!--<td>
			<a href="<?//= site_url('/utilisateur_c/formModifierUtilisateur/'.$r->id);?>">modifier</a>
			<a href="<?//= site_url('/utilisateur_c/supprimerUtilisateur/'.$r->id);?>">supprimer</a>
		</td>
		-->
		</tr>
	<?php endforeach; ?>
<?php endif; ?>
<tbody>
</table></center>
<center><a href="<?= site_url('/utilisateur_c/formCreerUtilisateur/');?>">créer</a></center>


