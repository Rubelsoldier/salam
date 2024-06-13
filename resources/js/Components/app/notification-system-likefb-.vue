To implement a real-time notification system in your Laravel and Vue.js project, similar to Facebook's notification icon, you can follow these steps:

1. **Set Up Laravel Notifications**: Use Laravel's built-in notification system to handle notifications.
2. **Use Laravel Echo and Pusher for Real-time Notifications**: This will enable real-time updates.
3. **Display Notifications in Vue.js**: Use Vue.js to display the notifications and update the notification count dynamically.

### Step 1: Set Up Laravel Notifications

First, create a notification class in Laravel:

```sh
php artisan make:notification FollowNotification
```

Edit the notification class (`app/Notifications/FollowNotification.php`) to define how the notification should be delivered:

```php
<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FollowNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $follower;

    public function __construct($follower)
    {
        $this->follower = $follower;
    }

    public function via($notifiable)
    {
        return ['mail', 'database', 'broadcast'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line($this->follower->name . ' has followed you.')
                    ->action('View Profile', url('/profile/' . $this->follower->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'follower_id' => $this->follower->id,
            'follower_name' => $this->follower->name,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'data' => $this->toArray($notifiable),
        ];
    }
}
```

### Step 2: Use Laravel Echo and Pusher for Real-time Notifications

1. **Install Laravel Echo and Pusher**:

```sh
composer require pusher/pusher-php-server
npm install --save laravel-echo pusher-js
```

2. **Configure Pusher** in your `.env` file:

```env
PUSHER_APP_ID=your-pusher-app-id
PUSHER_APP_KEY=your-pusher-app-key
PUSHER_APP_SECRET=your-pusher-app-secret
PUSHER_APP_CLUSTER=your-pusher-app-cluster
BROADCAST_DRIVER=pusher
```

3. **Configure `broadcasting.php`**:

```php
'connections' => [
    'pusher' => [
        'driver' => 'pusher',
        'key' => env('PUSHER_APP_KEY'),
        'secret' => env('PUSHER_APP_SECRET'),
        'app_id' => env('PUSHER_APP_ID'),
        'options' => [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ],
    ],
    // Other connections...
],
```

4. **Broadcast the Notification**:

Make sure you have the `BroadcastServiceProvider` enabled in `config/app.php`:

```php
App\Providers\BroadcastServiceProvider::class,
```

5. **Set Up Laravel Echo in your `resources/js/bootstrap.js`**:

```js
import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    forceTLS: true
});
```

### Step 3: Display Notifications in Vue.js

1. **Create a Vue Component for Notifications**:

Create a `NotificationComponent.vue` file:

```vue
<template>
    <div>
        <div @click="showNotifications">
            <i class="fa fa-bell"></i>
            <span v-if="notifications.length" class="notification-count">{{ notifications.length }}</span>
        </div>
        <div v-if="showNotificationList" class="notification-list">
            <ul>
                <li v-for="notification in notifications" :key="notification.id">
                    {{ notification.data.follower_name }} followed you.
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            notifications: [],
            showNotificationList: false,
        };
    },
    mounted() {
        axios.get('/api/notifications').then(response => {
            this.notifications = response.data;
        });

        Echo.private('App.Models.User.' + Laravel.userId)
            .notification((notification) => {
                this.notifications.push(notification);
            });
    },
    methods: {
        showNotifications() {
            this.showNotificationList = !this.showNotificationList;
        }
    }
};
</script>

<style>
.notification-count {
    background-color: red;
    color: white;
    border-radius: 50%;
    padding: 2px 8px;
}
.notification-list {
    background: white;
    position: absolute;
    top: 20px;
    right: 0;
    border: 1px solid #ddd;
    z-index: 1000;
}
</style>
```

2. **Set Up the API Route**:

In `routes/api.php`, add a route to fetch notifications:

```php
use App\Http\Controllers\NotificationController;

Route::get('/notifications', [NotificationController::class, 'index']);
```

3. **Create the NotificationController**:

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return $request->user()->notifications;
    }
}
```

4. **Include the Component in Your Blade Template**:

In your main Blade template file, include the Vue component:

```html
<div id="app">
    <notification-component></notification-component>
</div>

<script src="{{ mix('js/app.js') }}"></script>
```

5. **Register the Component in Vue**:

In your `resources/js/app.js`:

```js
Vue.component('notification-component', require('./components/NotificationComponent.vue').default);

const app = new Vue({
    el: '#app',
});
```

### Summary

By following these steps, you will have a real-time notification system where notifications are displayed on an icon, and clicking the icon will show the detailed notifications. Notifications are sent via email, stored in the database, and broadcast in real-time using Laravel Echo and Pusher. The Vue.js component handles displaying the notifications and updating the notification count dynamically.