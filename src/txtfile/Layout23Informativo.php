<?php
namespace txtfile;
class Layout23Informativo extends TxtFile{

    function __construct($filename, $filepath, $data_header, $data){
        
        $layout = new TxtLayout();
        
        $header = [
            new TxtField("nLinha", TxtField::TYPE_INTEGER, 6, null, null, "|"),
            new TxtField("tipo_registro", TxtField::TYPE_INTEGER, 4, null, null, "|"),
            new TxtField("cnpj", TxtField::TYPE_INTEGER, 8, null, null, "|"),
            new TxtField("razao_social", TxtField::TYPE_STRING, 100, null, null, "|"),
            new TxtField("tipo_instituicao", TxtField::TYPE_STRING, 1, "", "", "|"),
            new TxtField("cid_cod", TxtField::TYPE_INTEGER, 7, null, null, "|"),
            new TxtField("ano_mes", TxtField::TYPE_STRING, 6, "", "", "|"),
            new TxtField("ano_mes_fim", TxtField::TYPE_STRING, 6, "", "", "|"),
            new TxtField("modulo_declaracao", TxtField::TYPE_INTEGER, 1, null, null, "|"),
            new TxtField("tipo_declaracao", TxtField::TYPE_INTEGER, 1, null, null, "|"),
            new TxtField("prtc_decl_ante", TxtField::TYPE_STRING, 30, "", "", "|"),
            new TxtField("tipo_consolidacao", TxtField::TYPE_INTEGER, 1, null, null, "|"),
            new TxtField("cnpj_resp_rclh", TxtField::TYPE_INTEGER, 6, "", "", "|"),
            new TxtField("versao_desif", TxtField::TYPE_STRING, 10, "", "", "|"),
            new TxtField("tipo_arrendondamento", TxtField::TYPE_INTEGER, 1, "", ""),
        ];
        $layout->addHeader($header);

        $detail = [
            new TxtField("nLinha", TxtField::TYPE_INTEGER, 6, null, null, "|"),
            new TxtField("tipo_registro", TxtField::TYPE_STRING, 4, null, null, "|"),
            new TxtField("conta", TxtField::TYPE_STRING, 30, "", "", "|"),
            new TxtField("nome_grupo", TxtField::TYPE_STRING, 100, "", "", "|"),
            new TxtField("descr_conta", TxtField::TYPE_STRING, 600, "", "", "|"),
            new TxtField("conta_supe", TxtField::TYPE_STRING, 30, null, null, "|"),
            new TxtField("conta_cosif", TxtField::TYPE_STRING, 8, "", "", "|"),
            new TxtField("cod_trib_desif", TxtField::TYPE_STRING, 9, "", ""),
        ];
        $layout->addDetail($detail);
        
        
        parent::__construct($filename, $filepath, $layout, $data, $data_header, []);
    }

}