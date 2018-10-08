<?php
declare(strict_types=1);

add_action('rest_api_init', function () {
    register_rest_route('api/v1', '/getUserProgress/(?P<articleID>\d+)/(?P<userID>\d+)', [
        'methods' => 'GET',
        'callback' => 'getUserProgress'
    ]);
    register_rest_route('api/v1', '/saveUserProgress/', [
        'methods' => 'POST',
        'callback' => 'saveUserProgress'
    ]);
});

function getUserProgress($data){
    global $wpdb;
    $table_name = $wpdb->prefix . 'articleProgress';
    $sanitized = $wpdb->prepare("SELECT progress FROM $table_name WHERE article_id = %d AND user_id = %d", [$data['articleID'], $data['userID']]);

    $data = $wpdb->get_results($sanitized);

    if ($data)
        return intval($data[0]->progress);
    return 0;
}

function saveUserProgress($request){
    global $wpdb;
    $table_name = $wpdb->prefix . 'articleProgress';
    $result;

    $articleID = intval($request['articleID']);
    $userID = intval($request['userID']);
    $progress = intval($request['progress']);

    $sanitizedCheck = $wpdb->prepare("SELECT * FROM $table_name WHERE article_id = %d AND user_id = %d", [$articleID, $userID]);

    $check = $wpdb->get_results($sanitizedCheck);

    if ($check) {
        $result = $wpdb->query("UPDATE $table_name SET progress = $progress WHERE user_id = $userID AND article_id = $articleID");
        // $result = $wpdb->update(
        //     $table_name,
        //     ['progress' => $progress],
        //     [
        //         'article_id' => $articleID,
        //         'user_id' => $userID
        //     ]
        // );
    } else {
        $result = $wpdb->query("INSERT INTO $table_name (user_id, article_id, progress) VALUES($userID, $articleID, $progress)");
        // $result = $wpdb->insert(
        //     $table_name,
        //     [
        //         'user_id' => $userID,
        //         'article_id' => $articleID,
        //         'progress' => $progress
        //     ]
        // );
    }
    return $result;
}
