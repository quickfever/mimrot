# CloudTech Grid - WordPress Theme

**CloudTech Grid** is a high-performance, developer-focused WordPress theme featuring a Cloudflare-inspired technical grid aesthetic, dark/light design system, a 3-column article layout, automated Table of Contents with scroll-spy, and Gutenberg block editor support.

![Theme Screenshot](screenshot.png)

## ✨ Features

- **Technical Grid Aesthetic**: Clean, modern typography with accent colors (`#f6821f`), code block styling, and crisp borders.
- **3-Column Article Layout**:
  - **Left Sidebar**: Customizable WordPress widgets.
  - **Main Content**: Dynamic post rendering with featured image and meta information.
  - **Right Sidebar**: Automated JavaScript Table of Contents (`toc.js`) with dynamic active heading indicator bar.
- **Responsive & Mobile Ready**: Fully responsive navigation menu and collapsible sidebars for mobile screens.
- **Gutenberg Editor Ready**: Includes `theme.json` and `editor-style.css` for block editor styling.
- **Standalone Demo**: Includes a standalone HTML demo in the `demo/` folder for instant previewing without WordPress.

## 📁 Repository Structure

```text
mimrot/
├── style.css              # Main theme stylesheet & metadata
├── functions.php          # Theme setup, widget areas, asset enqueuing
├── header.php             # Site header & top navigation bar
├── footer.php             # Site footer & dynamic widget areas
├── index.php              # Archive & homepage layout
├── single.php             # Single blog post template (3-column)
├── page.php               # Standard page template
├── sidebar-left.php       # Left sidebar widget area
├── sidebar-right.php      # Right sidebar Table of Contents container
├── 404.php                # 404 error page template
├── theme.json             # Block editor color & typography presets
├── screenshot.png         # WordPress theme preview graphic
├── assets/
│   ├── css/               # Editor styles
│   └── js/                # Theme scripts & ToC scroll-spy
├── template-parts/        # Modular content templates
└── demo/                  # Standalone HTML preview
```

## 🚀 Installation

1. Download or clone this repository.
2. Compress the folder into a `.zip` file (e.g., `cloudtech-grid.zip`).
3. In your WordPress admin dashboard, navigate to **Appearance > Themes > Add New > Upload Theme**.
4. Upload `cloudtech-grid.zip` and click **Activate**.

---

## 📝 Changelog

### Version 1.2.0 *(August 10, 2026)*

#### 🎨 Customizer & Customization Features
- **Theme Options Panel**: Registered new `CloudTech Theme Options` panel in `Appearance > Customize`.
- **Sidebar Width Controls**: Added numerical sliders to dynamically adjust Left Sidebar width (180px–360px) and Right Sidebar width (200px–400px).
- **Content Max-Width**: Added control to adjust main reading column width (600px–1100px).
- **Brand Accent Color**: Integrated live color picker control for custom primary accent colors.
- **Background Dot Grid Toggle**: Added checkbox to enable/disable technical dot grid background pattern.
- **Random Post Button**: Added a clean, minimal "Random Article" shuffle button beside the site logo in the header with a Customizer toggle and native `?random=1` redirect.
- **Footer Copyright & Menu Options**: Added Customizer text control for footer copyright messages and integrated dynamic `wp_nav_menu('footer')` support.

#### 💬 Comments Section Overhaul
- **Custom `comments.php`**: Created dedicated template file for comments formatting.
- **Minimal Comment Cards**: Added styled comment cards with rounded author avatars (`40px`), muted monospace date stamps, and hover state borders.
- **Nested Threading**: Added indented vertical thread lines for comment replies.
- **Form UI Redesign**: Redesigned comment form with a 2-column input grid, focus outlines, and primary submit button.

#### 📑 Navigation & Layout Enhancements
- **Hover Submenu Dropdowns**: Refactored header navigation dropdowns to animate open strictly on hover, equipped with an invisible `::before` hover bridge to prevent menus from disappearing when moving the cursor.
- **Compact Table of Contents**: Reduced TOC font sizes (`0.78rem`) and list item gaps for a sleeker sidebar layout.
- **Ultra-Minimal Pagination**: Redesigned archive and homepage pagination into crisp `32px` monospace ghost buttons with accent active highlights.

#### ⚡ Performance & Media Optimization
- **Image Resizing Disabled**: Added filters (`intermediate_image_sizes_advanced`, `big_image_size_threshold`, `fallback_intermediate_image_sizes`) to ensure ONLY original uploaded image files are saved to the server.
- **Disabled `srcset` & `sizes` Attributes**: Added filters site-wide (`wp_calculate_image_srcset`, `wp_calculate_image_sizes`, `wp_img_tag_add_srcset_and_sizes_attr`) to strip out HTML responsive variant attributes.
- **Mobile Horizontal Overflow Fix**: Added `max-width: 100% !important` to images, figures, Gutenberg embeds, and code blocks, and updated mobile grid columns to `minmax(0, 1fr)`.

---

## 📄 License

Distributed under the GNU General Public License v2 or later. See `style.css` for full header terms.
