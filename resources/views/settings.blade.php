<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/settings.js')

    <title>Overall</title>
</head>
<body class="overflow-x-hidden overflow-hidden bg-cover bg-no-repeat bg-[url('../images/LOAMonitoringAuthUIBackground.png')] bg-blend-multiply h-screen">
   @auth

   <section class="static h-full">
    @include('navbar')

@if (Auth::user()->users_type != "admin" )
@include('sidebarSubmitter')
@else
@include('sidebar')
@endif

<div class=" sm:ml-64  h-full ">
   <div class="p-4 mt-14 bg-[#f4f4f4]  h-full">
     <div class="pb-14 h-full grid grid-rows-6 grid-cols-3 gap-4">
          <div class=" p-4 col-span-2 grid  grid-cols-3 font-semibold border-solid border-2 border-[#3a4d39] rounded-md border border bg-white overflow-auto">


               </div>

              
              

              
               <div class="p-2 row-span-6  font-semibold  border-solid border-2 border-[#3a4d39] rounded-md border border bg-white overflow-auto">


                   <p class="">Requirement Details</p>
                   <div class="grid grid-cols-2 p-2 font-semibold ">
                   

                   </div>

               </div>
                <div class="p-2 row-span-5 col-span-2 font-semibold  border-solid border-2 border-[#3a4d39] rounded-md border border bg-white overflow-auto">
                      <p class="">Requirements Status</p>

                      <div class=" bg-gray-200 p-2   rounded-md  text-[9px] text-gray-900  w-full h-[94%] overflow-auto">
                                 
                             </div>


               </div>
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>