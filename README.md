# Guillaume Loulier - Website

## Build

This project is followed and tested inside a CI process, with this approach, the project is completely
tested and easily maintainable, here's the tools who help the development process : 

### Insight

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/9f8bb447-7982-472d-bb3d-1e927045b09b/big.png)](https://insight.sensiolabs.com/projects/9f8bb447-7982-472d-bb3d-1e927045b09b)

### Gitlab

### Blackfire

## Usage

This project is build using Docker along with PHP, Nginx, Postgres, MySQL, MongoDB and Blackfire.

This way, the project can be used in differents ways : 

### Docker:

This project use Docker environment files in order to allow the configuration according to your needs,
this way, you NEED to define a .env file in order to launch the build.

**_In order to perform better, Docker can block your dependencies installation and return an error 
or never change your php configuration, we recommand to delete all your images/containers 
before building the project_**

```bash
docker stop $(docker ps -a -q)
docker rm $(docker ps -a -q)
docker rmi $(docker images -a -q) -f
```

**Note that this command can take several minutes before ending**

Once this is done, let's build the project.

```bash
touch .env
```

Then add the following keys according to your identifiers:

```text
# Global
CONTAINER_NAME=home

# Servers Ports
NGINX_PORT=port
PHP_PORT=9000 -> default port

# DB Ports
MYSQL_PORT=3306
POSTGRES_PORT=5432
MONGO_PORT=27017
MAIL_DEV_PORT=port

# Database
DB_USERNAME=name
DB_PASSWORD=name
DB_NAME=name
MYSQL_ROOT_PASSWORD=root
MYSQL_ROOT_HOST=172.20.0.1

# Blackfire
BLACKFIRE_SERVER_ID='blc'
BLACKFIRE_SERVER_TOKEN='blc'

```

Then build the project:

```bash
docker-composer up -d --build
```

Then you must use Composer in order to launch the application : 

```bash
composer install --prefer-dist --no-dev --no-autoloader --no-scripts --no-progress --no-suggest
composer clear-cache
composer dump-autoload --optimize --classmap-authoritative --no-dev
```

Once the project is build, let's play with the database : 

```bash
./bin/console d:d:c  --connection=production # In production

./bin/console d:d:c --connection=development # In development
```

For more informations, please check the official documentation : [Symfony](https://symfony.com/doc/current/doctrine/multiple_entity_managers.html)

Once this is done, access the project via your browser : 

- Dev : 

```
http://localhost:port/app_dev.php/
```

- Prod : 

```
http://localhost:port/app.php/
```

If you need to perform some tasks:

```bash
docker exec -it home_php-fpm sh
```

Once in the container:

```bash
# Example for clearing the cache
./bin/console c:c --env=prod || rm -rf var/cache/*
```

**Please note that you MUST open a second terminal in order to keep git ou other commands line outside of Docker**

### PHP CLI

```bash
cd core
php bin/console s:r || ./bin/console s:r
```

Then access the project via your browser: 

```
http://localhost:8000
```
