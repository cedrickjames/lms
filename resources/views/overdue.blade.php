<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     @vite('resources/css/app.css')
     @vite('resources/js/overdue.js')

    <title>Overdue</title>
</head>
<body class="overflow-x-hidden overflow-hidden bg-cover bg-no-repeat bg-[url('../images/LOAMonitoringAuthUIBackground.png')] bg-blend-multiply h-screen">
   @auth

   <section class="static h-full">
    
<nav class="fixed top-0 z-50 w-full  border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700 bg-cover bg-no-repeat bg-[url('../images/LOAMonitoringAuthUIBackground.png')] bg-blend-multiply ">
  <div class="px-3 py-3 lg:px-5 lg:pl-3">
    <div class="flex items-center justify-between">
      <div class="flex items-center justify-start rtl:justify-end">
        <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
            <span class="sr-only">Open sidebar</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
               <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
            </svg>
         </button>
        <a href="https://flowbite.com" class="flex ms-2 md:me-24 gap-2">
           <img src="{{ asset('images/BriefCaseLogo.png') }}" class="h-8" alt="LMS Logo" />
          <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap text-white">LOA Monitoring System</span>
        </a>
      </div>
      <div class="flex items-center">
          <div class="flex items-center ms-3 gap-8">
            <div class="text-white text-xl font-semibold sm:text-2xl">Cedrick James Orozo</div>
            <div>
              <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
              </button>
            </div>
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-sm shadow-sm dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
              <div class="px-4 py-3" role="none">
                <p class="text-sm text-gray-900 dark:text-white" role="none">
                  Cedrick James Orozo
                </p>
                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                  mis.dev@glory.com.ph
                </p>
              </div>
              <ul class="py-1" role="none">
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                </li>
                <li>
                  <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                </li>
                <form action="/logout" method="POST">
                          @csrf
                <li>
                    
                  

                  <button  class="w-full flex block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</button>

                  
                </li>
                  
              </ul>
            </div>
          </div>
        </div>
    </div>
  </div>
</nav>

@include('sidebar')


<div class=" sm:ml-64  h-full ">
   <div class="p-4 mt-14 bg-white  h-full">
     <div class="pb-14 h-full">
        <div class="p-2 font-semibold text-white border-solid border-2 border-[#3a4d39] rounded-md border border bg-[#d15651] overflow-auto">List of Letter of Authority
    <div class="rounded-md bg-white text-[15px] text-gray-500 p-2 w-full ">
 <table id="myTable" class="display maintables">
    <thead>
        <tr>
            <th>No.</th>
            <th>LOA Name</th>
            <th>Deadline</th>
            <th>Compliance Progress</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <tr class="">
            <td>1</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
               
                 <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
            </td>
        </tr>
         <tr>
            <td>2</td>
            <td>LOA 111-122</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 55%"> 55%</div>
            </div>
            </td>
            <td>
                 <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
            </td>
        </tr>
                <tr>
            <td>3</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
                
                 <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center my-2">View</button>
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

</body>
</html>