@extends('loyouts.app')

@section('content')

<div
    class="container-fluid">

<!---  ROW show User      ------------------->
    <div class="row">
  
        <div class="col-md-2">

            <x-navsidebar/>
        </div>
 <!---------COL - MD - 10--------------------------------> 
        <div class="col-md-10">
            <div class="row justify-content-center  gx-2 text-light">
               
                 <div class="col">
                    <h1> Profile</h1>
                    <div class="d-flex flex-column ">
                        <h2> {{Auth::user()->name}} </h2>

                    </div>
                   
                </div>
                 <div class="col">
         
                     <div class="card" style="width:350px">
                         <img class="p-2 card-img-bottom rounded-circle " src="https://picsum.photos/id/237/200" alt="Card image">
                         <div class="card-body">
                           <h4 class="card-title">{{Auth::user()->name}}</h4>
                           <p class="card-text">      
                                <label for="email"> Email : {{Auth::user()->email}}</label>
                             </p>
                             <p class="card-text">
                                @php
                                $message_verified_email = "";
                                @endphp
         
                                 @if(Auth::user()->email_verified_at == null)
                                 Email status  : <span class="badge bg-danger">no verificado</span>
                                 @else
         
                                
                                 Email status :  <span class="badge bg-success">verificado</span>
                              
                                 @endif
                             </p>
                           
                            
                             <p class="card-text">
         
                                 country : {{Auth::user()->country}}
         
                             </p>
                           
                           <a href="#" class="btn btn-primary">Edit profile</a>
                         </div>
                       </div>
              </div>
    
       
            </div>

        </div><!--  END col-md-10--->
        

    
   
    </div><!---  ROW  END show User      --->
    
</div>




@endsection