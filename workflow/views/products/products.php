<?php
/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 21/07/2017
 * Time: 22:55
 */

$dir = APPPATH . '/images/';
$productservices->gtFilesContent($dir);
$factory = $productservices->factory();
?>

<div class="uk-section uk-section-default uk-section-small "> <!-- uk-padding-remove-top -->
  <div class="uk-container">
    
  <?php while (list($pos, $idDir) = each($factory)): ?>
      <h2 class="uk-text-lead uk-text-primary uk-text-center uk-text-uppercase">
      <?php foreach ($productservices->struct as $struct) { 
              $str = (object)$struct; 
              if ($pos === $str->pos) print $str->title; 
            } ?>    
      </h2>
      <div class="uk-child-width-1-4@m uk-grid-match" uk-grid uk-lightbox="animation: scale">
      <?php foreach ($idDir as $idPath){ 
              $id = (int)pathinfo($idPath, PATHINFO_FILENAME);
      ?>
              <div>
                <div class="uk-card uk-card-default">
                  <div class="uk-card-media-top" >
                    <a href="<?= base_url($appFolder . '/images/'.$pos.'/'.$id.'.jpg') ?>">
                      <img src="<?= base_url($appFolder . '/images/'.$pos.'/thumb_'.$id.'.jpg') ?>" class="lightbox" alt="" width="100%" >
                    </a>
                  </div>
                  <div class="uk-card-body">
                    <h3 class="uk-card-title uk-text-center"><?= $this->lang->line('title_'.$id) ?></h3>
                    <p><?= $this->lang->line('description_'.$id) ?></p>
                  </div>
                </div>
              </div>
      <?php } ?>
      </div>
  <?php endwhile;   ?>

  </div>

