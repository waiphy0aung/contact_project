<?php include "template/header.php"; ?>
<?php global $url; ?>

<div class="col-5">
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex justify-content-between align-items-center mb-0">
                <div class="">
                    <i class="feather-plus-circle"></i> Add a Contact
                </div>
                <a href="<?php echo $url; ?>/index.php" class="text-decoration-none mb-0">
                    <i class="feather-list"></i>
                </a>
            </h4>
            <hr>
            <?php

            if  (isset($_POST['submit'])){

                request('contactAdd');

            }

            ?>
            <form action="" method="post">
                <div class="form-group w-50 mb-3">
                    <label for="name" class="form-label"> <i class="feather-user"></i> Name</label>
                    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter Name">
                    <?php if(getError('name')){ ?>
                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('name'); ?></small>
                    <?php } ?>
                </div>
                <div class="form-group w-50 mb-3">
                    <label for="phone" class="form-label"> <i class="feather-phone"></i> Phone Number</label>
                    <input type="text" name="phone" class="form-control rounded-pill" placeholder="Enter Phone Number">
                    <?php if(getError('phone')){ ?>
                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('phone'); ?></small>
                    <?php } ?>
                </div>
                <div class="">
                    <button name="submit" class="btn">
                        <i class="feather-plus"></i>
                        Add
                    </button>
                    <?php if(getSuccess('submit')){ ?>
                        <small class="fw-bold text-success" style="margin-left: 10px;"><?php echo getSuccess('submit'); ?></small>
                    <?php } ?>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<?php cleanError(); ?>
