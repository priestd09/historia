<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Jobs Manage Controller
 *
 * Functions for job admin related tasks
 *
 * @package         Historia
 * @subpackage      Jobs Module
 * @category        Controller
 * @author          Bryce Johnston 
 */

class Jobs_manage extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('job_model');
		$this->config->load('historia');
		$this->cron_key = $this->config->item('cron_key');
    }
    
    public function index()
    {
        // current user
        $this->data['user'] = $this->ion_auth->user()->row();
		$this->data['key'] = $this->cron_key;

        $this->data['jobs'] = $this->job_model->get_jobs(10, $this->uri->segment(4));
        $this->_render('manage/index', $this->data);
    }

    public function job($id)
    {

    }

    public function create_job()
    {
        $this->data['title'] = "Create Job";

        // current user
        $this->data['user'] = $this->ion_auth->user()->row();

        //validate form input
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'Slug', 'required|xss_clean');
        $this->form_validation->set_rules('url', 'URL', 'required|xss_clean');
        $this->form_validation->set_rules('user_id', 'User', 'required|xss_clean');

        if ($this->form_validation->run() == true)
        {
            $job_data = array(
                'name' => $this->input->post('name'),
                'slug' => strtolower($this->input->post('slug')),
                'url' => $this->input->post('url'),
                'user_id' => $this->input->post('user_id'),
                'active' => ($this->input->post('active') == "yes" ? 1 : 0)
            );

            $this->job_model->add_job($job_data);
            $this->session->set_flashdata('message', "Job Created");
            redirect("jobs/jobs_manage", 'refresh');
        }
        else
        {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['name'] = array('name' => 'name',
                'id' => 'name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('name'),
            );
            $this->data['slug'] = array('name' => 'slug',
                'id' => 'slug',
                'type' => 'text',
                'value' => $this->form_validation->set_value('slug'),
            );
            $this->data['url'] = array('name' => 'url',
                'id' => 'url',
                'type' => 'text',
                'value' => $this->form_validation->set_value('retention'),
            );
            $this->data['user_id'] = array('name' => 'user_id',
                'id' => 'user_id',
                'type' => 'text',
                'value' => $this->form_validation->set_value('user_id'),
            );
            $this->_render('manage/create_job', $this->data);
        }
    }

    public function edit_job($id)
    {
        $this->data['title'] = "Edit Job";

        // current user
        $this->data['user'] = $this->ion_auth->user()->row();
		
		$this->data['job'] = $this->job_model->get_job($id);

        //validate form input
        $this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
        $this->form_validation->set_rules('slug', 'Slug', 'required|xss_clean');
        $this->form_validation->set_rules('url', 'URL', 'required|xss_clean');
        $this->form_validation->set_rules('user_id', 'User', 'required|xss_clean');

        if ($this->form_validation->run() == true)
        {
            $job_data = array(
                'name' => $this->input->post('name'),
                'slug' => strtolower($this->input->post('slug')),
                'url' => $this->input->post('url'),
                'user_id' => $this->input->post('user_id'),
                'active' => ($this->input->post('active') == "1" ? 1 : 0)
            );

            $this->job_model->update_job($id, $job_data);
            $this->session->set_flashdata('message', "Job Updated");
            redirect("jobs/jobs_manage", 'refresh');
        }
        else
        {
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

            $this->data['name'] = array('name' => 'name',
                'id' => 'name',
                'type' => 'text',
                'value' => $this->form_validation->set_value('name'),
            );
            $this->data['slug'] = array('name' => 'slug',
                'id' => 'slug',
                'type' => 'text',
                'value' => $this->form_validation->set_value('slug'),
            );
            $this->data['url'] = array('name' => 'url',
                'id' => 'url',
                'type' => 'text',
                'value' => $this->form_validation->set_value('retention'),
            );
            $this->data['user_id'] = array('name' => 'user_id',
                'id' => 'user_id',
                'type' => 'text',
                'value' => $this->form_validation->set_value('user_id'),
            );
            $this->_render('manage/edit_job', $this->data);
        }
    }

    public function delete_job($id)
    {

    }

}

/* End of file jobs_manage.php */
/* Location: ./application/modules/jobs/controllers/jobs_manage.php */
