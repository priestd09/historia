<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Main Controller
 *
 * Main Controller and Actions
 *
 * @package         Historia
 * @subpackage      Main Controller
 * @category        Controller
 * @author          Bryce Johnston
 */

class Main extends MY_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->title = "Historia - Website Archiving Service";

		// current user
    	$this->data['user'] = $this->ion_auth->user()->row();
    
		$this->_render('pages/main');
	}
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */