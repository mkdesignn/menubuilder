<?php

namespace Mkdesignn\MenuBuilder;


use Exception;
use Illuminate\Database\Eloquent\Model;

class FactoryMenu
{

    protected $config;

    /**
     * @param string $menu
     * @param $table
     * @param $class_name
     * @param $config
     * @return mixed
     * @throws Exception
     */
    public function render($menu = "vertical", $table, $class_name, $config = []){

        if( !$table instanceof Model ){
            throw new Exception("table should extends Model abstraction class");
        }

        $config = $this->mergeConfigs($config);

        // create vertical and horizontal menu
        if( strtolower($menu) == "vertical" || strtolower($menu) == "horizontal"){
            $menu_namespace = $this->getClassNamespace()."\\".ucfirst($menu)."Menu";
            $Imenu = new $menu_namespace();
            return $Imenu->setClassName($class_name)->setTable($table)->render($config, $menu."_menu");
        }

        // render dynamic classes
        if (class_exists($menu)) {

            $menu = new $menu();
            if( !$menu instanceof IMenu ){
                throw new Exception("class name ".$menu." should extends the Imenu abstraction class");
            } else
                return $menu->setClassName($class_name)->setTable($table)->render($config);
        } else
            throw new Exception("Class name ".$menu." does not exists");
    }


    /**
     * @param $config
     * @return array
     */
    private function mergeConfigs($config){

        return array_merge($this->config, $config);
    }

    /**
     * @return string
     */
    private function getClassNamespace(){
        $reflection = new \ReflectionClass($this);
        return $reflection->getNamespaceName();
    }

    public function setConfig($config){
        $this->config = $config;
    }

}