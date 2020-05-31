<?php


namespace App\Repositories;


use App\Model\Finance;
use App\Model\Spending;

interface SpendRepositoryInterface
{

    public function findById(int $id);

    public function save(Spending $spending, array $data);
}
