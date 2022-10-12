# DevTest .::. Prueba Técnica
Prueba Técnica - DESARROLLADOR PHP

## Instalación
1. Instalar en su maquina Docker Desktop.

2. Descargar el proyecto haciendo uso de git.
```
git clone https://github.com/pimentelj/store.git
```
3. Navegar hasta la direccion donde clono el proyecto anteriormente mencionado:
```
docker compose up -D
```
```
composer install
```
4. Cambiar el nombre del archivo `.env.example` por `.env`.

5. Parar correr las migraciones y seeder ejecutamos el comando
Comando para ser ejecutado en el terminal de Windows o Linux:
```
docker compose exec app php artisan migrate:fresh --seed
```
Si lo deseas ejecutar dentro del terminar del Docker Desktop, es:
```
php artisan migrate:fresh --seed
```
6. Para correr los test ejecutar el comando
Comando para ser ejecutado en el terminal de Windows o Linux:
```
docker compose exec app php artisan test
```
Si lo deseas ejecutar dentro del terminar del Docker Desktop, es:
```
php artisan test
```