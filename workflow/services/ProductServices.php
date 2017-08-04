<?php
/**
 * Created by Visual Studio Code.
 * User: Tiafeno
 * Date: 30/07/2017
 * Time: 19:20
 */

class ProductServices{
  public $pictures = [];
  private $allowed = ['gif', 'jpg', 'png', 'jpeg'];
  public function __construct(){}

  public function gtFilesContent( $dir, $prev = null ){
    if ($images = dir( $dir )){
      while ( false !== ( $entry = $images->read() ) ){
        if ($entry != '.' && $entry != ".."){
          if (is_file( $dir .'/'. $entry )){
            $ext = pathinfo( $entry, PATHINFO_EXTENSION );
            if (in_array( $ext, $this->allowed )){
              $id = ( $prev == null ) ? $entry : $prev;
              $this->pictures[ $id ][] = $entry;
            } else continue;
          } else {
            $id = ( $prev === null ) ? $entry : $prev;
            $this->pictures[ $id ] = [];
            $subdir = $dir . '/'.$entry;
            $this->gtFilesContent( $subdir, $entry );
          }
        }
      }
    }
  }

  public function Factory(){
    $factory = [];
    while ( list($pos, $files ) = each( $this->pictures )) {
      foreach ($files as $filename){
        if (!preg_match('/thumb/i', $filename)){
          $factory[$pos][] = $filename;
        }
      }
    }
    return $factory;
  }
}
