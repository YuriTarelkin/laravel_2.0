<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

	protected $table = "news";

	protected $fillable = [
		'category_id', 'scource_id', 'title', 'status',
		'author', 'image', 'description'
	];

	public function category(): BelongsTo
	{
		return $this->belongsTo(Category::class);
	}

	public function scource(): BelongsTo
	{
		return $this->belongsTo(Scource::class);
	}
}