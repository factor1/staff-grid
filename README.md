# README #

This is a custom WordPress plugin to manage all your staff and their departments. 

### How do I get set up? ###

This plugin is pretty ready to roll as is. But to implement the staff output, we'll need to make some manual WP queries. 


### WordPress Query Code Examples ###

<pre><code>
		// WP_Query arguments
		$args = array (
			'post_type'              => 'f1_staffgrid_cpt',
			'pagination'             => false,
			'orderby'                => 'menu_order',
		);
</code></pre>