<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Client Base Controller
 *
 * All client controllers extend from this controller
 *
 * @package         Historia
 * @subpackage      Base Controller
 * @category        Controller
 * @author          Bryce Johnston bryce@jntcompany.com
 * @copyright       Copyright (c) 2012, JNT Company, LLC
 */
 
class Client_Controller extends MY_Controller
{

    public function Client_Controller()
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
        // Client pages we allow access 
        // Modify this
        $allowed_pages = array('client/login', 'client/logout');

        // Check if current page is allowed
        $current_page = $this->uri->segment(1, '') . '/' . $this->uri->segment(2, 'index');

        if(in_array($current_page, $allowed_pages))
        {
            return TRUE;
        }
        elseif (!$this->ion_auth->logged_in())
        {
            //redirect them to the login page
            redirect('client/login');
        }
        elseif (!self::_is_member())
        {
            //redirect them to the home page because they must be Client to view this
            redirect($this->config->item('base_url'), 'refresh');
        }
        else
        {
            // Allow client access
            return TRUE;
        }
        return FALSE;
    }

    private function _is_member()
    {
        $user = $this->ion_auth->user()->row();
        $groups = $this->ion_auth->get_users_groups($user->id)->result();
        $is_member = FALSE;
        foreach($groups as $group)
        {
            if($group->name == "members")
            {
                $is_member = TRUE;
            }
        }
        return $is_member;
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
            $toHeader["nav"] = $this->load->view("template/client_nav",$toMenu,true);
        }
        $toHeader["basejs"] = $this->load->view("template/basejs",$this->data,true);
        
        $toBody["header"] = $this->load->view("template/header",$toHeader,true);
        $toBody["footer"] = $this->load->view("template/footer",'',true);
        
        $toTpl["body"] = $this->load->view("template/".$this->template,$toBody,true);
        
        
        //render view
        $this->load->view("template/skeleton",$toTpl);
    }

}

/* End of file Client_Controller.php */
/* Location: ./application/core/Client_Controller.php */
