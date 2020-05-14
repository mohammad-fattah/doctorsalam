<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function index() {
			
			$leveler = $this->Users_model->staff_dashboard_count()->result();
            $view_data['model_info'] = $leveler;
			
			$extra_count = $this->Users_model->staff_client_dashboard_count()->result();
            $view_data['extra_count'] = $extra_count;
			
			$ticket_count = $this->Users_model->staff_ticket_dashboard_count()->result();
            $view_data['ticket_count'] = $ticket_count;
			
			$reminder_count = $this->Users_model->staff_reminder_dashboard_count()->result();
            $view_data['reminder_count'] = $reminder_count;
			
            $this->template->rander("dashboard/staff", $view_data); 
		
    }

}