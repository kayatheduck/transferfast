<?php

namespace lobby;

use pocketmine\Server;
use pocketmine\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\event\Listener;
use pocketmine\event\server\ServerCommandEvent;
use pocketmine\event\player\PlayerCommandPreprocessEvent;

use alemiz\sga\StarGateAtlantis;

class main extends PluginBase implements Listener {

    public function onEnable(): void {
        $this->getServer()->getPluginManager()->registerEvents(($this), $this);
    }

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args): bool {
        if($cmd->getName() == "lobby") {
            if(!($sender instanceof Player)){
                $sender->sendMessage("§cThis command can be used in-game only", false);
                return true;
            }
            if(!isset($args[0])){
                $sender->sendMessage("§cYou need to specify what game you want to play");
                return true;
            }
            StarGateAtlantis::getInstance()->transferPlayer($sender->getName(), $args[0]);
        }
        return true;
    }
}
