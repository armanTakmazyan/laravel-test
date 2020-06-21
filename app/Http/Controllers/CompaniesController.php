<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Requests\StoreCompanyRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Company;

class CompaniesController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index(Request $request)
	{
		$companies = Company::orderBy('created_at', 'DESC')->paginate(10);
		return view('companies.index', compact('companies'));
	}
}
