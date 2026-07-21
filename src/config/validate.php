<?php

return [
    'notationDelimiter' => '',
    'throwExceptionOnFailure' => false,
    'exceptionCode' => 406,

    'isTrue' => [1, '1', 'y', 'on', 'yes', 't', 'true', true],
    'isFalse' => [0, '0', 'n', 'off', 'no', 'f', 'false', false],

    'errorMsg' => '%s is not valid.',

    'ruleDelimiter' => '|',
    'optionLeftDelimiter' => '[',
    'optionRightDelimiter' => ']',
    'defaultOptionDelimiter' => ',',

    // built-in rules/filters/casts now come from orange/rules' Registry
    // (see orange/rules/src/config/rules.php); anything added here is layered
    // on top via Validate::addRules(), same as calling addRule()/addRules() directly
    'rules' => [],
];
