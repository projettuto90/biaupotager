<!doctype html>
<html class="no-js" lang="fr">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> BiauPotager </title>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">


     <script>   function confirmeSuppression(identifiant) {
            var confirmation = confirm("Voulez vous vraiment supprimer cet article ?");
            if (confirmation)
            {
                document.location.href = "article_m?id="+identifiant;
            }
            else
            {
                return false;

            }
        }
    </script>
<body id="body">
    <div id="conteneur">

