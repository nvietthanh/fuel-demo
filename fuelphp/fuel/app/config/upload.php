<?php

return array(
    'default' => array(
        'path' => DOCROOT.'uploads/',
        'randomize' => true,
        'ext_whitelist' => array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx'),
        'max_size' => 5 * 1024 * 1024, // 5MB
    ),
);
