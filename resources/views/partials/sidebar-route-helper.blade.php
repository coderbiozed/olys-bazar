@php
    $currentRoute = Route::currentRouteName() ?? '';
    $routeActive = static function (string ...$routes) use ($currentRoute): bool {
        return in_array($currentRoute, $routes, true);
    };
    $menuActive = static function (string ...$routes) use ($routeActive): string {
        return $routeActive(...$routes) ? 'mm-active' : '';
    };
    $submenuShow = static function (string ...$routes) use ($routeActive): string {
        return $routeActive(...$routes) ? 'mm-show' : '';
    };
@endphp
