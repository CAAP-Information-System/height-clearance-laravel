# Height Clearance Permit Documentation
> Version Beta

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
```composer install```
Installing Node.js package
```npm install```

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


## Libraries
# Database
## MySQL 
![MySQL](https://www.liveagent.com/app/uploads/2020/11/MySQL-Logo.png)
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
Postman will serve as an API testing software to indicate the effectivity of the response-request streamline. 
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
