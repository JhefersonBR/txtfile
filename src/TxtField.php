<?php
namespace TxtFile;
class TxtField
{
    public $name;
    public $type;
    public $size;
    public $l_fill;
    public $r_fill;
    public $field_separator;
    public $float_cfg;

    const TYPE_INTEGER = 'I';
    const TYPE_FLOAT = 'F';
    const TYPE_STRING = 'S';

    public function __construct($name, $type, $size, $l_fill = null, $r_fill = null, $field_separator = null, $float_cfg = ["thousand_separator" => "", "decimal_separator" => "", "decimals" => 2])
    {
        $this->name = $name;
        $this->type = $type;
        $this->size = $size;

        if (($type == TxtField::TYPE_STRING) && $l_fill === null && $r_fill === null) {
            $this->l_fill = $l_fill;
            $this->r_fill = ' ';
        }
        else if (($type == TxtField::TYPE_INTEGER) && $l_fill === null && $r_fill === null) {
            $this->l_fill = '0';
            $this->r_fill = $r_fill;
        }
        else if (($type == TxtField::TYPE_FLOAT) && $l_fill === null && $r_fill === null) {
            $this->l_fill = '0';
            $this->r_fill = $r_fill;
        }
        else{
            $this->l_fill = $l_fill;
            $this->r_fill = $r_fill;
        }
        $this->field_separator = $field_separator;
        $this->float_cfg = $float_cfg;
    }
}
