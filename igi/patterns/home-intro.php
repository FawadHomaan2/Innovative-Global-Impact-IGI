<?php
/**
 * Title: Home — Why we exist
 * Slug: igi/home-intro
 * Categories: igi
 * Description: Two-column thesis — eyebrow left, the mission statement right.
 */
?>
<!-- wp:group {"className":"igi-section","align":"full","layout":{"type":"constrained","contentSize":"1280px"}} -->
<div class="wp-block-group alignfull igi-section">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"clamp(2rem, 6vw, 6rem)"}}}} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column {"width":"26%"} -->
		<div class="wp-block-column" style="flex-basis:26%">
			<!-- wp:paragraph {"className":"igi-eyebrow"} -->
			<p class="igi-eyebrow">Why we exist</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
		<!-- wp:column {"width":"74%"} -->
		<div class="wp-block-column" style="flex-basis:74%">
			<!-- wp:paragraph {"className":"igi-lead","style":{"typography":{"fontFamily":"var(--wp--preset--font-family--display)","fontSize":"clamp(1.6rem, 3.4vw, 2.35rem)","lineHeight":"1.32","fontWeight":"500"}}} -->
			<p class="igi-lead" style="font-family:var(--wp--preset--font-family--display);font-size:clamp(1.6rem, 3.4vw, 2.35rem);line-height:1.32;font-weight:500">Capable people are excluded from opportunity not for lack of talent, but for lack of access to <em class="igi-turn igi-turn--water">education, capital, and markets</em>. Traditional aid meets the moment; it rarely builds a way out. IGI exists to bridge that gap.</p>
			<!-- /wp:paragraph -->
			<!-- wp:paragraph {"className":"igi-arrowlink","style":{"spacing":{"margin":{"top":"1.75rem"}}}} -->
			<p class="igi-arrowlink" style="margin-top:1.75rem"><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About our mission →</a></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
