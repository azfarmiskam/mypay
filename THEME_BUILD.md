# Theme Build Instructions

## Building the Theme

Since PowerShell script execution is disabled, you have two options:

### Option 1: Enable PowerShell Scripts (Recommended)
Run PowerShell as Administrator and execute:
```powershell
Set-ExecutionPolicy -ExecutionPolicy RemoteSigned -Scope CurrentUser
```

Then build the theme:
```bash
npm run build
```

### Option 2: Use Command Prompt
Open Command Prompt (cmd) and run:
```bash
npm run build
```

### Option 3: Use Git Bash
If you have Git installed, use Git Bash:
```bash
npm run build
```

## Viewing the Theme Demo

I've created a standalone theme demo page that you can view right now without building:

**Open in browser:**
```
C:\Users\user\Documents\Project\Laravel\mypay\public\theme-demo.html
```

Or navigate to: `http://localhost:8000/theme-demo.html` (after starting Laravel server)

## What's Included in the Theme

### Colors
- **Primary (Navy Blue):** #1E3A8A
- **Secondary (Light Blue):** #60A5FA
- **Success:** #10B981
- **Warning:** #F59E0B
- **Error:** #EF4444

### Components
- ✅ Buttons (Primary, Secondary, Outline, Ghost, Danger, Success)
- ✅ Cards (Regular, Stats, Hover effects)
- ✅ Forms (Inputs, Selects, Checkboxes, Radio buttons)
- ✅ Badges (All variants)
- ✅ Alerts (Success, Warning, Error, Info)
- ✅ Tables
- ✅ Navigation (Sidebar, Nav links)
- ✅ Modals
- ✅ Dropdowns
- ✅ Feature Lock (for Free/Basic plans)
- ✅ Loading Spinners
- ✅ Gradient Backgrounds

### Typography
- **Font:** Inter (Google Fonts)
- **Headings:** H1-H6 with responsive sizing
- **Body:** Clean, readable text

### Animations
- Fade in
- Slide up/down
- Scale in
- Pulse (slow)

### Utilities
- Text gradient
- Shadow glow effects
- Custom scrollbar
- Responsive utilities

## Next Steps

1. Build the CSS:
   ```bash
   npm run build
   ```

2. Start the development server:
   ```bash
   php artisan serve
   ```

3. View the theme demo at:
   ```
   http://localhost:8000/theme-demo.html
   ```

4. Start building dashboards using the components!

## Using the Theme in Blade Templates

Example:
```blade
<div class="card">
    <h3 class="card-title">Dashboard</h3>
    <div class="card-body">
        <button class="btn btn-primary">Click Me</button>
    </div>
</div>
```

All components are ready to use with the class names shown in the demo!
