<?php get_header();?>
<div class="all container-fluid">
		<div class="row">
			<div class="container">
					<div class="center-text">
                        <?php echo get_html_by_slug('banner-text');?>
					</div>
			</div>
		</div>
</div>
		<div class="row services">
			<div class="container">
				<div class="row">
					<h2>Services</h2>
					<hr class="s">
                    <?php $query = new WP_Query( array( 'category_name' => 'services', 'orderby' => array('order'=>'ASC')));?>
                    <?php if ( $query->have_posts() ) :  while ( $query->have_posts() ) : $query->the_post(); ?>
                        <div class="col-md-3">
                            <?php echo the_post_thumbnail();?>
                            <h3><?php echo the_title(); ?></h3>
                            <p><?php echo the_content(); ?></p>
                        </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata();?>

				</div>
			</div>	
		</div>
		<div class="row">
			<div class="nav-midle navbar ">
				<div class="container">
					<div class="navbar-header">
						<a href="#" class="navbar-brand">Portfolio<hr class="p"></a> 
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responcive-menu2">
							<span class="sr-only">Открыть навигацию</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse " id="responcive-menu2">
						<ul class="nav navbar-nav navbar-right">
                            <?php echo get_all_meta_html(); ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
                <?php echo get_portfolio_html();?>
			</div>

		</div>
		<div class="jast row">
			<div class="container">
				<div class="col-md-6">
					<h2>Just default Section</h2>
					<hr class="s">
					<div class="jast-text">
                        <?php echo get_html_by_slug('just-default-section');?>
                    </div>
					<button class="btn btn-link" type="submit">visit me</button>
				</div>
				<div class="col-md-6">
                    <?php dynamic_sidebar('video_youtube'); ?>
				</div>
			</div>
		</div>
		<div class="twitter row">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>twitter</h2>
						<hr class="s">
					</div>
					<div class="col-md-6 text-right">
						<i class="fa fa-twitter fa-2x "></i>
					</div>
				</div>
				<div class=" row">
					<div class="text col-md-12">
                        <?php echo get_html_by_slug('twitter');?>
					</div>
				</div>
			</div>
		</div>
		<div class="who row">
			<div class="container">
				<div class="row">
					<h2>Who is john doe?</h2>
					<hr class="s">
				</div>
				<div class="row wrapper">
					<div class="text col-md-6">
        				<?php echo get_html_by_slug('who-is-john-doe-left');?>
                    </div>
					<div class="text col-md-6">

                        <?php echo get_html_by_slug('who-is-john-doe-right');?>
                        <?php echo get_html_by_slug('who-is-john-doe-social');?>
					</div>
				</div>
			</div>
		</div>
		<div class="test row">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Testimonials</h2>
						<hr class="p">
					</div>
					<div class="col-md-6 text-right">
						<i>”</i>
					</div>
				</div>
				<div class=" row">
					<div class="text col-md-12">
                        <?php echo get_html_by_slug('testimonials');?>

					</div>
				</div>
			</div>
		</div>
		<div class="contact row">
			<div class="container">
				<h2>contact</h2>
				<hr class="s">
				<form role="form" method="post" id="albr_form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>">
					<div class="col-md-6">
                        <div class="row">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-5 control-label">full name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputName" name="inputName" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-5 control-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" id="inputEmail" name="inputEmail" required>
                                </div>
                            </div>
                        </div>

					</div>
					<div class="col-md-6">
                        <div class="row">
                            <?php echo get_html_by_slug('contact-bottom');?>
                        </div>

					</div>
					<div class="row">
						<div class="form-group">
							<label for="area">message</label>
							<textarea class="form-control" rows="5" id="area" name="area" required></textarea>
						</div>
                        <input type="hidden" name="action" value="contact_form">
                        <div class="form-group">
                            <!--<button class="btn btn-link" type="submit" id="albr_form">visit me</button>-->
                            <input type="submit" value="visit me" class="btn btn-link">
                        </div>
					</div>
				</form>
			</div>
		</div>
<?php get_footer();?>
