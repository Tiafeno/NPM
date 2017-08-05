<?php
/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 18/07/2017
 * Time: 21:46
 */

?>

<div class="uk-section uk-section-default uk-section-large " style="padding-top: 50px;"> <!-- uk-padding-remove-top -->

  <div class="uk-container uk-container-small">
    <div uk-grid>
      <div class="uk-width-1-2@m" >
        <img class="uk-border-rounded" src="<?= base_url($appFolder . '/assets/img/products-home-page.jpg') ?>" />
      </div>
      <div class="uk-width-1-2@m">
        <p class="uk-text-middle" style=" text-align: justify; word-spacing: 2.5px; letter-spacing: 2.2px" >
          <?= $the_content ?>
        </p>
      </div>
    </div>
  </div>



