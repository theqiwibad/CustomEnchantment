<?php

namespace CustomEnchantments\enchantment;

use pocketmine\item\enchantment\Enchantment;
use pocketmine\item\enchantment\Rarity;

class Custom extends Enchantment
{
    public function __construct(public int $id, string $name, public ?string $customName = null, int $rarity = Rarity::COMMON, int $maxLevel = 5)
    {
        $this->customName = ($customName ?? $name);
        parent::__construct($name, $rarity, 0, 0, $maxLevel);
    }

    /**
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getCustomName() : string
    {
        return $this->customName;
    }
}
