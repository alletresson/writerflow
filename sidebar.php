<?php
if ( ! is_active_sidebar( 'sidebar' ) ) {
	return;
} ?>

<div class="widget-area" itemscope itemtype="http://schema.org/WPSideBar">
	<?php dynamic_sidebar( 'sidebar' ); ?>
</div>