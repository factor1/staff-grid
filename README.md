# Staff Grid
A custom WordPress plugin to manage a company staff and departments.

## Installation
Clone the repo or download the latest release from Github.

In the WordPress plugins area, choose to upload a new plugin. Upload the zip file located at `staff-grid/dist/staff-grip.zip`

For manual installation, copy the plugin directory found in `staff-grid/src` into the `wp-content/plugins` folder. Activate the plugin from the WordPress admin area.

## Usage
This plugin is just a custom post type, taxonomies, and ACF fields. You will need to write a custom query in order to output items to the themes front-end.

### Example Query
```php
// WP_Query arguments
$args = array(
	'post_type'        => 'f1_staffgrid_cpt',
	'f1_staffgrid_tax' => 'leadership',  // Example (only show items from the "Leadership" category)
	'meta_key'         => 'last_name',
	'orderby'          => 'meta_value',
	'order'            => 'ASC'
);

// The Query
$staff = new WP_Query( $args );

if ($staff->have_posts()) : while ($staff->have_posts()) : $staff->the_post();
	// Do something
endwhile; endif; wp_reset_postdata();
```

## Default ACF Fields
The default ACF fields:

- Position/Title: `the_field( 'title' );`
- Phone: `the_field( 'phone' );`
- Email: `the_field( 'email_address' );`
- Bio: `the_field( 'staff_bio' );`
- Twitter: `the_field( 'twitter_url' );`
- Facebook: `the_field( 'facebook_url' );`
- LinkedIn: `the_field( 'twitter_url' );`
- Instagram: `the_field( 'instagram_url' );`

It is a good idea to wrap these in conditional logic so that they will only be displayed if there is a value.

### Example Output
```php
if (get_field( 'title' )) {
	printf('<p>%s</p>', get_field( 'title' ));
}
```

## Shortcodes
New, _working_ shortcodes have been added in `2.4.0`. There are three attributes
you can add to the shortcode. All staff grid items output from the shortcode are
sorted ASC by menu order.

- department - show staff items pertaining to a certain department (Default: `''` - shows all)
- thumb-size - thumbnail size to use for the image. (Default: `'large'`)
- show - number of staff items to show. (Default: `10`)

### Working Example
Show 5 developers with a small thumbnail size:

```
[f1-staff-grid department="developers" show="5" thumb-size="small"]
```
