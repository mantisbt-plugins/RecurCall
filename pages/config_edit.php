<?php
# authenticate
auth_reauthenticate();
access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );

form_security_validate( 'plugin_recurcall_config_update' );
# Read results
$f_action_status		= gpc_get_string('action_status', [RESOLVED]);
$f_next_status			= gpc_get_string('next_status', [ASSIGNED]);
$f_copy_custom			= gpc_get_int('copy_custom', ON);
$f_copy_relations		= gpc_get_int('copy_relations', OFF);
$f_copy_his				= gpc_get_int('copy_his', OFF);
$f_copy_files			= gpc_get_int('copy_files', OFF);
$f_copy_notes			= gpc_get_int('copy_notes', ON);
$f_copy_monitor			= gpc_get_int('copy_monitor', ON);
$f_week_work_days		= gpc_get_int('week_work_days',5);
$f_month_work_days		= gpc_get_int('month_work_days',22);
$f_quarter_work_days	= gpc_get_int('quarter_work_days',65);
$f_half_work_days		= gpc_get_int('half_work_days',130);
$f_full_work_days		= gpc_get_int('full_work_days',260);
$f_change_create		= gpc_get_int('change_create', ON);

# update results
plugin_config_set( 'action_status', $f_action_status );
plugin_config_set( 'next_status', $f_next_status );
plugin_config_set( 'copy_custom', $f_copy_custom );
plugin_config_set( 'copy_relations', $f_copy_relations );
plugin_config_set( 'copy_his', $f_copy_his );
plugin_config_set( 'copy_files', $f_copy_files );
plugin_config_set( 'copy_notes', $f_copy_notes );
plugin_config_set( 'copy_monitor', $f_copy_monitor );
plugin_config_set( 'week_work_days', $f_week_work_days );
plugin_config_set( 'month_work_days', $f_month_work_days );
plugin_config_set( 'quarter_work_days', $f_quarter_work_days );
plugin_config_set( 'half_work_days', $f_half_work_days );
plugin_config_set( 'full_work_days', $f_full_work_days );
plugin_config_set( 'change_create', $f_change_create );
form_security_purge( 'plugin_recurcall_config_update' );
# redirect
print_header_redirect( plugin_page( 'config', true ) );
