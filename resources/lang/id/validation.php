<?php

return [
    'required' => ':attribute wajib diisi.',
    'min' => [
        'string' => ':attribute minimal :min karakter.',
    ],
    'confirmed' => ':attribute tidak cocok dengan konfirmasi.',
    'current_password' => 'Password saat ini tidak sesuai.',
    
    'attributes' => [
        'current_password' => 'Password saat ini',
        'password' => 'Password baru',
        'password_confirmation' => 'Konfirmasi password',
    ],
];