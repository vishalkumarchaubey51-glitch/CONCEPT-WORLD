# Quick Reference - Critical Data for Static Conversion

## Company Info
- **Name**: Concept World
- **Tagline**: Leading Exhibition Stall Designer in Patna, Bihar
- **Email**: info@conceptworld.in, contact@conceptworld.in
- **Phone**: +91 8092471472
- **WhatsApp**: +91 8092471472
- **Address**: MM Media Exhibitions LLP, Shastri Nagar, Patna, Bihar - 800023

## Social Media (for HTML footer & navbar)
```json
{
  "facebook": "https://www.facebook.com/conceptworld",
  "instagram": "https://www.instagram.com/conceptworld",
  "linkedin": "https://www.linkedin.com/company/conceptworld",
  "twitter": "https://www.twitter.com/conceptworld",
  "youtube": "https://www.youtube.com/conceptworld"
}
```

## Key Statistics for Hero Section
```json
{
  "experience_years": "15+",
  "total_projects": "500+",
  "happy_clients": "350+",
  "countries_served": "14+",
  "rating": "4.8",
  "reviews_count": "150+"
}
```

## Page Structure & Navigation

### Main Navigation Menu
1. Home (/)
2. About (/about.php)
3. Services (/services.php)
4. Projects (dropdown)
   - Portfolio Gallery (/portfolio.php)
   - Global Projects (/projects.php)
5. Locations (/locations.php)
6. Contact (/contact.php)
7. Get Quote (/contact.php#quote) - CTA Button

## Patna Exhibition Categories
1. APICON 2026
2. Bihar Beauty Expo 2025
3. Bihar Medical Expo 2025
4. Optics Fair Expo 2024
5. Pharma Business Expo, Patna
6. Renewable Energy & EV Expo 2025
7. Solar & Storage Confex Bihar 2025

## 14 Global Project Locations
Berlin, Dubai, Egypt, Iran, Jordan, London, Melbourne, Mumbai, New Delhi, New York, Patna, Qatar, Saudi Arabia, Singapore

## Office Locations
- **Patna** (Headquarters): MM Media Exhibitions LLP, Shastri Nagar, Patna - 800023
- **New Delhi**: Delhi NCR region
- **Dubai**: Dubai, UAE

## Core Services
1. Exhibition Stall Design (3D viz, Brand design, Space optimization)
2. Booth Fabrication (Premium materials, Quick turnaround)
3. Complete Installation (Professional setup, On-site support)
4. 3D Visualization (Virtual walkthroughs)
5. Modular Stands (Reusable, Flexible)
6. Turnkey Solutions (End-to-end service)

## Contact Form Fields
- Full Name (required)
- Email Address (required)
- Phone (optional)
- Subject (dropdown: General, Stall Design, Fabrication, Quote, Other)
- Message (required)

## Database Tables Summary
```
1. projects - Exhibition projects (project_name, project_slug, client_name, etc.)
2. project_images - Project images with display order
3. services - Company services list
4. testimonials - Client testimonials & ratings
5. gallery - Gallery images by category
6. contact_inquiries - Contact form submissions
7. offices - Office locations & contact info
8. site_settings - Configuration settings
9. admin_users - Admin panel users
10. seo_pages - SEO data per page
```

## Helper Functions (Convert to JS/JSON where needed)
- **sanitize_input()** → Use DOMPurify or innerHTML sanitization in JS
- **get_all_projects()** → Load from projects.json
- **get_project_by_slug()** → Filter from projects.json by slug
- **get_all_offices()** → Load from offices.json
- **get_setting()** → Store in config.json
- **format_date()** → Use JS Date formatting
- **generate_slug()** → Use URL-safe slug generation in JS
- **is_active_page()** → Check current page with window.location

## Critical Meta Tags Template
```html
<meta name="description" content="[PAGE_DESCRIPTION]">
<meta name="keywords" content="[PAGE_KEYWORDS]">
<meta property="og:title" content="[PAGE_TITLE]">
<meta property="og:description" content="[PAGE_DESCRIPTION]">
<meta property="og:image" content="[IMAGE_URL]">
<meta name="geo.region" content="IN-BR">
<meta name="geo.placename" content="Patna">
<meta name="geo.position" content="25.5941;85.1376">
```

## JSON Files to Create

### 1. data/projects.json
```json
{
  "projects": [
    {
      "project_id": "...",
      "project_name": "...",
      "project_slug": "...",
      "client_name": "...",
      "event_name": "...",
      "event_date": "...",
      "category": "...",
      "description": "...",
      "featured_image": "...",
      "primary_image": "...",
      "stall_size": "...",
      "location": "Patna, Bihar",
      "is_featured": true/false
    }
  ]
}
```

### 2. data/offices.json
```json
{
  "offices": [
    {
      "office_id": "...",
      "office_name": "Concept World - Patna",
      "office_type": "headquarters",
      "address": "MM Media Exhibitions LLP, Shastri Nagar",
      "city": "Patna",
      "state": "Bihar",
      "country": "India",
      "pincode": "800023",
      "phone_1": "+91 8092471472",
      "phone_2": "+91 8092471471",
      "email": "info@conceptworld.in",
      "latitude": "25.5941",
      "longitude": "85.1376"
    }
  ]
}
```

### 3. data/config.json
```json
{
  "site_name": "Concept World",
  "site_tagline": "Leading Exhibition Stall Designer in Patna, Bihar",
  "company_phone": "+91 8092471472",
  "company_email": "info@conceptworld.in",
  "company_address": "MM Media Exhibitions LLP, Shastri Nagar, Patna, Bihar - 800023",
  "social_media": {
    "facebook": "https://www.facebook.com/conceptworld",
    "instagram": "https://www.instagram.com/conceptworld",
    "linkedin": "https://www.linkedin.com/company/conceptworld",
    "twitter": "https://www.twitter.com/conceptworld",
    "youtube": "https://www.youtube.com/conceptworld",
    "whatsapp": "https://wa.me/918092471472"
  },
  "default_meta": {
    "title": "Exhibition Stall Designer Patna | Exhibition Stand Builders Bihar | Concept World",
    "description": "Leading Exhibition Stall Designer in Patna, Bihar. Premium exhibition stand builders offering custom booth design, fabrication & installation services.",
    "keywords": "exhibition stall design Patna, exhibition stand builders Patna, exhibition booth design Bihar"
  }
}
```

## Static Form Alternatives (Replace PHP Contact Processing)

### Option 1: EmailJS (Recommended - No Backend Needed)
```javascript
// Initialize EmailJS with public key
emailjs.init('YOUR_PUBLIC_KEY');

// Send form data
emailjs.send('YOUR_SERVICE_ID', 'YOUR_TEMPLATE_ID', {
  to_email: 'info@conceptworld.in',
  from_name: formData.name,
  from_email: formData.email,
  phone: formData.phone,
  subject: formData.subject,
  message: formData.message
});
```

### Option 2: Formspree
```html
<form action="https://formspree.io/f/YOUR_FORM_ID" method="POST">
  <!-- form fields -->
</form>
```

### Option 3: Basin
```html
<form action="https://usebasin.com/f/YOUR_FORM_ID" method="POST">
  <!-- form fields -->
</form>
```

## CSS Variables to Extract
```css
:root {
  --primary-color: #ff6b35;
  --secondary-color: #004e89;
  --dark-color: #1a1a2e;
  --light-color: #f8f9fa;
  --gray-color: #f4f4f4;
  --text-color: #333;
  --accent-color: #ffd700;
}
```

## External Dependencies (Already in index.html)
- Bootstrap 5.3.2 (CSS + JS)
- Font Awesome 6.0.0
- Google Fonts (Poppins, Roboto)
- AOS (Animate On Scroll)
- jQuery 3.7.1

## File Size & Performance Notes
- Images should be optimized (use WebP format)
- Lazy load project images where possible
- Minify CSS and JS files
- Use CSS grid/flexbox for layouts (Bootstrap already handles this)

## SEO Checklist for Static Pages
- [x] Unique meta titles (60 chars)
- [x] Unique meta descriptions (160 chars)
- [x] Proper heading hierarchy (H1, H2, H3)
- [x] Alt text for all images
- [x] Internal linking between pages
- [x] Canonical URLs
- [x] JSON-LD structured data
- [x] Geographic meta tags (for Patna location)
- [x] Open Graph tags
- [x] Mobile responsive design
- [ ] Sitemap.xml (already exists)
- [ ] robots.txt (already exists)

## Conversion Checklist
- [ ] Create data/projects.json
- [ ] Create data/offices.json
- [ ] Create data/config.json
- [ ] Create assets/js/load-navbar.js
- [ ] Create assets/js/load-footer.js
- [ ] Create assets/js/contact-form.js
- [ ] Convert contact.php → contact.html (EmailJS integration)
- [ ] Convert projects.php → projects.html (JSON + filtering)
- [ ] Convert project-details.php → project-details.html (slug routing)
- [ ] Convert locations.php → locations.html
- [ ] Convert location pages to HTML
- [ ] Create sitemap.html or update sitemap.xml
- [ ] Test all internal links
- [ ] Test form submission
- [ ] Lighthouse audit

---

**For complete details, see: PHP_EXTRACTION_FOR_STATIC_CONVERSION.md**
