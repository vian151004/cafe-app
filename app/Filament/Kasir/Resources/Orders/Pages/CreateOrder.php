<?php

namespace App\Filament\Kasir\Resources\Orders\Pages;

use App\Filament\Kasir\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateOrder extends CreateRecord
{
    protected static string $resource = OrderResource::class;
}
