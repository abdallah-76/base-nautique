<<<<<<< HEAD
# CodeIgniter 4 Development

[![PHPUnit](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpunit.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpunit.yml)
[![PHPStan](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpstan.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-phpstan.yml)
[![Psalm](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-psalm.yml/badge.svg)](https://github.com/codeigniter4/CodeIgniter4/actions/workflows/test-psalm.yml)
[![Coverage Status](https://coveralls.io/repos/github/codeigniter4/CodeIgniter4/badge.svg?branch=develop)](https://coveralls.io/github/codeigniter4/CodeIgniter4?branch=develop)
[![Downloads](https://poser.pugx.org/codeigniter4/framework/downloads)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub release (latest by date)](https://img.shields.io/github/v/release/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub stars](https://img.shields.io/github/stars/codeigniter4/CodeIgniter4)](https://packagist.org/packages/codeigniter4/framework)
[![GitHub license](https://img.shields.io/github/license/codeigniter4/CodeIgniter4)](https://github.com/codeigniter4/CodeIgniter4/blob/develop/LICENSE)
[![contributions welcome](https://img.shields.io/badge/contributions-welcome-brightgreen.svg?style=flat)](https://github.com/codeigniter4/CodeIgniter4/pulls)
<br>

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](https://codeigniter.com).

This repository holds the source code for CodeIgniter 4 only.
Version 4 is a complete rewrite to bring the quality and the code into a more modern version,
while still keeping as many of the things intact that has made people love the framework over the years.

More information about the plans for version 4 can be found in [CodeIgniter 4](https://forum.codeigniter.com/forumdisplay.php?fid=28) on the forums.

### Documentation

The [User Guide](https://codeigniter.com/user_guide/) is the primary documentation for CodeIgniter 4.

You will also find the [current **in-progress** User Guide](https://codeigniter4.github.io/CodeIgniter4/).
As with the rest of the framework, it is a work in progress, and will see changes over time to structure, explanations, etc.

You might also be interested in the [API documentation](https://codeigniter4.github.io/api/) for the framework components.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

CodeIgniter is developed completely on a volunteer basis. As such, please give up to 7 days
for your issues to be reviewed. If you haven't heard from one of the team in that time period,
feel free to leave a comment on the issue so that it gets brought back to our attention.

> [!IMPORTANT]
> We use GitHub issues to track **BUGS** and to track approved **DEVELOPMENT** work packages.
> We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
> FEATURE REQUESTS.

If you raise an issue here that pertains to support or a feature request, it will
be closed! If you are not sure if you have found a bug, raise a thread on the forum first -
someone else may have encountered the same thing.

Before raising a new GitHub issue, please check that your bug hasn't already
been reported or fixed.

We use pull requests (PRs) for CONTRIBUTIONS to the repository.
We are looking for contributions that address one of the reported bugs or
approved work packages.

Do not use a PR as a form of feature request.
Unsolicited contributions will only be considered if they fit nicely
into the framework roadmap.
Remember that some components that were part of CodeIgniter 3 are being moved
to optional packages, with their own repository.

## Contributing

We **are** accepting contributions from the community! It doesn't matter whether you can code, write documentation, or help find bugs,
all contributions are welcome.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/contributing/README.md).

CodeIgniter has had thousands on contributions from people since its creation. This project would not be what it is without them.

<a href="https://github.com/codeigniter4/CodeIgniter4/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=codeigniter4/CodeIgniter4" />
</a>

Made with [contrib.rocks](https://contrib.rocks).

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Running CodeIgniter Tests

Information on running the CodeIgniter test suite can be found in the [README.md](tests/README.md) file in the tests directory.
=======
# 🌊 BlueWave — Application de gestion de base nautique

Application web complète développée en **CodeIgniter 4** (PHP MVC) pour la gestion d'une base nautique : réservations de séances, gestion des membres, messagerie, actualités et administration.

---

## 📸 Aperçu de l'application

### Page d'accueil publique
![Accueil](screenshots/accueil.png)

### Connexion / Inscription
![Connexion](screenshots/connexion.png)

### Tableau de bord Admin
![Admin](screenshots/admin.png)

### Espace Membre
![Membre](screenshots/membre.png)

---

## 🛠️ Technologies utilisées

| Technologie | Usage |
|-------------|-------|
| PHP 8+ | Langage principal |
| CodeIgniter 4 | Framework MVC |
| MySQL / SQL | Base de données relationnelle |
| HTML5 / CSS3 | Structure et styles |
| JavaScript | Interactions côté client |
| Bootstrap 4 | Interface responsive (public) |
| SB Admin 2 | Dashboard admin |
| Sessions CI4 | Authentification et gestion des rôles |

---

## 🏗️ Architecture MVC

```
app/
├── Controllers/
│   ├── Accueil.php          # Page d'accueil publique
│   ├── Compte.php           # Inscription, connexion, déconnexion
│   ├── Admin.php            # Tableau de bord admin & membre
│   ├── Reservation.php      # Gestion des réservations
│   ├── Demande.php          # Demandes de réservation
│   ├── Message.php          # Messagerie membre ↔ admin
│   ├── Actualite.php        # Gestion des actualités
│   ├── Visiteur.php         # Gestion des visiteurs
│   └── Apropos.php          # Page à propos
├── Models/
│   └── Db_model.php         # Modèle unique centralisé (toutes les requêtes SQL)
├── Views/
│   ├── templates/           # Header/footer public et admin
│   ├── admin/               # Vues réservées à l'admin
│   ├── connexion/           # Pages login/profil
│   ├── compte/              # Création de compte
│   └── membre/              # Espace membre
public/
├── bootstrap/               # Thème public (Bootstrap nautique)
└── bootstrap2/              # Thème admin (SB Admin 2)
```

---

## 👥 Rôles utilisateurs

| Rôle | Code | Accès |
|------|------|-------|
| Administrateur | `A` | Tout — gestion des séances, réservations, comptes, messages |
| Membre | `M` | Ses réservations, demandes, profil, messages |
| Invité | `I` | Accueil public, inscription |

---

## ✅ Fonctionnalités

### Espace public
- Page d'accueil avec présentation des activités (voile, kayak, surf...)
- Page "À propos" de la base nautique
- Affichage des actualités
- Formulaire de contact / message
- Inscription et connexion sécurisée (validation CI4)

### Espace Membre
- Voir ses réservations avec liste des participants
- Faire une demande de réservation
- Messagerie avec l'administration
- Consultation du profil

### Espace Administrateur
- Tableau de bord avec statistiques (nombre de membres, réservations)
- Gestion des séances : créer, lister, filtrer par date
- Gestion des réservations : liste complète avec participants
- Gestion des comptes membres (liste, fonction SQL de comptage)
- Modération des messages et réponse aux membres
- Gestion des actualités
- Gestion des ressources nautiques

---

## 🗄️ Base de données

Le fichier SQL de création de la base est fourni : `e22307604_db1(3).sql`

Tables principales : comptes, réservations, séances, ressources, messages, actualités, participants.

---

## 🚀 Installation

### Prérequis
- PHP 8.0+
- MySQL 5.7+
- Serveur web (Apache / Nginx) ou PHP built-in server
- Composer

### Étapes

```bash
# 1. Cloner le repo
git clone https://github.com/abdallah-76/base-nautique.git
cd base-nautique/V2/ci

# 2. Installer les dépendances
composer install

# 3. Configurer l'environnement
cp .env.example .env
# Modifier .env : base_url, DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 4. Importer la base de données
mysql -u root -p < ../../e22307604_db1\(3\).sql

# 5. Lancer le serveur
php spark serve
```

L'application est accessible à `http://localhost:8080`

---

## 📁 Structure des fichiers importants

```
├── V2/ci/
│   ├── app/              → Code source (Controllers, Models, Views)
│   ├── public/           → Fichiers publics (CSS, JS, images)
│   ├── .env              → Configuration locale (ne pas commiter)
│   └── composer.json     → Dépendances PHP
└── e22307604_db1(3).sql  → Script SQL de la base de données
```

---

## 👨‍💻 Auteur

**Abdallah Maammar**
- 🌐 [Portfolio](https://abdallah-76.github.io)
- 💼 [LinkedIn](https://www.linkedin.com/in/abdallah-maammar-930860326/)
- 🔗 [GitHub](https://github.com/abdallah-76)

---

## 📄 Licence

Projet académique — Université de Bretagne Occidentale (UBO) · Licence Informatique L3
>>>>>>> c0cf0c044baf51c8e933f9a60d81e39619bba7ff
