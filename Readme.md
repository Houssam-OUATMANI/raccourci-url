# Raccourci URL - Gestionnaire d'URLs Raccourcies

## 🎯 Objectif de l'Application

**Raccourci URL** est une application web moderne permettant de créer, gérer et partager des URLs raccourcies. Elle offre aux utilisateurs la possibilité de :

- 📝 Créer des raccourcis personnalisés pour leurs URLs longues
- 👤 Gérer leur profil et historique d'URLs
- 🔐 Accéder à des fonctionnalités sécurisées via un système d'authentification
- 📊 Suivre et consulter leurs URLs raccourcies
- 🔗 Partager facilement des liens courts et mémorables

## 🛠️ Technologies Utilisées

L'application est construite avec une stack PHP moderne et robuste :

### Backend
- **Framework Web** : [Slim Framework 4](https://www.slimframework.com/) - Framework micro-service léger et performant
- **Injection de Dépendances** : [PHP-DI](https://php-di.org/) - Conteneur PSR-11 pour la gestion des dépendances
- **Base de Données** : SQLite - Base de données intégrée, idéale pour le prototypage et le déploiement simple
- **PSR-7 HTTP** : [Slim PSR-7](https://github.com/slimframework/Slim-Psr7) - Implémentation PSR-7 pour les requêtes/réponses HTTP
- **Messages Flash** : [Slim Flash](https://github.com/slimframework/Flash) - Gestion des messages temporaires (notifications)
- **Debug** : Symfony Var-Dumper - Outils de debugging avancés

### Architecture
- **PHP 8+** - Version moderne avec typage strict
- **PSR-4 Autoloading** - Chargement automatique des classes selon les standards PSR-4

## 🏗️ Structure et Architecture

L'application suit une architecture **MVC avec Service Layer** et est organisée de manière modulaire :

```
src/
├── Controllers/           # Contrôleurs (gestion des requêtes)
│   ├── AuthController     # Authentification (login, register, logout)
│   ├── HomeController     # Pages principales
│   └── Controller         # Classe de base
│
├── Services/              # Couche métier (logique applicative)
│   ├── AuthService        # Logique d'authentification
│   └── UrlService         # Logique de gestion des URLs
│
├── Repositories/          # Couche d'accès aux données (Data Access Layer)
│   ├── UrlRepo            # Opérations CRUD sur les URLs
│   └── UserRepo           # Opérations CRUD sur les utilisateurs
│
├── Interfaces/            # Contrats (interfaces)
│   ├── UrlRepositoryInterface
│   └── UserRepositoryInterface
│
├── Entities/              # Modèles de domaine
│   ├── Url                # Entité URL
│   └── User               # Entité Utilisateur
│
├── Dto/                   # Data Transfer Objects (transfert de données)
│   ├── CreateUrlDto
│   ├── CreateUserDto
│   ├── LoginUserDto
│   └── UserDto
│
├── Mappers/               # Mappage DTO ↔ Entity
│   ├── UrlMapper
│   ├── UserMapper
│   └── UserDtoMapper
│
├── Database/              # Configuration base de données
│   ├── Db                 # Connexion PDO
│   └── Migrations/        # Scripts de migration
│       ├── CreateUserTable
│       └── CreateUrlsTable
│
├── middlewares/           # Middlewares (interception des requêtes)
│   ├── AuthMiddleware     # Vérification authentification
│   └── GuestMiddleware    # Restriction accès non-authentifiés
│
├── Config/                # Configuration
│   └── Session            # Configuration des sessions
│
└── views/                 # Templates (rendu HTML)
    ├── layout             # Template principal
    ├── pages/             # Pages principales
    │   ├── home
    │   └── auth/
    └── components/        # Composants réutilisables
        ├── navbar
        ├── input
        └── flash
```

## 🔄 Flux Architectural

### Pattern de Dépendances
```
Request → Router → Controller → Service → Repository → Database
                  ↓
                Views (Response)
```

### Authentification
- **Flux** : GuestMiddleware pour signup/login → AuthMiddleware pour les pages protégées
- **Session** : Gestion via PHP sessions avec flash messages pour notifications

### Gestion des URLs
1. L'utilisateur soumit une URL longue
2. Le **UrlService** crée un raccourci
3. Le **UrlRepository** persiste les données
4. L'utilisateur récupère le lien court pour partage

## 🚀 Installation et Démarrage

```bash
# Cloner le repository
git clone https://github.com/Houssam-OUATMANI/raccourci-url
cd raccourci-url

# Installer les dépendances
composer install

# Lancer l'application
php -S localhost:8000 -t public

# Accéder à l'application
# http://localhost:8000
```

## 🔑 Points Clés de l'Architecture

- **Séparation des responsabilités** : Controllers → Services → Repositories
- **Inversion de contrôle** : PHP-DI pour injection automatique des dépendances
- **DTOs** : Transfert de données sécurisé entre les couches
- **Mappers** : Conversion des objets métier vers/depuis les DTOs
- **Middlewares** : Gestion centralisée de l'authentification
- **Interfaces** : Contrats clairs pour les repositories (extensibilité)

## 📝 Notes de Développement

- Base de données SQLite pour simplification du déploiement
- Utilisation des PSR-7 pour compatibilité et interopérabilité
- Architecture scalable permettant l'ajout futur d'une couche métier complexe