# Time tracker API
Demo project built using hexagonal architecture consisting on an API to track employee attendance.

## Content
This is a **Symfony** project for a **REST API** application, with a development environment configured in **Docker**. There is a more detailed description in folder `doc/` (only in Spanish).

---

## Installation
- Clone this repo with `git clone git@github.com:jgarciatorralba/timetracker-api.git`
- Navigate to the `./docker` folder, then run `docker-compose up -d` to download images and set up containers.
    - **Important**: the configuration is set to expose the server container's port on host's port 8000, and the database container's port on host's 6432, so make sure they are available before running the above command.
- Once completed, open with VisualStudio and in the command palette (View > Command Palette) select the option "Remote Containers: Reopen in Container".
- Inside the development container, install packages with `composer install`.
- Even though an empty database named **app_db** should have been created with the package installation, you can still run `php bin/console doctrine:database:create` just in case.
- With the database created and the connection to the application successfully established, execute the existing migrations in the `/etc/migrations` folder using the command `php bin/console doctrine:migrations:migrate`.
- Despite the tables are empty, you are now ready to use the application. For this purpose, you can use **[this](https://www.postman.com/jgarciatorralba/workspace/public/collection/11475793-331c8ff1-0ef0-49e0-b789-34c41e5bb2c2?action=share&creator=11475793)** Postman collection to facilitate the interaction. The two main routes are `"/api/users"` and `"/api/work_entries"`.

---

## Scripts
- Run *PHPUnit* tests: `php ./vendor/bin/phpunit`
- Run *CodeSniffer* analysis: `php ./vendor/bin/phpcs <filename|foldername>`
- Correct previously detected coding standard violations: `php ./vendor/bin/phpcbf <filename|foldername>`
- Run *PHPStan* analysis: `php ./vendor/bin/phpstan analyse <foldernames>`

---

## Author
- **Jorge García Torralba** &#8594; [jorge-garcia](https://github.com/jgarciatorralba)
