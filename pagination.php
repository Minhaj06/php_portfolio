<tbody>
    <?php

    if (isset($_GET['page'])) {
        $page_no = $_GET['page'];
    } else {
        $page_no = 1;
    }

    $limit = $record_2;
    $offset = ($page_no - 1) * $limit;

    // for count total records and grand total of jobcards
    $get_total = "SELECT * FROM jobcards WHERE jobcard_type='$jobcard_type' AND jobcard_date BETWEEN '$session_start' AND '$session_end' ORDER BY jobcard_date DESC";
    $run_get_total = mysqli_query($conn, $get_total);
    $total_records = mysqli_num_rows($run_get_total);
    $grand_total;
    $result_heading = "Total Jobcards ";
    while ($records = mysqli_fetch_assoc($run_get_total)) {
    }


    //fetch according to pagination data

    $get_data = "SELECT * FROM jobcards WHERE jobcard_type='$jobcard_type' AND jobcard_date BETWEEN '$session_start' AND '$session_end' ORDER BY jobcard_date DESC LIMIT $record_2 OFFSET $offset";

    $run_get_data = mysqli_query($conn, $get_data);
    $results = mysqli_num_rows($run_get_data);

    $sn = $offset;

    while ($records = mysqli_fetch_assoc($run_get_data)) {
        $sn += 1;
        $invoice_value = round(($records['taxable_18'] + $records['taxable_18'] * 18 / 100) + ($records['taxable_28'] + $records['taxable_28'] * 28 / 100) + ($records['labour'] + $records['labour'] * 18 / 100));
        $grand_total += $invoice_value;

        echo "<tr style='border-bottom:1px dotted grey;'>
                    <td>" . $sn . "</td>
                    <td>" . date("d-m-Y", strtotime($records['jobcard_date'])) . "</td>
                    <td>" . $records['cust_name'] . "</td>
                    <td>" . $records['cust_mobile'] . "</td>
                    <td>" . $records['invoice_no'] . "</td>
                    <td>" . $records['taxable_18'] . "</td>
                    <td>" . $records['taxable_28'] . "</td>
                    <td>" . $records['labour'] . "</td>
                    <td>" . $records['others'] . "</td>
                    <td style='text-align:center;color:blue;font-weight:bold;'>" . $invoice_value . "</td>
                    <td style='padding-left:40px;'>
                    
                        <div style='float:left;'><form action='update_jobcard_voucher.php' method='GET'><input style='display:none;' type='text' name='jobcard_id' value=" . $records['jobcard_id'] . "><button type='submit' style='border:none;background:none;' onclick=''><i title='Edit Customer Detail' class='icon fa fa-edit' aria-hidden='true' style='color:green;'></i>&nbsp;</button></form></div>

                        <div style='float:left;'><form action='delete_jobcard_voucher.php' method='GET'><input style='display:none;' type='text' name='jobcard_id' value=" . $records['jobcard_id'] . "><button type='submit' style='border:none;background:none;' onclick=''><i title='Edit Customer Detail' class='icon fa fa-trash' aria-hidden='true' style='color:red;'></i>&nbsp;</button></form></div>

                    </td>
                </tr>";
    }

    ?>
</tbody>
</table>

<!----- Pagination --------------->

<div class="pagination">
    <?php
    $pagination = "SELECT * FROM jobcards WHERE jobcard_type='$jobcard_type' AND jobcard_date BETWEEN '$session_start' AND '$session_end'";
    $run_pagination = mysqli_query($conn, $pagination);

    if (mysqli_num_rows($run_pagination) > 0) {
        $records = mysqli_num_rows($run_pagination);
        $limit = $record_2;
        $pages = ceil($records / $limit);
    }

    $start = ($page_no - 4);
    switch ($start) {
        case 0:
            $start = 1;
        case -1:
            $start = 1;
        case -2:
            $start = 1;
        case -3:
            $start = 1;
    }
    $end = ($page_no + 7);
    if ($end > $pages) {
        $end = $pages;
    }


    echo "<ul>";
    if ($page_no >= 2) {
        echo "<a href='jobcard_register.php?jobcard_type=" . $jobcard_type . "&page=1'<li class='page $act_dect'>First</li></a>";
        echo "<a href='jobcard_register.php?jobcard_type=" . $jobcard_type . "&page=" . ($page_no - 1) . "'<li class='page $act_dect'>&laquo;</li></a>";
    }

    for ($i = $start; $i <= $end; $i++) {
        if ($i == $page_no) {
            $act_dect = "active_page";
        } else {
            $act_dect = "";
        }
        echo "<a href='jobcard_register.php?jobcard_type=" . $jobcard_type . "&page=" . $i . "'<li class='page $act_dect'>" . $i . "</li></a>";
    }
    if ($page_no < $pages) {
        echo "<a href='jobcard_register.php?jobcard_type=" . $jobcard_type . "&page=" . ($page_no + 1) . "'<li class='page $act_dect'>&raquo;</li></a>";
        echo "<a href='jobcard_register.php?jobcard_type=" . $jobcard_type . "&page=" . $pages . "'<li class='page $act_dect'>Last</li></a>";
    }
    if ($pages > 1) {
        echo "<li style='margin-left:20px;'>" . $page_no . "&nbsp;of&nbsp;" . $pages . "&nbsp;Pages</li>";
    }
    echo "</ul>";
    ?>
</div>
<!----- Pagination end here --------------->