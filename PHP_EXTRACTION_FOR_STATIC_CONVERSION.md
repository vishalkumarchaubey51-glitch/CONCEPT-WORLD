# PHP Website Data Extraction - Concept World Exhibition Stall Design
## Complete Data Reference for Static HTML Conversion

---

## 1. CONSTANTS & CONFIGURATION

### Database Configuration
```
DB_HOST: 'localhost'
DB_NAME: 'concept_world_db'
DB_USER: 'root'
DB_PASS: ''
DB_CHARSET: 'utf8mb4'
```

### Site Configuration
```
SITE_NAME: 'Concept World'
SITE_TAGLINE: 'Leading Exhibition Stall Designer in Patna, Bihar'
BASE_PATH: dirname(dirname(__FILE__)) // Root directory
SITE_URL: dynamic - detected from $_SERVER settings
```

### Path Configuration
```
ASSETS_PATH: SITE_URL . '/assets'
CSS_PATH: SITE_URL . '/assets/css'
JS_PATH: SITE_URL . '/assets/js'
IMAGES_PATH: SITE_URL . '/assets/images'
UPLOADS_PATH: BASE_PATH . '/uploads'
```

### Email Configuration
```
ADMIN_EMAIL: 'info@conceptworld.in'
CONTACT_EMAIL: 'info@conceptworld.in'
NOREPLY_EMAIL: 'noreply@conceptworld.in'
SMTP_HOST: 'smtp.gmail.com'
SMTP_PORT: 587
SMTP_USER: ''  // Empty - needs configuration
SMTP_PASS: ''  // Empty - needs configuration
SMTP_SECURE: 'tls'
```

### Security Configuration
```
SESSION_LIFETIME: 3600 (seconds - 1 hour)
HASH_ALGORITHM: 'sha256'
ENCRYPTION_KEY: 'your-secret-encryption-key-change-this'
```

### Pagination & File Upload
```
ITEMS_PER_PAGE: 12
ADMIN_ITEMS_PER_PAGE: 20
MAX_FILE_SIZE: 5242880 (5MB in bytes)
ALLOWED_IMAGE_TYPES: ['image/jpeg', 'image/jpg', 'image/png', 'image/gif', 'image/webp']
UPLOAD_DIR: BASE_PATH . '/uploads'
```

### SEO Configuration - Meta Tags (Default)
```
DEFAULT_META_TITLE: 'Exhibition Stall Designer Patna | Exhibition Stand Builders Bihar | Concept World'
DEFAULT_META_DESCRIPTION: 'Leading Exhibition Stall Designer in Patna, Bihar. Premium exhibition stand builders offering custom booth design, fabrication & installation services for trade shows, expos & exhibitions.'
DEFAULT_META_KEYWORDS: 'exhibition stall design Patna, exhibition stand builders Patna, exhibition booth design Bihar, stall fabrication Patna'
OG_IMAGE: SITE_URL . '/assets/images/og-image.jpg'
```

### Timezone
```
Timezone: 'Asia/Kolkata'
```

### Tracking & Analytics
```
GOOGLE_ANALYTICS_ID: '' (Empty - needs configuration)
GOOGLE_TAG_MANAGER_ID: '' (Empty - needs configuration)
FACEBOOK_PIXEL_ID: '' (Empty - needs configuration)
RECAPTCHA_SITE_KEY: '' (Empty - needs configuration)
RECAPTCHA_SECRET_KEY: '' (Empty - needs configuration)
GOOGLE_MAPS_API_KEY: '' (Empty - needs configuration)
```

### Social Media URLs
```
FACEBOOK_URL: 'https://www.facebook.com/conceptworld'
INSTAGRAM_URL: 'https://www.instagram.com/conceptworld'
LINKEDIN_URL: 'https://www.linkedin.com/company/conceptworld'
TWITTER_URL: 'https://www.twitter.com/conceptworld'
YOUTUBE_URL: 'https://www.youtube.com/conceptworld'
```

---

## 2. HELPER FUNCTIONS & METHODS

### Input Handling Functions

**sanitize_input($data)**
- Description: Sanitizes user input data
- Parameters: $data (string)
- Returns: Sanitized string
- Process: trim → stripslashes → htmlspecialchars(ENT_QUOTES, UTF-8)

**format_date($date, $format = 'd M, Y')**
- Description: Formats date for display
- Parameters: $date (string), $format (string)
- Returns: Formatted date string
- Example: format_date('2025-04-19', 'F d, Y') → 'April 19, 2025'

**generate_slug($string)**
- Description: Generates SEO-friendly slug from text
- Parameters: $string (text)
- Returns: URL-safe slug
- Process: lowercase → regex replace non-alphanumeric to dash → trim

**truncate_text($text, $length = 100, $suffix = '...')**
- Description: Truncates text to specified length
- Parameters: $text, $length, $suffix
- Returns: Truncated text with suffix

### Authentication & Security Functions

**is_logged_in()**
- Description: Check if user (admin) is logged in
- Returns: Boolean
- Check: isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true

**generate_csrf_token()**
- Description: Generate CSRF token for form protection
- Returns: 32-byte hex string stored in $_SESSION
- Storage: $_SESSION['csrf_token']

**verify_csrf_token($token)**
- Description: Verify CSRF token validity
- Parameters: $token (string)
- Returns: Boolean
- Uses: hash_equals() for timing-safe comparison

**redirect($url)**
- Description: Redirect to specified URL
- Parameters: $url (string)
- Method: header() redirect + exit()

### Navigation Functions

**get_current_page()**
- Description: Get current page name
- Returns: PHP file name without extension
- Process: basename($_SERVER['PHP_SELF'], '.php')

**is_active_page($page_name)**
- Description: Check if page is active for navigation highlighting
- Parameters: $page_name (string)
- Returns: 'active' or empty string

### Database Helper Functions

**get_db()**
- Description: Get database singleton instance
- Returns: Database class instance

**get_all_projects($limit = null, $featured_only = false)**
- Description: Retrieve all projects from database
- Parameters: $limit (optional), $featured_only (boolean)
- Returns: Array of project records
- Query: SELECT * FROM vw_active_projects ORDER BY display_order, created_at DESC
- Fields returned: project_id, project_name, project_slug, client_name, event_name, event_date, category, location, description, featured_image, is_featured, etc.

**get_project_by_slug($slug)**
- Description: Get single project by URL slug
- Parameters: $slug (string)
- Returns: Single project record or false
- Query: SELECT * FROM vw_active_projects WHERE project_slug = ?

**get_project_images($project_id)**
- Description: Get all images for a project
- Parameters: $project_id (integer)
- Returns: Array of image records
- Query: SELECT * FROM project_images WHERE project_id = ? ORDER BY display_order

**get_all_services()**
- Description: Get all active services
- Returns: Array of service records
- Query: SELECT * FROM services WHERE is_active = 1 ORDER BY display_order

**get_all_testimonials($limit = null)**
- Description: Get client testimonials
- Parameters: $limit (optional integer)
- Returns: Array of testimonial records
- Query: SELECT * FROM testimonials WHERE is_active = 1 ORDER BY display_order

**get_all_offices()**
- Description: Get all office locations
- Returns: Array of office records
- Query: SELECT * FROM offices WHERE is_active = 1 ORDER BY display_order

**get_setting($key, $default = '')**
- Description: Get site setting by key
- Parameters: $key (string), $default (optional)
- Returns: Setting value or default
- Query: SELECT setting_value FROM site_settings WHERE setting_key = ?

**save_contact_inquiry($data)**
- Description: Save contact form submission to database
- Parameters: $data (array with keys: name, email, phone, subject, message)
- Returns: Boolean
- Query: INSERT INTO contact_inquiries (full_name, email, phone, subject, message, ip_address, user_agent) VALUES (?, ?, ?, ?, ?, ?, ?)

**get_gallery_images($category = null, $limit = null)**
- Description: Get gallery images with optional filtering
- Parameters: $category (optional), $limit (optional)
- Returns: Array of gallery image records
- Query: SELECT * FROM gallery WHERE is_active = 1 [AND category = ?] ORDER BY display_order

---

## 3. DATABASE SCHEMA & TABLE STRUCTURES

### Table: projects
**Purpose**: Store all exhibition projects

| Field | Type | Key | Notes |
|-------|------|-----|-------|
| project_id | INT | PRIMARY KEY | Auto-increment |
| project_name | VARCHAR(255) | | Required |
| project_slug | VARCHAR(255) | UNIQUE | SEO-friendly URL |
| client_name | VARCHAR(255) | | Required |
| event_name | VARCHAR(255) | | Exhibition/event name |
| event_date | DATE | | Exhibition date |
| category | VARCHAR(100) | INDEX | Project category |
| location | VARCHAR(255) | | Default: 'Patna, Bihar' |
| description | TEXT | | Full project description |
| meta_title | VARCHAR(255) | | SEO meta title |
| meta_description | TEXT | | SEO meta description |
| meta_keywords | TEXT | | SEO keywords |
| featured_image | VARCHAR(255) | | Path to featured image |
| stall_size | VARCHAR(100) | | Size specifications |
| project_status | ENUM('completed','ongoing','upcoming') | | Default: 'completed' |
| is_featured | BOOLEAN | INDEX | Featured project flag |
| display_order | INT | | Sorting order |
| created_at | TIMESTAMP | | Auto-set |
| updated_at | TIMESTAMP | | Auto-updated |

### Table: project_images
**Purpose**: Store multiple images per project

| Field | Type | Key | Notes |
|-------|------|-----|-------|
| image_id | INT | PRIMARY KEY | Auto-increment |
| project_id | INT | FOREIGN KEY | References projects |
| image_path | VARCHAR(255) | | Image file path |
| image_title | VARCHAR(255) | | Image title/alt text |
| image_alt | VARCHAR(255) | | Alt text |
| display_order | INT | | Sorting order |
| is_primary | BOOLEAN | | Primary image flag |
| created_at | TIMESTAMP | | Auto-set |

### Table: services
**Purpose**: Store company services

| Field | Type | Notes |
|-------|------|-------|
| service_id | INT | PRIMARY KEY |
| service_name | VARCHAR(255) | Service name |
| service_icon | VARCHAR(100) | Icon class/identifier |
| short_description | TEXT | Brief description |
| full_description | TEXT | Detailed description |
| is_active | BOOLEAN | Active flag (default 1) |
| display_order | INT | Sort order |
| created_at | TIMESTAMP | Created timestamp |
| updated_at | TIMESTAMP | Updated timestamp |

### Table: testimonials
**Purpose**: Store client testimonials

| Field | Type | Notes |
|-------|------|-------|
| testimonial_id | INT | PRIMARY KEY |
| client_name | VARCHAR(255) | Client name |
| client_company | VARCHAR(255) | Company name |
| client_designation | VARCHAR(255) | Job title |
| testimonial_text | TEXT | Testimonial content |
| client_photo | VARCHAR(255) | Photo path |
| rating | INT | Rating (default 5) |
| is_active | BOOLEAN | Active flag |
| display_order | INT | Sort order |
| created_at | TIMESTAMP | Created timestamp |

### Table: gallery
**Purpose**: Store gallery images

| Field | Type | Notes |
|-------|------|-------|
| gallery_id | INT | PRIMARY KEY |
| image_path | VARCHAR(255) | Image file path |
| image_title | VARCHAR(255) | Image title |
| image_alt | VARCHAR(255) | Alt text |
| category | VARCHAR(100) | Gallery category |
| is_active | BOOLEAN | Active flag |
| display_order | INT | Sort order |
| created_at | TIMESTAMP | Created timestamp |

### Table: contact_inquiries
**Purpose**: Store contact form submissions

| Field | Type | Notes |
|-------|------|-------|
| inquiry_id | INT | PRIMARY KEY |
| full_name | VARCHAR(255) | Visitor name |
| email | VARCHAR(255) | Visitor email |
| phone | VARCHAR(20) | Contact phone |
| subject | VARCHAR(255) | Inquiry subject |
| message | TEXT | Inquiry message |
| inquiry_status | ENUM('new','in_progress','completed','archived') | Default: 'new' |
| ip_address | VARCHAR(45) | Visitor IP |
| user_agent | TEXT | Browser info |
| created_at | TIMESTAMP | Submission time |
| updated_at | TIMESTAMP | Updated time |

### Table: offices
**Purpose**: Store office locations

| Field | Type | Notes |
|-------|------|-------|
| office_id | INT | PRIMARY KEY |
| office_name | VARCHAR(255) | Office name |
| office_type | ENUM('headquarters','branch','representative') | Office type |
| address | TEXT | Street address |
| city | VARCHAR(100) | City name |
| state | VARCHAR(100) | State/Province |
| country | VARCHAR(100) | Country |
| pincode | VARCHAR(20) | Postal code |
| phone_1 | VARCHAR(20) | Primary phone |
| phone_2 | VARCHAR(20) | Secondary phone |
| email | VARCHAR(255) | Email address |
| website | VARCHAR(255) | Website URL |
| latitude | DECIMAL(10,8) | GPS latitude |
| longitude | DECIMAL(11,8) | GPS longitude |
| is_active | BOOLEAN | Active flag |
| display_order | INT | Sort order |
| created_at | TIMESTAMP | Created timestamp |

### Table: site_settings
**Purpose**: Store website configuration

| Field | Type | Notes |
|-------|------|-------|
| setting_id | INT | PRIMARY KEY |
| setting_key | VARCHAR(100) UNIQUE | Setting identifier |
| setting_value | TEXT | Setting value |
| setting_type | VARCHAR(50) | Value type |
| setting_group | VARCHAR(50) | Grouping category |
| updated_at | TIMESTAMP | Last updated |

### Table: admin_users
**Purpose**: Store admin panel users

| Field | Type | Notes |
|-------|------|-------|
| admin_id | INT | PRIMARY KEY |
| username | VARCHAR(100) UNIQUE | Login username |
| email | VARCHAR(255) UNIQUE | Email address |
| password_hash | VARCHAR(255) | Hashed password |
| full_name | VARCHAR(255) | Full name |
| role | ENUM('super_admin','admin','editor') | User role |
| is_active | BOOLEAN | Active flag |
| last_login | TIMESTAMP NULL | Last login time |
| created_at | TIMESTAMP | Created timestamp |
| updated_at | TIMESTAMP | Updated timestamp |

### Table: seo_pages
**Purpose**: Store SEO data for each page

| Field | Type | Notes |
|-------|------|-------|
| seo_id | INT | PRIMARY KEY |
| page_url | VARCHAR(255) UNIQUE | Page URL |
| page_title | VARCHAR(255) | Page title |
| meta_description | TEXT | Meta description |
| meta_keywords | TEXT | Keywords |
| og_title | VARCHAR(255) | Open Graph title |
| og_description | TEXT | OG description |
| og_image | VARCHAR(255) | OG image path |
| canonical_url | VARCHAR(255) | Canonical URL |
| robots | VARCHAR(50) | Robots meta (default: 'index,follow') |
| updated_at | TIMESTAMP | Updated timestamp |

---

## 4. HARDCODED DATA - CONTACT & LOCATION INFO

### Primary Contact Information
```
Company Name: Concept World
Tagline: Leading Exhibition Stall Designer in Patna, Bihar

Main Email: info@conceptworld.in
Secondary Email: contact@conceptworld.in
WhatsApp Number: +91 8092471472
Primary Phone: +91 8092471472
Secondary Phone: +91 8092471471

Headquarters Address:
MM Media Exhibitions LLP, Shastri Nagar, Patna, Bihar - 800023, India

Latitude: 25.5941
Longitude: 85.1376

Business Hours:
Mon-Sat: 9 AM - 7 PM (IST)
Sunday: Closed
```

### Office Locations (From Database Query)
**Patna Headquarters** (office_type: headquarters)
- Address: MM Media Exhibitions LLP, Shastri Nagar, Patna
- City: Patna
- State: Bihar
- Country: India
- Pincode: 800023
- Phone: +91 8092471472
- Email: info@conceptworld.in
- Status: Active, Primary

**New Delhi** (office_type: branch)
- City: New Delhi
- State: Delhi
- Country: India
- Phone: +91 8092471472
- Email: delhi@conceptworld.in
- Status: Active

**Dubai** (office_type: branch)
- City: Dubai
- State: Dubai
- Country: United Arab Emirates
- Phone: +91 8092471472
- Email: dubai@conceptworld.in
- Status: Active

---

## 5. EXHIBITION CATEGORIES & PROJECTS IN PATNA

### Project Categories in Database
The `category` field stores exhibition types. Common categories referenced in code:

1. **APICON 2026**
   - Images location: Exhibition Stall Design Patna/APICON 2026/

2. **Bihar Beauty Expo 2025**
   - Images location: Exhibition Stall Design Patna/Bihar Beauty Expo 2025/

3. **Bihar Medical Expo 2025**
   - Images location: Exhibition Stall Design Patna/Bihar Medical Expo 2025/

4. **Optics Fair Expo 2024**
   - Images location: Exhibition Stall Design Patna/Optics Fair Expo 2024/

5. **Pharma Business Expo, Patna**
   - Images location: Exhibition Stall Design Patna/Pharma Business Expo, Patna/

6. **Renewable Energy & EV Expo 2025**
   - Images location: Exhibition Stall Design Patna/Renewable Energy & ev Expo 2025/

7. **Solar & Storage Confex Bihar 2025**
   - Images location: Exhibition Stall Design Patna/Solar & Storage Confex Bihar 2025/

### Global Project Locations
Located in `/projects/` directory:

1. **Berlin** - exhibition-stall-design-berlin/
2. **Dubai** - exhibition-stall-design-dubai/
3. **Egypt** - exhibition-stall-design-egypt/
4. **Iran** - exhibition-stall-design-iran/
5. **Jordan** - exhibition-stall-design-jordan/
6. **London** - exhibition-stall-design-london/
7. **Melbourne** - exhibition-stall-design-melbourne/
8. **Mumbai** - exhibition-stall-design-mumbai/
9. **New Delhi** - exhibition-stall-design-new-delhi/
10. **New York** - exhibition-stall-design-new-york/
11. **Patna** - exhibition-stall-design-patna/
12. **Qatar** - exhibition-stall-design-qatar/
13. **Saudi Arabia** - exhibition-stall-design-saudi-arabia/
14. **Singapore** - exhibition-stall-design-singapore/

---

## 6. SEO & META TAG TEMPLATES

### Meta Tags Used Per Page

#### Contact Page (contact.php)
```
Meta Title: "Contact Us | Exhibition Stall Designer Patna | Concept World"
Meta Description: "Get in touch with Concept World for exhibition stall design inquiries. Contact our offices in Patna, Delhi, Dubai, and Mumbai. Call +91 8092471472 or visit us."
Meta Keywords: "contact exhibition designer Patna, exhibition stall inquiry Bihar, booth design contact, concept world offices"
```

#### Projects Page (projects.php)
```
Meta Title: "Patna Exhibition Projects | Best Stall Designs in Bihar | Concept World"
Meta Description: "View our complete portfolio of exhibition stall designs and projects in Patna, Bihar. Premium booth fabrication for APICON, Beauty Expo, Medical Expo, Solar Expo and more."
Meta Keywords: "patna exhibition projects, bihar exhibition stalls, exhibition booth patna, stall design portfolio"
```

#### Locations Page (locations.php)
```
Meta Title: "Exhibition Stall Design Company | Global Presence in 14+ Countries | Concept World"
Meta Description: "Leading exhibition stall designer with presence in India, UAE, UK, USA, Australia, Germany, Singapore & more. Custom booth fabrication for trade shows worldwide. Contact us today!"
Meta Keywords: "exhibition stall design worldwide, global exhibition booth builder, international trade show contractor, exhibition stand fabrication, booth design company"
```

#### Patna Location Page (locations/exhibition-stall-contractor-patna.php)
```
Meta Title: "Exhibition Stall Contractor Patna | Best Booth Designer Bihar | Concept World"
Meta Description: "Leading exhibition stall contractor in Patna offering custom booth design, fabrication & installation for trade shows. 15+ years experience. Call +91 8092471472 for free quote!"
Meta Keywords: "exhibition stall contractor patna, exhibition booth builder patna, trade show stall designer bihar, exhibition stand fabricator patna, booth design company patna"
Canonical URL: SITE_URL . "/locations/exhibition-stall-contractor-patna.php"
```

#### New Delhi Location Page (locations/exhibition-stall-designer-new-delhi.php)
```
Meta Title: "Exhibition Stall Designer New Delhi | Booth Builder India | Pragati Maidan"
Meta Description: "Top exhibition stall designer in New Delhi for Pragati Maidan, India Expo Centre & Mart. Custom booth design, fabrication & installation. Call +91 8092471472 for quote!"
Meta Keywords: "exhibition stall designer new delhi, exhibition booth builder delhi india, trade show stall pragati maidan, exhibition stand fabricator delhi, booth design company delhi ncr"
Canonical URL: SITE_URL . "/locations/exhibition-stall-designer-new-delhi.php"
```

#### Dubai Location Page (locations/exhibition-stand-contractor-dubai.php)
```
Meta Title: "Exhibition Stand Contractor Dubai UAE | Booth Builder DWTC | Concept World"
Meta Description: "Leading exhibition stand contractor in Dubai for World Trade Centre, Expo City & ADNEC. Custom booth design & fabrication. 15+ years UAE experience. Call for free quote!"
Meta Keywords: "exhibition stand contractor dubai, exhibition booth builder dubai uae, trade show stand designer dwtc, exhibition stand fabricator dubai, booth design company dubai"
Canonical URL: SITE_URL . "/locations/exhibition-stand-contractor-dubai.php"
```

### JSON-LD Schema Markup (in header.php)
```json
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Concept World",
  "image": "SITE_URL/assets/images/logo.png",
  "@id": "SITE_URL",
  "url": "SITE_URL",
  "telephone": "+91 8092471472",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "MM Media Exhibitions LLP, Shastri Nagar",
    "addressLocality": "Patna",
    "addressRegion": "Bihar",
    "postalCode": "800023",
    "addressCountry": "IN"
  },
  "geo": {
    "@type": "GeoCoordinates",
    "latitude": 25.5941,
    "longitude": 85.1376
  },
  "priceRange": "$$-$$$",
  "aggregateRating": {
    "@type": "AggregateRating",
    "ratingValue": "4.8",
    "reviewCount": "150"
  },
  "description": "Leading exhibition stall designer and stand builders in Patna, Bihar..."
}
```

### Geographic Meta Tags
```html
<meta name="geo.region" content="IN-BR">
<meta name="geo.placename" content="Patna">
<meta name="geo.position" content="25.5941;85.1376">
<meta name="ICBM" content="25.5941, 85.1376">
```

---

## 7. SERVICES & FEATURES

### Core Services (from footer & location pages)
1. **Exhibition Stall Design**
   - 3D Visualization & Mockups
   - Brand-Centric Design
   - Space Optimization
   - Unlimited Revisions

2. **Booth Fabrication**
   - Premium Material Quality
   - Expert Craftsmanship
   - Quick Turnaround
   - International Standards

3. **Complete Installation**
   - Professional Setup
   - On-site Support
   - Quality Assurance
   - After-Sales Service

4. **3D Visualization**
   - Virtual Walkthroughs
   - Design Previews
   - Client Approval

5. **Modular Stands**
   - Reusable Components
   - Cost-Effective
   - Flexible Configurations

6. **Turnkey Solutions**
   - End-to-End Services
   - Single Point Contact
   - Complete Responsibility

---

## 8. STATISTICS & METRICS (Hardcoded in locations.php)

### Global Presence Stats
```
Countries Served: 14+
International Projects: 500+
Global Clients: 350+
Years of Experience: 15+

Patna Office Stats:
- Patna Projects: 500+
- Happy Clients: 350+
- On-Time Delivery: 100%

Delhi Office Stats:
- Delhi Projects: 150+
- Award-Winning Designs: Yes
- Specialization: 15+ Years in Delhi NCR

Dubai Office Stats:
- Dubai Projects: 100+
- Standards: International
- UAE Experience: 15+ Years
```

### Aggregated Ratings
```
Overall Rating: 4.8 / 5.0
Total Reviews: 150+
```

---

## 9. FORM HANDLING & CONTACT

### Contact Form Fields (from contact.php)
1. **Full Name** (required)
2. **Email Address** (required, validated)
3. **Phone Number** (optional)
4. **Subject** (dropdown)
   - General Inquiry
   - Exhibition Stall Design
   - Booth Fabrication
   - Get a Quote
   - Other
5. **Message** (required, textarea)
6. **CSRF Token** (hidden, security)

### Form Processing
- CSRF token verification required
- Input sanitization: sanitize_input()
- Email validation: filter_var() FILTER_VALIDATE_EMAIL
- Database storage in: contact_inquiries table
- Email notification sent to: ADMIN_EMAIL (info@conceptworld.in)
- Success/Error message display to user

---

## 10. NAVIGATION STRUCTURE (from navbar.php)

### Main Navigation Items
1. **Home** - `/`
2. **About** - `/about.php`
3. **Services** - `/services.php`
4. **Projects** (dropdown)
   - Portfolio Gallery - `/portfolio.php`
   - Global Projects - `/projects.php`
5. **Locations** - `/locations.php`
6. **Contact** - `/contact.php`
7. **Get Quote** (CTA button) - `/contact.php#quote`

### Social Media Links (from navbar & footer)
- Facebook: https://www.facebook.com/conceptworld
- Instagram: https://www.instagram.com/conceptworld
- LinkedIn: https://www.linkedin.com/company/conceptworld
- Twitter: https://www.twitter.com/conceptworld
- YouTube: https://www.youtube.com/conceptworld

### Additional Contact Methods
- WhatsApp: https://wa.me/918092471472
- Direct Phone: +91 8092471472
- Email Links: info@conceptworld.in, contact@conceptworld.in

---

## 11. PAGINATION & DISPLAY SETTINGS

```
Projects Per Page: 12
Admin Items Per Page: 20
Related Projects Display: 3
Featured Projects Display: Limited by is_featured = 1
```

---

## 12. EXTERNAL RESOURCES & CDN LINKS

### CSS Libraries
- Bootstrap 5: https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
- Font Awesome: https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css
- Bootstrap Icons: https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css
- AOS (Animate On Scroll): https://unpkg.com/aos@2.3.1/dist/aos.css

### JavaScript Libraries
- Bootstrap 5 JS: https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js
- jQuery: https://code.jquery.com/jquery-3.7.1.min.js
- AOS JS: https://unpkg.com/aos@2.3.1/dist/aos.js

### Google Fonts
- Poppins (weights: 300, 400, 500, 600, 700, 800)
- Roboto (weights: 300, 400, 500, 700)

### Placeholder Service
- https://via.placeholder.com/ (for missing images)

---

## 13. KEY FILES MAPPING FOR STATIC CONVERSION

| PHP File | Purpose | Key Data |
|----------|---------|----------|
| index.php | Homepage | Hero, services showcase |
| projects.php | Project listing | Category filtering, pagination |
| project-details.php | Individual project | Image carousel, details sidebar |
| locations.php | Global locations hub | 14+ country services |
| locations/exhibition-stall-contractor-patna.php | Patna location page | Patna-specific data |
| locations/exhibition-stall-designer-new-delhi.php | Delhi location page | Delhi-specific data |
| locations/exhibition-stand-contractor-dubai.php | Dubai location page | Dubai-specific data |
| contact.php | Contact form & offices | Contact form, office listings |
| includes/header.php | Meta tags, SEO | Page-specific meta data |
| includes/navbar.php | Navigation | Menu structure |
| includes/footer.php | Footer | Company info, links |

---

## 14. IMPORTANT NOTES FOR STATIC CONVERSION

### Data Requirements for JSON
- Create `data/projects.json` with all project records from database
- Create `data/offices.json` with all office locations
- Create `data/services.json` with all services
- Create `data/testimonials.json` with testimonials (if used)

### JavaScript Requirements
- `load-navbar.js` - Load navigation component
- `load-footer.js` - Load footer component
- `projects-data.js` - Load and filter projects dynamically
- `contact-form.js` - Handle contact form with EmailJS or Formspree
- `location-map.js` - Display office locations (optional)

### Form Handling Alternative
- Remove CSRF token requirement (static sites don't need it)
- Use EmailJS API (free service) for contact form submission
- Or use Formspree, Basin, or similar static form handlers

### Routing Notes
- Remove .php extensions from URLs
- Update all internal links to .html equivalents
- Static hosting doesn't require .htaccess rewriting

---

**End of Extraction Document**

This document contains all essential PHP data, functions, database structures, contact information, and configuration needed for a complete PHP-to-static HTML conversion while preserving all functionality and data.
