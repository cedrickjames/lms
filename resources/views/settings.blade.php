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

                </div>
                             

            </div>

            

               </div>
               <div class="p-2 row-span-6 col-span-2 font-semibold   rounded-md border border bg-white overflow-auto">
                   <div class="">
                    
                    <form action="/submitAccountUpdate" enctype="multipart/form-data" class="w-full"  method="POST">
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



        <div class="p-2 font-semibold  rounded-md  bg-white overflow-auto text-2xl h-full">
                @if($settings == "account")
                    Account Settings
                @elseif($settings == "suppliers")
                    Suppliers Settings
                @elseif($settings == "typesOfLoa")
                    Type of LOA Settings
                     @elseif($settings == "requirements")
                    Requirements Settings
                       @elseif($settings == "lmsUsers")
                    LMS Users Settings
                @endif

            <hr class="mt-2">
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">

         @if($settings == "account")
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

   </form>
    @elseif($settings == "suppliers")
                    Suppliers Settings
                @elseif($settings == "typesOfLoa")
                    Type of LOA Settings
                     @elseif($settings == "requirements")
                    Requirements Settings
                       @elseif($settings == "lmsUsers")
                    LMS Users Settings
                @endif

                   </div>

               </div>
 
     </div>
   </div>
</div>

   </section>

       @endauth

</body>
</html>