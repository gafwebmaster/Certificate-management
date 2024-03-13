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
**1. Returns all certificates:**
Route::get('/certificate/see_all', [CertificateController::class,'show']);

**2. Adding a certificate:**
Route::post('/certificate/create', [CertificateController::class, 'create']);

**3. Returns certificate details by its id:**
Route::get('/certificate/{id?}', [CertificateController::class,'show']);

**4. Updates a certificate**
Route::put('/certificate/update/{id}', [CertificateController::class,'update']);

**5. Deletes a certificate**
Route::delete('/certificate/delete/{id}', [CertificateController::class,'destroy']);

**6. Search for a certificate by its name:**
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
**URL:** https://domain/api/login \
**Method:** POST \
**Insert email and password:** 
```
{
"email":"gafwebmaster@gmail.com",
"password": "password"
}
```
Press Enter to get the Bearer token \
**For future requests add this token** \
**Authorization tab:** Type => Bearer Token; Insert token. \

### Returns all certificates: ###
**URL:** http://localhost:81/api \
**Method:** GET \

### Returns specified certificate ###
**URL:** http://localhost:81/api/certificate/1 \
**Method:** GET \

### Adding a certificate: ###
**Method:** POST
```
{
"expiry_date": "2024-02-24 15:30:24",
"certificate_type": "JB0gyITmOM",
"pci_owner": "LUDq1izb4T",
"certificate_name": "rU21nV3zXO",
"equipment": "AE3isSGmzv",
"provider": "sjSHGQPsbF",
"contact_name": "Florin Nou",
"contact_phone": "8l0fGr3nNG",
"email_contact": "jFH1PcawYtfj@gmail.com",
"generated_by": "v94w81CMzJ",
"about_certificate": "NVKujpPwo8",
"remarks": "zBUN6ttZ5l"
}
```

### Returns certificate details by its id: ###
**URL:** http://localhost:81/api/certificate/2 \
**Method:** GET

### Updates a certificate ###
**URL:** http://localhost:81/api/certificate/update/8 \
**Method:** PUT
```
{
"id":"8",
"expiry_date": "2024-02-24 15:30:24",
"certificate_type": "Test",
"pci_owner": "LUDq1izb4T",
"certificate_name": "rU21nV3zXO",
"equipment": "AE3isSGmzv",
"provider": "sjSHGQPsbF",
"contact_name": "Florin Updated",
"contact_phone": "8l0fGr3nNG",
"email_contact": "9jFHPcYtfj@gmail.com",
"generated_by": "v94w81CMzJ",
"about_certificate": "NVKujpPwo8",
"remarks": "zBUN6ttZ5l"
}
```

### Deletes a certificate ###
**URL:** http://localhost:81/api/certificate/delete/1 \
**Method:** DELETE \

## Feature testing
- test protected route by Sanctum, been logged out;
- try to log in with the wrong: user, password, or token;
- login with rights credentials;
- See all certificates;
- See details for one certificate (by it's id);
- Insert certificate;
- Update certificate;
- Delete certificate;
- Search certificate (by it's name);
- Make "Log out" then try to access the protected route by Sanctum;

## Best security practices present on that project
- .env file is not tracked in Git;
- Laravel project, first and third-party packages up to date always to the latest version;
- Debug messages are disabled in production;
- Parts of the app are restricted by Sanctum.
7. All inputs are validated;
8. Careful with the uploaded files;
9. Payloads are encrypted;
10. Are written tests for the security risks;
11. Regular security audits are done.
