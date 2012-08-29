<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* The MX_Controller class is autoloaded as required */

class MY_Controller extends MX_Controller 
{
	// Page Info
	protected $data = Array();
	protected $pageName = FALSE;
	protected $template = "main";
	protected $hasNav = TRUE;

	// Page Assets
	protected $javascript = array(
		'bootstrap-transition',
		'bootstrap-alert',
		'bootstrap-modal',
		'bootstrap-dropdown',
		'bootstrap-scrollspy',
		'bootstrap-tab',
		'bootstrap-tooltip',
		'bootstrap-popover',
		'bootstrap-button',
		'bootstrap-collapse',
		'bootstrap-carousel',
		'bootstrap-typeahead'
	);
	protected $css = array();
	protected $fonts = array();

	public function MY_Controller()
	{
		parent::__construct();
		$this->data["uri_segment_1"] = $this->uri->segment(1);
		$this->data["uri_segment_2"] = $this->uri->segment(2);
		$this->title = 'Historia - Website Archiving Service';
		
		//$this->pageName = strToLower(get_class($this));
		$this->pageName = $this->uri->segment(1);
	}

	protected function _render($view) 
	{
		//static
		$toTpl["javascript"] = $this->javascript;
		$toTpl["css"] = $this->css;
		$toTpl["fonts"] = $this->fonts;
		
		//meta
		$toTpl["title"] = $this->title;
		
		//data
		$toBody["content_body"] = $this->load->view($view,array_merge($this->data,$toTpl),true);
		
		//nav menu
		if($this->hasNav)
		{
			$this->load->helper("nav");
			$toMenu["pageName"] = $this->pageName;
			$toHeader["nav"] = $this->load->view("template/nav",$toMenu,true);
		}
		$toHeader["basejs"] = $this->load->view("template/basejs",$this->data,true);
		
		$toBody["header"] = $this->load->view("template/header",$toHeader,true);
		$toBody["footer"] = $this->load->view("template/footer",'',true);
		
		$toTpl["body"] = $this->load->view("template/".$this->template,$toBody,true);
		
		
		//render view
		$this->load->view("template/skeleton",$toTpl);
	}
	
}
