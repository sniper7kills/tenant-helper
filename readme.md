# Tenant Helper
This package is intended to help when developing with the `tenancy/tenancy` package.

## Pre-Install
If you plan on changing the app name, it is recommended that you do so before using this package.

***Running the below command will NOT update the namespace on any files created by this project***
```
php artisan app:name
```
## Setup & Use

**Installation**
```
composer require sniper7kills/tenant-helper --dev
```
**Setup folder structure**
```
php artisan tenant:init
```
**Setup Composer**

Update the `autoload` section of your `composer.json` file to include the new Tenant Namespace.

I.E.
```
    ...
    
    "autoload": {
        "psr-4": {
            "App\\": "app/",
            "App\\Tenant\\": "Tenant/",
        },
        
    ...
   
```
## Folder Structure
```
app
Tenant
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── Http
│   ├── Controllers
│   │   └── Api
│   ├── Middleware
│   └── Requests
├── Model
├── Policies
├── resources
│   ├── js
│   ├── lang
│   ├── sass
│   └── views
│       └── layouts
└── routes

```

## Available Commands
These are duplicates of laravel's built in `make:` commands and will reproduce the same output but in the folders created by `tenant:init`.
```
      tenant:init       Initialize Folder Structure           
      tenant:controller Create a new tenant controller class  
      tenant:factory    Create a Tenant Factory               
      tenant:middleware Create a Tenant Middleware            
      tenant:migration  Create a Tenant Migration             
      tenant:model      Create a Tenant Model                 
      tenant:policy     Create a Tenant Policy                
      tenant:request    Create a Tenant Request               
      tenant:seeder     Create a Tenant Seeder 
```

### Exceptions
1) `tenant:controller --api`
    
    This command will put the controller in the `Http\Controllers\Api` folder.
1) `tenant:model`

    This command will automatically add the `onTenant` trait to the model; to disable this functionality use `tenant:model --not`