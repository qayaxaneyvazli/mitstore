<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ydm;
use App\Models\Device;
use App\Models\Dispensor;
use App\Models\Location;
use App\Models\Printer;
use Illuminate\Support\Facades\Auth;

class DataPageController extends Controller
{
    //

    public function showInfo()
    {

        if (!Auth::user()) {

            return redirect('dashboard');
        } else {

            $devices = Device::all();
            $ydms = Ydm::all();
            $yds = [];
            if (request('ydm') && request('device')) {
                $modelName = 'App\\Models\\' . request('device');
                if (class_exists($modelName)) {
                    $yds = $modelName::where('ydm_id', request('ydm'))->get();
                }
            }
            return view('datas', compact('devices', 'ydms', 'yds'));
        }
        //return dd(request('device'));


    }


    public function getInfo(Request $req){
        $ydm=$req->ydm;
        $device=$req->device;

            if($ydm && $device ){
                $model = 'App\\Models\\' . $req->device;

                $devices=Device::all();
                $ydms=Ydm::all();

                $yds=$model::where('ydm_id',$ydm)->get();

                return view('datas',compact('yds','devices','ydms'));

            }




    }


    public function edit(Request $req){


        $modelName = 'App\\Models\\' . $req->device;

        if (class_exists($modelName)) {

            $datas=$modelName::findOrFail($req->id);

            }

           // dd(property_exists($datas,'table'));


                return view('update',compact('datas'));

//        try{
//
//                return $req->ajax() ? response()->json(['success' =>true,'message' => 'var'],200) : back()->with('success','var');
//            }
//
//
//
//        catch (Throwable $e) {
//            return $req->ajax() ? response()->json(['success' =>false,'message' => 'yox'],422) : back()->with('error','yox');
//        }



    }

    public function updateData()
    {





    }

    public function updateInfos(Request $req){



        $modelName = 'App\\Models\\'.$req->device;

            if($modelName=='App\Models\Data_card'){

                $modelName=str_replace('_','',$modelName);

            }

        if($modelName=='App\Models\Switch'){

            $s='s';
            $modelName.=$s;

        }




           // return dd($modelName);

     if (class_exists($modelName)) {

         $device = $modelName::find($req->id);

         if ($modelName == 'App\Models\Tank'){

             $device->count = $req->count;
             $device->capacity = $req->capacity;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }


         if ($modelName == 'App\Models\Camera'){

             $device->model = $req->model;
             $device->count = $req->count;
             $device->capacity = $req->capacity;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if (trim($modelName) == 'App\Models\Computer'){

             $device->model = $req->model;
             $device->count = $req->count;
             $device->inventory_number = $req->inventory_number;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if (trim($modelName)== 'App\Models\Datacard'){

             $device->provider = $req->provider;
             $device->speed_limit = $req->speed_limit;
             $device->brx_number = $req->brx_number;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }
         if ($modelName == 'App\Models\Dispensor'){

             $device->model = $req->model;
             $device->count = $req->count;
             $device->pump_count = $req->pump_count;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if ($modelName == 'App\Models\Ip'){

             $device->static_ip = $req->ip_adress;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if ($modelName == 'App\Models\Ibm'){

             $device->count = $req->count;
             $device->factory_number = $req->factory_number;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }


         if ($modelName == 'App\Models\Location'){


             $device->location = $req->location;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }
         if ($modelName == 'App\Models\Metroshtok'){


             $device->count = $req->count;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }


         if ($modelName == 'App\Models\Phone'){


             $device->count = $req->count;
             $device->model = $req->model;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }
         if ($modelName == 'App\Models\Printer'){


             $device->count = $req->count;
             $device->model = $req->model;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if ($modelName == 'App\Models\Phone'){


             $device->count = $req->count;
             $device->model = $req->model;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }
         if ($modelName == 'App\Models\Router'){


             $device->count = $req->count;
             $device->model = $req->model;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

         if ($modelName == 'App\Models\Switchs'){


             $device->count = $req->count;
             $device->model = $req->model;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }
         if ($modelName == 'App\Models\Samplecup'){


             $device->count = $req->count;
             $device->factory_number = $req->factory_number;
             $device->save();
             return back()->with('message', 'Məlumat yeniləndi!');
         }

     }



}









    public function delete( Request $req){

        try{

           $modelName = 'App\\Models\\' . $req->device;

           if (class_exists($modelName)) {
               $modelName::findOrFail($req->dataId)->delete();
               return $req->ajax() ? response()->json(['success' =>true,'message' => 'Silindi'],200) : back()->with('success','Silindi');
           }


        }

        catch (Throwable $e) {
            return $req->ajax() ? response()->json(['success' =>false,'message' => 'Error'],422) : back()->with('error','Error');
        }




    }




}
