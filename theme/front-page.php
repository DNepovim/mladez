<?php
/* Template Name: Homepage */


$events = get_posts(array('post_type' => 'event', 'numberposts' => 5, 'order' => 'ASC'));

$news = get_posts(array('post_type' => 'new', 'numberposts' => 3, 'order' => 'ASC'));

view(['events' => $events, 'news' => $news]);
