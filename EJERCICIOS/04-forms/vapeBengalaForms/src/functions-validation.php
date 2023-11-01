<?php

const FILTERS = [
    'string' => FILTER_SANITIZE_STRING,
];

/**
 * Recursively trim strings in an array
 * @param array $items
 * @return array
 */
function array_trim(array $items): array
{
    return array_map(function ($item) {
        if (is_string($item)) {
            return trim($item);
        } elseif (is_array($item)) {
            return array_trim($item);
        } else
            return $item;
    }, $items);
}

/**
 * Sanitize the inputs based on the rules an optionally trim the string
 * @param array $inputs
 * @param array $fields
 * @param int $default_filter FILTER_SANITIZE_STRING
 * @param array $filters FILTERS
 * @param bool $trim
 * @return array
 */
function sanitize(array $inputs, array $fields = [], int $default_filter = FILTER_SANITIZE_STRING, array $filters = FILTERS, bool $trim = true): array
{
    if ($fields) {
        $options = array_map(fn ($field) => $filters[$field], $fields);
        $data = filter_var_array($inputs, $options);
    } else {
        $data = filter_var_array($inputs, $default_filter);
    }

    return $trim ? array_trim($data) : $data;
}

const DEFAULT_VALIDATION_ERRORS = [
    'required' => 'El %s es requerido',
    'alphanumeric' => 'El %s debe tener solo letras y números',
];

/**
 * Validate
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function validate(array $data, array $fields, array $messages = []): array
{
    // Split the array by a separator, trim each element
    // and return the array
    $split = fn ($str, $separator) => array_map('trim', explode($separator, $str));

    // get the message rules
    $rule_messages = array_filter($messages, fn ($message) => is_string($message));
    // overwrite the default message
    $validation_errors = array_merge(DEFAULT_VALIDATION_ERRORS, $rule_messages);

    $errors = [];

    foreach ($fields as $field => $option) {

        $rules = $split($option, '|');

        foreach ($rules as $rule) {
            // get rule name params
            $params = [];
            // if the rule has parameters e.g., min: 1
            if (strpos($rule, ':')) {
                [$rule_name, $param_str] = $split($rule, ':');
                $params = $split($param_str, ',');
            } else {
                $rule_name = trim($rule);
            }
            // by convention, the callback should be is_<rule> e.g.,is_required
            $fn = 'is_' . $rule_name;

            if (is_callable($fn)) {
                $pass = $fn($data, $field, ...$params);
                if (!$pass) {
                    // get the error message for a specific field and rule if exists
                    // otherwise get the error message from the $validation_errors
                    $errors[$field] = sprintf(
                        $messages[$field][$rule_name] ?? $validation_errors[$rule_name],
                        $field,
                        ...$params
                    );
                }
            }
        }
    }

    return $errors;
}

/**
 * Return true if a string is not empty
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_required(array $data, string $field): bool
{
    return isset($data[$field]) && trim($data[$field]) !== '';
}

/**
 * Return true if a string is alphanumeric
 * @param array $data
 * @param string $field
 * @return bool
 */
function is_alphanumeric(array $data, string $field): bool
{
    if (!isset($data[$field])) {
        return true;
    }

    return ctype_alnum($data[$field]);
}

/**
 * Sanitize and validate data
 * @param array $data
 * @param array $fields
 * @param array $messages
 * @return array
 */
function filter(array $data, array $fields, array $messages = []): array
{
    $sanitization = [];
    $validation = [];

    // extract sanitization & validation rules
    foreach ($fields as $field => $rules) {
        if (strpos($rules, '|')) {
            [$sanitization[$field], $validation[$field]] = explode('|', $rules, 2);
        } else {
            $sanitization[$field] = $rules;
        }
    }

    $inputs = sanitize($data, $sanitization);
    $errors = validate($inputs, $validation, $messages);

    return [$inputs, $errors];
}
