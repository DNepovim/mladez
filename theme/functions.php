<?php

require __DIR__ . '/theme-init.php';

define('NO_EVENTS', 'Nejsou žádné nadcházející akce');
define('DAYS', ['neděle', 'pondělí', 'úterý', 'středa', 'čtvrtek', 'pátek', 'sobota']);
define('MONTHS', [1 => 'leden', 'únor', 'březen', 'duben', 'květen', 'červen', 'červenec', 'srpen', 'září', 'říjen', 'listopad', 'prosinec']);

function get_collected_posts($post_type, $meta_key, $count_of_posts = -1) {

	$args = [
		'post_type'  => $post_type,
		'numberposts'     => $count_of_posts,
		'order' => 'ASC',
		'orderby' => 'meta_value',
		'meta_query' => [
			[
				'key'     => $meta_key,
				'value'   => current_time( 'Y-m-d H:i' ),
				'compare' => '>',
			]
		]
	];

	$posts = get_posts($args);

	$collected_posts = [];

	foreach ($posts as $post) {
		$pointed_day = strtotime(meta($post->ID, $meta_key));
		$collected_posts[date('Y', $pointed_day)][date('n', $pointed_day)][date('j', $pointed_day)][] = $post;
	}

	return $collected_posts;
}
