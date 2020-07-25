<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class Blog extends Model
{
	use SearchableTrait;

        protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'blogs.title' => 10,
            'blogs.description' => 5,
        ],
    ];

    protected $fillable = [
    	'title','slug','image','description'
    ];

    public function blogcomments()
    {
        return $this->hasMany(BlogComment::class);
    }
}
