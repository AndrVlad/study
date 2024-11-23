<?php

    include 'functions.php';

    $num_of_cards = 3;

    // $car_classes = array(1 => "Эконом класс", "Средний класс","Премиум класс");
    // $card_car_econom = array("1", "4");
    // $card_car_medium = array("3");
    // $card_car_premium = array("2","5");

    $card_car_classes = array(  
        1=> array("1", "4","1","1","1"), 
        2=> array("3"), 
        3=> array("2", "5")
    );

    //$all_car = array("1", "4", "3", "2", "5","5","5","5","1");

    $cur_class;

    if (!isset($_GET['class']) || ($_GET['class']) == 0) {
        $cur_class = 0;
        //$card_car = $all_car;
        $card_car = get_catalog_card_data($cur_class);
        $num_of_cards_from_query = get_num_catalog_card_data($cur_class);
        
    } else {
        $cur_class = $_GET['class'];
        //$card_car = $card_car_classes[$cur_class];
        $card_car = get_catalog_card_data($cur_class);
        $num_of_cards_from_query = get_num_catalog_card_data($cur_class);
    }

    if(isset($_POST["btn1"])) {    
        $card_car = get_catalog_search($_POST["brand"],$_POST["year"]);
    }

    $row_count = $card_car->rowCount(); 
    
    $page_count = floor($row_count / $num_of_cards); // rep card_car

    if($row_count % $num_of_cards == 0) { // rep card_car=>count_of_cards
        $page_count = $page_count - 1;
    }
    
    if (!isset($_GET['page_cat'])) {
        $page = 0;
    } else {
        $page = $_GET['page_cat'];
    }


 