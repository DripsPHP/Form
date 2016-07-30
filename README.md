# Form

[![Build Status](https://travis-ci.org/Prowect/Form.svg)](https://travis-ci.org/Prowect/Form)
[![Code Climate](https://codeclimate.com/github/Prowect/Form/badges/gpa.svg)](https://codeclimate.com/github/Prowect/Form)
[![Test Coverage](https://codeclimate.com/github/Prowect/Form/badges/coverage.svg)](https://codeclimate.com/github/Prowect/Form/coverage)
[![Latest Release](https://img.shields.io/packagist/v/drips/Form.svg)](https://packagist.org/packages/drips/form)
 
Formulare können in ganz normalen HTML-Code erzeugt werden. Der einzige Unterschied besteht darin, dass das `<form>` wie folgt geschrieben wird `{form}`. Der Grund dafür ist, dass man bei einem gewöhnlichen HTML-Formular lediglich GET- und POST-Requests absetzen kann. Bei der verbesserten Variante von Drips sind auch andere Request-Methoden möglich, wie z.B.: DELETE.

```smarty
{form action='/user/1' method='delete'}
    <button type="submit">Delete</button>
{/form}
```

## Funktionen

### Flash Data

Sinnvollerweise wird zwischen den unterschiedlichen Routen umgeleitet (bei verschiedenen Request-Methoden). Aus diesem Grund ist es oftmals erforderlich die Formulardaten (Eingaben) weiterzureichen. Hierfür kann `$request->flashData()` verwendet werden. Damit sind die Formulareingaben auch noch beim nächsten Seitenaufruf verfügbar.

### Values auslesen

Mithilfe der Funktion `value()` können Formularfelder wieder befüllt werden. Außerdem kann ein Standardwert übergeben werden, welcher eingetragen wird, wenn das Formular noch nicht abgesendet wurde (optional).

```smarty
<input type="text" name="name" value="{value('name',  'Max Mustermann')}"/>
```

> Das Beispiel schreibt entweder der Wert des Eingabefeldes hinein, sobald es abgesendet wurde, oder aber *Max Mustermann* wenn es noch nicht abgesendet wurde.

### CSRF-Protection

Um sich gegen CSRF absichern zu können gibt es eine Funktion `checkCsrf()` die entweder `true` oder `false` zurückliefert.

```php
<?php

if(checkCsrf()) {
    echo 'Valid request';
} else {
    echo 'Invalid Csrf-Token';
}

```