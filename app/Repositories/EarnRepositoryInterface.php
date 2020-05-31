<?php


namespace App\Repositories;


use App\Model\Earning;

interface EarnRepositoryInterface
{
    public function findById(int $id);

    public function save(Earning $earning, array $data);
}
