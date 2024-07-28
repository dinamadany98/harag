    {{-- {{$data}} --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{URL::asset('jquery-3.3.1.min.js')}}"></script>

        <title>Document</title>
    </head>
    <body onload="document.getElementById("txt_name").scrollIntoView();">
        <div class='chat-header clearfix' style='margin-right: 100px ;'>
            <div class=''>
                <div class='col-lg-9 '>
                    @foreach ($id as $item)
                    <img src="{{URL::asset('/images/'.$item->photo)}}" alt=""  width="200px" height="60px"  width="30px" height="30px"/>
                    {{-- <a href="#end">scroll to the bottom</a> --}}
                    <div class='chat-about'>
                        <h6 class='m-b-0 ms-0 mt-3'>
                            
                          
                            {{$item->name}}
                            
                        </h6>
                     </div>
                     @endforeach

                </div>
                 
            </div>
        </div><br>
        <div class='chat-history'  >
            <ul class='m-b-0 mt-1' id="list">
                @foreach ($data as $item)
                <input type="text" value="{{$item['pucher_id']}}" id="pucerid" hidden>

                @if($item['type'] =="recived")
                <li class='clearfix'>
                  
                    <div class='message other-message float-right'> {{$item['messagecontent']}}</div>
                  
                </li>
                @else
                <li class='clearfix'>
                    <div class='message my-message float-start'  >{{$item['messagecontent']}} </div>
                </li> 
                @endif
                
             
                @endforeach
              
                 
                 
                                            
               
                
            </ul>
        </div>
        <div class='chat-message clearfix '  >
            <div class='input-group mb-0'>
                <div class='input-group-prepend'>
                    {{-- <button id="getUsersButton">add</button> --}}
                    <span class='input-group-text ' id="getUsersButton"><i class='fa fa-send h1'></i></span>
                </div>
                <input type='text'  required class='form-control' placeholder='ادخل الرساله' name='messagecontent'  id="txt_name" >                                    
            </div>
        </div> 
    
    
     
       <script>
        $(document).ready(function() {



            document.getElementById("txt_name").scrollIntoView();
             $('#getUsersButton').click(function() {
                // window.location.href = "/showsallerchat#end";
                var contentmessg=$("#txt_name").val();
                var pucer_id=$("#pucerid").val();
                var div = document.getElementById('list');
       if(contentmessg ==""){
        alert("من فضلك اكتب الرساله واعد الارسال");
       }else{
                $.ajax({
                    url: '/addmessage',
                    type: 'GET',
                    dataType: 'json',
                    data:{'pucerid': pucer_id,"messagecontent":contentmessg},
                    success: function(response) {
                        //  console.log(response);
                         div.innerHTML +=` <li class='clearfix'>
                    <div class='message my-message float-start' >`+ contentmessg +`</div>
                  </li> `;
                  $('#txt_name').val('');
            document.getElementById("txt_name").scrollIntoView();
              
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
            });
        
        })
        </script>
    </body>
    </html>
   