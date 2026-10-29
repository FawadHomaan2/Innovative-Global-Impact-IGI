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
  .igi-camp-grid { max-width: 1280px; margin: 0 auto; display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: clamp(20px, 2.4vw, 30px); align-items: start; }
  @media (min-width: 992px) { .igi-camp-grid { grid-template-columns: repeat(3, minmax(0, 1fr)); } }
  @media (max-width: 700px) { .igi-camp-grid { grid-template-columns: 1fr; } }
</style>

  <!-- COMPACT INTRO HERO -->
  <section id="main" style="position: relative; padding: clamp(116px, 13vw, 156px) clamp(20px, 5vw, 56px) clamp(44px, 6vw, 72px); background: rgb(23, 18, 14);">
    <img src="<?php echo esc_url( $igi_uri . 'ghor-water-jerrycans-children.jpg' ); ?>" alt="Children waiting beside dozens of colorful water jerrycans in Ghor" style="position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover;">
    <div style="position: absolute; inset: 0; background: linear-gradient(180deg, rgba(23,18,14,0.86) 0%, rgba(23,18,14,0.72) 55%, rgba(23,18,14,0.9) 100%);"></div>
    <div style="position: relative; max-width: 1280px; margin: 0 auto;">
      <div style="font-family: 'Spline Sans Mono', monospace; font-size: 12.5px; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase; color: rgb(237, 230, 218); margin-bottom: 22px;">Ways to give</div>
      <h1 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(40px, 5.6vw, 76px); line-height: 1.0; letter-spacing: -0.012em; color: rgb(251, 247, 240);">Choose a cause<br>to <span style="font-style: italic; color: rgb(237, 230, 218);">support</span>.</h1>
      <p style="font-size: clamp(16px, 1.5vw, 19px); line-height: 1.55; color: rgb(228, 216, 198); max-width: 36em; margin-top: 24px;">Fund a real project today: clean water and newborn care in Ghor, and skills for women in Nangarhar. Or give to the general fund and we'll direct it where it's needed most. Any amount, once or monthly.</p>
    </div>
  </section>

  <!-- DONATE CARDS -->
  <section style="background: rgb(250, 248, 244); padding: clamp(48px, 6vw, 88px) clamp(20px, 5vw, 56px) clamp(64px, 8vw, 104px);">
    <div class="igi-camp-grid">

      <!-- GENERAL FUND · ALL PILOTS -->
      <div data-rev style="display: flex; flex-direction: column; background: #fff; border: 1px solid rgb(228, 216, 198); border-radius: 8px; overflow: hidden;">
        <div style="position: relative; aspect-ratio: 4/3; overflow: hidden;">
          <img src="https://innovativeglobalimpact.org/wp-content/uploads/2026/09/delivering-equipments-880x620.jpg" alt="IGI delivering program equipment and supplies to a community in Afghanistan" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: rgb(36, 28, 23);"></div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 1; padding: clamp(24px, 2.2vw, 32px);">
          <div style="font-family: 'Spline Sans Mono', monospace; font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgb(99, 90, 80); margin-bottom: 14px;">General fund · All pilots</div>
          <h2 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(25px, 2.3vw, 31px); line-height: 1.1; letter-spacing: -0.01em; color: rgb(36, 28, 23);">Give where it's <span style="font-style: italic; color: rgb(36, 28, 23);">needed most</span></h2>
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">Not sure which to choose? Give to IGI's general fund and we'll direct your gift to the pilot that needs it most: clean water, newborn survival, or women's livelihoods.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-3" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">A general gift gives IGI the flexibility to move fast, covering the pilot closest to its goal, responding to an urgent need, or seeding the next locally-run project. Every dollar stays with the work, and we report back on where it went.</p>
          </div>
          <div style="flex: 1;"></div>
          <div style="display: flex; flex-wrap: wrap; gap: 10px; margin-top: 26px;">
            <a <?php echo igi_give_attr( 'general' ); // phpcs:ignore ?> href="#" class="igi-give-trigger scp9" style="flex: 1 1 auto; text-align: center; font-size: 15px; font-weight: 700; color: rgb(250, 248, 244); background: rgb(36, 28, 23); padding: 14px 24px; border-radius: 999px; text-decoration: none;">Donate now</a>
            <button type="button" class="igi-camp-toggle scpa" aria-expanded="false" aria-controls="igi-camp-panel-3" style="flex: 0 0 auto; font-family: 'Hanken Grotesk', sans-serif; font-size: 14px; font-weight: 600; color: rgb(36, 28, 23); background: transparent; border: 1.5px solid rgb(201, 188, 168); padding: 12.5px 20px; border-radius: 999px; cursor: pointer;">More details</button>
          </div>
        </div>
      </div>

      <!-- WATER · GHOR -->
      <div data-rev style="display: flex; flex-direction: column; background: #fff; border: 1px solid rgb(228, 216, 198); border-radius: 8px; overflow: hidden;">
        <div style="position: relative; aspect-ratio: 4/3; overflow: hidden;">
          <img src="<?php echo esc_url( $igi_uri . 'ghor-water-families-waiting.jpg' ); ?>" alt="Women and children waiting beside their water containers against a mud-brick wall in Ghor" style="width: 100%; height: 100%; object-fit: cover; display: block;">
          <div style="position: absolute; top: 0; left: 0; width: 100%; height: 5px; background: rgb(36, 28, 23);"></div>
        </div>
        <div style="display: flex; flex-direction: column; flex: 1; padding: clamp(24px, 2.2vw, 32px);">
          <div style="font-family: 'Spline Sans Mono', monospace; font-size: 11.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; color: rgb(99, 90, 80); margin-bottom: 14px;">Water · Tappa-e-Shahida, Ghor</div>
          <h2 style="font-family: 'Newsreader', serif; font-weight: 400; font-size: clamp(25px, 2.3vw, 31px); line-height: 1.1; letter-spacing: -0.01em; color: rgb(36, 28, 23);">She lost her baby <span style="font-style: italic; color: rgb(36, 28, 23);">carrying water</span></h2>
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">In the village of Tappa-e-Shahida in Ghor, 90 to 100 families share one unreliable water source at the bottom of a steep, rocky path. Women and children make the climb every day, and in winter the ice makes it deadly. After nine years trying for a child, one woman was finally pregnant. She lost her baby carrying a 10-litre container up that path.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-0" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">&ldquo;I&rsquo;d been married nine years, and I went to every province in Afghanistan for treatment so I could have a child. I was eight weeks pregnant. Because we have no water, I went down to fetch it, and I lost my baby. My heart aches so much.&rdquo;</p>
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">Families here sometimes go seven to ten days without bathing, and illness linked to poor hygiene has spread among the children. This pilot builds a solar-powered, gravity-fed water supply: solar pumps lift water to a 10,000-litre tank, and gravity carries it through pipes to water points near people&rsquo;s homes, kept running year-round so that around 90 to 100 families never have to make that climb again. &ldquo;For God&rsquo;s sake, if they hear our voice, please help us. Save us from these water problems.&rdquo;</p>
          </div>
          <div style="flex: 1;"></div>
          <div class="igi-goal" data-form="<?php echo (int) igi_give_form_id( 'ghor' ); ?>" style="margin-top:22px;">
            <div style="height:8px;background:rgb(228,216,198);border-radius:999px;overflow:hidden;"><span class="igi-goal__fill" style="display:block;height:100%;width:0;background:rgb(36,28,23);border-radius:999px;transition:width .8s ease;"></span></div>
            <div style="display:flex;justify-content:space-between;gap:10px;margin-top:9px;font-family:'Spline Sans Mono',monospace;font-size:12px;letter-spacing:.02em;color:rgb(99,90,80);">
              <span class="igi-goal__raised" style="font-weight:600;color:rgb(36,28,23);">Loading…</span>
              <span class="igi-goal__goal"></span>
            </div>
          </div>
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
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">The Frugal Maternity Care Pilot equips one maternity and newborn unit with off-grid technology, so babies receive warmth, oxygen, and emergency care even when the electricity fails.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-1" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">In the maternal and newborn units of public health facilities in Feroz Koh, Ghor Province, childbirth is increasingly high-risk due to critical shortages of essential equipment and unstable service capacity.</p>
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">Many women must be referred to other provinces for basic obstetric and neonatal care, but extreme poverty and transport costs make that impossible, so delayed or missed referrals often end in preventable deaths. This pilot equips wards with essential devices, strengthens newborn care, and keeps services running locally so women receive life-saving care without leaving the province.</p>
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
          <p style="font-size: 16px; line-height: 1.6; color: rgb(74, 64, 54); margin-top: 14px;">Through this pilot, women in Nangarhar will gain practical skills in traditional distillation, transforming local flowers and natural resources into sustainable livelihoods.</p>
          <div class="igi-camp-panel" id="igi-camp-panel-2" style="border-left: 3px solid rgb(36, 28, 23); padding-left: 16px;">
            <p style="font-size: 14.5px; line-height: 1.6; color: rgb(74, 64, 54);">For many women in Nangarhar, opportunity is limited, but the natural resources around them are abundant. The Women's Attar Initiative trains women in traditional distillation, giving them the skills to turn local flowers into valuable products and sustainable livelihood opportunities.</p>
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
    var grid = document.querySelector('.igi-port .igi-camp-grid');
    // Equalize cards at their COLLAPSED height only, so expanding one card
    // grows that card alone and never pads the others with empty space.
    function equalize() {
      if (!grid) return;
      var cards = Array.prototype.slice.call(grid.children);
      cards.forEach(function (c) { c.style.minHeight = ''; });
      if (window.innerWidth <= 700) return; // mobile: single column, natural height
      // measure with every panel closed, then restore the ones that were open
      var openPanels = Array.prototype.slice.call(grid.querySelectorAll('.igi-camp-panel.is-open'));
      openPanels.forEach(function (p) { p.classList.remove('is-open'); });
      var max = 0;
      cards.forEach(function (c) { if (c.offsetHeight > max) max = c.offsetHeight; });
      cards.forEach(function (c) { c.style.minHeight = max + 'px'; });
      openPanels.forEach(function (p) { p.classList.add('is-open'); });
    }

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

    equalize();
    window.addEventListener('load', equalize);
    if (document.fonts) { if (document.fonts.ready) { document.fonts.ready.then(equalize); } }
    var rt;
    window.addEventListener('resize', function () { clearTimeout(rt); rt = setTimeout(equalize, 150); });
    window.__igiCampEqualize = equalize;
  })();
  </script>

  <script>
  (function(){
    function usd(n){try{return new Intl.NumberFormat('en-US',{style:'currency',currency:'USD',maximumFractionDigits:0}).format(n);}catch(e){return '$'+Math.round(n);}}
    var nodes=document.querySelectorAll('.igi-port .igi-goal[data-form]');
    if(!nodes.length) return;
    fetch('/wp-json/givewp/v3/campaigns?per_page=100',{headers:{'Accept':'application/json'}})
      .then(function(r){return r.ok?r.json():[];})
      .then(function(list){
        var map={};
        (list||[]).forEach(function(c){ if(c&&c.defaultFormId!=null){ map[c.defaultFormId]={goal:Number(c.goal)||0, actual:(c.goalStats&&Number(c.goalStats.actual))||0}; } });
        nodes.forEach(function(el){
          var d=map[el.getAttribute('data-form')];
          var raised=el.querySelector('.igi-goal__raised'), goalEl=el.querySelector('.igi-goal__goal'), fill=el.querySelector('.igi-goal__fill');
          if(!d||!d.goal){ if(raised)raised.textContent=d?usd(d.actual)+' raised':''; if(goalEl)goalEl.textContent=''; return; }
          var pct=Math.max(0,Math.min(100,Math.round(d.actual/d.goal*100)));
          if(pct===0 && d.actual>0) pct=2;
          if(raised) raised.textContent=usd(d.actual)+' raised';
          if(goalEl) goalEl.textContent='Goal '+usd(d.goal);
          if(fill) requestAnimationFrame(function(){ fill.style.width=pct+'%'; });
        });
        if(typeof window.__igiCampEqualize==='function') window.__igiCampEqualize();
      }).catch(function(){ nodes.forEach(function(el){var r=el.querySelector('.igi-goal__raised'); if(r)r.textContent='';}); });
  })();
  </script>

</div>
<!-- /wp:html -->
</div>
<!-- /wp:group -->
