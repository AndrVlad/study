<?php
session_start();
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'templates/head-common.php' ?>
    <title>Прокат автомобилей в Орле</title>
</head>
<body>
    <main>

    <?php 

    include 'templates/header.php'; 
    include 'templates/navbar.php';

    ?>

<section class="main-content auth-content">

        <?php
        if(isset($_SESSION["add_card"])) {
                        echo '<div class="auth">
                        <p class="msg" style="color: green;">Карточка добавлена успешно</p>
                        </div>';
                    }
                    unset($_SESSION["add_card"]);

        $statement = get_data_car_page($_POST['car_id']);
        $data_car= $statement->fetch(PDO::FETCH_ASSOC); 
        $_SESSION['car_id'] = $_POST['car_id'];

        if ($data_car) {
            $desc = $data_car['description'];
            $price = $data_car['rent_price']; 
        }
        ?>
    <div class="auth">
        <h1>Редактирование информации</h1>
        <form action="functions/edit-script.php" method="POST">
            <label>
                Описание
            </label>
                <textarea name="description" placeholder="Введите текст" maxlength="1500"
                value=""><?php echo $desc; ?></textarea>
            
            <label>
                Стоимость проката
            </label>
                <input type="text" name="rent_price" placeholder="Стоимость" required
                minlength="4" maxlength="6" pattern="\d{3,}" value="<?php echo $price+0; ?>">
            <div class="wrap">
                <button type="submit" value="1">
                    Добавить
                </button>
            </div>
        </form>
    </div>
            
        </section>

<?php
    include 'templates/footer.php';

    ?>