1. Clone the repository
2. Setup your local environment
3. Create a database
4. Fill up `.env` file with your database info.
5. Run `composer install`
6. Run `php artisan key:generate`
7. Create a new `placeholder_images` folder in `storage/app/public` directory and upload a default placeholder image for campings. The image must be named `default_placeholder.jpg`.
8. Once you created a directory for placeholder images and uploaded a default image, run `php artisan storage:link` command.
9. Run `php artisan migrate:refresh --seed` to generate few campings.
10. Run `npm install` and `npm run dev` commands.
11. You can now create a user and check the app :)