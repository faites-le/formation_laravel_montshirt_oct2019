<?php


namespace App\Http\ViewComposers;

use App\Categorie;
use Illuminate\View\View;

class HeaderComposer
{

    public function compose(View $view) {
        $matches = ['is_online'=>1,'parent_id'=>null];
        $view->with('categories',Categorie::where($matches)->get())
             ->with('total_panier',\Cart::getTotalQuantity());
    }
}
