<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Covid 19 Watcher</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <link href="css/addons/datatables.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <style>

  </style>
</head>
<body class="fixed-sn white-skin">
  <?php
    date_default_timezone_set("Asia/Manila");
  ?>
    <div class="container mt-5">
      <section>
        <?php echo "<h1 class='text-center'>Philippines Covid 19 Update as of ".date("F d, Y")."</h1>"; ?><hr>
        <div class="row">

          <?php
            $ph_url='https://corona.lmao.ninja/countries/Philippines';
            $ph_get=file_get_contents($ph_url);
            $ph_json=json_decode($ph_get,true);

            $ph_data_array=array("Cases"=>$ph_json['cases'], "Todays Cases"=>$ph_json['todayCases'], "Deaths"=>$ph_json['deaths'], "Todays Deaths"=>$ph_json['todayDeaths'], "Recovered"=>$ph_json['recovered'], "Active"=>$ph_json['active'], "Critical"=>$ph_json['critical'], "Tests"=>$ph_json['tests']);

            foreach ($ph_data_array as $key => $value) {
          ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">
              <div class="row mt-3">
                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg primary-color ml-4"><i class="far fa-eye"
                      aria-hidden="true"></i></a>

                </div>
                <div class="col-md-7 col-7 text-right pr-5">
                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo $value; ?></h5>
                  <p class="font-small grey-text"><?php echo $key; ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </section>

      <section>
        <?php echo "<h1 class='text-center'>Worldwide Covid 19 Update as of ".date("F d, Y")."</h1>"; ?><hr>
        <div class="row">

          <?php
            $json_url='https://corona.lmao.ninja/all';
            $json_get=file_get_contents($json_url);
            $count_json=json_decode($json_get,true);

            $data_array=array("Cases Worldwide"=>$count_json['cases'], "Todays Cases Worldwide"=>$count_json['todayCases'], "Deaths Worldwide"=>$count_json['deaths'], 
              "Todays Deaths Worldwide"=>$count_json['todayDeaths'],"Recovered"=>$count_json['recovered'], "Affected Countries"=>$count_json['affectedCountries']);

           foreach ($data_array as $key => $value) {
          ?>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card">
              <div class="row mt-3">
                <div class="col-md-5 col-5 text-left pl-4">
                  <a type="button" class="btn-floating btn-lg primary-color ml-4"><i class="far fa-eye"
                      aria-hidden="true"></i></a>

                </div>
                <div class="col-md-7 col-7 text-right pr-5">
                  <h5 class="ml-4 mt-4 mb-2 font-weight-bold"><?php echo $value; ?></h5>
                  <p class="font-small grey-text"><?php echo $key; ?></p>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
        </div>
      </section>
      <div style="height: 5px"></div>
      <section class="section">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="card mb-4">
              <div class="card-body">
                <table class="table table-striped large-header" id="dtMaterialDesignExample" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <?php
                          $covid_thead="Country, View Map, Cases, Todays Cases, Deaths, Todays Deaths, Recovered, Active, Critical, Tests";
                          $covid_data=explode(", ", $covid_thead);
                          foreach ($covid_data as $row) {echo '<th class="font-weight-bold"><strong>'.$row.'</strong></th>'; }
                      ?>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                            $url='https://corona.lmao.ninja/countries';
                            $json=file_get_contents($url);
                            $json_data=json_decode($json);
                            foreach ($json_data as $data) {
                              echo "<tr>
                                  <td>".$data->country."</td>
                                  <td><a href='https://www.google.com/maps/@".$data->countryInfo->lat.",".$data->countryInfo->long.",5z' target='_blank'><img style='height:50px; width:100px;' src='".$data->countryInfo->flag."'></a></td>
                                  <td>".$data->cases."</td>
                                  <td>".$data->todayCases."</td>
                                  <td>".$data->deaths."</td>
                                  <td>".$data->todayDeaths."</td>
                                  <td>".$data->recovered."</td>
                                  <td>".$data->active."</td>
                                  <td>".$data->critical."</td>
                                  <td>".$data->tests."</td>
                                </tr>";
                            }
                      ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  <footer class="page-footer pt-0 mt-5 mdb-color lighten-4">
    <div class="footer-copyright py-3 text-center">
      <div class="container-fluid">
        © 2019 Copyright: <a href="http://ellee.000webhostapp.com/" target="_blank"> John Ellee Robado </a>
      </div>
    </div>
  </footer>

  <script src="js/addons/datatables.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="js/modules/chart.js"></script>
  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/popper.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <script>
    // SideNav Initialization
    $(".button-collapse").sideNav();

    var container = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(container, {
      wheelSpeed: 2,
      wheelPropagation: true,
      minScrollbarLength: 20
    });

    // Data Picker Initialization
    $('.datepicker').pickadate();

    // Material Select Initialization
    $(document).ready(function () {
      $('.mdb-select').material_select();
    });

    $(document).ready(function () {
      $('#dtMaterialDesignExample').DataTable();
      $('#dtMaterialDesignExample_wrapper').find('label').each(function () {
        $(this).parent().append($(this).children());
      });
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('input').each(function () {
        const $this = $(this);
        $this.attr("placeholder", "Search");
        $this.removeClass('form-control-sm');
      });
      $('#dtMaterialDesignExample_wrapper .dataTables_length').addClass('d-flex flex-row');
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').addClass('md-form');
      $('#dtMaterialDesignExample_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
      $('#dtMaterialDesignExample_wrapper select').addClass('mdb-select');
      $('#dtMaterialDesignExample_wrapper .mdb-select').materialSelect();
      $('#dtMaterialDesignExample_wrapper .dataTables_filter').find('label').remove();
  });

    // Tooltips Initialization
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    });

  </script>

</body>

</html>
