<?php


namespace src\classes\Tariffs;


use src\traits\AdditionalServices;

class BaseTariff extends Tariffs
{
    protected $priceForTime = 3;
    protected $priceForDistance = 10;

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
