<?php get_header(); ?>
<div style="background: rgba(0,0,0,0.3); padding:5px;">
	<?php
	while(have_posts()){
		the_post();
?>
<h1><?php the_title(); ?></h1>
<?php } ?>
</div>
<div class="row">
<div class="col-md-8"><div style="padding: 50px;">
<?php
	while(have_posts())
{
		the_post();
		the_content();
	} 
?></div>
</div>
	<div class="col-md-4">
	<?php get_sidebar('right'); ?>
	</div>
</div>

<?php get_footer(); ?>