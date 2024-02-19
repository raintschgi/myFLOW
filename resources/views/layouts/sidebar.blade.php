<link rel="stylesheet" href="{{ asset("css/sidebar.css") }}">

  <div class="sidebar">
    <ul class="nav flex-column">
      
      <li class="nav-item fs-5">
        <a class="nav-link link-dark" href="#"><i class="bi bi-speedometer2"></i> Dashboard</a>
      </li>
    
      <li class="nav-item fs-5">
        <a class="nav-link disabled" href="#"><i class="bi bi-database"></i> Produkte</a>
        <ul class="sub-men fs-6">
          <li class="nav-item">
            <a class="nav-link link-dark" href="/packages/create">Neues Produkt anlegen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="/packages">Produkte anzeigen</a>
          </li>
      </ul>

      <li class="nav-item fs-5">
        <a class="nav-link disabled" href="#"><i class="bi bi-people"></i> Kunden</a>
        <ul class="sub-men fs-6">
          <li class="nav-item">
            <a class="nav-link link-dark" href="/customers/create">Neuen Kunden anlegen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="/customers">Kunden anzeigen</a>
          </li>
      </ul>
      
      </li>
      <li class="nav-item fs-5">
        <a class="nav-link disabled" href="#"><i class="bi bi-bag"></i> Bestellungen</a>
        <ul class="sub-men fs-6">
          <li class="nav-item disabled">
            <a class="nav-link link-dark" href="/orders">Übersicht</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link link-dark" href="#">Neue Bestellung anlegen</a>
          </li>
          <li class="nav-item disabled">
            <a class="nav-link link-dark" href="#">Offene Positionen</a>
          </li>
        </ul>

      <li class="border-top my-3"></li>
  
      <li class="nav-item fs-5">
      <a class="nav-link disabled" href="#"> CSC</a>
      <ul class="sub-men fs-6">
        <li class="nav-item">
          <a class="nav-link link-dark" href="#">TODOs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link link-dark" href="/webs">Webspace anzeigen</a>
        </li>
      </ul>
      </li>
  
      <li class="border-top my-3"></li>
    
      <li class="nav-item fs-5">
        <a class="nav-link disabled" href="#"> SOC</a>
        <ul class="sub-men fs-6">
          <li class="nav-item">
            <a class="nav-link link-dark" href="#">TODOs</a>
          </li>
          <li class="nav-item">
            <a class="nav-link link-dark" href="/logging">Logs</a>
          </li>
        </ul>
      </li>
    
      <li class="border-top my-3"></li>
    
      <li class="nav-item fs-5">
        <a class="nav-link disabled" href="#"> Backoffice</a>
        <ul class="sub-men fs-6">
          <li class="nav-item">
            <a class="nav-link link-dark" href="#">TODOs</a>
          </li>
        </ul>
      </li>
  
    </ul>
  </div>

