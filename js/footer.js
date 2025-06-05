$(function(){
	var url = window.location; 
	if(window.location.hash === "#TradingRiskManagement"){
		var match = window.location.href.match(/^[^#]+#([^?]*)\??(.*)/);
		var url = match[0].split('#')[0]; 
	} 
	// for sidebar menu entirely but not cover treeview
	$('ul.nav a').filter(function() {
		return this.href != url;
	}).parent().removeClass('active');

	// for sidebar menu entirely but not cover treeview
	$('ul.nav a').filter(function() {
		return this.href == url;
	}).parent().addClass('active');

	// for treeview
	$('ul.dropdown a').filter(function() {
		return this.href == url;
	}).parentsUntil(".nav > .dropdown").addClass('active'); 
})


