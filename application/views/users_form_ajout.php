
    <div><center>
            <?php echo form_open('users_c/creerUtilisateur'); ?>

            <label for="nom">Nom : </label> <br>
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


            <br><label>--- Adresse ---</label><br>

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
            <br><label for="droit">Droit</label><br>

            <select name="droit">
                <option value="administrateur">
                    Administrateur
                </option>
                <option value="client" selected>
                    Client
                </option>
            </select>
            <br><?php echo form_error('droit','<span class="error">',"</span>");?>
            <br>

            <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
            <input type="submit" value="Envoyer" />

            <?php echo form_close(); ?>
        </center></div>

