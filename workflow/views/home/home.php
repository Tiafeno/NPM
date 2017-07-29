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
    <div class="uk-grid">
      <div class="uk-width-1-1@m">
        <div class="uk-card navbar-card-slogan uk-width-1-4@m" style="margin: auto;">
          <img src="<?= base_url($appFolder . '/assets/img/logo_monochrome.png') ?>" />
        </div>
        <p style=" text-align: center; word-spacing: 2.5px; letter-spacing: 2.2px; padding-top: 10px" >
          <?= $the_content ?>
        </p>
      </div>
    </div>
  </div>



