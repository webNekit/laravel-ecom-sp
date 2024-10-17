<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ArticlesList extends Component
{

    #[Url()]
    public $sort = 'asc';

    #[On('sort')]
    public function updateSort($sort)
    {
        $this->sort = $sort;
        $this->render();
    }

    #[Computed()]
    public function articles()
    {
        return Article::where('is_active', 1)->orderBy('created_at', $this->sort)->get();
    }

    public function render()
    {
        return view('livewire.articles.articles-list', [
            'articles' => $this->articles(),
        ]);
    }
}
