<?php

namespace Filament\Pages\Auth;

use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use Filament\Models\Contracts\FilamentUser;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Pages\SimplePage;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Validation\ValidationException;

/**
 * @property Form $form
 */
class Login extends SimplePage
{
    use InteractsWithFormActions;
    use WithRateLimiting;

    /**
     * Menentukan tampilan (view) yang digunakan
     */
    protected static string $view = 'filament-panels::pages.auth.login';

    /**
     * Data formulir login
     */
    public ?array $data = [];

    /**
     * Jalankan saat halaman dimuat
     */
    public function mount(): void
    {
        if (Filament::auth()->check()) {
            redirect()->intended(Filament::getUrl());
        }

        $this->form->fill();
    }

    /**
     * Proses autentikasi
     */
    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5); // Batasi 5 kali percobaan
        } catch (TooManyRequestsException $exception) {
            $this->tampilkanNotifikasiLimit($exception)?->send();
            return null;
        }

        $data = $this->form->getState();

        if (!Filament::auth()->attempt($this->ambilKredensial($data), $data['remember'] ?? false)) {
            $this->lemparKesalahanValidasi();
        }

        $user = Filament::auth()->user();

        if (
            ($user instanceof FilamentUser) &&
            (! $user->canAccessPanel(Filament::getCurrentPanel()))
        ) {
            Filament::auth()->logout();
            $this->lemparKesalahanValidasi();
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function tampilkanNotifikasiLimit(TooManyRequestsException $exception): ?Notification
    {
        return Notification::make()
            ->title(__('Terlalu banyak percobaan login. Silakan coba lagi dalam :seconds detik.', [
                'seconds' => $exception->secondsUntilAvailable,
                'minutes' => $exception->minutesUntilAvailable,
            ]))
            ->danger();
    }

    protected function lemparKesalahanValidasi(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('Email atau kata sandi salah.'),
        ]);
    }

    public function form(Form $form): Form
    {
        return $form;
    }

    protected function getForms(): array
    {
        return [
            'form' => $this->form(
                $this->makeForm()
                    ->schema([
                        $this->komponenEmail(),
                        $this->komponenPassword(),
                        $this->komponenRemember(),
                    ])
                    ->statePath('data'),
            ),
        ];
    }

    protected function komponenEmail(): Component
    {
        return TextInput::make('email')
            ->label('Alamat Email')
            ->email()
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function komponenPassword(): Component
    {
        return TextInput::make('password')
            ->label('Kata Sandi')
            ->hint(filament()->hasPasswordReset() ? new HtmlString(Blade::render('<x-filament::link :href="filament()->getRequestPasswordResetUrl()" tabindex="3"> Lupa Kata Sandi?</x-filament::link>')) : null)
            ->password()
            ->revealable(filament()->arePasswordsRevealable())
            ->autocomplete('current-password')
            ->required()
            ->extraInputAttributes(['tabindex' => 2]);
    }

    protected function komponenRemember(): Component
    {
        return Checkbox::make('remember')
            ->label('Ingat Saya');
    }

    public function aksiDaftar(): Action
    {
        return Action::make('register')
            ->link()
            ->label('Daftar')
            ->url(filament()->getRegistrationUrl());
    }

    public function getTitle(): string | Htmlable
    {
        return 'Masuk';
    }

    protected function getFormActions(): array
    {
        return [
            $this->aksiLogin(),
        ];
    }

    protected function aksiLogin(): Action
    {
        return Action::make('authenticate')
            ->label('Masuk')
            ->submit('authenticate')
            ->color('success');
    }

    protected function hasFullWidthFormActions(): bool
    {
        return true;
    }

    protected function ambilKredensial(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
}
