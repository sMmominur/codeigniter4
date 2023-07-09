<?= $this->extend('master') ?>

<?= $this->section('main_content') ?>
   <!-- Page Header -->
   <div class="page-header">
    <div class="row">
      <div class="col-sm-12">
        <!-- Loggin user name will be replace here -->
        <h3 class="page-title">Admin </h3>
        <ul class="breadcrumb">
          <li class="breadcrumb-item active">Dashboard</li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /Page Header -->

  <div class="row">

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
      <div class="card dash-widget">
        <div class="card-body">
          <span class="dash-widget-icon"><i class="las la-list"></i></span>
          <div class="dash-widget-info">
            <h3>112</h3>
            <span>Pending</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
      <div class="card dash-widget">
        <div class="card-body">
          <span class="dash-widget-icon"><i class="las la-check"></i></span>
          <div class="dash-widget-info">
            <h3>44</h3>
            <span>Done</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
      <div class="card dash-widget">
        <div class="card-body">
          <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
          <div class="dash-widget-info">
            <h3>37</h3>
            <span>IPN Call</span>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
      <div class="card dash-widget">
        <div class="card-body">
          <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
          <div class="dash-widget-info">
            <h3>218</h3>
            <span>Email Status</span>
          </div>
        </div>
      </div>
    </div>


   <!-- Graph start -->
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 text-center">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Service Done</h3>
              <div id="bar-charts"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 text-center">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">Service Complete</h3>
              <div id="line-charts"></div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Graph end -->
				

   <!-- Statistics Widget -->
      <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill dash-statistics">
          <div class="card-body">
            <h5 class="card-title">Statistics</h5>
            <div class="stats-list">
              <div class="stats-info">
                <p>Today done <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Pending <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="stats-info">
                <p>Pending Invoice <strong>15 <small>/ 92</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Today Email sent <strong>85 <small>/ 112</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Pending Email <strong>190 <small>/ 212</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Webhook Status <strong>22 <small>/ 23</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-info" role="progressbar" style="width: 22%" aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill dash-statistics">
          <div class="card-body">
            <h5 class="card-title">Resource Matrix</h5>
            <div class="stats-list">
              <div class="stats-info">
                <p>Disk Usage <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Admin Memory Usage <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="stats-info">
                <p>Daily email statistics <strong>15 <small>/ 92</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-12 col-lg-12 col-xl-4 d-flex">
        <div class="card flex-fill dash-statistics">
          <div class="card-body">
            <h5 class="card-title">Others</h5>
            <div class="stats-list">
              <div class="stats-info">
                <p>IPN call failed <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
              <div class="stats-info">
                <p>Webhook call failed <strong>4 <small>/ 65</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-primary" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>

              <div class="stats-info">
                <p>Others <strong>15 <small>/ 92</small></strong></p>
                <div class="progress">
                  <div class="progress-bar bg-warning" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
						
		<!-- /Statistics Widget -->

  </div>

<?= $this->endSection() ?>


<?= $this->section('page_specific_script') ?>

  <script type="text/javascript"> </script>

<?= $this->endSection() ?>

