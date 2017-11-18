<?php
require '../../class/connect.php';

$sql = "select `Id` as leID, date(booking_date) as booking_date, date_format(start_time, '%H:%i') as startTime, date_format(end_time, '%H:%i') as endTime, duration, customer_id, "
        . "customer_name, worker_id, worker_name, comment, status, price "
        . "from booking;";

$result = mysqli_query($conn, $sql);
?>
<table class="table table-bordered" cellspacing="0" width="100%" id="bookingTable">
    <thead>
        <tr>
            <th style="width:5%">Reservation No</th>
            <th style="width:5%">Date</th>
            <th style="width:5%">Start Time</th>
            <th style="width:5%">End Time</th>
            <th style="width:5%">Duration</th>
            <th>Customer</th>
            <th>Worker</th>
            <th>Comment</th>
            <th>Price(RM)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>Reservation No</th>
            <th>Date</th>
            <th>Start Time</th>
            <th>End Time</th>
            <th>Duration</th>
            <th>Customer</th>
            <th>Worker</th>
            <th>Comment</th>
            <th>Price(RM)</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        while ($obj = mysqli_fetch_object($result)) {
            $td_class = "";
            $tempStatus = "";
            $canEdit = false;

            if (strcasecmp($obj->status, "0") == 0) {
                $td_class = "success";
                $tempStatus = "New";
                $canEdit = true;
            } else if (strcasecmp($obj->status, "1") == 0) {
                $td_class = "info";
                $tempStatus = "Completed";
                $canEdit = false;
            } else if (strcasecmp($obj->status, "2") == 0) {
                $td_class = "danger";
                $tempStatus = "Canceled";
                $canEdit = false;
            }
            ?>
            <tr class="<?= $td_class ?>">
                <td style="width:5%"><?= $obj->leID ?></td>
                <td style="width:5%"><?= $obj->booking_date ?></td>
                <td style="width:5%"><?= $obj->startTime ?></td>
                <td style="width:5%"><?= $obj->endTime ?></td>
                <td style="width:5%"><?= $obj->duration ?></td>
                <td><?= $obj->customer_name ?></td>
                <td><?= $obj->worker_name ?></td>
                <td><?= $obj->comment ?></td>
                <td><?= $obj->price ?></td>
                <td><?= $tempStatus ?></td>
                <td>
                    <input type="hidden" id="b_obj" value='<?=  json_encode($obj)?>'>
                    <div class="btn-group">
                        <?php if($canEdit){
                        ?>
                        <span>
                            <button id="btnUpdateModal" type="button" class="btn btn-sm btn-success"><i class="fa fa-pencil-square"></i> Update</button>
                        </span>
                        
                        <?php
                        }?>
                        
                        <span>
                            <button id="btnViewModal" type="button" class="btn btn-sm btn-default" ><i class="fa fa-info-circle"></i> View</button>
                        </span>
                        
                        <span>
                            <button id="btnDelete" type="button" class="btn btn-sm btn-danger" ><i class="fa fa-times"></i> Delete</button>
                        </span>

                    </div>
                </td>
            </tr>
    <?php
}//end while
?>

    </tbody>
</table>

<script>
    $(function () {
        // Setup - add a text input to each footer cell
        $('#bookingTable tfoot th').each(function () {
            var title = $(this).text();
            $(this).html('<input class="form-control" type="text" placeholder="Search ' + title + '" />');
        });

        var table = $('#bookingTable').DataTable();

        // Apply the search
        table.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                            .search(this.value)
                            .draw();
                }
            });
        });
    });

</script>

