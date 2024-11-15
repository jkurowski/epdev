<?php

if (!function_exists('vox_convert_status')) {
    function vox_convert_status(int $status): string
    {
        return match ($status) {
            1 => "Dostępne",
            2 => "Rezerwacja ustna",
            3 => "Umowa rezerwacyjna",
            4 => "Sprzedane",
            5 => "Umowa przedwstępna",
            6 => "Umowa deweloperska",
            7 => "Akt notarialny",
            8 => "Odbiór",
            9 => "Wstrzymany",
            default => "Nieznany status", // Default case for unrecognized statuses
        };
    }
}