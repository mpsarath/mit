<main id="main" class="main">
    <div class="pagetitle">
        <h1>Employee</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Employee</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Register Employee</h5>
                <span class="text-success"><?= @$msg ?></span>
                <!-- Multi Columns Form -->
                <?= form_open('employee/add', ['id' => 'form_employee']) ?>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="FirstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="FirstName" name="FirstName"  value="<?= set_value('FirstName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('FirstName') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="LastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="LastName" name="LastName"  value="<?= set_value('LastName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('LastName') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="Email" name="Email">
                        <span class="text-danger"><?= service('validation')->getError('Email') ?></span>
                    </div>
                    <div class="col-md-6">
                        <label for="TelNo" class="form-label">Tel. No.</label>
                        <input type="text" class="form-control" id="TelNo" name="TelNo">
                        <span class="text-danger"><?= service('validation')->getError('TelNo') ?></span>
                    </div>
                    <div class="col-12">
                        <label for="Address" class="form-label">Address</label>
                        <textarea class="form-control" id="Address" name="Address" placeholder="1234 Main St"><?= set_value('Address') ?></textarea>
                    </div>
                    <div class="col-6">
                        <label for="DOB" class="form-label">DOB</label>
                        <input type="date" class="form-control" id="DOB" name="DOB" >
                    </div>                    
                    <div class="col-md-6">
                        <label for="District" class="form-label">District</label>
                        <select id="District" class="form-select" name="District" onchange="loadDsDivision(this.value)">
                            <option>--</option>
                            <?php foreach ($district_list as $key => $result) { ?>

                                <option value="<?= $result['Id'] ?>"><?= $result['DistrictName'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="Designation" class="form-label">Designation</label>
                        <select id="Designation" class="form-select" name="Designation" >
                            <option>--</option>
                            <?php foreach ($dlist as $key => $result) { ?>

                                <option value="<?= $result['Id'] ?>"><?= $result['Designation'] ?></option>

                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div id="result"></div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male">
                            <label classMform-check-label" for="male">
                                Male
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" checked>
                            <label class="form-check-label" for="female">
                                Female
                            </label>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="button" onclick="saveEmployee()" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div><!-- End Multi Columns Form -->
                <?= form_close() ?>
            </div>
        </div> 
    </section>
</main>
<script>
    function loadDsDivision(did) {
        var formData = "DistrictId=" + did + "&";
        $.ajax({
            type: 'POST',
            url: '<?= site_url('employee/getdsdivision') ?>',
            data: formData,
            success: function (response) {
                $("#result").html(response);
            },
            error: function (xhr, status, error) {
                alert(error);
            }
        });

    }

</script>



