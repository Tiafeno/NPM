<?php
/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 21/07/2017
 * Time: 21:57
 */

$NPM =& get_instance();
?>

<header class="header-nav">
  <header class="header-nav-top">
    <div class="uk-container uk-container-small">
      <div class="uk-text-left" uk-grid>
        <div class="uk-width-1-3">
          <div class="uk-card uk-card-body navbar-card-slogan">
            <a href="<?= base_url('/') ?>" alt="logo natural product of madagascar">
              <img src="<?= base_url($appFolder . '/assets/img/logo.png') ?>" />
            </a>
          </div>
        </div>

        <div class="uk-width-2-3 deco uk-visible@m">

        </div>
      </div>
    </div>
  </header>
  <header id="sticky" class="header-nav-down ">
    <div class="uk-container uk-container-small">
      <nav class="uk-navbar-transparent" uk-navbar>
        <div class="uk-navbar-left">
          <ul class="uk-navbar-nav primary-nav uk-visible@m">
            <?php foreach ($Menus as $Menu):
              if ($Menu->_id == 1): ?>
                <li class="<?php if ($Menu->_id === $ID) echo 'uk-active' ?>">
                  <a href="<?= base_url($Menu->link->{$Currentlang}) ?>">
                    <span class="uk-margin-small-right" uk-icon="icon: home"></span><?= $Menu->name->{$Currentlang} ?>
                  </a>
                </li>
            <?php  
                continue;
              endif; 
              ?>
              <li class="<?php if($Menu->_id === $ID) echo 'uk-active' ?>">
                <a href="<?= base_url($Menu->link->{$Currentlang}) ?>">
                  <?= $Menu->name->{$Currentlang} ?>
                </a>
              </li>
            <?php endforeach;?>
          </ul>
        </div>

        <div class="uk-navbar-right">
          <div class="uk-offcanvas-content uk-hidden@m">
            <!-- The whole page content goes here -->
            <div class="uk-navbar-left">
              <a class="uk-navbar-toggle" uk-navbar-toggle-icon href="#offcanvas-usage" uk-toggle></a>
            </div>
            <div id="offcanvas-usage" uk-offcanvas>
              <div class="uk-offcanvas-bar">
                <button class="uk-offcanvas-close" type="button" uk-close></button>
                <h3><?= $NPM->__e('menu') ?></h3>
                <div class="uk-card uk-card-secondary">
                  <div class="uk-card-body">
                    <ul class="uk-nav uk-nav-default">
                      <?php foreach ($Menus as $Menu):
                        if ($Menu->_id == 1): ?>
                          <li class="<?php if ($Menu->_id === $ID) echo 'uk-active' ?> uk-button-text uk-button">
                            <a href="<?= base_url($Menu->link->{$Currentlang}) ?>">
                              <?= $Menu->name->{$Currentlang} ?>
                            </a>
                          </li>
                          <?php
                          continue;
                        endif;
                        ?>
                        <li class="<?php if ($Menu->_id === $ID) echo 'uk-active' ?> uk-button-text uk-button"><a href="<?= base_url($Menu->link->{$Currentlang}) ?>"><?= strtoupper($Menu->name->{$Currentlang}) ?></a></li>
                      <?php endforeach;?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <ul class="uk-navbar-nav">
            <?php foreach ($Langs as $lang): 
                    if ($lang['lang'] === $Currentlang): continue; endif;
                    $current_url = current_url();
            ?>
              <li><a href="<?= base_url("/multilingue/translate?lang={$lang['lang']}&redirect=true&_idmenu={$ID}") ?>" class="uk-icon-button"><b><?= strtoupper($lang['lang']) ?></b></a></li>
            <?php endforeach; ?>
          </ul>
        </div>

      </nav>
    </div>
  </header>
</header>
