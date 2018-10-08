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
    $data = $request->get_params();

    $sanitizedCheck = $wpdb->prepare("SELECT * FROM $table_name WHERE article_id = %d AND user_id = %d", [$data['articleID'], $data['userID']]);

    $check = $wpdb->get_results($sanitizedCheck);

    if ($check) {
        return $wpdb->update(
            $table_name,
            ['progress' => $data['progress']],
            [
                'article_id' => $data['articleID'],
                'user_id' => $data['userID']
            ]
        );
    } else {
        return $wpdb->insert(
            $table_name,
            [
                'user_id' => $data['userID'],
                'article_id' => $data['articleID'],
                'progress' => $data['progress']
            ]
        );
    }
}
