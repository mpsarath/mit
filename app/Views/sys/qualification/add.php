<main id="main" class="main">

<div class="pagetitle">
        <h1>Employee</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Qualification</a></li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section dashboard">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Add Employee Qualification </h5>
                
                <?= form_open('qulaification/add') ?>
                <div class="col-md-6">
                        <label for="FirstName" class="form-label">Qualification Name</label>
                        <input type="text" class="form-control" id="QName" name="QName"  value="<?= set_value('QName') ?>">
                        <span class="text-danger"><?= service('validation')->getError('QName') ?></span>
                    </div>
                <div class="text-center">
                    <input type="hidden" name="EmployeeId" id="EmployeeId" value="<?= $Id ?>">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                <?= form_close() ?>
            </div>
        </div>
    </section>
</main>