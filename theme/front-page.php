<?php
/* Template Name: Homepage */

$collected_events = get_collected_posts('event', 'start');

$news = get_posts(array('post_type' => 'new', 'numberposts' => 3, 'order' => 'ASC'));

view([
	'collected_events' => $collected_events,
	'news' => $news
]);
