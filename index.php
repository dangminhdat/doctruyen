<?php
require_once 'core/init.php';

if($data_web['trang_thai'] == 0)
{

	require_once 'includes/header.php';

	require_once 'includes/sidebar.php';

	require_once 'includes/footer.php';
}
else
{
	echo "<h1 style='text-align: center'>Website đang trong thời gian bảo trì và nâng cấp</h1>";
}
?>