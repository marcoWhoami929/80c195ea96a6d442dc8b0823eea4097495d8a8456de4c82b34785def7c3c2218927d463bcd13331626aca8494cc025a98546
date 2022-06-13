<?php
include("../models/db_conexion.php");

class dataInventarios extends ConexionsBd
{
     public $mysqli;
     public $counter;

     public function __construct()
     {
          $this->mysqli = $this->conectarDekkerlab();
     }

     public function countAll($sql)
     {
          $query = $this->mysqli->query($sql);
          $query = $query->fetchAll();
          return count($query);
     }
     public function countAllMain($sql)
     {
          $query = ConexionsBd::conectar()->prepare($sql);
          $query->execute();
          $query = $query->fetchAll();
          return count($query);
     }
     public function getRequisiciones($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          $sWhere = " req.areaSolicitante = '" . $search["usuario"] . "' ";
          if ($search["prioridad"] != "") {
               $sWhere .= "and req.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and req.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getRequisicionesFaltantes($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          $sWhere = " req.areaSolicitante = '" . $search["usuario"] . "' ";
          if ($search["prioridad"] != "") {
               $sWhere .= "and req.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and req.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getRequisicionesAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["sucursal"] != "") {
               $sWhere = "WHERE req.areaSolicitante = '" . $search["sucursal"] . "' ";
          } else {
               $sWhere = "WHERE req.areaSolicitante != 0 ";
          }


          if ($search["prioridad"] != "") {
               $sWhere .= "and req.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and req.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.areaSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.areaSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getRequisicionesFaltantesAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["sucursal"] != "") {
               $sWhere = "req.areaSolicitante = '" . $search["sucursal"] . "' ";
          } else {
               $sWhere = "req.areaSolicitante != 0 ";
          }
          if ($search["prioridad"] != "") {
               $sWhere .= "and req.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and req.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM requisiciones as req INNER JOIN almacenes as alm ON req.idAlmacen = alm.id INNER JOIN estatus as est ON req.idEstatus = est.id INNER JOIN administradores as adm ON req.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON req.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getListaProductosRequisiciones($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["folio"] != 0) {
               if ($search["usuario"] != 0) {
                    $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               } else {
                    $sWhere = " prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               }
          } else {
               $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.sessionId = '" . $search["sesion"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = 0";
          }

          if ($search["tipoDetalleDocumento"] == "completo" || $search["tipoDetalleDocumento"] == "") {
               $sWhere .= "";
          } else {
               $sWhere .= "and prod.pendientes != 0";
          }
          $sql = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getListaProductosRequisicionesAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["folio"] != 0) {
               if ($search["usuario"] != 0) {
                    $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               } else {
                    $sWhere = " prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               }
          } else {
               $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.sessionId = '" . $search["sesion"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = 0";
          }

          if ($search["tipoDetalleDocumento"] == "completo") {
               $sWhere .= "";
          } else {
               $sWhere .= "and prod.pendientes != 0";
          }

          $sql = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getUnidadesMedidaProducto($codigoProducto, $idUnidad)
     {
          $sWhere = "aprod.CCODIGOPRODUCTO = '" . $codigoProducto . "'";

          $sql = "WITH unidades As(SELECT CABREVIATURA,'1' as CFACTORCONVERSION,CIDUNIDAD as UnidadConversion,'0' as NumeroFila
          FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD  WHERE $sWhere UNION ALL SELECT amed2.CABREVIATURA,ISNULL(acon.CFACTORCONVERSION,1) as CFACTORCONVERSION,acon.CIDUNIDAD2 As UnidadConversion,ROW_NUMBER() OVER(PARTITION BY aprod.CCODIGOPRODUCTO ORDER BY aprod.CIDPRODUCTO) AS NumeroFila
        FROM [adDEKKERLAB].[dbo].[admProductos] as aprod LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as acon ON aprod.CIDUNIDADBASE = acon.CIDUNIDAD1 LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed2 ON acon.CIDUNIDAD2 = amed2.CIDUNIDAD  WHERE $sWhere) 
        SELECT * FROM unidades";
          $query = $this->mysqli->query($sql);
          $query = $query->fetchAll();
          return $query;
     }
     public function getUnidadMedidaProducto($codigoProducto)
     {
          $sWhere = "aprod.CCODIGOPRODUCTO = '" . $codigoProducto . "'";

          $sql = "SELECT amed.CABREVIATURA as 'UNIDAD'
            FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD WHERE $sWhere";
          $query = $this->mysqli->query($sql);
          $query = $query->fetchAll();
          return $query;
     }
     public function getExistenciasProducto($idProducto, $periodo, $ejercicio, $idAlmacen)
     {
          $sWhere = "aexis.CIDALMACEN = '" . $idAlmacen . "' and aexis.CIDEJERCICIO = '" . $ejercicio . "' and aexis.CIDPRODUCTO = '" . $idProducto . "'";

          $sql = "SELECT aexis.CENTRADASPERIODO$periodo-CSALIDASPERIODO$periodo as 'EXISTENCIAS'
          FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis ON aprod.CIDPRODUCTO = aexis.CIDPRODUCTO WHERE $sWhere";
          $query = $this->mysqli->query($sql);
          $query = $query->fetchAll();
          return $query;
     }
     public function getListaAlmacenes($idGrupo)
     {
          $sql = "SELECT * FROM almacenes WHERE cidgrupo NOT IN('" . $idGrupo . "') and empresa = 'Dekkerlab'";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          return $query;
     }
     public function getListaProductosEcommerce($campos, $search)
     {

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */

          $orden = $search['orden'];

          $periodo = $search['periodo'];
          $almacen1 = $search['almacen'];
          $almacen2 = $search['almacen2'];

          $sWhere = "admprod.CTIPOPRODUCTO = 1 and admexis.CIDALMACEN = '" . $search["almacen2"] . "' and admexis.CIDEJERCICIO = 2 ";
          $sWhere2 = "CIDPRODUCTO != 0";
          if ($search["marca"] != "") {
               $sWhere .= " and admcla2.CVALORCLASIFICACION in(" . $marca . ") ";
          }
          if ($search["producto"] != "") {
               $sWhere .= " and admprod.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["clasificacion"] != "") {
               $sWhere2 .= " and CLASIFICACION = '" . $search['clasificacion'] . "' ";
          }
          if ($search["estatusFacebook"] != "") {
               $sWhere2 .= " and ESTATUS = '" . $search['estatusFacebook'] . "' ";
          }
          if ($search["categoria"] != "") {
               $sWhere2 .= " and CLASIFPRODUCTO = '" . $search['categoria'] . "' ";
          }
          if ($search["utilidad"] != "") {
               if ($search["utilidad"] == "+30") {
                    $sWhere2 .= " and (((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) >= 30 ";
               } else {
                    $sWhere2 .= " and (((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) < 30 ";
               }
          }
          if ($search["utilidadMl"] != "") {
               if ($search["utilidadMl"] == "+30") {
                    $sWhere2 .= " and (((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) >= 30 ";
               } else {
                    $sWhere2 .= " and (((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) < 30 ";
               }
          }

          if ($search["almacen"] == 21) {
               $ejercicio = 4;
          } else {
               $ejercicio  = 9;
          }
          if ($search["campoOrden"] == 'UTILIDAD') {
               $campoOrden = "(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100)";
          } else {
               $campoOrden = $search['campoOrden'];
          }
          $sql = "WITH productosEcommerce as(SELECT  admprod.CIDPRODUCTO
          ,admprod.CCODIGOPRODUCTO
          ,admprod.CNOMBREPRODUCTO
          ,admmed.CNOMBREUNIDAD
          ,CASE
          WHEN $almacen1 = 21
          THEN
          CASE 
          WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END
          ELSE
          CASE 
          WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END 
          END as 'CLASIFICACION'
          ,admcla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,admcla2.CVALORCLASIFICACION as 'MARCA'
          ,admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo as 'EXISTENCIA'
          ,(admprod.CPRECIO1 * 1.16) as 'PRECIO'
          ,CASE 
          WHEN dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO) IS NULL
          THEN
          dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO)
          ELSE
          dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO)
          END as 'COSTO'
          ,CASE
          WHEN (admprod.CPRECIO1 * 1.16) < 299
          THEN
          0
          ELSE
          168
          END as 'ENVIO'
          ,CASE  
          WHEN admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo = 0
          THEN
          'Inactivo'
          ELSE
          'Activo'
          END as 'ESTATUS'
     FROM [adDEKKERLAB].[dbo].[admProductos] as admprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as admmed ON admprod.CIDUNIDADBASE = admmed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla ON admprod.CIDVALORCLASIFICACION3 = admcla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla2 ON admprod.CIDVALORCLASIFICACION1 = admcla2.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as admexis ON admprod.CIDPRODUCTO = admexis.CIDPRODUCTO  WHERE $sWhere)
     SELECT *,(CAST(COSTO as numeric(18,2))*1.16) as 'COSTOIVA',(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) as 'UTILIDAD',(PRECIO * 0.13) as 'COMISION',PRECIO-(PRECIO * 0.13)-ENVIO as 'VENTAML',(((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) as 'UTILIDADML' FROM productosEcommerce WHERE  $sWhere2 order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "WITH productosEcommerce as(SELECT  admprod.CIDPRODUCTO
          ,admprod.CCODIGOPRODUCTO
          ,admprod.CNOMBREPRODUCTO
          ,admmed.CNOMBREUNIDAD
          ,CASE
          WHEN $almacen1 = 21
          THEN
          CASE 
          WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacionTorres(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END
          ELSE
          CASE 
          WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 74.99
          THEN
          'A'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 49.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 75
          THEN
          'B'
           WHEN CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) > 24.99 AND CAST(dbo.rotacion(admprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS DECIMAL(10,2)) < 50
          THEN
          'C'
          ELSE
          'D'
          END 
          END as 'CLASIFICACION'
          ,admcla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,admcla2.CVALORCLASIFICACION as 'MARCA'
          ,admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo as 'EXISTENCIA'
          ,(admprod.CPRECIO1 * 1.16) as 'PRECIO'
          ,CASE 
          WHEN dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO) IS NULL
          THEN
          dbo.ultimoCostoPinturas(admprod.CCODIGOPRODUCTO)
          ELSE
          dbo.ultimoCostoDekkerlab(admprod.CCODIGOPRODUCTO)
          END as 'COSTO'
          ,CASE
          WHEN (admprod.CPRECIO1 * 1.16) < 299
          THEN
          0
          ELSE
          168
          END as 'ENVIO'
          ,CASE  
          WHEN admexis.CENTRADASPERIODO$periodo-admexis.CSALIDASPERIODO$periodo = 0
          THEN
          'Inactivo'
          ELSE
          'Activo'
          END as 'ESTATUS'
     FROM [adDEKKERLAB].[dbo].[admProductos] as admprod INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as admmed ON admprod.CIDUNIDADBASE = admmed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla ON admprod.CIDVALORCLASIFICACION3 = admcla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as admcla2 ON admprod.CIDVALORCLASIFICACION1 = admcla2.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as admexis ON admprod.CIDPRODUCTO = admexis.CIDPRODUCTO  WHERE $sWhere)
     SELECT *,(CAST(COSTO as numeric(18,2))*1.16) as 'COSTOIVA',(((PRECIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO / 1) * 100) as 'UTILIDAD',(PRECIO * 0.13) as 'COMISION',PRECIO-(PRECIO * 0.13)-ENVIO as 'VENTAML',(((PRECIO-(PRECIO * 0.13)-ENVIO / 1) - (CAST(COSTO as numeric(18,2))*1.16)) / (PRECIO-(PRECIO * 0.13)-ENVIO / 1) * 100) as 'UTILIDADML' FROM productosEcommerce WHERE $sWhere2";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getListaProductosAlmacenes($campos, $search)
     {

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */

          $orden = $search['orden'];
          $campoOrden = $search['campoOrden'];

          $periodo = $search['periodo'];
          $almacen1 = $search['almacen'];
          $almacen2 = $search['almacen2'];

          $sWhere = " aexis.CIDALMACEN = '" . $search["almacen2"] . "' and aexis.CIDEJERCICIO = 2 ";
          $sWhere2 = "CIDPRODUCTO != 0";
          if ($search["marca"] != "") {
               $sWhere .= " and acla2.CVALORCLASIFICACION in(" . $marca . ") ";
          }
          if ($search["producto"] != "") {
               $sWhere .= " and aprod.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["clasificacion"] != "") {
               $sWhere2 .= " and CLASIFICACION = '" . $search['clasificacion'] . "' ";
          }

          if ($search["categoria"] != "") {
               $sWhere2 .= " and CLASIFPRODUCTO = '" . $search['categoria'] . "' ";
          }

          if ($search["almacen"] == 21 || $search["almacen"] == 22) {
               $ejercicio = 4;
          } else {
               $ejercicio  = 9;
          }

          $sql = "WITH productos as(SELECT 
                              aprod.CIDPRODUCTO
                              ,aprod.CCODIGOPRODUCTO
                              ,aprod.CNOMBREPRODUCTO
                              ,amed.CNOMBREUNIDAD as 'UNIDAD'
                              ,acla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
                              ,acla2.CVALORCLASIFICACION as 'MARCA'
                              ,aexis.CENTRADASPERIODO$periodo as 'ENTRADAS'
                              ,aexis.CSALIDASPERIODO$periodo as 'SALIDAS'
                              ,aexis.CENTRADASPERIODO$periodo-aexis.CSALIDASPERIODO$periodo as 'EXISTENCIAS'
                              ,dbo.rotacion(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS 'ROTACION'
                              ,CASE 
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
                              THEN
                              'A'
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
                              THEN
                              'B'
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
                              THEN
                              'C'
                              ELSE
                              'D'
                              END as 'CLASIFICACION'
                              ,(dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6) as 'MINIMO'
                              ,CASE 
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
                              THEN
                               ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.5,0)
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
                              THEN
                               ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.25,0)
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
                              THEN
                              ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1,0)
                              ELSE
                              0
                              END as 'MAXIMO'
                              ,CASE
                              WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
                                 THEN
                                 dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
                                 ELSE
                                 dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                 END as 'COSTO'
            FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis ON aprod.CIDPRODUCTO = aexis.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON aprod.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere )
            SELECT CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,UNIDAD,MARCA,CLASIFPRODUCTO,IIF(COSTO IS NULL,0,COSTO) as 'COSTO',ENTRADAS,ENTRADAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOENTRADAS',SALIDAS,SALIDAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOSALIDAS',EXISTENCIAS,EXISTENCIAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOEXISTENCIAS',floor(MINIMO) as 'MINIMO',ROUND((floor(MAXIMO)-floor(MINIMO))/2+floor(MINIMO),0) as 'MEDIA',floor(MAXIMO) as 'MAXIMO',ROTACION,CLASIFICACION FROM productos WHERE  $sWhere2 order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "WITH productos as(SELECT 
          aprod.CIDPRODUCTO
          ,aprod.CCODIGOPRODUCTO
          ,aprod.CNOMBREPRODUCTO
          ,amed.CNOMBREUNIDAD as 'UNIDAD'
          ,acla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,acla2.CVALORCLASIFICACION as 'MARCA'
          ,aexis.CENTRADASPERIODO$periodo as 'ENTRADAS'
          ,aexis.CSALIDASPERIODO$periodo as 'SALIDAS'
          ,aexis.CENTRADASPERIODO$periodo-aexis.CSALIDASPERIODO$periodo as 'EXISTENCIAS'
          ,dbo.rotacion(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS 'ROTACION'
          ,CASE 
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
          THEN
          'A'
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
          THEN
          'B'
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
          THEN
          'C'
          ELSE
          'D'
          END as 'CLASIFICACION'
          ,(dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6) as 'MINIMO'
          ,CASE 
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
          THEN
           ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.5,0)
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
          THEN
           ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.25,0)
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
          THEN
          ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1,0)
          ELSE
          0
          END as 'MAXIMO'
          ,CASE
          WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
             THEN
             dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
             ELSE
             dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
             END as 'COSTO'
FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis ON aprod.CIDPRODUCTO = aexis.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON aprod.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere )
SELECT CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,UNIDAD,MARCA,CLASIFPRODUCTO,IIF(COSTO IS NULL,0,COSTO) as 'COSTO',ENTRADAS,ENTRADAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOENTRADAS',SALIDAS,SALIDAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOSALIDAS',EXISTENCIAS,EXISTENCIAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOEXISTENCIAS',floor(MINIMO) as 'MINIMO',ROUND((floor(MAXIMO)-floor(MINIMO))/2+floor(MINIMO),0) as 'MEDIA',floor(MAXIMO) as 'MAXIMO',ROTACION,CLASIFICACION FROM productos WHERE $sWhere2";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getListaProductosAgotarse($campos, $search)
     {

          $offset = $search['offset'];
          $per_page = $search['per_page'];
          /***CODIGOS DE PRODUCTOS */
          $codigos = explode(',', $search['producto']);
          $codigoProducto = "";
          for ($i = 0; $i < count($codigos); $i++) {
               $codigoProducto .= "'" . $codigos[$i] . "', ";
          }
          $codigoProducto = substr($codigoProducto, 0, -2);
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */

          $orden = $search['orden'];
          $campoOrden = $search['campoOrden'];

          $periodo = $search['periodo'];
          $almacen1 = $search['almacen'];
          $almacen2 = $search['almacen2'];

          $sWhere = " aexis.CIDALMACEN = '" . $search["almacen2"] . "' and aexis.CIDEJERCICIO = 2 ";
          $sWhere2 = "CIDPRODUCTO != 0 ";
          if ($search["marca"] != "") {
               $sWhere .= " and acla2.CVALORCLASIFICACION in(" . $marca . ") ";
          }
          if ($search["producto"] != "") {
               $sWhere .= " and aprod.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
          }
          if ($search["clasificacion"] != "") {
               $sWhere2 .= " and CLASIFICACION = '" . $search['clasificacion'] . "' ";
          }

          if ($search["categoria"] != "") {
               $sWhere2 .= " and CLASIFPRODUCTO = '" . $search['categoria'] . "' ";
          }

          if ($search["almacen"] == 21 || $search["almacen"] == 22) {
               $ejercicio = 4;
          } else {
               $ejercicio  = 9;
          }
          if ($search["estatus"] != "") {
               if ($search["estatus"] == "AGOTARSE") {
                    $sWhere2 .= " and EXISTENCIAS < floor(MINIMO)";
               } else {
                    $sWhere2 .= " and EXISTENCIAS = 0";
               }
          } else {
               $sWhere2 .= "and EXISTENCIAS < floor(MINIMO)";
          }
          $sql = "WITH productos as(SELECT 
                              aprod.CIDPRODUCTO
                              ,aprod.CCODIGOPRODUCTO
                              ,aprod.CNOMBREPRODUCTO
                              ,amed.CNOMBREUNIDAD as 'UNIDAD'
                              ,acla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
                              ,acla2.CVALORCLASIFICACION as 'MARCA'
                              ,aexis.CENTRADASPERIODO$periodo as 'ENTRADAS'
                              ,aexis.CSALIDASPERIODO$periodo as 'SALIDAS'
                              ,aexis.CENTRADASPERIODO$periodo-aexis.CSALIDASPERIODO$periodo as 'EXISTENCIAS'
                              ,dbo.rotacion(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS 'ROTACION'
                              ,CASE 
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
                              THEN
                              'A'
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
                              THEN
                              'B'
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
                              THEN
                              'C'
                              ELSE
                              'D'
                              END as 'CLASIFICACION'
                              ,(dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6) as 'MINIMO'
                              ,CASE 
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
                              THEN
                               ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.5,0)
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
                              THEN
                               ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.25,0)
                              WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
                              THEN
                              ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1,0)
                              ELSE
                              0
                              END as 'MAXIMO'
                              ,CASE
                              WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
                                 THEN
                                 dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
                                 ELSE
                                 dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                 END as 'COSTO'
            FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis ON aprod.CIDPRODUCTO = aexis.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON aprod.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere )
            SELECT CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,UNIDAD,MARCA,CLASIFPRODUCTO,IIF(COSTO IS NULL,0,COSTO) as 'COSTO',ENTRADAS,ENTRADAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOENTRADAS',SALIDAS,SALIDAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOSALIDAS',EXISTENCIAS,EXISTENCIAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOEXISTENCIAS',floor(MINIMO)*IIF(COSTO IS NULL,0,COSTO) as 'MONTOMINIMOS',floor(MINIMO) as 'MINIMO',ROUND((floor(MAXIMO)-floor(MINIMO))/2+floor(MINIMO),0) as 'MEDIA',floor(MAXIMO) as 'MAXIMO',ROTACION,CLASIFICACION FROM productos WHERE  $sWhere2 order by $campoOrden $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);
          $sql1 = "WITH productos as(SELECT 
          aprod.CIDPRODUCTO
          ,aprod.CCODIGOPRODUCTO
          ,aprod.CNOMBREPRODUCTO
          ,amed.CNOMBREUNIDAD as 'UNIDAD'
          ,acla.CIDVALORCLASIFICACION as 'CLASIFPRODUCTO'
          ,acla2.CVALORCLASIFICACION as 'MARCA'
          ,aexis.CENTRADASPERIODO$periodo as 'ENTRADAS'
          ,aexis.CSALIDASPERIODO$periodo as 'SALIDAS'
          ,aexis.CENTRADASPERIODO$periodo-aexis.CSALIDASPERIODO$periodo as 'EXISTENCIAS'
          ,dbo.rotacion(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "','" . $ejercicio . "') AS 'ROTACION'
          ,CASE 
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
          THEN
          'A'
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
          THEN
          'B'
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
          THEN
          'C'
          ELSE
          'D'
          END as 'CLASIFICACION'
          ,(dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6) as 'MINIMO'
          ,CASE 
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 74.999
          THEN
           ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.5,0)
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 75 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 49.999
          THEN
           ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1.25,0)
          WHEN ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) < 50 AND ROUND(((0.1666666666666)*dbo.rotacionCantidad(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "'))*100,3) > 24.999
          THEN
          ROUND((dbo.rotacionTotal(aprod.CCODIGOPRODUCTO,'" . $almacen1 . "','" . $almacen2 . "')/6)*1,0)
          ELSE
          0
          END as 'MAXIMO'
          ,CASE
          WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
             THEN
             dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
             ELSE
             dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
             END as 'COSTO'
FROM [adDEKKERLAB].[dbo].[admProductos] as aprod INNER JOIN [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis ON aprod.CIDPRODUCTO = aexis.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION3 = acla.CIDVALORCLASIFICACION INNER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON aprod.CIDVALORCLASIFICACION1 = acla2.CIDVALORCLASIFICACION WHERE $sWhere )
SELECT CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,UNIDAD,MARCA,CLASIFPRODUCTO,IIF(COSTO IS NULL,0,COSTO) as 'COSTO',ENTRADAS,ENTRADAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOENTRADAS',SALIDAS,SALIDAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOSALIDAS',EXISTENCIAS,EXISTENCIAS*IIF(COSTO IS NULL,0,COSTO) as 'MONTOEXISTENCIAS',floor(MINIMO)*IIF(COSTO IS NULL,0,COSTO) as 'MONTOMINIMOS',floor(MINIMO) as 'MINIMO',ROUND((floor(MAXIMO)-floor(MINIMO))/2+floor(MINIMO),0) as 'MEDIA',floor(MAXIMO) as 'MAXIMO',ROTACION,CLASIFICACION FROM productos WHERE $sWhere2";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getAutorizaciones($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          $sWhere = " areaSolicitante = '" . $search["usuario"] . "' ";

          if ($search["estatus"] != "") {
               $sWhere .= "and aprobada = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "With autorizaciones AS (SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN requisiciones as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id
          UNION ALL
          SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN pedidos as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id)
          SELECT * FROM autorizaciones WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "With autorizaciones AS (SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN requisiciones as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id
          UNION ALL
          SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN pedidos as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id)
          SELECT * FROM autorizaciones WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getAutorizacionesAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["sucursal"] != "") {
               $sWhere = "areaSolicitante = '" . $search["sucursal"] . "' ";
          } else {
               $sWhere = "areaSolicitante != 0 ";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and aprobada = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "With autorizaciones AS (SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN requisiciones as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id
          UNION ALL
          SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN pedidos as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id)
          SELECT * FROM autorizaciones WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "With autorizaciones AS (SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN requisiciones as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id
          UNION ALL
          SELECT $campos FROM `autorizacionescompra` as aut INNER JOIN pedidos as doc ON aut.serieOrigen = doc.serie and aut.folioOrigen = doc.folio INNER JOIN solicitantes as sol ON doc.idSolicitante = sol.id INNER JOIN administradores as adm ON doc.areaSolicitante = adm.id)
          SELECT * FROM autorizaciones WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getOrdenesCompra($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["tipo"] === '1') {
               if ($search["sucursal"] != "") {
                    $sWhere = "and area = '" . $search["sucursal"] . "' ";
               } else {
                    $sWhere = "and area != 0 ";
               }
          } else {

               $sWhere = "and area = '" . $search["usuario"] . "' ";
          }


          if ($search["estatus"] != "") {
               $sWhere .= "and CCANCELADO = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "With ordenes AS (SELECT $campos FROM [adCorrecciones].[dbo].[admDocumentos] as adoc INNER JOIN [parametrosVentas].[dbo].[DOCUMENTOSRELACION] as arel ON adoc.CIDDOCUMENTO = arel.idDocumento and adoc.CREFERENCIA = arel.origen WHERE adoc.CIDCONCEPTODOCUMENTO = 19 $sWhere)
          SELECT * FROM ordenes  ORDER BY $campo $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "With ordenes AS (SELECT $campos FROM [adCorrecciones].[dbo].[admDocumentos] as adoc INNER JOIN [parametrosVentas].[dbo].[DOCUMENTOSRELACION] as arel ON adoc.CIDDOCUMENTO = arel.idDocumento and adoc.CREFERENCIA = arel.origen WHERE adoc.CIDCONCEPTODOCUMENTO = 19 $sWhere)
          SELECT * FROM ordenes  ORDER BY $campo $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getComprasRealizadas($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["tipo"] === '1') {
               if ($search["sucursal"] != "") {
                    $sWhere = "and area = '" . $search["sucursal"] . "' ";
               } else {
                    $sWhere = "and area != 0 ";
               }
          } else {

               $sWhere = "and area = '" . $search["usuario"] . "' ";
          }


          if ($search["estatus"] != "") {
               $sWhere .= "and CCANCELADO = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "With ordenes AS (SELECT $campos FROM [adCorrecciones].[dbo].[admDocumentos] as adoc INNER JOIN [parametrosVentas].[dbo].[DOCUMENTOSRELACION] as arel ON adoc.CIDDOCUMENTOORIGEN = arel.idDocumento and adoc.CREFERENCIA = arel.origen  WHERE adoc.CIDCONCEPTODOCUMENTO = 21 $sWhere)
          SELECT * FROM ordenes  ORDER BY $campo $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "With ordenes AS (SELECT $campos FROM [adCorrecciones].[dbo].[admDocumentos] as adoc INNER JOIN [parametrosVentas].[dbo].[DOCUMENTOSRELACION] as arel ON adoc.CIDDOCUMENTOORIGEN = arel.idDocumento and adoc.CREFERENCIA = arel.origen  WHERE adoc.CIDCONCEPTODOCUMENTO = 21 $sWhere)
          SELECT * FROM ordenes  ORDER BY $campo $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getDocumentosNoImpresos($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["idConcepto"] == "") {
               $sWhere = "CIDDOCUMENTODE = '" . $search["idDocumentoDe"] . "' AND CCANCELADO = '" . $search["estatus"] . "' AND CIMPRESO = 0";
          } else {
               $sWhere = "CIDDOCUMENTODE = '" . $search["idDocumentoDe"] . "' AND CIDCONCEPTODOCUMENTO = '" . $search["idConcepto"] . "' AND CCANCELADO = '" . $search["estatus"] . "' AND CIMPRESO = 0";
          }



          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM [adDEKKERLAB].[dbo].[admDocumentos] WHERE $sWhere ORDER BY $campo $orden OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

          $query = $this->mysqli->query($sql);

          $sql1 = "SELECT $campos FROM [adDEKKERLAB].[dbo].[admDocumentos] WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAll($sql1);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getPedidos($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          $sWhere = " ped.areaSolicitante = '" . $search["usuario"] . "' ";
          if ($search["prioridad"] != "") {
               $sWhere .= "and ped.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and ped.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getPedidosAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["sucursal"] != "") {
               $sWhere = "WHERE ped.areaSolicitante = '" . $search["sucursal"] . "' ";
          } else {
               $sWhere = "WHERE ped.areaSolicitante != 0 ";
          }


          if ($search["prioridad"] != "") {
               $sWhere .= "and ped.prioridad = '" . $search["prioridad"] . "'";
          }

          if ($search["estatus"] != "") {
               $sWhere .= "and ped.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.areaSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.areaSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getListaProductosPedidos($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["folio"] != 0) {
               if ($search["usuario"] != 0) {
                    $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               } else {
                    $sWhere = " prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               }
          } else {
               $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.sessionId = '" . $search["sesion"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = 0";
          }

          if ($search["tipoDetalleDocumento"] == "completo" || $search["tipoDetalleDocumento"] == "") {
               $sWhere .= "";
          } else {
               $sWhere .= "and prod.pendientes != 0";
          }
          $sql = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getListaProductosPedidosAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["folio"] != 0) {
               if ($search["usuario"] != 0) {
                    $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               } else {
                    $sWhere = " prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = '" . $search["folio"] . "'";
               }
          } else {
               $sWhere = " prod.idUsuario = '" . $search["usuario"] . "' and prod.sessionId = '" . $search["sesion"] . "' and prod.tipo = '" . $search["tipo"] . "' and prod.folioDocumento = 0";
          }

          if ($search["tipoDetalleDocumento"] == "completo") {
               $sWhere .= "";
          } else {
               $sWhere .= "and prod.pendientes != 0";
          }

          $sql = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM productostempsolicitudes as prod INNER JOIN almacenes as alm ON prod.idAlmacenOrigen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidad = med.cidunidad WHERE $sWhere ORDER BY prod.id asc";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getPedidosFaltantes($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          $sWhere = " ped.areaSolicitante = '" . $search["usuario"] . "' ";
          if ($search["prioridad"] != "") {
               $sWhere .= "and ped.prioridad = '" . $search["prioridad"] . "'";
          }

          $sWhere .= "and ped.pendientes != 0";

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getPedidosFaltantesAdmin($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["sucursal"] != "") {
               $sWhere = "ped.areaSolicitante = '" . $search["sucursal"] . "' ";
          } else {
               $sWhere = "ped.areaSolicitante != 0 ";
          }
          if ($search["prioridad"] != "") {
               $sWhere .= "and ped.prioridad = '" . $search["prioridad"] . "'";
          }


          $sWhere .= "and ped.pendientes != 0";


          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM pedidos as ped INNER JOIN almacenes as alm ON ped.idAlmacen = alm.id INNER JOIN estatus as est ON ped.idEstatus = est.id INNER JOIN administradores as adm ON ped.idSolicitante = adm.id LEFT OUTER JOIN administradores as adm2 ON ped.idAprobador = adm2.id WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getInventarios($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];

          if ($search["usuario"] == "0") {
               if ($search["sucursal"] == "") {
                    $sWhere = " inv.id != 0";
               } else {
                    $sWhere = " inv.idArea = '" . $search["sucursal"] . "' ";
               }
          } else {
               $sWhere = " inv.idArea = '" . $search["usuario"] . "' ";
          }
          $sWhere .= " and MONTH(inv.fecha) = '" . $search["mes"] . "'";

          if ($search["estatus"] != "") {
               $sWhere .= " and inv.idEstatus = '" . $search["estatus"] . "'";
          }

          $orden = $search['orden'];
          $campo = $search['campo'];

          $sql = "SELECT $campos FROM `inventarios` as inv INNER JOIN administradores as adm ON inv.idSolicitante = adm.id INNER JOIN solicitantes as adm2 ON inv.idRealizador = adm2.id INNER JOIN almacenes as alm ON inv.idAlmacen = alm.cidalmacen WHERE $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";

          $query = ConexionsBd::conectar()->prepare($sql);


          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM `inventarios` as inv INNER JOIN administradores as adm ON inv.idSolicitante = adm.id INNER JOIN solicitantes as adm2 ON inv.idRealizador = adm2.id INNER JOIN almacenes as alm ON inv.idAlmacen = alm.cidalmacen WHERE $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
          return $query;
     }
     public function getListaProductosInventario($search)
     {
          /**MARCA */
          $marcas = explode(',', $search['marca']);
          $marca = "";

          for ($i = 0; $i < count($marcas); $i++) {
               $marca .= "'" . $marcas[$i] . "', ";
          }
          $marca = substr($marca, 0, -2);
          /***MARCA */
          /**FAMILIA */
          $familias = explode(',', $search['familia']);
          $familia = "";

          for ($i = 0; $i < count($familias); $i++) {
               $familia .= "'" . $familias[$i] . "', ";
          }
          $familia = substr($familia, 0, -2);
          /***FAMILIA */
          /**CATEGORIA */
          $categorias = explode(',', $search['categoria']);
          $categoria = "";

          for ($i = 0; $i < count($categorias); $i++) {
               $categoria .= "'" . $categorias[$i] . "', ";
          }
          $categoria = substr($categoria, 0, -2);
          /***CATEGORIA */
          /**ANAQUEL*/
          $anaqueles = explode(',', $search['anaquel']);
          $anaquel = "";

          for ($i = 0; $i < count($anaqueles); $i++) {
               $anaquel .= "'" . $anaqueles[$i] . "', ";
          }
          $anaquel = substr($anaquel, 0, -2);
          /***ANAQUEL */
          /**REPISA */
          $repisas = explode(',', $search['repisa']);
          $repisa = "";

          for ($i = 0; $i < count($repisas); $i++) {
               $repisa .= "'" . $repisas[$i] . "', ";
          }
          $repisa = substr($repisa, 0, -2);
          /***REPISA */
          /**PROVEEDOR */
          $proveedores = explode(',', $search['proveedor']);
          $proveedor = "";

          for ($i = 0; $i < count($proveedores); $i++) {
               $proveedor .= "'" . $proveedores[$i] . "', ";
          }
          $proveedor = substr($proveedor, 0, -2);
          /***PROVEEDOR */
          $sWhere = "aexis.CIDEJERCICIO = 2 AND aexis.CIDALMACEN = '" . $search["almacen"] . "'";
          if ($search["marca"] != "") {
               $sWhere .= " and acla.CVALORCLASIFICACION in(" . $marca . ") ";
          }
          if ($search["familia"] != "") {
               $sWhere .= " and acla2.CIDVALORCLASIFICACION in(" . $familia . ") ";
          }
          if ($search["categoria"] != "") {
               $sWhere .= " and acla3.CIDVALORCLASIFICACION in(" . $categoria . ") ";
          }
          if ($search["anaquel"] != "") {
               $sWhere .= " and amax.CANAQUEL in(" . $anaquel . ") ";
          }
          if ($search["repisa"] != "") {
               $sWhere .= " and amax.CREPISA in(" . $repisa . ") ";
          }
          if ($search["proveedor"] != "") {
               $sWhere .= " and amax.CZONA in(" . $proveedor . ") ";
          }
          $periodo = $search["periodo"];
          $campoOrden = $search['campoOrden'];
          $orden = $search['orden'];
          $sql = "SELECT
          aprod.CIDPRODUCTO
          ,aexis.CIDALMACEN
          ,aprod.CIDUNIDADBASE
          ,aprod.CCODIGOPRODUCTO
          ,aprod.CNOMBREPRODUCTO
          ,aalm.CCODIGOALMACEN
          ,aunid.CNOMBREUNIDAD
           ,aunid.CDESPLIEGUE
          ,aexis.CENTRADASPERIODO$periodo-CSALIDASPERIODO$periodo as 'EXISTENCIAS'
          ,CASE
                    WHEN aprod.CIDVALORCLASIFICACION1 = 44 
                    THEN
                         CASE
                              WHEN aprod.CNOMBREPRODUCTO LIKE '%FX%' 
                                   THEN 
                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                              WHEN aprod.CNOMBREPRODUCTO LIKE '%FLEX%' 
                                   THEN 
                                   dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                              ELSE
                              CASE
                                   WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                   THEN
                                        CASE
                                             WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                  THEN 
                                                  dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                             ELSE 
                                                  dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                             END
                                   ELSE 
                                        dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                   END
                              END
                         ELSE
                              CASE
                                   WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL 
                                   THEN
                                        CASE
                                             WHEN dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO) = '0.00000' 
                                                  THEN 
                                                  dbo.ultimoCostoFlex(aprod.CCODIGOPRODUCTO)
                                             ELSE 
                                                  dbo.costosHistoricosPinturas(aprod.CCODIGOPRODUCTO)
                                        END
                                   ELSE 
                                        dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                                   END
                         END AS 'COSTO'
                         ,CASE 
          WHEN dbo.valorConversionUnidad(aprod.CIDUNIDADBASE) IS NULL
          THEN
          '1'
          ELSE
          dbo.valorConversionUnidad(aprod.CIDUNIDADBASE)
          END
          as 'VALORCONVERSION',
          acla.CVALORCLASIFICACION as 'MARCA',
          acla2.CIDVALORCLASIFICACION as 'FAMILIA',
          acla3.CIDVALORCLASIFICACION as 'CATEGORIA',
          ISNULL(amax.CANAQUEL,'') as 'ANAQUEL',
          ISNULL(amax.CREPISA,'') as 'REPISA',
          ISNULL(amax.CZONA,'') as 'PROVEEDOR'
      FROM [adDEKKERLAB].[dbo].[admExistenciaCosto] as aexis INNER JOIN [adDEKKERLAB].[dbo].[admProductos] as aprod ON aexis.CIDPRODUCTO = aprod.CIDPRODUCTO INNER JOIN [adDEKKERLAB].[dbo].[admAlmacenes] as aalm ON aexis.CIDALMACEN = aalm.CIDALMACEN INNER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as aunid ON aprod.CIDUNIDADBASE = aunid.CIDUNIDAD LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla ON aprod.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla2 ON aprod.CIDVALORCLASIFICACION2 = acla2.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admClasificacionesValores] as acla3 ON aprod.CIDVALORCLASIFICACION3 = acla3.CIDVALORCLASIFICACION LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admMaximosMinimos] as amax ON aexis.CIDPRODUCTO = amax.CIDPRODUCTO and aexis.CIDALMACEN = amax.CIDALMACEN WHERE $sWhere ORDER BY $campoOrden $orden";


          $query = $this->mysqli->query($sql);

          $nums_row = $this->countAll($sql);

          //Set counter
          $this->setCounter($nums_row);

          $query = $query->fetchAll();
          return $query;
     }
     public function getListadoProductosInventario($campos, $search)
     {
          $offset = $search['offset'];
          $per_page = $search['per_page'];
          $accion = $search['accionMovimiento'];
          $sWhere = "idInventario = '" . $search["folio"] . "'";
          if ($accion != "") {
               $sWhere .= "and prod.estado = '" . $accion . "'  and prod.generado = 0";
          }
          if ($search["filtroDiferencias"] != "") {
               $sWhere .= " and prod.diferencia != 0 and prod.estado != 'Sin Accion'";
          }

          $orden = "asc";
          $campo = "id";

          $sql = "SELECT $campos FROM productosinventarios as prod INNER JOIN almacenes as alm ON prod.idAlmacen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidadBase = med.cidunidad INNER JOIN unidadesmedida as med2 ON prod.idUnidad = med2.cidunidad WHERE  $sWhere ORDER BY $campo $orden LIMIT $per_page OFFSET $offset";


          $query = ConexionsBd::conectar()->prepare($sql);

          $query->execute();

          $query = $query->fetchAll();

          $sql1 = "SELECT $campos FROM productosinventarios as prod INNER JOIN almacenes as alm ON prod.idAlmacen = alm.cidalmacen INNER JOIN unidadesmedida as med ON prod.idUnidadBase = med.cidunidad INNER JOIN unidadesmedida as med2 ON prod.idUnidad = med2.cidunidad WHERE  $sWhere ORDER BY $campo $orden";

          $nums_row = $this->countAllMain($sql1);

          //Set counter
          $this->setCounter($nums_row);
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
