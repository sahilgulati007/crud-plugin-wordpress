<?php
//echo "employee delete";
function employee_delete(){
    echo "employee delete";
    if(isset($_GET['id'])){
        global $wpdb;
        $table_name=$wpdb->prefix.'employee_list';
        $i=$_GET['id'];
        $wpdb->delete(
            $table_name,
            array('id'=>$i)
        );
        echo "deleted";
    }
    echo get_site_url() .'/wp-admin/admin.php?page=Employee_List';
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing" />
    <?php
    //wp_redirect( admin_url('admin.php?page=page=Employee_List'),301 );
    //exit;
    //header("location:http://localhost/wordpressmyplugin/wordpress/wp-admin/admin.php?page=Employee_Listing");
}
?>