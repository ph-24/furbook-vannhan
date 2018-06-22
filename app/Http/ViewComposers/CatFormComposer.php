<?php

namespace Furbook\Http\ViewComposers;

use Illuminate\View\View;
use Furbook\Breed;

class CatFormComposer
{
    /**
     * The user repository implementation.
     *
     * @var Breed
     */
    protected $Breeds;

    /**
     * Create a new profile composer.
     *
     * @param  Breed  $Breeds
     * @return void
     */
    public function __construct(Breed $Breeds)
    {
        // Dependencies automatically resolved by service container...
        $this->Breeds = $Breeds;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        //dd($this->Breeds->pluck('name','id'));
        $view->with('breeds', $this->Breeds->pluck('name','id'));//gia tri breed thnh array, dang ky view bien breed lay tat ca record chuyen ve mang
    }
}