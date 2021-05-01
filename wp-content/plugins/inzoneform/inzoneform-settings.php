
<?php
// DB

include_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/wp-load.php');
global $wpdb;

$charset_collate = $wpdb->get_charset_collate();

$sql = "CREATE TABLE wp_inzoneform (
id int(3) NOT NULL AUTO_INCREMENT,
mail varchar(90) NOT NULL,
host varchar(90) NOT NULL,
username varchar(90) NOT NULL,
password varchar(90) NOT NULL,
port varchar(90) NOT NULL,
PRIMARY KEY (id)
) $charset_collate;";

require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);

// Post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Set a 200 (okay) response code.

    $table = 'wp_inzoneform';
    $data = array(
        'mail' => $_POST['mail'],
        'host' => $_POST['host'],
        'username' => $_POST['username'],
        'password' => $_POST['password'],
        'port' => $_POST['port']
    );
    $format = array(
        '%s',
        '%s',
        '%s',
        '%s',
        '%s'
    );
    $success = $wpdb->insert($table, $data, $format);
    if ($success == '1') {

        echo "Data has been save";
        exit;
    }
}
