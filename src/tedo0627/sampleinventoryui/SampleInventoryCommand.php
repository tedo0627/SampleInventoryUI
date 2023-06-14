<?php

namespace tedo0627\sampleinventoryui;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use tedo0627\inventoryui\CustomInventory;

class SampleInventoryCommand extends Command {

    public function __construct() {
        parent::__construct("sampleinventory", "Open inventory command", "/sampleinventory [slot] [length] [name]", []);
        $this->setPermission("sampleinventoryui.command.sampleinventory");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args) {
        if (!$sender instanceof Player) return false;

        if (count($args) < 3) {
            $sender->sendMessage($this->getUsage());
            return false;
        }

        $slot = intval($args[0]);
        $length = intval($args[1]);

        $name = "";
        for ($i = 2; $i < count($args); $i++) {
            $name .= $args[$i];
        }

        if ($slot <= 0 || $length <= 0 || 6 < $length) {
            $sender->sendMessage($this->getUsage());
            return false;
        }

        $sender->setCurrentWindow(new CustomInventory($slot, $name, $length));
        return true;
    }
}