@extends('layouts.master')
@section('main_content')
	<div class="top_hr">
            <span>WORKSTATION ACTIVATION</span>
    </div>
<!--<div class="col-md-12">-->
<!--  @if(session('message'))-->
<!--		        <div class="alert alert-success">{{session('message')}}</div>-->
<!--	@endif-->

<!--   <div class="panel panel-default custom-panel ">-->
<!--          <div class="panel-heading pannel_header_custome clearfix">-->
<!--            <h3 class="panel-title"> Workstation List</h3>-->
<!--          </div>-->
<!--          <div class="panel-body ">-->
<!--               <table class="table table-striped">-->
<!--                  <thead>-->
<!--                    <tr>-->
<!--                      <th>TMSF No.</th>-->
<!--                      <th>Client Name.</th>-->
<!--                      <th>Company.</th>-->
<!--                      <th>Skill Set</th>-->
<!--                      <th>Quantity</th>-->
<!--                      <th>Action</th>-->
<!--                    </tr>-->
<!--                  </thead>-->
<!--                  <tbody>-->
                     	 	 	
                    
<!--                    <tr>-->
<!--                        <td> TMSF 0007</td>-->
<!--                        <td>Brendon McDermott</td>-->
<!--                        <td>McCullough, Miller and Green</td>-->
                        
<!--                        <td>  -->
<!--                             PHP ,Jquery, Laravel, Anguarjs-->
<!--                        </td>-->
<!--                        <td>2</td>-->
<!--                        <td>-->
<!--                             <a class="btn btn-primary btn-xs editRole" title="View Candidates" data-toggle="tooltip">-->
<!--                                <i class="fa fa-eye" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                            <a class="btn btn-danger btn-xs " data-toggle="tooltip" title="Update Candidates">-->
<!--                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->

<!--                            </a>-->
<!--                        </td>-->
                       
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td> TMSF 0009</td>-->
<!--                        <td>Jon dho</td>-->
<!--                        <td>ANW IT</td>-->
                        
<!--                        <td>  -->
<!--                             javascript laravel php-->
<!--                        </td>-->
<!--                        <td>2</td>-->
<!--                        <td>-->
<!--                             <a class="btn btn-primary btn-xs editRole" title="View Candidates" data-toggle="tooltip">-->
<!--                                <i class="fa fa-eye" aria-hidden="true"></i>-->
<!--                            </a>-->
<!--                            <a class="btn btn-danger btn-xs " data-toggle="tooltip" title="Update Candidates">-->
<!--                               <i class="fa fa-pencil-square-o" aria-hidden="true"></i> -->

<!--                            </a>-->
<!--                        </td>-->
                       
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td> TMSF 0013</td>-->
<!--                        <td>asdf</td>-->
<!--                        <td>nass</td>-->
                        
<!--                        <td>  -->
<!--                            HTML,Css php html css php-->
<!--                        </td>-->
<!--                        <td>4</td>-->
<!--                        <td>-->
<!--                             <a class="btn btn-primary btn-xs editRole" title="Add Candidates" data-toggle="tooltip">-->
<!--                                <i class="fa fa-plus" aria-hidden="true"></i>-->
<!--                            </a>-->
                          
<!--                        </td>-->
                       
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td> TMSF 0013</td>-->
<!--                        <td>asdf</td>-->
<!--                        <td>nass</td>-->
                        
<!--                        <td>  -->
<!--                            HTML,Css php html css php-->
<!--                        </td>-->
<!--                        <td>4</td>-->
<!--                        <td>-->
<!--                             <a class="btn btn-primary btn-xs editRole" title="Add Candidates" data-toggle="tooltip">-->
<!--                                <i class="fa fa-plus" aria-hidden="true"></i>-->
<!--                            </a>-->
                          
<!--                        </td>-->
                       
<!--                    </tr>-->
                   
<!--                  </tbody>-->
<!--                  <tfoot>-->
                    
<!--                  </tfoot>-->
<!--                </table>-->
<!--                <hr>-->
<!--                <nav aria-label="..." class="pull-right remove-padding">-->
<!--                  <ul class="pagination pagination-sm">-->
<!--                    <li class="page-item">-->
<!--                      <a class="page-link" href="#" aria-label="Previous">-->
<!--                        <span aria-hidden="true">&laquo;</span>-->
<!--                        <span class="sr-only">Previous</span>-->
<!--                      </a>-->
<!--                    </li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">1</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">2</a></li>-->
<!--                    <li class="page-item"><a class="page-link" href="#">3</a></li>-->
<!--                    <li class="page-item">-->
<!--                      <a class="page-link" href="#" aria-label="Next">-->
<!--                        <span aria-hidden="true">&raquo;</span>-->
<!--                        <span class="sr-only">Next</span>-->
<!--                      </a>-->
<!--                    </li>-->
<!--                  </ul>-->
<!--                </nav>-->
<!--          </div>-->
<!--          </div>-->

<!--</div>-->
<div class="col-md-12 col-xs-11">
    <table class="table table-bordered custom-table">
        <tbody>
          <tr>
            <td class="table-background">Invoice Number</td>
            
            <td colspan="5"><input type="text" class="form-control" name="invoice"/></td>
          </tr>
          <tr>
            <td class="table-background">Client Name</td>
            <td colspan="5"></td>
          </tr>
          <tr>
            <td class="table-background">No. of hire</td>
            <td><input type="text" name="on_hire" class="form-control"/></td>
            <td class="table-background">Supervisors</td>
            <td><input type="text" name="supervisor" class="form-control"/></td>
            <td class="table-background">Team Member</td>
            <td><input type="text" name="team_member" class="form-control"/></td>
          </tr>
          <tr>
            <td class="table-background">No. of PC</td>
            <td><input type="text" name="pc" class="form-control"/></td>
            <td class="table-background">Windows</td>
            <td><input type="text" name="windows" class="form-control"/></td>
            <td class="table-background">MAC</td>
            <td><input type="text" name="mac" class="form-control"/></td>
          </tr>
        </tbody>
      </table>
</div>

@endsection