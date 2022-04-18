<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scource extends Model
{
    use HasFactory;

	protected $table = "scources";

	protected $fillable = [
		'name', 'url'
	];

	//Relations

	public function news(): hasMany
	{
		return $this->hasMany(News::class, 'scource_id', 'id');
	}
}