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
            <th>Deadline</th>
            <th>Days Overdue</th>
            <th>Compliance Progress</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>5 days</td>

            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
                           <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
            </td>
        </tr>
         <tr>
            <td>2</td>
            <td>LOA 111-122</td>
            <td>June 24, 2025</td>
               <td>5 days</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 55%"> 55%</div>
            </div>
            </td>
            <td>
            <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
            </td>
        </tr>
                <tr>
            <td>3</td>
            <td>LOA 111-123</td>
            <td>June 24, 2025</td>
            <td>5 days</td>
            <td>  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700">
            <div class="bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651]  font-medium text-white text-center p-0.5 leading-none rounded-full" style="width: 45%"> 45%</div>
            </div>
            </td>
            <td>
                          <button type="button" class="text-white bg-gradient-to-r from-[#f26b66] via-[#d94d48] to-[#d15651] hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-md  p-1 my-2 text-center me-2 mb-2">View</button>
            </td>
        </tr>

    </tbody>
</table>
    </div>
   



  </div>
  <div class="py-2 px-1 font-semibold border-dashed border-2 border-[#3a4d39] rounded-md bg-[#cce1cc] row-span-2  ">
    <p class="px-2">Notifications</p>

    <div class="rounded-md  text-[9px] text-gray-900 py-2 w-full h-[94%] overflow-auto">
        <h2 class="text-sm ">New</h2>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
            <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Klarisse.png') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light text-white">Ms. Klarisse De Guzman submitted the <span class="font-bold ">Request of Letter</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base text-white">June 11, 2025</div>
                <div class="grid content-center  text-base text-white">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
                        <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light text-white">Mr. Stell Ajero submitted the <span class="font-bold ">Surety Bond</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base text-white">June 11, 2025</div>
                <div class="grid content-center  text-base text-white">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        <h2 class="text-sm ">Today</h2>
        <div class="border-b border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Pablo.png') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Pablo Nase submitted the <span class="font-bold ">Forecast</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        <div class="border-t border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                    <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Justin.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Justin De Dios submitted the <span class="font-bold ">e-CERTIFICATE</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
        <h2 class="text-sm ">Old</h2>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                               <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Josh.png') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Josh Cullens submitted the <span class="font-bold ">Request of Letter</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Ken.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Ken Suson submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Stell Ajero submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
                <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Stell Ajero submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
                <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Stell Ajero submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
                <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Stell Ajero submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
            <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
            </svg>

            </div>
        </div>
        </div>
                <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
            <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-0 my-1">
                    <img class=" h-14 w-14 rounded-full " src="{{ asset('images/Stell.jpg') }}">
            </div>
            <div class="h-full w-[50%]  grid  content-center">
                <p class="text-base font-light ">Mr. Stell Ajero submitted the <span class="font-bold ">LEDGER/LIQUIDATION (PEZA/BOC)</span> for LOA 111-127.     </p>
            </div>
            <div class="h-full w-[10%] "></div>

            <div class="h-full w-[25%] font-light grid grid-rows-2 grid-flow-col ">
                <div class="grid content-center  text-base ">June 11, 2025</div>
                <div class="grid content-center  text-base ">1:08 PM</div>
            </div>
            <div class="h-full w-[5%]  grid content-center justify-center">
                <svg class="w-6 h-6 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M4.5 12a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Zm6 0a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0Z" clip-rule="evenodd" />
                </svg>

            </div>
        </div>
        </div>
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