# Validate

A rule-based validation and filtering pipeline for arrays of input data. Rules are chained per field with `|`, take options in `[brackets]`, and are resolved from a configurable `name => Class::method` map — new rules or filters are just another entry in that map.

## Example

```php
use orange\validate\Validate;
use orange\validate\exceptions\ValidationFailed;

$validate = Validate::getInstance($config); // config merges over validate/src/config/validate.php

try {
    $clean = $validate->values([
        'email' => 'ada@example.com',
        'age' => '36',
    ])
        ->for('email', 'isRequired|isValidEmail', 'Email')
        ->for('age', 'isRequired|isInteger|isGreaterThan[17]', 'Age')
        ->throwExceptionOnFailure(true)
        ->run();

    // $clean === ['email' => 'ada@example.com', 'age' => '36']
} catch (ValidationFailed $e) {
    $errors = $validate->errors(); // array of human-readable error strings
}
```

Validating a single value without an array is shorter:

```php
$age = $validate->value($_GET['age'] ?? '', 'isRequired|isInteger|isGreaterThan[17]', 'Age');
```

Filters (`toInteger`, `toLower`, `toPasswordHash`, ...) and casts (`castInt`, `castBool`, ...) are declared the same way and can be mixed into the same rule chain, e.g. `'toLower|isRequired|maxLength[64]'`. See `validate/src/config/validate.php` for the full list of built-in rule and filter names, and add your own by registering `addRule('myRule', MyRuleClass::class . '::method')`.
