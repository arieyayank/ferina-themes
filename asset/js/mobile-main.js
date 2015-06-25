$('#Sliding-akun').click(function(e) {
	e.preventDefault();
	$('#zona-akun').toggle(400);
	return false;
});
$('#Sliding-belanja').click(function(e) {
	e.preventDefault();
	$('#zona-belanja').toggle(400);
	return false;
});
$('#menu-primary-navigation').slicknav({
	label: '',
	duration: 1000,
	easingOpen: "easeOutBounce",
});
