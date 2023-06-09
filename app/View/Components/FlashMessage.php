<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\View\Component;

class FlashMessage extends Component
{
    protected $hasMessage = false;
    protected $viewData;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $types = config('flash-message.types');

        foreach($types as $type => $data) {
            if(Session::has($type)) {
                $this->hasMessage = true;
                $this->viewData = [
                    'text'  => Session::get($type),
                    'type'  => $type,
                    'css'   => $data['css'],
                    'icon'  => $data['icon'],
                ];
                break;
            }
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        if($this->hasMessage && $this->viewData) {
            return view('components.flash-message', $this->viewData);
        }
        return '';
    }
}
