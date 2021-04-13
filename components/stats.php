<div class="row">
  <div class="mb-3 col-xl-3 col-sm-6">
    <div class="text-white card bg-primary o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        <div class="mr-5">
          <?php echo $client->countClients(); ?> Clientes
		  Totales!
        </div>
      </div>
      <div class="clearfix text-white card-footer small z-1"></div>
    </div>
  </div>

  <div class="mb-3 col-xl-3 col-sm-6">
    <div class="text-white card bg-warning o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fab fa-fw fa-usb"></i>
        </div>
        <div class="mr-5">
          <?php echo $client->countClientsByCond("is_usb", "yes"); ?> USB
          Registrados!
        </div>
      </div>
      <div class="clearfix text-white card-footer small z-1"></div>
    </div>
  </div>

  <div class="mb-3 col-xl-3 col-sm-6">
    <div class="text-white card bg-success o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-signal"></i>
        </div>
        <div class="mr-5">
          <?php echo $client->countClientsByCond("status", "Online"); ?> Clientes
		  Online!
        </div>
      </div>
      <div class="clearfix text-white card-footer small z-1"></div>
    </div>
  </div>

  <div class="mb-3 col-xl-3 col-sm-6">
    <div class="text-white card bg-danger o-hidden h-100">
      <div class="card-body">
        <div class="card-body-icon">
          <i class="fas fa-fw fa-user-slash"></i>
        </div>
        <div class="mr-5">
          <?php echo $client->countClientsByCond("status", "Offline"); ?>
          Clientes
		  Desconectados!
        </div>
      </div>
      <div class="clearfix text-white card-footer small z-1"></div>
    </div>
  </div>
</div>
<!-- Start Charts -->
<div class="row">
  <div class="col-xl-6">
    <div class="mb-4 card">
      <div class="card-header">
        <i class="mr-1 fas fa-chart-pie"></i>
        Clientes Por Sistema Operativo
      </div>
      <div class="card-body">
        <canvas id="myPieChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>
  <div class="col-xl-6">
    <div class="mb-4 card">
      <div class="card-header">
        <i class="mr-1 fas fa-chart-bar"></i>
        Crecimiento De Clientes Por Dias
      </div>
      <div class="card-body">
        <canvas id="myBarChart" width="100%" height="40"></canvas>
      </div>
    </div>
  </div>
</div>
<!-- End Charts -->