<?php
/**
 * Title: Ported design — campaigns
 * Slug: igi/port-campaigns
 * Inserter: no
 *
 * Rebuilt 2026-07-20 to the "three cards" design (design handoff). Colours are
 * kept on the site's neutral scheme (no accent hues): ink on light, taupe on
 * dark, muted labels. Donate buttons open the GiveWP modal via igi_give_attr().
 * Pilot locations per the client doc: water=Ghor, maternity=Ghor (was Faryab),
 * attar=Nangarhar (was Daykundi). Modal form keys (ghor/faryab/daykundi) are
 * internal ids that still map to the correct water/maternity/attar forms.
 */
$igi_uri = get_template_directory_uri() . '/assets/images/';
?>
<!-- wp:group {"align":"full","className":"igi-port"} -->
<div class="wp-block-group alignfull igi-port">
<!-- wp:html -->
<div style="font-family: 'Hanken Grotesk', system-ui, sans-serif; color: rgb(36, 28, 23); background: rgb(250, 248, 244); overflow-x: hidden;">
<style>
  .igi-port .igi-camp-panel { display: none; }
  .igi-port .igi-camp-panel.is-open { display: flex; flex-direction: column; gap: 12px; margin-top: 18px; }
</style>

  <!-- COMPACT INTRO HERO -->
  <section id="main" style="position: relative; padding: clamp(116px, 13vw, 156px) clamp(20px, 5vw, 56px) clamp(44px, 6vw, 72px); background: rgb(23, 18, 14);">
    <img src="<?php echo esc_url( $igi_uri . 'ghor-water-jerrycans-children.jpg' ); ?>" alt="Children waiting beside dozens of colorful water jerrycans in Ghor" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;">
    <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(23,18,14,0.86) 0%, rgba(23,18,14,0.72) 55%, rgba(23,18,14,0.9) 100%);"></div>
    <div style="position: relative; max-width: 1280px; margin: 0 auto;">
      <div style="font-family: 'Spline Sans Mono', monospace; font-size: 12.5px; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase; color: rgb(237, 230, 218); margin-bottom: 22px;">Ways to give</div>
      <h1 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(40px, 5.6vw, 76px); line-height: 1.0; letter-spacing: -0.012em; color: rgb(251, 247, 240);">Choose a cause<br>to <span style="font-style: italic; color: rgb(237, 230, 218);">support</span>.</h1>
      <p style="font-size: clamp(16px, 1.5vw, 19px); line-height: 1.55; color: rgb(228, 216, 198); max-width: 36em; margin-top: 24px;">Three real projects you can fund today — clean water and newborn care in Ghor, and skills for women in Nangarhar. Give any amount, once or monthly.</p>
    </div>
  </section>

  <!-- THREE CARDS -->
  <section style="background: rgb(250, 248, 244); padding: clamp(48px, 6vw, 88px) clamp(20px, 5vw, 56px) clamp(64px, 8vw, 104px);">
    <div style="max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(min(100%, 330px), 1fr)); gap: clamp(20px, 2.4vw, 30px); align-items: start;">

      <!-- WATER · GHOR -->
      <div data-rev style="display: flex; flex-direction: column; background: #fff; border: 1px solid rgb(228, 216, 198); border-radius: 8px; overflow: hidden;">
        <div style="position: relative; aspect-ratio: 4/3; overflow: hidden;">
          <img src="<?php echo esc_url( $igi_uri . 'ghor-water-families-waiting.jpg' ); ?>" alt="Women and children waiting beside their water containers against a mud-brick wall in Ghor" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: rgb(36, 28, 23);"></div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 1; padding: clamp(24px, 2.2vw, 32px);">
          <div style="font-family: 'Spline Sans Mono', monospace; font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgb(99, 90, 80); margin-bottom: 14px;">Water · Ghor</div>
          <h2 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(25px, 2.3vw, 31px); line-height: 1.1; letter-spacing: -0.01em; color: rgb(36, 28, 23);">63 families without <span style="font-style: italic; color: rgb(36, 28, 23);">safe</span> water</h2>
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">In rural Ghor, 63 families are drinking unsafe water that is killing their children — and $16,000 can bring them a solar-powered pipeline for clean, reliable water.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-0" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">In a rural area of Feroz Koh, Ghor Province, at least 63 families urgently need safe drinking water. With clean sources scarce, children suffer waterborne diseases such as diarrhea — with cases of serious illness and child mortality linked directly to unsafe water.</p>
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">Pregnant women, the elderly, and children walk 1 to 1.5 hours daily to collect water from distant, unsafe sources, and the prolonged crisis has forced some families to abandon their homes and migrate. This intervention delivers reliable, sustainable water access to reduce disease, prevent displacement, and restore basic dignity.</p>
          </div>
          <div style="flex: 1;"></div>
          <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px;">
            <a <?php echo igi_give_attr( 'ghor' ); // phpcs:ignore ?> href="#" class="igi-give-trigger scp9" style="flex: 1 1 auto; text-align: center; font-size: 15px; font-weight: 700; color: rgb(250, 248, 244); background: rgb(36, 28, 23); padding: 14px 24px; border-radius: 999px; text-decoration: none;">Donate now</a>
            <button type="button" class="igi-camp-toggle scpa" aria-expanded="false" aria-controls="igi-camp-panel-0" style="flex: 0 0 auto; font-family: 'Hanken Grotesk', sans-serif; font-size: 14px; font-weight: 600; color: rgb(36, 28, 23); background: transparent; border: 1.5px solid rgb(201, 188, 168); padding: 12.5px 20px; border-radius: 999px; cursor: pointer;">More details</button>
          </div>
        </div>
      </div>

      <!-- SURVIVAL · GHOR (newborn care photo) -->
      <div data-rev style="display: flex; flex-direction: column; background: #fff; border: 1px solid rgb(228, 216, 198); border-radius: 8px; overflow: hidden;">
        <div style="position: relative; aspect-ratio: 4/3; overflow: hidden;">
          <img src="<?php echo esc_url( home_url( '/wp-content/uploads/2026/08/newborns-scaled.jpg' ) ); ?>" alt="A newborn baby receiving care in a maternity and newborn unit in Ghor" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: rgb(36, 28, 23);"></div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 1; padding: clamp(24px, 2.2vw, 32px);">
          <div style="font-family: 'Spline Sans Mono', monospace; font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgb(99, 90, 80); margin-bottom: 14px;">Survival · Ghor</div>
          <h2 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(25px, 2.3vw, 31px); line-height: 1.1; letter-spacing: -0.01em; color: rgb(36, 28, 23);">Power failures shouldn't cost a newborn's <span style="font-style: italic; color: rgb(36, 28, 23);">life</span></h2>
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">A $10,000 Frugal Maternity Care Pilot equips one maternity and newborn unit with off-grid technology, so babies receive warmth, oxygen, and emergency care even when the electricity fails.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-1" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">In the maternal and newborn units of public health facilities in Feroz Koh, Ghor Province, childbirth is increasingly high-risk due to critical shortages of essential equipment and unstable service capacity.</p>
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">Many women must be referred to other provinces for basic obstetric and neonatal care, but extreme poverty and transport costs make that impossible — so delayed or missed referrals often end in preventable deaths. This pilot equips wards with essential devices, strengthens newborn care, and keeps services running locally so women receive life-saving care without leaving the province.</p>
          </div>
          <div style="flex: 1;"></div>
          <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px;">
            <a <?php echo igi_give_attr( 'faryab' ); // phpcs:ignore ?> href="#" class="igi-give-trigger scp9" style="flex: 1 1 auto; text-align: center; font-size: 15px; font-weight: 700; color: rgb(250, 248, 244); background: rgb(36, 28, 23); padding: 14px 24px; border-radius: 999px; text-decoration: none;">Donate now</a>
            <button type="button" class="igi-camp-toggle scpa" aria-expanded="false" aria-controls="igi-camp-panel-1" style="flex: 0 0 auto; font-family: 'Hanken Grotesk', sans-serif; font-size: 14px; font-weight: 600; color: rgb(36, 28, 23); background: transparent; border: 1.5px solid rgb(201, 188, 168); padding: 12.5px 20px; border-radius: 999px; cursor: pointer;">More details</button>
          </div>
        </div>
      </div>

      <!-- OPPORTUNITY · NANGARHAR (real flower photo) -->
      <div data-rev style="display: flex; flex-direction: column; background: #fff; border: 1px solid rgb(228, 216, 198); border-radius: 8px; overflow: hidden;">
        <div style="position: relative; aspect-ratio: 4/3; overflow: hidden;">
          <img src="<?php echo esc_url( $igi_uri . 'nangarhar-flowers-harvest.jpg' ); ?>" alt="A woman harvesting pink roses in a flower field below mountains in Nangarhar" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: rgb(36, 28, 23);"></div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 1; padding: clamp(24px, 2.2vw, 32px);">
          <div style="font-family: 'Spline Sans Mono', monospace; font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgb(99, 90, 80); margin-bottom: 14px;">Opportunity · Nangarhar</div>
          <h2 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(25px, 2.3vw, 31px); line-height: 1.1; letter-spacing: -0.01em; color: rgb(36, 28, 23);">Turning local resources into <span style="font-style: italic; color: rgb(36, 28, 23);">opportunity</span></h2>
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">With a $12,000 pilot, women in Nangarhar will gain practical skills in traditional distillation, transforming local flowers and natural resources into sustainable livelihoods.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-2" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">For many women in Nangarhar, opportunity is limited — but the natural resources around them are abundant. The Women's Attar Initiative trains women in traditional distillation, giving them the skills to turn local flowers into valuable products and sustainable livelihood opportunities.</p>
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">By preserving traditional knowledge and investing in women's skills, this project creates lasting opportunities for greater economic independence and stronger communities.</p>
          </div>
          <div style="flex: 1;"></div>
          <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px;">
            <a <?php echo igi_give_attr( 'daykundi' ); // phpcs:ignore ?> href="#" class="igi-give-trigger scp9" style="flex: 1 1 auto; text-align: center; font-size: 15px; font-weight: 700; color: rgb(250, 248, 244); background: rgb(36, 28, 23); padding: 14px 24px; border-radius: 999px; text-decoration: none;">Donate now</a>
            <button type="button" class="igi-camp-toggle scpa" aria-expanded="false" aria-controls="igi-camp-panel-2" style="flex: 0 0 auto; font-family: 'Hanken Grotesk', sans-serif; font-size: 14px; font-weight: 600; color: rgb(36, 28, 23); background: transparent; border: 1.5px solid rgb(201, 188, 168); padding: 12.5px 20px; border-radius: 999px; cursor: pointer;">More details</button>
          </div>
        </div>
      </div>

    </div>
  </section>

  <script>
  (function () {
    var toggles = document.querySelectorAll('.igi-port .igi-camp-toggle');
    for (var i = 0; i < toggles.length; i++) {
      toggles[i].addEventListener('click', function () {
        var panel = document.getElementById(this.getAttribute('aria-controls'));
        var open = this.getAttribute('aria-expanded') === 'true';
        this.setAttribute('aria-expanded', String(!open));
        this.textContent = open ? 'More details' : 'Hide details';
        if (panel) { panel.classList.toggle('is-open', !open); }
      });
    }
  })();
  </script>

</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
