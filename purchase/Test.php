<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" /> 

    <title>Document</title>
    <style>
       .b1{
        
       }
       .btn-primary{
        width:100%;
       }
       td:not(:first-child) {
         padding-top:30px;
         padding-bottom:20px;
             
        }
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

#customers td, #customers th {
  border: 1px solid #ddd;
  border:none;
  padding: 18px;
  font-family: Arial, Helvetica, sans-serif;
  font-size:16px;
}



#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
.layout{
    border:2px solid;
    width:377.95275591px;
    height:170.07874016px;
}
.main{
    border:2px solid;
    margin-top:37.795275591px;
    margin-left:7.5590551181px;
}
#sticker
    {
      border:2px solid;
     
    }
    #labels{
      border:2px solid ;
      margin-left:7.5590551181px ;
      width:377.95275591px;
      height:170.07874016px;
    }
    
    .bartable tr,.bartable td{
        
      font-weight:bold;
      
    }
    .bartable{
      width:100%;
      /* border:2px solid ; */
      margin-left:7.5590551181px;
      
    }
    .bartable tr{
        border:none;
    }
    .bartable td{
        box-shadow:none;
        outline:none;
        border-style:none;
        
    }
    .c{
        border:2px solid white;
        padding:30px;
        border-radius:20px;
        box-shadow:2px 2px 12px 5px rgba(0,0,0,0.2);
    }


    
    </style>
</head>

<body>
    
     <h2 class="text-center">Main Filter</h2><br><br>
    <div class="container c" >
        <form action="maptobar" method="POST" >
         {{csrf_field()}}
    
            <div class="row b1">
                <!--Select state!-->
                <div class="col-md-3 b1">
                    <div class="form-group">
                        <select name="state"  class="form-control" placeholder="State" id="state">
                            <option value="">Select Option</option>
                            @foreach($places as $place)
                            <option value="{{$place->branch_state}}">{{$place->branch_state}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!--Select city!-->
                <div class="col-md-3 b1">
                    <div class="form-group">
                        <select name="city" id="city" class="form-control ">
                            <option value="0">Select City</option>
    
                        </select>
                    </div>
                </div>
                <!--Select branch!-->
                <div class="col-md-4 b1">
                   <div class="row"> 
                    <div class="col-md-6">
                       <div class="form-group">
                          <select name="branch" id="branch" class="form-control ppp">
                             <option value="0">Select Branch</option>
    
                            </select>
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <select name="patient" id="patient" class="form-control ppp">
                            <option value="0">Select Patient</option>
    
                           </select>
                       </div>
                    </div>
                   </div> 
                </div>
                <div class="col-md-2 b1">
                    <div class="row">
                        <div class="form-group col-md-12">
                        
                            <!-- <button type="button" class="btn btn-primary btn-block" id="submit" >Block level button</button> -->
                            <input type="submit" class="btn btn-primary btn-block">
                        </div>
                        
                    </div>
                  </div>
            </div>
        </form> 
    </div>
   
     <script>
     
      $(document).ready(function(){
          
       $("#submitBtn").click(function(){
        $("#myForm").submit();
        });
       //Select Cities
        $("#state").change(function(){
            var name=$(this).val();
         $.ajax({

			  type:'get',
			  url:'fetchcity/'+name,
			  success:function(response){
				console.log(response);
               //console.log(response[0]['branch_city']);
			   $("#city").empty();
               $('#branch').empty();
			   var option = "<option value='0'>Select City</option>";
				$("#city").append(option);
                var option = "<option value='0'>Select Branch</option>";
				$("#branch").append(option);
			   var len=0;
			   if(response != null){
                len = response.length;
                }
				if(len>0)
				{
				   for(i=0;i<len;i++)
				   {
					var city=response[i].branch_city;
					var option = "<option value='"+city+"'>"+city+"</option>";
					$("#city").append(option);
					console.log(city);
				   }
			    }
				
			  }
		 }); 
        });
       
       //Selecting Branches
      $("#city").change(function(){

          var name=$(this).val();
          $.ajax({

            url:'fetchbranch/'+name,
            type:'get',
            success:function(response)
            {
                $("#branch").empty();
				var option="<option value='0'>Select Branch</option>";
				$("#branch").append(option);
				var len=0;
				len=response.length;
				console.log(len);
				if(len>0)
				{
					for(i=0;i<len;i++)
					 {
						var id=response[i].id;
						var facility=response[i].branch_name;
						//console.log(id+" "+facility);
						var option = "<option value='"+id+"'>"+facility+"</option>";
						
						$("#branch").append(option);
					 }
				}
            }
          });
      });
      
      //Select Patients
      $("#branch").change(function(){
         
        var name=$(this).val();
          $.ajax({

            url:'fetchpatient/'+name,
            type:'get',
            success:function(response)
            {
                $("#patient").empty();
				var option="<option value='0'>Select Patient</option>";
				$("#patient").append(option);
				var len=0;
				len=response.length;
				console.log(len);
				if(len>0)
				{
					for(i=0;i<len;i++)
					 {
						var id=response[i].id;
						var patient_id=response[i].patient;
						//console.log(id+" "+facility);
						var option = "<option value='"+patient_id+"'>"+patient_id+"</option>";
						
						$("#patient").append(option);
					 }
				}
            }
          });

      });
      
      //submit
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
     });
     
      });
     </script>
</body>   
</html>