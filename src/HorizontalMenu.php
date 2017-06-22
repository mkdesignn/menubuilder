<?php

namespace Mkdesignn\MenuBuilder;


class HorizontalMenu extends IMenu
{


    /**
     * Create Horizontal Menu
     *
     * @param $parents
     * @param $slide_up
     * @return string
     */
    protected function create($parents, $slide_up = ''){

        $html = "";
        $html .= "<ul class='".$this->class_name." ".$slide_up."'>";

        foreach( $parents as $key => $value ){

            if( $this->table->where("parent_id", $value)->count() > 0 ){

                $html .= "<li><div class='".$this->class_name."_li'> ".
                    $this->printCheckbox($value). $this->getAnchorTag($value) .$this->removeButton($value);

                $this->changeColor("add")->changePadding("add");
                $this->level .= " - ";

                $html .= $this->create($this->table->where("parent_id", $value)->get()->pluck("id", "id"), "slideUp")."</div> </li>";

            } else {

                $html .= "<li> <div class='".$this->class_name."_li'> ".
                    $this->printCheckbox($value).$this->getAnchorTag($value).$this->removeButton($value)."</div> </li>";
            }

        }

        $this->ascendLevel();
        $this->changeColor("sub")->changePadding("sub");
        $html .= "</ul>";

        return $html;

    }


    /**
     * @param $value
     * @return string
     */
    protected function getAnchorTag($value){

        $classes = ( $this->getLiTitle($value, "classes") == null ) ? null : $this->getLiTitle($value, "classes");

        if( $classes != null )
            $classes = "<span class='".$classes."'></span>";

        $anchor_padding = $this->getAnchorPadding();
        preg_match_all('!\d+!', $anchor_padding, $padding);

        return "<a v-on:click='openChild' v-on:mouseover='mouseOver' v-on:mouseout='mouseOut' ".
        $this->getAnchorBgHoverColor($this->getAnchorBgColor($value), $value).
        "style='".$this->getAnchorBorder($value).";".$this->getAnchorBgColor($value).";".$anchor_padding.";".$this->getAnchorTextColor($value)."'
        class='".$this->class_name."_name'
        href='#'>".$classes."<span>".$this->getLiTitle($value, "name")."</span><span style='position:absolute;right:20px;'>".$this->level." ".$this->level."</span></a>";
    }
}