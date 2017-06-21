<?php

namespace Mkdesignn\MenuBuilder;

abstract class IMenu
{

    /**
     * @var array
     */
    protected $config;

    /**
     * @var model object
     */
    protected $table;

    /**
     * @var string
     */
    protected $class_name;

    /**
     * @var string
     */
    protected $level;

    /**
     * @var string
     */
    protected $render_type;

    /**
     * Store config value for temp
     *
     * @var null
     */
    private static $config_value = null;

    /**
     * @param string $render_type
     * @param array $config
     * @return mixed
     */
    public function render($render_type = "vertical", $config = []){

        $this->render_type = $render_type;

        $parents = $this->table->where("parent_id", 0)->get()->pluck("id", "id");

        if( count($config) > 0 )
            $this->setConfig($config);

        return $this->create($parents, $render_type);
    }

    /**
     * @param $parents
     * @param $render_type
     * @return mixed
     */
    abstract protected function create($parents, $render_type);

    /**
     * using this method to set a class selector for the html ul tag
     * @param $class_name
     * @return $this
     */
    public function setClassName($class_name){
        $this->class_name = $class_name;
        return $this;
    }

    /**
     * get Li title|name|... using table row id and the field name
     * @param $row_id
     * @param $field_name
     * @return mixed
     */
    protected function getLiTitle($row_id, $field_name){
        if( $this->table->whereId($row_id)->first()->{$field_name} == null )
            return null;
        else
            return $this->table->whereId($row_id)->first()->{$field_name};
    }


    /**
     * @param $config
     * @param $name
     * @return mixed
     */
    protected function getConfig($config, $name){

        // reset the config_value
        if( $name != self::$config_value && self::$config_value != null )
            self::$config_value = null;

        foreach( $config as $key => $value ){

            if( $key == $name ){
                if( $value == null )
                    self::$config_value = "";
                else
                    self::$config_value = $value;
            }

            if( is_array($value) ){
                if( self::$config_value == null )
                    $this->getConfig( $value, $name);
            }
        }

        return self::$config_value;
    }

    /**
     * @param $table
     * @return $this
     */
    public function setTable($table){
        $this->table = $table;
        return $this;
    }

    /**
     * @param $config
     */
    public function setConfig($config){
        $this->config = $config;
    }

}
