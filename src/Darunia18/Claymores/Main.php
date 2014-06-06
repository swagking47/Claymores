<?php

namespace Darunia18\Claymores;

use pocketmine\event\entity\EntityMoveEvent;
//use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Claymores extends PluginBase {
    //private $api;
    //private $config;
    private $claymore;
    private $explosionSize;
    private $blockDestroy;
    private $activateNearbyClaymores;
    
    public function onLoad(){
    }
    
    public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $config = $this->getConfig();
        $this->claymore = $config->get("ClaymoreBlock");
        $this->explosionSize = $config->get("ExplosionSize");
        $this->blockDestroy = $config->get("BlockDestroy");
        $this->activateNearbyClaymores = $config->get("ActivateNearbyClaymores");
        $this->getLogger()->log("Claymores has been enabled.");
	}
	
    /** 
     * @param EntityMoveEvent $data
     * 
     * @priority NORMAL
     * @ignoreCalcelled false
     */
    public function onMove(EntityMoveEvent $event){
        $pos = $event->getVector(); //Not sure if this is right
        $x = $pos->getx(); //Not sure if this is right
        $y = $pos->gety(); //Not sure if this is right
        $z = $pos->getz(); //Not sure if this is right
        
	//$claymore = $data->level->getBlock(new Vector3($data->x, ($data->y -1), $data->z));
	//if($claymore->getID() == $this->claymore){
            //if($this->blockDestroy = true){
		//$explosion = new Explosion(new Position($data->x, ($data->y -1), $data->z, $data->level), $this->explosionSize);
		//$explosion->explode();
            //}
            //else{
		//something with getting rid of explosion and doing player damage
		//$eidOfPlayer = $this->api->player->getByEID($username); DOESN'T WORK!!!
		//$attack = 1?
		//$cause = ?
		//$force = 1?
		//remove explosion somehow
		//$this->api->entity->harm($eidOfPlayer, $attack, $cause, $force);
            //}
	//}
    }
	
    public function onDisable(){
        $this->config->save();
        $this->getLogger()->log("Claymores has been disabled.");
    }
}
