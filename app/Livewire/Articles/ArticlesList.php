<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ArticlesList extends Component
{

    #[Computed()]
    public function articles()
    {
        return Article::where('is_active', 1)->get();
    }

    public function render()
    {
        return view('livewire.articles.articles-list', [
            'articles' => $this->articles(),
        ]);
    }
}
