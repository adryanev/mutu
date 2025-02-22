<?php
$ini = parse_ini_file(__DIR__.'/../../system-configuration.ini');

return [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'instansi'=>$ini['instansi'],
    'nama_sistem'=>$ini['nama_sistem'],
    'mdm.admin.configs' => [
        'advanced' => [
            'app-admin' => [
                '@common/config/main.php',
                '@common/config/main-local.php',
                '@admin/config/main.php',
                '@admin/config/main-local.php',
            ],
            'app-akreditasi' => [
                '@common/config/main.php',
                '@common/config/main-local.php',
                '@akreditasi/config/main.php',
                '@akreditasi/config/main-local.php',
            ],
            'app-monitoring' => [
                '@common/config/main.php',
                '@common/config/main-local.php',
                '@monitoring/config/main.php',
                '@monitoring/config/main-local.php',
            ],
        ],
    ],
];
