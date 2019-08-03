<?php


namespace src\classes\Tariffs;


use src\traits\AdditionalServices;

class HourlyTariff extends Tariffs
{
    protected $priceForTime = 200;

    public function calculate($distance, $time, $age): float
    {
        if (!$this->checkAge($age)) {
            return false;
        } else {
            $hours = ceil($time / 60);
            $totalPrice = ($hours * $this->priceForTime * $this->getExtraChargeForAge($age));

            if (!empty($this->additionalServices)) {

                /** @var AdditionalServices $service */
                foreach ($this->additionalServices as $service) {
                    $totalPrice += $this->$service($time);
                }
            }

            return $totalPrice;
        }
    }
}
