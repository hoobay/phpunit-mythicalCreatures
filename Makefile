# Makefile pour Mythical Creatures PHP

.PHONY: install test test-all test-unicorn test-vampire test-dragon test-hobbit test-pirate test-wizard test-medusa test-werewolf test-centaur test-ogre test-direwolf test-lovisa coverage clean

# Installation des dépendances
install:
	composer install

# Exécuter tous les tests
test:
	./vendor/bin/phpunit

test-all: test

# Tests individuels
test-unicorn:
	./vendor/bin/phpunit tests/UnicornTest.php

test-vampire:
	./vendor/bin/phpunit tests/VampireTest.php

test-dragon:
	./vendor/bin/phpunit tests/DragonTest.php

test-hobbit:
	./vendor/bin/phpunit tests/HobbitTest.php

test-pirate:
	./vendor/bin/phpunit tests/PirateTest.php

test-wizard:
	./vendor/bin/phpunit tests/WizardTest.php

test-medusa:
	./vendor/bin/phpunit tests/MedusaTest.php

test-werewolf:
	./vendor/bin/phpunit tests/WerewolfTest.php

test-centaur:
	./vendor/bin/phpunit tests/CentaurTest.php

test-ogre:
	./vendor/bin/phpunit tests/OgreTest.php

test-direwolf:
	./vendor/bin/phpunit tests/DirewolfTest.php

test-lovisa:
	./vendor/bin/phpunit tests/LovisaTest.php

# Couverture de code
coverage:
	./vendor/bin/phpunit --coverage-html coverage-html
	@echo "Rapport de couverture généré dans coverage-html/"

# Nettoyage
clean:
	rm -rf vendor/ composer.lock coverage-html/ .phpunit.cache/
