<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/loaDetails.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>LOA Details</title>
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
               <div class=" p-4 border-r border-[#3a4d39]">
                  <p class="text-xl">{{ $loa->loa }}</p>
                  <p class="text-xl font-thin"> {{ $typeDetails->nameOfLOA ?? 'N/A' }}</p>
              </div>
               <div class="p-4  border-r border-[#3a4d39]">
                <p class="text-xl font-thin">Deadline: {{ $loa->deadlineOfCompletion }}</p>
                  <p class="text-xl font-thin">Supplier: {{ $loa->supplier }}</p>
               </div>
               <div class="p-4">
                <p class="text-xl font-thin">Status:</p>
                  
                  <p class="text-xl font-thin {{ $statusColor }}">{{ $status }}</p>

                <input type="hidden" id="loa-status" value="{{ $status }}">

               </div>

               </div>

              
              

              
               <div class="p-2 row-span-6  font-semibold  border-solid border-2 border-[#3a4d39] rounded-md border border bg-white overflow-auto">
                @if(session('success'))
    <div id="toast-success" class="flex items-center w-full p-4 mb-4 text-gray-500 bg-white rounded-lg shadow-sm dark:text-gray-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
            <!-- Check Icon -->
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
            </svg>
            <span class="sr-only">Check icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">{{ session('success') }}</div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif

@if ($errors->any())
    <div id="toast-error" class="flex items-center w-full p-4 mb-4 text-red-500 bg-white rounded-lg shadow-sm dark:text-red-400 dark:bg-gray-800" role="alert">
        <div class="inline-flex items-center justify-center shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200">
            <!-- Error Icon -->
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10 10 0 0 0 10 0Zm1 15H9v-2h2Zm0-4H9V5h2Z"/>
            </svg>
            <span class="sr-only">Error icon</span>
        </div>
        <div class="ms-3 text-sm font-normal">
            <ul class="list-disc pl-4">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-white text-red-400 hover:text-red-900 rounded-lg focus:ring-2 focus:ring-red-300 p-1.5 hover:bg-red-100 inline-flex items-center justify-center h-8 w-8 dark:text-red-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-error" aria-label="Close">
            <span class="sr-only">Close</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
            </svg>
        </button>
    </div>
@endif
                   <p class="">Requirement Details</p>
                   <div class="grid grid-cols-2 p-2 font-semibold ">
                    <p class="font-thin">Name of LOA: </p>
                    <p>{{ $requirementQuery->loaName ?? $loa->loa}}</p>
                    <p class="font-thin">Type of Requirement: </p>
                    <p>{{ $requirementQuery->requirementName ?? $requirementName }}</p>
                    <p class="font-thin">Person In-Charge:</p>
                    <p>{{ $requirementQuery->accountHolderName ?? Auth::user()->name }}</p>


                    <p class="font-thin">Date Submitted:</p>
                    <p>{{ $requirementQuery->dateSubmitted ?? 'N/A' }}</p>

                     <p class="font-thin">Date Confirmed: </p>
                    <p>{{ $requirementQuery->dateConfirmed ?? 'N/A' }}</p>
                    <div class="my-4 col-span-2"></div>
                    @if ($requirementQuery)

                     @if (Auth::user()->users_type != "admin" )
                    <button type="button" disabled class=" cursor-not-allowed col-span-2 text-white bg-gradient-to-b from-gray-500 via-gray-400 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Submitted</button>
                     
                     @elseif ($requirementQuery->status !="For Approval")
                    <button type="button" disabled class=" cursor-not-allowed col-span-2 text-white bg-gradient-to-b from-gray-500 via-gray-400 to-gray-300 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Confirmed</button>
                     

                   @else
          <form action="{{ route('confirm.requirement') }}" method="POST" class="col-span-2">
                    @csrf
                    <input type="text" class="hidden" name="loaId" value="{{ $loa->id}}">
                    <input type="text" class="hidden" name="loaName" value="{{ $loa->loa }}">
                    <input type="text" class="hidden" name="requirement" value="{{ $requirement }}">
                    <input type="text" class="hidden" name="requirementName" value="{{ $requirementName }}" >
                    <input type="text" class="hidden" name="accountHolderUserName" value="{{  $loa->accountHolderUserName }}">
                    <input type="text" class="hidden" name="accountHolderName" value="{{ $loa->accountHolder}}">
                    <input type="text" class="hidden" name="accountHolderEmail" value="{{ $loa->accountHolderEmail}}">

                    <input type="text" class="hidden" name="deptHead" value="{{ $loa->accountHolderDeptHead}}">
                    <input type="text" class="hidden" name="deptHeadEmail" value="{{ $loa->accountHolderDeptHeadEmail}}">

                
                   <button type="submit" class=" w-full col-span-2 text-white bg-gradient-to-b from-[#3a4d39] via-[#4f6f52] to-[#739072] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Confirm</button>



                   </form>
                
                   @endif

            
                   @else
                    
                   <form action="{{ route('submit.requirement') }}" method="POST" class="col-span-2">
                    @csrf
                    <input type="text" class="hidden" name="loaId" value="{{ $loa->id}}">
                    <input type="text" class="hidden" name="loaSupplier" value="{{ $loa->supplier}}">

                    <input type="text" class="hidden" name="loaName" value="{{ $loa->loa }}">
                    <input type="text" class="hidden" name="requirement" value="{{ $requirement }}">
                    <input type="text" class="hidden" name="requirementName" value="{{ $requirementName }}" >
                    <input type="text" class="hidden" name="accountHolderUserName" value="{{  Auth::user()->userName }}">
                    <input type="text" class="hidden" name="accountHolderName" value="{{ Auth::user()->name}}">
                    <input type="text" class="hidden" name="deptHead" value="{{ $loa->accountHolderDeptHead}}">
                    <input type="text" class="hidden" name="deptHeadEmail" value="{{ $loa->accountHolderDeptHeadEmail}}">

                    @if (Auth::user()->users_type != "admin" )
                        @if($requirementName !="")
                   <button type="submit" class=" w-full col-span-2 text-white bg-gradient-to-b from-[#3a4d39] via-[#4f6f52] to-[#739072] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2">Submit</button>
                      @endif
                
                @else

                  @endif



                   </form>
                
                   @endif





                   </div>

               </div>
                <div class="p-2 row-span-5 col-span-2 font-semibold  border-solid border-2 border-[#3a4d39] rounded-md border border bg-white overflow-auto">
                      <p class="">Requirements Status</p>

                      <div class=" bg-gray-200 p-2   rounded-md  text-[9px] text-gray-900  w-full h-[94%] overflow-auto">
                                  @foreach ($requiredDocsNameWithStatus as $doc )
                                

                                      @php
                                      $statusLower = strtolower($doc['status'] );
                                      $bgColor = match($statusLower) {
                                      'for approval' => 'bg-gradient-to-r from-[#c82ebd] via-[#f0baf1] to-white',
                                      'pending' => 'bg-white',
                                      'completed' => 'bg-gradient-to-r from-[#3b4e3a] via-[#90b693] to-white',
                                      default => 'bg-white',
                                      };
                                          $textColor = match($statusLower) {
                                      'for approval' => 'text-white',
                                      'pending' => '',
                                      'completed' => 'text-white',
                                      default => '',
                                      };
                                       $borderColor = match($statusLower) {
                                      'for approval' => ' border hover:border-2  hover:border-orange-500 hover:border-solid',
                                      'pending' => 'border-solid border border-[#3a4d39] hover:border-2  hover:border-orange-500 hover:border-solid',
                                      'completed' => ' border hover:border-2  hover:border-orange-500 hover:border-solid',
                                      default => '',
                                      };
                          
                                      @endphp


                                   <a href="{{ route('loa.details', ['id' => $loa->id,'requirement' => $doc['field']]) }}"   class=" hover:bg-gradient-to-br  my-1 grid grid-cols-3 p-4 {{$borderColor}} h-20 w-full rounded-md {{ $bgColor }} flex items-center ">
                          
                              <div class="{{ $textColor }}  h-full  col-span-2  grid  content-center">
                                    <p class="text-xl">{{ucfirst(str_replace('_', ' ', $doc['label'] )) }}</p>
                                    
                              </div>
                              <div class="h-full  grid  content-center ">
                                <div class="justify-end ">
                                  <div class="justify-items-end">
                                    @if($statusLower=== 'for approval')
                              <div class="flex justify-items-end justify-end">
                                    <svg class="w-8 h-8 text-[#d87791]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                  </svg>
                                  <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1080" zoomAndPan="magnify" viewBox="0 0 810 809.999993" height="1080" preserveAspectRatio="xMidYMid meet" version="1.2"><defs><clipPath id="36bc9dd6f3"><path d="M 169.085938 0 L 640.835938 0 L 640.835938 810 L 169.085938 810 Z M 169.085938 0 "/></clipPath></defs><g id="0666eb3fb3"><g clip-rule="nonzero" clip-path="url(#36bc9dd6f3)"><path style=" stroke:none;fill-rule:nonzero;fill:#d87791;fill-opacity:1;" d="M 409.671875 413.960938 C 410.882812 433.660156 430.605469 446.617188 446.480469 457.042969 C 450.054688 459.382812 453.441406 461.609375 456.054688 463.5625 C 489.863281 489.007812 519.488281 513.078125 539.488281 550.105469 C 557.480469 583.394531 570.65625 623.308594 578.691406 668.753906 C 582.789062 691.890625 585.621094 715.769531 587.109375 739.730469 L 587.21875 741.378906 C 587.300781 742.644531 587.382812 743.9375 587.464844 745.203125 L 219.964844 745.203125 C 220.050781 743.9375 220.105469 742.671875 220.1875 741.40625 L 220.296875 739.730469 C 221.808594 715.769531 224.644531 691.890625 228.714844 668.753906 C 236.746094 623.308594 249.953125 583.394531 267.941406 550.105469 C 287.914062 513.078125 317.542969 489.007812 351.378906 463.5625 C 353.964844 461.609375 357.347656 459.382812 360.953125 457.042969 C 376.796875 446.617188 396.550781 433.660156 397.734375 413.960938 L 397.789062 413.414062 L 397.734375 412.863281 C 396.550781 393.164062 376.796875 380.207031 360.953125 369.78125 C 357.347656 367.445312 353.964844 365.214844 351.378906 363.261719 C 317.542969 337.816406 287.914062 313.746094 267.941406 276.71875 C 249.953125 243.429688 236.746094 203.515625 228.714844 158.070312 C 224.644531 134.933594 221.808594 111.054688 220.296875 87.09375 L 220.1875 85.417969 C 219.773438 78.59375 219.332031 71.605469 219.085938 64.675781 L 588.347656 64.675781 C 588.097656 71.632812 587.660156 78.621094 587.21875 85.445312 L 587.109375 87.09375 C 585.621094 111.054688 582.789062 134.933594 578.691406 158.070312 C 570.65625 203.515625 557.480469 243.429688 539.488281 276.71875 C 519.488281 313.746094 489.863281 337.816406 456.054688 363.261719 C 453.441406 365.214844 450.054688 367.445312 446.480469 369.78125 C 430.605469 380.207031 410.882812 393.164062 409.671875 412.863281 L 409.644531 413.414062 Z M 456.273438 384.71875 C 460.097656 382.21875 463.726562 379.824219 466.78125 377.511719 C 502.324219 350.800781 533.492188 325.410156 555.195312 285.21875 C 574.097656 250.226562 587.933594 208.496094 596.296875 161.179688 C 600.476562 137.382812 603.394531 112.84375 604.960938 88.222656 L 605.042969 86.574219 C 605.511719 79.390625 605.953125 72.046875 606.199219 64.675781 L 608.015625 64.675781 C 625.703125 64.675781 640.175781 50.203125 640.175781 32.515625 L 640.175781 32.074219 C 640.175781 14.386719 625.703125 -0.0820312 608.015625 -0.0820312 L 201.207031 -0.0820312 C 183.515625 -0.0820312 169.046875 14.386719 169.046875 32.074219 L 169.046875 32.515625 C 169.046875 50.203125 183.515625 64.675781 201.207031 64.675781 L 201.234375 64.675781 C 201.453125 72.046875 201.921875 79.390625 202.359375 86.542969 L 202.46875 88.222656 C 204.011719 112.84375 206.925781 137.382812 211.136719 161.179688 C 219.5 208.496094 233.308594 250.226562 252.207031 285.21875 C 273.941406 325.410156 305.109375 350.800781 340.625 377.511719 C 343.703125 379.824219 347.308594 382.21875 351.132812 384.71875 C 362.796875 392.367188 378.722656 402.820312 379.851562 413.414062 C 378.722656 424.003906 362.796875 434.457031 351.132812 442.105469 C 347.308594 444.609375 343.703125 447 340.625 449.285156 C 305.109375 476.023438 273.941406 501.414062 252.207031 541.605469 C 233.308594 576.597656 219.5 618.332031 211.136719 665.648438 C 206.925781 689.441406 204.011719 713.980469 202.46875 738.601562 L 202.359375 740.28125 C 202.277344 741.902344 202.167969 743.554688 202.058594 745.203125 L 201.207031 745.203125 C 183.515625 745.203125 169.046875 759.675781 169.046875 777.363281 L 169.046875 777.804688 C 169.046875 795.492188 183.515625 809.960938 201.207031 809.960938 L 608.015625 809.960938 C 625.703125 809.960938 640.175781 795.492188 640.175781 777.804688 L 640.175781 777.363281 C 640.175781 759.675781 625.703125 745.203125 608.015625 745.203125 L 605.347656 745.203125 C 605.265625 743.554688 605.15625 741.875 605.042969 740.253906 L 604.960938 738.601562 C 603.394531 713.980469 600.476562 689.441406 596.296875 665.648438 C 587.933594 618.332031 574.097656 576.597656 555.195312 541.605469 C 533.492188 501.414062 502.324219 476.023438 466.78125 449.285156 C 463.726562 447 460.097656 444.609375 456.273438 442.105469 C 444.609375 434.457031 428.707031 424.003906 427.554688 413.414062 C 428.707031 402.820312 444.609375 392.367188 456.273438 384.71875 "/></g><path style=" stroke:none;fill-rule:nonzero;fill:#d87791;fill-opacity:1;" d="M 455.667969 357.402344 C 486.367188 334.324219 513.683594 312.121094 532.28125 277.679688 C 550.328125 244.257812 561.496094 206.734375 568.070312 169.457031 C 568.070312 169.457031 471.597656 189.707031 404.609375 176.308594 C 279.304688 151.246094 232.234375 105.304688 232.234375 105.304688 C 233.554688 126.734375 236.113281 148.332031 239.828125 169.457031 C 246.429688 206.734375 257.601562 244.257812 275.644531 277.679688 C 294.242188 312.121094 321.558594 334.324219 352.261719 357.402344 C 364.335938 366.480469 400.867188 391.324219 401.914062 408.515625 L 406.011719 408.515625 C 407.058594 391.324219 443.589844 366.480469 455.667969 357.402344 "/><path style=" stroke:none;fill-rule:nonzero;fill:#d87791;fill-opacity:1;" d="M 281.890625 693.953125 C 269.429688 698.851562 255.425781 700.585938 243.679688 707.160156 C 231.824219 713.789062 232.402344 723.527344 230.859375 735.546875 L 576.378906 735.546875 C 576.242188 734.339844 576.105469 733.128906 575.996094 731.945312 C 575.308594 725.066406 574.480469 718.601562 571.152344 713.625 C 569.117188 710.542969 566.144531 708.039062 561.691406 706.332031 C 537.097656 697.035156 512.476562 687.683594 487.550781 679.125 C 463.398438 670.875 437.042969 660.585938 411.128906 660.253906 C 398.117188 660.117188 384.472656 663.089844 371.875 666.058594 C 341.449219 673.210938 310.996094 682.566406 281.890625 693.953125 "/></g></svg>
                              </div>
                                    @elseif($statusLower=== 'pending')
                                    <svg class="w-8 h-8 text[#d18751]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1080" zoomAndPan="magnify" viewBox="0 0 810 809.999993" height="1080" preserveAspectRatio="xMidYMid meet" version="1.2"><defs><clipPath id="d3c75fc1a7"><path d="M 169.085938 0 L 640.835938 0 L 640.835938 810 L 169.085938 810 Z M 169.085938 0 "/></clipPath></defs><g id="6fa5b6d644"><rect x="0" width="810" y="0" height="809.999993" style="fill:#ffffff;fill-opacity:1;stroke:none;"/><rect x="0" width="810" y="0" height="809.999993" style="fill:#ffffff;fill-opacity:1;stroke:none;"/><g clip-rule="nonzero" clip-path="url(#d3c75fc1a7)"><path style=" stroke:none;fill-rule:nonzero;fill:#d18751;fill-opacity:1;" d="M 409.671875 413.960938 C 410.882812 433.660156 430.605469 446.617188 446.480469 457.042969 C 450.054688 459.382812 453.441406 461.609375 456.054688 463.5625 C 489.863281 489.007812 519.488281 513.078125 539.488281 550.105469 C 557.480469 583.394531 570.65625 623.308594 578.691406 668.753906 C 582.789062 691.890625 585.621094 715.769531 587.109375 739.730469 L 587.21875 741.378906 C 587.300781 742.644531 587.382812 743.9375 587.464844 745.203125 L 219.964844 745.203125 C 220.050781 743.9375 220.105469 742.671875 220.1875 741.40625 L 220.296875 739.730469 C 221.808594 715.769531 224.644531 691.890625 228.714844 668.753906 C 236.746094 623.308594 249.953125 583.394531 267.941406 550.105469 C 287.914062 513.078125 317.542969 489.007812 351.378906 463.5625 C 353.964844 461.609375 357.347656 459.382812 360.953125 457.042969 C 376.796875 446.617188 396.550781 433.660156 397.734375 413.960938 L 397.789062 413.414062 L 397.734375 412.863281 C 396.550781 393.164062 376.796875 380.207031 360.953125 369.78125 C 357.347656 367.445312 353.964844 365.214844 351.378906 363.261719 C 317.542969 337.816406 287.914062 313.746094 267.941406 276.71875 C 249.953125 243.429688 236.746094 203.515625 228.714844 158.070312 C 224.644531 134.933594 221.808594 111.054688 220.296875 87.09375 L 220.1875 85.417969 C 219.773438 78.59375 219.332031 71.605469 219.085938 64.675781 L 588.347656 64.675781 C 588.097656 71.632812 587.660156 78.621094 587.21875 85.445312 L 587.109375 87.09375 C 585.621094 111.054688 582.789062 134.933594 578.691406 158.070312 C 570.65625 203.515625 557.480469 243.429688 539.488281 276.71875 C 519.488281 313.746094 489.863281 337.816406 456.054688 363.261719 C 453.441406 365.214844 450.054688 367.445312 446.480469 369.78125 C 430.605469 380.207031 410.882812 393.164062 409.671875 412.863281 L 409.644531 413.414062 Z M 456.273438 384.71875 C 460.097656 382.21875 463.726562 379.824219 466.78125 377.511719 C 502.324219 350.800781 533.492188 325.410156 555.195312 285.21875 C 574.097656 250.226562 587.933594 208.496094 596.296875 161.179688 C 600.476562 137.382812 603.394531 112.84375 604.960938 88.222656 L 605.042969 86.574219 C 605.511719 79.390625 605.953125 72.046875 606.199219 64.675781 L 608.015625 64.675781 C 625.703125 64.675781 640.175781 50.203125 640.175781 32.515625 L 640.175781 32.074219 C 640.175781 14.386719 625.703125 -0.0820312 608.015625 -0.0820312 L 201.207031 -0.0820312 C 183.515625 -0.0820312 169.046875 14.386719 169.046875 32.074219 L 169.046875 32.515625 C 169.046875 50.203125 183.515625 64.675781 201.207031 64.675781 L 201.234375 64.675781 C 201.453125 72.046875 201.921875 79.390625 202.359375 86.542969 L 202.46875 88.222656 C 204.011719 112.84375 206.925781 137.382812 211.136719 161.179688 C 219.5 208.496094 233.308594 250.226562 252.207031 285.21875 C 273.941406 325.410156 305.109375 350.800781 340.625 377.511719 C 343.703125 379.824219 347.308594 382.21875 351.132812 384.71875 C 362.796875 392.367188 378.722656 402.820312 379.851562 413.414062 C 378.722656 424.003906 362.796875 434.457031 351.132812 442.105469 C 347.308594 444.609375 343.703125 447 340.625 449.285156 C 305.109375 476.023438 273.941406 501.414062 252.207031 541.605469 C 233.308594 576.597656 219.5 618.332031 211.136719 665.648438 C 206.925781 689.441406 204.011719 713.980469 202.46875 738.601562 L 202.359375 740.28125 C 202.277344 741.902344 202.167969 743.554688 202.058594 745.203125 L 201.207031 745.203125 C 183.515625 745.203125 169.046875 759.675781 169.046875 777.363281 L 169.046875 777.804688 C 169.046875 795.492188 183.515625 809.960938 201.207031 809.960938 L 608.015625 809.960938 C 625.703125 809.960938 640.175781 795.492188 640.175781 777.804688 L 640.175781 777.363281 C 640.175781 759.675781 625.703125 745.203125 608.015625 745.203125 L 605.347656 745.203125 C 605.265625 743.554688 605.15625 741.875 605.042969 740.253906 L 604.960938 738.601562 C 603.394531 713.980469 600.476562 689.441406 596.296875 665.648438 C 587.933594 618.332031 574.097656 576.597656 555.195312 541.605469 C 533.492188 501.414062 502.324219 476.023438 466.78125 449.285156 C 463.726562 447 460.097656 444.609375 456.273438 442.105469 C 444.609375 434.457031 428.707031 424.003906 427.554688 413.414062 C 428.707031 402.820312 444.609375 392.367188 456.273438 384.71875 "/></g><path style=" stroke:none;fill-rule:nonzero;fill:#d18751;fill-opacity:1;" d="M 455.667969 357.402344 C 486.367188 334.324219 513.683594 312.121094 532.28125 277.679688 C 550.328125 244.257812 561.496094 206.734375 568.070312 169.457031 C 568.070312 169.457031 471.597656 189.707031 404.609375 176.308594 C 279.304688 151.246094 232.234375 105.304688 232.234375 105.304688 C 233.554688 126.734375 236.113281 148.332031 239.828125 169.457031 C 246.429688 206.734375 257.601562 244.257812 275.644531 277.679688 C 294.242188 312.121094 321.558594 334.324219 352.261719 357.402344 C 364.335938 366.480469 400.867188 391.324219 401.914062 408.515625 L 406.011719 408.515625 C 407.058594 391.324219 443.589844 366.480469 455.667969 357.402344 "/><path style=" stroke:none;fill-rule:nonzero;fill:#d18751;fill-opacity:1;" d="M 281.890625 693.953125 C 269.429688 698.851562 255.425781 700.585938 243.679688 707.160156 C 231.824219 713.789062 232.402344 723.527344 230.859375 735.546875 L 576.378906 735.546875 C 576.242188 734.339844 576.105469 733.128906 575.996094 731.945312 C 575.308594 725.066406 574.480469 718.601562 571.152344 713.625 C 569.117188 710.542969 566.144531 708.039062 561.691406 706.332031 C 537.097656 697.035156 512.476562 687.683594 487.550781 679.125 C 463.398438 670.875 437.042969 660.585938 411.128906 660.253906 C 398.117188 660.117188 384.472656 663.089844 371.875 666.058594 C 341.449219 673.210938 310.996094 682.566406 281.890625 693.953125 "/></g></svg>
                                    
                                       @elseif($statusLower=== 'completed')
                                        <svg class="w-8 h-8 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                                  </svg>
                                    
                                   

                             @endif


                              </div>
                                  <div class="text-lg text-end">{{$doc['status'] }}</div>
                                </div>
                              </div>
                            
                          </a>
                        {{-- <li>{{ $doc }}</li> --}}
                        @endforeach


                          


       
            
  

    </div>


               </div>
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>