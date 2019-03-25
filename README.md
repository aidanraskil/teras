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

