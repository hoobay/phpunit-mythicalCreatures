# Mythical Creatures - Exercices PHP 8 avec PHPUnit

Il s'agit d'une collection d'exercices pour pratiquer PHP et le développement piloté par les tests (TDD).

## Structure du projet

```
mythical-creatures-php/
├── src/                    # Classes des créatures mythiques
│   ├── Centaur.php
│   ├── Direwolf.php
│   ├── Dragon.php
│   ├── Hobbit.php
│   ├── Human.php
│   ├── Lovisa.php
│   ├── Medusa.php
│   ├── Ogre.php
│   ├── Person.php
│   ├── Pirate.php
│   ├── Stark.php
│   ├── Unicorn.php
│   ├── Vampire.php
│   ├── Victim.php
│   ├── Werewolf.php
│   └── Wizard.php
├── tests/                  # Tests PHPUnit
│   ├── CentaurTest.php
│   ├── DirewolfTest.php
│   ├── DragonTest.php
│   ├── HobbitTest.php
│   ├── LovisaTest.php
│   ├── MedusaTest.php
│   ├── OgreTest.php
│   ├── PirateTest.php
│   ├── UnicornTest.php
│   ├── VampireTest.php
│   ├── WerewolfTest.php
│   └── WizardTest.php
├── composer.json
├── phpunit.xml
└── README.md
```

## Prérequis

- PHP 8.0 ou supérieur
- Composer

## Installation

1. Clonez ce repository ou copiez les fichiers
2. Installez les dépendances avec Composer :

```bash
cd mythical-creatures-php
composer install
```

## Comment exécuter les tests

### Exécuter tous les tests :
```bash
composer test
# ou
./vendor/bin/phpunit
```

### Exécuter les tests d'une créature spécifique :
```bash
composer test:unicorn
composer test:vampire
composer test:dragon
composer test:hobbit
composer test:pirate
composer test:wizard
composer test:medusa
composer test:werewolf
composer test:centaur
composer test:ogre
composer test:direwolf
composer test:lovisa
```

### Exécuter un fichier de test spécifique :
```bash
./vendor/bin/phpunit tests/UnicornTest.php
```

## Ordre suggéré des exercices

1. **Unicorn** - Introduction basique aux classes et méthodes
2. **Vampire** - Paramètres par défaut et méthodes simples
3. **Dragon** - Gestion d'état avec plusieurs propriétés
4. **Hobbit** - Logique conditionnelle et boucles
5. **Pirate** - Compteur et état
6. **Wizard** - Options et paramètres nommés
7. **Medusa** - Interaction entre objets (Medusa et Person)
8. **Werewolf** - Changement d'état et interactions
9. **Centaur** - Gestion d'état complexe avec plusieurs conditions
10. **Ogre** - Interaction entre plusieurs classes (Ogre et Human)
11. **Direwolf** - Relations entre objets et collections
12. **Lovisa** - Tableaux et caractéristiques

## Créatures disponibles

| Créature | Description |
|----------|-------------|
| **Unicorn** | Licorne avec nom, couleur (argent par défaut), et capacité à dire des choses brillantes |
| **Vampire** | Vampire avec nom, animal de compagnie (chauve-souris par défaut), et soif |
| **Dragon** | Dragon avec nom, couleur, cavalier, et gestion de la faim |
| **Hobbit** | Hobbit avec nom, disposition, âge, et statut (enfant/adulte/vieux) |
| **Pirate** | Pirate avec nom, métier, malédictions, et butin |
| **Wizard** | Sorcier avec nom, barbe, incantations, et fatigue |
| **Medusa** | Méduse qui peut pétrifier les personnes (limite de 3 victimes) |
| **Werewolf** | Loup-garou qui peut changer de forme et consommer des victimes |
| **Centaur** | Centaure avec gestion de la fatigue, position (debout/couché), et potions |
| **Ogre** | Ogre qui interagit avec les humains et peut les assommer |
| **Direwolf** | Loup géant qui protège les Stark (Game of Thrones) |
| **Lovisa** | Personnage avec titre et caractéristiques |

## Concepts PHP 8 utilisés

- **Typage strict** : `declare(strict_types=1);`
- **Types de retour** : `: string`, `: bool`, `: int`, `: void`, `: array`
- **Types de paramètres** : `string $name`, `array $options = []`
- **Propriétés typées** : `private string $name;`
- **Opérateur null coalescent** : `$options['bearded'] ?? true`
- **Fonctions fléchées** : `fn($s) => $s->getName() !== $stark->getName()`
- **Constantes de classe** : Pour les valeurs par défaut

## Couverture de code

Pour générer un rapport de couverture HTML :
```bash
./vendor/bin/phpunit --coverage-html coverage-html
```

Le rapport sera disponible dans le dossier `coverage-html/`.

## Ressources

- [Documentation PHPUnit](https://phpunit.readthedocs.io/)
- [PHP 8 Nouveautés](https://www.php.net/releases/8.0/)
- [TDD - Test Driven Development](https://en.wikipedia.org/wiki/Test-driven_development)


