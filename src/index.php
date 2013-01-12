<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html> 
<html> 
	<head> 
	<title>News</title> 
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<link rel="apple-touch-icon" href="/site/css/apple-touch-icon.png" />
	<link rel="icon" type="image/png" href="css/favicon.png" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
	<script type="text/javascript">
	$(document).on("mobileinit", function(){
		$.mobile.defaultPageTransition = 'none';
		$.mobile.defaultDialogTransition = 'none';
		$.mobile.useFastClick  = false;
	});
	</script>	
	<script src="http://code.jquery.com/mobile/1.1.0/jquery.mobile-1.1.0.min.js"></script>
	<script type="text/javascript"><?php echo JS_CONFIG ?></script>
	<script src="js/news.js"></script>
	<script type="text/javascript">	
	$(document).ready(function(){
  	  
		var feedHostList =  new Array ("http://www.nzz.ch/?rss=true",
		"http://www.20min.ch/rss/rss.tmpl?type=channel&get=1",
		"http://newsrss.bbc.co.uk/rss/newsonline_uk_edition/world/rss.xml"
		);	   
		$(this).initFeedHosts(feedHostList, "page1");
	
	
		var feedHostList =  new Array ("http://feeds.gawker.com/lifehacker/excerpts.xml",
		"http://zenhabits.net/feed/",
		"http://feeds.feedburner.com/dumblittleman",
		"http://feeds.feedburner.com/Workawesome",
		"http://lifehacks.alltop.com/rss/",
		"http://life.alltop.com/rss/"
		);
		$(this).initFeedHosts(feedHostList, "page2");
	
	
		var feedHostList =  new Array ("http://rss.slashdot.org/Slashdot/slashdot",
		"http://entwickler.com/xmlfeeds/?feed=java&version=2.0",
		"http://www.heise.de/newsticker/heise.rdf",
		"http://feeds.wired.com/wired/index?format=xml",
		"http://www.apple.com/chde/main/rss/hotnews/hotnews.rss",
		"http://www.amazon.de/gp/rss/new-releases/digital-text/530886031/ref=zg_bsnr_530886031_rsslink",
		"http://www.amazon.de/gp/rss/bestsellers/digital-text/530886031/ref=zg_bs_530886031_rsslink"
		);   
		$(this).initFeedHosts(feedHostList, "page3");
	  	  
	});
	</script>
</head> 
<body> 

<div data-role="page" id="page1">
	<div data-role="header">
		<h1>News</h1>
		
		<div data-role="navbar" data-iconpos="left">
			<ul>
				<li><a href="#page1" data-icon="" class="ui-btn-active ui-state-persist">News</a></li>
				<li><a href="#page2" data-icon="">Life</a></li>
				<li><a href="#page3" data-icon="">Tech & Misc</a></li>
			</ul>
		</div><!-- /navbar -->

	</div><!-- /header -->

	<div data-role="content">	
		<ul id="feedList_page1" data-role="listview" data-inset="true" data-filter="false"></ul>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h3><a id="" href="#" onclick="$.mobile.silentScroll(0)" data-role="button" data-icon="arrow-u">Top</a></h3>
	</div><!-- /footer -->
</div><!-- /page -->

<div data-role="page" id="page2">
	<div data-role="header">
		<h1>News</h1>
		
		<div data-role="navbar" data-iconpos="left">
			<ul>
				<li><a href="#page1" data-icon="">News</a></li>
				<li><a href="#page2" data-icon="" class="ui-btn-active ui-state-persist">Life</a></li>
				<li><a href="#page3" data-icon="">Tech & Misc</a></li>
			</ul>
		</div><!-- /navbar -->

	</div><!-- /header -->

	<div data-role="content">	
		<ul id="feedList_page2" data-role="listview" data-inset="true" data-filter="false"></ul>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h3><a id="" href="#" onclick="$.mobile.silentScroll(0)" data-role="button" data-icon="arrow-u">Top</a></h3>
	</div><!-- /footer -->
		
</div><!-- /page -->


<div data-role="page" id="page3">
	<div data-role="header">
		<h1>News</h1>
		
		<div data-role="navbar" data-iconpos="left">
			<ul>
				<li><a href="#page1" data-icon="">News</a></li>
				<li><a href="#page2" data-icon="">Life</a></li>
				<li><a href="#page3" data-icon="" class="ui-btn-active ui-state-persist">Tech & Misc</a></li>
			</ul>
		</div><!-- /navbar -->

	</div><!-- /header -->

	<div data-role="content">	
		<ul id="feedList_page3" data-role="listview" data-inset="true" data-filter="false"></ul>
	</div><!-- /content -->
	
	<div data-role="footer">
		<h3><a id="" href="#" onclick="$.mobile.silentScroll(0)" data-role="button" data-icon="arrow-u">Top</a></h3>
	</div><!-- /footer -->	
	
</div><!-- /page -->

<!-- Start of second page: #two -->
<div data-role="page" id="article">
	<div data-role="header">
		<h1>Article</h1>

	</div><!-- /header -->

	<div data-role="content">	
		<p id="dialogContent"></p>
        <a id="dialogContentLink" href="#" data-role="button" target="_blank">External Link</a>
        <a id="dialogCloseLink" href="#" data-role="button" data-rel="back" >Close</a>      
		
	</div><!-- /content -->	
</div><!-- /page two -->

</body>
</html>