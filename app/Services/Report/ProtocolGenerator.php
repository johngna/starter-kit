<?php

namespace App\Services\Report;

use Carbon\Carbon;
use App\Models\Report;

class ProtocolGenerator
{
    public function generate(): string
    {
        $year = Carbon::now()->format('Y');
        $randomDigits = str_pad(mt_rand(1, 999999), 6, '0', STR_PAD_LEFT);
        return "{$year}{$randomDigits}";
    }

    public function generateUnique(): string
    {
        do {
            $protocol = $this->generate();
        } while ($this->protocolExists($protocol));

        return $protocol;
    }

    private function protocolExists(string $protocol): bool
    {
        return Report::where('protocol', $protocol)->exists();
    }
}
