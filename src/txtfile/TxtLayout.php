<?php
namespace txtfile;
class TxtLayout
{
    private $details;
    private $headers;
    private $footers;   

    /**
     * Classe resposável por montar a estrutura do layout
     *
     * @param array $details
     * @param array $headers
     * @param array $footers
     */
    function __construct($details = [], $headers = [], $footers = []){
        $this->details          = $details;
        $this->headers          = $headers;
        $this->footers          = $footers;
    }

    public function addHeader(array $header){
        $this->headers[] = $header;
    }

    public function addFooter(array $footer){
        $this->footers[] = $footer;
    }

    public function addDetail(array $detail){
        $this->details[] = $detail;
    }

    public function getHeaders(){
        return $this->headers;
    }

    public function getFooters(){
        return $this->footers;
    }

    public function getDetails(){
        return $this->details;
    }

}
