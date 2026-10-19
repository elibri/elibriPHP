#elibriPHP

This is a library for accessing [elibri API](https://www.elibri.com.pl/doc/api) Elibri is a tool for polish publishers, allowing them to manage their book metadata. 

the elibri API allows accessing the stream of bookdata in ONIX 3.0 format. More info and changelog [here](https://elibri.github.io/elibriPHP/)

This library is released under the MIT license.

## Installation

    composer require elibri/elibri_onix_client

or without Composer:

    require_once 'elibriPHP.php';

## Running tests

    composer install
    composer test
