<?php
include("../models/db_conexion.php");
$agenteListPinturas = "CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
WHEN 'CP'
THEN 
'PV CAPU'
WHEN 'CT'
THEN 
'PV ACATEPEC'
WHEN 'SA'
THEN 
'PV SAN MANUEL'
WHEN 'SA'
THEN 
'PV SAN MANUEL'
WHEN 'MA'
THEN 
'PV MAYORAZGO'
WHEN 'NO'
THEN 
'PV NORTE'
WHEN 'CH'
THEN 
'PV CHOLULA'
WHEN 'XO'
THEN 
'PV XONACA'
WHEN 'RE'
THEN 
'PV REFORMA'
WHEN 'VE'
THEN 
'PV VERGEL'
WHEN 'GO'
THEN 
'PV SANTIAGO'
WHEN 'DI'
THEN 
'PV DIAGONAL'
WHEN 'DG'
THEN 
'PV VERGEL'
WHEN 'MY'
THEN 
'PV MAYORAZGO'
WHEN 'VG'
THEN 
'PV VERGEL'
WHEN 'XN'
THEN 
'PV XONACA'
WHEN 'RF'
THEN
 'PV REFORMA'
WHEN 'TR'
THEN 
  'PV TORRES'
WHEN 'SG'
THEN 
  'PV SANTIAGO'
WHEN 'SM'
THEN 
  'PV SAN MANUEL'

WHEN 'CI'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END 
WHEN 'AC'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
WHEN 'CM'
THEN    
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
WHEN 'TD'
THEN
CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  

WHEN 'CD'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
WHEN 'PB'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
WHEN 'ND'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DE'
   THEN
       CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
              acla.CVALORCLASIFICACION
           ELSE
              agen2.CNOMBREAGENTE
           END  
       ELSE
          agen.CNOMBREAGENTE
       END
   WHEN 'CR'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'FA'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
         acla.CVALORCLASIFICACION
       ELSE
           agen.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
ELSE
   CASE agen.CNOMBREAGENTE
   WHEN '(Ninguno)'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
          acla.CVALORCLASIFICACION
 
       ELSE
           agen2.CNOMBREAGENTE
       END
   ELSE
       agen.CNOMBREAGENTE
   END
END";

$agenteListDekkerlab = "CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
WHEN 'CA'
THEN 
'PV CAPU'
WHEN 'CT'
THEN 
'PV ACATEPEC'
WHEN 'RM'
THEN
 'PV REFORMA'
WHEN 'TO'
THEN 
  'PV TORRES'
WHEN 'SN'
THEN 
      CASE agen.CNOMBREAGENTE
      WHEN 'ALBERTO YIZARK GONZALEZ AVILES'
      THEN
           'ALBERTO YIZARK GONZALEZ AVILES'
      WHEN 'IVAN HERRERA PEREZ'
      THEN
           'IVAN HERRERA PEREZ'
      ELSE
            'MOSTRADOR SAN MANUEL'
      END
WHEN 'ST'
THEN 
      CASE agen.CNOMBREAGENTE
      WHEN 'GABRIEL GARDUÑO GARCIA'
      THEN
           'GABRIEL GARDUÑO GARCIA'
      ELSE
            'MOSTRADOR SANTIAGO'
END
WHEN 'MY'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DT'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
        CASE acla.CVALORCLASIFICACION
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               acla.CVALORCLASIFICACION
           END
       ELSE
           CASE agen2.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen2.CNOMBREAGENTE
           END
       END
       WHEN 'DV'
       THEN
           CASE agen.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
            CASE agen2.CNOMBREAGENTE
            WHEN '(Ninguno)'
            THEN 
               CASE acla.CVALORCLASIFICACION
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   acla.CVALORCLASIFICACION
               END
            ELSE
                agen2.CNOMBREAGENTE
            END
           ELSE
               agen.CNOMBREAGENTE
           END
       WHEN 'NC'
       THEN
           CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
            CASE acla.CVALORCLASIFICACION
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   acla.CVALORCLASIFICACION
               END
           ELSE
               CASE agen2.CNOMBREAGENTE
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   agen2.CNOMBREAGENTE
               END
           END
   WHEN 'FC'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
       CASE agen2.CNOMBREAGENTE
        WHEN 'RODOLFO ROMERO CARPINTEYRO'
        THEN
        'PV REFORMA'
        WHEN 'MIROSLAVA PEREZ LIRA'
        THEN
        'MOSTRADOR SANTIAGO'
        WHEN 'PAULA ZEPEDA ARCE'
        THEN
        'PV CAPU'
        WHEN 'ANA LAURA SANCHEZ MARTINEZ'
        THEN
        'PV TORRES'
        WHEN '(Ninguno)'
            THEN
             CASE acla.CVALORCLASIFICACION
                WHEN 'RODOLFO ROMERO CARPINTEYRO'
                THEN
                'PV REFORMA'
                WHEN 'MIROSLAVA PEREZ LIRA'
                THEN
                'MOSTRADOR SANTIAGO'
                WHEN 'PAULA ZEPEDA ARCE'
                THEN
                'PV CAPU'
                WHEN 'ANA LAURA SANCHEZ MARTINEZ'
                THEN
                'PV TORRES'
                ELSE
                    acla.CVALORCLASIFICACION
                END
            ELSE
                agen2.CNOMBREAGENTE
            END
       
       ELSE
           CASE agen.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen.CNOMBREAGENTE
           END
       END
   ELSE
        CASE agen.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen.CNOMBREAGENTE
           END
   END
WHEN 'IN'
THEN
   CASE SUBSTRING(adoc.CSERIEDOCUMENTO,1,2)
   WHEN 'DT'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
        CASE acla.CVALORCLASIFICACION
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               acla.CVALORCLASIFICACION
           END
       ELSE
           CASE agen2.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen2.CNOMBREAGENTE
           END
       END
       WHEN 'DV'
       THEN
           CASE agen.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
            CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
            THEN 
               CASE acla.CVALORCLASIFICACION
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   acla.CVALORCLASIFICACION
               END
            ELSE
                agen2.CNOMBREAGENTE
            END
           ELSE
               agen.CNOMBREAGENTE
           END
       WHEN 'NC'
       THEN
           CASE agen2.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
            CASE acla.CVALORCLASIFICACION
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   acla.CVALORCLASIFICACION
               END
           ELSE
               CASE agen2.CNOMBREAGENTE
               WHEN 'RODOLFO ROMERO CARPINTEYRO'
               THEN
               'PV REFORMA'
               WHEN 'MIROSLAVA PEREZ LIRA'
               THEN
               'MOSTRADOR SANTIAGO'
               WHEN 'PAULA ZEPEDA ARCE'
               THEN
               'PV CAPU'
               WHEN 'ANA LAURA SANCHEZ MARTINEZ'
               THEN
               'PV TORRES'
               ELSE
                   agen2.CNOMBREAGENTE
               END
           END
   WHEN 'FC'
   THEN
   CASE agen.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
       CASE agen2.CNOMBREAGENTE
        WHEN 'RODOLFO ROMERO CARPINTEYRO'
        THEN
        'PV REFORMA'
        WHEN 'MIROSLAVA PEREZ LIRA'
        THEN
        'MOSTRADOR SANTIAGO'
        WHEN 'PAULA ZEPEDA ARCE'
        THEN
        'PV CAPU'
        WHEN 'ANA LAURA SANCHEZ MARTINEZ'
        THEN
        'PV TORRES'
        WHEN '(Ninguno)'
            THEN
             CASE acla.CVALORCLASIFICACION
                WHEN 'RODOLFO ROMERO CARPINTEYRO'
                THEN
                'PV REFORMA'
                WHEN 'MIROSLAVA PEREZ LIRA'
                THEN
                'MOSTRADOR SANTIAGO'
                WHEN 'PAULA ZEPEDA ARCE'
                THEN
                'PV CAPU'
                WHEN 'ANA LAURA SANCHEZ MARTINEZ'
                THEN
                'PV TORRES'
                ELSE
                    acla.CVALORCLASIFICACION
                END
            ELSE
                agen2.CNOMBREAGENTE
            END
       
       ELSE
           CASE agen.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen.CNOMBREAGENTE
           END
       END
   ELSE
        CASE agen.CNOMBREAGENTE
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               agen.CNOMBREAGENTE
           END
   END
ELSE
   CASE agen.CNOMBREAGENTE
   WHEN '(Ninguno)'
   THEN
       CASE agen2.CNOMBREAGENTE
       WHEN '(Ninguno)'
       THEN
           CASE acla.CVALORCLASIFICACION
           WHEN 'RODOLFO ROMERO CARPINTEYRO'
           THEN
           'PV REFORMA'
           WHEN 'MIROSLAVA PEREZ LIRA'
           THEN
           'MOSTRADOR SANTIAGO'
           WHEN 'PAULA ZEPEDA ARCE'
           THEN
           'PV CAPU'
           WHEN 'ANA LAURA SANCHEZ MARTINEZ'
           THEN
           'PV TORRES'
           ELSE
               acla.CVALORCLASIFICACION
           END
       WHEN 'RODOLFO ROMERO CARPINTEYRO'
       THEN
       'PV REFORMA'
       WHEN 'MIROSLAVA PEREZ LIRA'
       THEN
       'MOSTRADOR SANTIAGO'
       WHEN 'PAULA ZEPEDA ARCE'
       THEN
       'PV CAPU'
       WHEN 'ANA LAURA SANCHEZ MARTINEZ'
       THEN
       'PV TORRES'
       ELSE
           agen2.CNOMBREAGENTE
       END
   WHEN 'RODOLFO ROMERO CARPINTEYRO'
   THEN
   'PV REFORMA'
   WHEN 'MIROSLAVA PEREZ LIRA'
   THEN
   'MOSTRADOR SANTIAGO'
   WHEN 'PAULA ZEPEDA ARCE'
   THEN
   'PV CAPU'
   WHEN 'ANA LAURA SANCHEZ MARTINEZ'
   THEN
   'PV TORRES'
   ELSE
       agen.CNOMBREAGENTE
   END
END";

class detalleVentasDiario extends ConexionsBd
{
     public $mysqli;
     public $counter;

     function __construct()
     {
          $this->mysqli = $this->conectarPinturas();
     }

     public function countAll($sql)
     {
          $query = $this->mysqli->query($sql);
          $query = $query->fetchAll();
          return count($query);
     }

     public function getVentasCliente($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          $clientes = json_decode($search['query'], true);
          $cliente = "";

          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);

          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }

          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'cliente':
                    $campoOrden = "NombreCliente";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1 and canalComercial != 'PROPIAS' ";

          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
             
                 '1' As indicador
          FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
          GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
              
                 '1' As indicador
          FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
          GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                $agenteListPinturas as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.centro($agenteListPinturas,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListPinturas,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListPinturas,'FLEX')
                        ELSE
                        dbo.canal($agenteListPinturas,'PINTURAS')
                    END
             
                 END As canalComercial,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                
                 '1' As indicador
          FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
          GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                $agenteListDekkerlab as Agente,
                CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.centro($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.centro($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As centroTrabajo,
                 CASE adoc.CRAZONSOCIAL
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                 THEN
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                 ELSE
                    CASE acon.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Devolución Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA FX PUEBLA V 3.'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Factura Prueba'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Cargo Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'Nota de Crédito Mayoreo'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                             dbo.canal($agenteListDekkerlab,'FLEX')
                        ELSE
                        dbo.canal($agenteListDekkerlab,'PINTURAS')
                    END
             
                 END As canalComercial,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'Devolución'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'Nota de Cr'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'Factura Pr'
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
               
                 '1' As indicador
          FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
          GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
        
        VentasDiariasOrdenadas As(
            SELECT
                NombreCliente,
                Desglose,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias as vd  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
     
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
3212,
3233,
3146,
3234,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3126,
3116,
3106,
3078,
3094,
3060,
3024,
3013,
3014,
3015,
6,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3229,
3207,
3208,
3139
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
      
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListPinturas,'FLEX')
                ELSE
                dbo.centro($agenteListPinturas,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListPinturas,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListPinturas,'FLEX')
                ELSE
                dbo.canal($agenteListPinturas,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
        
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
        CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.centro($agenteListDekkerlab,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.centro($agenteListDekkerlab,'FLEX')
                ELSE
                dbo.centro($agenteListDekkerlab,'PINTURAS')
            END
     
         END As centroTrabajo,
         CASE adoc.CRAZONSOCIAL
         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
         THEN
            dbo.canal($agenteListDekkerlab,'PINTURAS')
         ELSE
            CASE acon.CNOMBRECONCEPTO
                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Devolución Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA FX PUEBLA V 3.'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'FACTURA MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Factura Prueba'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Cargo Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'Nota de Crédito Mayoreo'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                WHEN 'DOCUMENTO PRUEBA V 3.3'
                THEN
                     dbo.canal($agenteListDekkerlab,'FLEX')
                ELSE
                dbo.canal($agenteListDekkerlab,'PINTURAS')
            END
     
         END As canalComercial,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'Devolución'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Nota de Cr'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'Factura Pr'
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
       
         '1' As indicador
  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        NombreCliente,
        Desglose,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias as vd  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }

     public function getVentasCanal($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          $clientes = json_decode($search['query'], true);
          $cliente = "";

          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }

          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'canal':
                    $campoOrden = "canalComercial";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";


          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                     
                         '1' As indicador
                  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        3212,
        3233,
        3146,
        3234,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3126,
        3116,
        3106,
        3078,
        3094,
        3060,
        3024,
        3013,
        3014,
        3015,
        6,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3229,
        3207,
        3208,
        3139
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                      
                         '1' As indicador
                  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        3061,
        3052,
        3012,
        3004,
        6,
        8,
        3007,
        3017,
        3053,
        3056,
        14
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                        
                         '1' As indicador
                  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
        3105,
        3111
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'Devolución'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Nota de Cr'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Factura Pr'
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                       
                         '1' As indicador
                  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
        3046,
        3047,
        6,
        3049,
        3050,
        3051,
        3052,
        3053,
        3039,
        3042,
        4,
        5,
        3040,
        3043,
        3044,
        3041,
        3045,
        3080,
        3072,
        3071,
        3070,
        8,
        3054,
        3055,
        3056
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
                
                VentasDiariasOrdenadas As(
                    SELECT
                        canalComercial,
                        centroTrabajo,
                        Desglose,
                        CAST(Dia as NVARCHAR(100)) as Day
                    FROM ventasDiarias as vd  $condicional
                    
                    )
                SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                     
                         '1' As indicador
                  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        3212,
        3233,
        3146,
        3234,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3126,
        3116,
        3106,
        3078,
        3094,
        3060,
        3024,
        3013,
        3014,
        3015,
        6,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3229,
        3207,
        3208,
        3139
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                      
                         '1' As indicador
                  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        3061,
        3052,
        3012,
        3004,
        6,
        8,
        3007,
        3017,
        3053,
        3056,
        14
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                        
                         '1' As indicador
                  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
        3105,
        3111
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'Devolución'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Nota de Cr'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Factura Pr'
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                       
                         '1' As indicador
                  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
        3046,
        3047,
        6,
        3049,
        3050,
        3051,
        3052,
        3053,
        3039,
        3042,
        4,
        5,
        3040,
        3043,
        3044,
        3041,
        3045,
        3080,
        3072,
        3071,
        3070,
        8,
        3054,
        3055,
        3056
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
                
                VentasDiariasOrdenadas As(
                    SELECT
                        canalComercial,
                        centroTrabajo,
                        Desglose,
                        CAST(Dia as NVARCHAR(100)) as Day
                    FROM ventasDiarias as vd  $condicional
                    
                    )
                SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getVentasAgente($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'agente':
                    $campoOrden = "Agente";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1 and canalComercial != 'PROPIAS'";
          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                     
                         '1' As indicador
                  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        3212,
        3233,
        3146,
        3234,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3126,
        3116,
        3106,
        3078,
        3094,
        3060,
        3024,
        3013,
        3014,
        3015,
        6,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3229,
        3207,
        3208,
        3139
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                      
                         '1' As indicador
                  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        3061,
        3052,
        3012,
        3004,
        6,
        8,
        3007,
        3017,
        3053,
        3056,
        14
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                        
                         '1' As indicador
                  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
        3105,
        3111
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'Devolución'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Nota de Cr'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Factura Pr'
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                       
                         '1' As indicador
                  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
        3046,
        3047,
        6,
        3049,
        3050,
        3051,
        3052,
        3053,
        3039,
        3042,
        4,
        5,
        3040,
        3043,
        3044,
        3041,
        3045,
        3080,
        3072,
        3071,
        3070,
        8,
        3054,
        3055,
        3056
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
                
                VentasDiariasOrdenadas As(
                    SELECT
                        Agente,
                        Desglose,
                        CAST(Dia as NVARCHAR(100)) as Day
                    FROM ventasDiarias as vd  $condicional
                    
                    )
                SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);


          $sql1 = "WITH ventasDiarias AS(SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                     
                         '1' As indicador
                  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        3212,
        3233,
        3146,
        3234,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3126,
        3116,
        3106,
        3078,
        3094,
        3060,
        3024,
        3013,
        3014,
        3015,
        6,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3229,
        3207,
        3208,
        3139
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                      
                         '1' As indicador
                  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        3061,
        3052,
        3012,
        3004,
        6,
        8,
        3007,
        3017,
        3053,
        3056,
        14
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'DEVOLUCIÓN'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'NOTA DE CR'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'DOCUMENTO '
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                        
                         '1' As indicador
                  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
        3105,
        3111
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
                  UNION
                  SELECT 
                        adoc.CIDDOCUMENTO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CFECHA,
                        adoc.CRAZONSOCIAL As NombreCliente,
                        adoc.CSERIEDOCUMENTO,
                        adoc.CFOLIO,
                        DAY(adoc.CFECHA) As Dia,
                        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                        $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                         adoc.CNETO As Importe,
                         adoc.CDESCUENTOMOV As Descuento,
                         adoc.CIMPUESTO1 As IVA,
                         adoc.CTOTAL As Total,
                         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                         WHEN 'Devolución'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Nota de Cr'
                         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                         WHEN 'Factura Pr'
                         THEN SUM(adoc.CTOTAL)
                         ELSE
                         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                       
                         '1' As indicador
                  FROM [adDEKKERLAB].[dbo].[admDocumentos] as adoc INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
        3046,
        3047,
        6,
        3049,
        3050,
        3051,
        3052,
        3053,
        3039,
        3042,
        4,
        5,
        3040,
        3043,
        3044,
        3041,
        3045,
        3080,
        3072,
        3071,
        3070,
        8,
        3054,
        3055,
        3056
        )
                  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
                
                VentasDiariasOrdenadas As(
                    SELECT
                        Agente,
                        Desglose,
                        CAST(Dia as NVARCHAR(100)) as Day
                    FROM ventasDiarias as vd  $condicional
                    
                    )
                SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     /***VENTAS PRODUCTOS*/
     public function getVentasProductoMonto($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**NOMBRE CLIENTES */
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'nombre':
                    $campoOrden = "CNOMBREPRODUCTO";
                    break;
               case 'codigo':
                    $campoOrden = "CCODIGOPRODUCTO";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["producto"] != "") {
               $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";
          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    '1' As indicador
                    FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and amov.CIDALMACEN IN (1,2,3,4,9,12,14,16,18,20,21,24,25,26) and amov.CIDUNIDAD NOT IN(7,28,29,50,51) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
            5,
            3001,
            3002,
            3003,
            3023,
            3030,
            3076,
            3096,
            3108,
            3115,
            3128,
            3148,
            3172,
            3173,
            3174,
            3175,
            3176,
            3177,
            3178,
            3179,
            3180,
            3181,
            8,
            3016,
            3125,
            3194,
            3195,
            3196,
            3215,
            3207,
            3139,
            3207,
            3208,
            3229,
            6,
            3013,
            3014,
            3015,
            3024,
            3060,
            3078,
            3094,
            3106,
            3116,
            3126,
            3146,
            3182,
            3183,
            3184,
            3185,
            3186,
            3187,
            3188,
            3189,
            3190,
            3191,
            3212,3233,3234)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                   
                    '1' As indicador
                    FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,2,3,6,8,9) and amov.CIDUNIDAD IN(1) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.centro($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListPinturas,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListPinturas,'FLEX')
                                ELSE
                                dbo.canal($agenteListPinturas,'PINTURAS')
                            END
                     
                         END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    '1' As indicador
                    FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (21) and amov.CIDUNIDAD NOT IN(14,45,52) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'Devolución'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'Nota de Cr'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'Factura Pr'
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    '1' As indicador
                    FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,4,6,8,10,12,14,15,16,17) and amov.CIDUNIDAD NOT IN(1,28,50) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),
            
            VentasDiariasOrdenadas As(
                SELECT
                    CCODIGOPRODUCTO,
                    CNOMBREPRODUCTO,
                    Total,
                    CAST(Dia as NVARCHAR(100)) as Day
                FROM ventasDiarias  $condicional
                
                )
            SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and amov.CIDALMACEN IN (1,2,3,4,9,12,14,16,18,20,21,24,25,26) and amov.CIDUNIDAD NOT IN(7,28,29,50,51) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,2,3,6,8,9) and amov.CIDUNIDAD IN(1) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (21) and amov.CIDUNIDAD NOT IN(14,45,52) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,4,6,8,10,12,14,15,16,17) and amov.CIDUNIDAD NOT IN(1,28,50) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getVentasProductoUnidades($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**NOMBRE CLIENTES */
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'nombre':
                    $campoOrden = "CNOMBREPRODUCTO";
                    break;
               case 'codigo':
                    $campoOrden = "CCODIGOPRODUCTO";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["producto"] != "") {
               $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";
          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,2,3,4,9,12,14,16,18,20,21,24,25,26) and amov.CIDUNIDAD NOT IN(7,28,29,50,51)
 and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
       
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and amov.CIDALMACEN IN (1,2,3,6,8,9) and amov.CIDUNIDAD IN(1) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (21) and amov.CIDUNIDAD NOT IN(14,45,52) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'Devolución'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'Nota de Cr'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'Factura Pr'
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,4,6,8,10,12,14,15,16,17) and amov.CIDUNIDAD NOT IN(1,28,50) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        TotalUnidades,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(TotalUnidades) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,2,3,4,9,12,14,16,18,20,21,24,25,26) and amov.CIDUNIDAD NOT IN(7,28,29,50,51)
 and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
       
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere  and amov.CIDALMACEN IN (1,2,3,6,8,9) and amov.CIDUNIDAD IN(1) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'DOCUMENTO '
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (21) and amov.CIDUNIDAD NOT IN(14,45,52) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'Devolución'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'Nota de Cr'
                    THEN (SUM(CUNIDADES)*0) -SUM(CUNIDADES)
                    WHEN 'Factura Pr'
                    THEN SUM(CUNIDADES)
                    ELSE
                    SUM(CUNIDADES) END AS TotalUnidades,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION WHERE $sWhere and amov.CIDALMACEN IN (1,4,6,8,10,12,14,15,16,17) and amov.CIDUNIDAD NOT IN(1,28,50) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        TotalUnidades,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(TotalUnidades) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     /***VENTAS PRODUCTOS LITREADO*/
     public function getVentasLitreadoMonto($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**NOMBRE CLIENTES */
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'nombre':
                    $campoOrden = "CNOMBREPRODUCTO";
                    break;
               case 'codigo':
                    $campoOrden = "CCODIGOPRODUCTO";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["producto"] != "") {
               $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";
          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }
          $sql = "WITH ventasDiarias AS(SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CIDALMACEN,
                    amov.CIDUNIDAD,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    '1' As indicador
                    FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (5,6,7,8,10,13,15,17,19,22) and amov.CIDUNIDAD IN(7) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
            5,
            3001,
            3002,
            3003,
            3023,
            3030,
            3076,
            3096,
            3108,
            3115,
            3128,
            3148,
            3172,
            3173,
            3174,
            3175,
            3176,
            3177,
            3178,
            3179,
            3180,
            3181,
            8,
            3016,
            3125,
            3194,
            3195,
            3196,
            3215,
            3207,
            3139,
            3207,
            3208,
            3229,
            6,
            3013,
            3014,
            3015,
            3024,
            3060,
            3078,
            3094,
            3106,
            3116,
            3126,
            3146,
            3182,
            3183,
            3184,
            3185,
            3186,
            3187,
            3188,
            3189,
            3190,
            3191,
            3212,3233,3234)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CIDALMACEN,
                    amov.CIDUNIDAD,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                   
                    '1' As indicador
                    FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (4,5) and amov.CIDUNIDAD IN(2) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CIDALMACEN,
                    amov.CIDUNIDAD,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
               
                    '1' As indicador
                    FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPinturas_y_Complemen].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (22) and amov.CIDUNIDAD IN(14) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CIDALMACEN,
                    amov.CIDUNIDAD,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
                    $agenteListDekkerlab as Agente,
                        CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.centro($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.centro($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.centro($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As centroTrabajo,
                         CASE adoc.CRAZONSOCIAL
                         WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                         THEN
                            dbo.canal($agenteListDekkerlab,'PINTURAS')
                         ELSE
                            CASE acon.CNOMBRECONCEPTO
                                WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Devolución Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA FX PUEBLA V 3.'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'FACTURA MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Factura Prueba'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Cargo Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'Nota de Crédito Mayoreo'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                WHEN 'DOCUMENTO PRUEBA V 3.3'
                                THEN
                                     dbo.canal($agenteListDekkerlab,'FLEX')
                                ELSE
                                dbo.canal($agenteListDekkerlab,'PINTURAS')
                            END
                     
                         END As canalComercial,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'Devolución'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'Nota de Cr'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'Factura Pr'
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                   
                    '1' As indicador
                    FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (3,5,7,9,11,13,18) and amov.CIDUNIDAD IN(28) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
            GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION),
            
            VentasDiariasOrdenadas As(
                SELECT
                    CCODIGOPRODUCTO,
                    CNOMBREPRODUCTO,
                    Total,
                    CAST(Dia as NVARCHAR(100)) as Day
                FROM ventasDiarias  $condicional
                
                )
            SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (5,6,7,8,10,13,15,17,19,22) and amov.CIDUNIDAD IN(7) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (4,5) and amov.CIDUNIDAD IN(2) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
   
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPinturas_y_Complemen].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (22) and amov.CIDUNIDAD IN(14) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
       
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (3,5,7,9,11,13,18) and amov.CIDUNIDAD IN(28) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getVentasLitreadoUnidades($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**NOMBRE CLIENTES */
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          for ($i = 1; $i < 7; $i++) {

               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));

               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'nombre':
                    $campoOrden = "CNOMBREPRODUCTO";
                    break;
               case 'codigo':
                    $campoOrden = "CCODIGOPRODUCTO";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["producto"] != "") {
               $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }
          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";
          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (5,6,7,8,10,13,15,17,19,22) and amov.CIDUNIDAD IN(7) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (4,5) and amov.CIDUNIDAD IN(2) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
   
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPinturas_y_Complemen].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (22) and amov.CIDUNIDAD IN(14) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'Nota de Cr'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'Factura Pr'
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)  END AS CUNIDADES,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (3,5,7,9,11,13,18) and amov.CIDUNIDAD IN(28) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        CUNIDADES,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (5,6,7,8,10,13,15,17,19,22) and amov.CIDUNIDAD IN(7) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adFLEX2020SADEC].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (4,5) and amov.CIDUNIDAD IN(2) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.centro($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.centro($agenteListPinturas,'FLEX')
        ELSE
        dbo.centro($agenteListPinturas,'PINTURAS')
    END

 END As centroTrabajo,
 CASE adoc.CRAZONSOCIAL
 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
 THEN
    dbo.canal($agenteListPinturas,'PINTURAS')
 ELSE
    CASE acon.CNOMBRECONCEPTO
        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Devolución Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA FX PUEBLA V 3.'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'FACTURA MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Factura Prueba'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Cargo Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'Nota de Crédito Mayoreo'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        WHEN 'DOCUMENTO PRUEBA V 3.3'
        THEN
             dbo.canal($agenteListPinturas,'FLEX')
        ELSE
        dbo.canal($agenteListPinturas,'PINTURAS')
    END

 END As canalComercial,
 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'NOTA DE CR'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION) END AS CUNIDADES,
   
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adPinturas_y_Complemen].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (22) and amov.CIDUNIDAD IN(14) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION
UNION
SELECT 
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CIDALMACEN,
        amov.CIDUNIDAD,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'Nota de Cr'
        THEN (SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)*0) -SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        WHEN 'Factura Pr'
        THEN SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)
        ELSE
        SUM(amov.CUNIDADES * aconv.CFACTORCONVERSION)  END AS CUNIDADES,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as aconv ON apro.CIDUNIDADBASE = aconv.CIDUNIDAD1 and amov.CIDUNIDAD = aconv.CIDUNIDAD2 WHERE $sWhere and amov.CIDALMACEN IN (3,5,7,9,11,13,18) and amov.CIDUNIDAD IN(28) and adoc.CIDDOCUMENTODE IN(4,5) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,amov.CIDALMACEN,amov.CIDUNIDAD,aconv.CFACTORCONVERSION),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        CUNIDADES,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getVentasMarca($tables, $campos, $search)
     {

          global $agenteListPinturas;
          global $agenteListDekkerlab;

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $año = $search['año'];
          $estatus = $search['estatus'];
          $arreglo = array();
          $arreglo2 = array();
          $clientes = json_decode($search['query'], true);
          $cliente = "";
          for ($i = 0; $i < count($clientes); $i++) {
               $cliente .= "'" . $clientes[$i] . "', ";
          }
          $cliente = substr($cliente, 0, -2);
          /**AGENTES */
          $agentes = explode(',', $search['agente']);
          $agente = "";

          for ($i = 0; $i < count($agentes); $i++) {
               $agente .= "'" . $agentes[$i] . "', ";
          }
          $agente = substr($agente, 0, -2);
          /***AGENTES */
          /**CENTRO */
          $centros = explode(',', $search['centro']);
          $centro = "";

          for ($i = 0; $i < count($centros); $i++) {
               $centro .= "'" . $centros[$i] . "', ";
          }
          $centro = substr($centro, 0, -2);
          /***CENTRO */
          /**CANAL */
          $canals = explode(',', $search['canal']);
          $canal = "";

          for ($i = 0; $i < count($canals); $i++) {
               $canal .= "'" . $canals[$i] . "', ";
          }
          $canal = substr($canal, 0, -2);
          /***CANAL */
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */
          for ($i = 1; $i < 7; $i++) {
               $dia =  date('d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo, (int)$dia);
               $dia2 =  date('Y-m-d', strtotime($año . "W" . str_pad($search["semana"], 2, '0', STR_PAD_LEFT) . $i));
               array_push($arreglo2, $dia2);
          }
          $orden = $search['orden'];
          switch ($search["campo"]) {
               case 'marca':
                    $campoOrden = "Marca";
                    break;
               case 'monto':
                    $campoOrden = "IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0)";
                    break;
          }
          $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

          if ($search["query"] != "[]") {
               $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
          }

          $condicional = "WHERE indicador = 1  and canalComercial != 'PROPIAS'";

          if ($search['canal'] != "") {

               $condicional .= " and canalComercial in(" . $canal . ") ";
          }
          if ($search['centro'] != "") {

               $condicional .= " and centroTrabajo  in(" . $centro . ") ";
          }
          if ($search['agente'] != "") {

               $condicional .= " and Agente in(" . $agente . ") ";
          }
          if ($search["marca"] != "") {
               $sWhere .= " and acla2.CVALORCLASIFICACION in(" . $marca . ") ";
          }

          $sql = "WITH ventasDiarias AS(SELECT 
        acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
        acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
       acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
        acla2.CVALORCLASIFICACION AS Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        Marca,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


          $query = $this->mysqli->query($sql);

          $sql1 = "WITH ventasDiarias AS(SELECT 
        acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212,3233,3234)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
        acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
       
        '1' As indicador
        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
3061,
3052,
3012,
3004,
6,
8,
3007,
3017,
3053,
3056,
14
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
       acla2.CVALORCLASIFICACION as Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListPinturas as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.centro($agenteListPinturas,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListPinturas,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListPinturas,'FLEX')
                    ELSE
                    dbo.canal($agenteListPinturas,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3106,
3105,
3111
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION
UNION
SELECT 
        acla2.CVALORCLASIFICACION AS Marca,
        apro.CCODIGOPRODUCTO,
        aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
        $agenteListDekkerlab as Agente,
            CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.centro($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.centro($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.centro($agenteListDekkerlab,'PINTURAS')
                END
         
             END As centroTrabajo,
             CASE adoc.CRAZONSOCIAL
             WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
             THEN
                dbo.canal($agenteListDekkerlab,'PINTURAS')
             ELSE
                CASE acon.CNOMBRECONCEPTO
                    WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Devolución Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA FX PUEBLA V 3.'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'FACTURA MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Factura Prueba'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Cargo Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'Nota de Crédito Mayoreo'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    WHEN 'DOCUMENTO PRUEBA V 3.3'
                    THEN
                         dbo.canal($agenteListDekkerlab,'FLEX')
                    ELSE
                    dbo.canal($agenteListDekkerlab,'PINTURAS')
                END
         
             END As canalComercial,
        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'Devolución'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Nota de Cr'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'Factura Pr'
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        '1' As indicador
        FROM [adDEKKERLAB].[dbo].[admProductos] as apro LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adDEKKERLAB].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adDEKKERLAB].[dbo].[admAgentes] as agen2 ON aclien.CIDAGENTEVENTA = agen2.CIDAGENTE  LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aclien.CIDVALORCLASIFCLIENTE3 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON apro.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(3048,3081,3082,
3046,
3047,
6,
3049,
3050,
3051,
3052,
3053,
3039,
3042,
4,
5,
3040,
3043,
3044,
3041,
3045,
3080,
3072,
3071,
3070,
8,
3054,
3055,
3056
)
GROUP BY apro.CCODIGOPRODUCTO,aclien.CIDAGENTEVENTA,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL,agen2.CNOMBREAGENTE,acla.CVALORCLASIFICACION,acla2.CVALORCLASIFICACION),

VentasDiariasOrdenadas As(
    SELECT
        Marca,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by $campoOrden $orden ";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     function setCounter($counter)
     {
          $this->counter = $counter;
     }
     function getCounter()
     {
          return $this->counter;
     }
}
