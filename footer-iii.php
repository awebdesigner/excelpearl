<!--// End the Content Container -->
</div>
<div id="footer" class="container<?php (get_theme_mod('ftwide'))? echo "-fluid": echo ""; ?>">
<div class="row">
	<div id="signup-form">
	<?php if(!function_exists('dynamic_sidebar')  || !dynamic_sidebar('footer')): endif; ?><?php if($_SERVER['REQUEST_URI'] == "/"): ?>
	<h1>Newsletter</h1>
	<p>Get Heart healthy info and tips,right in your inbox. </p>
	<form action=#" method="post">
	<div class="row">
		<input type="text" name="fullname" class="form-control" placeholder="Name" />
	</div>
	<div class="row">
		<div class="col-md-8">
		<input type="text" name="email" class="form-control" placeholder="E-amil" />
		</div>
		<div class="col-md-4">
		<input type="submit" value="signup" class="form-control"/>
		</div>
	</div>

	</form>
	<?php endif; ?>
	</div>
</div>
<div class="row">
<div id="copyright">
<div class="col-md-6"><p id="copy_txt">&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></p></div>
<?php if(get_theme_mod('gb_gblank_designer')): ?><div class="col-md-6"><p id="designer">Design by <a href="<?php echo get_theme_mod('gb_gblank_designerlink'); ?>" target="_blank" rel="nofollow"><?php echo get_theme_mod('gb_gblank_designer'); ?></a></p></div><?php endif; ?>
</div>
</div>
</div>
</div><!-- wrapper ends above -->
<?php wp_footer(); ?>
</body>
</html>