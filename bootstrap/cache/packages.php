<?php return array (
  'apiato/core' => 
  array (
    'providers' => 
    array (
      0 => 'Apiato\\Core\\Providers\\ApiatoServiceProvider',
      1 => 'Vinkla\\Hashids\\HashidsServiceProvider',
      2 => 'Prettus\\Repository\\Providers\\RepositoryServiceProvider',
      3 => 'Spatie\\Fractal\\FractalServiceProvider',
      4 => 'Apiato\\Core\\Generator\\GeneratorsServiceProvider',
    ),
    'aliases' => 
    array (
      'Hashids' => 'Vinkla\\Hashids\\Facades\\Hashids',
      'Fractal' => 'Spatie\\Fractal\\Facades\\Fractal',
    ),
  ),
  'apiato/documentation-generator-container' => 
  array (
    'providers' => 
    array (
      0 => 'App\\Containers\\Vendor\\Documentation\\Providers\\DocumentGeneratorServiceProvider',
    ),
  ),
  'barryvdh/laravel-debugbar' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\Debugbar\\ServiceProvider',
    ),
    'aliases' => 
    array (
      'Debugbar' => 'Barryvdh\\Debugbar\\Facades\\Debugbar',
    ),
  ),
  'barryvdh/laravel-ide-helper' => 
  array (
    'providers' => 
    array (
      0 => 'Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider',
    ),
  ),
  'blade-ui-kit/blade-heroicons' => 
  array (
    'providers' => 
    array (
      0 => 'BladeUI\\Heroicons\\BladeHeroiconsServiceProvider',
    ),
  ),
  'blade-ui-kit/blade-icons' => 
  array (
    'providers' => 
    array (
      0 => 'BladeUI\\Icons\\BladeIconsServiceProvider',
    ),
  ),
  'joserick/laravel-livewire-discover' => 
  array (
    'providers' => 
    array (
      0 => 'Joserick\\LaravelLivewireDiscover\\LaravelLivewireDiscoverServiceProvider',
    ),
    'aliases' => 
    array (
      'LaravelLivewireDiscover' => 'Joserick\\LaravelLivewireDiscover\\Facades\\LaravelLivewireDiscover',
    ),
  ),
  'laravel/passport' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Passport\\PassportServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'livewire/livewire' => 
  array (
    'providers' => 
    array (
      0 => 'Livewire\\LivewireServiceProvider',
    ),
    'aliases' => 
    array (
      'Livewire' => 'Livewire\\Livewire',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
  'nunomaduro/termwind' => 
  array (
    'providers' => 
    array (
      0 => 'Termwind\\Laravel\\TermwindServiceProvider',
    ),
  ),
  'prettus/l5-repository' => 
  array (
    'providers' => 
    array (
      0 => 'Prettus\\Repository\\Providers\\RepositoryServiceProvider',
    ),
  ),
  'robsontenorio/mary' => 
  array (
    'providers' => 
    array (
      0 => 'Mary\\MaryServiceProvider',
    ),
    'aliases' => 
    array (
      'Mary' => 'Mary\\Facades\\Mary',
    ),
  ),
  'ryangjchandler/blade-tabler-icons' => 
  array (
    'providers' => 
    array (
      0 => 'RyanChandler\\TablerIcons\\BladeTablerIconsServiceProvider',
    ),
  ),
  'spatie/laravel-fractal' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Fractal\\FractalServiceProvider',
    ),
    'aliases' => 
    array (
      'Fractal' => 'Spatie\\Fractal\\Facades\\Fractal',
    ),
  ),
  'spatie/laravel-ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\LaravelIgnition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Spatie\\LaravelIgnition\\Facades\\Flare',
    ),
  ),
  'spatie/laravel-permission' => 
  array (
    'providers' => 
    array (
      0 => 'Spatie\\Permission\\PermissionServiceProvider',
    ),
  ),
  'staudenmeir/laravel-adjacency-list' => 
  array (
    'providers' => 
    array (
      0 => 'Staudenmeir\\LaravelAdjacencyList\\IdeHelperServiceProvider',
    ),
  ),
  'staudenmeir/laravel-cte' => 
  array (
    'providers' => 
    array (
      0 => 'Staudenmeir\\LaravelCte\\DatabaseServiceProvider',
    ),
  ),
  'vinkla/hashids' => 
  array (
    'aliases' => 
    array (
      'Hashids' => 'Vinkla\\Hashids\\Facades\\Hashids',
    ),
    'providers' => 
    array (
      0 => 'Vinkla\\Hashids\\HashidsServiceProvider',
    ),
  ),
);