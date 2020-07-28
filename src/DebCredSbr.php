<?php
/**
 * Undocumented class
 */
namespace TxtFile;
class DebCredSbr extends TxtFile{

    function __construct($filename, $filepath, $data_header, $data, $data_footer){
        
        $layout = new TxtLayout();
        
        $header = [
            new TxtField("tipo_registro", TxtField::TYPE_INTEGER,1),
            new TxtField("tipo_arquivo", TxtField::TYPE_INTEGER,1),
            new TxtField("banco", TxtField::TYPE_INTEGER,3),
            new TxtField("agencia", TxtField::TYPE_INTEGER,4),
            new TxtField("cod_empresa", TxtField::TYPE_INTEGER,7),
            new TxtField("ident_empresa", TxtField::TYPE_STRING,10),
            new TxtField("cod_movi", TxtField::TYPE_INTEGER,2),
            new TxtField("dest_movi", TxtField::TYPE_INTEGER,2),
            new TxtField("dt_movi", TxtField::TYPE_STRING,8),
            new TxtField("branco", TxtField::TYPE_STRING,162),
        ];
        $layout->addHeader($header);

        $layout->addDetailField(new TxtField("tipo_registro", TxtField::TYPE_INTEGER,1));
        $layout->addDetailField(new TxtField("tipo_movi", TxtField::TYPE_INTEGER,1));
        $layout->addDetailField(new TxtField("ident_clien", TxtField::TYPE_INTEGER,10));
        $layout->addDetailField(new TxtField("nome_clien", TxtField::TYPE_STRING,40));
        $layout->addDetailField(new TxtField("cgc", TxtField::TYPE_INTEGER,14));
        $layout->addDetailField(new TxtField("ident_oper", TxtField::TYPE_STRING,12));
        $layout->addDetailField(new TxtField("n_parc", TxtField::TYPE_INTEGER,3));
        $layout->addDetailField(new TxtField("ident_clien_emp", TxtField::TYPE_STRING,20));
        $layout->addDetailField(new TxtField("n_doc", TxtField::TYPE_STRING,10));
        $layout->addDetailField(new TxtField("valor", TxtField::TYPE_FLOAT,17));
        $layout->addDetailField(new TxtField("filer", TxtField::TYPE_STRING,10));
        $layout->addDetailField(new TxtField("filer2", TxtField::TYPE_INTEGER,3));
        $layout->addDetailField(new TxtField("tarifa_estorno", TxtField::TYPE_STRING,1));
        $layout->addDetailField(new TxtField("filer3", TxtField::TYPE_STRING,40));
        $layout->addDetailField(new TxtField("branco", TxtField::TYPE_STRING,18));
 
        $footer = [
            new TxtField("tipo_registro", TxtField::TYPE_INTEGER,1),
            new TxtField("qnt_deb", TxtField::TYPE_INTEGER,5),
            new TxtField("total_deb", TxtField::TYPE_FLOAT,17),
            new TxtField("qnt_cred", TxtField::TYPE_INTEGER,5),
            new TxtField("total_cred", TxtField::TYPE_FLOAT,17),
            new TxtField("branco", TxtField::TYPE_STRING,155),
        ];
        $layout->addFooter($footer);

        
        
        parent::__construct($filename,$filepath,$layout, $data, [$data_header], [$data_footer]);
    }

}