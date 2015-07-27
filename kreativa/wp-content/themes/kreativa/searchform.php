<?php // Exit if accessed directly
if (!defined('ABSPATH')) {echo '<h1>Forbidden</h1>'; exit();} get_header(); ?>
<div class="search">
	<form class="searchform rcw-form" method="get" id="searchform_top" autocomplete="off" action="<?php echo home_url( '/' ); ?>">
   		<input type="text" class="form-control" name="s" id="s" placeholder="Search text here..">
	</form>
    </div>
    
	    