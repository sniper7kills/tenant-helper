# Tenant Helper
This package is intended to help when developing with the `tenancy/tenancy` package.

## Setup & Use

It is recommended that you rename your app prior to installation of this package if you intend to do so.
```
php artisan app:name
```

**Installation**
```
composer require sniper7kills/tenant-helper
```
**Setup folder structure**
```
php artisan tenant:init
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