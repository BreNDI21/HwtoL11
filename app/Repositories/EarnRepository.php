<?php


namespace App\Repositories;


use App\Model\Earning;

class EarnRepository implements EarnRepositoryInterface
{
    private $model;
    public function __construct()
    {
        $this->model = app()->make(Earning::class);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Earning $earning, array $data)
    {
        $earning->amount = $data['amount'];
        $earning->source = $data['source'];
        $earning->comment = $data['comment'];
        $earning->save();
    }
}
