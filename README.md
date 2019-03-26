# Pakej Laravel

## Tambah Admin page

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
```

```bash
php artisan migrate
```

```bash
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
```

```bash
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasRoles;

    // ...
}
```

Insert into kernal
```bash
protected $routeMiddleware = [
    // ...
    'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
    'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,
]
```

Run
```bash
php artisan db:seed --class="Iskandarali\Teras\database\seeds\TerasTableSeeder"
```

Add below at resources/views/layouts/app.blade.php
```bash
<ul class="navbar-nav mr-auto">
	@role('admin')
		<li class="nav-item">
			<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
		</li>
	@endrole
</ul>
```



