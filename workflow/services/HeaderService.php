<?php

/**
 * Created by PhpStorm.
 * User: Tiafeno
 * Date: 18/07/2017
 * Time: 22:55
 */
class HeaderService
{
  public $Langs = [
    ['lang' => 'fr', 'load' => 'french', 'ISOCode' => 'fr_FR'],
    ['lang' => 'eng', 'load' => 'english', 'ISOCode' => 'en_US']
  ];

  public $Scripts = [];
  public $Styles = [];

  public function __construct() {
    $this->Scripts = self::getScript([]);
    $this->Styles = self::getStyle();
  }
  
  public function getMenu(){
    try{
      return file_get_contents(APPFOLDER."/models/menuRoute.json");
    } catch (Exception $e){
      print $e->getMessage();
      return false;
    }
  }
  public static function getScript($custom = []) // name, link, dependance* [ [name => '', ... ], ...]
  {
    $Defaultscript = [
      'jquery' => APPFOLDER.'/assets/js/jquery.js',
      'uikit-js' => APPFOLDER.'/assets/js/uikit.js',
      'uikit-icons' => APPFOLDER.'/assets/js/uikit-icons.js',
      'script' => APPFOLDER.'/assets/js/scripts.js'
    ];
    $scripts = [];
    if (!is_array( $custom )) new Exception('Get Script: Error send params array!');
    if (empty($custom)):
      while (list($name, $link) = each($Defaultscript)):
        $script[ $name ] = $link;
      endwhile;
      return $script;
    endif;

    foreach ($custom as $customName => $customScript):
      $isIn = false;
      if (empty( $custom )) continue;

      while (list($name, $script) = each($Defaultscript)):
        $scripts[ $name ] = $script;
        if (isset($customScript[ 'dependance' ]) and $customScript[ 'dependance' ] === $name){
          $scripts[ $customScript['name'] ] = $customScript[ 'link' ];
          $isIn = true;
        }
      endwhile;

      if ($customScript[ 'dependance' ] === null){
        $scripts[ $customScript['name'] ] = $customScript[ 'link' ];
        $isIn = true;
      }

      if (!$isIn){
        foreach ($scripts  as $name => $script):
          $scripts[ $name ] = $script;
          if ($name === $customScript[ 'dependance' ])
            $scripts[ $customScript['name'] ] = $customScript[ 'link' ];
        endforeach;
      }
    endforeach;
    return $scripts;
  }

  public static function getStyle()
  {
    return [
      APPFOLDER.'/assets/css/uikit.css',
      APPFOLDER.'/assets/css/style.css'
    ];
  }
}