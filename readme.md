# NFU Workshop

The demo for nfu laravel deploy workshop.

## Requirement

- PHP 7.2
- MariaDB
- Redis
- Yarn

## Usage

### Development

```
git clone https://github.com/chivincent/nfu-workshop.git
cd nfu-workshop

composer install 
yarn install 
yarn run dev 

php artisan migrate
php artisan serve
```

### Production

```
git clone https://github.com/chivincent/nfu-workshop.git
cd nfu-workshop

composer install --no-dev -o -a
yarn install 
yarn run prod

php artisan migrate
```

## LICENSE

This project is under [MIT license](https://opensource.org/licenses/MIT)
