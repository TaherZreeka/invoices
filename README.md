# نظام إدارة الفواتير | Invoice Management System

نظام شامل لإدارة الفواتير مبني على Laravel 12 مع واجهة مستخدم حديثة وسهلة الاستخدام.

A comprehensive invoice management system built with Laravel 12, featuring a modern and user-friendly interface.

## 📋 المحتويات | Table of Contents

- [المميزات | Features](#-المميزات--features)
- [المتطلبات | Requirements](#-المتطلبات--requirements)
- [التثبيت | Installation](#-التثبيت--installation)
- [الإعدادات | Configuration](#-الإعدادات--configuration)
- [الهيكل | Project Structure](#-هيكل-المشروع--project-structure)
- [التقنيات المستخدمة | Technology Stack](#-التقنيات-المستخدمة--technology-stack)
- [الاستخدام | Usage](#-الاستخدام--usage)
- [لقطات الشاشة | Screenshots](#-لقطات-الشاشة--screenshots)
- [المساهمة | Contributing](#-المساهمة--contributing)
- [الترخيص | License](#-الترخيص--license)

## ✨ المميزات | Features

### إدارة الفواتير | Invoice Management
- ✅ إنشاء وتعديل وحذف الفواتير | Create, edit, and delete invoices
- ✅ إدارة حالات الفواتير (مدفوعة، غير مدفوعة، مدفوعة جزئياً) | Manage invoice statuses (Paid, Unpaid, Partially Paid)
- ✅ أرشفة الفواتير | Invoice archiving
- ✅ طباعة الفواتير | Print invoices
- ✅ تصدير الفواتير إلى Excel | Export invoices to Excel
- ✅ إرفاق الملفات مع الفواتير | Attach files with invoices
- ✅ عرض تفاصيل الفواتير | View invoice details

### إدارة العملاء والمنتجات | Customers & Products Management
- ✅ إدارة الأقسام | Manage sections
- ✅ إدارة المنتجات | Manage products
- ✅ ربط المنتجات بالأقسام | Link products to sections

### التقارير والتحليلات | Reports & Analytics
- ✅ تقارير الفواتير | Invoice reports
- ✅ تقارير العملاء | Customer reports
- ✅ رسوم بيانية لحالات الفواتير | Charts for invoice statuses
- ✅ تصدير التقارير | Export reports

### الأمان والصلاحيات | Security & Permissions
- ✅ نظام مصادقة مستخدمين | User authentication system
- ✅ إدارة الأدوار والصلاحيات | Role and permission management (Spatie)
- ✅ حماية المسارات | Route protection
- ✅ تسجيل الدخول/الخروج | Login/Logout functionality

### البريد الإلكتروني | Email
- ✅ إرسال الفواتير عبر البريد الإلكتروني | Send invoices via email
- ✅ إشعارات عند إضافة فواتير جديدة | Notifications for new invoices

### واجهة المستخدم | User Interface
- ✅ تصميم متجاوب | Responsive design
- ✅ دعم اللغة العربية | Arabic language support
- ✅ واجهة حديثة باستخدام Tailwind CSS | Modern UI with Tailwind CSS
- ✅ تجربة مستخدم سلسة | Smooth user experience

## 🔧 المتطلبات | Requirements

- PHP 8.2 أو أحدث | PHP 8.2 or higher
- Composer
- Node.js 18.x أو أحدث | Node.js 18.x or higher
- npm أو yarn
- قاعدة بيانات مدعومة من Laravel (MySQL, PostgreSQL, SQLite) | Database supported by Laravel (MySQL, PostgreSQL, SQLite)
- خادم ويب (Apache, Nginx) أو استخدام Laravel Serve | Web server (Apache, Nginx) or Laravel Serve

## 📦 التثبيت | Installation

### 1. استنساخ المستودع | Clone the Repository

```bash
git clone https://github.com/TaherZreeka/invoices.git
cd invoices
```

### 2. تثبيت التبعيات | Install Dependencies

#### تثبيت تبعيات PHP | Install PHP Dependencies

```bash
composer install
```

#### تثبيت تبعيات JavaScript | Install JavaScript Dependencies

```bash
npm install
```

### 3. إعداد البيئة | Environment Setup

#### نسخ ملف البيئة | Copy Environment File

```bash
cp .env.example .env
```

#### إنشاء مفتاح التطبيق | Generate Application Key

```bash
php artisan key:generate
```

### 4. إعداد قاعدة البيانات | Database Configuration

افتح ملف `.env` وقم بتعديل إعدادات قاعدة البيانات:

Open the `.env` file and modify the database settings:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=invoices
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 5. تشغيل عمليات الهجرة | Run Migrations

```bash
php artisan migrate
```

### 6. ملء قاعدة البيانات (اختياري) | Seed Database (Optional)

```bash
php artisan db:seed
```

### 7. إنشاء رابط التخزين | Create Storage Link

```bash
php artisan storage:link
```

### 8. تشغيل التطبيق | Run the Application

#### وضع التطوير | Development Mode

```bash
# تشغيل خادم Laravel | Run Laravel server
php artisan serve

# في نافذة طرفية منفصلة | In a separate terminal window
npm run dev
```

أو استخدم الأمر الموحد | Or use the unified command:

```bash
composer dev
```

#### الوصول إلى التطبيق | Access the Application

افتح المتصفح وانتقل إلى:

Open your browser and navigate to:

```
http://localhost:8000
```

## ⚙️ الإعدادات | Configuration

### إعداد البريد الإلكتروني | Email Configuration

في ملف `.env`، قم بتعديل إعدادات البريد الإلكتروني:

In the `.env` file, modify email settings:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=noreply@example.com
MAIL_FROM_NAME="${APP_NAME}"
```

### إعداد الصلاحيات | Permissions Configuration

يستخدم التطبيق حزمة Spatie Laravel Permission. بعد تثبيت قاعدة البيانات، يمكنك إدارة الأدوار والصلاحيات من لوحة التحكم.

The application uses Spatie Laravel Permission package. After installing the database, you can manage roles and permissions from the admin panel.

### إعداد التخزين | Storage Configuration

تخزن المرفقات في مجلد `public/Attachments`. تأكد من أن المجلد لديه الصلاحيات المناسبة:

Attachments are stored in the `public/Attachments` folder. Make sure the folder has the appropriate permissions:

```bash
chmod -R 775 public/Attachments
chmod -R 775 storage
```

## 📁 هيكل المشروع | Project Structure

```
Invoices/
├── app/
│   ├── Charts/              # الرسوم البيانية | Charts
│   ├── Exports/             # تصدير البيانات | Data exports
│   ├── Http/
│   │   ├── Controllers/     # المتحكمات | Controllers
│   │   └── Requests/        # طلبات التحقق | Validation requests
│   ├── Models/              # النماذج | Models
│   ├── Notifications/       # الإشعارات | Notifications
│   └── View/                # مكونات العرض | View components
├── database/
│   ├── migrations/          # عمليات الهجرة | Migrations
│   └── seeders/             # بذور البيانات | Seeders
├── public/
│   ├── Attachments/         # المرفقات | Attachments
│   └── assets/              # الأصول الثابتة | Static assets
├── resources/
│   └── views/               # قوالب Blade | Blade templates
├── routes/
│   └── web.php              # مسارات الويب | Web routes
└── tests/                   # الاختبارات | Tests
```

## 🛠️ التقنيات المستخدمة | Technology Stack

### Backend
- **Laravel 12** - إطار عمل PHP | PHP Framework
- **PHP 8.2+** - لغة البرمجة | Programming Language
- **MySQL/PostgreSQL/SQLite** - قاعدة البيانات | Database

### Frontend
- **Blade Templates** - قوالب Laravel | Laravel Templates
- **Tailwind CSS** - إطار عمل CSS | CSS Framework
- **Alpine.js** - مكتبة JavaScript خفيفة | Lightweight JavaScript Library
- **Bootstrap 5** - إطار عمل CSS إضافي | Additional CSS Framework
- **Vite** - أداة البناء | Build Tool

### المكتبات والحزم | Libraries & Packages
- **Spatie Laravel Permission** - إدارة الأدوار والصلاحيات | Role & Permission Management
- **Maatwebsite Excel** - تصدير/استيراد Excel | Excel Export/Import
- **ConsoleTVs Charts** - الرسوم البيانية | Charts
- **Laravel UI** - واجهة المستخدم | User Interface

## 🚀 الاستخدام | Usage

### إنشاء فاتورة جديدة | Create New Invoice

1. سجل الدخول إلى النظام | Log in to the system
2. انتقل إلى قسم الفواتير | Navigate to Invoices section
3. انقر على "إضافة فاتورة جديدة" | Click "Add New Invoice"
4. املأ البيانات المطلوبة | Fill in the required data
5. احفظ الفاتورة | Save the invoice

### إدارة الأقسام والمنتجات | Manage Sections & Products

1. انتقل إلى قسم "الأقسام" | Navigate to "Sections" section
2. أضف قسم جديد | Add a new section
3. انتقل إلى قسم "المنتجات" | Navigate to "Products" section
4. أضف منتج جديد واربطه بقسم | Add a new product and link it to a section

### عرض التقارير | View Reports

1. انتقل إلى قسم "التقارير" | Navigate to "Reports" section
2. اختر نوع التقرير (فواتير أو عملاء) | Choose report type (Invoices or Customers)
3. حدد الفترة الزمنية | Select the time period
4. عرض التقرير أو تصديره | View or export the report

### إدارة المستخدمين والأدوار | Manage Users & Roles

1. انتقل إلى لوحة الإدارة | Navigate to Admin Panel
2. اختر "المستخدمين" أو "الأدوار" | Choose "Users" or "Roles"
3. أضف أو عدل المستخدمين والأدوار | Add or edit users and roles
4. حدد الصلاحيات | Assign permissions

## 📸 لقطات الشاشة | Screenshots

### لوحة التحكم | Dashboard
![Dashboard](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(152).png)

### قائمة الفواتير | Invoices List
![Invoices List](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(153).png)

### إضافة فاتورة جديدة | Add New Invoice
![Add Invoice](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(154).png)

### تفاصيل الفاتورة | Invoice Details
![Invoice Details](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(155).png)

### الأقسام | Sections
![Sections](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(156).png)

### المنتجات | Products
![Products](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(157).png)

### التقارير | Reports
![Reports](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(158).png)

### الرسوم البيانية | Charts
![Charts](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(159).png)

### الأرشيف | Archive
![Archive](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(160).png)

### إدارة المستخدمين | User Management
![User Management](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(161).png)

### الأدوار والصلاحيات | Roles & Permissions
![Roles & Permissions](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(162).png)

### إعدادات الملف الشخصي | Profile Settings
![Profile Settings](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(163).png)

### طباعة الفاتورة | Print Invoice
![Print Invoice](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(164).png)

### تصدير Excel | Excel Export
![Excel Export](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(165).png)

### المرفقات | Attachments
![Attachments](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(166).png)

### تقرير العملاء | Customer Report
![Customer Report](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(167).png)

### تقرير الفواتير | Invoice Report
![Invoice Report](https://github.com/TaherZreeka/invoices/blob/main/Screenshot/Screenshot%20(168).png)

## 🧪 الاختبارات | Testing

لتشغيل الاختبارات | To run tests:

```bash
php artisan test
```

أو باستخدام Pest | Or using Pest:

```bash
composer test
```

## 🤝 المساهمة | Contributing

نرحب بمساهماتكم! يرجى اتباع الخطوات التالية:

We welcome contributions! Please follow these steps:

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 الترخيص | License

هذا المشروع مرخص تحت رخصة MIT - راجع ملف [LICENSE](LICENSE) للتفاصيل.

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 📞 التواصل | Contact

- **المطور | Developer**: Taher Zreek
- **المستودع | Repository**: [https://github.com/TaherZreeka/invoices](https://github.com/TaherZreeka/invoices)

## 🙏 شكر وتقدير | Acknowledgments

- Laravel Framework
- Spatie Laravel Permission
- Maatwebsite Excel
- ConsoleTVs Charts
- جميع المساهمين | All contributors

---

**ملاحظة | Note**: تأكد من تحديث ملف `.env` بإعداداتك الخاصة قبل تشغيل التطبيق.

Make sure to update the `.env` file with your own settings before running the application.
