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
<body class="overflow-x-hidden bg-cover bg-no-repeat bg-[url('../images/LOAMonitoringAuthUIBackground.png')] bg-blend-multiply h-screen">

   @auth
    
      <section class="static h-full ">
        <nav class="fixed w-full">
  <div class="w-full flex flex-wrap items-center justify-between mx-20 p-4 pr-24">
    <a href="https://flowbite.com/" class=" flex justify-start space-x-3 rtl:space-x-reverse">
   <img src="{{ asset('images/BriefCaseLogo.png') }}" class="h-8" alt="LMS Logo" />
        <span class="self-center text-2xl whitespace-nowrap text-white font-serif">LOA Monitoring System</span>
    </a>
     <div class="hidden md:flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      <span class="pr-10  self-center  font-semibold whitespace-nowrap   text-white">Cedrick James Orozo</span>
      <button type="button" class="flex mr-3 text-sm  rounded-full sm:mr-0 focus:ring-4 focus:ring-gray-300 "  aria-expanded="false" id="userDropdownButton" data-dropdown-toggle="userDropdown">
        <span class="sr-only">Open user menu</span>
        <div class="w-10 h-10 rounded-full  ">
          <div class="rounded-full h-full w-full" style="background-color: #C5957F; background-size: cover; background-image: url({{ asset('images/Pablo.png') }})"></div>

        </div>
      </button>
      <!-- Dropdown menu -->
      <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow  "id="userDropdown">
        <div class="px-4 py-3">
          <span class="block text-sm text-gray-900 ">Cedrick James Orozo</span>
          <span class="block text-sm  text-gray-500 truncate ">cedrick</span>
        </div>
        <ul class="py-2" aria-labelledby="user-menu-button">
          <li>
            <a href="#" target="_blank" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Settings 1</a>
          </li>
          <li>Settings 2</a>
          </li>
          <li>
            <a  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Settings 3</a>
          </li>
          <li>
              <form action="/logout" method="POST">
            @csrf
            <button type="button"  class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 ">Sign out</button>
              </form>
            
          </li>
        </ul>
      </div>

    </div>

  </div>
     
</nav>

<div class="h-full fixed w-full top-16 bg-[#ffffff57]">
  @include('sidebar')

<div class="h-full ml-[295px] w-full pl-2 pr-[330px]  fixed  top-16 left-10 right-5  bg-white  pt-4 pb-14 z-50 ">
<div class="pb-14 h-full grid grid-rows-3 grid-cols-2 gap-4">
  <div class="p-2 font-semibold text-white border-solid border-2 border-[#3a4d39] rounded-md border border bg-[#d18751] overflow-auto">Approaching the Deadline
    <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>

    </tbody>
</table>
    </div>
   



  </div>
  <div class="p-2 font-semibold text-white border-dashed border-2 border-[#3a4d39] rounded-md bg-[#d15651] mr-4 overflow-auto">Overdue
    <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable2" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>

    </tbody>
</table>
    </div>
   



  </div>
  <div class="py-2 px-1 font-semibold border-dashed border-2 border-[#3a4d39] rounded-md bg-[#cce1cc] row-span-2 ">
    <p class="px-2">Notifications</p>

    <div class="rounded-md  text-[9px] text-gray-900 py-2 w-full h-[94%] overflow-auto">
        <h2 class="text-sm ">New</h2>
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#3a4d39] via-[#4f6f52] to-[#739072] flex items-center ">
            <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
                        <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
        <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
                    <div class="border-b border-[#cce1cc] h-16 w-full bg-gradient-to-r from-[#afc6b1] to-[#c6d8c5] flex items-center  ">
              <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
              <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
              <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
              <div class="h-full w-[10%]  grid content-center justify-center p-1">
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
  <div class="p-2 font-semibold border-solid border-2 border-[#3a4d39] rounded-md bg-[#daeeff]  mr-4 overflow-auto">Email Notification Status
     <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
        
 <table id="myTable3" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>

    </tbody>
</table>
    </div>
  </div>
  <div class="p-2 font-semibold border-solid border-2 border-[#3a4d39] rounded-md bg-[#f4f4f4]  mr-4 overflow-auto">New LMS Users
     <div class="rounded-md bg-white text-[9px] text-gray-500 p-2 w-full ">
 <table id="myTable4" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
       
      

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