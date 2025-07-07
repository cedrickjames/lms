
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

    <title>Home</title>
  
</head>
<body class="overflow-x-hidden overflow-hidden bg-cover bg-no-repeat bg-[url('../images/LOAMonitoringAuthUIBackground.png')] bg-blend-multiply h-screen">

   @auth
    
<section class="static h-full">
@include('navbar')

@include('sidebarSubmitter')

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

      @foreach($approachingSubmitter as $approaching)
                    
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

      @foreach($overdueLoasSubmitter as $overdueLoas)
                    
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
 @foreach($recentApproved as $recentApproved)

        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
            <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($recentApproved->profilePicture) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light text-white">{{ $recentApproved->approvedBy }} confirmed the <span class="font-bold ">{{ $recentApproved->requirementName }}</span> for {{ $recentApproved->loaName }}.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base text-white">{{ $recentApproved->dateConfirmed }}</div>
                <div class="grid content-center  text-base text-white">{{ \Carbon\Carbon::parse($recentApproved->updated_at)->format('g:i A') }}</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        
        @endforeach
        @foreach($recentFiled as $recentFiled)

        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
            <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($recentFiled->profilePicture) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light text-white">
               {{ $recentFiled->filedBy }} has filed the <span class="font-bold ">{{ $recentFiled->loa }}</span> listing you as the account holder.
                </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base text-white">{{ \Carbon\Carbon::parse($recentFiled->created_at)->format('F d, Y')  }}</div>
                <div class="grid content-center  text-base text-white">{{ \Carbon\Carbon::parse($recentFiled->created_at)->format('g:i A') }}</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        
        @endforeach
        
        <h2 class="text-sm ">Today</h2>
            @foreach($todayNotif as $allSubmitted)

                    
                    <div class="border-b border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                        <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                                <img class=" h-14 w-14 rounded-full " src="{{ asset($allSubmitted->profilePicture) }}" >
                        </div>
                        <div class="h-full w-[50%]  grid  content-center">
                            <p class="text-base font-light ">{{ $allSubmitted->approvedBy }} confirmed the <span class="font-bold ">{{ $allSubmitted->requirementName }}</span> for {{ $allSubmitted->loaName }}.     </p>
                        </div>
                        <div class="h-full w-[10%] "></div>

                        <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                            <div class="grid content-center  text-base ">{{ $allSubmitted->dateConfirmed }}</div>
                            <div class="grid content-center  text-base ">

            {{ \Carbon\Carbon::parse($allSubmitted->updated_at)->format('g:i A') }}

            </div>
                        </div>
                        <div class="h-full w-[5%]  grid content-center justify-center">
                            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                        </svg>

                        </div>
                    </div>
                    @endforeach

                    @foreach($todayFiled as $todayFiled)

                    
                    <div class="border-b border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                        <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                                <img class=" h-14 w-14 rounded-full " src="{{ asset($todayFiled->profilePicture) }}">
                        </div>
                        <div class="h-full w-[50%]  grid  content-center">
                            <p class="text-base font-light ">  {{ $todayFiled->filedBy }} has filed the <span class="font-bold ">{{ $todayFiled->loa }}</span> listing you as the account holder.</p>
                        </div>
                        <div class="h-full w-[10%] "></div>

                        <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                            <div class="grid content-center  text-base ">{{ \Carbon\Carbon::parse($todayFiled->created_at)->format('F d, Y')  }}</div>
                            <div class="grid content-center  text-base ">

            {{ \Carbon\Carbon::parse($todayFiled->created_at)->format('g:i A') }}

            </div>
                        </div>
                        <div class="h-full w-[5%]  grid content-center justify-center">
                            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                        </svg>

                        </div>
                    </div>
                    @endforeach

       
        <h2 class="text-sm ">Old</h2>
        @foreach($old as $old)

        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                               <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset($old->profilePicture) }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">{{ $old->approvedBy }} confirmed the <span class="font-bold ">{{ $old->requirementName }}</span> for {{ $old->loaName }}.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">{{ $old->dateConfirmed }}</div>
                <div class="grid content-center  text-base ">{{ \Carbon\Carbon::parse($old->updated_at)->format('g:i A') }}</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
        @endforeach

         @foreach($oldFiled as $oldFiled)

                    
                    <div class="border-b border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                        <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                                <img class=" h-14 w-14 rounded-full "  src="{{ asset($oldFiled->profilePicture) }}">
                        </div>
                        <div class="h-full w-[50%]  grid  content-center">
                            <p class="text-base font-light ">  {{ $oldFiled->filedBy }} has filed the <span class="font-bold ">{{ $oldFiled->loa }}</span> listing you as the account holder.</p>
                        </div>
                        <div class="h-full w-[10%] "></div>

                        <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                            <div class="grid content-center  text-base ">{{ \Carbon\Carbon::parse($oldFiled->created_at)->format('F d, Y')  }}</div>
                            <div class="grid content-center  text-base ">

            {{ \Carbon\Carbon::parse($oldFiled->created_at)->format('g:i A') }}

            </div>
                        </div>
                        <div class="h-full w-[5%]  grid content-center justify-center">
                            <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                        </svg>

                        </div>
                    </div>
                    @endforeach
    </div>
  </div>
  <div class="p-2 font-semibold border-solid border-2 border-[#3a4d39] rounded-md bg-[#047bd6] text-white  mr-4 overflow-auto">Email Notification Status
     <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
        
 <table id="myTable3" class="display">
    <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
            <th>Date Sent</th>
            <th>Send Status</th>
            <th>Frequency Type</th>
            <th>Remarks</th>
            <th>Action</th>





        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>
                <div class="flex">
                    <svg class="h-4 w-4 text-[#00cc00]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                    </svg>
                    <h1>Sent</h1>


                </div>
            </td>
            <td>Monthly</td>
            <td>Due in 2 months</td>
            <td>
                 <button type="button" class="text-white bg-gray-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">Retry</button>
            </td>




        </tr>


        <tr>
            <td>1</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>
                <div class="flex">
                    <svg class="h-4 w-4 text-[#ee3432]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm-1.72 6.97a.75.75 0 1 0-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 1 0 1.06 1.06L12 13.06l1.72 1.72a.75.75 0 1 0 1.06-1.06L13.06 12l1.72-1.72a.75.75 0 1 0-1.06-1.06L12 10.94l-1.72-1.72Z" clip-rule="evenodd" />
                    </svg>

                    <h1>Failed</h1>


                </div>
            </td>
            <td>Monthly</td>
            <td>Due in 2 months</td>
            <td>
                    <button type="button" class="text-white bg-[#047bd6] focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">Retry</button>
            </td>




        </tr>
        

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