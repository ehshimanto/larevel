@extends('layouts.admin')
@section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>All Income Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="{{url('dashboard/Income/add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                              <div class="row">
                      <div class="col-md-2"></div>
                      <div class="col-md-8">
                        @if(Session::has('success'))
                          <div class="alert alert-success alert_success" role="alert">
                             <strong>Success!</strong> {{Session::get('success')}}
                          </div>
                        @endif
                        @if(Session::has('error'))
                          <div class="alert alert-danger alert_error" role="alert">
                             <strong>Opps!</strong> {{Session::get('error')}}
                          </div>
                        @endif
                      </div>
                      <div class="col-md-2"></div>
                    </div>
                                <table id="alltableinfo" class="table table-bordered table-striped table-hover custom_table">
                                  <thead class="table-dark">
                                    <tr>
                                      <th>Title</th>
                                      <th>category</th>
                                      <th>Amount</th>
                                      <th>Date</th>
                                      <th>Creator</th>
                                      
                                      <th>Manage</th>
                                    </tr>
                              </thead>
                                  <tbody>
                                    @foreach($allData as $data)
                                    <tr>
                                      <td>{{$data->income_title}}</td>
                                      <td>{{$data->incate_name}}</td>
                                      <td>{{$data->income_amount}}</td>
                                      <td>{{ $data->income_date }}</td>
                                      <td>{{ $data->creator_name }}</td>



                                      
                                      
                                      <td>
                                          <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{url('dashboard/Income/view/'.$data->income_slug)}}">View</a></li>
                                              <li><a class="dropdown-item" href="{{url('dashboard/Income/edit/'.$data->income_slug)}}">Edit</a></li>
                                              <li><a class="dropdown-item" href="#" id="softDelete" data-bs-toggle="modal" data-bs-target="#softDeleteModal" data-id="{{$data->income_id}}">Delete</a></li>
                                            </ul>
                                          </div>
                                      </td>
                                    </tr>
                                    @endforeach
                                  </tbody>
                                </table>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>

                    <!-- Delete Modal -->
<div class="modal fade" id="softDeleteModal" tabindex="-1" aria-labelledby="softDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
  <form method="post" action="{{url('dashboard/Income/softdelete')}}">
    @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="softDeleteModalLabel"> <i class="fab fa-gg-circle"></i>Confirm Massage</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="delete">
        Are You want to sure Delete Data?
        <input type="hidden" name="modal_id" id="modal_id">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Confirm</button>
      </div>
    </div>
    </form>
  </div>
</div>

    
     @endsection