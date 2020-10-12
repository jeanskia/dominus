<?php

return [
    'mission.prefix'=>'/mission',
    'admin.widgets'=> DI\add([
        DI\get(App\Mission\MissionWidgets::class)
    ])
];
