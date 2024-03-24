<div align="center">

<h2>Outfit Puzzle</h2>

Find the missing piece for your fashion journey

</div>

## 1.0 Features

1. Laravel Authentication
    - Login
    - Register (Email confirmation)
    - Forget Password (Send email to forget password)
    - Reset Password
2. User Module (CRUD)
3. Post Module (CRUD)
4. Post media (spatie media)
5. Post slug (spatie sluggable)
6. Admin role (spatie permission)
7. Post listing (public user view)
8. Post published date (greater or equal to published date)

## 2.0 Usage

One-time dependencies installation

```
npm install
php artisan migrate

```

Run php artisan server (keep running in the background)

```
php artisan serve
```

Run Vite server (keep running in the background)

```
npm run dev
```

Run Mailpit SMTP server (keep running in the background)

```
mailpit --smtp  127.0.0.1:1025 --smtp-auth-allow-insecure --smtp-auth-accept-any
```

## 3.0 Screenshots

### 3.1 Public View

![home](readme/home.png)
_Public/guest/visitor page_

### 3.2 Authentication

![register](readme/auth/register.png)
_Registration page_
![login](readme/auth//login.png)
_Login page_
![resend verify email](readme/auth/resend-verify-email.png)
_Resend verify email_
![resend verify email success](readme/auth/resend-verify-email-success.png)
_Resend verify email (success)_
![forgot password](readme/auth/forgot-password.png)
_Forgot password_
![forgot password success](readme/auth/forgot-password-success.png)
_Forgot password (success)_

### 3.3 Email

![verify email](readme/email/verify-email.png)
_Verify email template_
![reset password](readme/email/reset-password.png)
_Reset password email template_

### 3.4 Posts

![posts index](readme/posts/index.png)
_Posts index page_
![posts dropdown](readme/posts/dropdown.png)
_Dropdown button_
![posts edit](readme/posts/edit.png)
_Edit post page_

### 3.5 Profile

![profile edit](readme/profile/edit.png)
_Edit profile section_
![reset password](readme/profile/password.png)
_Reset password section_  
_Delete profile section_

### 3.6 Admin
![admin posts CRUD](readme/admin/posts.png)
_Admin posts CRUD table_
![admin users CRUD](readme/admin/users.png)
_Admin users CRUD table_

### 3.7 Database

![all](readme/database/all.png)
_App database structure_
![posts](readme/database/posts.png)
_Posts table structure_
![users](readme/database/users.png)
_Users table structure_
![media](readme/database/media.png)
_Media table structure_
