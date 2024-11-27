TEST Transport Park Management System API

System: </br>
Build using Symfony on development container LANDO (https://lando.dev/).</br>
After lando installed, start with command: 'lando start' </br>
Databese structure created with migration, to create database: 'lando console doctrine:migrations:migrate' </br>
Some dum data created with fixtures, to fill database: 'lando console doctrine:fixtures:load' </br>


API endoints: </br>
'/truks' - list of all trucks </br>
'/trailers' - list of all trailers </br>
'/fleets' - list of all fleets </br>
'/orders' - list of all fleeats that are in work status </br>
