<?php

namespace App\Http\Controllers;


use App\Models\Camera;
use App\Models\DataCard;
use App\Models\Ibm;
use App\Models\Ip;
use App\Models\Switchs;
use Illuminate\Http\Request;
use App\Models\Device;
use App\Models\Dispensor;
use App\Models\Tank;
use App\Models\Metroshtok;
use App\Models\Computer;
use App\Models\Router;
use App\Models\Location;
use App\Models\Phone;
use App\Models\Printer;

class DevicesController extends Controller
{
    //


    public function addDevice(Request $request){

             if($request->device=='Dispensor'){

                 $messages = ['count.required'=>'Sayı daxil etmədiniz',
                              'model.required'=>'Modeli daxil etmədiniz',
                             'pump_count.required'=>'Tapança sayını daxil etmədiniz',
                             'ydm.required'=>'Ydm seçmədiniz',
                 ];
                 $validated = $request->validate([
                     'count' => 'required|max:255',
                     'model' => 'required',
                     'pump_count'=>'required',
                     'ydm'=>'required',
                 ],$messages);

                 $dispensor= new Dispensor;
                 $dispensor->model=$request->model;
                 $dispensor->count=$request->count;
                 $dispensor->pump_count=$request->pump_count;
                 $dispensor->ydm_id=$request->ydm;
                 $dispensor->save();

                  return redirect()->back()->with('message', 'Dispensor əlavə edildi!');
             }


             if($request->device=='Tank'){

                 $messages = ['count.required'=>'Sayı daxil etmədiniz',

                             'capacity.required'=>'Tutumu daxil etmədiniz',
                             'ydm.required'=>'Ydm seçmədiniz',
                 ];
                 $validated = $request->validate([
                     'count' => 'required|max:255',
                     'capacity' => 'required',
                     'ydm'=>'required',
                 ],$messages);

                $deviceTank= new Tank;
                $deviceTank->ydm_id=$request->ydm;
                $deviceTank->count=$request->count;
                $deviceTank->capacity=$request->capacity;

                $deviceTank->save();

                 return redirect()->back()->with('message', 'Çən əlavə edildi!');
        }



        if($request->device=='Metroshtok'){

            $messages = [

                        'count.required'=>'Sayı daxil etmədiniz',
                        'ydm.required'=>'Ydm seçmədiniz',

                ];


            $validated = $request->validate([

                                        'count' => 'required|max:255',
                                        'ydm'=>'required',
                      ],$messages);


            $metroshtok= new Metroshtok;
            $metroshtok->ydm_id=$request->ydm;
            $metroshtok->count=$request->count;

            $metroshtok->save();

            return redirect()->back()->with('message', 'Metroştok əlavə edildi!');
        }


        if($request->device=='Computer'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model seçmədiniz!',
                'inventory_number.required'=>'Inventar nömrəsini yazmadınız!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'model' => 'required',
                'inventory_number'=>'required|numeric',
                'ydm'=>'required',
            ],$messages);


            $computer= new Computer;
            $computer->ydm_id=$request->ydm;
            $computer->model=$request->model;
            $computer->count=$request->count;
            $computer->inventory_number=$request->inventory_number;

            $computer->save();

            return redirect()->back()->with('message', 'Komputer əlavə edildi!');
        }


        if($request->device=='Computer'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model seçmədiniz!',
                'inventory_number.required'=>'Inventar nömrəsini yazmadınız!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'model' => 'required',
                'inventory_number'=>'required|numeric',
                'ydm'=>'required',
            ],$messages);


            $computer= new Computer;
            $computer->ydm_id=$request->ydm;
            $computer->model=$request->model;
            $computer->count=$request->count;
            $computer->inventory_number=$request->inventory_number;

            $computer->save();

            return redirect()->back()->with('message', 'Komputer əlavə edildi!');
        }



        if($request->device=='Computer'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model seçmədiniz!',
                'inventory_number.required'=>'Inventar nömrəsini yazmadınız!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'model' => 'required',
                'inventory_number'=>'required|numeric',
                'ydm'=>'required',
            ],$messages);


            $computer= new Computer;
            $computer->ydm_id=$request->ydm;
            $computer->model=$request->model;
            $computer->count=$request->count;
            $computer->inventory_number=$request->inventory_number;

            $computer->save();

            return redirect()->back()->with('message', 'Komputer əlavə edildi!');
        }

        if($request->device=='Ibm'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'factory_number.required'=>'Zavod nömrəsini yazmadınız!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'factory_number'=>'required',
                'ydm'=>'required',
            ],$messages);


            $ibm= new Ibm;
            $ibm->ydm_id=$request->ydm;
            $ibm->factory_number=$request->factory_number;
            $ibm->count=$request->count;

            $ibm->save();

            return redirect()->back()->with('message', 'Ibm kassa əlavə edildi!');
        }

        if($request->device=='Router'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Modeli qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'model'=>'required',
                'ydm'=>'required',
            ],$messages);


            $router= new Router;
            $router->ydm_id=$request->ydm;
            $router->model=$request->model;
            $router->count=$request->count;

            $router->save();

            return redirect()->back()->with('message', 'Router əlavə edildi!');
        }


        if($request->device=='Switchs'){

            $messages = [

                'count.required'=>'Sayı daxil etmədiniz!',
                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Modeli qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'count' => 'required|max:255',
                'model'=>'required',
                'ydm'=>'required',
            ],$messages);


            $switch= new Switchs;
            $switch->ydm_id=$request->ydm;
            $switch->model=$request->model;
            $switch->count=$request->count;

            $switch->save();

            return redirect()->back()->with('message', 'Switch əlavə edildi!');
        }



        if($request->device=='Ip'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'static_ip.required'=>'Ip qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'ip_adress'=>'required',
                'ydm'=>'required',
            ],$messages);


            $ip= new Ip;
            $ip->ydm_id=$request->ydm;
            $ip->static_ip=$request->ip_adress;


            $ip->save();

            return redirect()->back()->with('message', 'Ip adress əlavə edildi!');
        }


        if($request->device=='Locations'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'location.required'=>'Ünvan qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'location'=>'required',
                'ydm'=>'required',
            ],$messages);


            $location= new Location;
            $location->ydm_id=$request->ydm;
            $location->location=$request->location;


            $location->save();

            return redirect()->back()->with('message', 'Ünvan əlavə edildi!');
        }

        if($request->device=='DataCard'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'provider.required'=>'Provayder qeyd etmədiniz!',
                'speed_limit.required'=>'Sürət limiti qeyd etmədiniz!',
                'brx_number.required'=>'Brx nömrəsi qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'ydm'=>'required',
                'provider'=>'required',
                'speed_limit'=>'required',
                'brx_number'=>'required',
            ],$messages);


            $datacard= new DataCard;
            $datacard->ydm_id=$request->ydm;
            $datacard->provider=$request->provider;
            $datacard->brx_number=$request->brx_number;
            $datacard->speed_limit=$request->speed_limit;

            $datacard->save();

            return redirect()->back()->with('message', 'Data nömrə əlavə edildi!');
        }


        if($request->device=='Camera'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model qeyd etmədiniz!',
                'count.required'=>'Sayı qeyd etmədiniz!',
                'capacity.required'=>'Tutumu qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'ydm'=>'required',
                'model'=>'required',
                'count'=>'required',
                'capacity'=>'required',
            ],$messages);


            $camera= new Camera;
            $camera->ydm_id=$request->ydm;
            $camera->model=$request->model;
            $camera->count=$request->count;
            $camera->hdd_capacity=$request->capacity;

            $camera->save();

            return redirect()->back()->with('message', 'Kamera əlavə edildi!');
        }



        if($request->device=='Phone'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model qeyd etmədiniz!',
                'count.required'=>'Sayı qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'ydm'=>'required',
                'model'=>'required',
                'count'=>'required',
            ],$messages);


            $phone= new Phone;
            $phone->ydm_id=$request->ydm;
            $phone->model=$request->model;
            $phone->count=$request->count;


            $phone->save();

            return redirect()->back()->with('message', 'Telefon əlavə edildi!');
        }


        if($request->device=='Printer'){

            $messages = [

                'ydm.required'=>'Ydm seçmədiniz!',
                'model.required'=>'Model qeyd etmədiniz!',
                'count.required'=>'Sayı qeyd etmədiniz!',
            ];


            $validated = $request->validate([

                'ydm'=>'required',
                'model'=>'required',
                'count'=>'required',
            ],$messages);


            $printer= new Printer;
            $printer->ydm_id=$request->ydm;
            $printer->model=$request->model;
            $printer->count=$request->count;


            $printer->save();

            return redirect()->back()->with('message', 'Printer əlavə edildi!');
        }
    }



}
