# Docker SmartLiving

## Premier lancement
Composer doit êtres démarrer

Dans ce dossier.

Lancer la commande: 
```
docker-compose up 
```

Il faut changé l'host dans le .env de symfony:

* 127.0.0.1 devient db


Dans un nouveau terminal.
On va regarder les container démarrer:
```sh
docker ps
```

On  prend le nom du container  de *docker_smartliving_php* :
```sh
docker exec -it docker_api_php_1 sh
```

*Si erreur, relancer la base de données peu avoir pas fini sont lancement*

On fini par crée la base:
```sh
vendor/bin/doctrine orm:schema-tool:create
```

Pour quitter la console du container:
```sh
exit
```

## Fini !
Adresse du site :
```sh
http://127.0.0.1:8080
```
Acceder a la database
```
localhost:3310
```

# La gestion

## Stopper les container

Les container en route :
```sh
docker container ls
```

Ensuite pour les arrêter  
<Container ID> peu êtres juste quelque caractères 
```sh
docker container stop <Container ID> [<Container ID> ...]
```

## Effacer un container

Voir les container:
```sh
docker container ls --all
```

Pareil que pour le stopper
```sh
docker container rm <Container ID> [<Container ID> ...]
```

## Effacer une image

Voir les images:
```sh
docker image ls
```
La seul image crée est docker_smartliving_php
Pour la rebuild on peu l'effacer:
```sh
docker image rm docker_smartliving_php
``` 


Bisou, bisou.
