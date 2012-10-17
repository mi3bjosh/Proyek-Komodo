<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends Controller {
  function Calendar(){
    parent::Controller();
    $this->load->model('MCalendar');
  
  }
  
  

  function index(){
	// The forth segment will be used as timeid
	$timeid = $this->uri->segment(3);
	if($timeid==0)
		$time = time();
	else
		$time = $timeid;
	
	// we call _date function 	
	$data = $this->_date($time);
	
	// Set all other variables here
	$data['title'] = "Manage Calendar";
	// Calling this will display links to everyone's calendar. If you don't use it delete it in the view 
	// $data['members'] = $this->user_model->getUsers();
	// You can use this variable to tell that this is your calendar at the top.
	// $data['user'] = $this->session->userdata('username');
	// $data['user_id'] = $this->session->userdata('id');
	$data['header'] = 'Calendar';
	$data['main'] = 'calendar_home';
	// $this->load->view('calendar_home',$data);
	$this->load->vars($data);
	$this->load->view('template'); 
  }
  

  function dayevents ($day){
  		$data['dayevents']= $this->MCalendar->getDayEvents($day);
  		$data['header'] = 'Day events';
		$data['main'] = 'calendar_day_events';
		$this->load->vars($data);
		$this->load->view('calendar_day_events_view'); 
		
		
  }
  
  function create(){
	
	$data['title'] = "Add Events to Calendar";
	// $data['user'] = $this->session->userdata('username');
	// $data['user_id'] = $this->session->userdata('id');
	if(isset($_POST['add']))
	{
		//check for empty inputs
		if((isset($_POST['date']) && !empty($_POST['date'])) && (isset($_POST['eventTitle']) && !empty($_POST['eventTitle'])) && (isset($_POST['eventContent']) && !empty($_POST['eventContent'])))	
		{
			//add new event to the database
			$data['alert']= $this->MCalendar->addEvents();
		}
		else 
		{
			//alert message for empty input
			$data['alert'] = "No empty input please";
		}
	}
		// Set breadcrumb for the second level after Calendar. It will show like Calendar
		// You have to add in language userlib 
		// $this->bep_site->set_crumb($this->lang->line('userlib_calendar_add'),'calendar/admin/create');	
	
		$data['header'] = 'Create new event';
		
		$data['main'] = 'calendar_create';
		$this->load->vars($data);
		$this->load->view('calendar_create_temp'); 
		/*
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_calendar_create";
		$data['module'] = 'calendar';
		$this->load->view($this->_container,$data);
		*/
		}
		
		
	 function edit($id){
	 	//$this->MCalendar->editEvent($id);
	
	  $data['title'] = "Edit Events";
	
	  if(isset($_POST['add']))
	  {
		  //check for empty inputs
		  if((isset($_POST['date']) && !empty($_POST['date'])) && (isset($_POST['eventTitle']) && !empty($_POST['eventTitle'])) && (isset($_POST['eventContent']) && !empty($_POST['eventContent'])))	
		  {
			  //add new event to the database
			  $this->MCalendar->addEvents();
			  $this->session->set_flashdata('message','Event created!');
			  redirect('calendar/index','refresh');
		  }
		  else 
		  {
			  //alert message for empty input
			  $data['alert'] = "No empty input please";
		  }
	  }
		
	  $data['event']= $this->MCalendar->getEventsById($id);
	
		// Set breadcrumb
		// $this->bep_site->set_crumb($this->lang->line('userlib_calendar_edit'),'calendar/admin/edit');	
		$data['header'] = 'Calendar';
		
		$data['main'] = 'calendar_edit';
		$this->load->vars($data);
		$this->load->view('calendar_create_temp'); 
		/*
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_calendar_edit";
		$data['module'] = 'calendar';
		$this->load->view($this->_container,$data);
		*/
	}

	function update(){
		$id=$this->input->post('id');
		if(isset($_POST['add']))
		{
			//check for empty inputs
			if((isset($_POST['date']) && !empty($_POST['date'])) && (isset($_POST['eventTitle']) && !empty($_POST['eventTitle'])) && (isset($_POST['eventContent']) && !empty($_POST['eventContent'])))	
			{
				//update event to the database
				$this->MCalendar->updateEvent($id);
				$this->session->set_flashdata('message', 'Event updated!');
				redirect('calendar/');
			}
			else 
			{
				//alert message for empty input
				$data['alert'] = "No empty input please";
			}
		}
		$this->session->set_flashdata('message', 'Please fill up the information');
		redirect('calendar/update');
		
	}
	
	function delete($id=0){
		$this->MCalendar->deleteEvent($id);
		$this->session->set_flashdata('message', 'Event deleted successfully.');
		redirect('calendar/index');
	}
	
	function mycal($user_id=0){
		
		// Get user's name/details
		$this->load->module_model('auth','user_model');
		$user = $this->user_model->getUsers(array('users.id'=>$user_id));
		$data['user'] = $user->row_array();
		
		$timeid = $this->uri->segment(5);
		if($timeid==0)
			$time = time();
		else
			$time = $timeid;
			
		// we call _date function 	
		$data = $this->_date($time);
		
		// Set breadcrumb
		$this->bep_site->set_crumb($this->lang->line('userlib_calendar_personal','calendar/admin/mycal/$user_id'));	
		$data['title'] = "Manage Calendar";
		// get members from backendpro
		$data['members'] = $this->user_model->getUsers();
		$user_id = $this->uri->segment(4);
		$data['user_id']=$user_id;
		$data['header'] = $this->lang->line('backendpro_access_control');
		$data['page'] = $this->config->item('backendpro_template_admin') . "admin_calendar_mycal";
		$data['module'] = 'calendar';
		$this->load->view($this->_container,$data);
  	}
 
 function _date($time){
 	
	$data['events']=$this->MCalendar->getEvents($time);

	$today = date("Y/n/j", time());
	$data['today']= $today;
	
	$current_month = date("n", $time);
	$data['current_month'] = $current_month;
	
	$current_year = date("Y", $time);
	$data['current_year'] = $current_year;
	
	$current_month_text = date("F Y", $time);
	$data['current_month_text'] = $current_month_text;
	
	$total_days_of_current_month = date("t", $time);
	$data['total_days_of_current_month']= $total_days_of_current_month;
	
	$first_day_of_month = mktime(0,0,0,$current_month,1,$current_year);
	$data['first_day_of_month'] = $first_day_of_month;
	
	//geting Numeric representation of the day of the week for first day of the month. 0 (for Sunday) through 6 (for Saturday).
	$first_w_of_month = date("w", $first_day_of_month);
	$data['first_w_of_month'] = $first_w_of_month;
	
	//how many rows will be in the calendar to show the dates
	$total_rows = ceil(($total_days_of_current_month + $first_w_of_month)/7);
	$data['total_rows']= $total_rows;
	
	//trick to show empty cell in the first row if the month doesn't start from Sunday
	$day = -$first_w_of_month;
	$data['day']= $day;
	
	$next_month = mktime(0,0,0,$current_month+1,1,$current_year);
	$data['next_month']= $next_month;
	
	$next_month_text = date("F \'y", $next_month);
	$data['next_month_text']= $next_month_text;
	
	$previous_month = mktime(0,0,0,$current_month-1,1,$current_year);
	$data['previous_month']= $previous_month;
	
	$previous_month_text = date("F \'y", $previous_month);
	$data['previous_month_text']= $previous_month_text;
	
	$next_year = mktime(0,0,0,$current_month,1,$current_year+1);
	$data['next_year']= $next_year;
	
	$next_year_text = date("F \'y", $next_year);
	$data['next_year_text']= $next_year_text;
	
	$previous_year = mktime(0,0,0,$current_month,1,$current_year-1);
	$data['previous_year']=$previous_year;
	
	$previous_year_text = date("F \'y", $previous_year);
	$data['previous_year_text']= $previous_year_text;
	
	return $data;
  
 }
}//end class
?>