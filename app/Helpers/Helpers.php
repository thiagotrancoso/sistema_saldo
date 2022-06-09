<?php

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
