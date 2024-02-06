<?php

namespace CustomEnchantments\enchantment;

use pocketmine\data\bedrock\EnchantmentIdMap;
use pocketmine\item\enchantment\StringToEnchantmentParser;

class Manager
{
    public static array $enchantments = [];

    /**
     * @param Custom $enchantment
     * @return void
     */
    public static function register(Custom $enchantment) : void
    {
        self::$enchantments[$enchantment->getId()] = $enchantment;
        EnchantmentIdMap::getInstance()->register($enchantment->getId(), $enchantment);
        StringToEnchantmentParser::getInstance()->register($enchantment->getName(), fn () => $enchantment);
    }

    /**
     * @param int $id
     * @return Custom|null
     */
    public static function getEnchantmentById(int $id) : ?Custom
    {
        return self::$enchantments[$id] ?? null;
    }

    /**
     * @param string $name
     * @return Custom|null
     */
    public static function getEnchantmentByName(string $name) : ?Custom
    {
        $enchantment = StringToEnchantmentParser::getInstance()->parse($name);
        if ($enchantment !== null and $enchantment instanceof Custom):
            return $enchantment;
        endif;
        return null;
    }
}
