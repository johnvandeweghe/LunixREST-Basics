[![Build Status](https://travis-ci.org/johnvandeweghe/LunixREST-Basics.svg?branch=master)](https://travis-ci.org/johnvandeweghe/LunixREST-Basics) [![Code Coverage](https://scrutinizer-ci.com/g/johnvandeweghe/LunixREST-Basics/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/johnvandeweghe/LunixREST-Basics/?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/johnvandeweghe/LunixREST-Basics/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/johnvandeweghe/LunixREST-Basics/?branch=master)

# Overview
LunixREST-Basics is a project that contains implementations of interfaces/abstract classes from [LunixREST](https://github.com/johnvandeweghe/LunixREST) that enable basic activities that most APIs would use. It is separated into it's own project so that the basics can depend on 3rd party libraries (such as Guzzle), without requiring those libraries for the Core codebase.

## Features:
* Doctrine support for endpoints/endpoint factories
* JSON request/response support
* Basic URL parser
* Single endpoint endpoint factory
* Super basic example API implementations

## Unit test coverage

This project seeks to aproach 100% code coverage at all times. Both in numbers, and in actual code path coverage. If that is ever not the case, leave an issue and it will be addressed ASAP.

# Installation
## Requirements
All dependencies are specified in the composer.json, so as long as you use composer with this library, all dependencies should be taken care of.

That being said, here are some dependencies:

* PHP 7.1+
* LunixREST
* GuzzleHTTP
* Monolog

## Version Notice
This project updates master regularly. Changes to master that are not released are not guaranteed to be stable, and should be treated as such. Use the release tags for production projects.

All minor version number updates will have guaranteed backwards compatibility. Major version changes won't be held to that standard, but generally the goal is to minimise interface changes.

## Installation

This project is listed in [Packigist](https://packagist.org/packages/johnvandeweghe/lunixrest-basics), the default repository for Composer. So installation is as simple as:

``` composer require johnvandeweghe/lunixrest-basics ```

# Usage TODO
## JSON
### Requests
JSONHTTPServer
### Responses
JSONResponseDataSerializer
## Doctrine
### ManagerRepository
### Endpont/EndpointFactory
