<?php include "template/header.php"; ?>
<?php global $url; ?>

<div class="col-5">
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex justify-content-between align-items-center mb-0">
                <div class="">
                    <i class="feather-plus-circle"></i> Update Contact
                </div>
                <a href="<?php echo $url; ?>/index.php" class="text-decoration-none mb-0">
                    <i class="feather-list"></i>
                </a>
            </h4>
            <hr>
            <?php

            $id = $_GET['id'];
            $current = contact($id);

            if  (isset($_POST['editBtn'])){
                request('contactEdit','index.php');
            }

            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class="form-group w-100 mb-3">
                    <label for="photo" class="form-label"><i class="feather-image"></i> Profile</label>
                    <input type="file" class="form-control rounded-pill" name="photo">
                    <?php if (getError('photo')){ ?>
                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('photo'); ?></small>
                    <?php }; ?>
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="name" class="form-label"> <i class="feather-user"></i> Name</label>
                    <input type="text" name="name" value="<?php echo $current['name']; ?>" class="form-control rounded-pill" placeholder="Enter Name">
                    <?php if(getError('name')){ ?>
                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('name'); ?></small>
                    <?php } ?>
                </div>
                <div class="form-group w-100 mb-3">
                    <label for="phone" class="form-label"> <i class="feather-phone"></i> Phone Number</label>
                    <input type="text" name="phone" value="<?php echo $current['phone']; ?>" class="form-control rounded-pill" placeholder="Enter Phone Number">
                    <?php if(getError('phone')){ ?>
                        <small class="fw-bold text-danger" style="margin-left: 10px;"><?php echo getError('phone'); ?></small>
                    <?php } ?>
                </div>
                <div class="">
                    <button name="editBtn" class="btn float-end">
                        <i class="feather-plus"></i>
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
