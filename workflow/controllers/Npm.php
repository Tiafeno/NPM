
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
define('APPFOLDER', 'workflow');

include_once APPFOLDER.'/libraries/lodash-php/src/lodash.php';
include_once APPFOLDER.'/services/ErrorService.php';
include_once APPFOLDER.'/services/HeaderService.php';
include_once APPFOLDER.'/services/ProductServices.php';


class npm extends CI_Controller {
	public $HeaderService = null;
  public $ErrorService = null;
	public $DefaultLang = [
		'Currentlang' => 'fr',
		'Currentload' => 'french'
	];
	public $Menus = [];
	private $TemplateData = array(); //Variable for Template

  private function setServiceScripts( $other = [] ){
    if (!in_array('scripts', array_keys($this->TemplateData), true)):
      $this->TemplateData[ 'scripts' ] = $scripts =  HeaderService::getScript([ $other ]);
    return $scripts;
    endif;
  }

	private function getHead(){
    if (in_array('scripts', array_keys( $this->TemplateData ), true)):
      //Global Scripts
      $scripts = array_replace_recursive(HeaderService::getScript([
          /*[
            'name' => 'wowslider-js',
            'link' => APPFOLDER.'/assets/slider/engine/wowslider.js',
            'dependance' => 'jquery'
          ],
          [
            'name' => 'script-wowslider-js',
            'link' => APPFOLDER.'/assets/slider/engine/script.js',
            'dependance' => 'wowslider-js'
          ] */
        ]), $this->TemplateData[ 'scripts' ]
      );
      $this->TemplateData[ 'scripts' ] =& $scripts;
    else:
      // Default global Scripts
      $this->TemplateData[ 'scripts' ] = HeaderService::getScript([ ]);
    endif;

		$this->load->view('head', $this->TemplateData = array_merge($this->TemplateData, array(
			'Langs' => $this->HeaderService->Langs,
      'Currentlang' => trim( $this->session->Currentlang ),
			'stylesheet' => HeaderService::getStyle()
		)));
    $this->getHeader();
	}
	
	private function getHeader(){
		$this->getRouteModel();
		$this->load->view('header', $this->TemplateData = array_merge($this->TemplateData, array(
			'appFolder' => APPFOLDER,
			'Menus' => $this->Menus
		)));
	}

	private function getRouteModel(){
		$MenuJson = $this->HeaderService->getMenu();
		$objMenu = json_decode( $MenuJson );
    if (is_array( $objMenu )) $this->Menus =& $objMenu;
	}

	private function getFooter(){
    $this->load->view('footer', $this->TemplateData );
	}

  public function __e($e){
    return $this->lang->line($e);
  }

	public function __construct()
	{
		parent::__construct();
		$this->load->library( 'session' );
		$this->load->helper( 'language' );
		$this->load->helper( 'url' );

		$this->HeaderService = new HeaderService();
    $this->ErrorService = new ErrorService();

		if ($this->session->Currentlang == '' || $this->session->Currentload == ''){
			$this->session->set_userdata( $this->DefaultLang );
		}
	}

	/***
	 ** @Route /
	 */
	public function index()
	{
		$this->lang->load( $this->session->Currentlang, $this->session->Currentload );
		$this->TemplateData = array(
			'title' => $this->lang->line( 'title' ),
      'description' => $this->lang->line( 'description' ),
			'ID' => 1, //ID Menu
      'the_content' => $this->lang->line( 'home_content' ),
      // 'scripts' => $this->setServiceScripts([
      //   'name' => 'carousel',
      //   'link' => APPFOLDER.'/assets/js/carousel.js',
      //   'dependance' => null
      // ]),

      'customCSS' => <<<EOD
        /* CSS code here... */
        
EOD

		);

		$this->getHead();
		$this->load->view('home/home', $this->TemplateData);
		$this->getFooter();
	}

	/***
	 ** @Route /translate
	 ** @Params: lang (string) eng | fr
	 */
	public function translate(){
		$inputLang = null;
		if (!empty($this->input->get( 'lang' ))) :
			$inputLang = trim( $this->input->get( 'lang' ) );
		endif;

		if (is_null( $inputLang )) return false;
		if ($this->session->Currentlang != $inputLang){
			foreach ($this->HeaderService->Langs as $lang) {
				# code...
				if ($lang[ 'lang' ] != trim( $inputLang )) continue;
				$this->session->set_userdata('Currentlang', $lang[ 'lang' ]);
				$this->session->set_userdata('Currentload', $lang[ 'load' ]);
				break;
			}
		}
		if (!empty( $this->input->get( 'redirect' ) ) || (boolean)$this->input->get( 'redirect' ) === true){
			$this->getRouteModel();
			$_idMenu = (int)$this->input->get( '_idmenu' );
			if (!empty( $_idMenu ) && is_int( $_idMenu )){
				while (list(, $objMenu) = each($this->Menus)){
					if ($objMenu->_id === $_idMenu){
						redirect(site_url($objMenu->link->{$this->session->Currentlang}), 'location', 301);
						break;
					}
				}
			} else redirect(site_url(), 'location', 301);
		}
			
	}

	public function produits_page(){
		$this->getFactory();
		$ProductStruct = [
			[ 'pos' => 1, 'title' => $this->lang->line( 'product_t1' ), 'hook' => 'epa'],
			[ 'pos' => 2, 'title' => $this->lang->line( 'product_t2' ), 'hook' => 'fel'],
			[ 'pos' => 3, 'title' => $this->lang->line( 'product_t3' ), 'hook' => 'he'],
			[ 'pos' => 4, 'title' => $this->lang->line( 'product_t4' ), 'hook' => 'gs']
		];
		$this->TemplateData = [
			'title' => $this->lang->line( 'title' ),
      'description' => $this->lang->line( 'description' ),
			'productstruct' => (object)$ProductStruct,
			'productservices' => new ProductServices(),
			'ID' => 2 //ID Menu
		];

		$this->getHead();
		$this->load->view('products/products', $this->TemplateData);
		$this->getFooter();
	}

	public function contact_page(){
		$this->getFactory();

		$this->TemplateData = [
			'title' => $this->lang->line( 'contact_title' ),
			'description' => $this->lang->line( 'contact_desc' ),
			'adress' => $this->lang->line( 'adress' ),
			'ID' => 4
		];
		$this->getHead();
		$this->load->view('contact/contact', $this->TemplateData);
		$this->getFooter();
	}
  
  public function Error404(){
    $this->getFactory();
    $this->TemplateData = [
      'title' => '404 Errno!',
      'description' => "Error 404",
      'ID' => 0
    ];
    
    $this->getHead();
    $this->load->view('errors/html/error_404', $this->TemplateData);
    $this->getFooter();
  }

	protected function translateForthis(){
		$lang = $this->DefaultLang[ 'Currentlang' ];
		if ($this->session->Currentlang != $lang){
			foreach ($this->HeaderService->Langs as $__lg) {
				# code...
				if($__lg[ 'lang' ] != trim( $lang )) continue;
				$this->session->set_userdata('Currentlang', $__lg[ 'lang' ]);
				$this->session->set_userdata('Currentload', $__lg[ 'load' ]);
				break;
			}
		}
	}

	protected function getFactory(){
		if ($this->session->Currentlang != $this->DefaultLang[ 'Currentlang' ]){
			$this->translateForthis();
		}
		$this->lang->load( $this->session->Currentlang, $this->session->Currentload );
	}

}
