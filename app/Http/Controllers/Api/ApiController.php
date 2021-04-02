<?php
namespace App\Http\Controllers\API;
use App\Quote;
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
    public static function store($array2, $quotes)
    {
        for ($i = 0; $i < 5; $i++) {
            if(count($quotes) == 0)
            {
                $quote = new Quote();
                $quote->name =  $array2[$i];
                $quote->repeat = 1;
                $quote->save();
            }
            foreach ($quotes as $quote) {
                if ($quotes->firstWhere('name', $array2[$i]) != null) {
                    $quote = ($quotes->firstWhere('name',  $array2[$i]));
                    $quote->repeat = $quote->repeat + 1;
                    $tags_data = [
                        'name' => $quote->name,
                        'repeat' => $quote->repeat
                    ];
                    $quote->update($tags_data);
                    break;
                } else {
                    $quote = new Quote();
                    $quote->name =  $array2[$i];
                    $quote->repeat = 1;
                    $quote->save();
                    break;
                }
            }
        }
    }

public function index()
{
    for ($i = 0; $i < 5; $i++) {
        $url = "api.kanye.rest/";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type', 'application/json'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, 'json_string');
        if (curl_error($ch)) {
            echo curl_error($ch);
        } else {
            $result = curl_exec($ch);
            $res = json_decode($result);
            $quotes = Quote::all();
            foreach ($res as $r) {
                $array2[] = $r;
            }
        }
        curl_close($ch);


    }
    self::store($array2,$quotes);

    return View::make('blog')
        ->with(compact('array2', 'quotes'));

}

}
