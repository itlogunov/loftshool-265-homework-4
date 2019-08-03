<?php

ini_set('display_errors', 1);

require_once 'src/autoloader.php';

use src\classes\Tariffs\BaseTariff;
use src\classes\Tariffs\HourlyTariff;
use \src\classes\Tariffs\DailyTariff;
use src\classes\Tariffs\StudentTariff;

/**
 * Тариф «Базовый»
 */
echo '<b>Тариф «Базовый»</b><br><br>';
$baseTariff = new BaseTariff();
if ($totalPrice = $baseTariff->calculate(5, 60, 20)) {
    echo 'Данные: 5 км, 60 минут, 20 лет. Итого за аренду по тарифу «Базовый»: ' . $totalPrice . '<br><br>';
}

$baseTariff = new BaseTariff(['gps']);
if ($totalPrice = $baseTariff->calculate(5, 60, 20)) {
    echo 'Данные: 5 км, 60 минут, 20 лет, gps. Итого за аренду по тарифу «Базовый»: ' . $totalPrice . '<br><br>';
}

$baseTariff = new BaseTariff(['gps', 'driver']);
if ($totalPrice = $baseTariff->calculate(5, 60, 20)) {
    echo 'Данные: 5 км, 60 минут, 20 лет, gps, дополнительный водитель. Итого за аренду по тарифу «Базовый»: ' . $totalPrice . '<br><br>';
}
echo '<br><br><br><br>';

/**
 * Тариф «Почасовой»
 */
echo '<b>Тариф «Почасовой»</b><br><br>';
$hourlyTariff = new HourlyTariff();
if ($totalPrice = $hourlyTariff->calculate(5, 61, 25)) {
    echo 'Данные: 5 км, 61 минута, 25 лет. Итого за аренду по тарифу «Почасовой»: ' . $totalPrice . '<br><br>';
}

$hourlyTariff = new HourlyTariff(['gps']);
if ($totalPrice = $hourlyTariff->calculate(5, 61, 25)) {
    echo 'Данные: 5 км, 61 минута, 25 лет, gps. Итого за аренду по тарифу «Почасовой»: ' . $totalPrice . '<br><br>';
}

$hourlyTariff = new HourlyTariff(['gps', 'driver']);
if ($totalPrice = $hourlyTariff->calculate(5, 61, 25)) {
    echo 'Данные: 5 км, 61 минута, 25 лет, gps, дополнительный водитель. Итого за аренду по тарифу «Почасовой»: ' . $totalPrice . '<br><br>';
}
echo '<br><br><br><br>';

/**
 * Тариф «Суточный»
 */
echo '<b>Тариф «Суточный»</b><br><br>';
$dailyTariff = new DailyTariff();
if ($totalPrice = $dailyTariff->calculate(5, 1469, 25)) {
    echo 'Данные: 5 км, 24 часа 29 минут, 25 лет. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}
if ($totalPrice = $dailyTariff->calculate(5, 1471, 25)) {
    echo 'Данные: 5 км, 24 часа 31 минута, 25 лет. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}

$dailyTariff = new DailyTariff(['gps']);
if ($totalPrice = $dailyTariff->calculate(5, 1469, 25)) {
    echo 'Данные: 5 км, 24 часа 29 минут, 25 лет, gps. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}
if ($totalPrice = $dailyTariff->calculate(5, 1471, 25)) {
    echo 'Данные: 5 км, 24 часа 31 минута, 25 лет, gps. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}

$dailyTariff = new DailyTariff(['gps', 'driver']);
if ($totalPrice = $dailyTariff->calculate(5, 1469, 25)) {
    echo 'Данные: 5 км, 24 часа 29 минут, 25 лет, gps, дополнительный водитель. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}
if ($totalPrice = $dailyTariff->calculate(5, 1471, 25)) {
    echo 'Данные: 5 км, 24 часа 31 минута, 25 лет, gps, дополнительный водитель. Итого за аренду по тарифу «Суточный»: ' . $totalPrice . '<br><br>';
}
echo '<br><br><br><br>';

/**
 * Тариф «Студенческий»
 */
echo '<b>Тариф «Студенческий»</b><br><br>';
$studentTariff = new StudentTariff();
if ($totalPrice = $studentTariff->calculate(5, 60, 25)) {
    echo 'Данные: 5 км, 60 минут, 25 лет. Итого за аренду по тарифу «Студенческий»: ' . $totalPrice . '<br><br>';
}

$studentTariff = new StudentTariff(['gps']);
if ($totalPrice = $studentTariff->calculate(5, 60, 25)) {
    echo 'Данные: 5 км, 60 минут, 25 лет, gps. Итого за аренду по тарифу «Студенческий»: ' . $totalPrice . '<br><br>';
}

$studentTariff = new StudentTariff(['gps', 'driver']);
if ($totalPrice = $studentTariff->calculate(5, 60, 25)) {
    echo 'Данные: 5 км, 60 минут, 25 лет, gps, дополнительный водитель. Итого за аренду по тарифу «Студенческий»: ' . $totalPrice . '<br><br>';
}