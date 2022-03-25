<div class="container-fluid">
<!-- Content Row -->
  <div class="row">
    <!-- Area Chart -->
    <div class="col-xl-6 col-lg-7">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Statistique par graphique</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <div class="chart-area">
            <canvas id="myAreaChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-6 col-lg-5">
      <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Statistique par tableau</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
			 <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Quest/Degre</th>
              <th>0</th>
              <th>1</th>
              <th>2</th>
              <th>3</th>
              <th>TLES</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1-1-1</td>
              <td>20%</td>
              <td>30%</td>
              <td>30%</td>
              <td>20%</td>
              <td>100%</td>
            </tr>
            <tr>
              <td>1-1-2</td>
              <td>45%</td>
              <td>10%</td>
              <td>20%</td>
              <td>25%</td>
              <td>100%</td>
            </tr>
            <tr>
              <td>1-1-3</td>
              <td>10%</td>
              <td>30%</td>
              <td>30%</td>
              <td>30%</td>
              <td>100%</td>
            </tr>
            <tr>
              <td>2-1-1</td>
              <td>15%</td>
              <td>35%</td>
              <td>15%</td>
              <td>35%</td>
              <td>100%</td>
            </tr>
            <tr>
              <td>2-1-2</td>
              <td>50%</td>
              <td>25%</td>
              <td>5%</td>
              <td>20%</td>
              <td>100%</td>
            </tr>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>
</div>