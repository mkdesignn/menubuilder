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
     * Store config value for temp
     *
     * @var null
     */
    private static $config_value = null;

    protected $colors = [

        "IndianRed"=>"CD5C5C",
        "LightCoral"=>	"F08080",
        "Salmon"=>	"FA8072",
        "DarkSalmon"=>	"E9967A",
        "LightSalmon"=>	"FFA07A",
        "Crimson"=>	"DC143C",
        "Red"=>	"FF0000",
        "FireBrick"=>	"B22222",
        "DarkRed"=>	"8B0000",
        "Pink"=>	"FFC0CB",
        "LightPink"=>	"FFB6C1",
        "HotPink"=>	"FF69B4",
        "DeepPink"=>	"FF1493",
        "MediumVioletRed"=>	"C71585",
        "PaleVioletRed"=>"DB7093",
        "LightSalmon"=>"FFA07A",
        "Coral"=>"FF7F50",
        "Tomato"=>	"FF6347",
        "OrangeRed"=>	"FF4500",
        "DarkOrange"=>	"FF8C00",
        "Orange"=>	"FFA500",
        "Gold"=>	"FFD700",
        "Yellow"=>	"FFFF00",
        "LightYellow"=>	"FFFFE0",
        "LemonChiffon"=>	"FFFACD",
        "LightGoldenrodYellow"=>	"FAFAD2",
        "PapayaWhip"=>	"FFEFD5",
        "Moccasin"=>	"FFE4B5",
        "PeachPuff"	=>"FFDAB9",
        "PaleGoldenrod"=>	"EEE8AA",
        "Khaki"	=>"F0E68C",
        "DarkKhaki"=>"BDB76B",
        "Lavender"=>"E6E6FA",
        "Thistle"=>"D8BFD8",
        "Plum"=>"DDA0DD",
        "Violet"=>"EE82EE",
        "Orchid"=>"DA70D6",
        "Fuchsia"=>"FF00FF",
        "Magenta"=>"FF00FF",
        "MediumOrchid"=>"BA55D3",
        "MediumPurple"=>"9370DB",
        "Amethyst"=>"9966CC",
        "BlueViolet"=>"8A2BE2",
        "DarkViolet"=>"9400D3",
        "DarkOrchid"=>"9932CC",
        "DarkMagenta"=>"8B008B",
        "Purple"=>"800080",
        "Indigo"=>"4B0082",
        "SlateBlue"=>"6A5ACD",
        "DarkSlateBlue"=>"483D8B",
        "MediumSlateBlue"=>"7B68EE",
        "GreenYellow"=>"ADFF2F",
        "Chartreuse"=>"7FFF00",
        "LawnGreen"=>"7CFC00",
        "Lime"=>"00FF00",
        "LimeGreen"=>"32CD32",
        "PaleGreen"=>"98FB98",
        "LightGreen"=>"90EE90",
        "MediumSpringGreen"=>"00FA9A",
        "SpringGreen"=>"00FF7F",
        "MediumSeaGreen"=>"3CB371",
        "SeaGreen"=>"2E8B57",
        "ForestGreen"=>"228B22",
        "Green"=>"008000",
        "DarkGreen"=>"006400",
        "YellowGreen"=>"9ACD32",
        "OliveDrab"=>"6B8E23",
        "Olive"=>"808000",
        "DarkOliveGreen"=>"556B2F",
        "MediumAquamarine"=>"66CDAA",
        "DarkSeaGreen"=>"8FBC8F",
        "LightSeaGreen"=>"20B2AA",
        "DarkCyan"=>"008B8B",
        "Teal"=>"008080",
        "Aqua"=>"00FFFF",
        "Cyan"=>"00FFFF",
        "LightCyan"=>"E0FFFF",
        "PaleTurquoise"=>"AFEEEE",
        "Aquamarine"=>"7FFFD4",
        "Turquoise"=>"40E0D0",
        "MediumTurquoise"=>"48D1CC",
        "DarkTurquoise"=>"00CED1",
        "CadetBlue"=>"5F9EA0",
        "SteelBlue"=>"4682B4",
        "LightSteelBlue"=>"B0C4DE",
        "PowderBlue"=>"B0E0E6",
        "LightBlue"=>"ADD8E6",
        "SkyBlue"=>"87CEEB",
        "LightSkyBlue"=>"87CEFA",
        "DeepSkyBlue"=>"00BFFF",
        "DodgerBlue"=>"1E90FF",
        "CornflowerBlue"	=>"6495ED",
        "MediumSlateBlue"	=>"7B68EE",
        "RoyalBlue"	=>"4169E1",
        "Blue"	=>"0000FF",
        "MediumBlue"=>	"0000CD",
        "DarkBlue"=>"00008B",
        "Navy"=>"000080",
        "MidnightBlue"=>"191970",
        "Cornsilk"=>"FFF8DC",
        "BlanchedAlmond"=>"FFEBCD",
        "Bisque"=>"FFE4C4",
        "NavajoWhite"=>"FFDEAD",
        "Wheat"=>"F5DEB3",
        "BurlyWood"=>"DEB887",
        "Tan"=>"D2B48C",
        "RosyBrown"=>"BC8F8F",
        "SandyBrown"=>"F4A460",
        "Goldenrod"=>"DAA520",
        "DarkGoldenrod"=>"B8860B",
        "Peru"=>"CD853F",
        "Chocolate"=>"D2691E",
        "SaddleBrown"=>	"8B4513",
        "Sienna"=>	"A0522D",
        "Brown"	=>"A52A2A",
        "Maroon"	=>"800000",
        "White"=>	"FFFFFF",
        "Snow"=>	"FFFAFA",
        "Honeydew"	=>"F0FFF0",
        "MintCream"=>	"F5FFFA",
        "Azure"	=>"F0FFFF",
        "AliceBlue"=>	"F0F8FF",
        "GhostWhite"=>	"F8F8FF",
        "WhiteSmoke"=>	"F5F5F5",
        "Seashell"	=>"FFF5EE",
        "Beige"	=>"F5F5DC",
        "OldLace"=>	"FDF5E6",
        "FloralWhite"=>	"FFFAF0",
        "Ivory"	=>"FFFFF0",
        "AntiqueWhite"=>	"FAEBD7",
        "Linen"	=>"FAF0E6",
        "LavenderBlush"=>	"FFF0F5",
        "MistyRose"=>	"FFE4E1",
        "Gainsboro"	=>"DCDCDC",
        "LightGrey"=>	"D3D3D3",
        "Silver"	=>"C0C0C0",
        "DarkGray"=>	"A9A9A9",
        "Gray"	=>"808080",
        "DimGray"=>	"696969",
        "LightSlateGray"=>	"778899",
        "SlateGray"=>	"708090",
        "DarkSlateGray"	=>"2F4F4F",
        "Black"	=>"000000"

    ];

    protected $brightness = 0;

    protected $link_bg_color;

    protected $link_padding = null;

    protected static $testy = [];

    protected $convertHex;

    /**
     * @param array $config
     * @return mixed
     */
    public function render($config = [], $menu_type){

        $this->convertHex = new ConvertHex();

        $parents = $this->table->where("parent_id", 0)->get()->pluck("id", "id");

        // set config
        if( count($config) > 0 )
            $this->setConfig($config);

        // set class name
        if( $this->class_name == null )
            $this->class_name = "mk_menu";

//        return $this->create($parents);
        return "<div class='mk_menu_wrapper ".$menu_type."' style='background:".
        $this->getConfig($this->config, "background").";direction:".$this->getConfig($this->config, "direction")
        .";font-family:".$this->getConfig($this->config, "font-family")."'>".$this->create($parents)."</div>";
    }

    /**
     * @param $parents
     * @param $slide_up
     * @return mixed
     */
    abstract protected function create($parents, $slide_up = '');

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

    /**
     * @param $value
     * @return string
     */
    protected function getAnchorTag($value){

        // get all the classes of the database
        $classes = ( $this->getLiTitle($value, "classes") == null ) ? "" : "<span class='".$this->getLiTitle($value, "classes")."'></span>";

        $anchor_padding = $this->getAnchorPadding();
        preg_match_all('!\d+!', $anchor_padding, $padding);

        if( $anchor_padding == null || $anchor_padding == "0px" ){
            $this->level = '';
        }

        //$this->level." ".$this->level
        return "<a v-on:click='openChild' v-on:mouseover='mouseOver' v-on:mouseout='mouseOut' ".
        $this->getAnchorBgHoverColor($this->getAnchorBgColor($value), $value).
        "style='".$this->getAnchorBorder($value).";".$this->getAnchorBgColor($value).";".$anchor_padding.";".$this->getAnchorTextColor($value)."'
        class='".$this->class_name."_name'
        href='#'>".$classes."<span>".$this->getLiTitle($value, "name")."</span><span style='position:absolute;right:20px;'></span></a>";
    }

    /**
     * get anchor hover
     * @param $anchor_back_color
     * @param $id
     * @return string
     */
    protected function getAnchorBgHoverColor( $anchor_back_color, $id ){

        if( $this->getLiTitle($id, "bg_hover_color") != null )
            return "hover='".$this->getLiTitle($id, "bg_hover_color")."'";

        if( $anchor_back_color != null ) {
            $hover = $this->getConfig($this->config, "hover");
            if( $hover != null ){
                if( is_int($hover) || is_float($hover) ){
                    return "hover='".$this->convertHex->colourBrightness(str_replace("background:", "", $anchor_back_color), $hover)."'";
                } else {

                    if( isset($this->colors[ucfirst($hover)]) ){
                        return "hover='".$hover."'";
                    }
                }
            }
        }

    }

    /**
     * @param $id
     * @return string
     */
    protected function getAnchorBgColor($id){

        // if the are any backgroundColor field then we can use it as a background color for the
        // current li
        $bg_color = $this->getLiTitle($id, 'bg_color');
        if( $bg_color != null ){

            if( str_contains($bg_color, "gradient") )
                return "background:".$bg_color;

            if( str_contains($bg_color, "#") )
                return "background:".$bg_color;

            if( is_numeric($bg_color) )
                return  "background:#".$bg_color;


            if( isset($this->colors[ ucfirst($bg_color) ]) )
                return "background:#".$this->colors[ ucfirst($this->getLiTitle($id, 'bg_color')) ];

        }

        // this is the first li
        if( $this->link_bg_color == null ){
            if( $this->getConfig($this->config, "background") != null ){
                $background_color = $this->getConfig($this->config, "background");
                return "background:".$background_color;
            }
        }else
            return "background:".$this->link_bg_color;
    }

    /**
     * @return string
     */
    protected function getAnchorPadding(){

        if( $this->link_padding != null )
            return "padding-right:".$this->link_padding."px";
        else{
            if( $this->getConfig($this->config, "padding") != null )
                return "padding-right:".(int)$this->getConfig($this->config, "padding")."px";
        }
    }

    /**
     * @param $value
     * @return string
     */
    protected function getAnchorBorder($value){
        if( $this->getConfig($this->config, "border") != null ){
            return "border-right:".$this->getConfig($this->config, "border")." solid ".$this->getLiTitle($value, "color");
        }
    }

    /**
     * @param $id
     * @return string
     */
    protected function getAnchorTextColor($id){

        $anchor_color = $this->getLiTitle($id, 'text_color');
        if( $anchor_color != null )
            return "color:".$anchor_color;

        if( $this->getConfig($this->config, "color") != null ){
            return "color:".$this->getConfig($this->config, "color");
        }

    }

    /**
     * Make the color darker or ligher base on the background
     *
     * @param $temp
     * @return $this
     */
    protected function changeColor($temp){

        $brightness = null;

        // background color and brightness should not be null to use this feature
        if( $this->getConfig($this->config, "background") != null && $this->getConfig($this->config, "brightness") != null){

            // change color add to lighter or add to darker
            if( $temp == "add" ){

                if( $this->brightness == null )
                    $this->brightness = $this->getConfig($this->config, "brightness");
                else{
                    $this->brightness = $this->brightness + ($this->getConfig($this->config, "brightness"));
                }

                self::$testy[] = $this->brightness." add";
            }

            //
            else{
                if( $this->brightness == null )
                    $this->brightness = $this->getConfig($this->config, "brightness");
                else{
                    $this->brightness = $this->brightness - ($this->getConfig($this->config, "brightness"));
                }

                self::$testy[] = $this->brightness." sub";
            }

            // brightness will become 0 if goes one step and back one step
            // so to avoid this situation we should fill the link_bg_color with the wrapper background color
            if( $this->brightness == 0 ){
                $this->link_bg_color = $this->getConfig($this->config, "background");
            }
            else{
                $this->link_bg_color = $this->convertHex->colourBrightness($this->getConfig($this->config, "background"), $this->brightness);
            }
        }


        return $this;
    }


    /**
     * @param $temp
     * @return $this
     */
    protected function changePadding($temp){

        if( $this->getConfig($this->config, "padding") == null ) {
            $this->link_padding = null;
        } else {

            // initiate the padding
            if( $this->link_padding == null )
                $this->link_padding = $this->getConfig($this->config, "padding");

            if( $temp == "add" )
                $this->link_padding += $this->getConfig($this->config, "padding");
            else
                $this->link_padding -= $this->getConfig($this->config, "padding");
        }

        return $this;
    }


    /**
     * @param $value
     * @return string
     */
    protected function printCheckbox($value){
        if( $this->getConfig($this->config, "checkbox") == true ){
            return '<div class="checkbox checkbox-info" style="margin:0px;"><input id="'.$value.'" value="'.$value.'" class="styled" name="tag_id[]" type="checkbox">'.
            '<label for="'.$value.'">'.
            '</label>'.
            '</div>';
        }
    }


    /**
     *
     */
    protected function ascendLevel(){
        $level = explode(' ', $this->level);
        unset($level[count($level)-1]);
        unset($level[count($level)-1]);
        $this->level = implode(" ", $level);
    }

    /**
     * @param $id
     * @return string
     */
    protected function removeButton($id){
        if( $this->getConfig($this->config, "delete_button") == true ){
            return "<a v-on:click='showAlarm(".$id.")' class='remove_tag' id='".$id."' href='#'><span class='icomoon-uniE026'></span></a>";
        }
    }

}
