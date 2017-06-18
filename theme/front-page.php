<?php
/* Template Name: Homepage */

$collected_events = get_collected_posts('event', 'start');

$news = get_posts(array('post_type' => 'new', 'numberposts' => 3, 'order' => 'ASC'));

$units = get_posts(array('post_type' => 'unit', 'numberposts' => -1, 'order' => 'ASC'));

$links = meta(get_the_ID(), 'links');

view([
	'collected_events' => $collected_events,
	'news' => $news,
	'units' => $units,
	'links' => $links
]);
