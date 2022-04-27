<?php

include("../models/db_conexion.php");
class busquedaDatos extends ConexionsBd
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
    public function getClientes($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["cliente"] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["cliente"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaClientes AS(SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPINTURAS2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION 
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPinturas_y_Complemen].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION 
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
              
              
          FROM [adDEKKERLAB].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
          listadoClientes AS(
                SELECT * FROM listaClientes AS lc  $sWhere 
          
          )
          select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaClientes AS(SELECT CCODIGOCLIENTE
        ,CRFC
        ,CRAZONSOCIAL
        ,CFECHAALTA
    
        
    FROM [adPINTURAS2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
    UNION
    SELECT CCODIGOCLIENTE
        ,CRFC
        ,CRAZONSOCIAL
        ,CFECHAALTA
    
        
    FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
    UNION 
    SELECT CCODIGOCLIENTE
        ,CRFC
        ,CRAZONSOCIAL
        ,CFECHAALTA
    
        
    FROM [adPinturas_y_Complemen].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
    UNION 
    SELECT CCODIGOCLIENTE
        ,CRFC
        ,CRAZONSOCIAL
        ,CFECHAALTA
        
        
    FROM [adDEKKERLAB].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
    listadoClientes AS(
          SELECT * FROM listaClientes AS lc  $sWhere 
    
    )
    select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getProductos($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["producto"] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["producto"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaProductos AS(SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO

          FROM [adPINTURAS2020SADEC].[dbo].[admProductos]
          UNION
          SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO
          
              
          FROM [adFLEX2020SADEC].[dbo].[admProductos]
          UNION 
          SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO

          FROM [adPinturas_y_Complemen].[dbo].[admProductos]
          UNION 
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adDEKKERLAB].[dbo].[admProductos]),
          listadoProductos AS(
                SELECT * FROM listaProductos AS lc  $sWhere 
          
          )
          select * from listadoProductos ORDER BY CCODIGOPRODUCTO ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaProductos AS(SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adPINTURAS2020SADEC].[dbo].[admProductos]
    UNION
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO
    
        
    FROM [adFLEX2020SADEC].[dbo].[admProductos]
    UNION 
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adPinturas_y_Complemen].[dbo].[admProductos]
    UNION 
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adDEKKERLAB].[dbo].[admProductos]),
    listadoProductos AS(
          SELECT * FROM listaProductos AS lc  $sWhere 
    
    )
    select * from listadoProductos ORDER BY CCODIGOPRODUCTO ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getProductosSolicitudes($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["producto"] != "") {
            $sWhere = "and (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["producto"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaProductos AS(
            SELECT
                   aprod.CIDPRODUCTO
                  ,aprod.CCODIGOPRODUCTO
                  ,aprod.CNOMBREPRODUCTO
                  ,aprod.CIDUNIDADBASE
                  ,CASE 
                  WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
                  THEN
                  dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
                  ELSE
                  dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                  END as 'COSTO'
                  ,aprod.CPRECIO1 as 'PRECIO'
                  ,amed.CDESPLIEGUE
                  ,'1' as CVALORMEDIDA
        
            FROM [adDEKKERLAB].[dbo].[admProductos] as aprod LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD WHERE  aprod.CIDPRODUCTO != 0 $sWhere)
                  select * from listaProductos ORDER BY CCODIGOPRODUCTO ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaProductos AS(
            SELECT
                   aprod.CIDPRODUCTO
                  ,aprod.CCODIGOPRODUCTO
                  ,aprod.CNOMBREPRODUCTO
                  ,aprod.CIDUNIDADBASE
                  ,CASE 
                  WHEN dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO) IS NULL
                  THEN
                  dbo.ultimoCostoPinturas(aprod.CCODIGOPRODUCTO)
                  ELSE
                  dbo.ultimoCostoDekkerlab(aprod.CCODIGOPRODUCTO)
                  END as 'COSTO'
                  ,aprod.CPRECIO1 as 'PRECIO'
                  ,amed.CDESPLIEGUE
                  ,'1' as CVALORMEDIDA
        
            FROM [adDEKKERLAB].[dbo].[admProductos] as aprod LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD WHERE  aprod.CIDPRODUCTO != 0 $sWhere)
                  select * from listaProductos ORDER BY CCODIGOPRODUCTO ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getUnidadesMedidaProducto($codigoProducto, $idUnidad)
    {

        $sWhere = "aprod.CCODIGOPRODUCTO = '" . $codigoProducto . "'  and amed.CIDUNIDAD = '" . $idUnidad . "'";

        $sql = "WITH unidades As(SELECT amed2.CABREVIATURA,ISNULL(acon.CFACTORCONVERSION,1) as CFACTORCONVERSION,acon.CIDUNIDAD2 As UnidadConversion,ROW_NUMBER() OVER(PARTITION BY aprod.CCODIGOPRODUCTO ORDER BY aprod.CIDPRODUCTO) AS NumeroFila
        FROM [adDEKKERLAB].[dbo].[admProductos] as aprod LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed ON aprod.CIDUNIDADBASE = amed.CIDUNIDAD LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admConversionesUnidad] as acon ON aprod.CIDUNIDADBASE = acon.CIDUNIDAD1 LEFT OUTER JOIN [adDEKKERLAB].[dbo].[admUnidadesMedidaPeso] as amed2 ON acon.CIDUNIDAD2 = amed2.CIDUNIDAD  WHERE $sWhere) 
        SELECT * FROM unidades";
        $query = $this->mysqli->query($sql);
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
