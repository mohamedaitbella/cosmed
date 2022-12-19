## EGIO LARAVEL BACKEND TEST {{Cosemed}} 

Pour fonctionner correctement, Laravel9 a besoin  :

 [laravel 9 requirment](https://laravel.com/docs/9.x/deployment#server-requirements)
 
 PHP >= 8.0


## Installation

### clone .

```bash
 git clone https://github.com/mohamedaitbella/cosmed.git
```


```bash
 composer install
```

### npm install  
```bash
 npm install
 npm run build

```

### creer un copy du .env.example 

```bash
 cp .env.example .env
```

### générer la clé d'application 
```bash
 php artisan key:generate

```
### Créer une base de données et ajoute à  .env file
```bash
 DB_DATABASE=laravel
 DB_USERNAME=root
 DB_PASSWORD=

```

### générer des tables de base de données
```bash
 php artisan migrate

```

### nom du l'application 
```bash
APP_NAME=cosmed 
```

### Ajouter tout les pays et la list des Destinataire
```bash
php artisan db:seed
```

#  à voir  [pays](https://blog.niap3d.com/fr/4,10,news-27-Liste-PHP-des-pays-du-monde.html)
```bash
Database\Seeders\PaysSeeder 
Database\Seeders\DestinataireSeeder
```

### ajouter les paramètres des mailings et l'email par défaut pour l'envoi 
```bash

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

```

### créer un utilisateur administrateur à partir de notre commande CLI personnalisée
```bash
php artisan cosmed:admin
"Entrez l'adresse e-mail de l'administrateur:"
 > demo@demo.com
 "Entrez le nom de l'administrateur:"
 > admin
 "Entrez le mot de passe administrateur:"
 >
 "Confirmez le mot de passe:"
 >


```

###  les Packages extern utilisés sont
- [Laravel-Lang](https://github.com/Laravel-Lang/lang)
- [Laravel-Excel](https://github.com/SpartnerNL/Laravel-Excel)

# questions  ?
1.3 Définition des données  ==> Qu'est-ce qu'un champ Administrable ?


# :thumbsup:  Cordialement