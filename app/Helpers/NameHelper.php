<?php

if (!function_exists('fullname')) {
    function fullname(?string  $lastname, ?string  $middlename, ?string $firstname): string
    {
        return trim(collect([$lastname, $middlename, $firstname])
            ->filter()
            ->join(' '));
    }
}

if (! function_exists('initials')) {
    function initials(?string $lastname, ?string $firstname): string
    {
        return collect([$lastname, $firstname])
            ->filter()
            ->map(fn($name) => mb_strtoupper(mb_substr($name, 0, 1)))
            ->join('');
    }
}
