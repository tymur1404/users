Getting Started

Install Docker on your computer. Instructions can be found on the official Docker website: https://docs.docker.com/get-docker/

1. Clone the project repository to your computer:

   git clone git clone https://github.com/tymur1404/users.git


2. Generate the application key:

   php artisan key:generate

3. Build the Docker containers

   docker compose -p users_app -f docker-compose.yml build

4. Start the Docker containers:

   docker-compose up -d


5. Verify that the containers are running:

   docker ps


6. You should see three containers: users_app, users_nginx and users_db.

7. Enter the app container:

   docker exec -it users_app bash


8. Run database migrations:

   php artisan migrate


9. After open new tab terminal and run this command
   npm run dev && npm install

You can now open the project in your browser at http://localhost:8876.
