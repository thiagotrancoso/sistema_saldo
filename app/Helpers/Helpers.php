<?php

use Illuminate\Support\Facades\Route;

if (!function_exists('identify_type_transaction')) {
    function identify_type_transaction(string $type = null, int $userIdTransaction = null)
    {
        $types = [
            'I' => 'Depósito',
            'O' => 'Saque',
            'T' => 'Transferência'
        ];

        if (!$type) {
            return $types;
        }

        if ($userIdTransaction && $type === 'I') {
            return 'Recebido transferência';
        }

        return $types[$type];
    }
}

if (!function_exists('menu_active')) {
    /**
     * Return string "active" or empty string
     *
     * @param  $routeName
     * @return string
     */
    function menu_active($routeName): string
    {
        $return = '';

        if (Route::is($routeName)) {
            $return = 'active';
        }

        return $return;
    }
}

if (!function_exists('menu_open')) {
    /**
     * Return string "menu-open" or empty string
     *
     * @param  $routeName
     * @return string
     */
    function menu_open($routeName): string
    {
        $return = '';

        if (Route::is($routeName)) {
            $return = 'menu-open';
        }

        return $return;
    }
}
