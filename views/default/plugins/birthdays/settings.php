<?php
$plugin = elgg_extract("entity", $vars);
$available_fields = birthdays_get_available_profile_fields();

$field_selection = "<div>" . elgg_echo("birthdays:settings:field_selection:description") . "</div>";

if (!empty($available_fields)) {
	$options = array(
			elgg_echo("birthdays:settings:field_selection:none") => ""
	);

	foreach ($available_fields as $metadata_name => $type) {
		$label = $metadata_name;
		if (elgg_echo("profile:" . $metadata_name) != "profile:" . $metadata_name) {
			$label = elgg_echo("profile:" . $metadata_name);
		}

		$options[$label] = $metadata_name;
	}

	$field_selection .= elgg_view("input/radio", array(
		"name" => "params[birthday_field]",
		"options" => $options,
		"value" => $plugin->birthday_field
	));
} else {
	$field_selection .= "<div>" . elgg_echo("notfound") . "</div>";
}

echo elgg_view_module("inline", elgg_echo("birthdays:settings:field_selection"), $field_selection);