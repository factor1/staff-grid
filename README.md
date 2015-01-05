# README #

This is a custom WordPress plugin to manage all your staff and their departments. 

### How do I get set up? ###

This plugin is pretty ready to roll as is. But to implement the staff output, we'll need to make some manual WP queries. 


### WordPress Query Code Examples ###


	// WP_Query arguments
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
		foreach( $staffgrid as $post ) :	setup_postdata($post); 

### Default Staff Grid ACF Fields ###
Position:  the_field( "title" );
	
Phone:  the_field( "phone" );
	
Email:  the_field( "email_address" );
	
Bio:  the_field( "staff_bio" );
	
Twitter:  the_field( "twitter_url" );
	
Facebook:  the_field( "facebook_url" );
	
LinkedIn:  the_field( "twitter_url" );
	
Instagram:  the_field( "instagram_url" );