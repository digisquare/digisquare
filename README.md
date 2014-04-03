# Digisquare

## Manuel d'installation

Voici les instruction afin d'installer l'application CakePHP qui nous servira de base aux prochains développement.

### 1) Cloner le dépôt GitHub distant

Par exemple, dans le terminal :

	git clone git@github.com:digisquare/digisquare.git digisquare
	
  - Attention ! Dans votre cas, vous devez cloner le dépôt de votre groupe, le fork donc, afin de pouvoir y pousser (push) vos changement. Vous n'aurez pas de droits en écriture sur le dépôt principal.
  
Vous aurez probablement besoin de rendre accessible en lecture / écriture le dossier `app/tmp`. Par exemple, dans le terminal :

	sudo chmod -R 777 app/tmp

### 2) Configurer un vhost Apache

Par exemple, dans `/etc/apache2/sites-available/digisquare` :

	<VirtualHost *:80>
	    DocumentRoot "/var/www/digisquare/app/webroot"
	    ServerName digisquare.loc
	    SetEnv DB_HOST "localhost"
	    SetEnv DB_NAME "digisquare"
	    SetEnv DB_USER "root"
	    SetEnv DB_PASS ""
	    <Directory "/var/www/digisquare/">
	        AllowOverride All
	        Order Allow,Deny
	        Allow from all
	        Require all granted
	    </Directory>
	</VirtualHost>
	
  - Le `DocumenRoot` doit pointer vers le répertoire digisquare/app/webroot de votre projet
  - Les variables `SetEnv` permettent de déclarer la configuration de votre base de données
  
En déclarant les identifiants d'accès à la base de données dans le vhost - propre à chacun - cela vous permet d'adapter ces valeurs en fonction de votre environnement. Vous pouvez par exemple créer un utilisateur MySQL avec un mot de passe au lieu de `root` et le mot de passe vide. Cela nous facilitera également la vie au moment de mettre l'application en production sans avoir à changer le code. Pour en savoir plus, consultez le fichier `app/Config/database.php`.

### 3) Modifier le fichier hosts de votre OS pour accéder au site en local

Par exemple sous Mac OSX ou linux, on ajoute `127.0.0.1 digisquare.loc` dans le fichier `/etc/hosts`.

### 3) Créer une base de données MySQL 

  - nom : `digisquare`,
  - interclassement : `utf8_general_ci`

### 4) C'est tout !

Normalement, après avoir suivi ces instructions, en pointant votre navigateur sur `http://digisquare.loc` vous avez accès à la page d'accueil de CakePHP. Bon courage, prévenez-moi si vous rencontrez des difficultés afin de compléter ce guide.
Je suis pilote, coucou thibalt 
Hello dit Joanny
Quand on commence on ne peut plus s’arrêter
 
L’alcool est normalement superflu.  
Lorsque le corps a besoin d’aliments solides, l’esprit reçoit un message qui s’appelle la faim.  
Lorsque le corps a besoin d’aliments liquides, l’esprit reçoit un message qui s’appelle la soif.  
Lorsque le signal de faim se manifeste, on pense de plus en plus à manger. On finit même par ne penser plus qu’à ça si le repas se fait attendre.

Macdo est pas loin si tu veux mon avis.
 
Mais ces signaux de faim et soif ont leurs contraires : les "signaux de satiété". 