<?php
namespace txtfile;
class Layout22DemonstrativoAnual extends TxtFile{

    function __construct($filename, $filepath, $data_header, $data, $data_footer){
        
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
            new TxtField("prtc_decl_ante", TxtField::TYPE_STRING, 30, null, null, "|"),
            new TxtField("tipo_consolidacao", TxtField::TYPE_STRING, 1, null, null, "|"),
            new TxtField("cnpj_resp_rclh", TxtField::TYPE_STRING, 6, null, null, "|"),
            new TxtField("versao_desif", TxtField::TYPE_STRING, 10, "", "", "|"),
            new TxtField("tipo_arrendondamento", TxtField::TYPE_INTEGER, 1, "", ""),
        ];
        //0000
        $layout->addHeader($header);

        $header = [
            new TxtField("nLinha", TxtField::TYPE_INTEGER, 6, null, null, "|"),
            new TxtField("tipo_registro", TxtField::TYPE_INTEGER, 4, null, null, "|"),
            new TxtField("inscr_municipal", TxtField::TYPE_INTEGER, 15, "", "", "|"),
            /*Indica se Inscrição Municipal foi
            informada no campo Cod_Depe:
            1 – Inscrição Municipal
            2 – Código interno da Instituição*/
            new TxtField("indr_insc_munl", TxtField::TYPE_INTEGER, 1, null, null, "|"),

            /* Identificação da dependência composta
            dos 6 últimos algarismos do CNPJ da
            dependência, inclusive com dígito
            verificador e sem máscara de
            formatação. */
            new TxtField("cnpj_Proprio", TxtField::TYPE_INTEGER, 6, "", "", "|"),
            
            /* Tipo 2 */
            new TxtField("tipo_depe", TxtField::TYPE_INTEGER, 1, null, null, "|"),

            /* Endereço*/
            new TxtField("endereco", TxtField::TYPE_STRING, 100, "", "", "|"),

            /* Identificação da dependência composta
            dos 6 últimos algarismos do CNPJ da
            dependência responsável pela
            contabilidade.  */
            new TxtField("cnpj_unif", TxtField::TYPE_INTEGER, 6, null, null, "|"),

            /* Código do município onde está
            estabelecida a dependência unificadora
            (CNPJ_Unif).  */
            new TxtField("cid_cod", TxtField::TYPE_INTEGER, 7, null, null, "|"),

            /* Identifica se declarante possui
            contabilidade própria:
            1 – Sim
            2 – Não
            */
            new TxtField("ctbl_propria", TxtField::TYPE_STRING, 1, "", "", "|"),

            /*Data válida.
            Preencher somente quando se tratar de
            declaração do módulo de apuração
            mensal do ISSQN.
            Deve ser anterior à
            Ano_Mes_Fim_Cmpe do Registro de
            Identificação da declaração.
            Formato:
            aaaammdd
            */
            new TxtField("dat_inic_para", TxtField::TYPE_STRING, 8, "", "", "|"),

            /*Data válida.
            Preencher somente quando se tratar de
            declaração do módulo de apuração
            mensal do ISSQN.
            Preenchido somente se Dat_Inic_Para
            for informada e se for o mês de
            encerramento da paralisação.
            Deve ser superior a Dat_Inic_Para
            Deve ser anterior a
            Ano_Mes_Fim_Cmpe do Registro de
            Identificação da declaração.
            Diferença entre Dat_Inic_Para e
            Dat_Fim_Para não pode ser superior a
            180 dias.
            Formato:
            aaaammdd
            */
            new TxtField("dat_fim_para", TxtField::TYPE_STRING, 8, "", ""),
        ];
        //0400
        $layout->addHeader($header);

        $detail = [
            new TxtField("nLinha", TxtField::TYPE_INTEGER, 6, null, null, "|"),
            new TxtField("tipo_registro", TxtField::TYPE_INTEGER, 4, null, null, "|"),
            new TxtField("inscr_municipal", TxtField::TYPE_STRING, 15, "", "", "|"),
            new TxtField("ano_mes_cmpe", TxtField::TYPE_STRING, 6, "", "", "|"),
            new TxtField("conta", TxtField::TYPE_STRING, 15, "", "", "|"),
            new TxtField("sald_inic", TxtField::TYPE_FLOAT, 16, null, null, "|", ["thousand_separator" => "", "decimal_separator" => ",", "decimals" => 2]),            
            new TxtField("valr_debt", TxtField::TYPE_FLOAT, 16, null, null, "|", ["thousand_separator" => "", "decimal_separator" => ",", "decimals" => 2]),            
            new TxtField("valr_cred", TxtField::TYPE_FLOAT, 16, null, null, "|", ["thousand_separator" => "", "decimal_separator" => ",", "decimals" => 2]),            
            new TxtField("sald_final", TxtField::TYPE_FLOAT, 16, null, null, "", ["thousand_separator" => "", "decimal_separator" => ",", "decimals" => 2]),            
            
        ];
        //0410
        $layout->addDetail($detail);
        
                
        
        parent::__construct($filename,$filepath,$layout, $data, $data_header, $data_footer);
    }

}