<div class="caldera-grid">
	
	<div class="row">
		<div class="col-xs-12">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-xs-4">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>
		<div class="col-xs-4">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-xs-6">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>
		<div class="col-xs-6">
			<div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div>			
			<div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div>
			<div class="column-body">
			</div>
		</div>

	</div>


</div>


{{#script}}
//<script>

jQuery(function($){


	var dragstate = 0;	

	$(document).on('click', '.dashicons-plus', function(e){
		var parent = $(this).parent().parent();
			prev = parent.prev(),
			parentSize = parent[0].className.split('-'),
			newparent = Math.ceil( parseInt( parentSize[parentSize.length-1] ) / 2 ),
			newcol = Math.floor( parseInt( parentSize[parentSize.length-1] ) / 2 ),
			newinsert = $('<div class="col-xs-' + newcol + '"><div class="column-resize-handle"><span class="dashicons dashicons-minus"></span></div><div class="row-toolbar"><span class="dashicons dashicons-plus"></span></div><div class="column-body"></div></div>');

			if( newcol > 0){
				newinsert.insertAfter(parent);
				parent[0].className = 'col-xs-' + newparent;
			}
			console.log( newparent + ' - ' + newcol );

		//
		//


	});

	$(document).on('click', '.dashicons-minus', function(e){
		var parent = $(this).parent().parent();
			prev = parent.prev(),
			parentSize = parent[0].className.split('-'),
			prevSize = prev[0].className.split('-'),
			from	= parent.find('.column-body').contents();

		prev.find('.column-body').append( from );
		parent.remove();

		prev[0].className = 'col-xs-' + ( parseInt( parentSize[parentSize.length-1] ) + parseInt( prevSize[prevSize.length-1] ) );


	});
	$(document).on('mousedown', '.column-resize-handle', function(e){
		var parent = $(this).parent(),
			prev = parent.prev(),
			parentSize = parent[0].className.split('-'),
			prevSize = prev[0].className.split('-'),
			right = {
				"span"			:	parseInt( parentSize[parentSize.length-1] ),
				"partsize"		:	parent.outerWidth() / parseInt( parentSize[parentSize.length-1] ),
				"start"			:	e.clientX
			};

		dragstate = parent.data('grid', right)[0];
		prev.data('span', parseInt( prevSize[prevSize.length-1] ));

		document.body.focus();
		return false;
	});
	$(document).on('mouseup', function(e){
		if( dragstate ){

			var column = $(dragstate),
				grid = column.data('grid'),
				handle = column.find('.column-resize-handle');

			handle.find('.dashicons').show();
			handle.css( {'position':'','left': '' } );

			dragstate = 0;
		}
	});

	// handle moveing
	$(document).on('mousemove', function(e){
		if( dragstate ){

			var column		= $(dragstate),
				grid		= column.data('grid'),
				handle		= column.find('.column-resize-handle'),				
				previous	= column.prev(),
				prevsize	= previous.data('span'),
				shift		= Math.round(( grid.start - e.clientX )  /  grid.partsize);

			handle.find('.dashicons').hide();

			if( prevsize-shift > 0 && grid.span+shift > 0 ){
				//handle.css('left', e.clientX - start );
				if( e.clientX - grid.start > 6 ){
					handle.css( {'position':'fixed', 'left': e.clientX } );
				}else if( e.clientX - grid.start < 0 ){					
					handle.css( {'position':'fixed', 'left': e.clientX } );
				}

			}
			
			// sec colomns
			left = prevsize-shift;
			right = grid.span+shift;

			if( left > 0 && right > 0 ){
				previous[0].className = 'col-xs-' + left;
				column[0].className = 'col-xs-' + right;
			}

		}

	});


});



{{/script}}

















































