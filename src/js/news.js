 $(document).ready(function(){

	var newsStore = new Array();
	
	$.fn.initFeedHosts = function(feedHostList, targetPage) { 
		for (n=0;n<feedHostList.length; n++) {
			var url = document.createElement("a");
			url.href = feedHostList[n];
			var feedHost = url.hostname + " ["+url.pathname+"]";
			var listId = "feedList_"+targetPage;
			var feedId = "feed_"+targetPage+"_"+n;
			$("#"+listId).append("<li id=\""+feedId+"\"data-role=\"list-divider\">"+feedHost+"</li>");
			var entry = feedHostList[n];
			$(this).getFeed(feedHostList[n], listId, feedId);        
			$("#"+listId+":visible").listview('refresh');

		}
	};



  $.fn.getFeed = function(feedUrl, listId, feedId) {
    $.getJSON('./feed.php?feedUrl='+escape(feedUrl)+'&rand='+Math.floor(Math.random()*1000), function(data) {
			if (data != "") {
			  var resultArray = data;
			  // reverse sort the array to keep original order
			  resultArray.reverse(); 
				for (n=0;n<resultArray.length; n++) {
				 	var title = resultArray[n].rsstitle;
				 	var content = resultArray[n].rssdescription;
				 	var contentDate = resultArray[n].rssdate;
				 	var link = resultArray[n].ext_link;
				 	var id = resultArray[n].id;
				 						
				 	newsStore[id] = {"id": id, "title": title, "content": content, "contentDate": contentDate, "link": link};
					
				  	var titleHtml = "<h1>"+title+"</h1>";
				  	var contentHtml = "<p>"+content+"</p>";
				  	var dateHtml = "<p>"+contentDate+"</p>";
				  	$("#"+feedId).after("<li><a id=\""+id+"\" href=\"javascript:void(0);\">"+titleHtml+contentHtml+dateHtml+"</a></li>");

					
					$("#"+id).click(function() {
						$.mobile.changePage('#article', {transition: 'none', role: 'dialog'});
						var articleId = $(this).attr("id");
						$("#dialogContent").html("");
						$("#dialogContent").append("<h3>"+newsStore[articleId]["title"]+"</h3>");
						$("#dialogContent").append("<p>"+newsStore[articleId]["content"]+"</p>");
						$("#dialogContent").append("<p><a href=\""+newsStore[articleId]["link"]+"\">"+newsStore[articleId]["link"]+"</a></p>");
						$("#dialogContent").append("<p>"+newsStore[articleId]["contentDate"]+"</p>");
						$("#dialogContentLink").attr("href", newsStore[articleId]["link"]);
						$("#dialogContentLink").click(function() {
							//$('.ui-dialog').dialog('close');
						});
						
					});
					
				}        
			 }
			  $("#feedList_page1:visible").listview('refresh');
			  $("#feedList_page2:visible").listview('refresh');
			  $("#feedList_page3:visible").listview('refresh');

		});	
				
  };



});