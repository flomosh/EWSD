## Installation of project
- Create database on PhpMyAdmin and import ewsd.sql file from project directory
- Open command prompt and cd into project directory
- Run `copy .env.example .env` to generate environment file | `cp .env.example .env` if you're running on Linux
- Run `composer install` and `php artisan key:generate`
- Input database credentials in the .env file to ensure its database name is same as the database in PhpMyAdmin
- Run `php artisan serve` to view project in http://localhost:8000/

## Account Access
- Marketing Manager Access (Email: superadmin@gre.ac.uk, Password: 123123123)
- Sample Marketing Coordinator Access (Email: lynettelow@gre.ac.uk, Password: 123123123)
- Sample Student Access (Email: tantzeming@gre.ac.uk, Password: 123123123)
- **All emails in accounts are using the same password `123123123` and their emails can be viewed in the users table**

To view the website live, visit https://ewsd.drimglobal.com/ or view the screencast at https://youtu.be/fASfUuXuiQ0
-------

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
