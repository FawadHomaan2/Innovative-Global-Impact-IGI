<?php
/**
 * Title: CTA — Fund a pilot (dark band)
 * Slug: igi/cta-band
 * Categories: igi
 * Description: Recurring dark photographic "fund a pilot" CTA. Open-ended — no goal.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-water-jerrycans-children.jpg';
?>
<!-- wp:cover {"url":"<?php echo esc_url( $igi_img ); ?>","dimRatio":70,"overlayColor":"ink","isUserOverlayColor":true,"minHeight":56,"minHeightUnit":"vh","contentPosition":"center left","align":"full","className":"igi-fund igi-on-dark"} -->
<div class="wp-block-cover alignfull igi-fund igi-on-dark is-position-center-left" style="min-height:56vh"><span aria-hidden="true" class="wp-block-cover__background has-ink-background-color has-background-dim-70 has-background-dim"></span><img class="wp-block-cover__image-background" alt="" src="<?php echo esc_url( $igi_img ); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container">
	<!-- wp:group {"style":{"spacing":{"blockGap":"1.1rem"}},"layout":{"type":"constrained","contentSize":"620px","justifyContent":"left"}} -->
	<div class="wp-block-group">
		<!-- wp:heading {"level":2,"fontSize":"xx-large","style":{"typography":{"lineHeight":"1.08"}}} -->
		<h2 class="wp-block-heading has-xx-large-font-size" style="line-height:1.08">Fund a pilot.<br>Any amount builds it.</h2>
		<!-- /wp:heading -->
		<!-- wp:paragraph {"style":{"typography":{"fontSize":"1.125rem","lineHeight":"1.55"}}} -->
		<p style="font-size:1.125rem;line-height:1.55">Give once or monthly, to the work as a whole or a single pilot. Every gift builds local economies designed to last.</p>
		<!-- /wp:paragraph -->

		<!-- wp:html -->
		<ul class="igi-tags" aria-label="What your gift builds">
			<li class="igi-tag">Clean water at home</li>
			<li class="igi-tag">Off-grid newborn care</li>
			<li class="igi-tag">A woman's first income</li>
		</ul>
		<!-- /wp:html -->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0.6rem"}},"layout":{"type":"flex","flexWrap":"wrap","verticalAlignment":"center"}} -->
		<div class="wp-block-group">
			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button -->
				<div class="wp-block-button"><a <?php echo igi_give_attr( 'general' ); ?> class="igi-give-trigger wp-block-button__link wp-element-button" href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Donate now</a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div></div>
<!-- /wp:cover -->
