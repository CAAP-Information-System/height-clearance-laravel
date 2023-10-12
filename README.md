# Height Clearance Permit (HCP) Documentation
> Version Beta
### What is HCP all about?
The CAAP has an online platform for Height Clearance Permit (HCP) issuance, which is part of their efforts to streamline the issuance of permits, licenses, and certificates for construction. They also have a virtual map of critical areas to guide stakeholders in their applications for HCP.

**_Reference:_**
[Understanding Building Height Limit in the Philippines & Exceptions](https://www.ianfulgar.com/reference/understanding-building-height-limit-in-the-philippines-exceptions/#:~:text=The%20CAAP%20has%20an%20online,in%20their%20applications%20for%20HCP.)
## TODO:
>[!IMPORTANT]
> Maintain flow of task for smooth development and testing
1. Enable user/admin authentication
2. Enable proper user access
3. Construct proper framework hierarchy
4. Establish Admin-side interface
5. Implement design interface using Bootstrap
6. Complete documentation of the system
7. Test user input validation

# Getting Started
Installing Composer packages
```
composer install
```
Installing Node.js package
```
npm install
```
Generating Key
```
php artisan key:generate
```
### Migrating Database
Make sure the settings in `.env` are configured, see Database section below
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=heightclearance
DB_USERNAME=root
DB_PASSWORD=
```

### Running the server
The application will require to run both artisan and vite packages
```
php artisan serve
npm run dev
```


# Database
## MySQL 
![MySQL](https://www.liveagent.com/app/uploads/2020/11/MySQL-Logo.png)
The MySQL software delivers a very fast, multithreaded, multi-user, and robust SQL (Structured Query Language) database server. MySQL Server is intended for mission-critical, heavy-load production systems as well as for embedding into mass-deployed software. 
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=heightclearance
DB_USERNAME=root
DB_PASSWORD=
```

# API Testing
## Postman
![Postman](https://mms.businesswire.com/media/20220414005114/en/761650/22/postman-logo-vert-2018.jpg)
Postman is an API platform for developers. The company is headquartered in San Francisco and maintains an office in Bangalore, where it was founded. Postman will serve as an API testing software to indicate the effectivity of the response-request streamline. 
<br>

## Test Accounts 
### Admin
Enables access to every features
```
Username: admin@gmail.com
Password: adminuser
```
### Non-Admin
Enables limited access to features
```
Username: testuser@gmail.com
Password: manrique
```
>[!NOTE]
>The given test cases are documented during the development phase of the system. The developers will need to perform necessary test cases such as integration tests, unit tests, etc. before starting the deployment process with CI/CD pipelines.
