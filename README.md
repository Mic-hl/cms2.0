## Debugging

### Vue
```
// Debugging
import { usePage } from '@inertiajs/vue3';
const { auth } = usePage().props;
console.log(auth.user);
```
#
#### Props `FortifyServiceProvider.php`
```
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;

Event::listen(Login::class, function ($event) {
    $theme = $event->user->theme;
    session(['theme' => $theme]);
});
```