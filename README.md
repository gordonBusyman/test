# test

## Set Up Steps

1. Get composer: https://getcomposer.org/download/
2. ```php composer.phar install```
3. Prepare `php_test` database. User: `user1` Password: `password1` OR use yours and change permissions in `config.php`
4. Run the seed from `seed.sql` in your Maria / MySQL database (_should run on localhost:3306_)
5. Run the server Apache / nginx / builtin (`php -S localhost:8000`)
6. Enjoy