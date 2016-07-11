<?php

	/* Template Name: Staff */
	get_header(); ?>

<article>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post" id="post-<?php the_ID(); ?>">

		<?php if(has_post_thumbnail()) {
			the_post_thumbnail();
			} else {	}
			?>

			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>


			<?php edit_post_link('Edit this entry.', '<hr><p>', '</p>'); ?>
		</div>

		<?php endwhile; endif; ?>



<div class="post row">
<h3>Leadership</h3>


	<ul class="medium-block-grid-3">
					<?php
					global $post;
					$args = array(
							'posts_per_page' 			=> -1, 
							'post_type'              => 'f1_staffgrid_cpt',
							//'f1_staffgrid_tax' 		=> 'leadership', // Department Taxonomy (per site).
							'meta_key' 				=> 'last_name',
							'orderby'					=> 'meta_value',
							//'post__in' 				=> array( 2, 5, 12, 14, 20 );,  // Use ID's in an array for specific ordering.
							'order' 						=> 'ASC'

							);

					$staffgrid = get_posts( $args );
					foreach( $staffgrid as $post ) :	setup_postdata($post); ?>

					<li>
						<a data-remodal-target="modal-<?php the_ID(); ?>" style="text-align:center">

							<div class="f1_mentor_photo_container">
							<?php if(has_post_thumbnail()) {
								the_post_thumbnail();
								} else {	}
							?>
							</div>

							<div class="f1_mentor_summary_name"><strong><?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?></strong></div>
							<div class="f1_mentor_summary_title"><small><?php if(get_field( "title" )) : the_field( "title" ); endif; ?></small></div>
					</a>
					</li>


					<div class="remodal" data-remodal-id="modal-<?php the_ID();?>">

						<div class="row">
							<div class="medium-4 columns">
								<div class="f1_mentor_details_photo_container">
								<?php if(has_post_thumbnail()) {
									the_post_thumbnail();
									} else {	}
									?>
								</div>

								<div class="f1_mentor_details_social_container">
									<?php if(get_field( "phone" )) : echo('Phone: '); the_field( "phone" ); endif; ?></br>
									<?php if(get_field( "email_address" )) : echo('<a href="mailto:'); the_field( "email_address"); echo('">Email '); the_field( "first_name" ); echo('</a></br>'); endif; ?>

									<?php if(get_field( "twitter_url" )) : echo('<a href="'); the_field( "twitter_url" ); echo('">Twitter</a></br>');  endif; ?>
									<?php if(get_field( "facebook_url" )) : echo('<a href="'); the_field( "facebook_url" ); echo('">Facebook</a></br>');  endif; ?>
									<?php if(get_field( "linkedin_irl" )) : echo('<a href="'); the_field( "linkedin_irl" ); echo('">LinkedIn</a></br>');  endif; ?>
									<?php if(get_field( "instagram_url" )) : echo('<a href="'); the_field( "instagram_url" ); echo('">Instagram</a></br>');  endif; ?>


								</div>

							</div>

							<div class="medium-8 columns">
									<p class="f1_mentor_details_name"><strong><?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?></strong></br>
									<span class="f1_mentor_summary_title"><small>	<?php if(get_field( "title" )) : the_field( "title" ); endif; ?></small></span></p>

									<div class="f1_mentor_details_bio">
									<?php if(get_field( "staff_bio" )) : the_field( "staff_bio" ); endif; ?>
									</div>
							</div>
						</div>
					</div>


					<?php endforeach; ?>
			</ul>




</div>




</article>


<?php get_footer(); ?>
