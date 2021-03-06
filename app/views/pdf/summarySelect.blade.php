@extends('layouts.ports')
{{ HTML::style('bootstrap-select-master/dist/css/bootstrap-select.css') }}
{{ HTML::script('media/jquery-1.12.0.min.js') }}
{{ HTML::script('bootstrap-select-master/dist/js/bootstrap-select.js') }}

<style type="text/css">
.dropdown-menu {
    margin-left: -190px;
}
</style>
@section('content')
<br/>

<div class="row">
	<div class="col-lg-12">
  <h3>Select Period</h3>

<hr>
</div>	
</div>


<div class="row">
	<div class="col-lg-5">

    
		
		 @if ($errors->has())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>        
            @endforeach
        </div>
        @endif

		 <form target="_blank" method="POST" action="{{URL::to('payrollReports/payrollSummary')}}" accept-charset="UTF-8">
   
    <fieldset>

        <div class="form-group">
                        <label for="username">Period <span style="color:red">*</span></label>
                        <div class="right-inner-addon ">
                        <i class="glyphicon glyphicon-calendar"></i>
                        <input required class="form-control datepicker2" readonly="readonly" placeholder="" type="text" name="period" id="period" value="{{{ Input::old('period') }}}">
                    </div>
       </div>

            <div class="form-group">
                        <label for="username">Select Branch: <span style="color:red">*</span></label>
                        <select required name="branch" class="form-control selectpicker" data-live-search="true">
                            <option></option>
                            <option value="All">All</option>
                            @foreach($branches as $branch)
                            <option value="{{$branch->id}}"> {{ $branch->name }}</option>
                            @endforeach

                        </select>
                
            </div>


            <div class="form-group">
                        <label for="username">Select Department: <span style="color:red">*</span></label>
                        <select required name="department" class="form-control selectpicker" data-live-search="true">
                            <option></option>
                            <option value="All">All</option>
                            @foreach($depts as $dept)
                            <option value="{{$dept->id}}"> {{ $dept->department_name }}</option>
                            @endforeach

                        </select>
                
            </div>

        
            <div class="form-group">
                        <label for="username">Download as: <span style="color:red">*</span></label>
                        <select required name="format" class="form-control">
                            <option></option>
                            <option value="excel"> Excel</option>
                            <option value="pdf"> PDF</option>
                        </select>
                
            </div>

        
        <div class="form-actions form-group">
        
          <button type="submit" class="btn btn-primary btn-sm">Select</button>
        </div>

    </fieldset>
</form>
		

  </div>

</div>


@stop