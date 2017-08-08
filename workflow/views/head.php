<?php
/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 21/07/2017
 * Time: 21:00
 */
?>
<!-- 
***
*** @Author : TIAFENO Finel
*** @eMail: tiafenofnel@gmail.com
*** @Function: Developper Web & Project Manager
*** @WebSite: http://www.falicrea.com
*** @GitHub: http://github.com/Tiafeno
***
-->

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
   océan indien" />
  
  <meta name="author" content="TIAFENO Finel" />
  <meta name="description" content="<?= $description ?>" />
  <title><?= $title ?></title>
  <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet"> -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans:400,700" rel="stylesheet">
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