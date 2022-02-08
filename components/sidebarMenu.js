class sidebarMenu extends HTMLElement {
  constructor() {
    super();
  }

  static get observedAttributes() {
    return ["nombreAgente"];
  }

  attributeChangedCallback(nameAttr, oldValue, newValue) {
    switch (nameAtrr) {
      case "nombreAgente":
        this.nombreAgente = newValue;
        break;
    }
  }

  connectedCallback() {
    this.innerHTML = `<header>
    <div class="menu_bar">
      <a href="#" class="bt-menu"><img src="img/logo.png" width="10%"><span><i class="fas fa-bars fa-1x"></i></span></a>
    </div>

    <nav>
      <ul style="background:white;">
       <li></li>
      </ul>
      <ul class="contenedorAccesos">
        <li><a href="#"></a></li>
        <li><a style="color:#fff;padding:20px;display:block;text-decoration:none;font-family: 'Abel', sans-serif;" onclick="accionesTablero('inicio','','direct')"><i class="fas fa-home"></i>Tablero</a></li>
        <li><a style="color:#fff;padding:20px;display:block;text-decoration:none;font-family: 'Abel', sans-serif;" onclick="accionesTablero('encuestasTalleres','listaEncuestasTalleres','encuesta')"><i class="fas fa-address-book"></i>Encuesta Talleres</a></li>
        <li><a style="color:#fff;padding:20px;display:block;text-decoration:none;font-family: 'Abel', sans-serif;" onclick="accionesTablero('encuestasDistribuidores','listaEncuestasDistribuidores','encuesta')"><i class="fas fa-address-book"></i>Encuesta Distribuidores</a></li>
        <li><a style="color:#fff;padding:20px;display:block;text-decoration:none;font-family: 'Abel', sans-serif;" onclick="accionesTablero('tiendasCercanas','','direct')"><i class="fas fa-map-marker"></i>Tiendas Cercanas</a></li>
        <li><a style="color:#fff;padding:20px;display:block;text-decoration:none;font-family: 'Abel', sans-serif;" onclick="accionesTablero('mapaTiendas','','direct')"><i class="fas fa-map"></i>Mapa Tiendas</a></li>
       
      </ul>
    </nav>
  </header>`;
  }
}

window.customElements.define("sidebar-menu", sidebarMenu);
