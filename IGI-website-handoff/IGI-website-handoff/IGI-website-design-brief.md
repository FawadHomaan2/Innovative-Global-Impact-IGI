# Design Brief — Innovative Global Impact Website Redesign (v3)

**For:** Claude Design (or any design lead picking this up)
**Project type:** Full visual redesign of an existing WordPress site
**Live site (current):** https://innovativeglobalimpact.org/
**This package includes:** this brief + the ten field photos and the logo (renamed; see §13). Donations are **open-ended** — no $10,000 goal or cap anywhere. Items still needing client input are marked **» CONFIRM**.

---

## 1. The one-paragraph version

Innovative Global Impact (IGI) builds **frugal, engineered solutions that work where systems have failed** — and proves them through small, scalable pilots. The mission is global; the first three pilots are running in three of Afghanistan's most overlooked provinces: **Ghor** (water), **Faryab** (newborn survival), and **Daykundi** (women's livelihoods). Each is a lean, working proof that lasting change is possible even in the most fragile conditions. The redesign moves the site off its current Elementor template into a distinctive, dignity-first identity. We are staying on **WordPress** and keeping **GiveWP** for donations, so the design work is the presentation layer *around* a donation engine that already works. Donations are **open-ended** (any amount, no goal). Don't design custom donation forms — GiveWP renders them (see §11).

**New site structure (6 pages):**

| Page | Nav label | Single job |
|---|---|---|
| Home | Home | Say what IGI does, and route people to donate / explore the three campaigns |
| About Us | About | Build trust; explain the model (engineered systems, not relief) |
| Our Work & Impact | Our Work | Show the program model **and** the results it produces, together (merges old "Our Services" + "Our Impact") |
| Campaigns | Campaigns | Present the three pilots; convert to a donation per campaign |
| News | News | Show activity and momentum; SEO |
| Contact | Contact | Let donors, partners, and press reach the org |

---

## 2. The organization

- **What they do:** Design and deploy **low-cost, off-grid, locally-run engineering** for communities the world keeps passing over — and run each as a measurable pilot built to scale. The recurring ingredients are solar power, frugal hardware, gravity and physics over expensive infrastructure, IoT for transparency, and **paid local technicians** so the systems keep working after launch.
- **Where (now):** Three pilots in Afghanistan — Ghor, Faryab, Daykundi (details in §10). The name is "Innovative Global *Impact*," so treat Afghanistan as the proving ground for a model meant to travel (**» CONFIRM** Afghanistan-only vs. global ambition).
- **What makes them different — the heart of the brand:** This is **not relief and not traditional aid.** It's engineered, accountable, locally-owned infrastructure, delivered as lean, off-grid pilots that each stand as proof. The frame is **ingenuity and dignity**, never pity or rescue.
- **Current public tagline:** "Building Sustainable Local Economies in Underserved Communities." That's narrower than the actual work (which spans water, health, and livelihoods). Consider broadening to something like *"Frugal solutions for the places systems forget"* — **» CONFIRM** the positioning line with the client; don't finalize copy on top of a tagline that may change.
- **Stage:** Early. A brand being established, not refreshed.

---

## 3. Audiences (priority order)

1. **Individual donors** — need an emotional reason *and* a credibility signal. Donations are open-ended, and the concrete, named pilots make giving feel tangible ("help build the Ghor water pilot"). They decide fast, on mobile.
2. **Partners / institutional funders** — need to see seriousness, a clear engineered model, and accountability.
3. **The communities served** — represented with dignity, as protagonists, never as objects of charity.
4. **Volunteers / supporters** — looking for a way in.

---

## 4. Brand voice

**Personality:** Resourceful, grounded, credible, warm without being soft, quietly confident.

**Voice (copy):**
- Active and plain. "Fund the Ghor water pilot," not "Support water-related initiatives."
- **Specific builds trust.** Name the province, name the method — "a phase-change infant warmer that needs no electricity," "solar pumping into gravity-fed tanks." Specificity is the credibility.
- Sentence case in UI. No guilt, no crisis-urgency, no exclamation points.
- Dignity in every line about the communities.

---

## 5. Design principles (specific to IGI)

1. **Dignity over pity.** People as capable agents of their own change.
2. **Restrained chrome, bold photography.** The real photos (see §7e, §13) are vivid and carry the emotion — keep the UI palette and ornament quiet so the images lead.
3. **Editorial over corporate.** A publication with a point of view, not a SaaS landing page.
4. **Evidence builds trust.** These are *measurable, engineered* pilots — treat data and method as first-class design material.
5. **One bold move, everything else quiet.** Spend the boldness on the signature (§7d).

---

## 6. Avoid these defaults (please read)

Don't land on any of these unless you can justify it for *this* brief:

- The "sad child, downcast eyes, telephoto" stock shot. Banned — and unnecessary, because the real photography is dignified and specific.
- Generic "trust blue," clip-art line icons, a big stat-counter hero.
- The current AI-design clichés: (a) blanket cream background + high-contrast serif + terracotta accent; (b) near-black background + one acid-green/vermilion accent; (c) broadsheet layout with hairline rules and zero radius.

**Important nuance on (a):** the palette below *is* warm and earthy — but the warmth must come from the **photography and adobe-toned section accents**, not from a beige-cream background carrying a serif. Keep the base light and clean and let the images be the warm, colorful layer. If a choice could've been produced for any other nonprofit, push it further and note what you changed.

---

## 7. Visual direction

> Strong starting direction, not a cage. Run your own brainstorm/critique pass. **If the logo has fixed brand colors, anchor to those first** (**» CONFIRM** logo colors).

### 7a. Color — drawn from the actual photographs

The palette is derived directly from IGI's own field photos: warm mud-brick earth, the brilliant **yellow/orange water jerrycans** that recur in every water image, the **vivid blue sky and water**, and the deep shadows of the high-desert terrain. This makes the color story honest to the work rather than arbitrary.

**Core palette**

| Role | Name | Hex | Notes |
|---|---|---|---|
| Dark / text | Ink Umber | `#241C17` | Warm near-black from the photos' shadows. Text, headers, footer. |
| Accent / CTA | Marigold | `#E7A325` | **The color of the jerrycans.** Donate buttons, highlights, the "turn." |
| Secondary | Water Blue | `#2F6E96` | The sky, the water, the truck. Cool counterweight; links/large headings. |
| Warm neutral | Adobe | `#E4D8C6` | Mud-brick tone for *section* backgrounds — used deliberately, not as the whole page. |
| Base | Paper | `#FAF8F4` | Clean warm-white main background — lighter than the cliché cream so photos carry the warmth. |
| Border / mid | Taupe | `#C9BCA8` | Dividers, card edges. |

Marigold = the jerrycans. It isn't decorative — it's the literal object that symbolizes the need, so let it carry the calls to action.

**Campaign sub-accents** — three pilots, three identities under one system, each motivated:

| Campaign (province) | Sub-accent | Hex | Why |
|---|---|---|---|
| Water That Never Reaches Them (Ghor) | Water Blue | `#2F6E96` | Sky and water |
| When Birth Becomes Survival (Faryab) | Ember Clay | `#C2543B` | **Warmth against the cold** — the campaign is literally about heat for newborns; also echoes the women's textiles |
| Where Poverty Becomes Opportunity (Daykundi) | Marigold | `#E7A325` | Flowers/attar, harvest, value — and the flagship economic pilot |

**Accessibility:** Marigold fails contrast as small text on light — use it as a fill with Ink Umber/white text on top, not as small body text. Water Blue and Ember Clay are for headings/large text/links or as fills with white text. Keep everything WCAG-AA.

### 7b. Typography

Deliberately **not** the Inter/Playfair defaults. Three roles:

- **Display — Fraunces** (warm humanist serif, free). Large and sparing, for the transformation statements and page titles. Use a softer optical setting; don't let it slide into the cream-and-serif cliché. *Alternative to test: Bricolage Grotesque, for a more contemporary, less expected display.*
- **Body — Hanken Grotesk** (or Public Sans). Clean, open, accessible, not the default everywhere font.
- **Utility / data — a monospace** (Spline Sans Mono or IBM Plex Mono) for stats, eyebrows, campaign labels, and any figures or amounts. Numbers in mono read as precise and engineered — which is exactly what these pilots are. This is "evidence builds trust" in type form.

Set an intentional scale with real contrast. Self-host/subset all three for speed.

### 7c. Layout & grid

- Editorial, left-aligned, generous whitespace; resist centering everything.
- 12-column responsive grid, mobile-first.
- Keep the chrome restrained so the photography dominates. Big images, confident type, quiet UI.

### 7d. Signature element — "the turn"

All three campaign names are **transformation statements**: water that *never reaches* → reaches; poverty *becomes* opportunity; birth *becomes* survival. That's the truest, most ownable idea in the brand: **IGI's work is the moment one state becomes another.**

Express this as **"the turn"** — a typographic treatment emphasizing the verb of transformation (in Marigold, or a weight/italic shift in Fraunces), reused on the hero and every campaign. Structure encoding meaning, not decoration. Spend the boldness here; keep everything else disciplined. (Optional restrained secondary: a single thin "flow" line evoking water/continuity — but pick one signature.)

### 7e. Imagery & photography

**A real photo library is included in this package** (catalogued in §13). Its character: authentic, documentary, dignified — warm mud-brick earth and big high-desert skies, punctuated by vivid jerrycans and the reds/purples/blues of traditional dress. People are shown going about life, not posed in suffering. This **replaces all stock-photo placeholders** — use these throughout.

- Treat them with a light, consistent warm grade. Let them run large and full-bleed.
- **Coverage gap (important):** the current photos cover the **Ghor water story and the landscape only.** There is **no imagery yet for Faryab (newborn care) or Daykundi (the Women's Attar Collective).** **Do not** use water-distribution photos to illustrate those two campaigns — it would misrepresent them. Those campaigns need their own photography (**» CONFIRM / to source**); until then, design their sections to lean on type, the landscape shots, and restraint.
- **Rights:** confirm IGI has consent to publish identifiable images, especially of the children shown (**» CONFIRM**).

### 7f. Icons & motion

- Icons: minimal, line-based, custom-feeling, sparing. No clip-art sets. Where a method needs explaining (solar pump → tank → gravity → home), a simple custom diagram beats stock icons.
- Motion: restrained. One considered reveal beats scattered effects. Honor `prefers-reduced-motion`.

---

## 8. Components to design (with states)

- **Header / nav:** sticky, logo left, the 6 links, prominent **Donate** button (Marigold). Mobile hamburger. **Note:** the logo is white — either give the header a dark (Ink Umber) background so it shows, or use the dark `igi-logo-ink.png` on a light header. The white version is invisible on Paper.
- **Buttons:** primary (Marigold fill, Ink text), secondary (outline/ghost), text link. Hover + visible focus states.
- **Campaign card:** shared layout, themed by sub-accent. Image, name (display), one-line essence, and an open-ended **Donate** CTA — **no goal bar or cap** (optionally show "amount raised to date" as gentle social proof, never a target).
- **Donation block container:** styled section + a placeholder where the **GiveWP form/iframe** mounts (see §11). Style the Donate button to brand; don't design the form internals.
- **Stat / method module:** method specs and any figures in the mono face; a small "how it works" diagram per pilot.
- **Story / quote block** for community voices.
- **CTA band** — recurring "fund a pilot" section.
- **Newsletter signup:** name + email (re-wire to existing provider — **» CONFIRM**).
- **News card** + **single article template.**
- **Footer:** logo, nav, social links (Facebook + Instagram already exist), newsletter, copyright.

---

## 9. Page-by-page specs

### Home
*Job: say what IGI does; route to donate / campaigns.*

Hero = a **typographic thesis** (the mission framed as "the turn") over **one strong, dignified photograph** — `ghor-landscape-village.jpg` (the hillside village) works well because it sets place and dignity without tying to a single campaign. CTAs: **Donate** (Marigold) + **See our work**. **Do not** use a big-number stat-counter hero.

```
+--------------------------------------------------------------+
| [logo]   About  Our Work  Campaigns  News  Contact  [Donate] |
+--------------------------------------------------------------+
|                                                              |
|   WHERE SYSTEMS FAIL,                       [ landscape:     |
|   we build the *turn*.                        hillside       |
|   (Fraunces, "turn" in Marigold)              village ]      |
|                                                              |
|   One-line mission. [Donate]  [See our work]                 |
+--------------------------------------------------------------+
|  Why we exist — 2-3 sentences: engineered solutions, not     |
|  relief; lean pilots built to scale; link to About           |
+--------------------------------------------------------------+
|  THE THREE PILOTS  (the heart of the page)                   |
|  [ Water · Ghor ] [ Opportunity · Daykundi ] [ Birth · Faryab ]
+--------------------------------------------------------------+
|  How we work — solar / frugal / local technicians / measured |
+--------------------------------------------------------------+
|  A community moment — the line of children (see §13)         |
+--------------------------------------------------------------+
|  Newsletter signup                                           |
+--------------------------------------------------------------+
|  Footer                                                      |
+--------------------------------------------------------------+
```

### About Us
*Job: build trust; explain the model.*
Sections: who we are; the **engineered-not-relief model** (solar, frugal hardware, gravity/physics, IoT transparency, paid local technicians); why pilots and why scale; founders/team (**» CONFIRM** — placeholder); closing CTA. Landscape imagery (`ghor-landscape-village.jpg`, `ghor-water-road-context.jpg`) suits this page.

### Our Work & Impact
*Job: show the model and its results, together.*
Interleave "what we do" with "what changes because of it": the **method** (the engineering model) → **the pilots** as proof → **outcomes / measurement** (**» CONFIRM** any real numbers; these read as upcoming pilots, so it may be targets rather than results for now) → CTA. Avoid two disconnected halves.

### Campaigns
*Job: present the three pilots; convert per campaign.*
Short intro, then one rich section per pilot using the final copy in §10, each themed by its sub-accent with its own **Donate** button (opens that campaign's GiveWP form) collecting **open-ended donations — no goal or cap**.

```
+--------------------------------------------------------------+
|  Three pilots. Three proofs. — short intro                   |
+--------------------------------------------------------------+
|  WATER THAT NEVER *REACHES* THEM · Ghor     [ water imagery ]|
|  Problem → the Smart Water Pipeline Pilot                    |
|  [Donate — any amount]   (Water Blue)                        |
+--------------------------------------------------------------+
|  WHERE POVERTY *BECOMES* OPPORTUNITY · Daykundi  [ image* ]  |
|  Problem → the Women's Attar Collective                      |
|  [Donate — any amount]   (Marigold)                          |
+--------------------------------------------------------------+
|  WHEN BIRTH *BECOMES* SURVIVAL · Faryab     [ image* ]       |
|  Problem → the Frugal Maternity Care Pilot                   |
|  [Donate — any amount]   (Ember Clay)                        |
+--------------------------------------------------------------+
   * Daykundi and Faryab need their own photography (see §7e)
```

### News
*Job: momentum + SEO.* Standard WordPress posts: index (cards), single-article template, optional category filter.

### Contact
*Job: reachability.* Contact form (name, email, message — standard WP form, **not** GiveWP), org contact details (**» CONFIRM**), social links, optional newsletter prompt.

---

## 10. The three campaigns — final copy

> Cleaned-up, ready-to-use site copy (this is the "fixed" version of the campaign notes). **Donations are open-ended — no fixed goal or cap.** Keep dignity-first framing throughout.

### Water That Never Reaches Them — Ghor Province, Afghanistan
**The Smart Water Pipeline Pilot**

Ghor is one of Afghanistan's most isolated provinces. Families are scattered across steep mountain terrain, and women and children spend hours each day walking to collect water that often isn't safe to drink. Round after round of humanitarian aid has passed Ghor by — its geography and poverty keep it off the map for lasting infrastructure.

The Smart Water Pipeline Pilot changes that with engineering, not trucking: solar-powered pumping lifts water into elevated storage tanks, gravity carries it down through a distribution network, and IoT leak sensors keep the system efficient and accountable.

This isn't water delivery. It's the correction of a geographic inequality — permanent, locally-run infrastructure for a province the world keeps forgetting.

*Sub-accent: Water Blue. Imagery: the Ghor water set (see §13).*

### Where Poverty Becomes Opportunity — Daykundi Province, Afghanistan
**The Women's Attar Collective**

In the mountains of Daykundi, women hold real skill and strong community ties, surrounded by rich natural resources — and almost no way to earn from any of it. Isolation has turned genuine potential into stagnation.

The Women's Attar Collective turns that around: women produce high-value, alcohol-free natural attar from locally grown flowers, working under shared branding, packaging, and cooperative production.

This is more than income support. It's a women-led micro-industry that turns the scarcity of a remote valley into something the world will pay for.

*Sub-accent: Marigold. Imagery: needs its own photography — do not substitute water photos.*

### When Birth Becomes Survival — Faryab Province, Afghanistan
**The Frugal Maternity Care Pilot**

In Faryab, newborns are dying from causes that have nothing to do with medical complexity — cold, missing equipment, and clinics that lose power. It is a quiet emergency: survivable births that end in loss because the system fails at the moment it's needed most.

The Frugal Maternity Care Pilot answers with off-grid engineering: electricity-free, phase-change infant warmers; solar-supported oxygen; and a paid local biomedical technician so the equipment keeps working long after it's installed.

This is proof that newborn lives can be saved even when the grid goes dark — a model built to scale to the most fragile health systems anywhere.

*Sub-accent: Ember Clay. Imagery: needs its own photography — do not substitute water photos.*

**GiveWP wiring:** each pilot maps 1:1 to an existing GiveWP Campaign set to collect **open-ended donations (no goal)**. The Donate button opens that campaign's form (modal). In GiveWP, leave the goal unset (or hidden) so no target or progress bar appears — donors give any amount, one-time or recurring. The site already runs GiveWP 3.x campaigns, so this is configuration, not new build.

---

## 11. Technical & integration constraints

- **Platform:** WordPress. Target a **custom block theme** (`theme.json` tokens + block templates); classic PHP theme acceptable if preferred. Map cleanly to reusable blocks/patterns.
- **GiveWP (important):** Donation forms render via GiveWP's **Campaign/Donation block** in a **self-contained iframe**. So: **design** the Donate buttons (Marigold, button/modal style) and their containers; **do not** design custom form fields, steps, or checkout UI. Donate uses GiveWP's button+modal display. Campaigns collect **open-ended donations — no goal set**.
- **Responsive:** mobile-first; donor traffic skews mobile.
- **Accessibility:** target **WCAG 2.1 AA** — contrast, visible keyboard focus, semantic headings, alt text, keyboard nav, `prefers-reduced-motion`.
- **Performance:** the JPGs are large (~4–5 MB each) — compress and serve responsive sizes; self-host subset fonts; fast LCP.
- **SEO:** sensible URLs, semantic structure, per-page meta.
- **Logo:** keep the existing IGI logo (refine only if asked) — **» CONFIRM** whether colors are locked to it.

---

## 12. What to deliver

- High-fidelity designs for all 6 pages, **desktop + mobile.**
- The component set (§8) with interactive states.
- The three campaign treatments showing the shared system + sub-accents and the open-ended donate pattern.
- A token sheet (final color, type scale, spacing) ready for `theme.json`.
- "The turn" shown in context on the hero and a campaign.

---

## 13. Image & asset library

Ten client photographs **and the logo (two colorways)** are **included in this package** under the names below. All photos are authentic field documentation. **Coverage is Ghor water + landscape only** — see the gap note in §7e.

| File | What it shows | Recommended use |
|---|---|---|
| `ghor-landscape-village.jpg` | Hillside adobe village against the mountains; wide, calm, dignified, no distress | **Home hero**, About header, section dividers — the best "place" establishing shot |
| `ghor-water-children-line.jpg` | A long line of children beside an even longer row of jerrycans along a mud wall | A standout emotive moment — Home community section or Water campaign lead |
| `ghor-water-jerrycans-children.jpg` | Children waiting by dozens of colorful jerrycans, green trees, dirt lane | Water campaign; "the scale of the need" |
| `ghor-water-families-waiting.jpg` | Women and children sitting, waiting by their containers against a wall | Water campaign; quiet human dignity |
| `ghor-water-road-context.jpg` | Wide road, walls, mountains, children gathering with cans on the right | Establishing/context band; About |
| `ghor-water-truck-01.webp` | Close-in: boy in purple, people filling cans from the tanker, woman in red at right | Water campaign detail / texture |
| `ghor-water-truck-02.webp` | Wider tanker scene, boy at left, people filling | Water campaign detail |
| `ghor-water-truck-03.webp` | People filling cans, women in red/purple, children in blue | Water campaign detail |
| `ghor-water-truck-04.webp` | Girl in yellow plaid dress standing; others filling cans | Water campaign detail / portrait energy |
| `ghor-water-truck-05.webp` | Low-angle fill scene, small child walking past | Water campaign detail |

**Logo files (included):** `igi-logo-white.png` — the original white wordmark (367×104, transparent PNG) for dark backgrounds; `igi-logo-ink.png` — a dark Ink-Umber version for light backgrounds, favicons, etc. It's a horizontal wordmark (~3.5:1) — give it clear space, and never place the white version on a light fill (it disappears).

---

## 14. Open items to confirm (» CONFIRM)

1. **Logo** — *resolved:* a white wordmark with no locked brand colors, so the photo-derived palette above stands; a dark `igi-logo-ink.png` is included for light backgrounds. (If a full-color or stacked variant exists, send it.)
2. **Positioning line** — keep "Building Sustainable Local Economies…" or broaden to reflect water/health/livelihoods?
3. **Global vs. Afghanistan** — is the model framed as globally scalable with Afghanistan as the first pilots, or Afghanistan-focused?
4. **Photography for Faryab and Daykundi** — these two campaigns have no imagery yet; source or shoot.
5. **Image rights/consent** to publish identifiable people, especially children.
6. **Real impact numbers** — any completed-pilot results, or are these all upcoming (no results yet)?
7. **Founders / team** content for About.
8. **Newsletter provider** (Mailchimp or other) for signup wiring.
9. **Public contact details** for the Contact page.
