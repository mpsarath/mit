<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employee</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                <li class="breadcrumb-item active">View</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
              <h5 class="card-title">Default Table</h5>

              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Tel. No.</th>
                    <th scope="col">Email</th>
                    <th scope="col">DOB</th>
                    <th scope="col">District</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach ($list as $key=>$result){ ?>
                  <tr>
                    <th scope="row">1</th>
                    <td><?= $result['FirstName'] ?></td>
                    <td><?= $result['Address'] ?></td>
                    <td><?= $result['TelNo'] ?></td>
                    <td><?= $result['Email'] ?></td>
                    <td><?= $result['DOB'] ?></td>
                    <td><?= $result['District'] ?></td>
                  </tr>
                    <?php } ?>
                  
                </tbody>
              </table>
              <!-- End Default Table Example -->
            </div>
          </div>
    </section>
</main>