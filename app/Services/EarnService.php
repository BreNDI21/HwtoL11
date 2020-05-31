<?php


namespace App\Services;


use App\Repositories\EarnRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class EarnService implements FinanceServiceInterface
{
 private $earnRepository;
    public function __construct(EarnRepositoryInterface $earnRepository)
    {
        $this->earnRepository =$earnRepository;
    }

    public function getAmountById(int $id)
    {
        $earn = $this->earnRepository->findById($id);
        if(!$earn){
            throw new \Exception('Earn not found');
        }
        return $earn;
    }

    public function updateAmount(int $id, array $data): int
    {
        $earn =$this->earnRepository->findById($id);
        $this->earnRepository->save($earn, $data);
    }
}
