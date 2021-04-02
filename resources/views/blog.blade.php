<!DOCTYPE html>
<html>
<head>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @foreach($array2 as $arr)
                        <p>{{$arr}}<br></p>
                    @if($quotes->firstWhere('name',  $arr))
                        <p>Repeat: {{($quotes->firstWhere('name',  $arr))['repeat']}}<br><br></p>
                   @endif

                    @endforeach

                    <div class="btn">
                       <form>
                        <input type="submit" method="GET" action="/api" class="refresh"   value="refresh"><br/>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
                        </html>
