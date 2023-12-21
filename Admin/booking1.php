<?php
// session_start ();
if(empty($_SESSION['user']))
{
    ?>
    <script>
        window.location.href="login.php";
        </script>
        <?php
}
else
{
    // session_start ();
    $user = $_SESSION['user'];
    $nik = $_SESSION['nik'];
    $level = $_SESSION['hakAkses'];
?>
<!-- Main content -->
<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col EDIT-->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  BOOKING
                </h3>
                <div class="card-tools">
                  <ul class="nav nav-pills ml-auto">
                    
                    <li class="nav-item">
                      <button type="button" name="btnTambahDatabooking" id="btnTambahDatabooking" data-toggle="modal" data-target="#modalTambahDatabooking" class="btn btn-primary">Tambah Data</button>
                    </li>
                  </ul>
                </div>
              </div><!-- /.card-header -->
              <div class="card-body">
              
              <!-- /.card-header -->
              <div class="card-body">
                <table id="booking" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Id_booking</th>
                    <th>Tgl_booking</th>
                    <th>jam_main</th>
                    <th>jam_selesai</th>
                    <th>Id_lapangan</th>
                    <th>Id_Registrasi</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  include('connect.php');
                  $qryBooking = mysqli_query($koneksi, "select * from booking order by Id_booking ASC");
                  $i=1;
                  while($rowBooking = mysqli_fetch_array($qryBooking))
                  {
                    ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $rowBooking['Id_booking'];?></td>
                        <td><?php echo $rowBooking['Tgl_booking'];?></td>
                        <td><?php echo $rowBooking['jam_main'];?></td>
                        <td><?php echo $rowBooking['durasi'];?></td>
                        <td><?php echo $rowBooking['Id_lapangan'];?></td>
                        <td><?php echo $rowBooking['metode_bayar'];?></td>
                        <td><?php echo $rowBooking['bukti_bayar'];?></td>
                        <td><?php echo $rowBooking['Status'];?></td>
                        <td>
                              <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modalEditDataBooking<?php echo $rowBooking['Id_booking'];?>">Ubah</a>
            <!-- MODAL EDIT -->
            <div id="modalEditDataBooking<?php echo $rowBooking['Id_booking']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Ubah Data Booking</h4>
            </div>
            <div class="modal-body">
                <form name="frmEditDataBooking" id="frmEditDataBooking" method="POST" action="action/editdatabooking.php?id=<?php echo $rowBooking['Id_booking']; ?>" enctype="multipart/form-data">
                    <label style="display:block; text-align:left;">ID BOOKING</label>
                    <input type="text" name="txtEditId_booking" id="txtEditId_booking" class="form-control" value="<?php echo $rowBooking['Id_booking']; ?>" />
                    <br>
                    <label style="display:block; text-align:left;">TANGGAL BOOKING</label>
                    <input type="date" name="txtEditTgl_booking" id="txtEditTgl_booking" class="form-control" value="<?php echo $rowBooking['Tgl_booking']; ?>" />
                    <br/>
                    <label style="display:block; text-align:left;">JAM MAIN</label>
                    <input type="text" name="txtEditJam_main" id="txtEditJam_main" class="form-control" value="<?php echo $rowBooking['jam_main']; ?>" />
                    <br/>
                    <label style="display:block; text-align:left;">Durasi</label>
                    <input type="text" name="txtEditDurasi" id="txtEditDurasi" class="form-control" value="<?php echo $rowBooking['durasi']; ?>" />
                    <br/>
                    <label style="display:block; text-align:left;">ID LAPANGAN</label>
                    <select type="text" name="txtEditId_lapangan" id="txtEditId_lapangan" class="form-control" value="<?php echo $rowBooking['Id_lapangan']; ?>" >
                    <option value="pilih"> </option>
                    <option>lapangan 1</option>
                    <option>lapangan 2</option>
                  </select>
                    <br/>
                    <label style="display:block; text-align:left;">METODE PEMBAYARAN</label>
                    <select type="text" name="txtEditmetode_bayar" id="txtEditmetode_bayar" class="form-control" value="<?php echo $rowBooking['metode_bayar']; ?>">
                    <option value="pilih"> </option>
                    <option>transer bank</option>
                    <option>cash</option>
                    <br/>
                    <label style="display:block; text-align:left;">bukti</label>
                    <input type="text" name="txtEditbukti" id="txtEditbukti" class="form-control" value="<?php echo $rowBooking['bukti_bayar']; ?>" />
                    <br>
                    <label style="display:block; text-align:left;">STATUS</label>
                    <select type="text" name="txtEditStatus" id="txtEditStatus" class="form-control" value="<?php echo $rowBooking['Status']; ?>">
                    <option> </option>
                    <option>Ready</option>
                    <option>sedang diproses</option>
                    <option>Dipakai</option>
                    </select>
                    <br/>
                    <input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan" class="btn btn-primary" />
                    <input type="reset" name="btnBatal" id="btnBatal" value="Batal" class="btn btn-danger" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

            <!-- END MODAL EDIT -->
      <a href="" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#modalHapusDatabooking<?php echo $rowBooking['Id_booking'];?>">Hapus</a>
            <!-- MODAL HAPUS -->
            <div id="modalHapusDatabooking<?php echo $rowBooking['Id_booking']; ?>" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Form Konfirmasi Hapus Data Booking</h4>
            </div>
            <div class="modal-body">
                <h6>Apakah anda yakin menghapus data ini?</h6>
                <form name="frmHapusData" id="frmHapusData" method="POST" action="action/HapusDataBooking.php?id=<?php echo $rowBooking['Id_booking']; ?>" enctype="multipart/form-data">
                    <label style="display:block; text-align:left;">ID Booking</label>
                    <input type="text" name="txtHapusId_booking" id="txtHapusId_booking" class="form-control" value="<?php echo $rowBooking['Id_booking']; ?>" disabled/>
                    <br/>
                    <label style="display:block; text-align:left;">Tanggal Booking</label>
                    <input type="text" name="txtHapusTgl_booking" id="txtHapusTgl_booking" class="form-control" value="<?php echo $rowBooking['Tgl_booking']; ?>" readonly/>
                    <br/>
                    <label style="display:block; text-align:left;">Jam Main</label>
                    <input type="text" name="txtHapusJam_main" id="txtHapusJam_main" class="form-control" value="<?php echo $rowBooking['jam_main']; ?>" readonly/>
                    <br/>
                    <label style="display:block; text-align:left;">Jam Selesai</label>
                    <input type="text" name="txtHapusJam_selesai" id="txtHapusJam_selesai" class="form-control" value="<?php echo $rowBooking['jam_selesai']; ?>" readonly/>
                    <br/>
                    <label style="display:block; text-align:left;">ID Lapangan</label>
                    <input type="text" name="txtHapusId_lapangan" id="txtHapusId_lapangan" class="form-control" value="<?php echo $rowBooking['Id_lapangan']; ?>" readonly/>
                    <br/>
                    <label style="display:block; text-align:left;">ID Registrasi</label>
                    <input type="text" name="txtHapusId_registrasi" id="txtHapusId_registrasi" class="form-control" value="<?php echo $rowBooking['Id_Registrasi']; ?>" readonly/>
                    <br/>
                    <label style="display:block; text-align:left;">Status</label>
                    <input type="text" name="txtHapusStatus" id="txtHapusStatus" class="form-control" value="<?php echo $rowBooking['Status']; ?>" readonly/>
                    <br/>
                    <input type="submit" name="btnHapus" id="btnHapus" value="Hapus" class="btn btn-primary" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<!-- END MODAL HAPUS -->

                        </td>
                    </tr>
                    <?php
                    $i++;
                  }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DIRECT CHAT -->
           
            <!--/.direct-chat -->

            <!-- TO DO List -->
            
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->

            <!-- Map card -->
            <div class="card bg-gradient-primary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-map-marker-alt mr-1"></i>
                  Visitors
                </h3>
                <!-- card tools -->
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button>
                  <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
                <!-- /.card-tools -->
              </div>
              <div class="card-body">
                <div id="world-map" style="height: 250px; width: 100%;"></div>
              </div>
              <!-- /.card-body-->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <div id="sparkline-1"></div>
                    <div class="text-white">Visitors</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-2"></div>
                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <div id="sparkline-3"></div>
                    <div class="text-white">Sales</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.card -->

            <!-- solid sales graph -->
            <div class="card bg-gradient-info">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Sales Graph
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Mail-Orders</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">Online</div>
                  </div>
                  <!-- ./col -->
                  <div class="col-4 text-center">
                    <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                           data-fgColor="#39CCCC">

                    <div class="text-white">In-Store</div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
              <div class="card-header border-0">

                <h3 class="card-title">
                  <i class="far fa-calendar-alt"></i>
                  Calendar
                </h3>
                <!-- tools card -->
                <div class="card-tools">
                  <!-- button with a dropdown -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                      <i class="fas fa-bars"></i>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a href="#" class="dropdown-item">Add new event</a>
                      <a href="#" class="dropdown-item">Clear events</a>
                      <div class="dropdown-divider"></div>
                      <a href="#" class="dropdown-item">View calendar</a>
                    </div>
                  </div>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                <!-- /. tools -->
              </div>
              <!-- /.card-header -->
              <div class="card-body pt-0">
                <!--The calendar -->
                <div id="calendar" style="width: 100%"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- POP UP - FORM TAMBAH DATA JURUSAN -->
    <div id="modalTambahDatabooking" class="modal fade">
      <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
             <h4 class="modal-title">Form Input Data booking</h4>
            </div>
    <div class="modal-body ">
          <form name="frmTambahDatabooking" id="frmTambahDatabooking" method="POST" enctype="multipart/form-data">
            <label>ID BOOKING</label>
            <input type="text" name="txtId_booking" id="txtId_booking" class="form-control" />
            <br/>
            <label>TANGGAL BOOKING</label>
            <input type="date" name="txtTgl_booking" id="txtTgl_booking" class="form-control" />
            <br/>
            <label>JAM MAIN</label>
            <input type="text" name="txtjam_main" id="txtjam_main" class="form-control" />
            <br/>
            <label>JAM SELESAI</label>
            <input type="text" name="txtjam_selesai" id="txtjam_selesai" class="form-control" />
            <br/>
            <label>ID LAPANGAN</label>
            <select type="text" name="txtId_lapangan" id="txtId_lapangan" class="form-control">
                <br/>
            <label>STATUS</label>
            <select type="text" name="txtstatus" id="txtstatus" class="form-control" >
                    <option> </option>
                    <option>Ready</option>
                    <option>sedang diproses</option>
                    <option>Dipakai</option>
                    </select>
                    <br/>
            <input type="submit" name="btnSimpan" id="btnSimpan" value="Simpan" class="btn btn-primary" />
            <input type="reset" name="btnBatal" id="btnBatal" value="Batal" class="btn btn-danger" />
          </form>
        </div>
       <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
          </div>
      </div>
   </div>
 </div>
<!-- END POP UP - FORM TAMBAH DATA JURUSAN -->
    <!-- /.content -->
    <?php
}
?>