<?php declare(strict_types=1);

namespace Yireo\RomanNumbers;

use RuntimeException;

class RomanNumberCalculator
{
    public function calculate(int $number): string
    {
        $romanNumber = '';

        foreach ($this->getReverseUnits() as $romanUnit => $decimalUnit) {
            $times = (int)($number / $decimalUnit);
            $number = $number - $decimalUnit * $times;

            if ($times === 4 || $times === 9) {
                $nextUnit = $this->getNextRomanUnit($decimalUnit);
                $romanNumber .= 'I'.$nextUnit;
                continue;
            }

            $romanNumber .= str_repeat($romanUnit, $times);
        }

        return $romanNumber;
    }

    private function getUnits(): array
    {
        return [
            'I' => 1,
            'V' => 5,
            'X' => 10,
            'L' => 50,
            'C' => 100
        ];
    }

    private function getReverseUnits(): array
    {
        return array_reverse($this->getUnits(), true);
    }

    private function getNextRomanUnit(int $decimalUnit): string
    {
        $match = false;
        foreach ($this->getUnits() as $romanUnit => $unit) {
            if ($match) {
                return $romanUnit;
            }

            if ($decimalUnit === $unit) {
                $match = true;
                continue;
            }
        }

        throw new RuntimeException('getRomanUnit() failed for '.$decimalUnit);
    }
}