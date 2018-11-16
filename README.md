![Interlutions Logo](logo.svg "Interlutions")

Interlutions Coding Standard
============================

We at Interlutions love clean code. So we have a have an internal PHP coding standard across frameworks, e-commerce 
and content management systems. We are using [PHP CodeSniffer][1] to ensure its integrity. 

## Goals of our coding standard

* Using already existing standards (PSR-1, PSR-2)
* Coding standard across frameworks (Symfony, TYPO3, Neos)
* Avoid duplications (also between code, CVS history and documentation)

## Installation

If you use [Composer][2], you can just include the Interlutions Coding Standard in your project with the following
command:

    composer req interlutions/coding-standard

## Usage

Just create a `phpcs.xml.dist` in your project's root directory with the following content:

```xml
<?xml version="1.0"?>
<ruleset name="interlutions-coding-standard">
    <rule ref="vendor/interlutions/coding-standard/Interlutions">
        <!-- If the standard is too hard, you can exclude some rules like this: -->
        <!-- <exclude name="Generic.Arrays.DisallowLongArraySyntax.Found" /> -->
        <!-- <exclude name="Generic.Files.LineLength.TooLong" /> -->
    </rule>
</ruleset>
```

And then you can execute the CodeSniffer like this:

    vendor/bin/phpcs -s -p --colors src/

## Testing & Development

If you are using just this package, you should be fine with this:

1.  Download [PHP CodeSniffer][3]
2.  Try it in this repository: `phpcs -d installed_paths=./Interlutions --standard=Interlutions/ruleset.xml data/*`

---
[1]: https://github.com/squizlabs/PHP_CodeSniffer#readme
[2]: https://getcomposer.org/
[3]: https://github.com/squizlabs/PHP_CodeSniffer#installation
