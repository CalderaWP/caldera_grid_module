<?php

$caldera_grid_module = get_option( '_caldera_grid_module' );

?>
<div class="wrap" id="caldera-grid-module-main-canvas">
	<span class="wp-baldrick spinner" style="float: none; display: block;" data-target="#caldera-grid-module-main-canvas" data-callback="cgrd_canvas_init" data-type="json" data-request="#caldera-grid-module-live-config" data-event="click" data-template="#main-ui-template" data-autoload="true"></span>
</div>

<div class="clear"></div>

<input type="hidden" class="clear" autocomplete="off" id="caldera-grid-module-live-config" style="width:100%;" value="<?php echo esc_attr( json_encode($caldera_grid_module) ); ?>">

<script type="text/html" id="main-ui-template">
	<?php
	// pull in the join table card template
	include CGRD_PATH . 'includes/templates/main-ui.php';
	?>	
</script>





