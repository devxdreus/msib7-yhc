<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

//use Livewire\Component;

class Nav extends Component
{
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render(): mixed
    {
        return view('livewire.nav');
    }
}
