<?php

namespace Mkdesignn\MenuBuilder;


class VerticalMenu extends IMenu
{


    /**
     * Create vertical menu
     *
     * @param $parents
     * @param string $slide_up
     * @return string
     */
    protected function create($parents, $slide_up = ""){

        $html = "";
        $html .= "<ul class='".$this->class_name." ".$slide_up."'>";

        foreach( $parents as $key => $value ){

            if( $this->table->where("parent_id", $value)->count() > 0 ){

                $html .= "<li><div class='".$this->class_name."_li'> ".
                    $this->printCheckbox($value). $this->getAnchorTag($value) .$this->removeButton($value)."</div>";

                $this->changeColor("add")->changePadding("add");
                $this->level .= " - ";
                $html .= $this->create($this->table->where("parent_id", $value)->get()->pluck("id", "id"), "slideUp");
                $html .= "</li>";

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
}