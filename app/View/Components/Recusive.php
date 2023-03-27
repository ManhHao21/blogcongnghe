<?php

namespace App\View\Components;

use App\Models\Categories;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Recusive extends Component
{
    /**
     * Create a new component instance.
     */
    private $data;
    private $htmlSelect;
    public function __construct($data)
    {
        $this->data = $data;
    }

    function categoryRecusive( $id = 0, $text = '') {
        foreach ($this->data as $value) {
            if ($value['parent_id'] == $id) {
                     $this->htmlSelect .= "<option selected value = '". $value['id'] ."'>" . $text . $value['name'] . "</option>";
                    $this->categoryRecusive($value['id'], $text . '--');
            }
        }
        return $this->htmlSelect;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.recusive');
    }
}
