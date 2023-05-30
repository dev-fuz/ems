### Docker installation

### Requirement
- docker

### Installation procedure
- clone the repo with the following command

    ```
    git clone git@github.com:dev-fuz/ems.git
    ```

- running docker compose build command
    ```
    docker-compose build app
    ```
- running the container command
    ```
    docker-compose up -d
    ```
- deleting composer.lock with the following command
    ```
    docker-compose exec app rm -rf vendor composer.lock
    docker-compose exec app composer install
    ```
- generating for laravel app key
    ```
    docker-compose exec app php artisan key:generate
    ```

### Resource
    https://www.digitalocean.com/community/tutorials/how-to-install-and-set-up-laravel-with-docker-compose-on-ubuntu-22-04