<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/settings.js')
   <link rel="shortcut icon" href="{{ asset('images/BriefCaseLogoGreen.png') }}">

    <title>Settings</title>
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
   <div class="p-2 mt-14 bg-[#f4f4f4]  h-full">
     <div class="pb-14 h-full grid grid-rows-6 grid-cols-3 gap-2">
          <div class="row-span-6 p-4 grid justify-items-stretch flex font-semibold  rounded-md border border bg-white overflow-auto">
            <div class="p-2 w-full m-0 justify-self-center  flex justify-center">
                <div class="justify-items-center w-full">
                            <img class="w-48 h-48 p-2 rounded-full" src="{{ asset( Auth::user()->profilePicture) }}"  alt="user photo">
                                <div class=" text-xl font-semibold sm:text-2xl">{{ Auth::user()->name }}</div> 
                                <div class=" text-sm font-light sm:text-sm">{{ Auth::user()->email }}</div> 
                                <input type="text" class="hidden" id="activeNavSettings" value="{{$settings}}">

                                @if (Auth::user()->users_type != "admin" )
                              <ul id="dropdown-example" class="activeNavChildborder-t border-[#cce1cc] space-y-4 font-light text-lg w-full mt-10 ">
            <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 " >
                        <a href="{{ route('lms.settings', ['settings' => 'account']) }}" id="account" class=" flex items-center w-full p-2  transition duration-75  pl-11 group">Account</a>
             </li>
             
            </ul>

                              @else
                               <ul id="dropdown-example" class="activeNavChildborder-t border-[#cce1cc] space-y-4 font-light text-lg w-full mt-10 ">
            <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 " >
                        <a href="{{ route('lms.settings', ['settings' => 'account']) }}" id="account" class=" flex items-center w-full p-2  transition duration-75  pl-11 group">Account</a>
             </li>
              <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <a href="{{ route('lms.settings', ['settings' => 'suppliers']) }}"  id="suppliers" class="flex items-center w-full p-2  transition duration-75  pl-11 group">Suppliers</a>
             </li>
              <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <a href="{{ route('lms.settings', ['settings' => 'typesOfLoa']) }}"  id="typesOfLoa" class="flex items-center w-full p-2  transition duration-75  pl-11 group">Types of LOA</a>
             </li>
              <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <a href="{{ route('lms.settings', ['settings' => 'requirements']) }}"  id="requirements" class="flex items-center w-full p-2  transition duration-75  pl-11 group">Requirements</a>
             </li>
              <li id="" class="hover:border-l-4 hover:border-[#3b4f3a] hover:bg-[#f4f4f4]  focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                        <a href="{{ route('lms.settings', ['settings' => 'lmsUsers']) }}"  id="lmsUsers" class="flex items-center w-full p-2  transition duration-75  pl-11 group">LMS Users</a>
             </li>
            </ul>

                              @endif

                                   
                </div>
                             

            </div>

            

               </div>
               <div class="p-2 row-span-6 col-span-2   rounded-md border border bg-white overflow-auto">
                   <div class="">
                    
              
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
 </div>

  <div class="">
            
             @if ($errors->any())

              @foreach ($errors->all() as $error)
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
              <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Alert! </span>{{ $error }}
              </div>
            </div>
              @endforeach

            @endif

            </div> 


 @if($settings == "account")
               <form action="/submitAccountUpdate" enctype="multipart/form-data" class="w-full"  method="POST">
    @csrf
        <div class="p-2 font-semibold  rounded-md  bg-white overflow-auto text-2xl h-full">
            Account Settings
            <hr class="mt-2">
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">

        
                    <div class="grid md:grid-cols-2 md:gap-x-6 gap-y-3 h-full mb-4">
                    <div class="relative z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                        <input type="text" value="{{ Auth::user()->userName }}" id="userNameSettings" name="userNameSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                       <div class="relative z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="emailSettings" value="{{ Auth::user()->email }}" name="emailSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                     <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" id="fullNameSettings" value="{{ Auth::user()->name }}" name="fullNameSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                         <div class="relative col-span-2 z-0 w-full  group ">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select id="departmentSetting" name="departmentSetting" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                         <option  disabled value="Please Select">Select Department</option>
    @foreach($departments as $department)
        <option  value="{{ $department->department }}" {{ Auth::user()->department == $department->department ? 'selected' : '' }}>{{ $department->department }}</option>
    @endforeach

                        </select>
                    </div>

                       <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="passwordSettings" name="passwordSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                    </div>
                         <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input type="password" id="confirmPasswordSettings" name="confirmPasswordSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                    </div>
                     <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change Profile Picture</label>
                                         <input name="profilePicture" placeholder="Choose Profile Picture" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="file_input" type="file">

                    </div>
                      
                    </div>

                </div>       
    </div>
   
                    <button type="submit" class="w-full text-white bg-gradient-to-b from-[#739072] via-[#4f6f52] to-[#3a4d39] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg  px-5 py-2.5 text-center my-2">
                    Update
                  </button>
                </form>
   
 

           
    @elseif($settings == "suppliers")
      {{-- <div class="p-2 font-semibold  rounded-md  bg-white overflow-auto text-2xl h-full"> --}}
        <p class="font-semibold text-2xl p-2 ">Supplier Settings</p>
            
            <hr class="mt-2">
    <div class="px-2 py-8 text-sm ">
        <button 
        data-modal-target="addSupplierModal"
            data-modal-toggle="addSupplierModal"
              onclick="openAddModal()"
            type="button" class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Supplier</button>
                     <table id="myTableSupplier" class="display maintables">
    <thead>
        <tr>
           <th>No.</th>
            <th>Supplier</th>
            <th>Account Holder</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
@foreach($supplier as $supplier)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $supplier->supplier }}</td>
            <td>{{ $supplier->name }}</td>
            <td> 

                


            <button 
            type="button"
            data-modal-target="editSupplierModal"
            data-modal-toggle="editSupplierModal"
            data-id="{{ $supplier->id }}"
            data-supplier="{{ $supplier->supplier }}"
              data-user-id ="{{ $supplier->accountHolder }}"
              data-user-name ="{{ $supplier->name }}"
              data-userName ="{{ $supplier->userName }}"
              data-user-email ="{{ $supplier->email }}"
              

            onclick="openEditModal(this)"
             class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
                Edit
            </button>
                
            </td>



            @endforeach
    </tbody>
      </table>

    </div>

      
      <!-- Modal -->
<div id="editSupplierModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="p-6 space-y-6">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit Supplier</h3>
        <form action="/submitSupplierUpdate"  method="POST" >
          @csrf
          <input type="hidden" name="supplierId" id="supplierId">
          <input type="hidden" name="supplierNameOld" id="supplierNameOld">
          <input type="hidden" name="supplierAccountHolderOld" id="supplierAccountHolderOld">

          <input type="hidden" name="accountHolderName" id="accountHolderName">
          <input type="hidden" name="accountHolderUserName" id="accountHolderUserName">
          <input type="hidden" name="accountHolderEmail" id="accountHolderEmail">



          <!-- Supplier Name -->
          <div class="mb-4">
            <label for="supplierName" class="block text-sm font-medium text-gray-700 dark:text-white">Supplier Name</label>
            <input type="text" id="supplierName" name="supplierName" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>

          <!-- Account Holder Select -->
          <div class="mb-4">
            <label for="accountHolder" class="block text-sm font-medium text-gray-700 dark:text-white">Account Holder</label>
            <select id="accountHolder" name="accountHolder" class="select2 js-example-basic-single w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white">
              @foreach($users as $user)
                <option data-accout-holder-user-name="{{ $user->userName }}" data-accout-holder-name="{{ $user->name }}" data-accout-holder-email="{{ $user->email }}" value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
           <!-- Buttons -->
      <div class="flex justify-end p-4 space-x-2">
        <button data-modal-hide="editSupplierModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        <button  class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
      </div>
        </form>
      </div>

     
    </div>
  </div>
</div>

<div id="addSupplierModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="p-6 space-y-6">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Supplier</h3>
        <form action="/submitSupplierAdd"  method="POST" >
          @csrf
   
          <input type="hidden" name="accountHolderNameAdd" id="accountHolderNameAdd">
          <input type="hidden" name="accountHolderUserNameAdd" id="accountHolderUserNameAdd">
          <input type="hidden" name="accountHolderEmailAdd" id="accountHolderEmailAdd">



          <!-- Supplier Name -->
          <div class="mb-4">
            <label for="supplierNameAdd" class="block text-sm font-medium text-gray-700 dark:text-white">Supplier Name</label>
            <input type="text" id="supplierNameAdd" name="supplierNameAdd" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>

          <!-- Account Holder Select -->
          <div class="mb-4">
            <label for="accountHolderAdd" class="block text-sm font-medium text-gray-700 dark:text-white">Account Holder</label>
            <select id="accountHolderAdd" name="accountHolderAdd" class="select2 js-example-basic-single w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white">
              @foreach($users as $user)
                <option data-accout-holder-user-name="{{ $user->userName }}" data-accout-holder-name="{{ $user->name }}" data-accout-holder-email="{{ $user->email }}" value="{{ $user->id }}">{{ $user->name }}</option>
              @endforeach
            </select>
          </div>
           <!-- Buttons -->
      <div class="flex justify-end p-4 space-x-2">
        <button data-modal-hide="addSupplierModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        <button  class="bg-blue-600 text-white px-4 py-2 rounded">Add</button>
        <div class="">
            
             @if ($errors->any())

              @foreach ($errors->all() as $error)
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 dark:border-red-800" role="alert">
              <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
              </svg>
              <span class="sr-only">Info</span>
              <div>
                <span class="font-medium">Alert! </span>{{ $error }}
              </div>
            </div>
              @endforeach

            @endif

            </div>
      </div>
        </form>
      </div>

     
    </div>
  </div>
</div>




                @elseif($settings == "typesOfLoa")
                   <p class="font-semibold text-2xl p-2 ">Type of LOA Settings</p>
                     <hr class="mt-2">
                    <div class="px-2 py-8 text-sm ">
 
                      <button

                       data-modal-target="addTypeOfLoaModal"
                      data-modal-toggle="addTypeOfLoaModal"

                      type="button" class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Type of LOA</button>
                        <table id="myTableTypeOfLoa" class="display maintables">
                  <thead>
                      <tr>
                        <th>No.</th>
                          <th>Type of LOA</th>
                          <th>Type of LOA ID</th>
                          <th>Legend</th>
                          <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
            @foreach($typeOfLoa as $typeOfLoa)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $typeOfLoa->nameOfLOA }}</td>
            <td>{{ $typeOfLoa->typeOfLOA }}</td>
            <td>{{ $typeOfLoa->legend }}</td>
            <td> 

                
            @php
              $requirementIds = DB::table('requirements')->pluck('requirementId')->toArray();
               $selectedRequirements = [];

              foreach ($requirementIds as $reqId) {
                   if ($typeOfLoa->$reqId == 1) {
                       $selectedRequirements[] = $reqId;
                     }
                }
            @endphp



            <button 
          
            type="button" 
            data-modal-target="editTypeOfLoaModal"
            data-modal-toggle="editTypeOfLoaModal"
            data-id="{{ $typeOfLoa->id }}"
            data-typeId="{{ $typeOfLoa->typeOfLOA }}"
            data-typeName="{{ $typeOfLoa->nameOfLOA }}"
            data-legend="{{ $typeOfLoa->legend }}"
            data-requirements='@json($selectedRequirements)'
            onclick="openEditTypeOfLoaModal(this)"
            class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
                Edit
            </button>

                
            </td>



            @endforeach
    </tbody>
      </table>

    </div>
            
        <div id="addTypeOfLoaModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="p-6 space-y-6">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Type Of LOA</h3>
                <form action="/submitTypeOfLoaAdd"  method="POST" >
                  @csrf
          
                <div class="grid md:grid-cols-3 md:gap-x-6 gap-y-3 h-full mb-4">
                  
                <div class="mb-4">
                    <label for="typeNameAdd" class="block text-sm font-medium text-gray-700 dark:text-white">Type Of LOA Name</label>
                    <input type="text" id="typeNameAdd" name="typeNameAdd" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>

                  <!-- Requirement Id -->
            <div class="mb-4">
                    <label for="typeId" class="block text-sm font-medium text-gray-700 dark:text-white">Type of LOA ID</label>
                    <input type="text" id="typeId" name="typeId" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>
                    <div class="mb-4">
                    <label for="legend" class="block text-sm font-medium text-gray-700 dark:text-white">Legend</label>
                    <input type="text" id="legend" name="legend" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>

                  <p class="col-span-3">Requirements</p>

                   @foreach($requirement as $requirement)
                   <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                  <input  type="checkbox" value="{{ $requirement->requirementId }}"  name="requirements[]"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $requirement->requirementName }}</label>
              </div>
                  @endforeach
                
                </div>


                  <!-- Requirement Name -->
                  
                  <!-- Buttons -->
              <div class="flex justify-end p-4 space-x-2">
                <button data-modal-hide="addTypeOfLoaModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button  class="bg-blue-600 text-white px-4 py-2 rounded">Add</button>
              </div>
                </form>
              </div>

            
            </div>
          </div>
        </div>


        <div id="editTypeOfLoaModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="p-6 space-y-6">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit Requirement</h3>
                <form action="/submitTypeOfLoaEdit"  method="POST" >
                  @csrf
                  
                  <input type="hidden" name="typeOfLoaIdOld" id="typeOfLoaIdOld">
                <input type="hidden" name="typeOfLoaNameOld" id="typeOfLoaNameOld">
                <input type="hidden" name="typeOfLoaNameIdOld" id="typeOfLoaNameIdOld">
                <input type="hidden" name="typeOfLoaLegendOld" id="typeOfLoaLegendOld">


                <div class="grid md:grid-cols-3 md:gap-x-6 gap-y-3 h-full mb-4">
                  
                <div class="mb-4">
                    <label for="typeNameEdit" class="block text-sm font-medium text-gray-700 dark:text-white">Type Of LOA Name</label>
                    <input type="text" id="typeNameEdit" name="typeNameEdit" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>

                  <!-- Requirement Id -->
            <div class="mb-4">
                    <label for="typeIdEdit" class="block text-sm font-medium text-gray-700 dark:text-white">Type of LOA ID</label>
                    <input type="text" id="typeIdEdit" name="typeIdEdit" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>
                    <div class="mb-4">
                    <label for="legendEdit" class="block text-sm font-medium text-gray-700 dark:text-white">Legend</label>
                    <input type="text" id="legendEdit" name="legendEdit" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
                  </div>

                  <p class="col-span-3">Requirements</p>

                   @foreach($requirement2 as $requirement)
                   <div class="flex items-center ps-4 border border-gray-200 rounded-sm dark:border-gray-700">
                  <input id="{{ $requirement->requirementId }}" type="checkbox" value="{{ $requirement->requirementId }}"  name="requirements[]"  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                  <label for="bordered-checkbox-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $requirement->requirementName }}</label>
              </div>
                  @endforeach
                
                </div>


                  <!-- Requirement Name -->
                  
                  <!-- Buttons -->
              <div class="flex justify-end p-4 space-x-2">
                <button data-modal-hide="editTypeOfLoaModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button  class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
              </div>
                </form>
              </div>

            
            </div>
          </div>
        </div>







                @elseif($settings == "requirements")
                    <p class="font-semibold text-2xl p-2 ">Requirement Settings</p>
                     <hr class="mt-2">
                    <div class="px-2 py-8 text-sm ">
 
                      <button

                       data-modal-target="addRequirementModal"
                      data-modal-toggle="addRequirementModal"

                      type="button" class="w-full text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Add Requirement</button>
                        <table id="myTableRequirement" class="display maintables">
                  <thead>
                      <tr>
                        <th>No.</th>
                          <th>Requirement</th>
                          <th>Requirement Id</th>
                          <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
            @foreach($requirement as $requirement)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $requirement->requirementName }}</td>
            <td>{{ $requirement->requirementId }}</td>
            <td> 

                


            <button 
            data-modal-target="editRequirementModal"
            data-modal-toggle="editRequirementModal"
            data-id="{{ $requirement->id }}"
            data-requirementName="{{ $requirement->requirementName }}"
            data-requirementId="{{ $requirement->requirementId }}"
            onclick="openEditRequirementModal(this)"
            type="button" class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">
                Edit
            </button>

                
            </td>



            @endforeach
    </tbody>
      </table>

    </div>

    
<div id="addRequirementModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="p-6 space-y-6">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Add Requirement</h3>
        <form action="/submitRequirementAdd"  method="POST" >
          @csrf
   

          <!-- Requirement Name -->
          <div class="mb-4">
            <label for="requirementNameAdd" class="block text-sm font-medium text-gray-700 dark:text-white">Requirement Name</label>
            <input type="text" id="requirementNameAdd" name="requirementNameAdd" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>

          <!-- Requirement Id -->
    <div class="mb-4">
            <label for="requirementId" class="block text-sm font-medium text-gray-700 dark:text-white">Requirement Id</label>
            <input type="text" id="requirementId" name="requirementId" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>
           <!-- Buttons -->
      <div class="flex justify-end p-4 space-x-2">
        <button data-modal-hide="addRequirementModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        <button  class="bg-blue-600 text-white px-4 py-2 rounded">Add</button>
      </div>
        </form>
      </div>

     
    </div>
  </div>
</div>


   
<div id="editRequirementModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
  <div class="relative w-full max-w-md max-h-full">
    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
      <div class="p-6 space-y-6">
        <h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit Requirement</h3>
        <form action="/submitRequirementEdit"  method="POST" >
          @csrf
   
               <input type="hidden" name="requirementIdOld" id="requirementIdOld">
                <input type="hidden" name="requirementNameOld" id="requirementNameOld">
                <input type="hidden" name="requirementNameIdOld" id="requirementNameIdOld">


          <!-- Requirement Name -->
          <div class="mb-4">
            <label for="requirementNameEdit" class="block text-sm font-medium text-gray-700 dark:text-white">Requirement Name</label>
            <input type="text" id="requirementNameEdit" name="requirementNameEdit" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>

          <!-- Requirement Id -->
    <div class="mb-4">
            <label for="requirementIdEdit" class="block text-sm font-medium text-gray-700 dark:text-white">Requirement Id</label>
            <input type="text" id="requirementIdEdit" name="requirementIdEdit" class="w-full border rounded px-3 py-2 dark:bg-gray-600 dark:text-white" />
          </div>
           <!-- Buttons -->
      <div class="flex justify-end p-4 space-x-2">
        <button data-modal-hide="editRequirementModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
        <button  class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
      </div>
        </form>
      </div>

     
    </div>
  </div>
</div>




                       @elseif($settings == "lmsUsers")
                     <p class="font-semibold text-2xl p-2 ">Users Settings</p>
                     <hr class="mt-2">
                    <div class="px-2 py-8 text-sm ">
 
                    
                        <table id="myTableUsers" class="display maintables">
                  <thead>
                      <tr>
                        <th>No.</th>
                          <th>Name</th>
                          <th>Type</th>
                          <th>Action</th>

                      </tr>
                  </thead>
                  <tbody>
            @foreach($users2 as $users)
                    
            <tr class="">
           
            <td>{{ $loop->iteration }}</td>
            <td>{{ $users->name }}</td>
            <td>
        @if ($users->users_type === 'submitter')
            Account Holder
        @elseif ($users->users_type === 'admin')
            Administrator
        @elseif ($users->users_type === 'head')
            Department Head
        @else
            {{ $users->users_type }}
        @endif
    </td>


                <td>


           <button
    type="button"
    class="text-white bg-gradient-to-r from-[#a1caa2] via-[#88ac89] to-[#779678] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2"
    data-user-id="{{ $users->id }}"
    data-user-name="{{ $users->userName }}"
    data-full-name="{{ $users->name }}"
    data-email="{{ $users->email }}"
    data-department="{{ $users->department }}"
    data-usertype="{{ $users->users_type }}"
    data-status="{{ $users->status }}"

    data-modal-target="editUsersModal"
    data-modal-toggle="editUsersModal"
    onclick="populateEditForm(this)"
>
    Edit
</button>

                </td>
         


            @endforeach
    </tbody>
      </table>

    </div>



     <div id="editUsersModal" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
          <div class="relative w-full max-w-4xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <div class="p-6 space-y-6">
                <h3 class="text-xl font-medium text-gray-900 dark:text-white">Edit Users</h3>
                <form action="/updateUsersInfo" enctype="multipart/form-data"  method="POST" >
                  @csrf
          

                  <input type="hidden" id="userIdSettings" name="userIdSettings" />



                <div class="grid md:grid-cols-2 md:gap-x-6 gap-y-3 h-full mb-4">
                    <div class="relative z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User Name</label>
                        <input type="text" value="" id="userNameSettings" name="userNameSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                       <div class="relative z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" id="emailSettings" value="" name="emailSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                     <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                        <input type="text" id="fullNameSettings" value="" name="fullNameSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                    </div>
                         <div class="relative col-span-2 z-0 w-full  group ">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Department</label>
                        <select id="departmentSetting" name="departmentSetting" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                         <option  disabled value="Please Select">Select Department</option>
    @foreach($departments as $department)
        <option  value="{{ $department->department }}" >{{ $department->department }}</option>
    @endforeach

                        </select>
                    </div>

                     <div class="relative col-span-2 z-0 w-full  group ">
                        <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                        <select id="typeSettings" name="typeSettings" class="select2 js-example-basic-single bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                         <option  disabled value="Please Select">Select Type</option>
                    <option  value="admin">Administrator</option>
                            <option  value="submitter">Account Holder</option>
                            <option  value="head">Department Head</option>

                        </select>
                    </div>
                     <div class="relative col-span-2 z-0 w-full  group ">
                     <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                      Status
                     </label>
                    <label class="inline-flex items-center mb-5 cursor-pointer">
                  <input                
                    name="status"
                    id="statusSwitch"
                    value="1"
                    type="checkbox"  class="sr-only peer">
                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:w-5 after:h-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 dark:peer-checked:bg-blue-600"></div>
                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">Approved</span>
              </label>
               </div>


                       <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" id="passwordSettings" name="passwordSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                    </div>
                         <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm Password</label>
                        <input type="password" id="confirmPasswordSettings" name="confirmPasswordSettings" class=" border border-gray-300 text-gray-900 text-xl rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  />
                    </div>
                     <div class="relative col-span-2 z-0 w-full  group">
                        <label for="loa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Change Profile Picture</label>
                                         <input name="profilePicture" placeholder="Choose Profile Picture" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="file_input" type="file">

                    </div>
                      
                    </div>


                  <!-- Requirement Name -->
                  
                  <!-- Buttons -->
              <div class="flex justify-end p-4 space-x-2">
                <button data-modal-hide="editUsersModal" type="button" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
                <button  class="bg-blue-600 text-white px-4 py-2 rounded">Update</button>
              </div>
                </form>
              </div>

            
            </div>
          </div>
        </div>





                @endif

                   </div>

               </div>
 
     </div>
   </div>


   </section>

       @endauth



       
</body>
</html>