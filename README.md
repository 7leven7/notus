# Project Setup using Custom Docker Compose

## Overview

This project utilizes a custom `docker-compose.yml` configuration to manage the required services efficiently. The setup includes an Nginx web server and a MySQL database, ensuring a lightweight and optimized development environment.

Unlike Laravel's default Docker image, which is excessively large for this use case, a custom Docker Compose configuration has been implemented to streamline performance and resource usage.

## Prerequisites

Ensure you have the following installed on your system:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

## Usage

To set up and run the project, execute the following commands:

### 1. Start the Docker containers

```bash
sudo docker-compose up -d
```

This command initializes and starts all the defined services in detached mode.

### 2. Access the PHP container

```bash
docker exec -it notus-php-1 sh
```

This command allows you to enter the running PHP container's shell environment.

### 3. Navigate to the project directory

```bash
cd /code
```

Ensure you are in the correct working directory inside the container.

### 4. Install and update dependencies

```bash
composer update
```

This updates the project's dependencies based on the `composer.json` file.

### 5. Run database migrations and seed data

```bash
php artisan migrate --seed
```

This command applies database migrations and seeds initial data to the MySQL database.

## Notes

- The port has been changed in the `docker-compose.yml` file to 8088, so the application will be accessible on `localhost:8088`.

- A Postman collection has been uploaded to the root of the project. Import it into Postman for easier testing of API routes.

- The `docker-compose.yml` file is tailored specifically for this project to optimize performance and reduce unnecessary resource consumption.
- The default Laravel Sail image is not used because it includes several components that are not required for this setup, making it unnecessarily large.
- Ensure that the `.env.example` file is copied to `.env` before running the migrations.

## Troubleshooting

- If containers fail to start, check the logs using:
  ```bash
  docker-compose logs
  ```
- If permission issues arise, ensure that the necessary directories have the correct write permissions.

For any additional questions or issues, feel free to reach out.

