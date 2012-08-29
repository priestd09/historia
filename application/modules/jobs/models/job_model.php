<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Job Model
 *
 * Functions for getting and storing job content
 *
 * @package         Historia
 * @subpackage		Jobs Module
 * @category        Model
 * @author          Bryce Johnston 
 */

class Job_model extends CI_Model
{

    public function get_job($id)
    {
        $query = $this->db->get_where('jobs', array('id' => $id), 1);
        return $query->row_array();
    }

    public function get_jobs($limit, $offset)
    {
        $this->db->order_by('id');
        $query = $this->db->get('jobs', $limit, $offset);
        return $query->result();
    }
	
    public function get_active_jobs()
    {
        $this->db->order_by('id');
        $query = $this->db->get_where('jobs', array('active' => 1));
        return $query->result();
    }

    public function get_user_jobs($user_id)
    {
        $query = $this->db->get_where('jobs', array('user_id' => $user_id));
        return $query->result();
    }

    public function add_job($data)
    {
        $this->db->insert('jobs', $data);
        return;
    }

    public function update_job($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('jobs', $data);
    }

    public function delete_job($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('jobs');
    }
	
    public function get_archive($id)
    {
        $query = $this->db->get_where('archives', array('id' => $id), 1);
        return $query->row_array();
    }
	
    public function get_archives($job_id, $limit, $offset)
    {
        $this->db->order_by('id');
        // need to add where for job_id
        $query = $this->db->get('archives', $limit, $offset);
        return $query->result();
    }
	
	public function get_archive_dates($job_id)
	{
		$this->db->from('archives');
		$this->db->where('id', $job_id);
		$this->db->group_by(array("month", "year"));
		$query = $this->db->get();
		return $query->result();
	}
	
    public function get_archives_cnt($job_id)
    {
		$query = $this->db->get_where('archives', array('job_id' => $job_id));
		return $query->num_rows();
    }
	
    public function archive_exists($job_id, $date)
    {
        $query = $this->db->get_where('archives', array('job_id' => $job_id, 'date' => $date), 1);
        if($query->num_rows() > 0)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }
	
    public function add_archive($data)
    {
        $this->db->insert('archives', $data);
        return;
    }
	
	
    public function update_archive($data)
    {
        $this->db->where('job_id', $data['job_id']);
        $this->db->update('archives', $data);
    }
	
    public function delete_archive($data)
    {
        $this->db->where('id', $id);
        $this->db->delete('archives');
    }

}

/* End of file job_model.php */
/* Location: ./application/modules/jobs/models/job_model.php */