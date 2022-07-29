<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Məlumatlara düzəliş et')}}
        </h2>

    </x-slot>


    @foreach($datas as $data)
    @endforeach

<?php $model=$datas->getTable(); ?>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma-rtl.min.css">
    <div class="container">

        <form method="POST" action="{{route('updateInfos',['id'=>$datas->id,'device'=>substr_replace(ucfirst($model) ,"", -1)])}}">
            @csrf
            @if ($errors->any())
                <div class="alert col text-center  alert-dismissible alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('message'))
                <div class="alert col text-center alert-dismissible alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    {{ session()->get('message') }}
                </div>
            @endif



            <div   class="card">
                <h5 class="card-header">Avadanlığa düzəliş et</h5>
                <div  class="card-body">
                    <div class="col text-center">
                        <div id="main-div" class="field">

                            <div id="device" class="field">
                                <label class="label">Avadanlıq</label>
                                <div class="control">

                                </div>
                            </div>


                            @if(($datas->getTable())=='cameras' ||  $datas->getTable()=='computers'  ||  $datas->getTable()=='dispensors' ||  $datas->getTable()=='dispensors' ||  $datas->getTable()=='phones' ||  $datas->getTable()=='printers' ||  $datas->getTable()=='dispensors' ||  $datas->getTable()=='routers' ||  $datas->getTable()=='switchs')
                            <div  id="model" class="control">
                                <label id="model" class="label">Modeli</label>
                                <input class="input" value="{{old('count', $datas->model)}}" name="model" type="text" placeholder="Avadanlığın modeli">
                            </div>
                            @endif
                            @if(($datas->getTable())=='tanks' ||   $datas->getTable()=='ibms'  || $datas->getTable()=='dispensors' ||  $datas->getTable()=='cameras' ||  $datas->getTable()=='computers' ||  $datas->getTable()=='i_b_m_s' ||  $datas->getTable()=='metroshtoks' ||  $datas->getTable()=='phones' ||  $datas->getTable()=='printers' ||  $datas->getTable()=='routers' ||  $datas->getTable()=='switchs' ||  $datas->getTable()=='samplecups')
                            <div id="count" class="field">

                                <div  class="control has-icons-left has-icons-right">
                                    <label  id="count" class="label">Sayı</label>
                                    <input id="count" class="input is-success" type="number" name="count" placeholder="Sayı" value="{{old('count', $datas->count)}}">
                                    <span class="icon is-small is-left">
                                  <i class="fas fa-user"></i>
                                </span>
                                </div>

                            </div>
                            @endif

                            @if(($datas->getTable())=='computers')
                            <div id="inventory_number" class="field">

                                <label id="inventory_number" class="label">İnventar nömrəsi</label>
                                <input id="inventory_number" class="input is-danger" name="inventory_number" type="number" placeholder="İnventar nömrəsi" value="{{old('inventory_number', $datas->inventory_number)}}">
                            </div>
                            @endif

                            @if(($datas->getTable())=='ibms' || $datas->getTable()=='samplecups')
                            <div id="factory_number" class="field">
                                <label class="label">Zavod nömrəsi</label>
                                <input class="input is-danger" name="factory_number" id="factory_number" type="text" placeholder="Zavod nömrəsi" value="{{old('factory_number', $datas->factory_number)}}">
                            </div>
                            @endif
                            @if(($datas->getTable())=='dispensors')
                            <div id="pomp_count"  class="control has-icons-left has-icons-right">
                                <label  class="label">Tapança Sayı</label>
                                <input id="pomp_count" class="input is-success" type="number" name="pump_count" placeholder="Tapança sayı" value="{{old('pump_count', $datas->pump_count)}}">

                            </div>
                            @endif
                            @if(($datas->getTable())=='tanks' ||  $datas->getTable()=='cameras')

                            <div  id="capacity" class="field">
                                <label class="label">Tutumu</label>
                                <input class="input is-danger" id="capacity" name="capacity" type="number" placeholder="Tutumu" value="{{old('capacity', $datas->capacity)}}">
                            </div>
                            @endif

                            @if(($datas->getTable())=='ips')
                           <div  id="ip" class="field">
                               <label class="label">IP Adresi</label>
                               <input class="input is-danger" id="ip" name="ip_adress" type="text" placeholder="IP Adresi" value="{{old('ip_adress', $datas->static_ip)}}">
                           </div>
                            @endif
                            @if(($datas->getTable())=='datacards')
                           <div id="speed_limit" class="field">
                               <label class="label">Sürət limiti</label>
                               <input class="input is-danger" name="speed_limit" id="speed_limit" type="text" placeholder="Sürət limiti" value="{{old('speed_limit', $datas->speed_limit)}}">
                           </div>
                            @endif
                            @if(($datas->getTable())=='datacards')
                           <div  id="provider" class="field">
                               <label class="label">Provayderi</label>
                               <input class="input is-danger" type="text"  id="provider" name="provider" placeholder="Provayderi" value="{{old('provider', $datas->provider)}}">
                           </div>
                            @endif

                            @if(($datas->getTable())=='datacards')
                           <div  id="brx_number" class="field">
                               <label class="label">Brx nömrəsi</label>
                               <input class="input is-danger" type="text" name="brx_number" id="brx_number" placeholder="Brx nömrəsi" value="{{old('brx_number', $datas->brx_number)}}">
                           </div>
                            @endif
                            @if(($datas->getTable())=='locations')
                           <div  id="location" class="field">
                               <label class="label">Ünvan əlavə et</label>
                               <input class="input is-danger" type="text" name="location" id="location" placeholder="Ydm-ə ünvan əlavə et" value="{{old('location', $datas->location)}}">
                           </div>
                            @endif
                           <hr>
                           <div  id="form" class="field is-grouped">
                               <hr>
                               <div class="col text-center">
                                   <button type="submit" class="button is-link">Düzəliş et</button>
                               </div>

                           </div>

                       </div>
       </form>


   </div>









</x-app-layout>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>

   //$(document).ready( function(){

   // $('#main-div').children(':not(#device,#ydm)').hide(); //ilk olaraq hamisini gizle
   //
   // $("#device").change(function (){
   //
   //
   //     var value = $('#device').find(":selected").text().trim();
   //     var dispensor="Dispensor";
   //     // console.log(input);
   //     if(value==dispensor)
   //     {
   //         //$('input:not(#count,#ydm,#inventory_number)').slideToggle( "slow");
   //         //$('#main-div').children(':not(#count,#form,#device,#model,#ydm,#inventory_number)').slideToggle();
   //
   //         $('#main-div').children().filter('#pomp_count,#count,#form,#device,#model,#ydm,#inventory_number').show(1200);
   //         $('#capacity').hide();
   //         $('#factory_number').hide();
   //         $('#ip').hide();
   //         $('#location').hide();
   //         $('#provider').hide();
   //         $('#brx_number').hide();
   //         $('#speed_limit').hide();
   //     }
   //
   //
   //     // Animation complete.);
   //     var tank="Tank";
   //
   //     if(value==tank)
   //     {
   //         // $('#main-div').children(':not(#count,#ydm,#capacity,#form,#device)').slideToggle();
   //
   //         $('#main-div').children().filter('#count,#ydm,#capacity,#form,#device').show(1200);
   //         $('#inventory_number').hide();
   //         $('#factory_number').hide();
   //         $('#ip').hide();
   //         $('#location').hide();
   //         $('#provider').hide();
   //         $('#brx_number').hide();
   //         $('#speed_limit').hide();
   //         $('#model').hide();
   //         $('#pomp_count').hide();
   //         // Animation complete.);
   //     }
   //
   //
   //     var sampleCup="Samplecup";
   //
   //     if(value==sampleCup)
   //     {
   //         //$('#main-div').children(':not(#count,#ydm,#factory_number,#form,#device)').slideToggle();
   //
   //         $('#main-div').children().filter('#count,#ydm,#factory_number,#form,#device').show(1200);
   //         $('#inventory_number').hide();
   //         $('#ip').hide();
   //         $('#location').hide();
   //         $('#provider').hide();
   //         $('#brx_number').hide();
   //         $('#speed_limit').hide();
   //         $('#model').hide();
   //         $('#pomp_count').hide();
   //         $('#capacity').hide();
   //         // Animation complete.);
    //     }
    //
    //
    //
    //
    //     var Metroshtok="Metroshtok";
    //
    //     if(value==Metroshtok)
    //     {
    //         // $('#main-div').children(':not(#count,#ydm,#form,#device)').slideToggle();
    //
    //         $('#main-div').children().filter('#count,#ydm,#form,#device').show(1200);
    //         $('#inventory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#model').hide();
    //         $('#capacity').hide();
    //         $('#factory_number').hide();
    //         $('#pomp_count').hide();
    //         // Animation complete.);
    //     }
    //
    //
    //     var Computer="Computer";
    //
    //     if(value==Computer)
    //     {
    //         //$('#main-div').children(':not(#count,#model,#inventory_number,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#model,#inventory_number,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#capacity').hide();
    //         $('#factory_number').hide();
    //         $('#pomp_count').hide();;
    //     }
    //
    //     var Ibm="Ibm";
    //     if(value==Ibm)
    //     {
    //
    //         //$('#main-div').children(':not(#count,#factory_number,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#factory_number,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#inventory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#model').hide();
    //         $('#capacity').hide();
    //         $('#pomp_count').hide();
    //
    //     }
    //
    //
    //     var Router="Router";
    //     if(value==Router)
    //     {
    //
    //         //$('#main-div').children(':not(#count,#model,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#model,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#factory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //         $('#pomp_count').hide();
    //         // $('#factory_number').hide();
    //         // $('#ip').hide();
    //         // $('#location').hide();
    //         // $('#provider').hide();
    //         // $('#brx_number').hide();
    //         // $('#speed_limit').hide();
    //         // $('#model').hide();
    //         // $('#capacity').hide();
    //         // $('#inventory_number').hide();
    //
    //     }
    //
    //
    //     var Switchs="Switchs";
    //     if(value==Switchs)
    //     {
    //
    //         //$('#main-div').children(':not(#count,#model,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#model,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#factory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //         $('#pomp_count').hide();
    //     }
    //
    //
    //     var Ip="Ip";
    //     if(value==Ip)
    //     {
    //
    //         //$('#main-div').children(':not(#ip,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#ip,#ydm,#form,#device').show(1200);
    //         $('#count').hide();
    //         $('#factory_number').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#model').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //         $('#pomp_count').hide();
    //     }
    //
    //
    //     var Location="Location";
    //     if(value==Location)
    //     {
    //
    //         //$('#main-div').children(':not(#location,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#location,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#pomp_count').hide();
    //         $('#factory_number').hide();
    //         $('#ip').hide();
    //         $('#count').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#model').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //
    //     }
    //
    //
    //     var DataCard="DataCard";
    //     if(value==DataCard)
    //     {
    //
    //         //$('#main-div').children(':not(#provider,#brx_number,#speed_limit,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#provider,#brx_number,#speed_limit,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //
    //         $('#pomp_count').hide();
    //         $('#factory_number').hide();
    //         $('#count').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#model').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //     }
    //
    //     var Camera="Camera";
    //     if(value==Camera)
    //     {
    //
    //         //$('#main-div').children(':not(#provider,#brx_number,#speed_limit,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#capacity,#model,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#pomp_count').hide();
    //         $('#factory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#inventory_number').hide();
    //     }
    //     var Phone="Phone";
    //     if(value==Phone)
    //     {
    //
    //         //$('#main-div').children(':not(#provider,#brx_number,#speed_limit,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#model,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#factory_number').hide();
    //         $('#ip').hide();
    //         $('#location').hide();
    //         $('#provider').hide();
    //         $('#brx_number').hide();
    //         $('#speed_limit').hide();
    //         $('#capacity').hide();
    //         $('#inventory_number').hide();
    //         $('#pomp_count').hide();
    //     }
    //
    //
    //
    //     var Printer="Printer";
    //     if(value==Printer)
    //     {
    //
    //         //$('#main-div').children(':not(#provider,#brx_number,#speed_limit,#ydm,#form,#device)').slideToggle();
    //         $('#main-div').children().filter('#count,#model,#ydm,#form,#device').show(1200);
    //         // Animation complete.);
    //         $('#factory_number').hide(500);
    //         $('#ip').hide(500);
    //         $('#location').hide(500);
    //         $('#provider').hide(500);
    //         $('#brx_number').hide(500);
    //         $('#speed_limit').hide(500);
    //         $('#capacity').hide(500);
    //         $('#inventory_number').hide(500);
    //         $('#pomp_count').hide(500);
    //     }
    // });




    //})




</script>
</html>
