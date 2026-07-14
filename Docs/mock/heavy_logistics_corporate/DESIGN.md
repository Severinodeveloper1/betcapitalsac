---
name: Heavy Logistics Corporate
colors:
  surface: '#f7f9fb'
  surface-dim: '#d8dadc'
  surface-bright: '#f7f9fb'
  surface-container-lowest: '#ffffff'
  surface-container-low: '#f2f4f6'
  surface-container: '#eceef0'
  surface-container-high: '#e6e8ea'
  surface-container-highest: '#e0e3e5'
  on-surface: '#191c1e'
  on-surface-variant: '#43474f'
  inverse-surface: '#2d3133'
  inverse-on-surface: '#eff1f3'
  outline: '#737780'
  outline-variant: '#c3c6d1'
  surface-tint: '#3a5f94'
  primary: '#001e40'
  on-primary: '#ffffff'
  primary-container: '#003366'
  on-primary-container: '#799dd6'
  inverse-primary: '#a7c8ff'
  secondary: '#545f72'
  on-secondary: '#ffffff'
  secondary-container: '#d5e0f7'
  on-secondary-container: '#586377'
  tertiary: '#002038'
  on-tertiary: '#ffffff'
  tertiary-container: '#003659'
  on-tertiary-container: '#00a2fe'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#d5e3ff'
  primary-fixed-dim: '#a7c8ff'
  on-primary-fixed: '#001b3c'
  on-primary-fixed-variant: '#1f477b'
  secondary-fixed: '#d8e3fa'
  secondary-fixed-dim: '#bcc7dd'
  on-secondary-fixed: '#111c2c'
  on-secondary-fixed-variant: '#3c475a'
  tertiary-fixed: '#cfe5ff'
  tertiary-fixed-dim: '#98cbff'
  on-tertiary-fixed: '#001d33'
  on-tertiary-fixed-variant: '#004a77'
  background: '#f7f9fb'
  on-background: '#191c1e'
  surface-variant: '#e0e3e5'
typography:
  headline-xl:
    fontFamily: Hanken Grotesk
    fontSize: 48px
    fontWeight: '700'
    lineHeight: 56px
    letterSpacing: -0.02em
  headline-lg:
    fontFamily: Hanken Grotesk
    fontSize: 32px
    fontWeight: '600'
    lineHeight: 40px
  headline-lg-mobile:
    fontFamily: Hanken Grotesk
    fontSize: 28px
    fontWeight: '600'
    lineHeight: 36px
  headline-md:
    fontFamily: Hanken Grotesk
    fontSize: 24px
    fontWeight: '600'
    lineHeight: 32px
  body-lg:
    fontFamily: Hanken Grotesk
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Hanken Grotesk
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-bold:
    fontFamily: Hanken Grotesk
    fontSize: 14px
    fontWeight: '700'
    lineHeight: 20px
  label-sm:
    fontFamily: Hanken Grotesk
    fontSize: 12px
    fontWeight: '500'
    lineHeight: 16px
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  base: 4px
  xs: 8px
  sm: 16px
  md: 24px
  lg: 48px
  xl: 80px
  gutter: 24px
  margin: 32px
---

## Brand & Style

The design system is engineered for **BETCAPITALSAC**, emphasizing heavy-duty logistics and corporate integrity. The visual identity avoids generic architectural icons, focusing instead on the kinetic energy of transportation and the precision of supply chain management.

The design style is **Corporate / Modern** with a slight leaning towards **Minimalism**. It uses wide, expansive layouts that evoke the openness of highways and the scale of heavy tonnage vehicles. The mood is established through high-quality photographic imagery of modern fleet vehicles, combined with precise, clean UI elements that signal reliability and professional rigor.

**Key Visual Principles:**
- **Kinetic Lines:** Use of subtle diagonal slanting and horizontal lines to imply speed and forward motion.
- **Industrial Precision:** Alignment is strictly maintained to convey organizational integrity.
- **Graphic Silhouettes:** Where iconography is needed, use custom silhouettes of freight trucks and cargo containers rather than generic business icons.

## Colors

The color palette is anchored by **Deep Corporate Blue (#003366)**, representing stability and trust. This is complemented by a sophisticated range of **Industrial Grays** that mimic the metallic textures of heavy machinery and logistics infrastructure.

- **Primary:** Deep Blue is used for primary actions, navigation headers, and critical brand touchpoints.
- **Secondary:** Dark Steel Gray provides a grounded contrast for secondary buttons and supporting text.
- **Accent:** A vibrant "Speed Blue" (#00A3FF) is used sparingly for data visualizations or status indicators to represent real-time movement and technology.
- **Neutral:** A crisp white and light slate background palette ensures the interface remains clean and readable, maximizing negative space to avoid cognitive overload.

## Typography

This design system utilizes **Hanken Grotesk** exclusively to maintain a cohesive, modern, and highly legible corporate voice. The typeface’s geometry is clean and professional, making it ideal for both high-impact headlines and dense logistics data.

Large headlines (XL) utilize a slight negative letter spacing to create a more compact, authoritative look, while body text is spaced for maximum readability during long-form reading or data entry. Labels for tracking numbers or technical specifications use the bold uppercase variant to stand out as distinct data points.

## Layout & Spacing

The layout follows a **12-column Fluid Grid** for desktop, transitioning to a **4-column grid** for mobile. The spacing rhythm is based on a **4px baseline**, ensuring all elements relate to one another in a mathematically precise manner.

- **Desktop (1440px+):** 12 columns, 24px gutters, 80px side margins for a focused, "letterboxed" feel.
- **Tablet (768px - 1439px):** 8 columns, 24px gutters, 32px side margins.
- **Mobile (<767px):** 4 columns, 16px gutters, 16px side margins.

Content is structured in horizontal bands to simulate the flow of a highway. Generous vertical spacing (lg/xl) is used between sections to define the hierarchy of information clearly without the need for excessive borders.

## Elevation & Depth

To maintain a "clean and professional" aesthetic, this design system avoids heavy shadows and skeuomorphism. Instead, it uses **Tonal Layers** and **Low-Contrast Outlines**.

- **Surfaces:** Most content sits on a flat white background. Secondary sections use a very light Slate Gray (#F1F5F9) to provide subtle separation.
- **Borders:** Containers use a 1px solid border in a soft light gray (#E2E8F0). This provides structure without visual noise.
- **Depth:** Only high-priority interactive elements (like an active "Track Order" card) receive a very subtle, diffused ambient shadow (0px 4px 20px rgba(0, 51, 102, 0.08)) to draw focus.

## Shapes

The shape language is **Soft (0.25rem)**. This choice reflects a balance between the "hard" industrial nature of heavy trucking and the modern, approachable nature of a high-end service provider.

- **Buttons & Inputs:** Use the standard 0.25rem (4px) corner radius.
- **Cards:** Use a slightly larger 0.5rem (8px) radius to distinguish them from smaller UI components.
- **Images:** All fleet and logistics photography should utilize the 0.5rem radius to soften the high-tonnage imagery and maintain the "Integrity" aesthetic.

## Components

### Buttons
- **Primary:** Solid Deep Blue (#003366) with White text. Bold weight. Minimal padding of 12px 24px.
- **Secondary:** Outline variant with 1px Deep Blue border and Deep Blue text for less urgent actions.
- **Tertiary:** Text-only with a right-pointing chevron to indicate "View More" or "Enter Details."

### Input Fields
- Inputs must be utilitarian. White background, 1px Gray border, and Hanken Grotesk labels positioned strictly above the field. No placeholder text unless it's a specific format example (e.g., "TRK-00000").

### Cards
- Standard cards are white with a 1px border. No shadows. Header sections of cards may use a light gray background to group titles and primary actions.

### Logistics Tracking Status
- A custom horizontal "Route Component" using the primary blue for completed stages and gray for pending. Use a truck silhouette icon for the current active stage to reinforce the brand identity.

### Information Lists
- Tables and lists should be high-density with clear 1px horizontal dividers. Use the `label-bold` style for column headers to ensure they are distinct from the row data.