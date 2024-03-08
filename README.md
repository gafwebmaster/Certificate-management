# Certificate-management
Laravel 10 API Crud is a basic RESTful API crud app built with Laravel 10 and Passport. In this project, a rest API was created for managing certificate crud operations.

## Features (API) include:
- Authentication using Sanctum
- Login to create a certificate
- Logout to remove user tokens
- List certificates
- Update a certificate
- Delete a certificate
- Search certificate by certificate name
- Search certificate by id

## Table structure:
**certificate_details:** id, expiry_date, certificate_type, pci_owner, certificate_name, equipment, provider, contact_name, contact_phone, email_contact, generated_by, about_certificate and remarks.

## Routes
**1.Returns all certificates:**
Route::get('/certificate/see_all', [CertificateController::class,'show']);

**2.Adding a certificate:**
Route::post('/certificate/create', [CertificateController::class, 'create']);

**3.Returns certificate details:**
Route::get('/certificate/{id?}', [CertificateController::class,'show']);

**4. Updates a certificate**
Route::put('/certificate/update/{id}', [CertificateController::class,'update']);

**5. Deletes a certificate**
Route::delete('/certificate/delete/{id}', [CertificateController::class,'destroy']);

**6. Search for a certificate:**
Route::get('/certificate/search/{word}', [CertificateController::class, 'search']);

## Install
Install commands:
```
- git clone https://github.com/gafwebmaster/Certificate-management
- composer update
- add .env and update database settings
- php artisan migrate:fresh --seed
- php artisan serve
```
Use Postman to test the API.

## Manual test functionality
### Login ###
**URL:** https://domain/api/login
**Method:** POST
**Insert email and password:** Body tab => x-www-form-urlencode
**Press Enter to get the Bearer token**
**For future requests add this token:**
Authorization tab: Type => Bearer Token; Insert token.

**Returns all certificates:**
http://localhost:81/api

**Returns specified certificate**
http://localhost:81/api/certificate/1

**Adding a certificate:**

**Returns certificate details:**

**Editing a certificate:**

**Updates a certificate**

**Deletes a certificate**

## Feature testing
- test protected route by Sanctum, been logged out;
- try to login with wrong: user, password, token;
- loghin with rights credentials;
- See all certificates;
- See details for one certificate (by it's id);
- Insert certificate;
- Update certificate;
- Delete certificate;
- Search certificate (by it's name);
- Make "Log out" then try to access protected route by Sanctum;

## Best security practices present on that project
1. .env file is not tracked in Git;
2. Laravel project, first and third-party packages up to date always to the latest version;
3. Debug messages are disabled in production;
4. Sensitive information is not sent to the error monitoring tools;
5. Parts of the app are restricted by policies;
6. Forms are protected from cross-site request forgery (CSRF);
7. All inputs are validated;
8. Careful with the uploaded files;
9. Payloads are encrypted;
10. Are written tests for the security risks;
11. Regular security audits are done.
