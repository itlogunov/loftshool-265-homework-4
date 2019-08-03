<?php


namespace src\classes\Tariffs;


use src\traits\AdditionalServices;

class DailyTariff extends Tariffs
{
    protected $priceForTime = 1000;
    protected $priceForDistance = 1;

    public function calculate($distance, $time, $age): float
    {
        if (!$this->checkAge($age)) {
            return false;
        } else {
            $days = $time / 1440;
            $modulo = $time % 1440;
            if ($modulo > 30) {
                $days++;
            }

            $totalPrice = (((int)$days * $this->priceForTime) + ($distance * $this->priceForDistance)) * $this->getExtraChargeForAge($age);

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

