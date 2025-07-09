<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/approachingTheDeadline.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>Approaching the Deadline</title>
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
        <div class="p-2 font-semibold text-white border-solid border-2 border-[#3a4d39] rounded-md border border bg-[#d18751] overflow-auto">List of Letter of Authority
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">
 <table id="myTable" class="display maintables">
    <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
            <th>Supplier</th>
            <th>Person-In-Charge</th>
            <th>Deadline</th>
            <th>Compliance Progress</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>

      @foreach($approaching as $approaching)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $approaching->loa }}</td>
            <td>{{ $approaching->supplier }}</td>
            <td>{{ $approaching->accountHolder }}</td>
            <td>{{ $approaching->deadlineOfCompletion }}</td>


            <td>  <div class="w-full bg-gray-200 rounded-full h-6 relative  overflow-hidden">
    @php
        $percentage1 = $approaching->numberOfRequirement > 0
            ? ($approaching->numberOfSubmittedRequirement / $approaching->numberOfRequirement) * 100
            : 0;

        $percentage2 = $approaching->numberOfRequirement > 0
            ? ($approaching->numberOfConfirmedRequirements / $approaching->numberOfRequirement) * 100
            : 0;
    @endphp

    <!-- First progress bar (green gradient) -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#fec8f3] via-[#f4b0e6] to-[#ec95da] rounded-full"
         style="width: {{ number_format($percentage1, 2) }}%">
        <span class="text-white  font-medium flex justify-end items-center h-full">
            {{ number_format($percentage1, 2) }}%
        </span>
    </div>

    <!-- Second progress bar (pink gradient), layered on top -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751]   rounded-full "
         style="width: {{ number_format($percentage2, 2) }}%">
        <span class="text-white  font-medium flex justify-center items-center h-full">
            {{ number_format($percentage2, 2) }}%
        </span>
    </div>
</div>

            </td>
            <td>
               
                    <a href="{{ route('loa.details', ['id' => $approaching->id]) }}">
    <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
        View
    </button>
</a>

                  
            </td>
        </tr>

       @endforeach
       

    </tbody>
    {{-- <tbody>
        <tr class="">
            <td>1</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
               
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
            </td>
        </tr>
         <tr>
            <td>2</td>
            <td>LOA 111-122</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 55%"> 55%</div>
            </div>
            </td>
            <td>
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
            </td>
        </tr>
                <tr>
            <td>3</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
                
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
            </td>
        </tr>

    </tbody> --}}
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