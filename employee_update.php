<?php
//echo "update page";
function employee_update(){
    //echo "update page in";
    $i=$_GET['id'];
    global $wpdb;
    $table_name = $wpdb->prefix . 'employee_list';
    $employees = $wpdb->get_results("SELECT id,name,address,contact,role from $table_name where id=$i");
    echo $employees[0]->id;
    ?>
    <table>
        <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <form name="frm" action="#" method="post">
            <input type="hidden" name="id" value="<?= $employees[0]->id; ?>">
            <tr>
                <td>Name:</td>
                <td><input type="text" name="nm" value="<?= $employees[0]->name; ?>"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="adrs" value="<?= $employees[0]->address; ?>"></td>
            </tr>
            <tr>
                <td>Desigination:</td>
                <td><select name="des">
                        <option value="developer" <?php if($employees[0]->role=="developer"){echo "selected";} ?> >Developer</option>
                        <option value="designer" <?php if($employees[0]->role=="designer"){echo "selected";} ?> >Designer</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Mob no:</td>
                <td><input type="number" name="mob" value="<?= $employees[0]->contact; ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Update" name="upd"></td>
            </tr>
        </form>
        </tbody>
    </table>
    <?php
}
if(isset($_POST['upd']))
{
    global $wpdb;
    $table_name=$wpdb->prefix.'employee_list';
    $id=$_POST['id'];
    $nm=$_POST['nm'];
    $ad=$_POST['adrs'];
    $d=$_POST['des'];
    $m=$_POST['mob'];
    $wpdb->update(
        $table_name,
        array(
            'name'=>$nm,
            'address'=>$ad,
            'role'=>$d,
            'contact'=>$m
        ),
        array(
            'id'=>$id
        )
    );
    $url=admin_url('admin.php?page=Employee_List');
    header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
}
?>