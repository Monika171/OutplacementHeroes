@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css" rel="stylesheet" />
   <style>
    .form-group.required .control-label:after {
        content:"*";
        color:red;
      }
    </style>
@endsection
@section('content')

<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Post a Job</h1>
              </div>
          </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">

        <div>

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            
            @endif
            
            <div class="card">
                <div class="card-header d-inline-block h5 text-dark font-weight-bold mb-0">Create a Job</div>
                
                <form  id="frmParameter" action="{{route('job.store')}}" method="POST">@csrf
                    <div class="card-body">

					<div class="form-group required">
                        <label for="title" class="control-label h6">Title</label>
                        <input type="text" class="form-control" name="title" value="{{old("title")}}">
                        @if($errors->has('title'))
                         <div class="error" style="color: red;">{{$errors->first('title')}}</div>
                        @endif
                    </div>
					
					</div>
                    <div class="form-group required">
                        <label for="description" class="control-label h6">Description</label>
                        <textarea name="description" class="form-control" rows="6" cols="70" style="width:100"> {{old("description")}}</textarea>
                        @if($errors->has('description'))
                        <div class="error" style="color: red;">{{$errors->first('description')}}</div>
                    @endif                  
                    
                    </div>

                    <div class="form-group">
                        <label for="category" class="h6">Job Category</label>
							<select name="category" class="form-control">
							@foreach(App\Industry::all() as $cat)
								<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
							</select>
                            @if($errors->has('category'))
                            <div class="error" style="color: red;">{{$errors->first('category')}}</div>
                           @endif                        
                    </div>

                    <div class="form-group">

                        <label for="position" class="h6">Position</label>
                        
                        <input class="form-control" value="{{old("position")}}" name="position" list="position">
                            <datalist id="position">
                                @foreach($position as $p)
                                <option value="{{$p}}">
                                @endforeach
                            </datalist>
                        @if($errors->has('position'))
                        <div class="error" style="color: red;">{{$errors->first('position')}}</div>
                        @endif
                
                    </div>


					
					<div class="form-group">
                        <label for="role" class="control-label h6">Role</label>
                        <textarea name="roles" class="form-control" rows="6" cols="70" style="width:100"> {{old("roles")}}</textarea>
                        @if($errors->has('roles'))
                        <div class="error" style="color: red;">{{$errors->first('roles')}}</div>
                    @endif                  
                    
                    </div>

                    <!--Function-->

                    <div class="form-group">
                        <p class="mb-0"> <label for="salary" class="h6">CTC (or Salary/month)<span style="color:red">*</span></label> &nbsp; &nbsp;
                        <span style="color:red">Please mention Negotiable, if negotiable.</span></p>
                            <input type="text" class="form-control" name="salary" value="{{old("salary")}}">
                            @if($errors->has('salary'))
                            <div class="error" style="color: red;">{{$errors->first('salary')}}</div>
                            @endif
                        </div>


                        <div class="form-group">
                            <p class="mb-0"> <label for="experience" class="h6">Experience<span style="color:red">*</span></label> &nbsp; &nbsp;
                            <span style="color:red">If no value is selected. 'zero' will be set by default.</span></p>
                                <select name="experience" class="form-control">                         
                                     @for ($i = 0; $i <= 50; $i++)
                                    <option value="{{ $i }}">{{ $i }} &nbsp; year(s)</option>
                                    @endfor
                                </select>
                                @if($errors->has('experience'))
                                <div class="error" style="color: red;">{{$errors->first('experience')}}</div>
                                @endif
        
                            
                            </div>


                            <!--course-->

                            <div class="form-group required">
                                <label for="course" class="control-label">Qualification/Course</label>
                                <select class="form-control" name="course">
                                        <option value="">Select</option>                                    
                                        <option value="B.A">B.A 
                                        <option value="B.Arch">B.Arch 
                                        <option value="B.B.A/B.M.S">B.B.A/B.M.S 
                                        <option value="B.Com">B.Com
                                        <option value="B.Des.">B.Des.                                                       
                                        <option value="B.Ed">B.Ed
                                        <option value="B.El.Ed">B.El.Ed
                                        <option value="B.P.Ed">B.P.Ed 
                                        <option value="B.Pharma">B.Pharma
                                        <option value="B.Sc.">B.Sc.
                                        <option value="B.Tech/B.E.">B.Tech/B.E. 
                                        <option value="B.U.M.S">B.U.M.S  
                                        <option value="BAMS">BAMS 
                                        <option value="BCA">                                                          
                                        <option value="BDS">  
                                        <option value="BFA">  
                                        <option value="BHM">  
                                        <option value="BHMS"> 
                                        <option value="BHMS">  
                                        <option value="Diploma">  
                                        <option value="LLB"> 
                                        <option value="MBBS">  
                                        <option value="CA">
                                        <option value="CS">
                                        <option value="DM">
                                        <option value="ICWA (CMA)">
                                        <option value="Integrated PG">
                                        <option value="LLM">
                                        <option value="M.A">
                                        <option value="M.Arch">
                                        <option value="M.Ch">
                                        <option value="M.Com">
                                        <option value="M.Des">
                                        <option value="M.Ed">
                                        <option value="M.Pharma">
                                        <option value="MS/M.Sc(Science)">
                                        <option value="M.Tech">
                                        <option value="MBA/PGDM">
                                        <option value="MCA">
                                        <option value="MCM">
                                        <option value="MDS">
                                        <option value="MFA">
                                        <option value="Medical-MS/MD">
                                        <option value="MVSC">
                                        <option value="PG Diploma">
                                        <option value="Doctorate/PhD">Doctorate/PhD</option>
                                        <option value="Diploma">Diploma</option>
                                        <option value="12th">12th</option>
                                        <option value="10th">10th</option>
                                        <option value="Below 10th">Below 10th</option>
                                   
                                </select>
                                @if($errors->has('course'))
                                <div class="error" style="color: red;">{{$errors->first('course')}}</div>
                                @endif
                            </div>



                            <!--specialization-->

                            <div class="form-group">
                                <label for="gender" class="control-label h6">Gender</label>
                                <select class="form-control" name="gender">
                                    <option value="any">Any</option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                </select>
                                @if($errors->has('gender'))
                                <div class="error" style="color: red;">{{$errors->first('gender')}}</div>
                                @endif
                        </div>

                        <!--preferences-->				
					
		
                    <div class="form-group required">
                        <label for="address_line1" class="control-label h6">Address Line 1</label>
                        <input type="text" class="form-control" name="address_line1" value="{{old("address_line1")}}">
                        @if($errors->has('address_line1'))
                         <div class="error" style="color: red;">{{$errors->first('address_line1')}}</div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="address_line2" class="h6">Address Line 2</label>
                        <input type="text" class="form-control" name="address_line2" value="{{old("address_line2")}}">
                        @if($errors->has('address_line2'))
                         <div class="error" style="color: red;">{{$errors->first('address_line2')}}</div>
                        @endif
                    </div>

                    <div class="row">
                    <div class="col-md-4">
                    <div class="form-group required">

                        <label for="country" class="control-label h6">Select your country</label>
                        
                        <select name="country" id="country" class="form-control">
                            <option value="">Select Country</option>
                            @foreach($countries as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('country'))
                        <div class="error" style="color: red;">{{$errors->first('country')}}</div>
                        @endif
                                                
                    </div>
                    </div>
                    <div class="col-md-4">
                        
                                                    
                    <div class="form-group required">

                          <label for="state" class="control-label h6">Select your state</label>
                        
                        <select name="state" id="state" class="form-control">
                            <option value="">Select State</option>
                        
                        </select>
							
                        @if($errors->has('state'))
                        <div class="error" style="color: red;">{{$errors->first('state')}}</div>
                        @endif
                                                
                    </div>
                </div>
                <div class="col-md-4">
                        
                    <div class="form-group required">

                        <label for="city" class="control-label h6">Select your city</label>
                        
                        <select name="city" id="city" class="form-control">
                            <option value="">Select City</option>
                        
                        </select>
                        @if($errors->has('city'))
                        <div class="error" style="color: red;">{{$errors->first('city')}}</div>
                        @endif
                                                
                    </div>

                </div>
                    </div>
                        

                    <div class="form-group required">
                        <label for="pincode" class="control-label h6">{{ __('Pincode') }}</label>
                        
                            <input type="text" class="form-control @error('pincode') is-invalid @enderror" name="pincode"  value="{{old("pincode")}}">
                            @error('pincode')
                            <span class="invalid-feedback" role="alert">
                            <strong>Please enter valid 6 digit pincode</strong>
                            </span>
                            @enderror                        
                    </div>                    					 
					


					
					 
                                      

					


                    <div class="form-group">
                        <label for="number_of_vacancy"  class="control-label h6">Number of vacancy</label>
                        <input type="text" class="form-control" name="number_of_vacancy" value="{{old("number_of_vacancy")}}">
                        @if($errors->has('number_of_vacancy'))
                            <div class="error" style="color: red;">{{$errors->first('number_of_vacancy')}}</div>
                        @endif
                                      
                    </div>		                        



                    <div class="form-group">
                        <label for="type" class="control-label h6">Type</label>
                        <select class="form-control" name="type">
                            <option value="fulltime">fulltime</option>
                            <option value="parttime">parttime</option>
                            <option value="volunteer">volunteer</option>
                        </select>
                        @if($errors->has('type'))
                        <div class="error" style="color: red;">{{$errors->first('type')}}</div>
                        @endif
                </div>

                <!--Notice period-->

					
					    <div class="form-group">
            
                        <label for="lastdate" class="h6">Last Date</label>
    
                        
                            <input type="text" class="form-control datepicker" name="last_date" value="{{old("last_date")}}">
    
                            @if($errors->has('last_date'))
                            <div class="error" style="color: red;">{{$errors->first('last_date')}}</div>
                           @endif
                        
                    </div>

                    
					
					<div class="form-group">
                        <label for="status" class="control-label h6">Status</label>
                        <select class="form-control" name="status">
                             <option value="1">Live</option>
                            <option value="0">Draft</option>
                        </select>
                        @if($errors->has('status'))
                        <div class="error" style="color: red;">{{$errors->first('status')}}</div>
                        @endif
                </div>
                    

                    <div class="form-group">
                        <button class="btn btn-info" type="submit">Submit</button>
                    </div>
                </div>
        
            </form>

        </div>
        <br>
        <div class="card mb-0">
            <div class="card-header">
                <a class="card-title">
                   <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Skills <span style="color: red; font-weight: bold;"><small> [Top 5 key skills] </small></span></h5>
                   <button type="button" class="btn btn-default float-right py-0 px-1" data-toggle="modal" data-target="#editskills{{$user->id}}">
                    <i class="far fa-edit text-success"></i> <span class="text-success h6">Edit</span>
                    </button>
                    <button type="button" class="btn btn-outline-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addskills{{$user->id}}">
                        <i class="far fa-edit text-primary"></i> <span class="text-primary h6">Add New</span>
                       </button>
                </a>
            </div>
            <div class="card-body">
              @foreach($user->skills as $skill)
               <button type="button" class="btn btn-sm btn-warning mt-1"><b>{{$skill->skill}}</b></button>
              @endforeach

            </div>

            <!-- Edit Skills Modal -->
            <div class="modal fade" id="editskills{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/edit" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Edit Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body editskillsbody">
                          <select class="form-control selectedskills" multiple="multiple" placeholder="Select State" name="skills[]">
                             <option></option>
                             @foreach($skills as $skill)
                               <option value="{{$skill->id}}">{{$skill->skill}}</option>
                             @endforeach
                         </select>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>

            <!-- Add Skills Modal -->
            <div id="addskills{{$user->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                <form action="/profile/skills/store" method="post">@csrf
                 <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="exampleModalLabel">Add Skills</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div id="myModalABCD" class="modal-body addskillsbody">
                         
                           <div class="form-group col-xs-12">
                                                                 
                               <select class="form-control select2" multiple="multiple" placeholder="Select Skill" name="skills[]">
                                 <option></option>
                                 @foreach($skills as $skill)
                                   <option value="{{$skill->id}}">{{$skill->skill}}</option>
                                 @endforeach
                               </select>
                           </div>
               
                           </div>
                           <div class="modal-footer">
                             <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                             <button type="submit" class="btn btn-primary">Save changes</button>
                           </div>
                       </div>
                   </div>
                   </form>	
                   </div>
        </div>
</div>

</div>
        </div>

        <br>
        <br>
 
@endsection

@section('jsplugins')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
 
<script type="text/javascript">

    $(document).ready(function(){

        //console.log({{Auth::user()->vprofile->state}});
            $('select[name="country"]').on('change', function(){
 
                var country_id = $(this).val();
                if(country_id){
                    //console.log(country_id);
                    $.ajax({
                        
                        url: '/getStates/'+country_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="state"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="state"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="state"]').empty();
                }
                
            });
                
                $('select[name="state"]').on('change', function(){
                
                var state_id = $(this).val();
                if(state_id){
                    //console.log(country_id);
                    $.ajax({
                        
                        url: '/getCities/'+state_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            
                            $('select[name="city"]').empty();
                            $.each(data, function(key, value){
                                
                                $('select[name="city"]').append('<option value="'+key+'">'+value+'</option>');
                            });
                            
                        }
                        
                    });

                }
                
                else{
                    
                    $('select[name="city"]').empty();
                }
                
                //console.log('LISTENING')
                
            });
            

        $('.select2').css('width','100%');
        $('.selectedskills').css('width','100%');
        $('.select2').select2({
          //width: 'resolve', 
          placeholder: "Please select Skills",
          allowClear: true,

        });

        $('.selectedskills').select2().val({{ json_encode($user->skills()->allRelatedIds()) }}).trigger('change');
    });
    </script>
@endsection