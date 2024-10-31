<?php 
/**
	Admin Page Framework v3.8.13 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/presscode>
	Copyright (c) 2013-2016, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
abstract class Pcode_AdminPageFramework_Form_Model___Modifier_Base extends Pcode_AdminPageFramework_FrameworkUtility {
}
class Pcode_AdminPageFramework_Form_Model___Modifier_FilterRepeatableElements extends Pcode_AdminPageFramework_Form_Model___Modifier_Base {
    public $aSubject = array();
    public $aDimensionalKeys = array();
    public function __construct() {
        $_aParameters = func_get_args() + array($this->aSubject, $this->aDimensionalKeys,);
        $this->aSubject = $_aParameters[0];
        $this->aDimensionalKeys = array_unique($_aParameters[1]);
    }
    public function get() {
        foreach ($this->aDimensionalKeys as $_sFlatFieldAddress) {
            $this->unsetDimensionalArrayElement($this->aSubject, explode('|', $_sFlatFieldAddress));
        }
        return $this->aSubject;
    }
}
