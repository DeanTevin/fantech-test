# Build scalable API's faster | With PHP 8.1 and Laravel 10.0
## Created Using APIATO & PORTO

This boilerplate is created using [Apiato](https://apiato.io/) and [Porto System Architectural Pattern](https://mahmoudz.github.io/Porto/)
  

## Installation

- Unzip or clone the project, make sure to load .env file. Almost any configuration is from there.

- Run the composer Install
    ```shell
    composer install
    ```

- Create the designated database before doing any migration. (You can use either Pgsql Or Mysql)

	```env
	DB_CONNECTION=pgsql
	DB_HOST=127.0.0.1
	DB_PORT=5432
	DB_DATABASE=db
	DB_USERNAME=postgres
	DB_PASSWORD=

	# DB_CONNECTION=mysql
	# DB_HOST=127.0.0.1
	# DB_PORT=3306
	# DB_DATABASE=db
	# DB_USERNAME=root
	# DB_PASSWORD=
	```
	
- Generate APP KEY
	```shell
	php artisan key:generate
	```

- Run Migrations (use the seeder for initial build, if you want to start over from scratch just run the 2nd line)
	```shell
	php artisan migrate --seed
	php artisan migrate:fresh --seed
	```

- Generate passport client for Login using OAUTH2
> NOTE: Go to your database and find oauth_clients table, copy the id and secret that has password_client = true. Paste into field in API LOGIN
    ```shell
	php artisan passport:client --password
	```

- Running the project
	```shell
	php artisan serve
	```

- Default user login:
	```
	USERNAME: admin
	PASSWORD: admin
	```

## OPTIONAL (Unit-Tests)
>NOTE: Running test will wipe the entire database records, the tests are meant to be rebuild the entire application from ground up. Make sure you changed the DB_DATABASE configuration in the .ENV

- Running the test suite. (This test suite is scoped only for encompassing the technical test features e.g: Users and E-Presence)

	```shell
	php artisan test --testsuite=Technical-Test-All
	```

## Production and Debug Mode (OPTIONAL)
> You can toggle the production mode and debug mode in .env
    
```env
	APP_ENV=local //APP_ENV=production
	APP_DEBUG=true //APP_DEBUG=false
```


## More Information

Feel free to contact me (Tevin Dean Ramadhan): deantevinn.work@gmail.com if you having trouble installing the files.


