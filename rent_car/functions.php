<?php

function check_next($page_num, $page_count) {
    if ($page_count == 0) {
        echo 0;
    } elseif ($page_num < $page_count) {
        echo $page_num+1;
    } else {
        echo $page_num;
    }
}

function check_prev($page_num, $page_count) {
    if ($page_count == 0) {
        echo 0;
    } elseif ($page_num > 0) {
        echo $page_num-1;
    } else {
        echo $page_num;
    }
}