<?php


namespace src\classes\Tariffs;


use src\traits\AdditionalServices;

class StudentTariff extends Tariffs
{
    protected $priceForTime = 1;
    protected $priceForDistance = 4;

    protected function checkAge(int $age)
    {
        if ($age < 18 || $age > 25) {
            echo 'Недопустимый возраст для студента! Ваш возраст: ' . $age . '<br>';
            return false;
        } else {
            return true;
        }
    }

    public function calculate($distance, $time, $age): float
    {
        $totalPrice = parent::calculate($distance, $time, $age);
        if (!empty($this->additionalServices)) {

            /** @var AdditionalServices $service */
            foreach ($this->additionalServices as $service) {
                $totalPrice += $this->$service($time);
            }
        }

        return $totalPrice;
    }
}
