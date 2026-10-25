#  GestionStock
Application web de gestion de stock développée avec Laravel — permet de gérer les produits, catégories, mouvements de stock et utilisateurs avec un tableau de bord analytique.
#  Aperçu
GestionStock est une application web complète permettant à une entreprise de gérer efficacement son inventaire. Elle offre une interface intuitive pour suivre les entrées/sorties de produits, gérer les employés et visualiser les statistiques de stock en temps réel.

#  Fonctionnalités

-  Authentification — Connexion sécurisée avec gestion des rôles (Admin / Employé)
-  Produits — Ajout, modification, suppression et consultation des produits
-  Catégories — Organisation des produits par catégorie
-  Mouvements de stock — Enregistrement des entrées et sorties avec vérification du stock disponible
-  Gestion des employés — L'administrateur peut ajouter et supprimer des employés
-  Dashboard analytique — Statistiques en temps réel + graphique entrées/sorties par mois
-  Alertes stock faible — Notification visuelle des produits dont le stock est insuffisant
-  Historique des opérations — L'admin voit toutes les opérations, l'employé voit uniquement les siennes

#  Technologies utilisées
| Technologie | Version |
|---|---|
| PHP | ^8.1 |
| Laravel | ^10.x |
| SQLite | — |
| Bootstrap (SB Admin 2) | 4.x |
| ApexCharts | CDN |
| Font Awesome | 5.x |

##  Installation
 
### Prérequis
 
- PHP >= 8.1
- Composer
- Node.js & NPM
- Laragon (ou tout autre serveur local)

### Étapes
 
```bash
# 1. Cloner le projet
git clone https://github.com/votre-username/GestionStock-V2-.git
cd GestionStock-V2-
 
# 2. Installer les dépendances PHP
composer install
 
# 3. Installer les dépendances JS
npm install && npm run dev
 
# 4. Copier le fichier d'environnement
cp .env.example .env
 
# 5. Générer la clé d'application
php artisan key:generate
 
# 6. Configurer la base de données dans .env
DB_CONNECTION=sqlite
# Créer le fichier database/database.sqlite
 
# 7. Lancer les migrations
php artisan migrate 
 
# 8. Démarrer le serveur
php artisan serve
```
 
Accéder à l'application sur : `http://localhost:8000`
 
---

##  Structure de la base de données
 
```
users
├── id, name, email, password, role (admin|employe), timestamps
 
categories
├── id, nom, timestamps
 
produits
├── id, nom, quantite, categorie_id, timestamps
 
mouvements
├── id, type (entree|sortie), quantite, produit_id, user_id (nullable), user_name, timestamps
```
---
 
##  Rôles & Permissions
 
| Fonctionnalité | Admin | Employé |
|---|:---:|:---:|
| Voir le dashboard | ✅ | ✅ |
| Gérer les produits | ✅ | ✅ |
| Gérer les catégories | ✅ | ✅ |
| Faire des mouvements | ✅ | ✅ |
| Voir toutes les opérations | ✅ | ❌ |
| Voir ses propres opérations | ✅ | ✅ |
| Gérer les employés | ✅ | ❌ |
 
---
## Capture d'ecran
- Dashboard Admin
<img width="1366" height="768" alt="admin" src="https://github.com/user-attachments/assets/a976f842-3c59-4019-a27e-1874576ae6e1" />
<img width="1366" height="768" alt="admin(1)" src="https://github.com/user-attachments/assets/99024102-89e6-40bc-be4f-290baee98e92" />
- Ajout de catégorie
<img width="1366" height="768" alt="cat" src="https://github.com/user-attachments/assets/f1a4badf-72bd-48e1-9c48-78c5a34f4300" />
- Ajout de produit
<img width="1366" height="768" alt="prod" src="https://github.com/user-attachments/assets/292525dc-0f2c-4b95-ad75-25c6e753ce9b" />
- Faire une nouvelle opération
<img width="1366" height="768" alt="op" src="https://github.com/user-attachments/assets/2e5f4de3-cc72-4e6e-a1b3-32162e6f46f1" />



----

##  Structure du projet
 
```
gestionStock/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── DashboardController.php
│   │   │   ├── ProduitController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── MouvementController.php
│   │   │   └── UserController.php
│   │   └── Requests/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Produit.php
│   │   ├── Categorie.php
│   │   └── Mouvement.php
├── database/
│   └── migrations/
├── resources/
│   └── views/
│       ├── template.blade.php
│       ├── dashboard.blade.php
│       ├── produits/
│       ├── category/
│       ├── mouvements/
│       └── users/
└── routes/
    └── web.php
```
 
---
 
##  Dashboard
 
Le tableau de bord affiche :
 
- **4 cartes statistiques** : Total produits, catégories, employés, opérations
- **Graphique barres** : Entrées vs Sorties sur les 12 derniers mois (ApexCharts)
- **Alerte stock faible** : Produits avec quantité ≤ 5
- **Dernières opérations** : Les 5 dernières avec type, produit, quantité, auteur et date
---
 
##  Sécurité
 
- Mots de passe hashés avec `bcrypt`
- Protection CSRF sur tous les formulaires
- Régénération de session à la connexion
- Suppression d'un employé sans impact sur l'historique de ses opérations (clé étrangère nullable + nom sauvegardé)
---
 
##  Licence
 
Ce projet est développé à des fins pédagogiques.
 
---
 
##  Auteur
 
Développé par **EBRO VITAL**  
📍 Abidjan, Côte d'Ivoire
 

