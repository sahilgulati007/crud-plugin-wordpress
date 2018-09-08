<?php

function employee_list() {
    ?>
    <style>
        table {
            border-collapse: collapse;


        }

        table, td, th {
            border: 1px solid black;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="wrap">
        <table>
            <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Address</th>
                <th>Role</th>
                <th>Contact</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $wpdb;
            $table_name = $wpdb->prefix . 'employee_list';
            $employees = $wpdb->get_results("SELECT id,name,address,contact,role from $table_name");
            foreach ($employees as $employee) {
                ?>
                <tr>
                    <td><?= $employee->id; ?></td>
                    <td><?= $employee->name; ?></td>
                    <td><?= $employee->address; ?></td>
                    <td><?= $employee->role; ?></td>
                    <td><?= $employee->contact; ?></td>
                    <td><a href="<?php echo admin_url('admin.php?page=Employee_Update&id=' . $employee->id); ?>">Update</a> </td>
                    <td><a href="<?php echo admin_url('admin.php?page=Employee_Delete&id=' . $employee->id); ?>"> Delete</a></td>
                </tr>
            <?php } ?>

            </tbody>
            <!--<tbody>
            <tr>
                <td>1</td>
                <td>Hardik K. Vyas</td>
                <td>Php Developer</td>
                <td>+91 940894578</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mark M. Knight</td>
                <td>Blog Writer</td>
                <td>630-531-9601</td>
            </tr>
            <tr>
                <td>3</td>
                <td>Annie D. Naccarato</td>
                <td>Project Leader</td>
                <td>144-54-XXXX</td>
            </tr>
            <tr>
                <td>4</td>
                <td>Jayesh P. Patel</td>
                <td>Web Designer</td>
                <td>+91 98562315</td>
            </tr>
            <tr>
                <td>5</td>
                <td>Alvin B. Reddick</td>
                <td>ifone Developer</td>
                <td>619-11-XXXX</td>
            </tr>
            </tbody>-->
        </table>
    </div>
    <?php

}
add_shortcode('short_employee_list', 'employee_list');
?>