
<!DOCTYPE html>
<x-app-layout>
    <x-slot name="datas">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ydm məlumatları') }}
        </h2>

    </x-slot>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma-rtl.min.css">
    <div class="container">


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


                    <div class="card">
                        <div class="card-header">
                            Metrologiya və İnformasiya Texnologiyaları Şöbəsi
                        </div>
                        <div class="card-body">
                    <div class="col text-center">
                        <form method="GET" action="{{route('showInfo')}}">

                            <label>Ydm seç</label>
                            <div class="select is-primary">

                                <select name="ydm">
                                @isset($ydms)
                                    @foreach($ydms as $ydm)
                                    <option {{request('ydm') == $ydm->id ? "selected" : ""}} value="{{$ydm->id}}">{{$ydm->name}}</option>

                                        @endforeach
                                    @endisset
                                </select>
                            </div>
                            <label>Avadanlıq seç</label>
                            <div class="select select is-danger">
                                <select  id="deviceSelect"  name="device">
                                    @isset($devices)
                                    @foreach($devices as $device)
                                        <option {{request('device') == $device->name ? "selected" : ""}}  value="{{$device->name}}">{{$device->realname}}</option>

                                    @endforeach

                                    @endisset
                                </select>
                            </div>
                            <hr>

                            <div class="col text-center">
                                <button  type="submit" class="button is-link">Göstər</button>
                            </div>
                        </form>
                    </div>
        <hr>

                            @isset($yds)

                            <table class="table">
                                <thead class="thead">
                                <tr>
                                    <th scope="col">Cihaz Id</th>
                                    <th scope="col">Sayı</th>
                                    <th scope="col">Ydm</th>
                                    <th scope="col">Ünvan</th>
                                    <th scope="col">Modeli</th>
                                    <th scope="col">İp adresi</th>
                                    <th scope="col">Zavod nömrəsi</th>
                                    <th scope="col">İnventar nömrəsi</th>
                                    <th scope="col">Brx nömrəsi</th>
                                    <th scope="col">Tutumu</th>
                                    <th scope="col">Provayder</th>
                                    <th scope="col">Sürət limiti</th>
                                    <th scope="col">Tapança sayı</th>
                                    @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                    <th scope="col"> Əməliyyat</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>

                                @forelse($yds as $yd)
                                <tr>

                                    <td>{{$yd->id}}</td>
                                        <td>{{$yd->count}}</td>
                                        <td>{{$yd->ydm_id}}</td>
                                        <td>{{$yd->location}}</td>
                                        <td>{{$yd->model}}</td>
                                        <td>{{$yd->static_ip}}</td>
                                        <td>{{$yd->factory_number}}</td>
                                        <td>{{$yd->inventory_number}}</td>
                                        <td>{{$yd->brx_number}}</td>
                                        <td>{{$yd->capacity}}</td>
                                        <td>{{$yd->provider}}</td>
                                        <td>{{$yd->speed_limit}}</td>
                                        <td>{{$yd->pump_count}}</td>

                                    <td>

                                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")


                            <a  href="/update/{{$yd->id}}/{{request('device') ? request('device'): 'Dispensor'}}" data-id="{{$yd->id}}"  class="btn btn-success btn-sm editData">Düzəliş et</a>
                                        @endif

{{--                                        href="{{route('delete',['id'=>$yd->id,'device'=>$device->name])}}--}}
                                        @if(\Illuminate\Support\Facades\Auth::user()->role=="admin")
                                        <a     href="#"  data-id="{{$yd->id}}"  class="btn btn-danger btn-sm deleteData">Sil</a>
                                        @endif
                                    </td>

                                </tr>
                                @empty


                                    <tr>
                                        <div class="alert col text-center  alert-dismissible alert-danger">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                            <ul>

                                                    <li> Seçdiklərinizə uyğun məlumat yoxdur</li>
                                    </tr>



                                @endforelse
                                </tbody>
                            </table>
                            @endisset
                        </div>

                    </div>
                </div>

                {{--            <div class="row">--}}
                {{--                <div class="column">--}}
                {{--                    <img src="{{ asset('images/itpicture.gif') }}" alt="Snow" style="width:100%">--}}
                {{--                </div>--}}
                {{--                <div class="column">--}}
                {{--                    <img src="{{ asset('images/metrology.jpg') }}" alt="Forest" style="width:200%">--}}
                {{--                </div>--}}
                {{--            </div>--}}

                {{--            <img  alt="it" width="500" height="500">--}}
                {{--            <img  alt="it" width="500" height="500">--}}


            </div>

    </div>

</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script  >

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.deleteData').on('click',function () {
        var dataId = $(this).attr('data-id');
        var device = $("#deviceSelect").val();

        $.ajax({
            type: 'DELETE',
            url: "{{route('delete')}}",
            data: {'dataId': dataId,'device': device},
            success: function (result) {
                if(result.success){
                    location.reload();
                }
            },

            error: function (error) {
                console.log(error)
            }

        });
    })


    $('.editData').on('mouseover',function () {
            var device = $("#deviceSelect").val();
            console.log(device);
        $.ajax({
            type: 'PUT',
            url: "{{route('editData')}}",
            data: {'device': device},
            success: function (result) {
                if(result.success){
                   /// location.reload();
                    console.log($result);
                }
            },

            error: function (error) {
                console.log(error)
            }

        });




    });


</script>
</html>
























