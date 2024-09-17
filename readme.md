PROJET gr_reporting

Etape 1 

    1- Faire l'installion et la désintallation 
       du module sans fonctionallité

        CREER LE FICHIER gr_reporting.php(config du module)
        "   "   "   "    
    2- Affichage dans la side barre (menu Admin)
    
        CREER LE FICHIER config.xml
        CREER LE DOSSIER controllers/admin/ et ensuite
        CREER LE FICHIER AdminCotroller

        Ajout des fonction installTab, uninstallTab dans gr_reporting

    3- Création de la table dans la base de donnée
    
        Rajout d'une requêtes SQL CREAT, DROP dans un dossier sql
        Et une Requête INSERT


Etape 2 

    1- Déplacer les requêtes dans des Services 
       appropriés (logique métier)

        CREER UN DOSSIER Service
        CREER UNE CLASSE OderPaymentError puis déplacer La requêtes SELECTE dedans 

    2- Créer un composer.json avec le script à propriée dedans

        Utiliser la commande composer dump-autoload pour générer un dossier vendor pour le chargement des classes
        Rajouter sur le fichier racine soit (gr_reporting) dans le cas de se projet c'est deux lignes-ci :
            if (file_exists(_PS_MODULE_DIR_. 'gr_reporting/vendor/autoload.php')) {
                require_once _PS_MODULE_DIR_ . 'gr_reporting/vendor/autoload.php';
            }

Etape 3

    1- Création de fonction qui récupère les commandes ayant une erreure 
       sur le n° de suivi ou autre

        CREER UNE CLASSE OrderMissingShiping.php
        FAIRE la requête

    2- Création de fonction qui récupère les commandes ayant un montant de payé
       différent de la facture

        CREER UNE CLASSE OrderAmountPaid.php
        FAIRE la requête 

Etape 4

    1- Faire un première Affichage

        CREER un template en tpl (smarty), dans le templates utilisation d'un foreach pour remplir le tabeau
        
        Dans le fichier controllers de prestashop, FAIRE un initContent qui permettra de faire le lien avec le template
        Pensez à faire les imports pour pouvoir utiliser les requêtes concerner

Etape 5

    1- Faire un formlaire de rechercher
        
        CREER UNE CLASS FormField qui aura les éléments du formulaire
    
        CREER une template form_filter.tpl dans laquelle on gèra l'affichage du formulaire
        PENSER à inclure le fichier form_filter le fichier view.tpl principale
        INITIALIZER dans le controller pour avoir accès aux variables dans nos tpl

    2- Rajouter du code js pour que la page se mette à jour sans avoir besoin de la recharger, et mettre aussi
       des éléments qui vont informer l'utilsateur s'il rentre une donnée incorrecte avant qu'il envoit le formulaire

        CREER UN DOSSIER js
        CREER UN FICHIER nomDuFichier.js 
        
        Pensez à rajouter le chargement du fichier js dans le controlleur
        Enfin utiliser cette fonction "$(document).ready( function()){}" pour dire que la page doit être chargé 
        complètement avant de charger le js, sinon peux avoir des conflits 



        
