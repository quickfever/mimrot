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

## 📄 License

Distributed under the GNU General Public License v2 or later. See `style.css` for full header terms.
