<?php get_header(); ?>
<div class="row">
	<div class="col-md-7">
		<?php if(get_theme_mod('gb_gblank_introheader')): ?>
		<div class="box bgimg" style="background: url('<?php echo get_theme_mod('gb_gblank_introbg'); ?>') no-repeat; background-size:cover;">
			<div class="content">
				<?php echo get_theme_mod('gb_gblank_introheader'); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
	<div class="col-md-5">
<?php if(get_theme_mod('gb_gblank_intro')): ?>
		<div class="box bgcolor">
		<div class="content">
<p><?php echo get_theme_mod('gb_gblank_intro'); ?></p>
<a href="<?php echo get_theme_mod('gb_gblank_introlink'); ?>"><span class="sm-btn dark"><?php echo get_theme_mod('gb_gblank_introlinklabel'); ?></a>
		</div>
		</div>
	</div>
<?php endif; ?>
</div>
<div class="row">
	<div class="col-md-4">
	<?php if(get_theme_mod('gb_gblank_bx1_label')): ?>
		<a href="<?php echo get_theme_mod('gb_gblank_bx1_link'); ?>"><div class="big-btn">
			<div class="btn-icon">
				<span class="fa fa-<?php echo get_theme_mod('gb_gblank_bx1_icon'); ?>"></span>
			</div>
			<div class="btn-txt">
				<?php echo get_theme_mod('gb_gblank_bx1_label'); ?>
			</div>
		</a>
	<?php endif; ?>
		</div>
	</div>
	<div class="col-md-4">
	<?php if(get_theme_mod('gb_gblank_bx2_label')): ?>
		<a href="<?php echo get_theme_mod('gb_gblank_bx2_link'); ?>">
			<div class="big-btn">
			<div class="btn-icon">
				<span class="fa fa-<?php echo get_theme_mod('gb_gblank_bx2_icon'); ?>"></span>
			</div>
			<div class="btn-txt">
				<?php echo get_theme_mod('gb_gblank_bx2_label'); ?>
			</div>
		</div>
		</a>
	<?php endif; ?>
	</div>
	<div class="col-md-4">
	<?php if(get_theme_mod('gb_gblank_bx3_label')): ?>
		<a href="<?php echo get_theme_mod('gb_gblank_bx3_link'); ?>">
		<div class="big-btn">
			<div class="btn-icon">
		<span class="fa fa-<?php echo get_theme_mod('gb_gblank_bx3_icon'); ?>"></span>
			</div>
			<div class="btn-txt">
			<?php echo get_theme_mod('gb_gblank_bx3_label'); ?>
			</div>
		</div>
		</a>
	<?php endif; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
	<?php if(get_theme_mod('gb_gblank_bx4_label')): ?>
		<a href="<?php echo get_theme_mod('gb_gblank_bx4_link'); ?>">
		<div class="highlight dark">
			<?php echo get_theme_mod('gb_gblank_bx4_label'); ?>
		</div>
		</a>
	<?php endif; ?>
	</div>
	<div class="col-md-6">
	<?php if(get_theme_mod('gb_gblank_bx5_label')): ?>
		<a href="<?php echo get_theme_mod('gb_gblank_bx5_link'); ?>">
		<div class="highlight outline">
			<?php echo get_theme_mod('gb_gblank_bx5_label'); ?>
		</div>
		</a>
	<?php endif; ?>
	</div>
</div>
<?php get_footer(); ?>