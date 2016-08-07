<!Doctype html>
<html>
<head>
    <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div id="wrapper">
	<div id="header" class="container<?php (get_theme_mod('ftwide'))? echo "-fluid": echo ""; ?>">
	<?php if($_SERVER['REQUEST_URI'] != "/"): ?>
    <div class="row">
	<nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <?php
            wp_nav_menu( array(
                'menu'              => 'primary',
                'theme_location'    => 'primary-menu',
                'depth'             => 2,
                'container'         => 'ul',
                'container_class'   => 'collapse navbar-collapse',
                'container_id'      => 'bs-example-navbar-collapse-1',
                'menu_class'        => 'nav navbar-nav',
                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                'walker'            => new wp_bootstrap_navwalker())
            );
        ?>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>
	</div>
	<?php endif; ?>
<div class="header">
    <?php 
	$logourl = get_theme_mod('gb_gblank_logo');
	if(!empty($logourl)): ?>
          <a id="logo" href="<?php bloginfo('url'); ?>"><img src="<?php echo $logourl; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" /></a>
	<?php else:?>
                <a id="logo" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>   
    <?php endif; ?>
		<a class="sm-highlight border" href="<?php echo get_theme_mod('gb_gblank_donatelink'); ?>">Donate <span class="fa fa-<?php echo get_theme_mod('gb_gblank_donateicon'); ?>"></span></a>
</div>
</div>
<!--// Start the content container -->
<div class="container<?php (get_theme_mod("wide")=="1")? echo "-fluid":""; ?>">