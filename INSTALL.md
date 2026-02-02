# Guide d'installation

## Prérequis

- PHP 8.0 ou supérieur
- Composer (gestionnaire de dépendances PHP)

### Vérifier les prérequis

```bash
# Vérifier PHP
php --version

# Vérifier Composer
composer --version
```

## Installation

### 1. Cloner ou copier le projet

```bash
cd mythical-creatures-php
```

### 2. Installer les dépendances

```bash
composer install
```

Cette commande va :
- Télécharger PHPUnit et ses dépendances
- Générer l'autoloader PSR-4

### 3. Vérifier l'installation

```bash
# Exécuter tous les tests
./vendor/bin/phpunit

# Ou utiliser Composer
composer test
```

## Installation de PHP et Composer

### Sur macOS (avec Homebrew)

```bash
# Installer PHP
brew install php@8.2

# Installer Composer
brew install composer
```

### Sur Ubuntu/Debian

```bash
# Installer PHP
sudo apt update
sudo apt install php8.2 php8.2-mbstring php8.2-xml

# Installer Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
```

### Sur Windows

1. Télécharger PHP depuis [windows.php.net](https://windows.php.net/download/)
2. Télécharger Composer depuis [getcomposer.org](https://getcomposer.org/download/)
3. Ajouter PHP et Composer au PATH

## Utilisation

### Exécuter tous les tests

```bash
make test
# ou
composer test
# ou
./vendor/bin/phpunit
```

### Exécuter un test spécifique

```bash
make test-unicorn
# ou
composer test:unicorn
# ou
./vendor/bin/phpunit tests/UnicornTest.php
```

### Générer un rapport de couverture

```bash
make coverage
# ou
./vendor/bin/phpunit --coverage-html coverage-html
```

Puis ouvrir `coverage-html/index.html` dans votre navigateur.

## Résolution des problèmes

### "php: command not found"

PHP n'est pas installé ou n'est pas dans le PATH. Réinstallez PHP ou ajoutez-le au PATH.

### "composer: command not found"

Composer n'est pas installé ou n'est pas dans le PATH. Réinstallez Composer.

### "Class not found" lors des tests

L'autoloader n'est pas à jour. Exécutez :

```bash
composer dump-autoload
```

### Erreurs de permission sur Linux/macOS

```bash
chmod +x vendor/bin/phpunit
```

## Structure des fichiers après installation

```
mythical-creatures-php/
├── vendor/                 # Dépendances installées
│   ├── autoload.php
│   ├── bin/
│   │   └── phpunit
│   └── ...
├── src/                    # Vos classes
├── tests/                  # Vos tests
├── composer.json
├── composer.lock           # Généré par Composer
├── phpunit.xml
├── Makefile
├── README.md
└── INSTALL.md
```
