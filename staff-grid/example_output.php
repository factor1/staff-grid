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

		
		<?php
global $post;
$args = array( 
		'numberposts' 			=> -1, 
		'post_type'              => 'f1_staffgrid_cpt',	
		//'f1_staffgrid_tax' 		=> 'leadership', // Department Taxonomy (per site)
		'meta_key' 				=> 'last_name',
		'orderby'					=> 'meta_value', 
		'order' 						=> 'ASC'
		);
		
$staffgrid = get_posts( $args );
foreach( $staffgrid as $post ) :	setup_postdata($post); ?>


<h2><a data-remodal-target="modal-<?php the_ID(); ?>"><?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?></a></h2>

<div class="remodal" data-remodal-id="modal-<?php the_ID();?>">

	<div class="row">
		<div class="medium-4 columns">
			<?php if(has_post_thumbnail()) {
			the_post_thumbnail();
			} else {	}
			?>
			<?php the_field( "first_name" ); ?>&nbsp;<?php the_field( "last_name" ); ?>
		</div>
		
		<div class="medium-8 columns">
			<dl>
					<dt>Position</dt>
					<dd><?php if(get_field( "title" )) : the_field( "title" ); endif; ?></dd>
					
					<dt>Phone</dt>
					<dd><?php if(get_field( "phone" )) : the_field( "phone" ); endif; ?></dd>
					
					<dt>Email</dt>
					<dd><?php if(get_field( "email_address" )) : the_field( "email_address" ); endif; ?></dd>
					
					<dt>Bio</dt>
					<dd><?php if(get_field( "staff_bio" )) : the_field( "staff_bio" ); endif; ?></dd>
					
					<dt>Twitter</dt>
					<dd><?php if(get_field( "twitter_url" )) : the_field( "twitter_url" ); else: echo('none');  endif; ?></dd>
					
					<dt>Facebook</dt>
					<dd><?php if(get_field( "facebook_url" )) : the_field( "facebook_url" ); else: echo('none');  endif; ?></dd>
					
					<dt>LinkedIn</dt>
					<dd><?php if(get_field( "twitter_url" )) : the_field( "linkedin_url" ); else: echo('none');  endif; ?></dd>
					
					<dt>Instagram</dt>
					<dd><?php if(get_field( "instagram_url" )) : the_field( "instagram_url" ); else: echo('none');  endif; ?></dd>
			</dl>
		</div>
	</div>
</div>


<?php endforeach; ?>
</div>




</article>


<?php get_footer(); ?>
