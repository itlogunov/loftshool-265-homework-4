<?php


namespace src\classes\Tariffs;


use src\interfaces\CarSharingInterface;
use src\traits\AdditionalServices;

abstract class Tariffs implements CarSharingInterface
{
    use AdditionalServices;

    protected $priceForTime;
    protected $priceForDistance;
    protected $additionalServices;

    public function __construct(array $additionalServices = [])
    {
        $this->additionalServices = $additionalServices;
    }

    /**
     * Проверка возраста водителя
     *
     * @param int $age
     * @return bool
     */
    protected function checkAge(int $age)
    {
        if ($age < 18 || $age > 65) {
            echo 'Недопустимый возраст! Ваш возраст: ' . $age . '<br><br>';
            return false;
        } else {
            return true;
        }
    }

    /**
     * Наценка тарифа от возраста
     *
     * @param int $age
     * @return float
     */
    protected function getExtraChargeForAge(int $age): float
    {
        return ($age >= 18 && $age <= 21) ? 1.1 : 1;
    }

    public function calculate($distance, $time, $age): float
    {
        if (!$this->checkAge($age)) {
            return false;
        } else {
            return (($time * $this->priceForTime) + ($distance * $this->priceForDistance)) * $this->getExtraChargeForAge($age);
        }
    }
}
