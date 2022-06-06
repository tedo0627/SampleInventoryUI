<?php

namespace tedo0627\sampleinventoryui;

use pocketmine\plugin\PluginBase;
use tedo0627\inventoryui\InventoryUI;

class SampleInventoryUI extends PluginBase {

    public function onEnable(): void {
        InventoryUI::setup($this);
        $this->getServer()->getCommandMap()->register("sampleinventoryui", new SampleInventoryCommand());
        $this->getServer()->getCommandMap()->register("sampleinventoryui", new Sample2InventoryCommand());
    }
}