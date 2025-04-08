# Solution Overview
Develop an integrated management system that streamlines the organization and tracking of Contacts, Customers, Leads, Activities, Opportunities, and Tasks. The system will include robust user authentication and authorization features, multilingual support (Arabic and English), and an intuitive user interface designed for simplicity and ease of use.

## How can I install  ? 
### 1 - Clone Repository
        git clone https://github.com/kassem-hussein/CRM-system.git
### 2 - Composer Install to install all dependencies
        composer install
### 3-  npm install to install vite and tailwind
        npm install
### 4 - Run migrations
        php artisan migrate

### 5 - make database seed using 
        php artisan db:seed
#### User 
    username  admin
    password  admin
    
    
## Technologies Used
- **Backend Framework**: Laravel
- **Middleware**: Authentication, Role-Based Access Control
- **Frontend**: Blade, Tailwind
- **Database**: Relational Database (MySQL)
