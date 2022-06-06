<?php

namespace tedo0627\sampleinventoryui;

use pocketmine\item\Item;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use tedo0627\inventoryui\CustomInventory;

class ActionInventory extends CustomInventory {

    public function __construct() {
        parent::__construct(54, "Action Inventory");
    }

    public function open(Player $player): void {
        $player->sendMessage("Open Inventory");
    }

    public function tick(int $tick): void {
        $this->setItem(0, VanillaItems::IRON_INGOT()->setCount($tick % 64));
    }

    public function click(Player $player, int $slot, Item $sourceItem, Item $targetItem): bool {
        return $slot === 0;
    }

    public function close(Player $player): void {
        for ($i = 1; $i < $this->getSize(); $i++) {
            $item = $this->getItem($i);
            if ($item === VanillaItems::AIR()) continue;

            $player->getWorld()->dropItem($player->getLocation(), $item);
        }
    }
}