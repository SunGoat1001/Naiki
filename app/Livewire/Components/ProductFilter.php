<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ProductFilter extends Component
{
    use WithPagination;

    public $products = [];

    public $categories = [];

    public $sortBy = 'relevance';

    public $selectedCategory;

    public $search = '';

    public $searchTerm = '';

    public $selectedPriceRanges = [];

    public $selectedGenders = [];

    public $selectedSizes = [];

    public $selectedColors = [];

    public function updatedSelectedPriceRanges()
    {
        $this->resetPage(); // Reset pagination when filter changes
    }

    public function updatedSelectedGenders()
    {
        $this->resetPage();
    }

    public function updatedSelectedSizes()
    {
        $this->resetPage();
    }

    public function updatedSelectedColors() // Add this method
    {
        $this->resetPage();
    }

    public function handleSearch()
    {
        $this->searchTerm = $this->search;
        $this->resetPage();
    }

    public function mount()
    {
        $this->categories = Cache::get('categories');
        $this->selectedCategory = request('category');
        $this->selectedPriceRanges = [];
        $this->selectedGenders = request('selectedGenders', []);
        $this->selectedSizes = request('selectedSizes', []);
        $this->selectedColors = request('selectedColors', []);
        $this->products = $this->getProducts();
    }

    public function updatedSortBy()
    {
        $this->resetPage();
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    protected $listeners = ['filterChanged' => 'handleFilterChanged'];

    public function handleFilterChanged()
    {
        $this->products = $this->getProducts();
    }

    private function getProducts()
    {
        $query = Product::query();

        // Join with product_variants table for size filtering
        if ($this->selectedSizes) {
            $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->whereIn('product_variants.size', $this->selectedSizes);
        }

        // Color filter
        if ($this->selectedColors) {
            $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->whereIn('product_variants.color', $this->selectedColors);
        }

        // Price range filter
        if (! empty($this->selectedPriceRanges)) {
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
            $query->where('name', 'like', '%'.trim($this->searchTerm).'%');
        }

        // Gender filter
        if (! empty($this->selectedGenders)) {
            $query->whereIn('gender', $this->selectedGenders);
        }

        if ($this->selectedSizes) {
            $query->where('size', $this->selectedSizes);
        }

        if ($this->selectedSizes) {
            $query->where('size', $this->selectedSizes);
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

        return $query->paginate(32);
    }

    public function render()
    {
        sleep(1);

        return view('livewire.components.product-filter', [
            'products' => $this->getProducts(),
            'categories' => $this->categories,
        ]);
    }
}
