<?php

require_once('config.php');


if (isset($_POST['review_text'])) {
    if ($account_type == 'client') {


        $star = $_POST['star'];
        $review_text = $_POST['review_text'];
        $provider_id = $_POST['seller_id'];
        $order_id = $_POST['order_id'];

        $data = [
            'client_id' => $logged_in_user_id,
            'provider_id' => $provider_id,
            'order_id' => $order_id,
            'rating' => $star,
            'review_text' => $review_text
        ];
        $db->insert('review', $data);
        echo redirect("order-page.php?order_id=$order_id");
    } else {

        redirect('orders.php');
    }
}
