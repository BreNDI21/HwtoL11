<?php


namespace App\Repositories;


use App\Model\Spending;

class SpendRepository implements SpendRepositoryInterface
{

    private $model;
    public function __construct()
    {
        $this->model = app()->make(Spending::class);
    }

    public function findById(int $id)
    {
        return $this->model->find($id);
    }

    public function save(Spending $spending, array $data)
    {
        $spending->amount = $data['amount'];
        $spending->source = $data['source'];
        $spending->comment = $data['comment'];
        $spending->save();
    }
}
