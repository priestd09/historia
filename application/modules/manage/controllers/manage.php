<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Manage Controller
 *
 * Functions for dashboard and various admin related tasks
 *
 * @package         Historia
 * @subpackage      Manage Module
 * @category        Controller
 * @author          Bryce Johnston 
 */

class Manage extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }
    
    // Dashboard
    public function index()
    {
        //set the flash data error message if there is one
        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

        // current user
        $this->data['user'] = $this->ion_auth->user()->row();

        //list the users
        $this->data['users'] = $this->ion_auth->users()->result();
        foreach ($this->data['users'] as $k => $user)
        {
            $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
        }


        $this->_render('manage/index', $this->data);
    }

    function login()
    {
        $this->title = "Historia - Login";
        //validate form input
        $this->form_validation->set_rules('identity', 'Identity', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        // current user
        $this->data['user'] = $this->ion_auth->user()->row();

        if ($this->form_validation->run() == true)
        { //check to see if the user is logging in
            //check for "remember me"
            $remember = (bool) $this->input->post('remember');

            if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
            { //if the login is successful
                //redirect them back to the home page
                $this->session->set_flashdata('message', $this->ion_auth->messages());
                redirect('manage/index', 'refresh');
            }
            else
            { //if the login was un-successful
                //redirect them back to the login page
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('manage/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
            }
        }
        else
        {  //the user is not logging in so display the login page
            //set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = array('name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            );
            $this->data['password'] = array('name' => 'password',
                'id' => 'password',
                'type' => 'password',
            );

            $this->_render('manage/login', $this->data);
        }
    }

    function logout()
    {
        $this->data['title'] = "Logout";

        //log the user out
        $logout = $this->ion_auth->logout();

        //redirect them back to the page they came from
        redirect('main', 'refresh');
    }

}

/* End of file manage.php */
/* Location: ./application/modules/manage/controllers/manage.php */
