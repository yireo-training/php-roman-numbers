<?php declare(strict_types=1);

namespace Yireo\RomanNumbers\Test;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Yireo\RomanNumbers\RomanNumberCalculator;

class RomanNumberCalculatorTest extends TestCase
{
    #[DataProvider('provide')]
    public function testCalculate(int $number, string $romanNumber)
    {
        $calculator = new RomanNumberCalculator();
        $this->assertEquals($romanNumber, $calculator->calculate($number));
    }

    static public function provide(): array
    {
        return [
            [1, 'I'],
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [6, 'VI'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [10, 'X'],
            [366, 'CCCLXVI'],
        ];
    }
}
