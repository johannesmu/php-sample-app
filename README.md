# A sample php application using Twig
This is a sample app in PHP, using Twig as the templating engine and Composer as the autoloader for classes
- PHP classes are stored in the *src* directory
- Twig templates are in the *templates* directory
- Bootstrap is used as the CSS framework for the front end
- A *.env* file is used to store configurations such as database credentials

## Requirements
- PHP Environment
- A Web server such as Apache
- A MySQL database server
- Composer [download it here](https://getcomposer.org)
- Git [download it here](https://git-scm.com)

If you are using Windows or Mac you can use software such as [XAMPP](https://www.apachefriends.org/index.html) to create the required environments to run this website or you can use Docker containers.

## Clone the repository to your computer
After you have installed the requirements, you will need to clone the repository. Open your Command Line Interface (Terminal or Windows Powershell or other) and navigate to the root directory of the web server (this README is written for Apache). 

### Using XAMPP on Windows
If you are using XAMPP on Windows it will be in `C:\www\apache\htdocs` or something similar. To navigate there you need to type
```
cd C:\www\apache\htdocs
```
The setup maybe different in MacOS, so you may need to consult the documentation relevant to your setup and your operating sytem. You can read it [here](https://www.apachefriends.org/faq_stackman.html#how-do-i-install-xampp-add-ons)

Run the following command for cloning the repository
```
git clone https://github.com/johannesmu/php-sample-app .
```
Note the period [.] symbol 
## Installing dependencies
For this you need Composer. If you install Composer after opening the command line, you may need to close and open it again.
In your terminal run
```
composer install
```

## Adding database credentials
At the root directory of the project you will need to create a file called `.htaccess` . In this file, you will need to put the credentials for your database, so PHP can connect to it. 


