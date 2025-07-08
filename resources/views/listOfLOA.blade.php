<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/loaDetails.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>List of LOA</title>
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
   <div class="p-4 mt-14 bg-white  h-full">
     <div class="pb-14 h-full">
        <div class="p-2 font-semibold text-white border-solid border-2 border-[#3a4d39] rounded-md border border bg-[#6d8a6e] overflow-auto">List of Letter of Authority
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">
 <table id="myTable" class="display maintables">
    <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
            <th>Person In-charge</th>
            <th>Deadline</th>
            <th>Compliance Progress</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
      @foreach($listOfLoa as $listOfLoa)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $listOfLoa->loa }}</td>
            <td>{{ $listOfLoa->accountHolder }}</td>
            <td>{{ $listOfLoa->deadlineOfCompletion }}</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
              
          @php
          $percentage = $listOfLoa->numberOfRequirement > 0
          ? ($listOfLoa->numberOfSubmittedRequirement / $listOfLoa->numberOfRequirement) * 100
          : 0;
          @endphp

            
        <div class="bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] font-medium text-white text-center p-0.5 leading-none rounded-full"
        style="width: {{ number_format($percentage, 2) }}%">
        {{ number_format($percentage, 2) }}%
        </div>

            </div>
            </td>
            <td>
               <a href="{{ route('loa.details', ['id' => $listOfLoa->id]) }}">
    <button type="button" class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
        View
    </button>
</a>
                 {{-- <button type="button" class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
                    <a href="/loaDetails">View</a>
                  </button> --}}
            </td>
        </tr>

       @endforeach
       

    </tbody>
</table>
    </div>
   



  </div>
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>