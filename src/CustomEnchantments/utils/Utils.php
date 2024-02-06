<?php

namespace CustomEnchantments\utils;

use pocketmine\item\Item;
use CustomEnchantments\enchantment\Custom;

class Utils
{
    /**
     * @param int $number
     * @return string
     */
    public static function getRomanNumeral(int $number) : string
    {
        $map = [
            "M" => 1000,
            "CM" => 900, "D" => 500, "CD" => 400, "C" => 100,
            "XC" => 90, "L" => 50, "XL" => 40, "X" => 10,
            "IX" => 9, "V" => 5, "IV" => 4, "I" => 1
        ];
        $value = "";
        while ($number > 0)
        {
            foreach ($map as $roman => $int)
            {
                if($number >= $int)
                {
                    $number -= $int;
                    $value .= $roman;
                    break;
                }
            }
        }
        return $value;
    }

    /**
     * @param Item $item
     * @return void
     */
    public static function setCustomName(Item $item) : void
    {
        foreach ($item->getEnchantments() as $enchantment)
        {
            $customEnchantment = $enchantment->getType();
            if ($customEnchantment instanceof Custom):
                $item->setCustomName($item->getName() . "\n" . "§r§7" . $customEnchantment->getCustomName() . " " . self::getRomanNumeral($enchantment->getLevel()));
            endif;
        }
    }
}
