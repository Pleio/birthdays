<?php

$widget = elgg_extract("entity", $vars);

$who_to_show_options = array(
	"friends" => elgg_echo("friends"),
	"all" => elgg_echo("all")
);

$num_display = (int) $widget->num_display;
if ($num_display < 1) {
	$num_display = 10;
}

$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 15, 20, 25);

echo "<div>";
echo elgg_echo("widget:numbertodisplay");
echo "&nbsp;" . elgg_view("input/dropdown", array(
	"name" => "params[num_display]",
	"value" => $num_display,
	"options" => $numbers
));
echo "</div>";
