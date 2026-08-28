<?php
/**
 * Title: Home — Flagship pilots (dark band)
 * Slug: igi/three-pilots
 * Categories: igi
 * Description: The three Afghanistan pilots on a dark photographic band.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-water-families-waiting.jpg';
$igi_camp = home_url( '/campaigns/' );
?>
<!-- wp:cover {"url":"<?php echo esc_url( $igi_img ); ?>","dimRatio":80,"overlayColor":"ink","isUserOverlayColor":true,"contentPosition":"center center","align":"full","className":"igi-flagship igi-on-dark","style":{"spacing":{"padding":{"top":"var:preset|spacing|80","bottom":"var:preset|spacing|80"}}}} -->
<div class="wp-block-cover alignfull igi-flagship igi-on-dark" style="padding-top:var(--wp--preset--spacing--80);padding-bottom:var(--wp--preset--spacing--80)"><span aria-hidden="true" class="wp-block-cover__background has-ink-background-color has-background-dim-80 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $igi_img ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">

	<!-- wp:group {"className":"igi-section-head igi-shell","layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between","verticalAlignment":"bottom"},"style":{"spacing":{"blockGap":"1rem"}}} -->
	<div class="wp-block-group igi-section-head igi-shell">
		<!-- wp:group {"style":{"spacing":{"blockGap":"0.4rem"}},"layout":{"type":"constrained","contentSize":"640px","justifyContent":"left"}} -->
		<div class="wp-block-group">
			<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--marigold"} --><p class="igi-eyebrow igi-eyebrow--marigold">Flagship pilots · Afghanistan</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":2,"fontSize":"x-large"} --><h2 class="wp-block-heading has-x-large-font-size">Where we're proving it first.</h2><!-- /wp:heading -->
		</div>
		<!-- /wp:group -->
		<!-- wp:paragraph {"className":"igi-arrowlink igi-arrowlink--light"} -->
		<p class="igi-arrowlink igi-arrowlink--light"><a href="<?php echo esc_url( $igi_camp ); ?>">All campaigns →</a></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"className":"igi-shell","verticalAlignment":"stretch","style":{"spacing":{"blockGap":{"left":"1.5rem"},"margin":{"top":"2.5rem"}}}} -->
	<div class="wp-block-columns are-vertically-aligned-stretch igi-shell" style="margin-top:2.5rem">
		<!-- wp:column {"verticalAlignment":"stretch","className":"igi-pilot-dark igi-pilot-dark--water"} -->
		<div class="wp-block-column is-vertically-aligned-stretch igi-pilot-dark igi-pilot-dark--water">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Water · Ghor</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3,"fontSize":"large"} --><h3 class="wp-block-heading has-large-font-size"><a href="<?php echo esc_url( $igi_camp ); ?>#ghor">Water that never <em class="igi-turn">reaches</em> them</a></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p>Solar pumping, elevated tanks, gravity-fed distribution.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","className":"igi-pilot-dark igi-pilot-dark--marigold"} -->
		<div class="wp-block-column is-vertically-aligned-stretch igi-pilot-dark igi-pilot-dark--marigold">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Opportunity · Daykundi</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3,"fontSize":"large"} --><h3 class="wp-block-heading has-large-font-size"><a href="<?php echo esc_url( $igi_camp ); ?>#daykundi">Where poverty <em class="igi-turn">becomes</em> opportunity</a></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p>A women's collective producing high-value natural attar.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"verticalAlignment":"stretch","className":"igi-pilot-dark igi-pilot-dark--ember"} -->
		<div class="wp-block-column is-vertically-aligned-stretch igi-pilot-dark igi-pilot-dark--ember">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Survival · Faryab</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":3,"fontSize":"large"} --><h3 class="wp-block-heading has-large-font-size"><a href="<?php echo esc_url( $igi_camp ); ?>#faryab">When birth <em class="igi-turn">becomes</em> survival</a></h3><!-- /wp:heading -->
			<!-- wp:paragraph --><p>Electricity-free warmers and solar-supported oxygen.</p><!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div></div>
<!-- /wp:cover -->
