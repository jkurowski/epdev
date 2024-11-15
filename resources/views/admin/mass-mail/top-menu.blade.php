@include('components.top-menu', [
    'items' => [
        [
            'name' => 'Newsletter',
            'icon' => 'fe-mail',
            'route' => route('admin.mass-mail.index'),
            'active' => request()->routeIs('admin.mass-mail.index'),
        ],
        [
            'name' => 'Harmonogram wysyłki',
            'icon' => 'fe-calendar',
            'route' => route('admin.mass-mail.schedule'),
            'active' => request()->routeIs('admin.mass-mail.schedule'),
        ],
    ],
])
