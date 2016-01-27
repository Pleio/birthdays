<?php

$widget = elgg_extract("entity", $vars);
$owner = $widget->getOwnerEntity();

$num_display = (int) $widget->num_display;
if ($num_display < 1) {
	$num_display = 10;
}

$options = array();
$options["type"] = "user";
$options["limit"] = $num_display;
$options["offset"] = 0;
$options["pagination"] = false;

$options["relationship"] = "member_of_site";
$options["relationship_guid"] = $owner->getGUID();
$options["inverse_relationship"] = true;

// make sure we can see the birthday
elgg_push_context("birthdays");

$users = birthdays_get_upcoming_users($num_display);

if (is_array($users)) {
	if ($users) {
		$listing = elgg_view_entity_list($users);
	} else {
		$listing = elgg_echo("birthdays:widget:none");
	}
} else {
	$listing = elgg_echo("birthdays:widget:not_configured");
}

// restore context
elgg_pop_context();
echo $listing;
