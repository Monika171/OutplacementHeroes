@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">

   <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">

   <style>
     .datepicker-Y {position: relative; z-index:10000 !important;}
     .datepicker-YM {position: relative; z-index:10000 !important;}
         /* .ui-datepicker-calendar {
            display: none;
          }
          .ui-datepicker-month {
            display: none;
          }
          .ui-datepicker-prev{
            display: none;
          }
          .ui-datepicker-next{
            display: none;
          }*/
     </style>
@endsection


@section('content')
<main>
<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <div  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Education and Work History</div>
              </div>
              <div class="col-md-4 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                @if(Auth::check()&&Auth::user()->id==$user->id)
                   {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}} 
 
                   <a class="btn btn-warning btn-lg" href="{{route('user.profile')}}" role="button"> <i class="ion-ios-arrow-back"></i>&nbsp; <u><strong>Go Back</strong></u></a>
 
                @endif
             </div>
          </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 my-5">
          
           
                <div class="card mb-3">
 
                   <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Education</h5>  
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addeducation{{$user->id}}">
                            <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div class="card-body" id="educationBackgroundBody">                       
                        @foreach($educations as $education)
                        <div>
                          <p class="float-right text-danger targetEducDiv"><i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteEducation{{$education->id}}"></i></p>  
                          <p class="float-right text-info mr-4"><i class="fas fa-pencil-alt" data-id="{{$education->id}}" data-toggle="modal" data-target="#editeducation{{$education->id}}"></i></p>
                          <h5 class="h5 text-info"><strong>Education:</strong>&nbsp;{{$education->qualification}}</h5>
                          <h6 class="h6 mb-2 text-muted"><strong>Course:</strong>&nbsp;{{$education->course}}</h6> 
                          <h6 class="h6 mb-2 text-muted"><strong>Specialization:</strong>&nbsp;{{$education->specialization}}</h6>                             
                          <h6 class="h6 mb-2 text-muted"><strong>Institute:</strong>&nbsp;{{$education->institute}}</h6>
                          <h6 class="h6 mb-2 text-muted"><strong>Course Type:</strong>&nbsp;{{ $education->c_type }}</h6>
                          <h6 class="h6 mb-2 text-muted"><strong>Performance Scale:</strong>&nbsp;{{ $education->performance_scale }}</h6>
                          <h6 class="h5 mb-2 text-muted"><strong>Performance:</strong>&nbsp;{{ $education->performance }}</h6>
                          <h6 class="h6 text-black"><strong>Passing Out Year:</strong>&nbsp;{{ $education->p_year }}</h6>
                         <hr>
                        </div>

                          <!-- Edit Educational Background Modal -->
                          <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <form id="frmParameter3">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Educational Background</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body addeducationbody">                                
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-trophy"></i>&nbsp;Education</span>
                                            </div>
                                            {{--<input type="text" id="editQualification" class="form-control" name="edit_qualification" value="{{$education->qualification}}">--}}
                                            <select class="form-control" id="editCourseType" name="edit_qualification">
                                              <option value="" {{$education->qualification==''?'selected':''}}>Select</option>
                                              <option value="Doctorate/PhD" {{$education->qualification=='Doctorate/PhD'?'selected':''}}>Doctorate/PhD</option>
                                              <option value="Masters/Post-Graduation" {{$education->qualification=='Masters/Post-Graduation'?'selected':''}}>Masters/Post-Graduation</option>
                                              <option value="Graduation/Diploma" {{$education->qualification=='Graduation/Diploma'?'selected':''}}>Graduation/Diploma</option>
                                              <option value="12th" {{$education->qualification=='12th'?'selected':''}}>12th</option>
                                              <option value="10th" {{$education->qualification=='10th'?'selected':''}}>10th</option>
                                              <option value="Below 10th" {{$education->qualification=='Below 10th'?'selected':''}}>Below 10th</option>
                                             
                                          </select>
                                          </div>                                
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                              
                                            </div>
                                            <input id="editCourse" class="form-control" name="edit_course" list="edit_course" value="{{$education->course}}">
                                                      <datalist id="edit_course">                                                          
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
                                                </datalist>
                                                
                                          </div>

                                          <div class="input-group mb-3">
                                            <span style="color:red">*If your course is not listed, please enter the same manually.</span></p>
                                              
                                          </div>

                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-certificate"></i>&nbsp;Specialization</span>
                                              
                                            </div>
                                            <input id="editSpecialization" class="form-control" name="edit_specialization" list="edit_specialization" value="{{$education->specialization}}">
                                                    <datalist id="edit_specialization">
                                                      <option value="Agriculture">
                                                      <option value="Automobile">
                                                      <option value="Aviation">
                                                      <option value="Bio-Chemistry/Bio-Technology">
                                                      <option value="Biomedical">
                                                      <option value="Ceramics">
                                                      <option value="Chemical">
                                                      <option value="Civil">
                                                      <option value="Computers">
                                                      <option value="Electrical">
                                                      <option value="Electronics/Telecommunication">
                                                      <option value="Energy">
                                                      <option value="Environmental">
                                                      <option value="Instrumentation">
                                                      <option value="Marine">
                                                      <option value="Mechanical">
                                                      <option value="Metallurgy">
                                                      <option value="Mineral">
                                                      <option value="Mining">
                                                      <option value="Nuclear">
                                                      <option value="Other Engineering">
                                                      <option value="Paint/Oil">
                                                      <option value="Petroleum">
                                                      <option value="Plastics">
                                                      <option value="Production/Industrial">
                                                      <option value="Textile">
                                              </datalist>
                                              
                                          </div>
                                          <div class="input-group mb-3">
                                            <span style="color:red">*If your specialization is not listed, please enter the same manually.</span></p>
                                              
                                          </div>

                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-university"></i>&nbsp;Institute</span>
                                            </div>
                                            <input type="text" id="editInstitute" class="form-control" name="edit_institute" value="{{$education->institute}}">
                                          </div>

                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-hourglass-half"></i>&nbsp;Course Type</span>
                                            </div>
                                            
                                            <select class="form-control" id="editCourseType" name="edit_c_type">
                                              <option value="" {{$education->c_type==''?'selected':''}}>Select</option>
                                              <option value="fulltime" {{$education->c_type=='fulltime'?'selected':''}}>Full Time</option>
                                              <option value="parttime" {{$education->c_type=='parttime'?'selected':''}}>Part Time</option>
                                              <option value="correspondence/distance Learning" {{$education->c_type=='correspondence/distance Learning'?'selected':''}}>Correspondence/Distance Learning</option>
                                          </select>     
                                          
                                          </div>

                                          <div class="row">

                                            <div class="col-md-7">                                     
                                                <div class="input-group mb-3">  
                                                  <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="fa fa-percent"></i><i class="fa fa-font"></i>&nbsp;Performance Scale</span>
                                                  </div>
                                                <select id="cmbParameter3" class="form-control forminputbox" name="cmbParameter3">
                                                  <option value=""{{$education->c_type==''?'selected':''}}>---Select---</option>
                                                  <option value="Percentage" {{$education->performance_scale=='Percentage'?'selected':''}}>Percentage</option>
                                                  <option value="CGPA(Scale of 10)" {{$education->performance_scale=='CGPA(Scale of 10)'?'selected':''}}>CGPA(Scale of 10)</option>
                                                  <option value="CGPA(Scale of 9)" {{$education->performance_scale=='CGPA(Scale of 9)'?'selected':''}}>CGPA(Scale of 9)</option>
                                                  <option value="CGPA(Scale of 8)" {{$education->performance_scale=='CGPA(Scale of 8)'?'selected':''}}>CGPA(Scale of 8)</option>
                                                  <option value="CGPA(Scale of 7)" {{$education->performance_scale=='CGPA(Scale of 7)'?'selected':''}}>CGPA(Scale of 7)</option>
                                                  <option value="CGPA(Scale of 5)" {{$education->performance_scale=='CGPA(Scale of 5)'?'selected':''}}>CGPA(Scale of 5)</option>
                                                  <option value="CGPA(Scale of 4)" {{$education->performance_scale=='CGPA(Scale of 4)'?'selected':''}}>CGPA(Scale of 4)</option>
                                              </select>
                                              
                                                </div>
                                            </div>
                                          <div class="col-md-4">
                                            <div class="input-group mb-3"> 
                                                <div class="input-group-prepend">
                                                <span class="input-group-text">Performance </span>
                                                </div>
                                                <input type="text" id="mytext3" class="form-control" name="mytext3" value="{{$education->performance}}"/>
                                            
                                              </div>
                                          </div>
                                          </div>


                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Passing Year</span>
                                              
                                            </div>
                                            {{--<input type="text" id="editPassingYear" class="form-control" name="add_p_year" value="{{$education->p_year}}">--}}
                                            <input type="text" id="editPassingYear" class="form-control datepicker-Y" name="edit_p_year" value="{{$education->p_year}}">
                                          </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary editEducation" data-dismiss="modal" data-id="{{$education->id}}">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                             </form>
                          </div>{{-- end modal --}}




                          <!-- Delete Education Modal -->
                              <div class="modal fade" id="deleteEducation{{$education->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EDUCATION</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$education->institute}}"</span> from your profile?</h6>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                      <button type="button" class="btn btn-primary deleteEducation px-5" data-dismiss="modal" data-id="{{$education->id}}">Yes</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                          @endforeach
                    </div>

                </div>

                    <!-- Add Educational Background Modal -->
                    <div class="modal fade" id="addeducation{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form id="frmParameter2">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add Educational Background</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body addeducationbody">  

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-trophy"></i>&nbsp;Education</span>
                                    </div>
                                    <select class="form-control" id="addQualification" name="add_qualification">
                                      <option value="">Select</option>
                                      <option value="Doctorate/PhD">Doctorate/PhD</option>
                                      <option value="Masters/Post-Graduation">Masters/Post-Graduation</option>
                                      <option value="Graduation/Diploma">Graduation/Diploma</option>
                                      <option value="12th">12th</option>
                                      <option value="10th">10th</option>
                                      <option value="Below 10th">Below 10th</option>
                                     
                                  </select>
                                     
                                  </div> 
                                  
                                  
                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                    </div>
                                    <input type="text" id="addCourse" class="form-control" name="add_course">
                                  </div>--}}

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                      
                                    </div>
                                    
                                    <input id="addCourse" class="form-control" name="add_course" list="add_course">
                                                      <datalist id="add_course">                                                          
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
                                                      </datalist>
                                                      
                                  </div>
                                  <div class="input-group mb-3">
                                    <span style="color:red">*If your course is not listed, please enter the same manually.</span></p>
                                      
                                  </div>


                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-certificate"></i>&nbsp;Specialization</span>
                                    </div>
                                    <input type="text" id="addSpecialization" class="form-control" name="add_specialization">
                                  </div>--}}

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-certificate"></i>&nbsp;Specialization</span>
                                      
                                    </div>
                                    
                                    <input id="addSpecialization" class="form-control" name="add_specialization" list="add_specialization">
                                                      <datalist id="add_specialization">
                                                            <option value="Agriculture">
                                                            <option value="Automobile">
                                                            <option value="Aviation">
                                                            <option value="Bio-Chemistry/Bio-Technology">
                                                            <option value="Biomedical">
                                                            <option value="Ceramics">
                                                            <option value="Chemical">
                                                            <option value="Civil">
                                                            <option value="Computers">
                                                            <option value="Electrical">
                                                            <option value="Electronics/Telecommunication">
                                                            <option value="Energy">
                                                            <option value="Environmental">
                                                            <option value="Instrumentation">
                                                            <option value="Marine">
                                                            <option value="Mechanical">
                                                            <option value="Metallurgy">
                                                            <option value="Mineral">
                                                            <option value="Mining">
                                                            <option value="Nuclear">
                                                            <option value="Other Engineering">
                                                            <option value="Paint/Oil">
                                                            <option value="Petroleum">
                                                            <option value="Plastics">
                                                            <option value="Production/Industrial">
                                                            <option value="Textile">
                                                    </datalist>
                                    
                                  </div>
                                  
                                  <div class="input-group mb-3">
                                    <span style="color:red">*If your specialization is not listed, please enter the same manually.</span></p>
                                      
                                  </div>

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-university"></i>&nbsp;Institute</span>
                                    </div>
                                    <input type="text" id="addInstitute" class="form-control" name="add_institute">
                                  </div>
                                  {{--<div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-hourglass-half"></i>&nbsp;Course Type</span>
                                    </div>
                                    <input type="text" id="addCourseType" class="form-control" name="add_c_type">
                                  </div>--}}

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-hourglass-half"></i>&nbsp;Course Type</span>
                                    </div>
                                    <select class="form-control" id="addCourseType" name="add_c_type">
                                        <option value="fulltime">Full Time</option>
                                        <option value="parttime">Part Time</option>
                                        <option value="correspondence/distance Learning">Correspondence/Distance Learning</option>
                                    </select>
                                   
                                </div>

                                  <div class="row">

                                    <div class="col-md-7">                                     
                                  <div class="input-group mb-3">  
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-percent"></i><i class="fa fa-font"></i>&nbsp;Performance Scale</span>
                                    </div>
                                  <select id="cmbParameter2" class="form-control forminputbox" name="cmbParameter2">
                                    <option value="">---Select---</option>
                                    <option value="Percentage">Percentage</option>
                                    <option value="CGPA(Scale of 10)">CGPA(Scale of 10)</option>
                                    <option value="CGPA(Scale of 9)">CGPA(Scale of 9)</option>
                                    <option value="CGPA(Scale of 8)">CGPA(Scale of 8)</option>
                                    <option value="CGPA(Scale of 7)">CGPA(Scale of 7)</option>
                                    <option value="CGPA(Scale of 5)">CGPA(Scale of 5)</option>
                                    <option value="CGPA(Scale of 4)">CGPA(Scale of 4)</option>
                                </select>
                                
                                  </div>
                                    </div>
                                  <div class="col-md-4">
                                <div class="input-group mb-3"> 
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">Performance </span>
                                  </div>
                                <input type="text" id="mytext" class="form-control" name="mytext" />
                                
                                  </div>
                                  </div>
                                  </div>
                             
                                

                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Passing Out Year</span>
                                    </div>
                                    {{--<input type="text" id="addPassingYear" class="form-control" name="add_p_year">--}}
                                    <input type="text" id="addPassingYear" class="form-control datepicker-Y" name="add_p_year">
                                  </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" data-dismiss="modal" id="addNewEducation">Save changes</button>
                              </div>
                            </div>
                          </div>
                       </form>
                    </div>

                    <div class="card mb-0">

                  <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-dark font-weight-bold mb-0">Work History</h5>
                           <button class="btn btn-primary float-right  py-0 mr-1 px-1" data-toggle="modal" data-target="#addwork{{$user->id}}">
                                <i class="far fa-edit text-white"></i> <span class="text-white h6">Add New</span>
                           </button>
                        </a>
                    </div>
                    <div>
                        <div class="card-body workBackgroundBody">
                         @foreach($works as $work)
                          <div>
                            <p class="float-right text-danger targetWorkDiv">
                              <i class="far fa-trash-alt" data-toggle="modal" data-target="#deleteWork{{$work->id}}"></i>
                            </p>  
                            <p class="float-right text-info mr-4">
                                <i class="fas fa-pencil-alt" data-id="{{$work->id}}" data-toggle="modal" data-target="#editWork{{$work->id}}"></i>
                            </p>
                                                    
                             <h5 class="h5 text-info"><strong>Company:</strong>&nbsp;{{$work->company}}</h5>
                             <h6 class="h6 mb-2 text-muted"><strong>Industry:</strong>&nbsp;{{$work->industry}}</h6> 
                             <h6 class="h6 mb-2 text-muted"><strong>Designation:</strong>&nbsp;{{$work->designation}}</h6> 
                             {{--<h5 class="h6 mb-2 text-muted">{{$work->function}}</h5>--}}                           
                             <h6 class="h6 text-black"><strong>Started Working From:</strong>&nbsp;{{ $work->start_date }}</h6>
                             <h6 class="h6 text-black"><strong>Worked Till:</strong>&nbsp;{{ $work->end_date }}</h6>
                             <div class="mt-3 text-muted"><strong>Description:</strong>&nbsp;{!! nl2br(e($work->description)) !!}</div>
                             <hr>
                           </div>

                             <!-- Edit Work Background Modal -->
                            <div class="modal fade" id="editWork{{$work->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title text-info" id="exampleModalLabel">Edit Work Background</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body editworksbody">
                                      
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                                        </div>
                                        <input type="text" id="editCompany" class="form-control" value="{{$work->company}}">
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-briefcase"></i>&nbsp;Industry</span>
                                        </div>
                                        <input id="editIndustry" class="form-control" value="{{$work->industry}}" name="industry" list="industry">
                                        <datalist id="industry">
                                          @foreach($industry as $ind)
                                          <option value="{{$ind}}">
                                          @endforeach
                                      </datalist>
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-address-card"></i>&nbsp;Designation</span>
                                        </div>
                                        <input id="editDesignation" class="form-control" value="{{$work->designation}}" name="designation" list="designation">
                                        <datalist id="designation">
                                          @foreach($designation as $d)
                                          <option value="{{$d}}">
                                          @endforeach
                                      </datalist>                                      
                                      </div>

                                      {{--<div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-server"></i>&nbsp;Function</span>
                                        </div>
                                        <input type="text" id="editFunc" class="form-control" value="{{$work->function}}">
                                      </div>--}}

                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Started Working From</span>
                                        </div>                                        
                                        <input type="text" id="editStartDate" class="form-control datepicker-YM" value="{{$work->start_date}}">
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Worked Till:</span>
                                        </div>
                                        <input type="text" id="editEndDate" class="form-control datepicker-YM" value="{{$work->end_date}}">
                                      </div>
                                      <div class="form-group">
                                        <span class="input-group-text"><i class="fa fa-map"></i>&nbsp;Description</span>
                                        <textarea class="form-control" id="editWorkDescription" rows="3">{{$work->description}}</textarea>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary editWorkBackground" data-dismiss="modal" data-id="{{$work->id}}">Save changes</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <!-- Delete Work Modal -->
                              <div class="modal fade" id="deleteWork{{$work->id}}">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                  
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                      <h4>REMOVE EMPLOYMENT RECORD</h4>
                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                      <h6 class="modal-title h6">Are you sure you want to delete <span class="text-info">"{{$work->company}}"</span> from your profile?</h6>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger text-white px-5" data-dismiss="modal">No</button>
                                      <button type="button" class="btn btn-primary deleteWork px-5" data-dismiss="modal" data-id="{{$work->id}}" >Yes</button>
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                        @endforeach
                        </div>
                    </div>
          </div>            

                    <!-- Add Work History Modal -->
                    <div class="modal fade" id="addwork{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-info" id="exampleModalLabel">Add New Work</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body editworksbody">

                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-building"></i>&nbsp;Company</span>
                                  </div>
                                  <input type="text" id="addCompany" class="form-control">
                                </div>


                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-briefcase"></i>&nbsp;Industry</span>
                                  </div>
                                  <input id="addIndustry" class="form-control"  name="industry" list="industry">
                                  <datalist id="industry">
                                    @foreach($industry as $ind)
                                    <option value="{{$ind}}">
                                    @endforeach
                                </datalist>
                                </div>


                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-address-card"></i>&nbsp;Designation</span>
                                  </div>
                                  <input id="addDesignation" class="form-control" name="designation" list="designation">
                                        <datalist id="designation">
                                          @foreach($designation as $d)
                                          <option value="{{$d}}">
                                          @endforeach
                                      </datalist>

                                </div>

                                {{--<div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-server"></i>&nbsp;Function</span>
                                  </div>
                                  <input type="text" id="addFunc" class="form-control">
                                </div>--}}

                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Started Working From:</span>
                                  </div>
                                  <input type="text" id="addStartDate" class="form-control datepicker-YM">
                                </div>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i>&nbsp;Worked Till:</span>
                                  </div>
                                  <input type="text" id="addEndDate" class="form-control datepicker-YM">
                                </div>
                                <div class="form-group">
                                  <span class="input-group-text"><i class="fa fa-map"></i>&nbsp;Description</span>
                                  <textarea class="form-control" id="addWorkDescription" rows="3"></textarea>
                                </div>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary addNewWorkButton" data-dismiss="modal">Save changes</button>
                              </div>
                            </div>
                          </div>
                    </div>
                 
        </div>
    </div>
</div>

	<div class="loading">
		<i class="fas fa-circle-notch fa-spin fa-3x fa-fw"></i><br/>
		<span>Loading</span>
	</div>
</main>

@endsection

@section('jsplugins')
<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<!--<script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>-->
@endsection