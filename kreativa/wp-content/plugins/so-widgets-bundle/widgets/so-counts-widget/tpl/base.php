<?php 
$count=count($instance['counts']);
if($count==5) :$count=4; endif;
$total=12;
$col=$total/$count;
?>
<?php foreach( $instance['counts'] as $i => $count ) : ?>
    <div class="col-md-<?php echo $col;?> col-sm-6 col-xs-12">     
		<div class="milestone">
		    <span class="stat-count"><?php echo esc_html($count['number']) ?></span>
		    <div class="milestone-details"><?php echo esc_html($count['text'])?></div>
		</div>
	</div><!-- end col -->
<?php endforeach;?>    


