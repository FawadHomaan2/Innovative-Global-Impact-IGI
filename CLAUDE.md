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
  3. Verify on the live URL (add a `?nocache=...` query to bypass WP Fastest
     Cache), then commit and push (see below).

Note: a site filter rewrites `linkedin.com` links in block-list markup
(displays "Linkedin", drops target/rel). It's the site's own behavior, not a
markup bug. Raw-HTML links (e.g. the contact-page pills) are unaffected.

## Git workflow

- Develop on the feature branch `claude/wordpress-customization-chqxr9`.
- Commit with clear messages; push with `git push -u origin <branch>`.
- Open PRs against `main`. (PR #1 tracked the first batch of changes.)
- Never commit secrets — see `.gitignore`.
