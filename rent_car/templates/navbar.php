<?php
session_start();
$u_type = 0;
$menu_arr = get_menu();
$menu_arr_f = $menu_arr->fetchAll(PDO::FETCH_ASSOC);
$count = count($menu_arr_f);
if(isset($_SESSION['user'])) {
    $u_type = $_SESSION['user'];
}
?>
<nav>
    <ul>
        <?php 
            if ($u_type == 0) {
                $menu_arr = get_menu();
                foreach ($menu_arr as $value) :
        ?>
                <li>
                    <a href="index.php?p=<?=$value["tag"] ?>"><?=$value["menu_point_name"] ?></a>
                </li>
        
        <?php 
                endforeach;
            } elseif($u_type == 1) {
                for ($i = 0; $i < $count-1; $i++) {
                    $value = $menu_arr_f[$i];
            ?>
                    <li>
                        <a href="index.php?p=<?= $value["tag"] ?>"><?= $value["menu_point_name"] ?></a>
                    </li>
        <?php } 
            
        ?>
                    <li>
                        <a href="logout.php">Выйти</a>
                    </li>
        <?php 
        
        } elseif ($u_type == 2) {
            for ($i = 0; $i < $count-1; $i++) {
                $value = $menu_arr_f[$i];
        ?>

            <li>
                <a href="index.php?p=<?= $value["tag"] ?>"><?= $value["menu_point_name"] ?></a>
            </li>
        <?php     
        }
            
        ?>

            <li>
                <a href="logout.php">Выйти</a>
            </li>
            <li>
            <a href="admin.php">Управление</a>
            </li>
        <?php     
        }
            
        ?>
            </ul>
    </nav>