<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Admin Base Controller
 *
 * All admin controllers extend from this controller
 *
 * @package         Historia
 * @subpackage      Base Controller
 * @category        Controller
 * @author          Bryce Johnston bryce@jntcompany.com
 * @copyright       Copyright (c) 2012, JNT Company, LLC
 */
 
class Admin_Controller extends MY_Controller
{

    public function Admin_Controller()
    {
        parent::__construct();

        // User permission check
        if(!self::_permission())
        {
            show_error('You do not access to view this page.');
            exit;
        }
        
        //$this->form_validation->set_error_delimiters('<div class="error msg">','</div>');
    }

    private function _permission()
    {
        // Admin pages we allow access 
        // Modify this
        $allowed_pages = array('manage/login', 'manage/logout');

        // Check if current page is allowed
        $current_page = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, 'index');

        if(in_array($current_page, $allowed_pages))
        {
            return TRUE;
        }
        elseif (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('manage/login');
        }
        elseif (!$this->ion_auth->is_admin())
        {
            //redirect them to the home page because they must be an administrator to view this
            redirect($this->config->item('base_url'), 'refresh');
        }
        else
        {
            // Allow admin access
            return TRUE;
        }
        return FALSE;
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
            $toHeader["nav"] = $this->load->view("template/manage_nav",$toMenu,true);
        }
        $toHeader["basejs"] = $this->load->view("template/basejs",$this->data,true);
        
        $toBody["header"] = $this->load->view("template/header",$toHeader,true);
        $toBody["footer"] = $this->load->view("template/footer",'',true);
        
        $toTpl["body"] = $this->load->view("template/".$this->template,$toBody,true);
        
        
        //render view
        $this->load->view("template/skeleton",$toTpl);
    }

}

/* End of file Admin_Controller.php */
/* Location: ./application/core/Admin_Controller.php */
