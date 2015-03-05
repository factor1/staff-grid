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

### Using Shortcodes ###

The staff grid now has a shortcode to use on pages without editing the page template. 

To show all staff, simply use [staffgrid]

To show only a certain department use [staffgrid department="yourdepartment"]

And that's pretty much it. When you're using the shortcode there is no need to load the manual query, and it automatically outputs a block grid for easy organization. 