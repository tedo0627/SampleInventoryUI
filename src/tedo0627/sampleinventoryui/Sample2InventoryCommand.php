<?php

namespace tedo0627\sampleinventoryui;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;

class Sample2InventoryCommand extends Command {

    public function __construct() {
        parent::__construct("sampleinventory2", "Open inventory command", "/sampleinventory2", []);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender instanceof Player) return false;

        $sender->setCurrentWindow(new ActionInventory());
        return true;
    }
}