<?php
require_once(dirname(__FILE__) . "/lib/functions.php");

// register default Elgg events
elgg_register_event_handler("init", "system", "birthdays_init");

function birthdays_init() {
	if (elgg_is_active_plugin("profile_manager")) {
		// add custom profile field type
		// only works with Profile Manager active
		$profile_options = array(
			"show_on_register" => true,
			"mandatory" => true,
			"user_editable" => true,
			"output_as_tags" => false,
			"admin_only" => true,
			"count_for_completeness" => true
		);

		add_custom_field_type("custom_profile_field_types", "birthday", elgg_echo("birthdays:profile_field:type"), $profile_options);
	}

	elgg_register_widget_type("birthdays", elgg_echo("birthdays:widget:title"), elgg_echo("birthdays:widget:description"), "dashboard,index");

	elgg_extend_view("user/status", "birthdays/user_status", 600);
	elgg_extend_view("js/elgg", "birthdays/js/site");
}
