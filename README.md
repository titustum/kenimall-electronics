# Kenimall Electronics - eCommerce Website

## Overview

Welcome to the **Kenimall Electronics** project! This is an eCommerce website built using **Laravel 12**, **TailwindCSS**, and **FontAwesome** icons, providing a seamless and visually appealing shopping experience for electronic products. It includes user authentication, product management, shopping cart functionality, and more.

## Features

- **User Authentication**: Allows users to sign up, log in, and manage their accounts.
- **Product Catalog**: Displays products (laptops, smartphones, home appliances, etc.) with detailed descriptions, prices, and availability.
- **Shopping Cart**: Users can add products to their cart and proceed to checkout.
- **Admin Panel**: Admin users can add, update, and delete products, manage orders, and more.
- **Responsive Design**: Fully responsive layout designed with **TailwindCSS** for a smooth experience across all devices.
- **FontAwesome Icons**: Enhanced user experience with intuitive icons from **FontAwesome**.
- **SEO-Friendly URLs**: Clean, SEO-optimized URLs for better visibility.

## Tech Stack

- **Backend**: Laravel 12
- **Frontend**: TailwindCSS, FontAwesome icons
- **Database**: MySQL (or any other database you configure)
- **Authentication**: Laravel built-in Auth system
- **Environment**: PHP 8.0+ & Composer
- **Package Management**: NPM (for TailwindCSS)

## Installation

To set up the project locally, follow these steps:

1. **Clone the Repository**:

   ```bash
   git clone https://github.com/titustum/Kenimall-electronics.git
   ```

2. **Navigate into the project directory**:

   ```bash
   cd Kenimall-electronics
   ```

3. **Install PHP dependencies**:

   If you don't have Composer installed, you can get it from [getcomposer.org](https://getcomposer.org).

   ```bash
   composer install
   ```

4. **Set up your `.env` file**:

   Copy the `.env.example` file to `.env`:

   ```bash
   cp .env.example .env
   ```

5. **Generate the application key**:

   ```bash
   php artisan key:generate
   ```

6. **Set up your database**:

   In your `.env` file, update the database credentials:

   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=Kenimall_electronics
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations** to set up the database schema:

   ```bash
   php artisan migrate
   ```

8. **Install Frontend Dependencies**:

   If you're using **TailwindCSS**, install npm dependencies:

   ```bash
   npm install
   ```

9. **Compile the assets**:

   ```bash
   npm run dev
   ```

10. **Serve the Application**:

   ```bash
   php artisan serve
   ```

   Now, navigate to [http://127.0.0.1:8000](http://127.0.0.1:8000) to see the app in action.

## Usage

- **Frontend**: The homepage displays featured products and categories. Users can browse the catalog and filter products by category, price, and more.
- **Admin**: Access the admin dashboard (protected by authentication) to manage products, view orders, and update product information.
- **Shopping Cart**: Users can add items to their cart, view their cart, and proceed with the checkout process.

## Screenshots

Add some images or screenshots of your project here (if any). Example:

![Homepage](Kenimall-electronics-home.jpeg)

## Contributing

We welcome contributions to make **Kenimall Electronics** even better. Here’s how you can help:

1. Fork the repository.
2. Create a new branch for your feature (`git checkout -b feature-name`).
3. Commit your changes (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-name`).
5. Open a Pull Request to the `main` branch.

## License

This project is open-source and available under the [MIT License](LICENSE). 