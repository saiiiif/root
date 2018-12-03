@extends('layouts.adminLayout.admin_design')
@section('content')
    <!--main-container-part-->
    <div id="content">
        <!--breadcrumbs-->
        <div id="content-header">
            <div id="breadcrumb"> <a href="{{url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="{{url('/instructor')}}">Instructor</a>  </div>
        </div>
        @if(Session::has('flash_message_error'))

            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
        @if(Session::has('flash_message_success'))

            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Lists roles</h5>
            <a href="{{url('/admin/instructor/create')}}" class="label label-info"> </a>
        </div>
        <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
                <thead>
                <tr>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Settings</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($users_per as $user)
                  <tr class="gradeX">
                      <td>{{$user->name}}</td>
                      <td></td>
                      <td></td>
                      @if($user->permission==1)
                      <td>manager</td>

                      @elseif($user->permission==0)
                      <td>instructor</td>

                      @elseif($user->permission==2)
                      <td>DAF</td>

                      @else
                      <td></td>
                      @endif
                      <td width="20%"><button type="button" name="{{$user->id}}" id="edit_perm" data-toggle="modal" data-target="#pdc" class="btn btn-info" value="edit">Edit </button></td>
                  </tr>
                  @endforeach
                  <tr>

                </tbody>

              </table>
            </div>
          </div>
        </div>

                           <div class="modal" id="pdc" tabindex="-1" role="dialog" aria-hidden="true">
                             <div class="modal-dialog" style="width:1000px;">
                                 <div >
                                   <div class="modal-header">
                                     <strong> Edit Roles </strong>
                                   </div>
                                   <div class="modal-body">
                                                 <form action ='/perPost' class="pdcForm">
                                                   <label >utilisateurs</label>
                                                   <table class="table table-hover no-margins">
                                                     <tr> <td style="vertical-align: middle;">
                                                     <select name="user">
                                                   @foreach ($users as  $value):
                                                   <?php $id=$value->id;?>
                                                   <option value="{{$id}}" id="{{$id}}">{{$value->name}} </option>
                                                   @endforeach
                                                   </select>
                                                   </td></tr>
                                                   <tr><td>
                                                   <label class="control-label">DAF</label>
                                                <div class="controls">
                                                    <input type="checkbox" class="span3" value="2" name="per[]" >
                                                </div>
                                              </td> </tr> <tr><td>
                                                <label class="control-label">Manager</label>
                                                <div class="controls">
                                                    <input type="checkbox" class="span3" value="1" name="per[]" >
                                                </div>
                                                </td></tr><tr><td>
                                                <label class="control-label">Instractor</label>
                                                <div class="controls">
                                                    <input type="checkbox" class="span3" value="0" name="per[]" >
                                                </div>
                                                </td></tr><tr><td>
                                                <input type="submit" value="valider"></tr> </td>
                                              </table>
                                                 </form>
                                         </div>
                                              </div>
                                            </div>
                                          </div>






          <script type="text/javascript">
              // This function is called from the pop-up menus to transfer to
              // a different page. Ignore if the value returned is a null string:
              function goPage (newURL) {

                  // if url is empty, skip the menu dividers and reset the menu selection to default
                  if (newURL != "") {

                      // if url is "-", it is this page -- reset the menu:
                      if (newURL == "-" ) {
                          resetMenu();
                      }
                      // else, send page to designated URL
                      else {
                          document.location.href = newURL;
                      }
                  }
              }

              // resets the menu selection upon entry to this page:
              function resetMenu() {
                  document.gomenu.selector.selectedIndex = 2;
              }

          </script>

      @endsection
