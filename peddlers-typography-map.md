# PEDDLERS 30A — MASTER TYPOGRAPHY MAP
**Design Reference System:** `Untitled.fig` + `Untitled.pdf`

---

## 1. Core Font Families

| Font Family | Source File | CSS Variable | Intended Usage in Design |
|---|---|---|---|
| **GT Walsheim** Bold (700) | `GT-Walsheim-Regular-Trial-BF651b7fc71a47d.otf` | `var(--font-body)` | Page Hero Titles (96px/6rem), Section Headings (52px/3.25rem), Closing CTA (96px/6rem), Product Titles (38px) |
| **GT Walsheim** Regular (400) & Medium (500) | `GT-Walsheim-Regular-Trial-BF651b7fc71a47d.otf` | `var(--font-body)` | Body Copy (18px/1.125rem), Paragraphs, Accordion Answers, Nav Links (16px), Button Labels (14px) |
| **Pitch Sans** Semibold Italic (600 Italic) | `PitchSans-SemiboldItalic.ttf` | `var(--font-label)` | Eyebrows / Overlines (14px uppercase), Trust Bar Titles (18px), Card Tags, Stat Subheads, Footer Headings (18px) |
| **Palm Canyon Drive** Script (Regular Cursive) | `PalmCanyonDrive.otf` | `var(--font-script)` | Logo Brand Script, Section 14 `The Coastal Rhythms` Headline (56px), Process Card Big Numbers `01`, `02`, `03` (56px) |

---

## 2. Typographic Hierarchy & Scale

| Style Level | Font Family | Weight / Style | Desktop Size | Line Height | Letter Spacing | Text Transform | CSS Selector |
|---|---|---|---|---|---|---|---|
| **Display Hero** | GT Walsheim | 700 Bold | 96px (6.0rem) | 1.05 | -0.02em | Title Case | `.hero__title`, `.closing__title` |
| **Section Heading** | GT Walsheim | 700 Bold | 52px (3.25rem) | 1.15 | -0.01em | Title Case | `.about__title`, `.rental__title`, `.experiences__title`, `.pavilion__title`, `.gathering__title`, `.merch__title`, `.live__title`, `.gallery__title`, `.testimonials__title`, `.faq__title`, `.contact__title` |
| **Script Display** | Palm Canyon Drive | 400 Script | 56px (3.5rem) | 1.1 | Normal | Title Case | `.rhythms__title`, `.logo-script` |
| **Script Outline Number**| Palm Canyon Drive | 400 Script | 56px (3.5rem) | 1.0 | Normal | None | `.path-card__num`, `.live__num` |
| **Card Title / H3** | GT Walsheim | 700 Bold | 24px (1.5rem) | 1.25 | Normal | Title Case | `.bike-card__title`, `.venue-card__name`, `.why-card__title`, `.event-item__title` |
| **Eyebrow / Overline**| Pitch Sans | 600 Italic | 14px (0.875rem)| 1.4 | 0.08em | UPPERCASE | `.eyebrow`, `.section-tag` |
| **Trust Bar / Badge** | Pitch Sans | 600 Italic | 16px (1.0rem) | 1.2 | 0.05em | UPPERCASE | `.trust__title`, `.day-badge__label` |
| **Footer Column Title**| Pitch Sans | 600 Italic | 18px (1.125rem)| 1.3 | 0.05em | UPPERCASE | `.footer-col__title` |
| **Body Large** | GT Walsheim | 400 Regular | 20px (1.25rem) | 1.6 | Normal | None | `.hero__lead`, `.lead-copy` |
| **Body Regular** | GT Walsheim | 400 Regular | 16px (1.0rem) | 1.65 | Normal | None | `p`, `.about__copy`, `.venue-card__copy`, `.faq__answer` |
| **Button CTA** | GT Walsheim | 700 Bold | 14px (0.875rem)| 1.0 | 0.08em | UPPERCASE | `.btn`, `.btn--primary`, `.btn--teal`, `.btn--tan` |
| **Nav Link** | GT Walsheim | 500 Medium | 16px (1.0rem) | 1.0 | 0.04em | UPPERCASE | `.site-nav__link` |
