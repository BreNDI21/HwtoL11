<?php


namespace App\Services;


use App\Repositories\SpendRepositoryInterface;

class SpendService implements SpendServiceInterface
{
    private $spendRepository;
    public function __construct(SpendRepositoryInterface $spendRepository)
    {
        $this->spendRepository =$spendRepository;
    }

    public function getAmountById(int $id)
    {
        $spend = $this->spendRepository->findById($id);
        if(!$spend){
            throw new \Exception('Spend not found');
        }
        return $spend;
    }

    public function updateAmount(int $id, array $data): int
    {
        $spend =$this->spendRepository->findById($id);
        $this->spendRepository->save($spend, $data);
    }
}
