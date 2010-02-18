//elem is the blank elem which we want to put a loader into
function showLoader(elem) {
	$("#"+elem).show();
}

function hideLoader(elem) {
	$("#"+elem).hide();
}

function postShowAllMyDocuments(docs) {
	$('#show_my_recent_docs').html('Retrieving <img src="images/ajax-loader.gif">');
	var docHtml = '';

	for(var i=0; i<docs.length; i++) {
		docHtml += "<tr><td><a href='" + docs[i]["link"]+"'><p><strong>" + docs[i]['course'] + "</strong>" +docs[i]['dName'] + docs[i]['vName']+ "</p><p class='time small_text' id='" + docs[i]['timestamp'] + "'>" + docs[i]['timestamp']+"</p></a></td></tr>";
	}
	$('#my_recent_docs').html(docHtml);

	$('#show_my_recent_docs').hide();
}

function showAllMyDocuments() {
	$.post("actions/fetchdocs.php", { "action": "showMine" },
	   function(data){
		postShowAllMyDocuments(data)
	   }, "json");
}

function fetchRecentVersions(docs) {
	var docHtml = '';
	
	for(var i=0; i<docs.length; i++) {
		docHtml += "<tr><td><img src="+ docs[i]["iconPtr"] +"></td><td>"+ docs[i]["displayName"] + " saved a version of </td><td><a href='" + docs[i]["link"]+"'><p>"+docs[i]['dName'] + docs[i]['vName']+ "</a></p></td><td><p class='time small_text' id='" + docs[i]['timestamp'] + "'>" + docs[i]['timestamp']+"</p></td></tr>";
	}
	$('#my_version_feed').html(docHtml);
	$('.time').prettyDate();
	
}



