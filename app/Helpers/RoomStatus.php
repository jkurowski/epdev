<?php

use App\Helpers\RoomStatusMaper;

if (! function_exists('roomStatus')) {
    function roomStatus(int $number)
    {
        switch ($number) {
            case RoomStatusMaper::FREE:
                return 'Dostępne';
            case RoomStatusMaper::RESERVED:
                return 'Rezerwacja';
            case RoomStatusMaper::SOLD:
                return 'Sprzedane';
            case RoomStatusMaper::RENTED:
                return 'Wynajęte';
            case RoomStatusMaper::DEVELOPERS_AGREEMENT:
                return 'Sprzedane';
            case RoomStatusMaper::PRE_SALE_AGREEMENT:
                return 'Sprzedane';
        }
    }
}
