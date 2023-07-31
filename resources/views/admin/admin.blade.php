@extends('layouts.index')
@section('content')

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

            <!-- Sales Card -->
              <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>

                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>

                  <div class="card-body">
                    <h5 class="card-title">Total Farmers</span></h5>

                    <div class="d-flex align-items-center">
                      <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                        <i class="bi bi-people"></i>
                      </div>
                      <div class="ps-3">
                        <h6>145</h6>
                        <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                      </div>
                    </div>
                  </div>

                </div>
              </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">4P's Members</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>$3,264</h6>
                      <span class="text-success small pt-1 fw-bold">8%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Revenue Card -->

            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">

              <div class="card info-card customers-card">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Customers <span>| This Year</span></h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-people"></i>
                    </div>
                    <div class="ps-3">
                      <h6>1244</h6>
                      <span class="text-danger small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">decrease</span>

                    </div>
                  </div>

                </div>
              </div>

            </div><!-- End Customers Card -->
            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                    <div class="card-body">
                      <h5 class="card-title">Commodities</h5>

                      <!-- Bar Chart -->
                      <canvas id="barChart" style="max-height: 400px;"></canvas>
                      <script>
                        document.addEventListener("DOMContentLoaded", () => {
                          new Chart(document.querySelector('#barChart'), {
                            type: 'bar',
                            data: {
                              labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                              datasets: [{
                                label: 'Bar Chart',
                                data: [65, 59, 80, 81, 56, 55, 40],
                                backgroundColor: [
                                  'rgba(255, 99, 132, 0.2)',
                                  'rgba(255, 159, 64, 0.2)',
                                  'rgba(255, 205, 86, 0.2)',
                                  'rgba(75, 192, 192, 0.2)',
                                  'rgba(54, 162, 235, 0.2)',
                                  'rgba(153, 102, 255, 0.2)',
                                  'rgba(201, 203, 207, 0.2)'
                                ],
                                borderColor: [
                                  'rgb(255, 99, 132)',
                                  'rgb(255, 159, 64)',
                                  'rgb(255, 205, 86)',
                                  'rgb(75, 192, 192)',
                                  'rgb(54, 162, 235)',
                                  'rgb(153, 102, 255)',
                                  'rgb(201, 203, 207)'
                                ],
                                borderWidth: 1
                              }]
                            },
                            options: {
                              scales: {
                                y: {
                                  beginAtZero: true
                                }
                              }
                            }
                          });
                        });
                      </script>

                    </div>
              </div>
            </div><!-- End Bar CHart -->

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          <!-- Budget Report -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

                <div class="card-body">
                  <h5 class="card-title">Total Male and Female</h5>

                  <!-- Pie Chart -->
                  <canvas id="pieChart" style="max-height: 400px; max-width: 400px;"></canvas>
                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new Chart(document.querySelector('#pieChart'), {
                        type: 'pie',
                        data: {
                          labels: [
                            'Male',
                            'Female'
                          ],
                          datasets: [{
                            label: 'My First Dataset',
                            data: [300, 100],
                            backgroundColor: [
                              'rgb(255, 99, 132)',
                              'rgb(255, 205, 86)'
                            ],
                            hoverOffset: 4
                          }]
                        }
                      });
                    });
                  </script>
                </div>
          </div><!-- End Pie CHart -->


        </div><!-- End Right side columns -->

      </div>
    </section>


@endsection
