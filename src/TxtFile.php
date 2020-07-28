<?php
class TxtFile
{
    private $filename;
    private $filepath;
    private $layout;
    private $data           = [];
    private $data_headers   = [];
    private $data_footers   = [];
    private $content;

    use TraitTxtFile;

    function __construct($filename, $filepath, $layout, $data, $data_headers = [], $data_footers = []){
        $this->filename         = $filename;
        $this->filepath         = $filepath;
        $this->layout           = $layout;
        $this->data             = $data;
        $this->data_headers     = $data_headers;
        $this->data_footers     = $data_footers;
    }
}
