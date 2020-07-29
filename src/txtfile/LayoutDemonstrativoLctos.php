<?php
namespace txtfile;
class LayoutDemonstrativoLctos extends TxtFile{

    function __construct($filename, $filepath, $data){
        
        $layout = new TxtLayout();
        
       

        $detail = [
            new TxtField("nLinha", TxtField::TYPE_INTEGER, 6, null, null, "|"),
            new TxtField("tipo_registro", TxtField::TYPE_STRING, 4, null, null, "|"),
            new TxtField("cnpj", TxtField::TYPE_INTEGER, 14, null, null, "|"),
            new TxtField("cid_cod", TxtField::TYPE_STRING, 7, "", "", "|"),
            new TxtField("nLcto", TxtField::TYPE_INTEGER, 20, null, null, "|"),
            new TxtField("data_lcto", TxtField::TYPE_STRING, 30, null, null, "|"),
            new TxtField("valor", TxtField::TYPE_INTEGER, 8, "", "", "|"),
            new TxtField("conta", TxtField::TYPE_INTEGER, 9, "", "","|"),
            new TxtField("debito_credito", TxtField::TYPE_INTEGER, 1, "", "","|"),
            new TxtField("codigo_evento", TxtField::TYPE_INTEGER, 3, "", "","|"),
            new TxtField("cod_muni_vinculado", TxtField::TYPE_INTEGER, 7, "", "","|"),
            new TxtField("historico", TxtField::TYPE_STRING, 35, "", ""),
        ];
        $layout->addDetail($detail);
        
        
        parent::__construct($filename, $filepath, $layout, $data, [], []);
    }

}