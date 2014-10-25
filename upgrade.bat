@echo off
@echo Bienvenido al programa de actualización de softwere
@echo A continuación se verificaran e instalaran actualizaciones
@echo ----------------------------------------------------------
@echo         ------------------------------------------
git pull
php ../composer.phar self-update
php ../composer.phar update
php app/console cache:clear
php app/console cache:clear --env=prod
php app/console assets:install
php app/console assetic:dump
php app/console assetic:dump --env=prod
php app/console cache:clear
php app/console cache:clear --env=prod
php app/console doctrine:schema:update --force
pause