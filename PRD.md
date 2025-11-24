# Product Requirements Document (PRD)
## Multi-Tenant SaaS E-Commerce Platform

**Version:** 1.0  
**Last Updated:** 2025-11-24  
**Project Name:** MyPay SaaS Platform  
**Inspired By:** OnPay.my

**Latest Progress:** Custom MyPay branding implemented (favicon, consistent titles across pages)

---

## 1. Executive Summary

### 1.1 Product Vision
A comprehensive multi-tenant SaaS platform that enables sellers to create online stores, manage products, process payments, and engage with customers through a subscription-based model. The platform provides different access levels for SuperAdmins, Admins, Sellers, and Buyers.

### 1.2 Target Market
- Small to medium-sized businesses in Malaysia, Singapore, Indonesia
- Individual entrepreneurs and online sellers
- E-commerce businesses looking for an all-in-one solution

### 1.3 Key Differentiators
- Multi-tier subscription plans with flexible features
- Integrated payment gateways (ToyyibPay, BillPlz, Chip-In, PayPal)
- Built-in landing page builder with SEO
- WhatsApp and email marketing integration
- Multi-currency support (MYR, SGD, IDR, USD)
- Social media advertising integration

---

## 2. User Roles & Permissions

### 2.1 SuperAdmin
**Primary Responsibility:** Complete system control and management

**Capabilities:**
- ✅ Full system access and control
- ✅ **Add/edit/delete other SuperAdmin accounts**
- ✅ **Edit system branding:**
  - System name (site title)
  - System logo
  - System favicon
- ✅ Manage payment integration settings for subscription plans
- ✅ Add/edit/delete Admin accounts
- ✅ Manually add/edit Sellers with custom plans (including hidden permanent plans)
- ✅ Edit Buyer information
- ✅ View comprehensive Seller details and analytics
- ✅ View comprehensive Buyer details and purchase history
- ✅ Configure landing pages for Sellers
- ✅ Setup payment integrations for Sellers
- ✅ Access all Buyer purchasing history across the platform
- ✅ Create/edit/delete subscription plans
- ✅ Send notifications to Sellers via WhatsApp/Email
- ✅ System-wide analytics and reporting

### 2.2 Admin
**Primary Responsibility:** Client management and support

**Capabilities:**
- ✅ Manage Sellers and Buyers
- ✅ Manually add/edit Seller accounts
- ✅ View Seller details and analytics
- ✅ View Buyer details and purchase history
- ✅ Monitor payment records between Buyers and Sellers
- ✅ Configure landing pages for Sellers
- ✅ Setup payment integrations for Sellers
- ✅ Configure custom domains for Sellers (based on their plan)
- ✅ Send notifications to Sellers via WhatsApp/Email
- ✅ Customer support and troubleshooting

**Restrictions:**
- ❌ Cannot modify system-wide settings
- ❌ Cannot manage other Admins
- ❌ Cannot modify subscription plans

### 2.3 Client (Seller)
**Primary Responsibility:** Manage online store and sell products

**Capabilities:**
- ✅ Subscribe to platform plans (Free, Basic, Pro, Max)
- ✅ Access Seller dashboard
- ✅ **Custom Branding (Pro & Max plans only):**
  - Upload custom logo for buyer-facing store
  - Upload custom favicon for buyer-facing store
  - Customize store name/title for buyer view
  - Branding does not affect main system
- ✅ **Feature Visibility (Free & Basic plans):**
  - Can see all features in dashboard
  - Locked features show "Upgrade Plan" prompt when clicked
  - Clear indication of which features require plan upgrade
- ✅ Create and download invoices (based on plan limits)
- ✅ Configure payment integration APIs
- ✅ Build and customize landing pages
- ✅ Add/edit/delete products (based on plan limits)
- ✅ Set product pricing
- ✅ Configure delivery pricing for physical goods
- ✅ Receive and manage orders from Buyers
- ✅ **Receive instant WhatsApp notifications on registered phone number when new orders are received**
- ✅ Update order status and notify Buyers
- ✅ One-click promotion to Facebook/Instagram/TikTok (Max plan)
- ✅ Setup custom domain (based on plan)
- ✅ Manage product inventory
- ✅ WhatsApp blast to potential customers (based on plan limits)
- ✅ Register email accounts under domain (based on plan)
- ✅ Manage staff roles: Owner, Manager, Staff (based on plan)
- ✅ View sales analytics and reports

**Restrictions:**
- ❌ Account becomes inactive if subscription payment fails
- ❌ Feature access limited by subscription plan
- ❌ Cannot access other Sellers' data
- ❌ Custom branding only available on Pro & Max plans
- ❌ Free & Basic plans use system default branding

### 2.4 Client (Buyer)
**Primary Responsibility:** Purchase products from Sellers

**Capabilities:**
- ✅ Browse Seller landing pages/stores
- ✅ Purchase products via integrated payment gateways
- ✅ View purchase history
- ✅ Track order/delivery status
- ✅ Contact Sellers
- ✅ Receive order notifications
- ✅ Manage account profile

**Restrictions:**
- ❌ No access to Seller features
- ❌ Cannot view other Buyers' information

---

## 3. Subscription Plans

### 3.1 Plan Comparison

| Feature | Free (1st Month) | Basic (RM60/month) | Pro (RM300/month) | Max (RM4000/month) |
|---------|------------------|--------------------|--------------------|---------------------|
| **Landing Pages** | 1 with SEO | 1 with SEO | 1 with SEO | 1 with SEO |
| **Max Products** | 3 | 15 | 250 | 500 |
- Automatic downgrade to inactive if payment fails
- Plan upgrades take effect immediately
- Plan downgrades take effect at next billing cycle
- SuperAdmin can create hidden "Permanent" plans for special clients

---

## 4. Core Features

### 4.1 Authentication & Authorization

**Requirements:**
- Multi-role authentication system
- Automatic dashboard routing based on user role
- Session management with security
- Password reset functionality
- Email verification
- Two-factor authentication (optional)
- Math captcha for bot prevention

**User Flow:**
1. User logs in with email/password + captcha
2. System detects user role (SuperAdmin/Admin/Seller/Buyer)
3. Redirect to appropriate dashboard
4. Session maintained with role-based permissions

### 4.2 Subscription Management

**Requirements:**
- Automated billing system
- Payment gateway integration for subscriptions
- Plan upgrade/downgrade functionality
- Automatic account suspension on payment failure
- Grace period (3 days) before account deactivation
- Email reminders before billing date
- Invoice generation for subscriptions
- Proration for plan changes

**Billing Cycle:**
- Monthly recurring billing
- Auto-renewal with email notification
- Failed payment retry (3 attempts over 7 days)
- Account suspension after failed retries

### 4.3 Payment Gateway Integration

**Supported Gateways:**
1. **ToyyibPay** (Malaysia)
2. **BillPlz** (Malaysia)
3. **Chip-In** (Malaysia)
4. **PayPal** (International)

**Integration Requirements:**
- API key management per Seller
- Webhook handling for payment confirmations
- Transaction logging
- Refund processing
- Multi-currency support
- Test/Sandbox mode for development

**Seller Setup Flow:**
1. Seller selects payment gateway from list
2. Enters API credentials
3. System validates credentials
4. Test transaction (optional)
5. Gateway activated for store

### 4.4 Landing Page Builder

**Features:**
- Drag-and-drop page builder
- Pre-designed templates
- Customizable sections:
  - Hero banner
  - Product showcase
  - About section
  - Contact form
  - Footer
- SEO optimization:
  - Meta titles and descriptions
  - Open Graph tags
  - Schema markup
  - Sitemap generation
- Mobile responsive design
- Custom CSS/JS (Pro and Max plans)
- Analytics integration

### 4.5 Product Management

**Product Features:**
- Product name, description, images (multiple)
- Pricing (with currency selection)
- SKU/Barcode
- Inventory tracking
- Product categories
- Product variants (size, color, etc.)
- Digital vs Physical product types
- Delivery settings for physical goods:
  - Flat rate shipping
  - Weight-based shipping
  - Location-based shipping
  - Free shipping threshold
- Product visibility (published/draft)
- Product SEO settings

**Inventory Management:**
- Stock quantity tracking
- Low stock alerts
- Out of stock notifications
- Automatic stock deduction on purchase
- Stock history log

### 4.6 Order Management

**Order Processing:**
- Order creation from Buyer purchase
- Order status tracking:
  - Pending Payment
  - Payment Confirmed
  - Processing
  - Shipped
  - Delivered
  - Cancelled
  - Refunded
- Order details:
  - Buyer information
  - Product details
  - Payment information
  - Delivery address
  - Tracking number
- Order notifications to Buyer via email/WhatsApp
- Order fulfillment workflow
- Bulk order export (CSV/Excel)

### 4.7 Invoice System

**Invoice Features:**
- Automated invoice generation
- Manual invoice creation
- Invoice templates (customizable)
- Invoice numbering system
- PDF download
- Email invoice to customer
- Invoice history
- Payment status tracking
- Monthly invoice limits based on plan

### 4.8 Notification System

**Email Notifications:**
- Order confirmations
- Payment confirmations
- Shipping updates
- Subscription renewals
- Payment failures
- Account status changes
- Marketing emails (based on plan limits)

**WhatsApp Notifications:**

**For Sellers (Instant Notifications):**
- 🔔 **New Order Received** - Instant notification to seller's registered WhatsApp number with:
  - Order number
  - Customer name
  - Product details
  - Total amount
  - Payment status
  - Link to order details
- Shipping updates
- Payment confirmations
- Low stock alerts

**For Buyers:**
- Order confirmations
- Shipping updates
- Delivery notifications

**Marketing Features:**
- Marketing messages (blast feature)
- Integration with WhatsApp Business API
- Message templates
- Bulk messaging (based on plan limits)
- Scheduled messages

### 4.9 Multi-Currency Support

**Supported Currencies:**
- MYR (Ringgit Malaysia) - Default
- SGD (Singapore Dollar)
- IDR (Indonesian Rupiah)
- USD (US Dollar)

**Currency Features:**
- Automatic currency conversion
- Exchange rate updates (daily)
- Display prices in selected currency
- Payment processing in local currency
- Currency selection per Seller store

### 4.10 Custom Domain Management

**Domain Features:**
- Subdomain provision (free): `sellername.mypay.my`
- Custom domain connection (Pro/Max plans)
- SSL certificate provisioning
- DNS configuration assistance
- Domain verification
- Automatic HTTPS redirect

**Setup Process:**
1. Seller purchases/owns domain
2. Seller enters domain in dashboard
3. System provides DNS records
4. Seller updates DNS at registrar
5. System verifies DNS propagation
6. SSL certificate issued
7. Domain activated

### 4.11 Email Account Management

**Email Features:**
- Email accounts under domain (based on plan)
- Webmail access
- SMTP/IMAP configuration
- Email forwarding
- Auto-responders
- Spam filtering
- Email storage limits

**Plan Allocation:**
- Basic: 1 email @ subdomain
- Pro: 3 emails @ custom domain
- Max: 5 emails @ custom domain

### 4.12 Staff Management (Multi-User Access)

**Staff Roles:**

**Owner:**
- Full access to all features
- Billing and subscription management
- Staff management
- Cannot be removed

**Manager:**
- Product management
- Order management
- Customer communication
- View analytics
- Cannot access billing or staff management

**Staff:**
- View orders
- Update order status
- Basic customer communication
- Limited product view access

**Features:**
- Role-based permissions
- Activity logging
- User limits based on plan
- Invitation system
- Access revocation

### 4.13 Social Media Integration

**Platforms:**
- Facebook
- Instagram
- TikTok

**Features (Max Plan Only):**
- One-click product promotion
- Auto-post new products
- Social media ad creation
- Product catalog sync
- Pixel integration for tracking
- Campaign analytics

### 4.14 Analytics & Reporting

**Seller Analytics:**
- Sales overview (daily/weekly/monthly)
- Revenue reports
- Product performance
- Customer insights
- Traffic sources
- Conversion rates
- Top-selling products
- Abandoned cart tracking

**Admin/SuperAdmin Analytics:**
- Platform-wide metrics
- Seller performance
- Subscription revenue
- User growth
- Payment gateway performance
- System health monitoring

---

## 5. Technical Requirements

### 5.1 Technology Stack

**Backend:**
- Framework: Laravel 11 (PHP 8.2+)
- Database: MariaDB (via StackCP shared hosting)
- Cache: File-based cache (shared hosting compatible)
- Queue: Database queue driver (shared hosting compatible)
- Storage: Local storage (shared hosting)

**Hosting Environment:**
- Provider: StackCP.com (Unlimited shared hosting account)
- Database: MariaDB (MySQL-compatible)
- PHP Version: 8.2+ (verify with hosting)
- Cron Jobs: Available for scheduled tasks
- Storage: Unlimited (as per hosting plan)

**Frontend:**
- Blade Templates
- TailwindCSS
- Alpine.js
- Livewire (for reactive components)

**Additional Services:**
- Email: SMTP / SendGrid / Mailgun
- WhatsApp: WhatsApp Business API
- Payment Gateways: ToyyibPay, BillPlz, Chip-In, PayPal SDKs
- Analytics: Google Analytics
- CDN: Cloudflare

### 5.2 Database Architecture

**Multi-Tenancy Approach:**
- Single database with tenant isolation
- `tenant_id` column in relevant tables
- Row-level security

**Key Tables:**
- `users` (with role column)
- `tenants` (Seller accounts)
- `subscriptions`
- `plans`
- `products`
- `orders`
- `invoices`
- `payments`
- `notifications`
- `domains`
- `email_accounts`
- `staff_members`
- `landing_pages`
- `payment_gateways`

### 5.3 Security Requirements

- HTTPS enforcement
- CSRF protection
- XSS prevention
- SQL injection prevention
- Rate limiting
- Two-factor authentication (optional)
- Data encryption at rest
- Regular security audits
- GDPR compliance
- PCI DSS compliance for payment handling

### 5.4 Performance Requirements

- Page load time < 2 seconds
- API response time < 500ms
- Support 10,000+ concurrent users
- 99.9% uptime SLA
- Automated backups (daily)
- CDN for static assets
- Database query optimization
- Caching strategy

---

## 6. User Interface & Design

### 6.1 Design System

**Color Palette:**
- Primary: Navy Blue (#1E3A8A)
- Secondary: Light Blue (#60A5FA)
- Accent: White (#FFFFFF)
- Success: Green (#10B981)
- Warning: Yellow (#F59E0B)
- Error: Red (#EF4444)
- Text: Dark Gray (#1F2937)
- Background: Light Gray (#F9FAFB)

**Typography:**
- Headings: Inter (Bold)
- Body: Inter (Regular)
- Monospace: JetBrains Mono

**Design Principles:**
- Clean and professional
- Mobile-first responsive design
- Consistent spacing and alignment
- Clear visual hierarchy
- Accessible (WCAG 2.1 AA)
- Fast loading
- Intuitive navigation

### 6.2 Dashboard Layouts

**SuperAdmin Dashboard:**
- System overview metrics
- Recent Seller registrations
- Revenue analytics
- Active subscriptions
- System health status
- Quick actions panel

**Admin Dashboard:**
- Seller management overview
- Support tickets
- Recent activities
- Seller analytics
- Quick access to common tasks

**Seller Dashboard:**
- Sales overview
- Recent orders
- Product performance
- Subscription status
- Quick actions (add product, view orders)
- Notifications panel

**Buyer Dashboard:**
- Order history
- Saved addresses
- Wishlist
- Account settings

### 6.3 Landing Page Templates

**Template Categories:**
- Fashion & Apparel
- Electronics
- Food & Beverage
- Services
- Digital Products
- General Store

**Template Features:**
- Modern, professional design
- Mobile responsive
- SEO optimized
- Fast loading
- Customizable colors and fonts
- Product grid/list views
- Shopping cart integration
- Contact forms

---

## 7. Development Phases

### Phase 1: Foundation (Weeks 1-4)
- [ ] Project setup and architecture
- [ ] Database schema design
- [ ] Authentication system with role detection
- [ ] User management (CRUD)
- [ ] Basic dashboards for all roles

### Phase 2: Core Features (Weeks 5-10)
- [ ] Subscription plan system
- [ ] Payment gateway integration (ToyyibPay first)
- [ ] Product management
- [ ] Order management
- [ ] Invoice generation
- [ ] Email notifications

### Phase 3: Advanced Features (Weeks 11-16)
- [ ] Landing page builder
- [ ] WhatsApp integration
- [ ] Custom domain setup
- [ ] Email account management
- [ ] Staff management
- [ ] Multi-currency support

### Phase 4: Premium Features (Weeks 17-20)
- [ ] Social media integration
- [ ] Advanced analytics
- [ ] Marketing automation
- [ ] SEO tools
- [ ] Additional payment gateways

### Phase 5: Polish & Launch (Weeks 21-24)
- [ ] UI/UX refinement
- [ ] Performance optimization
- [ ] Security audit
- [ ] Testing (unit, integration, E2E)
- [ ] Documentation
- [ ] Beta testing
- [ ] Production deployment

---

## 8. Success Metrics

### 8.1 Business Metrics
- Number of active Sellers
- Monthly Recurring Revenue (MRR)
- Customer Acquisition Cost (CAC)
- Customer Lifetime Value (LTV)
- Churn rate
- Plan conversion rates

### 8.2 Technical Metrics
- System uptime
- Page load times
- API response times
- Error rates
- Database query performance

### 8.3 User Engagement
- Daily Active Users (DAU)
- Monthly Active Users (MAU)
- Average session duration
- Feature adoption rates
- Customer satisfaction score (CSAT)

---

## 9. Risks & Mitigation

| Risk | Impact | Mitigation |
|------|--------|------------|
| Payment gateway downtime | High | Multiple gateway options, fallback mechanisms |
| Data breach | Critical | Regular security audits, encryption, compliance |
| Scalability issues | High | Cloud infrastructure, load balancing, caching |
| Third-party API failures | Medium | Retry mechanisms, error handling, monitoring |
| Subscription payment failures | Medium | Grace period, retry logic, notifications |
| Domain/email setup complexity | Medium | Clear documentation, automated setup, support |

---

## 10. Future Enhancements

- Mobile apps (iOS/Android)
- Advanced inventory management
- Multi-warehouse support
- Dropshipping integration
- Affiliate program
- Loyalty/rewards system
- Advanced SEO tools
- A/B testing for landing pages
- AI-powered product recommendations
- Chatbot integration
- Video product galleries
- Subscription box support
- Multi-language support
- Advanced reporting and BI tools

---

## 11. Appendix

### 11.1 Glossary
- **Tenant:** A Seller account with isolated data
- **MRR:** Monthly Recurring Revenue
- **SKU:** Stock Keeping Unit
- **API:** Application Programming Interface
- **SEO:** Search Engine Optimization
- **CDN:** Content Delivery Network

### 11.2 References
- OnPay.my (inspiration)
- Laravel Documentation
- Payment Gateway API Documentation
- WhatsApp Business API Documentation

---

**Document Status:** Draft v1.0  
**Next Review Date:** 2025-12-01  
**Approved By:** Pending
