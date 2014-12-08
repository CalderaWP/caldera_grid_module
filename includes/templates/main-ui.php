<div class="caldera-grid-module-main-header">
		<h2><?php _e( 'Caldera Grid Module', 'caldera-grid-module' ); ?> <span class="caldera-grid-module-version"><?php echo CGRD_VER; ?></span></h2>
	<ul class="caldera-grid-module-header-tabs caldera-grid-module-nav-tabs">
				
		

		<li id="caldera-grid-module-save-indicator"><span style="float: none; margin: 16px 0px -5px 10px;" class="spinner"></span></li>
	</ul>
	<span class="wp-baldrick" id="caldera-grid-module-field-sync" data-event="refresh" data-target="#caldera-grid-module-main-canvas" data-callback="cgrd_canvas_init" data-type="json" data-request="#caldera-grid-module-live-config" data-template="#main-ui-template"></span>
</div>
<div class="caldera-grid-module-sub-header">
	<ul class="caldera-grid-module-sub-tabs caldera-grid-module-nav-tabs">
				<li class="{{#is _current_tab value="#caldera-grid-module-panel-grid"}}active {{/is}}caldera-grid-module-nav-tab"><a href="#caldera-grid-module-panel-grid"><?php _e('The Grid', 'caldera-grid-module') ; ?></a></li>

	</ul>
</div>

<form id="caldera-grid-module-main-form" action="?page=caldera_grid_module" method="POST">
	<?php wp_nonce_field( 'caldera-grid-module', 'caldera-grid-module-setup' ); ?>
	<input type="hidden" value="caldera_grid_module" name="id" id="caldera_grid_module-id">
	<input type="hidden" value="{{_current_tab}}" name="_current_tab" id="caldera-grid-module-active-tab">

		<div id="caldera-grid-module-panel-grid" class="caldera-grid-module-editor-panel" {{#is _current_tab value="#caldera-grid-module-panel-grid"}}{{else}} style="display:none;" {{/is}}>		
		<h4><?php _e('Grid Module Prototype', 'caldera-grid-module') ; ?> <small class="description"><?php _e('The Grid', 'caldera-grid-module') ; ?></small></h4>
		<?php
		// pull in the general settings template
		include CGRD_PATH . 'includes/templates/grid-panel.php';
		?>
	</div>

	
	<div class="clear"></div>

</form>

{{#unless _current_tab}}
	{{#script}}
		jQuery(function($){
			$('.caldera-grid-module-nav-tab').first().find('a').trigger('click');
		});
	{{/script}}
{{/unless}}