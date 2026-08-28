<?php
/**
 * Title: Campaign — Ghor (Water)
 * Slug: igi/campaign-ghor
 * Categories: igi-campaigns
 * Description: Water That Never Reaches Them. Sub-accent Water Blue. Has imagery.
 */
$igi_img = get_template_directory_uri() . '/assets/images/ghor-water-jerrycans-children.jpg';
?>
<!-- wp:group {"className":"igi-section igi-campaign igi-campaign--water","align":"full","anchor":"ghor","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div id="ghor" class="wp-block-group alignfull igi-section igi-campaign igi-campaign--water">
	<!-- wp:media-text {"align":"wide","mediaPosition":"right","mediaType":"image","mediaWidth":46,"className":"igi-graded","style":{"spacing":{"blockGap":"clamp(1.5rem, 4vw, 3.5rem)"}}} -->
	<div class="wp-block-media-text alignwide is-stacked-on-mobile has-media-on-the-right igi-graded" style="grid-template-columns:auto 46%">
		<div class="wp-block-media-text__content">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Ghor Province · Water</p><!-- /wp:paragraph -->
			<!-- wp:heading {"level":2,"className":"igi-campaign__name","fontSize":"xx-large"} -->
			<h2 class="wp-block-heading igi-campaign__name has-xx-large-font-size">Water that never <em class="igi-turn">reaches</em> them</h2>
			<!-- /wp:heading -->
			<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--mute","style":{"spacing":{"margin":{"top":"0"}}}} -->
			<p class="igi-eyebrow igi-eyebrow--mute" style="margin-top:0">The Smart Water Pipeline Pilot</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>Ghor is one of Afghanistan's most isolated provinces. Families are scattered across steep mountain terrain, and women and children spend hours each day walking to collect water that often isn't safe to drink. Round after round of aid has passed Ghor by.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph -->
			<p>The pilot changes that with engineering, not trucking: solar-powered pumping lifts water into elevated storage tanks, gravity carries it down a distribution network, and IoT leak sensors keep the system efficient and accountable. This isn't water delivery — it's the correction of a geographic inequality.</p>
			<!-- /wp:paragraph -->
			<?php echo igi_donate( array( 'style' => 'igi-water', 'label' => 'Donate to the Water Pipeline', 'anchor' => 'ghor' ) ); // phpcs:ignore ?>
		</div>
		<figure class="wp-block-media-text__media"><img src="<?php echo esc_url( $igi_img ); ?>" alt="Children waiting beside dozens of colorful water jerrycans on a dirt lane in Ghor Province"/></figure>
	</div>
	<!-- /wp:media-text -->
</div>
<!-- /wp:group -->
