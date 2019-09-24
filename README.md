## Demo MVC

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/d887c26c00954f5eb584a63f93199717)](https://www.codacy.com/app/flormich/skeleton-mvc?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=flormich/skeleton-mvc&amp;utm_campaign=Badge_Grade)

> Start from PHP MVC skeleton

## 📃 Description

* Front Controller
* Configuration routes
* PDO
* Template


## 💻 Installation
Clone this reposoitory

```
git clone  https://github.com/flormich/skeleton-mvc

```
Move to the demo-MVC folder
```
cd skeleton-MVC
```

Generate the autoloading
```
composer dump-autoload
```

Create your routes in `config/route.json` like in exemple :
```json
{
    "index": {
        "method" : "get",
        "path" : "/Demo-MVC/public/",
        "controller" : "AppController",
        "action" : "show"  
    }
}
```

Change the database in `config/database.json` like in exemple :
```json
{
    "username" :  "root",
    "database" : "database_name",
    "host" : "localhost",
    "password" : "password"
}
```

## ✨️ Usage
Add routes, create controllers

## 📺 [Demo](https://flomi.000webhostapp.com/demo-mvc/public/roles)

![logo](resources/demo-mvc.gif)

## ➕ Todo

* Catch exception
* Create error page
* Create Flashbag

##  ©️ Copyright
This project is under the MIT LICENSE
