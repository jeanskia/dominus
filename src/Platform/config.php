<?php

return [
    'agent.prefix'=>'/agent',
    'admin.widgets'=> DI\add([
        DI\get(\App\Platform\PlatformWidgets::class)
    ])
];
