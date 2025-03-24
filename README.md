# 🎓 SimpleClass

SimpleClass – Génération rapide de plans de classe.
Interface intuitive avec gestion flexible des tables (glisser-déposer, suppression).
Importation des élèves (PDF, TXT...), répartition aléatoire et placement manuel.
Ajout de conditions (mixité...) avec mise à jour dynamique.
Export en PDF, PNG, JPG, etc.

[Lien GitHube pages](https://lilian-17.github.io/SimpleClass/html/index.html)
## ✨ Fonctionnalités

* `Gestion de Classe :` Créez et gérez des plans de classe interactifs.
* `Gestion des Élèves :` Ajoutez et gérez facilement les informations des élèves.
* `Thème Sombre/Clair :` Personnalisez l'apparence avec un thème sombre ou clair.
* `Navigation Intuitive :` Une interface utilisateur simple et facile à utiliser.

## 🏗️ Structure du Projet

Le projet est organisé comme suit :

* `index.html` : Page de chargement initiale avec une animation.
* `accueil.html` : Page d'accueil avec des liens vers les différentes sections.
* `account.html` : Page de gestion de compte.
* `class.html` : Page de gestion de classe, d'élèves et de plans.
* `css/styles.css` : Fichiers de style CSS pour l'application.
* `js/script.js` : Fichiers JavaScript pour la logique de l'application.

## ⚙️ Utilisation

* **Page de Chargement (`index.html`) :** Une animation de chargement est affichée avant de rediriger vers la page d'accueil.
* **Page d'Accueil (`accueil.html`) :** Contient des liens vers les sections "Commencer", "A propos de nous" et "Mon compte". Un bouton permet également de changer le thème.
* **Page de Gestion de Compte (`account.html`) :** Permet de gérer les informations du compte utilisateur.
* **Page de Gestion de Classe (`class.html`) :**
    * Permet de créer et de gérer un plan de classe via un tableau redimensionnable.
    * Permet d'ajouter et de gérer les élèves.
    * Permet de visualiser un plan de classe.
    * Un bouton permet également de changer le thème.

## 🔨 Fichiers Javascript

Le fichier `js/script.js` contient les fonctions principales :

* `togglemode()`: Bascule entre le thème sombre et clair et stocke le thème dans le stockage local.
* `agencement()`: Affiche la section de gestion de classe.
* `liste()`: Affiche la section de gestion des élèves.
* `plan()`: Affiche la section de plan de classe.
* `updatetableau()`: Met à jour le tableau de classe en fonction des valeurs des champs de saisie.
* `createchamp()`: créer des champs pour ajouter des éleves.
* `checkchamp()`: verifie si les champs sont remplis.
