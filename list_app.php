<?php
require('inc/nav.php');
require('admin_nav.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View or List Apps | DSK Solutions</title>
    <script>
        function post_to_url(path, params, method) {
            method = method || "post"; // Set method to post by default, if not specified.

            var form = $(document.createElement("form"))
                .attr({
                    "method": method,
                    "action": path
                });

            $.each(params, function(key, value) {
                $.each(value instanceof Array ? value : [value], function(i, val) {
                    $(document.createElement("input"))
                        .attr({
                            "type": "hidden",
                            "name": key,
                            "value": val
                        })
                        .appendTo(form);
                });
            });

            form.appendTo(document.body).submit();
        }
    </script>
</head>

<body>

    <div class="conainer bg-white table-responsive-sm">
        <br>
        <table class="table table-striped table-light table-sm  p-2 table-bordered" id="view_apps">
            <thead class="table-dark">
                <th>S.I.</th>
                <th>Name</th>
                <th>Photo</th>
                <th>Application Number</th>
                <th>Post Applied</th>
                <th>Amount</th>
                <th>Paid</th>
                <th>Approve</th>
                <th>Actions</th>

            </thead>
            <tbody>

                <?php
                $tempId;
                $SELECT_POSTS = "SELECT * FROM customer";
                $runQuery = $conn->query($SELECT_POSTS);
                while ($row = $runQuery->fetch_assoc()) {
                    $tempId = $row['id'];
                    $payMentQRY = "SELECT * FROM `payments` WHERE `cust_id`='$tempId'";
                    $runPaymentQry = $conn->query($payMentQRY);
                    if (!$paymentFetch = $runPaymentQry->fetch_array()) {
                        echo mysqli_error($conn);
                    }


                ?>


                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['custFName'] . " " . $row['custLName']; ?></td>
                        <td><img src="<?php echo $row['custPhoto']; ?>" height="150px" width="120px"> </td>
                        <td><?php echo $row['app_num']; ?></td>
                        <td><?php echo $row['post_applied']; ?></td>
                        <td><?php echo $row['custPayment']; ?></td>
                        <td><?php
                        if($paymentFetch['succeed']=='Yes')
                        {
                            echo "YES";
                        }
                        else
                        {
                            echo "NO";
                        }
                            ?></td>
                        <td>
                            <fieldset name="approve<?php echo $row['id']; ?>" id="approve_grp<?php echo $row['id']; ?>">
                                <input type="radio" name="approve<?php echo $row['id']; ?>" value="yes" <?php
                                                                                                        if ($row['status'] == 'Approoved') {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                Approve
                                <br>
                                <input type="radio" name="approve<?php echo $row['id']; ?>" value="no" <?php
                                                                                                        if ($row['status'] == 'Rejected') {
                                                                                                            echo "checked";
                                                                                                        } ?> />
                                Reject
                                <br>
                                <input class="radio" type="radio" name="approve<?php echo $row['id']; ?>" <?php
                                                                                                            if ($row['status'] == 'Pending for Approvel') {
                                                                                                                echo "checked";
                                                                                                            } ?>>
                                No Change

                            </fieldset>


                            <script>
                                $('input[type=radio][name=approve<?php echo $row['id']; ?>]').on('change', function() {
                                    switch ($(this).val()) {
                                        case 'yes':
                                            post_to_url('set_status.php', {
                                                app_num: '<?php echo $row['app_num']; ?>',
                                                status: 'Approoved'
                                            }, 'POST');
                                            break;
                                        case 'no':
                                            post_to_url('set_status.php', {
                                                app_num: '<?php echo $row['app_num']; ?>',
                                                status: 'Rejected'
                                            }, 'POST');
                                            break;

                                            case 'change':
                                            post_to_url('set_status.php', {
                                                app_num: '<?php echo $row['app_num']; ?>',
                                                status: 'Pending for Approval'
                                            }, 'POST');
                                            break;
                                    }
                                });
                            </script>
                        </td>
                        <td>
                            <center><a href="view_app.php?appNum=<?php echo $row['app_num']; ?>"><button type="button" class="btn btn-primary">View</button></center></a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <br>
    </div>


</body>

</html>
<script>
    $(document).ready(function() {
        $('#view_apps').DataTable();
    });
</script>
<?php
if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'del') {
        echo "
        <script>
        alert('deleted');
        </script>
        ";
    }
}
?>