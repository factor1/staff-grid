# README #

This is a custom WordPress plugin to manage all your staff and their departments.

### How do I get set up? ###

This plugin is pretty ready to roll as is, you can just grab the zip file included in this repository.
To implement the staff output, you'll need to make some manual WP queries...

### WordPress Query Example ###

```php
// WP_Query arguments
$args = array(
	'post_type'             => array( 'f1_staffgrid_cpt' ),
	'posts_per_page' 				=> -1,
	'f1_staffgrid_tax' 			=> 'leadership', // Department Taxonomy (optional)
	'meta_key' 							=> 'last_name',
	'orderby'								=> 'meta_value',
	'order' 								=> 'ASC'
);

// The Query
$query = new WP_Query( $args );
```

### Default Staff Grid ACF Fields ###
By default, we include a few standard fields a user may want to display on their
staff grid views. It's a good idea to include all these with conditional logic in
your theme so that they will automatically show/hide if content is entered.

- Position/Title:  `the_field( 'title' );`
- Phone:  `the_field( 'phone' );`
- Email:  `the_field( 'email_address' );`
- Bio:  `the_field( 'staff_bio' );`
- Twitter:  `the_field( 'twitter_url' );`
- Facebook:  `the_field( 'facebook_url' );`
- LinkedIn:  `the_field( 'twitter_url' );`
- Instagram:  `the_field( 'instagram_url' );`

### Using Shortcodes ###
Shortcodes have been removed in `2.3.0`
