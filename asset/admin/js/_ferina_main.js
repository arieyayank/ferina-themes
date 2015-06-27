jQuery(function($){
	var frame,
		metaBox = $( '#ferina_product_images' ), // Your meta box id here
		addImgLink = metaBox.find( '#add-more-imgs' ),
		imgContainer = metaBox.find( '#ferina-product-images-ul' ),
		delImgLink = imgContainer.find( '.delete-fpi-li' );

	addImgLink.on( 'click', function( event ){
		event.preventDefault();
		
		if ( frame ) {
			frame.open();
			return;
		}

		frame = wp.media({
			title: 'Select or Upload For Product Images',
			button: {
				text: 'Insert Images'
			},
			multiple: true
		});

		frame.on( 'select', function() {
			var attachment = frame.state().get('selection').first().toJSON(),
				imgli = $('<li />'),
				imgtag = $('<img />'),
				imgdelink = $('<a />'),
				imghidefield = $('<input type="hidden" name="ferina_product_images[]">');

			imgtag.attr('src', attachment.url);
			imgtag.attr('data-image-id', attachment.id);
			imgtag.attr('width', 90);
			imghidefield.attr('value', attachment.id);
			imgdelink.addClass('delete-fpi-li');
			imgdelink.attr('href', '#');
			imgdelink.text('delete');
			imgli.append(imgtag);
			imgli.append(imghidefield);
			imgli.append(imgdelink);
			imgContainer.append( imgli );
		});

		frame.open();
	});

	imgContainer.on( 'click', '.delete-fpi-li', function( event ) {
		event.preventDefault();
		$(this).closest('li').remove();
	});

	$( "#ferina-product-images-ul" ).sortable({
		revert: true
	});

	$('#add-more-stocks').click(function(ev){
		ev.preventDefault();
		var formclone = $('.cloneform').html().clone(),
			formbaru = $('<div />');

		formbaru.addClass('adding-stock-popup');
		formbaru.append(formclone);
		$('body').append(formbaru);
	});
});