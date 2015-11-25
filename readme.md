# Nuit de l'info 2015

## Installation

## Bug courant
Lors d'un "sudo composer dump-autoload" :
[ErrorException]                                                                                      
  file_put_contents(/home/vagrant/Code/nuitinfo2015/vendor/composer/autoload_namespaces.php): failed t  
  o open stream: Operation not permitted

Solution :
change permissions on vendor folder chmod -R 777 vendor
run a php artisan serve and stop, this will create the services.json file.

