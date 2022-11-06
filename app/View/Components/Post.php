<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $link;
    public $user;
    public $date;
    public $image;
    public $title;
    
    public function __construct($link, $user, $date, $image, $title)
    {
        $this->link = $link;
        $this->user = $user;
        $this->date = $date;
        $this->image = $image;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post');
    }
}
