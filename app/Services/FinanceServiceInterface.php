<?php


namespace App\Services;


use Illuminate\Database\Eloquent\Collection;

interface FinanceServiceInterface
{

public function getAmountById(int $id);

public function updateAmount(int $id, array $data): int;
}
