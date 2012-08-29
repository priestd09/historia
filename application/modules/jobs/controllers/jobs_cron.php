<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Jobs Cron Controller
 *
 * Functions called by cron job to archive website
 *
 * @package			Historia
 * @subpackage		Jobs Module
 * @category		Controller
 * @author 			Bryce Johnston 
 */

class Jobs_cron extends MY_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->helper('file');
		$this->load->model('job_model');
		$this->config->load('historia');
		$this->wget_path = $this->config->item('wget_path');
		$this->archives_path = $this->config->item('archives_path');
		$this->archives_dir = $this->config->item('archives_dir');
		$this->cron_key = $this->config->item('cron_key');
	}
    
	public function index($key = null)
	{
		if($key == $this->cron_key)
		{
			$this->_cron_builder();
		}
		else
		{
			show_error('Not Authenticated.', $status_code = 500);
		}
	}
	
	private function _cron_builder()
	{
		$date = date("Y-m-d");
		$jobs = $this->job_model->get_active_jobs();
		foreach($jobs as $job)
		{
			$job_root = $this->archives_path . $job->slug;
			$job_archive_path = $job_root . "/" . $date;
			$job_url = base_url() . $this->archives_dir . $job->slug . "/" . $date . "/";
			echo '<h2>'.$job_root.'</h2>';
			if(!is_dir($job_root))
			{
				mkdir($job_root, 0777); 
			}
			else if(is_dir($job_root))
			{
				if(!is_dir($job_archive_path))
				{
					mkdir($job_archive_path, 0777);
				}
				// if previous jobs exist, get last job folder path
					// copy contents into the new folder path before we call wget so we only get new files
				chdir($job_archive_path);
				// would be better to reject or allow only certain mime types, not supported yet however 
				// could do -A or -R options but not all files have extentions to accept/reject based on
				$cmd = "$this->wget_path -q -np -N -k -p -nd -nH -E -r $job->url";
				system($cmd, $retval);
				//$dir_info = get_dir_file_info($job_archive_path);
				$data = array(
					'job_id' => $job->id,
					'job_slug' => $job->slug,
					'path' => $job_archive_path,
					'url' => $job_url,
					'date' => $date,
					'month' => date("m"),
					'year' => date("Y")
				);
				var_dump($data);
				if($this->job_model->archive_exists($job->id, $date))
				{
					$this->job_model->update_archive($data);
				}
				else
				{
					$this->job_model->add_archive($data);
				}
			}
		}
	}

}

/* End of file jobs_cron.php */
/* Location: ./application/modules/jobs/controllers/jobs_cron.php */
