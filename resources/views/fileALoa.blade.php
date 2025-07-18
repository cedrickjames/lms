<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/fileALoa.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>File a LOA</title>
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
     <div class="pb-14 h-full">
        <form class="w-full" action="{{ route('submit.loa') }}" method="POST">
    @csrf
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


        <div class="p-2 font-semibold  rounded-md  bg-white overflow-auto text-2xl h-full">File a LOA
            <hr class="mt-2">
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">


         <div class="grid md:grid-cols-2 md:gap-x-6 gap-y-3 h-full mb-4">
            <div class="col-span-2 grid grid-cols-3 gap-x-6">
                <div class="relative z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name of LOA</label>
                        <input type="text" id="loa" name="loa" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                   <div class="relative z-0 w-full  group ">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type of LOA</label>
                        <select id="typeOfLOA" name="typeOfLOA" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select Type</option>

                    @foreach($typesOfLoa as $type)
                         <option value="{{ $type->legend }}">({{ $type->legend }}) {{ $type->nameOfLOA }}</option>
                         @endforeach

                        </select>
                    </div>
                    <div class="relative z-0 w-full  group">
                        <label for="qtyApplied" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Quantity Applied</label>
                        <input type="number" id="qtyApplied" name="qtyApplied" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                    </div>
                <div class="relative z-0 w-full  group col-span-2">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Supplier</label>
                        <select id="supplier" name="supplier" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Select Supplier</option>
                               @foreach($supplier as $supplier)
                         <option data-account-holder="{{ $supplier->accountHolder }}" data-supplier-id="{{ $supplier->id }}" value="{{ $supplier->supplier }}"> {{ $supplier->supplier }}</option>
                         @endforeach

                        </select>
                    </div> 


                  
                   
                    <div class="relative z-0 w-full  group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Holder</label>
                                <select id="accountHolder" name="accountHolder" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Select Account Holder</option>
                            @foreach($user as $user)
                                <option data-account-holder-department="{{ $user->department }}" data-account-holder-username="{{ $user->userName }}" data-account-holder-id="{{ $user->id }}" value="{{ $user->name }}"> {{ $user->name }}</option>
                                @endforeach

                                </select>
                    </div>
                    <div class="relative z-0 w-full  group hidden">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                        <input type="text" id="username" name="username" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                       <div class="relative z-0 w-full  group">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <select id="accountHolderEmail" name="accountHolderEmail" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Select Email</option>
                             @foreach($email as $email)
                                <option data-account-holder-email-id="{{ $email->id }}"  value="{{ $email->email }}"> {{ $email->email }}</option>
                                @endforeach


                                </select>
                    </div>
                    
                    <div class="relative z-0 w-full  group">
                                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Account Holder's Department Head</label>
                                <select id="accountHolderDeptHead" name="accountHolderDeptHead" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Select</option>
                            @foreach($deptHead as $deptHead)
                                <option data-account-head-department="{{ $deptHead->department }}" data-account-head-department-id="{{ $deptHead->id }}" value="{{ $deptHead->name }}"> {{ $deptHead->name }}</option>
                                @endforeach

                                </select>
                    </div>
                       <div class="relative z-0 w-full  group">
        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department Head's Email</label>
                                <select id="accountHolderDeptHeadEmail" name="accountHolderDeptHeadEmail" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled selected>Select</option>
                             @foreach($deptHeadEmail as $deptHeadEmail)
                                <option data-account-holder-head-email-id="{{ $deptHeadEmail->id }}" value="{{ $deptHeadEmail->email }}"> {{ $deptHeadEmail->email }}</option>
                                @endforeach


                                </select>
                    </div>
                
                 
                    <div class="relative z-0 w-full  group">
                        <label for="r_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contract expiration date</label>
                                <div class="relative">
                                            <input type="date" id="expiry" name="expiry" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please select a Date" required />

                                    <button type="button" onclick="document.getElementById('expiry')._flatpickr.open()" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </button>
                                </div>

                    </div>


                    <div class="relative z-0 w-full group">
                        <label for="r_department" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline of Completion</label>
                        
                                <div class="relative">
                                            <input type="date" id="deadline" name="deadline" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Please select a Date" required />

                                    <button type="button" onclick="document.getElementById('deadline')._flatpickr.open()" class="absolute inset-y-0 right-0 flex items-center pr-3">
                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </button>
                                </div>
                    </div>

                </div>
               
                 
    </div>
   
                    <button type="submit" class="w-full text-white bg-gradient-to-b from-[#739072] via-[#4f6f52] to-[#3a4d39] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg  px-5 py-2.5 text-center my-2">
                    Submit
                  </button>
                  <button type="button" class="w-full text-white bg-gradient-to-b from-[#f10000] via-[#ff3b3b] to-[#ff7676] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg  px-5 py-2.5 text-center my-2">
                    <a href="">Cancel</a>
                  </button>
   
  </div>
   </form> 
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>