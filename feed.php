<?php
	header("Content-Type: text/html; charset=utf-8");
	
	require_once('./lib/simplepie.inc');
	
	if (isset($_GET["feedUrl"])) {
		$feedUrl = urldecode($_GET["feedUrl"]);
	} else {
		$feedUrl="http://www.20min.ch/rss/rss.tmpl?type=channel&get=4";
	}

	$MAX_ARITICLES = 10;
	$MAX_CHARS = 600;
	
	$feed = new SimplePie();
	$feed->set_feed_url($feedUrl);
	$feed->init();
	$feed->set_item_limit($MAX_ARITICLES);
	$feed->handle_content_type();
	
	$articles = array();
	
	foreach ($feed->get_items() as $item):
		$i++;
		$obj["id"] = uniqid();
		$obj["rsstitle"] = strip_tags($item->get_title());
		$content = strip_tags($item->get_description());
		if (strlen($content) > $MAX_CHARS){
			$content = substr(strip_tags($item->get_description()), 0, $MAX_CHARS)." [...]";
		}
		$obj["rssdescription"] = $content;
		$obj["rssdate"] = strip_tags($item->get_date('j F Y G:i'));
		$obj["ext_link"] = strip_tags($item->get_permalink());
		
		array_push($articles, $obj);
		
		if ($i >= $MAX_ARITICLES){
			break;
		}
	
	endforeach;

    $json = json_encode($articles);
    echo $json;

  ?>



