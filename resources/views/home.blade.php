
@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/app.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>Home</title>
  
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
     <div class="pb-14 h-full grid grid-rows-3 grid-cols-2 gap-4">
  <div class="p-2 font-semibold text-white border-solid border-2 border-[#3a4d39] rounded-md border border bg-[#d18751] overflow-auto">Approaching the Deadline
    <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable" class="display maintables">
    <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
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
            <td>{{ $approaching->accountHolder }}</td>
            <td>{{ $approaching->deadlineOfCompletion }}</td>


            <td>  <div class="w-full bg-gray-200 rounded-full relative h-4 overflow-hidden">
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
        <span class="text-white text-[10px] font-medium flex justify-end items-center h-full">
            {{ number_format($percentage1, 2) }}%
        </span>
    </div>

    <!-- Second progress bar (pink gradient), layered on top -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751]   rounded-full "
         style="width: {{ number_format($percentage2, 2) }}%">
        <span class="text-white text-[10px] font-medium flex justify-center items-center h-full">
            {{ number_format($percentage2, 2) }}%
        </span>
    </div>
</div>

            </td>
            <td>
               
                    <a href="{{ route('loa.details', ['id' => $approaching->id]) }}">
    <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">
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
               
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
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
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
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
                
                 <button type="button" class="text-white bg-gradient-to-r from-[#f79f5e] via-[#d78c54] to-[#d18751] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
            </td>
        </tr>

    </tbody> --}}
</table>
    </div>
   



  </div>
  <div class="p-2 font-semibold text-white border-dashed border-2 border-[#3a4d39] rounded-md bg-[#d15651] mr-4 overflow-auto">Overdue
    <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable2" class="display maintables">
     <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
            <th>Person In-Charge</th>
            <th>Deadline</th>
            <th>Days Overdue</th>
            <th>Compliance Progress</th>
            <th>Action</th>

        </tr>
    </thead>
   <tbody>

      @foreach($overdueLoas as $overdueLoas)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $overdueLoas->loa }}</td>
            <td>{{ $overdueLoas->accountHolder }}</td>
            <td>{{ $overdueLoas->deadlineOfCompletion }}</td>
            
            @php

     $deadline = Carbon::parse($overdueLoas->deadlineOfCompletion);
    $daysOverdue = $deadline->diffInDays(Carbon::today());

            @endphp

            <td> ({{ $daysOverdue }} days overdue)</td>


            <td>  <div class="w-full bg-gray-200 rounded-full relative h-4 overflow-hidden">
    @php
        $percentage1 = $overdueLoas->numberOfRequirement > 0
            ? ($overdueLoas->numberOfSubmittedRequirement / $overdueLoas->numberOfRequirement) * 100
            : 0;

        $percentage2 = $overdueLoas->numberOfRequirement > 0
            ? ($overdueLoas->numberOfConfirmedRequirements / $overdueLoas->numberOfRequirement) * 100
            : 0;
    @endphp

    <!-- First progress bar (green gradient) -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#fec8f3] via-[#f4b0e6] to-[#ec95da] rounded-full"
         style="width: {{ number_format($percentage1, 2) }}%">
        <span class="text-white text-[10px] font-medium flex justify-end items-center h-full">
            {{ number_format($percentage1, 2) }}%
        </span>
    </div>

    <!-- Second progress bar (pink gradient), layered on top -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  rounded-full "
         style="width: {{ number_format($percentage2, 2) }}%">
        <span class="text-white text-[10px] font-medium flex justify-center items-center h-full">
            {{ number_format($percentage2, 2) }}%
        </span>
    </div>
</div>

            </td>
            <td>
               
                    <a href="{{ route('loa.details', ['id' => $overdueLoas->id]) }}">
    <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">
        View
    </button>
</a>

                  
            </td>
        </tr>

       @endforeach
       

    </tbody>
</table>
    </div>
   



  </div>
  <div class="py-2 px-1 font-semibold border-dashed border-2 border-[#3a4d39] rounded-md bg-[#cce1cc] row-span-2  ">
    <p class="px-2">Notifications</p>

    <div class="rounded-md  text-[9px] text-gray-900 py-2 w-full h-[94%] overflow-auto">
        <h2 class="text-sm ">New</h2>
        @foreach($recentSubmitted as $recentSubmitted)

        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
            <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($recentSubmitted->profilePicture) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light text-white">{{ $recentSubmitted->accountHolderName }} submitted the <span class="font-bold ">{{ $recentSubmitted->requirementName }}</span> for {{ $recentSubmitted->loaName }}.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base text-white">{{ $recentSubmitted->dateSubmitted }}</div>
                <div class="grid content-center  text-base text-white">{{ \Carbon\Carbon::parse($recentSubmitted->created_at)->format('g:i A') }}</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <a href="{{ route('loa.details', ['id' => $recentSubmitted->loaId]) }}">
                    <svg class="w-6 h-6 text-gray-800 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                </svg>

        
                </a>
            </div>
        </div>
        
        @endforeach

        <h2 class="text-sm ">Today</h2>
          @foreach($today as $allSubmitted)

          
        <div class="border-b border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($allSubmitted->profilePicture) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">{{ $allSubmitted->accountHolderName }} submitted the <span class="font-bold ">{{ $allSubmitted->requirementName }}</span> for {{ $allSubmitted->loaName }}.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">{{ $allSubmitted->dateSubmitted }}</div>
                <div class="grid content-center  text-base ">

{{ \Carbon\Carbon::parse($allSubmitted->created_at)->format('g:i A') }}

</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                 <a href="{{ route('loa.details', ['id' => $allSubmitted->loaId]) }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                </svg>

                </a>


            </div>

            
        </div>
        @endforeach

        <h2 class="text-sm ">Old</h2>
        @foreach($old as $old)

        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                               <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($old->profilePicture ) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">{{ $old->accountHolderName }} submitted the <span class="font-bold ">{{ $old->requirementName }}</span> for {{ $old->loaName }}.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">{{ $old->dateSubmitted }}</div>
                <div class="grid content-center  text-base ">{{ \Carbon\Carbon::parse($old->created_at)->format('g:i A') }}</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <a href="{{ route('loa.details', ['id' => $old->loaId]) }}">
                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                </svg>

                </a>
{{-- 
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg> --}}

            </div>
        </div>
        </div>
        @endforeach
        
    </div>
  </div>
  <div class="p-2 font-semibold border-solid border-2 border-[#3a4d39] rounded-md bg-[#047bd6] text-white  mr-4 overflow-auto">For Approval
     <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
        
 <table id="myTable3" class="display">
    <thead>
        <tr>
            <th>No.</th>
            <th>Requirement</th>
            <th>Account Holder</th>
            <th>Date Submitted</th>
            <th>Supplier</th>
            <th>Action</th>





        </tr>
    </thead>
    <tbody>

        @foreach($forApproval as $forApproval)
            <tr>
                         
            <td>{{ $loop->iteration }}</td>
            <td>{{ $forApproval->requirementName }}</td>
            <td>{{ $forApproval->accountHolderName }}</td>
            <td>{{ $forApproval->dateSubmitted }}</td>
            <td>{{ $forApproval->supplier }}</td>
            <td>
                <a href="{{ route('loa.details', ['id' => $forApproval->loaId]) }}">
                <button type="button" class="text-white bg-[#047bd6] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>       </td>
                    </a>



                    </tr>

                    @endforeach

        

        

    </tbody>
</table>
    </div>
  </div>
  <div class="p-2 font-semibold border-solid border-2 border-[#3a4d39] rounded-md bg-[#f4f4f4]  mr-4 overflow-auto">New LMS Users
     <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable4" class="display">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Department</th>
            <th>User Type</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
          @foreach($newUsers as $newUsers)
            <tr>
                         
            <td>{{ $loop->iteration }}</td>
            <td>{{ $newUsers->name }}</td>
            <td>{{ $newUsers->department }}</td>
                <td>
        @if ($newUsers->users_type === 'submitter')
            Account Holder
        @elseif ($newUsers->users_type === 'admin')
            Administrator
        @elseif ($newUsers->users_type === 'head')
            Department Head
        @else
            {{ $newUsers->users_type }}
        @endif
    </td>

            <td>
                        
        <form action="{{ route('approve.user', $newUsers->id) }}" method="POST">
            @csrf
            <button type="submit" class="text-white bg-[#047bd6] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md p-1 my-2 text-center me-2 mb-2">
                Approve
            </button>
        </form>

 



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
 {{-- Flowbite and Tailwind installed correctly at this point June 10 2025 --}}


</body>
</html>