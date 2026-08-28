# Innovative Global Impact — WordPress block theme (`igi`)

A dignity-first **block theme** (Full Site Editing) built from the v3 design brief.
Restrained chrome, documentary photography, self-hosted type, and the **"turn"**
transformation signature. Donations stay on **GiveWP** (open-ended, no goal) — this
theme styles the *presentation layer*, not the donation forms.

> Status: **v0.1.0 — first build.** Home and Campaigns are fully designed (the
> brief's "show these first"). About / Our Work / Contact / News ship as working,
> on-system templates ready for content. See **Open items** below.

---

## What's in the box

```
igi/
├── theme.json              Design tokens: palette, fluid type scale, spacing, font faces
├── style.css               Theme header (required)
├── functions.php           Enqueue, fonts preload, block styles, image sizes, donate helper
├── assets/
│   ├── css/igi.css         Component layer (the turn, header band, cards, method, a11y)
│   ├── fonts/              Self-hosted, latin-subset woff2 (≈230 KB total)
│   └── images/             The 10 field photos + logo/icon colorways
├── parts/                  header.html, footer.html (reference the header/footer patterns)
├── patterns/               hero, three-pilots, method, community moment, CTA band,
│                           newsletter, the three campaign sections, page header, header, footer
└── templates/              front-page, page-campaigns, page(+about/our-work/contact),
                            home (News), single, search, index, 404
```

### Design tokens (theme.json)
| Token | Value | Role |
|---|---|---|
| `ink` | `#241C17` | Text, header/footer band |
| `marigold` | `#E7A325` | Donate / CTAs — "the jerrycans" |
| `water` | `#2F6E96` | Links, large headings, Ghor accent |
| `ember` | `#D9694F` | Faryab (maternity) accent |
| `adobe` | `#E4D8C6` | Section backgrounds |
| `paper` | `#FAF8F4` | Base background |
| `taupe` | `#C9BCA8` | Borders / dividers |

Type: **Newsreader** (display) · **Hanken Grotesk** (body) · **Spline Sans Mono**
(eyebrows, stats, campaign labels — "evidence in type"). All self-hosted & subset.

**"The turn"** — wrap the verb of transformation in `<em class="igi-turn">…</em>`
inside a heading. It italicises in Fraunces and takes the section's sub-accent
(`igi-turn--water` / `igi-turn--ember`, or Marigold by default).

---

## Install (local or server)

1. Copy the `igi/` folder into `wp-content/themes/` (on Bitnami Lightsail:
   `/opt/bitnami/wordpress/wp-content/themes/igi/`), **or** zip it and upload via
   **Appearance → Themes → Add New → Upload**.
   ```bash
   # zip for upload (run from c:/dev/IGI)
   cd igi && zip -r ../igi.zip . -x ".*" && cd ..
   ```
2. **Appearance → Themes → Activate** "Innovative Global Impact".
3. Fonts load automatically from `assets/fonts` via `theme.json` — no plugin needed.

### Create the 6 pages (one-time)
Create Pages with these exact slugs so the nav, templates and anchors line up:

| Page | Slug | Template (auto by slug) |
|---|---|---|
| Home | `home` | front-page.html |
| About | `about` | page-about.html |
| Our Work & Impact | `our-work` | page-our-work.html |
| Campaigns | `campaigns` | page-campaigns.html |
| News | `news` | (Posts page → home.html) |
| Contact | `contact` | page-contact.html |

Then **Settings → Reading →** set *Your homepage displays → A static page*:
**Homepage = Home**, **Posts page = News**.

(If a template doesn't auto-apply, open the page → **Page → Template** and pick the
matching "Campaigns / About / Our Work / Contact" template.)

> **Note — pixel-perfect ports:** each of these page templates renders its design
> from a `port-<slug>` pattern (the exact Claude Design markup). The page's own
> editor content is therefore **ignored** — leave the pages empty. To edit copy,
> edit `patterns/port-<slug>.php`.

### Create the two articles (posts)
The News section uses two designed articles. Create them as **Posts** with these
slugs, and set the post **content** to a single pattern reference (the post body
*is* the design; `single.html` renders it):

| Post title | Slug | Post content |
|---|---|---|
| Our first pilot: the Ghor Smart Water Pipeline | `ghor-smart-water-pipeline` | `<!-- wp:pattern {"slug":"igi/port-article-water"} /-->` |
| Why we started Innovative Global Impact | `why-we-started-igi` | `<!-- wp:pattern {"slug":"igi/port-article-founding"} /-->` |

The News cards and in-page links already point at these slugs. New articles can
reuse `single.html` with ordinary blocks, or their own `port-*` pattern.

---

## GiveWP wiring (donations)

Every **Donate / Fund / Support** button across the site opens its GiveWP form in a
themed **modal** (the design buttons stay; GiveWP renders the form inside). The
theme does **not** build form internals.

**The ID map** lives in one place — `igi_give_forms()` in `functions.php`:

```php
'ghor'     => 747, // Water that never reaches them
'daykundi' => 749, // Where poverty becomes opportunity
'faryab'   => 751, // When birth becomes survival
'general'  => 137, // default — header, footer, all generic "Donate" CTAs
```

Change IDs without editing code via the option or filter:
`update_option( 'igi_give_form_map', [ 'ghor'=>747, 'daykundi'=>749, 'faryab'=>751, 'general'=>137 ] );`
or `add_filter( 'igi_give_form_map', fn( $m ) => [ ... ] + $m );`

How it works: each button is tagged `data-igi-give="<formId>"` (via `igi_give_attr()`),
`assets/js/igi-give.js` opens `#igi-give-modal-<formId>`, and `igi_render_donate_modals()`
prints one modal per referenced form in the footer with `[give_form id="…"]` inside.
GiveWP's own assets are force-enqueued so the form works even though it mounts late.

Notes:
- **Permalinks:** the News cards link to `/ghor-smart-water-pipeline/` and
  `/why-we-started-igi/`. Set **Settings → Permalinks → Post name** so those resolve
  directly (otherwise WP 301-redirects them).
- **Goals:** the design copy no longer promises "no goal / no cap," but if you want the
  goal bars hidden, disable goals on each GiveWP form/campaign.

---

## Accessibility & performance

- WCAG 2.1 AA intent: visible keyboard focus everywhere, semantic landmarks/headings,
  alt text on field photos, `prefers-reduced-motion` honored. Marigold is only ever a
  **fill** (Ink/white text on top), never small text — per the brief.
- Fonts subset to latin and the two LCP-critical faces are `<link rel=preload>`-ed.
- ⚠️ **Images:** the JPGs are ~1 MB each. Before launch, regenerate responsive sizes
  (e.g. **Regenerate Thumbnails**) and/or compress; consider WebP. The theme adds
  `igi-card` (880×620) and `igi-wide` (1600×900) crops for this.

---

## Open items carried from the brief (§14) — still needed

These are **content/decision** gaps, not code gaps:

1. **Positioning line** — currently uses "Frugal solutions for the places systems forget" / "Where systems fail, we build the turn." Confirm or replace.
2. **Global vs. Afghanistan** framing in copy.
3. **Photography for Faryab & Daykundi** — *not built with water photos by design.* Those two campaign sections are **type-led** until real imagery is sourced. Drop images into `assets/images/` and swap the side panels for media-text (mirror `campaign-ghor.php`).
4. **Image rights/consent** for identifiable people (esp. children) before publishing.
5. **Real impact numbers** — no stat-counter hero by design; add figures (mono) to Our Work when available.
6. **Founders / team** content for About.
7. **Newsletter provider** — `patterns/newsletter-inline.php` is a placeholder `<form>`; wire `action`/fields to Mailchimp (or chosen provider).
8. **Contact details + form** — `page-contact.html` has placeholder details and a slot for a standard WP contact form (not GiveWP).
9. **Logo** — white wordmark on the dark header (`igi-logo-white.png`); dark `igi-logo-ink.png` available for light contexts. Set globe icon as the **Site Icon** (Settings → General / Customize) for favicon/avatar.

---

## Notes for deploying to the live Bitnami site

The live site runs the **Bitnami WordPress** stack on Lightsail. Suggested order:
stage on a copy first, activate `igi`, create the pages + Reading settings, wire the
GiveWP campaigns, then regenerate image sizes. Keep the existing GiveWP data — this
is a theme swap, not a donation-engine change.
