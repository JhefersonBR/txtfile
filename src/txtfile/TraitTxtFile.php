<?php
namespace txtfile;

trait TraitTxtFile
{
    private function proccessHeader(){
        mb_internal_encoding('utf-8');
        $layout_headers = $this->layout->getHeaders();
        $data_headers = $this->data_headers;

        foreach ($layout_headers as $key => $field_headers) {
            $datas = $data_headers[$key];
            foreach ($datas as $data) {
                foreach ($field_headers as $field) {
                    if($field->type == TxtField::TYPE_FLOAT){
                        $value = number_format(trim($data[$field->name]), $field->float_cfg["decimals"],$field->float_cfg["decimal_separator"],$field->float_cfg["thousand_separator"]);
                    } else {
                        $value = trim($data[$field->name]);
                    }
                
                    $this->content .= $this->str_pad_unicode($this->str_pad_unicode(substr($value,0,$field->size), $field->size, $field->l_fill, STR_PAD_LEFT), $field->size, $field->r_fill, STR_PAD_RIGHT).$field->field_separator;
                }
                $this->content .= PHP_EOL;
            }
            
        }

    }

    private function proccessDetail(){
        mb_internal_encoding('utf-8');
        $layout_details = $this->layout->getDetails();
        $data = $this->data;

        foreach ($layout_details as $key => $field_details) {
            $datas = $data[$key];
            foreach ($datas as $data) {
                foreach ($field_details as $field) {
                    if($field->type == TxtField::TYPE_FLOAT){
                        $value = trim($data[$field->name]) === null ? null : number_format(trim($data[$field->name]), $field->float_cfg["decimals"],$field->float_cfg["decimal_separator"],$field->float_cfg["thousand_separator"]);
                    } else {
                        $value = trim($data[$field->name]);
                    }
                    
                    $this->content .= $this->str_pad_unicode($this->str_pad_unicode(substr($value,0,$field->size), $field->size, $field->l_fill, STR_PAD_LEFT), $field->size, $field->r_fill, STR_PAD_RIGHT).$field->field_separator;
                }

                $this->content .= PHP_EOL;
            }
        }
    }

    private function proccessFooters(){
        mb_internal_encoding('utf-8');
        $layout_footers = $this->layout->getFooters();
        $data_footers = $this->data_footers;

        foreach ($layout_footers as $key => $field_footers) {
            $datas = $data_footers[$key];
            foreach ($datas as $data) {
                
            foreach ($field_footers as $field) {
                if($field->type == TxtField::TYPE_FLOAT){
                    $value = number_format(trim($data[$field->name]), $field->float_cfg["decimals"],$field->float_cfg["decimal_separator"],$field->float_cfg["thousand_separator"]);
                } else {
                    $value = trim($data[$field->name]);
                }
                
                $this->content .= $this->str_pad_unicode($this->str_pad_unicode(substr($value,0,$field->size), $field->size, $field->l_fill, STR_PAD_LEFT), $field->size, $field->r_fill, STR_PAD_RIGHT).$field->field_separator;
            }

            $this->content .= PHP_EOL;
        }
        }
    }

    private function proccessFile(){
        if(!empty($this->layout->getHeaders()))
            $this->proccessHeader();

        $this->proccessDetail();

        if(!empty($this->layout->getFooters()))
            $this->proccessFooters();
    }

    private function str_pad_unicode($str, $pad_len, $pad_str = ' ', $dir = STR_PAD_RIGHT) {
        $str_len = mb_strlen($str);
        $pad_str_len = mb_strlen($pad_str);
        if (!$str_len && ($dir == STR_PAD_RIGHT || $dir == STR_PAD_LEFT)) {
            $str_len = 1; // @debug
        }
        if (!$pad_len || !$pad_str_len || $pad_len <= $str_len) {
            return $str;
        }
    
        $result = null;
        if ($dir == STR_PAD_BOTH) {
            $length = ($pad_len - $str_len) / 2;
            $repeat = ceil($length / $pad_str_len);
            $result = mb_substr(str_repeat($pad_str, $repeat), 0, floor($length))
                    . $str
                    . mb_substr(str_repeat($pad_str, $repeat), 0, ceil($length));
        } else {
            $repeat = ceil($str_len - $pad_str_len + $pad_len);
            if ($dir == STR_PAD_RIGHT) {
                $result = $str . str_repeat($pad_str, $repeat);
                $result = mb_substr($result, 0, $pad_len);
            } else if ($dir == STR_PAD_LEFT) {
                $result = str_repeat($pad_str, $repeat);
                $result = mb_substr($result, 0, 
                            $pad_len - (($str_len - $pad_str_len) + $pad_str_len))
                        . $str;
            }
        }
    
        return $result;
    }

    public function getContent(){
        $this->proccessFile();

        return $this->content;
    }

    public function layoutDump(){
        var_dump($this->layout);
    }

    public function save(){
        $this->proccessFile();

        file_put_contents($this->filepath.$this->filename,$this->content);
    }

    public function download(){
        $this->proccessFile();

        file_put_contents($this->filepath.$this->filename,$this->content);

        $arquivo = $this->filepath.$this->filename;

        print_r("
        <script type='txt/javascript>
            __adianti_download_file('{$arquivo}');
        </script>
        ");
    }
}