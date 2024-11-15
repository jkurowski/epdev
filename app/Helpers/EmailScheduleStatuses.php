<?php
namespace App\Helpers;

class EmailScheduleStatuses
{
    const PENDING = 'pending';
    const SENT = 'sent';
    const FAILED = 'failed';

    public static function getStatuses(): array
    {
        return [
            self::PENDING => 'Oczekuje',
            self::SENT => 'Wysłane',
            self::FAILED => 'Błąd',
        ];
    }

    public static function getStatus(string $status): string
    {
        return self::getStatuses()[$status];
    }
}
