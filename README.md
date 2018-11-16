![Interlutions Logo](logo.svg "Interlutions")

Interlutions Coding Standard
============================

We at Interlutions love clean code. So we have a have an internal PHP coding standard across frameworks, e-commerce 
and content management systems. We are using [PHP CodeSniffer][1] to ensure its integrity. 

## Goals of our coding standard

* Using already existing standards (PSR-1, PSR-2)
* Coding standard across frameworks (Symfony, TYPO3, Neos)
* Avoid duplications (also between code, CVS history and documentation)

## Testing the coding standard

* Download [PHP CodeSniffer][2]
* Try it in this repository: `phpcs -d installed_paths=./Interlutions --standard=Interlutions/ruleset.xml data/*`

---
[1]: https://github.com/squizlabs/PHP_CodeSniffer#readme
[2]: https://github.com/squizlabs/PHP_CodeSniffer#installation
