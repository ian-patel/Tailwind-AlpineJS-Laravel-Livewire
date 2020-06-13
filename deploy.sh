#!/bin/sh
set -e

vendor/bin/phpunit

(git push) || true

git stash
git checkout production
git merge master

git push origin production

git checkout master
git stash pop
