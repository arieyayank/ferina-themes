$('#Sliding-akun').click(function() {
	$('#zona-akun').toggle(400);
	return false;
});
$('#Sliding-belanja').click(function() {
	$('#zona-belanja').toggle(400);
	return false;
});
$('#menu-primary-navigation').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutBounce", //available with jQuery UI
	//prependTo:'#demo2'
});