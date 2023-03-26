<?php
	auth_reauthenticate();
	access_ensure_global_level( config_get( 'manage_plugin_threshold' ) );
	layout_page_header( lang_get( 'plugin_recurcall_title' ) );
layout_page_begin( 'config_page.php' );
	print_manage_menu();
?>
<div class="col-md-12 col-xs-12">
<div class="space-10"></div>
<div class="form-container" > 
<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
<div class="widget-box widget-color-blue2">
<div class="widget-header widget-header-small">
	<h4 class="widget-title lighter">
		<i class="ace-icon fa fa-text-width"></i>
		<?php echo lang_get( 'plugin_recurcall_title' ) . ': ' . lang_get( 'plugin_format_config' )?>
	</h4>
</div>
<div class="widget-body">
<div class="widget-main no-padding">
<div class="table-responsive"> 
<table class="table table-bordered table-condensed table-striped"> 

<br/>
<form action="<?php echo plugin_page( 'config_edit' ) ?>" method="post">
	<?php echo form_security_field( 'plugin_recurcall_config_update' ) ?>
		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_action_status' ) ?>
			</td>
			<td class="center">
				<?php print_status_option_list( 'action_status', plugin_config_get( 'action_status'  ) ) ?>
			</td>
		</tr>

		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_next_status' ) ?>
			</td>
			<td class="center">
				<?php print_status_option_list( 'next_status', plugin_config_get( 'next_status'  ) ) ?>
			</td>
		</tr>

		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_custom' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_custom" value="1" <?php echo ( ON == plugin_config_get( 'copy_custom' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_custom" value="0" <?php echo ( OFF == plugin_config_get( 'copy_custom' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>
		
		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_relations' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_relations" value="1" <?php echo ( ON == plugin_config_get( 'copy_relations' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_relations" value="0" <?php echo ( OFF == plugin_config_get( 'copy_relations' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>

		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_files' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_files" value="1" <?php echo ( ON == plugin_config_get( 'copy_relations' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_files" value="0" <?php echo ( OFF == plugin_config_get( 'copy_relations' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>


		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_history' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_his" value="1" <?php echo ( ON == plugin_config_get( 'copy_his' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_his" value="0" <?php echo ( OFF == plugin_config_get( 'copy_his' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>
		
		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_notes' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_notes" value="1" <?php echo ( ON == plugin_config_get( 'copy_notes' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_notes" value="0" <?php echo ( OFF == plugin_config_get( 'copy_notes' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>

		<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_recurcall_monitor' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="copy_monitor" value="1" <?php echo ( ON == plugin_config_get( 'copy_monitor' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="copy_monitor" value="0" <?php echo ( OFF == plugin_config_get( 'copy_monitor' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>

				<tr >
			<td class="category">
				<?php echo lang_get( 'plugin_change_create' ) ?>
			</td>
			<td class='center'>
				<label><input type="radio" name="change_create" value="1" <?php echo ( ON == plugin_config_get( 'change_create' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_enabled' ) ?></label>
				<label><input type="radio" name="change_create" value="0" <?php echo ( OFF == plugin_config_get( 'change_create' ) ) ? 'checked="checked" ' : ''?>/>
				<?php echo lang_get( 'plugin_recurcall_disabled' ) ?></label>
			</td>
		</tr>
		
		
		<tr >
			<td class="category" width="60%">
				<?php echo lang_get( 'plugin_recurcall_week' ) ?>
			</td>
			<td  class='center' width="20%">
				<input type="text" name="week_work_days" size="3" maxlength="3" value="<?php echo plugin_config_get( 'week_work_days' )?>" >			</td>
		</tr>
		
		<tr>
			<td class="category" width="60%">
				<?php echo lang_get( 'plugin_recurcall_month' ) ?>
			</td>
			<td  class='center' width="20%">
				<input type="text" name="month_work_days" size="3" maxlength="3" value="<?php echo plugin_config_get( 'month_work_days' )?>" >			</td>
		</tr>

		<tr >
			<td class="category" width="60%">
				<?php echo lang_get( 'plugin_recurcall_quarter' ) ?>
			</td>
			<td class='center' width="20%">
				<input type="text" name="quarter_work_days" size="3" maxlength="3" value="<?php echo plugin_config_get( 'quarter_work_days' )?>" >			</td>
		</tr>

		<tr >
			<td class="category" width="60%">
				<?php echo lang_get( 'plugin_recurcall_half' ) ?>
			</td>
			<td   class='center'width="20%">
				<input type="text" name="half_work_days" size="3" maxlength="3" value="<?php echo plugin_config_get( 'half_work_days' )?>" >			</td>
		</tr>

		<tr >
			<td class="category" width="60%">
				<?php echo lang_get( 'plugin_recurcall_full' ) ?>
			</td>
			<td class='center' width="20%">
				<input type="text" name="full_work_days" size="3" maxlength="3" value="<?php echo plugin_config_get( 'full_work_days' )?>" >			</td>
		</tr>
</table>
</div>
</div>
<div class="widget-toolbox padding-8 clearfix">
	<input type="submit" class="btn btn-primary btn-white btn-round" value="<?php echo lang_get( 'change_configuration' )?>" />
</div>
</div>
</div>
</form>
</div>
</div>
<?php
layout_page_end();