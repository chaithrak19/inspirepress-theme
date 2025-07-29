
# 🎨 InspirePress – Custom WordPress Theme

**InspirePress** is a fully custom, responsive WordPress theme built from scratch for an assessment project. It’s lightweight, accessible, and powered by vanilla JavaScript — ideal for clean and fast performance.

---

## 🔧 Theme Features

- ✅ Customizer with live controls
- ✅ Responsive grid layout
- ✅ Dark mode toggle
- ✅ Scroll-to-top button
- ✅ Project custom post type
- ✅ Widgetized blog sidebar (toggleable)
- ✅ HTML5 semantic structure
- ✅ CSS animations
- ✅ No page builders or external frameworks

---

## ⚙️ Customizer Usage

Navigate to:  
`Appearance → Customize → Theme Options`

### 🔹 Available Settings:

| Option               | Description                                                |
|----------------------|------------------------------------------------------------|
| **Accent Color**     | Changes color of buttons, links, and menu underline        |
| **Show Sidebar**     | Toggle to show/hide sidebar on blog/archive pages          |
| **Footer Logo**      | Upload a custom logo that appears in the footer            |
| **Footer Copyright** | Text field to show custom copyright message                |
| **Hero Image**       | Image for the hero section on homepage template            |

---

## 🏠 Homepage Template

1. Go to **Pages → Add New**
2. Title it **Home**
3. On the right, under “Page Attributes”, select:  
   **Template: Homepage**
4. Publish the page and set it as your static front page (optional)

### Features:
- Tagline pulled from site settings
- Custom hero image via Customizer
- Latest 3 blog posts in a responsive grid
- Custom shortcode button

```php
[inspire_button text="Explore Projects" url="/projects/"]
💡 Unique Touch – Why It Stands Out
I added lightweight front-end enhancements using vanilla JavaScript:

🌗 Dark Mode Toggle
Saves preference using localStorage and toggles class-based themes.

⬆️ Scroll-to-Top Button
Appears after scroll and provides smooth navigation UX.

🧩 Animated Project Cards
Projects drop in using subtle CSS keyframe animations.

🎯 Underline Navigation Animation
A clean, CSS-only hover effect that improves visual appeal.

🧠 Why I Chose These:
I focused on features that enhance usability, accessibility, and performance — all without adding dependencies like jQuery or heavy frameworks.

🧪 Accessibility & Best Practices
Semantic HTML (<main>, <article>, <aside>)

ARIA roles and labels (nav, banner, complementary)

Keyboard-friendly navigation

Focus outlines retained for accessibility

Run a Lighthouse audit to confirm:

✅ Accessibility: 90+

✅ Performance: 94+

🧱 Project Custom Post Type
CPT Name: Projects

Archive page: yoursite.com/projects/

Fields: Title, Content, Featured Image, Custom URL (meta box)

Appears in a responsive grid with link buttons

🚀 Installation
git clone https://github.com/chaithrak19/inspirepress-theme.git
Appearance → Themes → Add New → Upload

Activate and customize via the WordPress Customizer.

🧑‍💻 Author
Chaithra K
🔗 GitHub Profile
📬 chaithravalanja@gmaiil.com@gmail.com