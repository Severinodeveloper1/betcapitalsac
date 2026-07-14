---
name: Logistics Modernity
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
  on-surface-variant: '#454650'
  inverse-surface: '#2d3133'
  inverse-on-surface: '#eff1f3'
  outline: '#767681'
  outline-variant: '#c6c5d1'
  surface-tint: '#4d5b95'
  primary: '#000000'
  on-primary: '#ffffff'
  primary-container: '#03154f'
  on-primary-container: '#7381be'
  inverse-primary: '#b7c4ff'
  secondary: '#006877'
  on-secondary: '#ffffff'
  secondary-container: '#00e0ff'
  on-secondary-container: '#005f6d'
  tertiary: '#000000'
  on-tertiary: '#ffffff'
  tertiary-container: '#281900'
  on-tertiary-container: '#b07900'
  error: '#ba1a1a'
  on-error: '#ffffff'
  error-container: '#ffdad6'
  on-error-container: '#93000a'
  primary-fixed: '#dde1ff'
  primary-fixed-dim: '#b7c4ff'
  on-primary-fixed: '#03154f'
  on-primary-fixed-variant: '#35437c'
  secondary-fixed: '#a5eeff'
  secondary-fixed-dim: '#00daf8'
  on-secondary-fixed: '#001f25'
  on-secondary-fixed-variant: '#004e5a'
  tertiary-fixed: '#ffdeae'
  tertiary-fixed-dim: '#ffba3e'
  on-tertiary-fixed: '#281900'
  on-tertiary-fixed-variant: '#604100'
  background: '#f7f9fb'
  on-background: '#191c1e'
  surface-variant: '#e0e3e5'
  ocean-deep: '#00124C'
  electric-cyan: '#00E0FF'
  transit-blue: '#0D52D2'
  caution-gold: '#EAA82C'
  surface-gray: '#EDF2F7'
typography:
  display-lg:
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
  title-md:
    fontFamily: Hanken Grotesk
    fontSize: 20px
    fontWeight: '600'
    lineHeight: 28px
  body-lg:
    fontFamily: Inter
    fontSize: 18px
    fontWeight: '400'
    lineHeight: 28px
  body-md:
    fontFamily: Inter
    fontSize: 16px
    fontWeight: '400'
    lineHeight: 24px
  label-sm:
    fontFamily: Inter
    fontSize: 13px
    fontWeight: '600'
    lineHeight: 16px
    letterSpacing: 0.05em
rounded:
  sm: 0.125rem
  DEFAULT: 0.25rem
  md: 0.375rem
  lg: 0.5rem
  xl: 0.75rem
  full: 9999px
spacing:
  unit: 8px
  gutter-desktop: 24px
  margin-desktop: 64px
  gutter-mobile: 16px
  margin-mobile: 20px
  container-max-width: 1280px
---

## Brand & Style

The design system is built for the logistics and transportation sector, where **reliability, speed, and precision** are paramount. The brand personality is professional and authoritative, yet forward-thinking. It evokes a sense of "motion" and "security" through its use of deep corporate blues and high-energy cyan accents.

The chosen style is **Corporate Modern**. This approach utilizes a clean, systematic layout with ample white space to ensure complex logistical data remains legible. It incorporates subtle **Glassmorphism** for overlaying interactive elements (like tracking modals) and **Minimalism** for core navigation, creating a high-end, efficient user experience that differentiates the product from more utilitarian competitors.

## Colors

The palette is anchored by **Ocean Deep**, a professional navy that conveys trust and institutional stability. **Electric Cyan** is used as a high-visibility accent to represent technology and the "speed" of delivery. 

**Transit Blue** serves as the primary action color for links and standard buttons, while **Caution Gold** is reserved for highlights, alerts, or status indicators related to cargo and transit. The neutral base is a very cool, slightly blue-tinted white to keep the interface feeling fresh and technical rather than warm and domestic.

## Typography

This design system utilizes a dual-sans-serif pairing. **Hanken Grotesk** is used for headlines; its sharp, contemporary geometry mirrors the precision of logistics. **Inter** is utilized for body text and UI labels due to its exceptional legibility in data-heavy environments.

Headlines should use tighter letter-spacing to appear more impactful and "engineered." Labels for statuses or small metadata should use uppercase styling with increased letter spacing to ensure they are distinct from standard body paragraphs.

## Layout & Spacing

The system follows a **Fixed Grid** model for desktop to maintain a premium, editorial feel, while transitioning to a **Fluid Grid** for mobile devices. 

- **Desktop:** 12-column grid with 24px gutters. Content is centered with a max-width of 1280px.
- **Tablet:** 8-column grid with 20px gutters.
- **Mobile:** 4-column grid with 16px gutters and 20px side margins.

A consistent 8px spatial scale governs all internal component padding and margins, ensuring a rhythmic and predictable vertical flow.

## Elevation & Depth

Hierarchy is established through **Tonal Layers** supplemented by **Ambient Shadows**. 

1.  **Base Layer:** Neutral background (`#F8FAFC`).
2.  **Surface Layer:** White cards or containers with a very soft, diffused shadow (15% opacity of Ocean Deep) to indicate interactivity.
3.  **Overlay Layer:** Used for navigation menus or tracking details, employing a backdrop blur (12px) and a thin 1px border in a semi-transparent Cyan to create a glass-like technical effect.

Avoid heavy black shadows; instead, use tinted shadows derived from the primary navy color to maintain a clean, professional aesthetic.

## Shapes

The shape language is **Soft (0.25rem)**. This subtle rounding offers a more modern and approachable feel than sharp corners while maintaining the "industrial" rigor required by the logistics sector. 

Buttons and input fields should strictly adhere to the `rounded-sm` (4px) or `rounded-md` (8px) rules. Circular shapes are only permitted for status dots or user avatars.

## Components

### Buttons
- **Primary:** Solid Ocean Deep with white text. High-contrast and authoritative.
- **Secondary:** Outlined in Electric Cyan with Electric Cyan text. Used for secondary actions like "Download Invoice."
- **Ghost:** No background, Ocean Deep text. Used for less prominent navigation.

### Input Fields
- Use a light gray background (`#EDF2F7`) with a bottom-only 2px border that turns Electric Cyan on focus. This provides a clean, modern "dashboard" look.

### Cards
- White background, 4px corner radius, and a subtle 1px border in a very light blue. For "Active Shipments," use a left-edge accent border in Transit Blue or Caution Gold depending on status.

### Chips/Badges
- Small, uppercase labels with background colors at 10% opacity of the status color (e.g., a light yellow background for "In Transit" with Caution Gold text).

### Tracking Timeline
- A vertical or horizontal line in Transit Blue with "nodes" representing waypoints. The current location node should pulse with an Electric Cyan glow.