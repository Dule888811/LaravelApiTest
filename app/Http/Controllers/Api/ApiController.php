<?php
namespace App\Http\Controllers\API;
use App\Quote;
use App\Repositories\ApiRepository;
use App\Repositories\ApiRepositoryIterface;
use ArrayObject;use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\View;
use Mockery\Matcher\Any;
use mysql_xdevapi\CollectionAdd;
use phpDocumentor\Reflection\Types\Collection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations;

class ApiController extends Controller
{
    private $apiRepository;
    public function __construct(ApiRepositoryIterface $apiRepository)
    {
        $this->apiRepository = $apiRepository;
    }



public function index()
{
    $array2 = $this->apiRepository->GetApiRes();
    $quotes = Quote::all();
    return View::make('blog')
        ->with(compact('array2', 'quotes'));

}

}
