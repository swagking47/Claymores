<?php

namespace Darunia18\Claymores;

use pocketmine\event\entity\EntityMoveEvent;
use pocketmine\event\Listener;
use pocketmine\level;
use pocketmine\level\Explosion;
use pocketmine\level\Position;
use pocketmine\plugin\PluginBase;
use pocketmine\player;

class Main extends PluginBase implements Listener{
    private $claymore;
    private $explosionSize;
    private $blockDestroy;
    private $activateNearbyClaymores;
    private $claymore1
    private $fire
    
    public function onLoad(){
    }
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = $this->getConfig();
        $this->claymore = $config->get("ClaymoreBlock");
        $this->explosionSize = $config->get("ExplosionSize");
        $this->blockDestroy = $config->get("BlockDestroy");
        $this->claymore1 = $config->get("ClaymoreBlock1");
        $this->fire = $config->get("firesecs");
        $this->activateNearbyClaymores = $config->get("ActivateNearbyClaymores");
        
        $this->getLogger()->info("Claymores has been enabled.");
	}
	
    /** 
     * @param EntityMoveEvent $data
     * 
     * @priority NORMAL
     * @ignoreCalcelled false
     */
    public function onMove(EntityMoveEvent $event){
        $entity = $event->getEntity();
        $claymore = $entity->getLevel()->getBlockIdAt($entity->x, ($entity->y -1), $entity->z);
	if($claymore == $this->claymore){
            if($this->blockDestroy = true){
		$explosion = new Explosion(new Position($entity->x, ($entity->y -1), $entity->z, $entity->getLevel()), $this->explosionSize);
                $explosion->explode();
            }
	}
            if($claymore == $this->claymore1){
            $entity->setOnFire($this->fire * 20)  
              }
	}
	
    public function onDisable(){
        $this->getLogger()->info("Claymores has been disabled.");
    }
}
