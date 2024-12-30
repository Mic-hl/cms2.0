## Debugging

### Vue
```
// Debugging
import { usePage } from '@inertiajs/vue3';
const { auth } = usePage().props;
console.log(auth.user);
```