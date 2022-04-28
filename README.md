<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## API Pickit

Esto es una pequeña API para la creacion de un servicio mecánico de autos

## Levantar proyecto

El proyecto esta creado en Laravel 8, dejo los pasos para levantar el mismo:
- Programas requeridos:
    - PHP 7.2 - 8.0^
    - NODE JS 6.14^
    - COMPOSER 2.1.5^
    - Xampp o similar para levantar la base de datos local
- Base de datos:
- Crear de manera local una base de datos MySql con los datos: 
    - nombre de la base de datos: pickit
    - usuario: root
    - sin contraseña
- Comandos para instalar y levantar el proyecto:
    (Iniciar los servicios de MySql previamente creada la base de datos)
    desde una terminal, estando en la carpeta raiz del proyecto lanzar los siguients comandos:
    - npm install
    - composer install
    - php artisan migrate
    - php artisan bd:seed
    - php artisan serve

### Documentacion de la API


## Crear Autos
![image](https://user-images.githubusercontent.com/57354733/165801255-bef31b18-7f39-4b72-ba4d-4a57974dec91.png)

## Obter Lista de Autos
![image](https://user-images.githubusercontent.com/57354733/165801341-f0bb152b-fb07-43f3-ab32-9cb5a0b4ac97.png)

## Obter un Auto
![image](https://user-images.githubusercontent.com/57354733/165801394-d000482d-c517-444a-b99c-f79c6116f66d.png)

## Eliminar un Auto
![image](https://user-images.githubusercontent.com/57354733/165801458-0fc36477-4c32-4810-9862-192841cb1359.png)

## Editar un Auto
![image](https://user-images.githubusercontent.com/57354733/165801128-65d533cb-c025-4ac2-b28a-4948d7b31948.png)

## Crear un propietario
![image](https://user-images.githubusercontent.com/57354733/165801916-02896d31-7344-4b4a-89ce-56da46c1193c.png)

## Crear una transaccion
![image](https://user-images.githubusercontent.com/57354733/165801994-cc839d2d-1e6e-4674-912b-4918c409329a.png)

## Obtener lista de servicios por auto
![image](https://user-images.githubusercontent.com/57354733/165802110-90f02273-72bb-4bc5-b76e-ebf06ce03181.png)

