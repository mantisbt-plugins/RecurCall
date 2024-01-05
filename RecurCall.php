<?php
require_once( config_get( 'plugin_path' ) . 'RecurCall' . DIRECTORY_SEPARATOR . 'RecurCall_api.php' );  

class recurCallPlugin extends MantisPlugin {

	function register() {
		$this->name = 'RecurCall';    
		$this->description = 'Ability to use recurring calls';    
		$this->page = 'config';           
		$this->version = '2.11';     
		$this->requires = array( 'MantisCore' => '2.0.0', );
		$this->author = 'Cas Nuy';        
		$this->contact = '';       
		$this->url = '';           
	}

	function config() {
		return array(
			'action_status'		=> RESOLVED,
			'next_status'		=> ASSIGNED,
			'copy_custom'   	=> true,
			'copy_relations'	=> false,
			'copy_his'      	=> false,
			'copy_files'		=> false,
			'copy_notes'		=> false,
			'copy_monitor'		=> true,
			'week_work_days' 	=> 5,
			'month_work_days'	=> 22,
			'quarter_work_days'	=> 65,
			'half_work_days' 	=> 130,
			'full_work_days' 	=> 260,
			'change_create'		=> false,
			);
	}

	function init() { 
		plugin_event_hook( 'EVENT_UPDATE_BUG', 'RecurIt' );
	}

	function RecurIt($p_event, $t_existing_bug, $t_updated_bug ) {
		$t_bug_data= $t_updated_bug;
		if ($t_bug_data->status == plugin_config_get('action_status')) {
			$p_bug_id = $t_bug_data->id;
		if ($t_bug_data->severity>=74 and $t_bug_data->severity <= 79){
				$p_project_id 				= $t_bug_data->project_id ;
				$p_severity 				= $t_bug_data->severity ;
				$p_copy_custom_fields 		= plugin_config_get('copy_custom');
				$p_copy_relationships 		= plugin_config_get('copy_relations');
				$p_copy_history 			= plugin_config_get('copy_his');
				$p_copy_attachments 		= plugin_config_get('copy_files');
				$p_copy_bugnotes 			= plugin_config_get('copy_notes');
				$p_copy_monitoring_users	= plugin_config_get('copy_monitor');
				$p_week 					= plugin_config_get('week_work_days');
				$p_month 					= plugin_config_get('month_work_days');
				$p_quarter 					= plugin_config_get('quarter_work_days');
				$p_half 					= plugin_config_get('half_work_days');
				$p_full 					= plugin_config_get('full_work_days');
				// first copy the bug
				$p_new_bug_id = bug_copy( $p_bug_id, $p_project_id , $p_copy_custom_fields, $p_copy_relationships, $p_copy_history, $p_copy_attachments, $p_copy_bugnotes, $p_copy_monitoring_users ) ;
				// next set the new values
				// first calculate the duedate of recurring issue
				if ($p_severity == 74){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),1) ;
				}
				if ($p_severity == 75){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),$p_week) ;
				}
				if ($p_severity == 76){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),$p_month) ;
				}
				if ($p_severity == 77){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),$p_quarter) ;
				}
				if ($p_severity == 78){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),$p_half) ;
				}
				if ($p_severity == 79){
					$c_value= calcduedate((mktime(0,0,0,date("m"),date("d"),date("Y"))),$p_full) ;
				}
				bug_set_field( $p_new_bug_id, 'due_date', $c_value);
				// finally set the defined status
				bug_set_field( $p_new_bug_id, 'status', plugin_config_get('next_status'));
				// update craete dat
				$change_create	= config_get( 'plugin_RecurCall_change_create' );
				if ( ON == $change_create ) {
					$c_value = time();
					bug_set_field( $p_new_bug_id, 'date_submitted', $c_value);
				}
			}
		}
		return $t_bug_data;
	}
}