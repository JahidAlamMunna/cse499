<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\Models\Medicine;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $results = (new Search())
            ->registerModel(Medicine::class, ['brand_name', 'generic_name', 'unit_description', 'description'])
            ->search($request->input('query'));

        return view('search.results', ['results' => $results]);
    }
}
