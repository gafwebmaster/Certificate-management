# Certificate-management
Laravel 10 API Crud is a basic RESTful API crud app built with Laravel 10 and Passport. In this project, a rest API was created for managing certificate crud operations.

## Features (API) include:
- Laravel passport package
- Authentication using Passport
- Logout to remove old tokens
- Create a certificate
- List certificates
- Update a certificate
- Delete a certificate
- Search certificate by certificate name
- Pagination link with JSON data

## Project requests:
1. Returns the home page with all certificates
2. Returns the form for adding a certificate
3. Add a certificate to the database with the following details using API: Expiry date, Licence type, PCI owner, Licence name, Equipment, Provider, Contact name, Contact phone, Email contact, Generated by, About licence and Remarks.

4. Returns a page that shows full certificate details.
5. Returns the form for editing a certificate.
6. Updates a certificate
7. Deletes a certificate

## Table structure:
**certificate_details:** id, expiry_date, certificate_type, pci_owner, certificate_name, equipment, provider, contact_name, contact_phone, email_contact, generated_by, about_certificate and remarks.

## Routes
**Returns all certificates:**
Route::get('/certificate/', [CertificateController::class,'index'])->name('certificates.index');

**Adding a certificate:**
Route::get('/certificate/create', [CertificateController::class . 'create'])->name('certificate.create');

**Returns certificate details:**
Route::get('/certificate/{certificate_id}', [CertificateController::class,'show'])->name('certificate.show');

**Editing a certificate:**
Route::get('/certificate/{certificate_id}/edit', [CertificateController::class,'edit'])->name('certificate.edit');

**Updates a certificate**
Route::put('/certificate/{certificate_id}', [CertificateController::class,'update'])->name('certificate.update');

**Deletes a certificate**
Route::delete('/certificate/{certificate_id}', [CertificateController::class,'destroy'])->name('certificate.destroy');

## Install
Install commands:
```
- git clone https://github.com/nhrrob/laravel-8-api-crud.git 
- composer update
- add .env and update database settings
- php artisan migrate:fresh --seed
- php artisan serve
```
Use Postman to test the API.

## Test functionality
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
