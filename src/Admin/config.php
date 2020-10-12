<?php

use App\Admin\AdminModule;
use App\Admin\AdminTwigExtension;
use App\Admin\DashboardAction;
use function DI\get;
use function DI\object;

return [
  'admin.prefix'=>'/admin',
  'admin.widgets'=> [],
  AdminTwigExtension::class => object()->constructor(get('admin.widgets')),
  AdminModule::class => object()->constructorParameter('prefix', get('admin.prefix')),
  DashboardAction::class => object()->constructorParameter('widgets', get('admin.widgets'))
];
