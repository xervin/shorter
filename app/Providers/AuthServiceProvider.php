<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        VerifyEmail::toMailUsing(function ($notifiable, $url) {
            return (new MailMessage)
                ->subject('Подтверждение адреса электронной почты')
                ->greeting('Здравствуйте!')
                ->line('На ресурсе ' . env('APP_URL') . ' был зарегистрирован аккаунт с данной электронной почтой.')
                ->line('Нажмите на кнопку, чтобы подтвердить, что это ваш адрес электронной почты.')
                ->action('Подтверждаю', $url)
                ->line('Если аккаунт создавали не вы, то никаких действий не требуется');
        });
    }
}
