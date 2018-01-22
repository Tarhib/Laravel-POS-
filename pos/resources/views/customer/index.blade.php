{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Customer Lists   <a href="#" class="create-modal btn btn-success btn-sm">ADD
      <i class="glyphicon glyphicon-plus"></i>
    </a></h3>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th>Customer Name</th>
        <th>Customer Phone No.</th>

      </tr>
      {{ csrf_field() }}
      @foreach ($customers as $value)
        <tr class="customer{{$value->id}}">
          <td>{{ $value->name }}</td>
          <td>{{ $value->phone }}</td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$customers->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create-customer" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">

            <label class="control-label col-sm-4" for="title">Customer Name:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Enter Your Customer Name" required><br>
            </div>
            <label class="control-label col-sm-4" for="title">Customer Phone No:</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="phone" name="phone"
              placeholder="Enter Your Customer Phone Number" required>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add-customer">
              <span class="glyphicon glyphicon-plus"></span>Save Customer
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Close
            </button>
          </div>
    </div>
  </div>
</div></div>


<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $('.create-modal').on('click', function() {
    $('#create-customer').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Customer');
  });
  $("#add-customer").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addCustomer',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),
        'phone': $('input[name=phone]').val(),
      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        } else {
          $('.error').remove();

          $('#table').append("<tr class='customer" + data.id + "'>"+
          "<td>" + data.name + "</td>"+
          "<td>" + data.phone + "</td>"+
          "</tr>");
        }
      },
    });
    $('#name').val('');
    $('#phone').val('');
  });





</script>
@endsection
