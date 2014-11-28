<div id="zone-travail">
    <div id="utilisateur_formulaire">
        <form method="post" action="<?= site_url('/utilisateur_c/valideModifierUtilisateur/');?>" >
            <fieldset>
                <legend>utilisateur</legend>

                <input type="hidden" name="utilisateur_id" value="<?= $id ?>" >

                <label>login (*):</label><br><input type="text" name="utilisateur_login" value="<?php echo set_value('utilisateur_login',$login);?>" /><br>
                <?php echo form_error('utilisateur_login'); ?>

                <label>mot de passe (*):</label><br><input type="text" name="utilisateur_mdp" value="<?php echo set_value('utilisateur_motdepasse',$motdepasse);?>" /><br>
                <?php echo form_error('utilisateur_mdp'); ?>


                <label>email (*): </label><br><input type="text" name="utilisateur_email" value="<?php echo set_value('utilisateur_email',$email);?>" /><br>
                <?php echo form_error('utilisateur_email'); ?>

                <br><br>
                <label>Droit</label><br>

                <select name="utilisateur_droit">
                    <?php foreach($droit as $key=>$val):?>
                        <option value="<?php echo $key;?>"
                            <?php if (isset($droit_selected) and $key==$droit_selected)echo "selected";?>>
                            <?=$val;?>
                        </option>
                    <?php endforeach;?>
                </select>
                <?php echo form_error('utilisateur_droit'); ?>


                <br><br>
                <label>Validite</label><br>
                <select name="utilisateur_valide">
                    <option value="1">
                        Autoriser
                    </option>
                    <option value="0">
                        Muter
                    </option>
                </select>
                <br><br>
                <?php echo form_error('utilisateur_valide'); ?>

                </fieldset>
            <input type="submit"  name="utilisateur_soumettre" value="valider"/>
        </form>
    </div>
</div>