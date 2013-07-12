zf-quickstart
=============

This repository is my implementation of Zend Framework's Quick Start tutorial found at http://framework.zend.com/manual/1.12/en/learning.quickstart.html

## Set Up
Downloaded the latest 1.x branch of Zend Framework and copy the contents of library/Zend into the project's library folder

## Default Application Environment
The default application environment has been set to development since this is never intended for public consumption

## Functionality implemented
* Sign the guestbook
* Delete an entry from the guestbook

## Database
Run the following to create the SQLite database and preload it with data

    php scripts/load.sqlite.php --withdata
