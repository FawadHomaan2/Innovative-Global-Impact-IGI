# Innovative Global Impact — project memory

This repo is the source for the IGI nonprofit website: a **custom WordPress
block theme** (`igi/`) running on AWS Lightsail/Bitnami, with GiveWP for
donations. This file is read automatically at the start of every session so a
new chat knows how to connect to the live site and customize it.

## Live site

- URL: https://innovativeglobalimpact.org
- Platform: WordPress (block theme `igi`, the code in `igi/`)
- Active plugins: GiveWP, WPCode Lite, WP Fastest Cache, WP Mail SMTP

## Connecting (REST API with an application password)

The site has a WordPress **Application Password** for programmatic admin
access (created under the `user` account, name "Claude Code — site
management"). It is a secret and is **never** stored in this repo.

Provide it to a session in one of two ways:

- **Environment variables (preferred).** If the environment defines
  `WP_APP_PASSWORD` (and optionally `WP_USER`, default `user`), use it
  directly. Test with:
  `curl -u "$WP_USER:$WP_APP_PASSWORD" https://innovativeglobalimpact.org/wp-json/wp/v2/users/me?context=edit`
  A 200 with `"roles":["administrator"]` means you're connected.
- **Pasted by the user.** If no env var is set, ask the user to paste the
  application password, then use it via HTTP Basic auth as above. Store it
  only in the session scratchpad, never in the repo.

If the app password is ever lost or leaked, revoke it in WordPress
(Users → Profile → Application Passwords) and create a new one.

## What can be changed, and how

- **Content / settings / menus / global styles** — edit live via the REST API
  (`/wp-json/wp/v2/...`). Changes are immediate.
- **Media** — upload to the Media Library via the REST API; set alt text.
- **Theme code** (templates in `igi/templates/`, patterns in `igi/patterns/`,
  CSS in `igi/assets/`) — the campaigns/contact/etc. pages render from
  patterns, not page content (e.g. the Campaigns page renders the
  `igi/port-campaigns` pattern; the site-wide footer renders `igi/footer`).
  There is no automated deploy pipeline. To make a theme-code change live:
  1. Edit the file in `igi/` here.
  2. Deploy it to the server via the WordPress **Theme File Editor**
     (`wp-admin/theme-editor.php`, form field `newcontent`, nonce field named
     `nonce`). File editing is enabled and the theme dir is writable.
  3. **Clear WP Fastest Cache** — otherwise anonymous visitors keep seeing the
     old cached HTML (logged-in admins bypass the cache, so it will *look*
     updated to you while everyone else sees the stale page). This step is
     mandatory after every theme-code change. Two ways:
     - In wp-admin: top toolbar → **WP Fastest Cache → Clear All Cache**.
     - Programmatically (logged-in cookie): a `GET` to `wp-admin/admin-ajax.php`
       with `action=wpfc_delete_cache_and_minified`, `path=/`, and
       `nonce=<wpfc_nonce>` (read the `wpfc_nonce` JS var from any wp-admin
       page). An empty response means success; `Security check` means a bad or
       missing nonce.
  4. Verify as the **public** sees it: fetch the plain live URL with **no login
     cookie and no query string** (a `?nocache=...` query bypasses the cache
     and hides a stale-cache problem — use it only to check the fresh render,
     never as proof the public page updated). Then commit and push (see below).

Note: a site filter rewrites `linkedin.com` links in block-list markup
(displays "Linkedin", drops target/rel). It's the site's own behavior, not a
markup bug. Raw-HTML links (e.g. the contact-page pills) are unaffected.

Note: some templates/template-parts have been **customized in the Site Editor**,
which saves a copy in the database (`"source":"custom"`) that **shadows the
theme file** — edits to the theme `.php`/`.html` then don't appear on the live
page. If a deployed change to a part/template doesn't show even after a cache
clear, check `GET /wp-json/wp/v2/template-parts` (or `/templates`) for
`source:"custom"`; revert with `DELETE /wp-json/wp/v2/template-parts/igi//<slug>`
(app-password auth) to fall back to the theme file. Known custom so far: the
`footer` part (reverted 2026-09), and the `page-campaigns` template (still fine
because it only references the `igi/port-campaigns` pattern).

## Git workflow

- Develop on the feature branch `claude/wordpress-customization-chqxr9`.
- Commit with clear messages; push with `git push -u origin <branch>`.
- Open PRs against `main`. (PR #1 tracked the first batch of changes.)
- Never commit secrets — see `.gitignore`.
