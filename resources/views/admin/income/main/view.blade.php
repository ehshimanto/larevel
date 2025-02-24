@extends('layouts.admin')
@section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>View Income Information
                                    </div>  
                                    <div class="col-md-4 card_button_part">
                                        <a href="{{url('dashboard/Income')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <table class="table table-bordered table-striped table-hover custom_view_table">
                                          <tr>
                                            <td>Income Title</td>  
                                            <td>:</td>  
                                            <td>{{$data->income_title}}</td>  
                                          </tr>
                                          <tr>
                                            <td>Amount</td>  
                                            <td>:</td>  
                                            <td>{{$data->income_amount}}</td>  
                                          </tr>
                                          <tr>
                                            <td>Date</td>  
                                            <td>:</td>  
                                            <td>{{$data->income_date}}</td>  
                                          </tr>
                                          @if($data->income_editor!='')
                                          <tr>
                                            <td>Editor</td>  
                                            <td>:</td>  
                                            <td>{{$data->creatorInfo->name}}</td>  
                                          </tr>
                                          @endif
                                          <tr>
                                            <td>Creator</td>  
                                            <td>:</td>  
                                            <td>{{$data->creatorInfo->name}}</td>  
                                          </tr>

                                          <tr>
                                            <td>Created Time</td>  
                                            <td>:</td>  
                                            <td>{{$data->created_at->format('d-m-Y || h:i:s A')}}</td>  
                                            <!-- <td>{{$data->created_at->diffForHumans()}}</td>   -->
                                          </tr>
                                          @if($data->income_editor!='')
                                          <tr>
                                            <td>Updated Time</td>  
                                            <td>:</td>  
                                            <!-- <td>{{$data->created_at->format('d-m-Y || h:i:s A')}}</td>   -->
                                            <td>{{$data->updated_at->diffForHumans()}}</td>  
                                          </tr>
                                          @endif
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
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
                    @endsection