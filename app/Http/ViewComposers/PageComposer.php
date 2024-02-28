<?php
namespace App\Http\ViewComposers;

use App\Models\Page;
use App\Models\Role;
use App\Repositories\UserRepository;
use Illuminate\View\View;

class PageComposer
{
      
      protected $pages;

      public function __construct(Page  $pages)
      {
            $this->pages = $pages;
   

      }

      public function compose(View $view)
      {
           return  $view->with('pages', $this->pages->all());
      }
}