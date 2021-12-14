<?php include "template/header.php"; ?>
<?php global $url; ?>
<div class="col-9">
    <div class="card">
        <div class="card-body">
            <h4 class="d-flex justify-content-between mb-0 align-items-center">
                <div class="">
                    <i class="feather-list"></i> Contact List
                </div>
                <a href="<?php echo $url; ?>/contact_add.php" class="text-decoration-none mb-0">
                    <i class="feather-user-plus"></i>
                </a>
            </h4>
            <hr>
            <table class="table table-hover rounded">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Profile</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Control</th>
                    <th>Created</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach (contacts() as $c){ ?>

                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td>
                            <img src="<?php echo $url; ?>/<?php echo $c['photo']; ?>"
                                 class="border rounded-circle" style="width: 40px;"
                                 alt=""
                            >
                        </td>
                        <td><?php echo $c['name']; ?></td>
                        <td><?php echo $c['phone']; ?></td>
                        <td>
                            <a href="<?php echo $url; ?>/contact_delete.php?id=<?php echo $c['id']; ?>"
                               onclick="return confirm('Are you sure to delete?')"
                               class="text-decoration-none mx-1 btn btn-sm">
                                <i class="feather-trash-2"></i>
                            </a>
                            <a href="<?php echo $url; ?>/contact_edit.php?id=<?php echo $c['id']; ?>" class="text-decoration-none mx-1 btn btn-sm">
                                <i class="feather-edit-2"></i>
                            </a>
                        </td>
                        <td class="nowrap"><?php echo showTime($c['created_at']); ?></td>
                    </tr>

                <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include "template/footer.php"; ?>
<script>
    $('.table').dataTable();
</script>

