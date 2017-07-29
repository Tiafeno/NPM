<?php
/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 21/07/2017
 * Time: 21:00
 */
?>

<!DOCTYPE html>
<?php foreach ($Langs as $Lang):
        if($Lang['lang'] === $Currentlang):?>
<html lang="<?= $Lang['ISOCode'] ?>" dir="ltr">
      <?php break; ?>
<?php endif; endforeach; ?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="Madagascar, Huiles essentielles, plantes médicinales, AROMA FOREST, girofle, cannelle, géranium, 
  ylang ylang, huiles essentielles malgaches, ravintsara, Ravensare aromatique, Helychrisum, Iary, Saro, 
  huile végétale, Calophyllum inophyllum, Centelle asiatica, huiles pures, huiles naturelles, agriculture biologique, 
  certification ECOCERT, traçabilité, analyse CPG, Université RUTGERS, SARO, molécules, a-pinène, travaux de laboratoire, 
  antivirales, anti-inflamatoire, vanilloïdes, plante, le CIRAD, Centre National pour la Recherche Environnementale, traitement du cancer,
   océan indien, shasama," />
  
  <meta name="author" content="TIAFENO Finel" />
  <meta name="description" content="<?= $description ?>" />
  <title><?= $title ?></title>
  <link rel="icon" href="favicon.ico"/>
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
  <?php foreach ($stylesheet as $link): ?>
    <link rel="stylesheet" href="<?= base_url() . $link ?>">
  <?php endforeach; ?>
  <style type="text/css">
    <?php if(isset($customCSS)): ?>
            <?= $customCSS ?>
    <?php endif; ?>
    .deco{
      background: url(<?= base_url(APPFOLDER."/assets/img/bg-top.png") ?>) no-repeat top right;
    }
  </style>

  <?php foreach ($scripts as $name => $script):
          $link = null;
          $join = @fopen(base_url().$script, 'rb');
          $link = ($join) ? base_url().$script :  $script;
    ?>
    <script src="<?= $link ?>"></script>
  <?php endforeach; ?>
</head>
<body>