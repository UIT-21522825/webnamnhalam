<?php

namespace App\Composers;

use App\Models\Category;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class CategoryComposer
{
    /**
     * Create a new profile composer.
     */
    protected $category;
    public function __construct(Category $category) {
        $this->category = $category;
    }

    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $view->with('categories', $this->category->getParents());
    }
}
