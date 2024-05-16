<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Product;

class ProductView extends Component
{
    /**
     * Create a new component instance.
     */
    public $Products;
    public function __construct()
    {
        $this->Products = Product::select('*')->limit(8)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product-view');
    }
}
