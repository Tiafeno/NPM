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

<style type="text/css">
  .category-title{
    font-weight: 700;
    letter-spacing: 4px;
  }
  .card-product{
    border : 1px dashed #32d296;
  }
  ul.list-hook{
    display: inline-block;
    padding-right: 50px;
    background: #35ae4a;
  }
  ul.list-hook > li {
    display: inline-block;
    padding-left: 20px;
  }
  ul.list-hook > li > span{
    padding-top: 20px;
    padding-bottom: 20px;
    display: block;
    color:#fff
  }
  ul.list-hook > li:nth-child(n+2) span{
    border-left : 1.5px dotted #fff;
    padding-left: 16px;
  }
  @media(max-width: 808px){
    ul.list-hook > li:nth-child(n+2) span{
      border: none;
    }
  }
</style>

<div class="uk-section uk-section-default uk-section-small uk-padding-remove-top"> <!-- uk-padding-remove-top -->
  <div class="uk-container">
    <div class="uk-container uk-container-small" >
      <ul class="list-hook">
        <?php 
        foreach ($productstruct as $struct) { 
          $str = (object)$struct; 
          printf('<li> <span data-href="#%s" class="scroll" id-target="%s"> %s </span> </li>', $str->hook, $str->hook, $str->title);
        } 
        ?>  
      </ul>
    </div>
  <?php while (list($pos, $idDir) = each ( $factory )): ?>
    <div class="uk-section">
      <div class="uk-container uk-container-small">
      <?php foreach ($productstruct as $struct) { 
                $objStruct = (object)$struct;  
              if ($pos === $objStruct->pos) { ?>
                <h2 class="category-title uk-text-lead uk-text-secondary uk-text-center uk-text-uppercase" 
                  id="<?= $objStruct->hook ?>"> <?= $objStruct->title ?> </h2>
      <?php     break;
              } 
            } ?>    
      </div>
    </div>
      <div class="uk-child-width-1-4@m uk-grid-match" uk-grid>
      <?php foreach ($idDir as $idPath){ 
              $id = (int)pathinfo($idPath, PATHINFO_FILENAME);
              $title = $this->lang->line( 'title_'.$id );
              $img_url = $appFolder . '/images/'.$pos.'/'.$id.'.jpg';
              $img_thumb_url = $appFolder . '/images/'.$pos.'/thumb_'.$id.'.jpg';
      ?>
              <div>
                <div class="uk-card uk-card-default uk-card-hover card-product">
                  <div class="uk-card-media-top"  uk-lightbox="animation: scale">
                    <a class="uk-align-center" href="<?= base_url( $img_url ) ?>" title="<?= $title ?>">
                      <img src="<?= base_url( $img_thumb_url ) ?>" alt="" class="uk-align-center" >
                      <a class="uk-position-absolute uk-transform-center" style="left: 50%; top: 40%" href="<?= base_url( $img_url ) ?>" title="<?= $title ?>" uk-marker></a>
                    </a>
                  </div>
                  <div class="uk-card-body">
                    <h3 class="uk-label uk-label-success uk-position-bottom-center"><?= $title ?></h3>
                  </div>
                </div>
              </div>
      <?php } ?>
      </div>
  <?php endwhile;   ?>

  </div>

