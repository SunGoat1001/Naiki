<?php

namespace App\Livewire\Components;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Livewire\WithPagination;

class ProductFilter extends Component
{
    use WithPagination;

    public $categories = [];

    public $sortBy = 'relevance';

    public $selectedCategory;

    public $search = '';

    public $searchTerm = '';

    public $selectedPriceRanges = [];

    public $selectedGenders = [];

    public $selectedSizes = [];

    public $selectedColors = [];

    protected $listeners = ['filterChanged' => 'handleFilterChanged'];

    // Combined update method for all filters
    public function updated($propertyName)
    {
        if (in_array($propertyName, [
            'selectedPriceRanges',
            'selectedGenders',
            'selectedSizes',
            'selectedColors',
            'sortBy',
        ])) {
            $this->resetPage();
        }
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
    }

    public function selectCategory($categoryId)
    {
        $this->selectedCategory = $categoryId;
        $this->resetPage();
    }

    public function handleFilterChanged()
    {
        $this->resetPage();
    }

    private function getProducts()
    {
        $query = Product::query();

        // Join with product_variants table only once if needed
        if ($this->selectedSizes || $this->selectedColors) {
            $query->join('product_variants', 'products.id', '=', 'product_variants.product_id')
                ->select('products.*')
                ->distinct(); // Prevent duplicate products

            if ($this->selectedSizes) {
                $query->whereIn('product_variants.size', $this->selectedSizes);
            }

            if ($this->selectedColors) {
                $query->whereIn('product_variants.color', $this->selectedColors);
            }
        }

        // Price range filter
        if (! empty($this->selectedPriceRanges)) {
            $query->where(function ($q) {
                foreach ($this->selectedPriceRanges as $range) {
                    switch ($range) {
                        case 'under100':
                            $q->orWhereBetween('products.price', [0, 100]);
                            break;
                        case 'between100and200':
                            $q->orWhereBetween('products.price', [100, 200]);
                            break;
                        case 'over200':
                            $q->orWhere('products.price', '>', 200);
                            break;
                    }
                }
            });
        }

        // Search filter
        if ($this->searchTerm) {
            $query->where('products.name', 'like', '%'.trim($this->searchTerm).'%');
        }

        // Gender filter
        if (! empty($this->selectedGenders)) {
            $query->whereIn('products.gender', $this->selectedGenders);
        }

        // Category filter
        if ($this->selectedCategory) {
            $query->where('products.category_id', $this->selectedCategory);
        }

        // Sorting
        if ($this->sortBy && $this->sortBy !== 'relevance') {
            $sortMap = [
                'lowestPrice' => ['products.price' => 'asc'],
                'highestPrice' => ['products.price' => 'desc'],
                'lastest' => ['products.imported_date' => 'desc'],
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
        return view('livewire.components.product-filter', [
            'products' => $this->getProducts(),
            'categories' => $this->categories,
        ]);
    }
}
