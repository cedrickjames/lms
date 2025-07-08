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
@include('sidebarSubmitter')


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
      @foreach($listOfLOASubmitter as $listOfLOASubmitter)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $listOfLOASubmitter->loa }}</td>
            <td>{{ $listOfLOASubmitter->accountHolder }}</td>
            <td>{{ $listOfLOASubmitter->deadlineOfCompletion }}</td>
            <td>  <div class="w-full bg-gray-200 rounded-full relative h-6 overflow-hidden">
    @php
        $percentage1 = $listOfLOASubmitter->numberOfRequirement > 0
            ? ($listOfLOASubmitter->numberOfSubmittedRequirement / $listOfLOASubmitter->numberOfRequirement) * 100
            : 0;

        $percentage2 = $listOfLOASubmitter->numberOfRequirement > 0
            ? ($listOfLOASubmitter->numberOfConfirmedRequirements / $listOfLOASubmitter->numberOfRequirement) * 100
            : 0;
    @endphp

    <!-- First progress bar (green gradient) -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#fec8f3] via-[#f4b0e6] to-[#ec95da] rounded-full"
         style="width: {{ number_format($percentage1, 2) }}%">
        <span class="text-white text-sm font-medium flex justify-end items-center h-full">
            {{ number_format($percentage1, 2) }}%
        </span>
    </div>

    <!-- Second progress bar (pink gradient), layered on top -->
    <div class="absolute top-0 left-0 h-full bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678]  rounded-full "
         style="width: {{ number_format($percentage2, 2) }}%">
        <span class="text-white text-sm font-medium flex justify-center items-center h-full">
            {{ number_format($percentage2, 2) }}%
        </span>
    </div>
</div>

            </td>
            <td>
               
                    <a href="{{ route('loa.details', ['id' => $listOfLOASubmitter->id]) }}">
    <button type="button" class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
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
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>