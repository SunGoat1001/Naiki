<?php

namespace App\Livewire\Components;

use App\Models\Category;
use App\Models\Product;
use Livewire\Attributes\Url;
use Livewire\Component;


class ProductFilter extends Component
{

    public $categories = [];

    public $products = [];

    public $sortBy = 'relevance';

    public $selectedCategory;

    public $search = '';

    public $searchTerm = '';

    public $selectedPriceRanges = [];

    #[Url]
    public $selectedGenders = [];


    public function updatedSelectedPriceRanges()
    {
        $this->products = $this->getProducts();
    }

    public function updatedSelectedGenders()
    {
        $this->products = $this->getProducts();
    }

    public function handleSearch()
    {
        $this->searchTerm = $this->search;
        $this->products = $this->getProducts();
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->selectedCategory = request('category');
        $this->selectedPriceRanges = [];
        $this->selectedGenders = request('selectedGenders', []);
        $this->products = $this->getProducts();
    }

    public function updatedSortBy()
    {
        $this->products = $this->getProducts();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->products = $this->getProducts();
    }

    private function getProducts()
    {
        $query = Product::query();

        // Price range filter
        if (!empty($this->selectedPriceRanges)) {
            $query->where(function ($q) {
                foreach ($this->selectedPriceRanges as $range) {
                    switch ($range) {
                        case 'under100':
                            $q->orWhereBetween('price', [0, 100]);
                            break;
                        case 'between100and200':
                            $q->orWhereBetween('price', [100, 200]);
                            break;
                        case 'over200':
                            $q->orWhere('price', '>', 200);
                            break;
                    }
                }
            });
        }

        // Other filters
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . trim($this->searchTerm) . '%');
        }

        // Gender filter
        if ($this->selectedGenders) {
            $query->where('gender', $this->selectedGenders);
        }

        if ($this->selectedCategory) {
            $query->where('category_id', $this->selectedCategory);
        }

        // Sorting
        if ($this->sortBy && $this->sortBy !== 'relevance') {
            $sortMap = [
                'lowestPrice' => ['price' => 'asc'],
                'highestPrice' => ['price' => 'desc'],
                'lastest' => ['imported_date' => 'desc'],
            ];

            if (isset($sortMap[$this->sortBy])) {
                $sort = $sortMap[$this->sortBy];
                $query->orderBy(key($sort), current($sort));
            }
        }

        return $query->get();
    }
    protected $listeners = ['filterChanged' => 'handleFilterChanged'];

    public function handleFilterChanged()
    {
        $this->products = $this->getProducts();
    }

    public function render()
    {
        sleep(1);
        return view('livewire.components.product-filter', [
            'products' => $this->products,
            'categories' => $this->categories,
        ]);
    }
}
