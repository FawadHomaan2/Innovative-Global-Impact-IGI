<?php
/**
 * Title: Footer
 * Slug: igi/footer
 * Inserter: no
 * Block Types: core/template-part/footer
 */
$igi_uri  = get_template_directory_uri();
$igi_home = home_url( '/' );
$igi_year = wp_date( 'Y' );
?>
<!-- wp:group {"tagName":"footer","className":"igi-footer igi-on-dark","align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|50"}}},"layout":{"type":"constrained","contentSize":"1280px"}} -->
<footer class="wp-block-group alignfull igi-footer igi-on-dark" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50)">

	<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|60"}}}} -->
	<div class="wp-block-columns">

		<!-- wp:column {"width":"48%"} -->
		<div class="wp-block-column" style="flex-basis:48%">
			<!-- wp:image {"width":"200px","style":{"spacing":{"margin":{"bottom":"1rem"}}}} -->
			<figure class="wp-block-image" style="margin-bottom:1rem;width:200px"><a href="<?php echo esc_url( $igi_home ); ?>"><img src="<?php echo esc_url( $igi_uri . '/assets/images/igi-logo-white.png' ); ?>" alt="Innovative Global Impact" width="367" height="104"/></a></figure>
			<!-- /wp:image -->
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"1rem","lineHeight":"1.6"},"spacing":{"margin":{"right":"2rem"}}}} -->
			<p style="margin-right:2rem;font-size:1rem;line-height:1.6">Reducing poverty by building sustainable local economies — through education, entrepreneurship, and access to opportunity. Proved through pilots, built to scale.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"26%"} -->
		<div class="wp-block-column" style="flex-basis:26%">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow">Explore</p><!-- /wp:paragraph -->
			<!-- wp:list {"style":{"typography":{"lineHeight":"2"}}} -->
			<ul class="wp-block-list" style="line-height:2">
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/about/' ) ); ?>">About</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/our-work/' ) ); ?>">Our Work</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Campaigns</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/news/' ) ); ?>">News</a></li><!-- /wp:list-item -->
				<!-- wp:list-item --><li><a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>">Contact</a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"26%"} -->
		<div class="wp-block-column" style="flex-basis:26%">
			<!-- wp:paragraph {"className":"igi-eyebrow"} --><p class="igi-eyebrow" style="margin-bottom:18px">Follow Us</p><!-- /wp:paragraph -->
				<!-- wp:html -->
				<div class="igi-social" style="display:flex;gap:12px;align-items:center;margin:4px 0 20px;"><a href="https://www.facebook.com/profile.php?id=61575755775907" rel="noopener" target="_blank" aria-label="Facebook" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:999px;border:1px solid rgba(237,230,218,0.35);color:rgb(237,230,218);transition:background .15s,color .15s;"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.5 21v-8h2.7l.4-3.1h-3.1V7.9c0-.9.25-1.5 1.55-1.5H16V3.7c-.3-.04-1.3-.13-2.45-.13-2.43 0-4.05 1.48-4.05 4.2v2.13H6.7V13h2.75v8h4z"/></svg></a><a href="https://www.instagram.com/innovative_global_impact" rel="noopener" target="_blank" aria-label="Instagram" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:999px;border:1px solid rgba(237,230,218,0.35);color:rgb(237,230,218);transition:background .15s,color .15s;"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><rect x="3.5" y="3.5" width="17" height="17" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.3" cy="6.7" r="1.2" fill="currentColor" stroke="none"/></svg></a><a href="https://www.linkedin.com/company/innovative-global-impact" rel="noopener" target="_blank" aria-label="LinkedIn" style="display:inline-flex;align-items:center;justify-content:center;width:40px;height:40px;border-radius:999px;border:1px solid rgba(237,230,218,0.35);color:rgb(237,230,218);transition:background .15s,color .15s;"><svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M4.98 3.5a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5zM3 9h4v12H3zM10 9h3.8v1.7h.05c.53-1 1.83-2.05 3.77-2.05 4.03 0 4.78 2.65 4.78 6.1V21h-4v-5.1c0-1.2-.02-2.75-1.67-2.75-1.68 0-1.93 1.3-1.93 2.65V21h-4z"/></svg></a></div>
				<!-- /wp:html -->
			<!-- wp:html -->
				<p style="font-size:1rem;line-height:1;margin:0 0 14px"><a href="mailto:admin@innovativeglobalimpact.org" style="display:inline-flex;align-items:center;gap:8px;line-height:1;color:inherit;text-decoration:none;"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" style="display:block;flex:0 0 auto;"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg><span style="line-height:1;">admin@innovativeglobalimpact.org</span></a></p>
				<!-- /wp:html -->
			<!-- wp:list {"style":{"typography":{"lineHeight":"2"}}} -->
			<ul class="wp-block-list" style="line-height:2">
				
				
				
				<!-- wp:list-item --><li><a <?php echo igi_give_attr( 'general' ); ?> class="igi-give-trigger igi-footer__donate" href="<?php echo esc_url( home_url( '/campaigns/' ) ); ?>">Donate</a></li><!-- /wp:list-item -->
			</ul>
			<!-- /wp:list -->
		</div>
		<!-- /wp:column -->

	</div>
	<!-- /wp:columns -->

	<!-- wp:separator {"className":"is-style-wide","style":{"color":{"background":"#3a2f28"},"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|30"}}}} -->
	<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#3a2f28;color:#3a2f28;margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--30)"/>
	<!-- /wp:separator -->

	<!-- wp:group {"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"},"style":{"spacing":{"blockGap":"0.5rem"}}} -->
	<div class="wp-block-group">
		<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--mute","style":{"typography":{"textTransform":"none","letterSpacing":"0.02em"}}} -->
		<p class="igi-eyebrow igi-eyebrow--mute" style="letter-spacing:0.02em;text-transform:none">© <?php echo esc_html( $igi_year ); ?> Innovative Global Impact</p>
		<!-- /wp:paragraph -->
		<!-- wp:paragraph {"className":"igi-eyebrow igi-eyebrow--mute"} -->
		<p class="igi-eyebrow igi-eyebrow--mute">Nonprofit organization</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</footer>
<!-- /wp:group -->
