// Number format JS
function number_format(number, decimals, dec_point, thousands_sep) {
	number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
	var n = !isFinite(+number) ? 0 : +number,
	prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
	sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
	dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
	s = '',
	toFixedFix = function(n, prec) {
		var k = Math.pow(10, prec);
		return '' + (Math.round(n * k) / k).toFixed(prec);
	};
	// Fix for IE parseFloat(0.55).toFixed(0) = 0;
	s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
	if (s[0].length > 3) {
		s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
	}
	if ((s[1] || '').length < prec) {
		s[1] = s[1] || '';
		s[1] += new Array(prec - s[1].length + 1).join('0');
	}
	return s.join(dec);
}

$(function () {
	// $( ".children" ).show( "slow" );
	$('input.remove-item').click(function(e){
		e.preventDefault();
		$(this).closest('tr').remove();
		$(this).closest('.mlist-belanjaan').remove();
	});

	$('#delAllShop').click(function(e){
		e.preventDefault();
		$(this).closest('.cart-wrapper').remove()
	});

	$("#slider4").responsiveSlides({
		auto: true,
        pager: false,
        nav: true,
        speed: 300,
        before: function () {
        	$('.events').append("<li>before event fired.</li>");
        },
        after: function () {
        	$('.events').append("<li>after event fired.</li>");
        }
	});

	$('#thumbs .thumb a').each(function(i) {
		$(this).addClass( 'itm'+i );
		$(this).click(function() {
			$('#images').trigger( 'slideTo', [i, 0, true] );
			return false;
		});
	});

	$('#thumbs a.itm0').addClass( 'selected' );

	$('#images').carouFredSel({
		direction: 'left',
		circular: true,
		infinite: false,
		items: 1,
		auto: false,
		scroll: {
			fx: 'directscroll',
			onBefore: function() {
				var pos = $(this).triggerHandler( 'currentPosition' );
				$('#thumbs a').removeClass( 'selected' );
				$('#thumbs a.itm'+pos).addClass( 'selected' );
				var page = Math.floor( pos / 4 );
				$('#thumbs').trigger( 'slideToPage', page );
			}
		}
	});

	$('#thumbs').carouFredSel({
		direction: 'left',
		circular: true,
		infinite: false,
		items: 4,
		align: false,
		auto: false,
		prev: '#prev',
		next: '#next'
	});

	$("#LoginPopup").dialog({
		autoOpen: false,
		modal: true,
		show: {
		effect: "blind",
			duration: 1000
		},
		hide: {
		effect: "explode",
			duration: 1000
		}
	});

	$( "#RegisterPopup" ).dialog({
		autoOpen: false,
		modal: true,
		show: {
			effect: "blind",
			duration: 1000
		},
		hide: {
			effect: "explode",
			duration: 1000
		}
	});

	$('#menu-account-login').click(function(e) {
		e.preventDefault();
		$("#LoginPopup").dialog('open');
	});

	$('#menu-account-register').click(function(e) {
		e.preventDefault();
		$("#RegisterPopup").dialog('open');
	});

	jQuery('body').bind('click', function(e){
		if( jQuery('#LoginPopup').dialog('isOpen') && !jQuery(e.target).is('.ui-dialog, a') && !jQuery(e.target).closest('.ui-dialog').length ){
			jQuery('#LoginPopup').dialog('close');
		}

		if(jQuery('#RegisterPopup').dialog('isOpen') && !jQuery(e.target).is('.ui-dialog, a') && !jQuery(e.target).closest('.ui-dialog').length){
			jQuery('#RegisterPopup').dialog('close');
		}

		if(jQuery('#LoginWithDialog').dialog('isOpen') && !jQuery(e.target).is('.ui-dialog, a') && !jQuery(e.target).closest('.ui-dialog').length){
			jQuery('#LoginWithDialog').dialog('close');
		}
	});

	$( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
	$( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
});

$(document).ready(function(){
	$("#admitpage").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
	$("#admitpage li").removeClass("ui-corner-top").addClass("ui-corner-left");
	$(".next").click(function(e) {
		e.preventDefault();
		var index = parseInt(this.href.split("#tab-")[1]) - 1;
		$("#admitpage").tabs("option", "active", index).tabs("refresh");
	});

	var navpos = $('#theheader').offset();
	$(window).bind('scroll', function() {
		if ( $(window).scrollTop() > navpos.top ) {
			$('#theheader').addClass('fixed');
		}
		else {
			$('#theheader').removeClass('fixed');
		}
	});

	$("#buy-selector").click(function(e) {
		e.preventDefault();
		$('ul:first', $(this)).toggleClass('hidden active');
	});

	$("#cart-text").click(function(e) {
		e.preventDefault();
		$('ul.belanjaan').toggleClass('hidden active');
	});

	$('.catmenus li:has(ul)').addClass('has-child');
	$('ul.tabs').each(function(){
		var $active, $content, $links = $(this).find('a');
		$active = $($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
		$active.addClass('active');
		$content = $($active[0].hash);
		$links.not($active).each(function () {
			$(this.hash).hide();
		});

		$(this).on('click', 'a', function(e){
			e.preventDefault();
			$active.removeClass('active');
			$content.hide();
			$active = $(this);
			$content = $(this.hash);
			$active.addClass('active');
			$content.show();
		});
	});

	$('.tipshow').tooltip({align: 'bottom'});

	$('button').on('click',function(e) {
		e.preventDefault();
		if ($(this).hasClass('grid')) {
			$('#Product .product-boxtumb').removeClass('list').addClass('grid');
		} else if($(this).hasClass('list')) {
			$('#Product .product-boxtumb').removeClass('grid').addClass('list');
		}
		var stateObj = { foo: "bar" };
		function change_my_url(){
			history.pushState(stateObj, "page 2", "bar.html");
		}
		var link = document.getElementById('myGrid');
		link.addEventListener('myGrid', change_my_url, false);
	});

	$('.jqzoom').jqzoom({
		zoomType: 'innerzoom',
		preloadImages: false,
		alwaysOn:false
	});

	$('#qtyplus_retail').click(function(e){
		e.preventDefault();
		var fieldName = $(this).attr('field')
		, satuan = parseInt($('input[name=harga_satuan]').val())
		, currentVal = parseInt($('input[name='+fieldName+']').val())
		, currentVal1 = parseInt($('input[name=quantitykod]').val());
		if (!isNaN(currentVal) && currentVal < 19 ){
			$('input[name='+fieldName+']').val(currentVal + 1);
			$('#quantity').val(currentVal + 1);
			var total = parseInt($('input[name=harga_satuan]').val())*parseInt($('.qty').val());
			$('#total').text('Rp. '+ number_format(total, 2, ',', '.'));
		}
		else {
			$('input[name='+fieldName+']').val(0);
			$('input[name=quantitykod]').val( currentVal1 + 1);
		}
	});

	$("#qtyminus_retail").click(function(e) {
		e.preventDefault();
		var fieldName = $(this).attr('field')
		, satuan = parseInt($('input[name=harga_satuan]').val())
		, currentVal = parseInt($('input[name='+fieldName+']').val());
		if (!isNaN(currentVal) && currentVal > 1) {
			$('input[name='+fieldName+']').val(currentVal - 1);
			$('#quantity').val(currentVal - 1);
			var total = parseInt($('input[name=harga_satuan]').val())*parseInt($('.qty').val());
			$('#total').text('Rp. '+ number_format(total, 2, ',', '.'));
		} else {
			$('input[name='+fieldName+']').val(1);
		}
	});

	$('#qtyplus_gross').click(function(e){
		e.preventDefault();
		var fieldName = $(this).attr('field')
		, satuan = parseInt($('input[name=harga_satuan]').val())
		, currentVal = parseInt($('input[name='+fieldName+']').val())
		, currentVal1 = parseInt($('input[name=quantitykod]').val());
		$('input[name=jumlah]').val(parseInt($('input[name='+fieldName+']').val())+1+(parseInt($('input[name=quantitykod]').val())*20));
		var jml_beli = $('input[name=jumlah]').val();
		if (!isNaN(currentVal) && currentVal < 19 ) {
			$('input[name='+fieldName+']').val(currentVal + 1);
		} else {
			$('input[name='+fieldName+']').val(0);
			$('input[name=quantitykod]').val( currentVal1 + 1);
		}

		var total = 0;

		if(jml_beli < 10){
			total = parseInt($('input[name=harga_satuan]').val())*parseInt($('input[name=jumlah]').val());
		} else if(jml_beli < 20){
			total = parseInt($('input[name=harga_satuan1]').val())*parseInt($('input[name=jumlah]').val());
		} else if(jml_beli < 40){
			total = parseInt($('input[name=harga_satuan2]').val())*parseInt($('input[name=jumlah]').val());
		} else {
			total = parseInt($('input[name=harga_satuan3]').val())*parseInt($('input[name=jumlah]').val());
		}

		$('#total').text('Rp. '+ number_format(total, 2, ',', '.'));
	});
	
	$("#qtyminus_gross").click(function(e) {
		e.preventDefault();
		var fieldName = $(this).attr('field')
		, satuan = parseInt($('input[name=harga_satuan]').val())
		, currentVal = parseInt($('input[name='+fieldName+']').val())
		, currentVal1 = parseInt($('input[name=quantitykod]').val())
		, jml_beli = $('input[name=jumlah]').val();

		if(currentVal1 >= 0 ){
			if (!isNaN(currentVal) && currentVal < 20 && currentVal > 1 ) {
				$('input[name='+fieldName+']').val(currentVal - 1);
				$('input[name=jumlah]').val((parseInt($('input[name='+fieldName+']').val())-1)+(parseInt($('input[name=quantitykod]').val())*20));
			} else {
				if(currentVal1 > 0){
					$('input[name='+fieldName+']').val(19);
					$('input[name=quantitykod]').val( currentVal1 - 1);
				}
			}
		}

		var total = 0;

		if(jml_beli < 10){
			total = parseInt($('input[name=harga_satuan]').val())*parseInt($('input[name=jumlah]').val());
		} else if(jml_beli < 20){
			total = parseInt($('input[name=harga_satuan1]').val())*parseInt($('input[name=jumlah]').val());
		} else if(jml_beli < 40){
			total = parseInt($('input[name=harga_satuan2]').val())*parseInt($('input[name=jumlah]').val());
		} else {
			total = parseInt($('input[name=harga_satuan3]').val())*parseInt($('input[name=jumlah]').val());
		}

		$('#total').text('Rp. '+ number_format(total, 2, ',', '.'));
	});

	$('.qtypluskod').click(function(e){
		e.preventDefault();
		var fieldName = $(this).attr('field1')
		, currentVal = parseInt($('input[name='+fieldName+']').val());
		if (!isNaN(currentVal) && currentVal < 20 ) {
			$('input[name='+fieldName+']').val( currentVal + 1);
		} else {
			$('input[name='+fieldName+']').val(20);
		}
	});

	$(".qtyminuskod").click(function(e) {
		e.preventDefault();
		var fieldName = $(this).attr('field1')
		, currentVal = parseInt($('input[name='+fieldName+']').val());
		if (!isNaN(currentVal) && currentVal > 0) {
			$('input[name='+fieldName+']').val(currentVal - 1);
		} else {
			$('input[name='+fieldName+']').val(0);
		}
	});

	$('.lwarna a').on('click',function(e){
		e.preventDefault();
		$('.lwarna a').removeClass('dipilih');
		$(this).addClass('dipilih');
	});

	$('.produk_size div').on('click',function(){
		$('.produk_size div').removeClass('size-dipilih');
		$(this).addClass('size-dipilih');
	});

	$('input[type="checkbox"]').click(function(e){
		if($(this).attr("value")=="buka"){
			$(".second-form-option").toggle();
		}
	});

	$('input[type="radio"]').click( function (e){
		e.preventDefault();
		if($(this).attr("value")=="Bank Transfer"){
			$(".box").hide();
			$(".bank-trans").show();
			$("#nextstep2").attr('disabled' , false);
		}
		if($(this).attr("value")=="Paypal"){
			$(".box").hide();
			$(".paypal").show();
			$("#nextstep2").attr('disabled' , false);
		}
		if($(this).attr("value")=="Credit Card"){
			$(".box").hide();
			$(".cc").show();
			$("#nextstep2").attr('disabled' , false);
		}
	});

	$(".has-child a").click( function (e) {
		e.preventDefault();
		$(this).siblings("ul.children").slideToggle("slow");
	});

	$('.produk_color').click( function (e) {
		e.preventDefault();
		var cols = $(this).attr('data-color')
		, code = $(this).attr('data-code');
		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'post',
			success: function(response, textStatus, jqXHR){
				$("#val_color").val(code);
				$("#beli_produk").attr('disabled',true);
				jQuery(".produk_size").fadeOut();
				jQuery(".produk_size[data-size=" + cols + "]").fadeIn(100);
			},
			fail: function( jqXHR, textStatus, errorThrown ){
				alert('The following error occured: ' + textStatus, errorThrown);
			}
		});
	});

	$('.produk_size').click(function(e){
		e.preventDefault();
		var name = $(this).attr('data-name');
		$.ajax({
			url: '/wp-admin/admin-ajax.php',
			type: 'post',
			success: function(response, textStatus, jqXHR){
				$("#val_size").val(name);
				$("#beli_produk").attr('disabled',false);
			},
			fail: function( jqXHR, textStatus, errorThrown ){
				alert('The following error occured: ' + textStatus, errorThrown);
			}
		});
	});

	$("#setuju").change(function() {
		var checkboxes = $(this);
		$("#btn_checkbox").attr("disabled", !checkboxes.is(":checked"));
	});

	$("#setuju_register").change(function() {
		var checkboxes = $(this);
		$("#btn_checkbox_register").attr("disabled", !checkboxes.is(":checked"));
	});
});
