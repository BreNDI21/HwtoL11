<?php


namespace App\Services;


interface SpendServiceInterface
{
    public function getAmountById(int $id);

    public function updateAmount(int $id, array $data): int;
}
