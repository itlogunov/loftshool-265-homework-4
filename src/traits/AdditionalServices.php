<?php

namespace src\traits;

trait AdditionalServices
{
    /**
     * Получить стоимость gps-навигатора
     *
     * @param int $time
     * @return int
     */
    public function gps(int $time): int
    {
        return ceil($time / 60) * 15;
    }

    public function driver()
    {
        $currentClass = self::theClass();
        if ($currentClass != 'src\classes\Tariffs\BaseTariff' && $currentClass != 'src\classes\Tariffs\StudentTariff') {
            return 100;
        } else {
            echo 'Услуга «Дополнительный водитель» недоступна в данном тарифе!<br>';
            return 0;
        }
    }

    public static function theClass(){
        return static::class;
    }
}
