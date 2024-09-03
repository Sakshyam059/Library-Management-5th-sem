<div class="hidden w-full h-16 border-b lg:flex px-4 items-center">
        <a href="" class="text-xl tracking-wide text-center block font-medium"><span class="text-red-600 font-extrabold">Library</span><span class="text-white">System</span></a>


</div>
  
<header class="hidden lg:block pt-2 lg:pl-3 text-stone-400 text-xs " >Pages</header>
<div class="px-2 ">  
    <a href="{{route('dashboard')}}" class="flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1  myblueo6er hover:text-white hover:bg-blue-600 rounded-lg cursor-pointer {{ Request::routeIs('dashboard') ? 'lg:bg-blue-600' : '' }}">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path d="M18.121,9.88l-7.832-7.836c-0.155-0.158-0.428-0.155-0.584,0L1.842,9.913c-0.262,0.263-0.073,0.705,0.292,0.705h2.069v7.042c0,0.227,0.187,0.414,0.414,0.414h3.725c0.228,0,0.414-0.188,0.414-0.414v-3.313h2.483v3.313c0,0.227,0.187,0.414,0.413,0.414h3.726c0.229,0,0.414-0.188,0.414-0.414v-7.042h2.068h0.004C18.331,10.617,18.389,10.146,18.121,9.88 M14.963,17.245h-2.896v-3.313c0-0.229-0.186-0.415-0.414-0.415H8.342c-0.228,0-0.414,0.187-0.414,0.415v3.313H5.032v-6.628h9.931V17.245z M3.133,9.79l6.864-6.868l6.867,6.868H3.133z"></path>
        </svg>
        <span class="text-sm mx-3 hidden lg:block " :class="{'hidden':!sidebar}"  >Dashboard</span>
    </a>
<!--
    <a href="{{route('home')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
            <path d="M17.431,2.156h-3.715c-0.228,0-0.413,0.186-0.413,0.413v6.973h-2.89V6.687c0-0.229-0.186-0.413-0.413-0.413H6.285c-0.228,0-0.413,0.184-0.413,0.413v6.388H2.569c-0.227,0-0.413,0.187-0.413,0.413v3.942c0,0.228,0.186,0.413,0.413,0.413h14.862c0.228,0,0.413-0.186,0.413-0.413V2.569C17.844,2.342,17.658,2.156,17.431,2.156 M5.872,17.019h-2.89v-3.117h2.89V17.019zM9.587,17.019h-2.89V7.1h2.89V17.019z M13.303,17.019h-2.89v-6.651h2.89V17.019z M17.019,17.019h-2.891V2.982h2.891V17.019z"></path>
        </svg>
        <span class="text-sm mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >Homepage</span>
    </a>-->
 
      <details class=" transition-all duration-150 h-10 open:h-[170px] overflow-hidden w-full flex items-center text-gray-100 my-1   rounded-lg cursor-pointer " {{Request::routeIs('semester.index')?'open' : '' }}>
        <summary class="transition-all duration-500 flex cursor-pointer items-center rounded-lg px-2 lg:px-4 py-2 text-gray-100 hover:bg-blue-600 hover:text-white {{ Request::routeIs('category.index')||Request::routeIs('semester.index')?'lg:bg-blue-600' : '' }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
            </svg>
  
            <span class="ml-3 text-sm  font-medium"> Courses </span>
  
            <span class="ml-auto shrink-0 transition duration-300 group-open:-rotate-180">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
          </summary>
          <div >
    <a href="{{route('semester.index',['course_name'=>'csit'])}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer  ">
        <svg class="svg-icon h-4 w-4 ml-3 fill-current" viewBox="0 0 20 20">
            <path  d="M9.896,3.838L0.792,1.562v14.794l9.104,2.276L19,16.356V1.562L9.896,3.838z M9.327,17.332L1.93,15.219V3.27
                l7.397,1.585V17.332z M17.862,15.219l-7.397,2.113V4.855l7.397-1.585V15.219z"></path>
        </svg>
        <span class="text-xs mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >Bsc CSIT</span>
    </a>
    <a href="{{route('semester.index',['course_name'=>'bca'])}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer ">
        <svg class="svg-icon h-4 w-4 ml-3 fill-current" viewBox="0 0 20 20">
            <path  d="M9.896,3.838L0.792,1.562v14.794l9.104,2.276L19,16.356V1.562L9.896,3.838z M9.327,17.332L1.93,15.219V3.27
                l7.397,1.585V17.332z M17.862,15.219l-7.397,2.113V4.855l7.397-1.585V15.219z"></path>
        </svg>
        <span class="text-xs mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >BCA</span>
    </a>
    <a href="{{route('semester.index',['course_name'=>'bim'])}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer ">
        <svg class="svg-icon h-4 w-4 ml-3 fill-current" viewBox="0 0 20 20">
            <path  d="M9.896,3.838L0.792,1.562v14.794l9.104,2.276L19,16.356V1.562L9.896,3.838z M9.327,17.332L1.93,15.219V3.27
                l7.397,1.585V17.332z M17.862,15.219l-7.397,2.113V4.855l7.397-1.585V15.219z"></path>
        </svg>
        <span class="text-xs mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >BIM</span>
    </a></div>

      </details>
   
    
    <a href="{{route('book.index')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer {{ Request::routeIs('book.index') ? 'lg:bg-blue-600' : '' }}">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path d="M18.303,4.742l-1.454-1.455c-0.171-0.171-0.475-0.171-0.646,0l-3.061,3.064H2.019c-0.251,0-0.457,0.205-0.457,0.456v9.578c0,0.251,0.206,0.456,0.457,0.456h13.683c0.252,0,0.457-0.205,0.457-0.456V7.533l2.144-2.146C18.481,5.208,18.483,4.917,18.303,4.742 M15.258,15.929H2.476V7.263h9.754L9.695,9.792c-0.057,0.057-0.101,0.13-0.119,0.212L9.18,11.36h-3.98c-0.251,0-0.457,0.205-0.457,0.456c0,0.253,0.205,0.456,0.457,0.456h4.336c0.023,0,0.899,0.02,1.498-0.127c0.312-0.077,0.55-0.137,0.55-0.137c0.08-0.018,0.155-0.059,0.212-0.118l3.463-3.443V15.929z M11.241,11.156l-1.078,0.267l0.267-1.076l6.097-6.091l0.808,0.808L11.241,11.156z"></path>
        </svg>
        <span class="text-sm mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >Books</span>
    </a>

    <a href="{{route('notice.index')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer {{ Request::routeIs('notice.index') ? 'lg:bg-blue-600' : '' }}">
        <svg class="svg-icon w-5 h-5 fill-current" viewBox="0 0 20 20">
            <path  d="M12.871,9.337H7.377c-0.304,0-0.549,0.246-0.549,0.549c0,0.303,0.246,0.55,0.549,0.55h5.494
                c0.305,0,0.551-0.247,0.551-0.55C13.422,9.583,13.176,9.337,12.871,9.337z M15.07,6.04H5.179c-0.304,0-0.549,0.246-0.549,0.55
                c0,0.303,0.246,0.549,0.549,0.549h9.891c0.303,0,0.549-0.247,0.549-0.549C15.619,6.286,15.373,6.04,15.07,6.04z M17.268,1.645
                H2.981c-0.911,0-1.648,0.738-1.648,1.648v10.988c0,0.912,0.738,1.648,1.648,1.648h4.938l2.205,2.205l2.206-2.205h4.938
                c0.91,0,1.648-0.736,1.648-1.648V3.293C18.916,2.382,18.178,1.645,17.268,1.645z M17.816,13.732c0,0.607-0.492,1.1-1.098,1.1
                h-4.939l-1.655,1.654l-1.656-1.654H3.531c-0.607,0-1.099-0.492-1.099-1.1v-9.89c0-0.607,0.492-1.099,1.099-1.099h13.188
                c0.605,0,1.098,0.492,1.098,1.099V13.732z"></path>
        </svg>
        <span class="text-sm mx-3 hidden lg:block " :class="{'hidden':!sidebar}"  >Notices</span>
    </a>
    
    <!--<div class="w-full flex items-center text-gray-100 h-10 pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer">
        <svg class="h-6 w-6 fill-current" viewBox="0 0 20 20">
          <path d="M16.557,4.467h-1.64v-0.82c0-0.225-0.183-0.41-0.409-0.41c-0.226,0-0.41,0.185-0.41,0.41v0.82H5.901v-0.82c0-0.225-0.185-0.41-0.41-0.41c-0.226,0-0.41,0.185-0.41,0.41v0.82H3.442c-0.904,0-1.64,0.735-1.64,1.639v9.017c0,0.904,0.736,1.64,1.64,1.64h13.114c0.904,0,1.64-0.735,1.64-1.64V6.106C18.196,5.203,17.461,4.467,16.557,4.467 M17.377,15.123c0,0.453-0.366,0.819-0.82,0.819H3.442c-0.453,0-0.82-0.366-0.82-0.819V8.976h14.754V15.123z M17.377,8.156H2.623V6.106c0-0.453,0.367-0.82,0.82-0.82h1.639v1.23c0,0.225,0.184,0.41,0.41,0.41c0.225,0,0.41-0.185,0.41-0.41v-1.23h8.196v1.23c0,0.225,0.185,0.41,0.41,0.41c0.227,0,0.409-0.185,0.409-0.41v-1.23h1.64c0.454,0,0.82,0.367,0.82,0.82V8.156z"></path>
        </svg>
        <span class="text-sm mx-3" x-show="sidebar" >Email</span>
    </div>-->
   
</div>
<header class="hidden lg:block pt-2 lg:pl-3  text-stone-400 text-xs " >User</header>

<div class="px-2">
    <a href="{{route('user.books.index')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer {{ Request::routeIs('user.books.index') ? 'lg:bg-blue-600' : '' }}">
        <svg class="svg-icon h-6 w-6 fill-current" viewBox="0 0 20 20">
            <path d="M8.627,7.885C8.499,8.388,7.873,8.101,8.13,8.177L4.12,7.143c-0.218-0.057-0.351-0.28-0.293-0.498c0.057-0.218,0.279-0.351,0.497-0.294l4.011,1.037C8.552,7.444,8.685,7.667,8.627,7.885 M8.334,10.123L4.323,9.086C4.105,9.031,3.883,9.162,3.826,9.38C3.769,9.598,3.901,9.82,4.12,9.877l4.01,1.037c-0.262-0.062,0.373,0.192,0.497-0.294C8.685,10.401,8.552,10.18,8.334,10.123 M7.131,12.507L4.323,11.78c-0.218-0.057-0.44,0.076-0.497,0.295c-0.057,0.218,0.075,0.439,0.293,0.495l2.809,0.726c-0.265-0.062,0.37,0.193,0.495-0.293C7.48,12.784,7.35,12.562,7.131,12.507M18.159,3.677v10.701c0,0.186-0.126,0.348-0.306,0.393l-7.755,1.948c-0.07,0.016-0.134,0.016-0.204,0l-7.748-1.948c-0.179-0.045-0.306-0.207-0.306-0.393V3.677c0-0.267,0.249-0.461,0.509-0.396l7.646,1.921l7.654-1.921C17.91,3.216,18.159,3.41,18.159,3.677 M9.589,5.939L2.656,4.203v9.857l6.933,1.737V5.939z M17.344,4.203l-6.939,1.736v9.859l6.939-1.737V4.203z M16.168,6.645c-0.058-0.218-0.279-0.351-0.498-0.294l-4.011,1.037c-0.218,0.057-0.351,0.28-0.293,0.498c0.128,0.503,0.755,0.216,0.498,0.292l4.009-1.034C16.092,7.085,16.225,6.863,16.168,6.645 M16.168,9.38c-0.058-0.218-0.279-0.349-0.498-0.294l-4.011,1.036c-0.218,0.057-0.351,0.279-0.293,0.498c0.124,0.486,0.759,0.232,0.498,0.294l4.009-1.037C16.092,9.82,16.225,9.598,16.168,9.38 M14.963,12.385c-0.055-0.219-0.276-0.35-0.495-0.294l-2.809,0.726c-0.218,0.056-0.351,0.279-0.293,0.496c0.127,0.506,0.755,0.218,0.498,0.293l2.807-0.723C14.89,12.825,15.021,12.603,14.963,12.385"></path>
        </svg>
        <span class="text-sm mx-3  hidden lg:block " :class="{'hidden':!sidebar}"  >My Books</span>
    </a>

    <a href="{{route('user.books.request')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer {{ Request::routeIs('user.books.request') ? 'lg:bg-blue-600' : '' }}">
        <svg class="svg-icon w-6 h-6 fill-current" viewBox="0 0 20 20">
            <path d="M16.198,10.896c-0.252,0-0.455,0.203-0.455,0.455v2.396c0,0.626-0.511,1.137-1.138,1.137H5.117c-0.627,0-1.138-0.511-1.138-1.137V7.852c0-0.626,0.511-1.137,1.138-1.137h5.315c0.252,0,0.456-0.203,0.456-0.455c0-0.251-0.204-0.455-0.456-0.455H5.117c-1.129,0-2.049,0.918-2.049,2.047v5.894c0,1.129,0.92,2.048,2.049,2.048h9.488c1.129,0,2.048-0.919,2.048-2.048v-2.396C16.653,11.099,16.45,10.896,16.198,10.896z"></path>
            <path d="M14.053,4.279c-0.207-0.135-0.492-0.079-0.63,0.133c-0.137,0.211-0.077,0.493,0.134,0.63l1.65,1.073c-4.115,0.62-5.705,4.891-5.774,5.082c-0.084,0.236,0.038,0.495,0.274,0.581c0.052,0.019,0.103,0.027,0.154,0.027c0.186,0,0.361-0.115,0.429-0.301c0.014-0.042,1.538-4.023,5.238-4.482l-1.172,1.799c-0.137,0.21-0.077,0.492,0.134,0.629c0.076,0.05,0.163,0.074,0.248,0.074c0.148,0,0.294-0.073,0.382-0.207l1.738-2.671c0.066-0.101,0.09-0.224,0.064-0.343c-0.025-0.118-0.096-0.221-0.197-0.287L14.053,4.279z"></path>
        </svg>
        <span class="text-sm mx-3 hidden lg:block " :class="{'hidden':!sidebar}"  >Requests</span>
    </a>
</div>
  
@if (request()->user()->usertype=='admin')
    
<header class="hidden lg:block pt-2 lg:pl-3  text-stone-400 text-xs " >Admin</header>
<div class="px-2">    
    <a href="{{route('admin.manage')}}" class="w-full flex items-center text-gray-100 h-10 pl-1 lg:pl-3 my-1 hover:bg-blue-600 hover:text-white  rounded-lg cursor-pointer {{ Request::routeIs('admin.manage_user') ? 'lg:bg-blue-600' : '' }}">
        <svg class="svg-icon h-5 w-5 fill-current" viewBox="0 0 20 20">
            <path d="M14.023,12.154c1.514-1.192,2.488-3.038,2.488-5.114c0-3.597-2.914-6.512-6.512-6.512
                c-3.597,0-6.512,2.916-6.512,6.512c0,2.076,0.975,3.922,2.489,5.114c-2.714,1.385-4.625,4.117-4.836,7.318h1.186
                c0.229-2.998,2.177-5.512,4.86-6.566c0.853,0.41,1.804,0.646,2.813,0.646c1.01,0,1.961-0.236,2.812-0.646
                c2.684,1.055,4.633,3.568,4.859,6.566h1.188C18.648,16.271,16.736,13.539,14.023,12.154z M10,12.367
                c-2.943,0-5.328-2.385-5.328-5.327c0-2.943,2.385-5.328,5.328-5.328c2.943,0,5.328,2.385,5.328,5.328
                C15.328,9.982,12.943,12.367,10,12.367z"></path>
        </svg>
        <span class="text-sm mx-3  hidden lg:block " :class="{'hidden':!sidebar}" >Manage</span>
    </a>
    
 
    </div>
    @endif
    