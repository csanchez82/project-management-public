<?php
return [
    'required' => 'O campo :attribute é obrigatório.',
    'unique' => 'O :attribute já foi registrado.',
    'email' => 'O :attribute deve ser um endereço de email válido.',
    'max' => [
        'string' => 'O campo :attribute não pode ter mais do que :max caracteres.',
    ],
    'min' => [
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
    ],

    // Custom attribute names for your table
    'attributes' => [
        'name' => 'nome',
        'code' => 'código',
        'street' => 'rua',
        'number' => 'número',
        'neighborhood' => 'bairro',
        'postal_code' => 'código postal',
        'city' => 'cidade',
        'state' => 'estado',
        'country' => 'país',
        'phone_number' => 'número de telefone',
        'email' => 'e-mail',
    ],
];
