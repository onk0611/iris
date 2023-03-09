<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package IRIS_Interactive_Theme
 */

get_header();
$api_key = 'AIzaSyCT27GEnJ4RXnGibP1i0GyneGCRgCfy6_Q';

global $wpdb;
$table_name = $wpdb->prefix . 'form_data';
$results = $wpdb->get_results("SELECT * FROM $table_name");

foreach ($results as $result) :

	echo '<script>console.log("';
	// $result->nom;
	// $result->prenom;
	// $result->email;
	//  $result->localisation;
	$city_name = $result->localisation;

	$url = "https://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($city_name)."&key=".$api_key;
	$response = json_decode(file_get_contents($url), true);
	$latitude = $response['results'][0]['geometry']['location']['lat'];
	$longitude = $response['results'][0]['geometry']['location']['lng'];

	$long[] = $longitude;
	$lat[] = $latitude;
	?>

	var marker = new maplibregl.Marker()
	.setLngLat([<?= $lon[0] ?>, <?= $lat[0] ?>])
	.addTo(map);
<?php 
	echo '")</script>';
endforeach;
?>
	<main id="primary" class="site-main">
	<div id='map' style='width: 800px; height: 600px;'></div>
		<script>

		const key = '2QUsxFDsULg28uUyendX';
		
		var map = new maplibregl.Map({
			container: 'map',
			style: `https://api.maptiler.com/maps/streets-v2/style.json?key=${key}`, // stylesheet location
			center: [2.209666999999996, 46.232192999999995], // starting position [lng, lat]
			zoom: 5 // starting zoom
		});

			<?php for ($i = 0; $i < count($long); $i++) : ?>
				var marker = new maplibregl.Marker()
					.setLngLat([<?= $long[$i] ?>, <?= $lat[$i] ?>])
					.addTo(map);
			<?php endfor; ?>
		</script>
		<?php
		if ( have_posts() ) :
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			// the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</main><!-- #main -->
<?php
// get_sidebar();
// get_footer();