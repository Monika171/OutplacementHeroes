@extends('layouts.main')

@section('select2css')
   <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
   <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endsection


@section('content')
<main>
<div class="hero-wrap" style="height: 410px; background: linear-gradient(to bottom, #003399 0%, #666699 100%)" data-stellar-background-ratio="0.5">
    <!--<div class="overlay"></div>-->
    <div class="container">
          <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 410px" data-scrollax-parent="true">
              <div class="col-md-8 ftco-animate text-center text-md-left mb-5" data-scrollax=" properties: { translateY: '70%' }">
                  <!--<p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-3"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>-->
                 <h1  style="font-size: 45px;" class="mb-3 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Education and Work History</h1>
              </div>
              <div class="col-md-4 ftco-animate text-center text-md-right mb-5" data-scrollax=" properties: { translateY: '70%' }">
                @if(Auth::check()&&Auth::user()->id==$user->id)
                   {{--<a href="{{route('company.view')}}"><button class="btn btn-danger btn-lg">Edit</button></a>--}}
 
                   <a class="btn btn-warning btn-lg" href="{{route('user.profile')}}" role="button"> <i class="ion-ios-arrow-backward"></i>Go Back</a>
 
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
          
           
                <div class="card mb-0">
 
                   <div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Education</h5>  
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
                          <h5 class="h5 text-info">{{$education->qualification}}</h5>
                          <h5 class="h6 mb-2 text-muted">{{$education->course}}</h5> 
                          <h5 class="h6 mb-2 text-muted">{{$education->specialization}}</h5>                             
                          <h6 class="h6 mb-2 text-muted">{{$education->institute}}</h6>
                          <div class="h6 mb-2 text-muted">{{ $education->c_type }}</div> 
                          <small class="h6 text-black">{{ $education->p_year }}</small>
                         <hr>
                        </div>

                          <!-- Edit Educational Background Modal -->
                          <div class="modal fade" id="editeducation{{$education->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                             <form>
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
                                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;qualification</span>
                                            </div>
                                            <input type="text" id="editQualification" class="form-control" name="add_qualification" value="{{$education->qualification}}">
                                          </div>                                
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                            </div>
                                            <input type="text" id="editCourse" class="form-control" name="add_course" value="{{$education->course}}">
                                          </div>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;specialization</span>
                                            </div>
                                            <input type="text" id="editSpecialization" class="form-control" name="add_specialization" value="{{$education->specialization}}">
                                          </div>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="far fa-building"></i>&nbsp;institute</span>
                                            </div>
                                            <input type="text" id="editInstitute" class="form-control" name="add_institute" value="{{$education->institute}}">
                                          </div>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Course Type</span>
                                            </div>
                                            <input type="text" id="editCourseType" class="form-control" name="add_c_type" value="{{$education->c_type}}">
                                          </div>
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Passing Year</span>
                                            </div>
                                            <input type="text" id="editPassingYear" class="form-control" name="add_p_year" value="{{$education->p_year}}">
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



                    <!-- Add Educational Background Modal -->
                    <div class="modal fade" id="addeducation{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                       <form>
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
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;qualification</span>
                                    </div>
                                    <input type="text" id="addQualification" class="form-control" name="add_qualification">
                                  </div>                                
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course</span>
                                    </div>
                                    <input type="text" id="addCourse" class="form-control" name="add_course">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;specialization</span>
                                    </div>
                                    <input type="text" id="addSpecialization" class="form-control" name="add_specialization">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-building"></i>&nbsp;institute</span>
                                    </div>
                                    <input type="text" id="addInstitute" class="form-control" name="add_institute">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="fas fa-graduation-cap"></i>&nbsp;Course Type</span>
                                    </div>
                                    <input type="text" id="addCourseType" class="form-control" name="add_c_type">
                                  </div>
                                  <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Passing Year</span>
                                    </div>
                                    <input type="text" id="addPassingYear" class="form-control" name="add_p_year">
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



                    {{--<div class="card-header">
                        <a class="card-title">
                          <h5 class="d-inline-block h5 text-success font-weight-bold mb-0">Work History</h5>
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
                             <h5 class="h5 text-info">{{$work->position}}</h5>                            
                             <h6 class="h6 text-black">{{$work->company}}</h6> 
                             <small class="h6 mb-2 text-muted">{{ $work->year }}</small>
                             <div class="mt-3 text-muted">{!! nl2br(e($work->description)) !!}</div>
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
                                          <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
                                        </div>
                                        <input type="text" id="editPosition" class="form-control" value="{{$work->position}}">
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                                        </div>
                                        <input type="text" id="editCompany" class="form-control" value="{{$work->company}}">
                                      </div>
                                      <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                                        </div>
                                        <input type="text" id="editWorkYear" class="form-control" value="{{$work->year}}">
                                      </div>
                                      <div class="form-group">
                                        <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
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
                                      <h4>REMOVE EMPLOYMENT</h4>
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
                    </div>--}}
                </div>                

                    <!-- Add Work History Modal -->
                    {{--<div class="modal fade" id="addwork{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <span class="input-group-text"><i class="fas fa-user"></i>&nbsp;Position</span>
                                  </div>
                                  <input type="text" id="addPosition" class="form-control">
                                </div>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-building"></i>&nbsp;Company</span>
                                  </div>
                                  <input type="text" id="addCompany" class="form-control">
                                </div>  
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar"></i>&nbsp;Year</span>
                                  </div>
                                  <input type="text" id="addWorkYear" class="form-control">
                                </div>
                                <div class="form-group">
                                  <span class="input-group-text"><i class="fas fa-briefcase"></i>&nbsp;Description</span>
                                  <textarea class="form-control" id="addWorkDescription" rows="3"></textarea>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary addNewWorkButton" data-dismiss="modal">Save changes</button>
                              </div>
                            </div>
                          </div>
                    </div>--}}
        </div>
    </div>
</div>

	<div class="loading">
		<i class="fas fa-spinner fa-pulse fa-3x fa-fw"></i><br/>
		<span>Loading</span>
	</div>
</main>

@endsection
