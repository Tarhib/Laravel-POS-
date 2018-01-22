{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Category Lists</h3>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">Category NO.</th>
        <th>Category Name</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal btn btn-success btn-sm">ADD
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      @foreach ($category as $value)
        <tr class="category{{$value->id}}">
          <td>{{ $value->id }}</td>
          <td>{{ $value->name }}</td>
          <td align="center">
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" >
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-name="{{$value->name}}" >
              <i class="glyphicon glyphicon-pencil"></i>
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$category->links()}}
</div>
{{-- Modal Form Create Post --}}
<div id="create" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">

            <label class="control-label col-sm-2" for="title">Category Name:</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name"
              placeholder="Your Title Here" required>
              <p class="error text-center alert alert-danger hidden"></p>
            </div>
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add">
              <span class="glyphicon glyphicon-plus"></span>Save Category
            </button>
            <button class="btn btn-warning" type="button" data-dismiss="modal">
              <span class="glyphicon glyphicon-remobe"></span>Close
            </button>
          </div>
    </div>
  </div>
</div></div>
{{-- Modal Form Show Category --}}
<div id="show" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"></h4>
                  </div>
                    <div class="modal-body">
                    <div class="form-group">
                      <label for="">Category ID :</label>
                      <b id="i"/>
                    </div>
                    <div class="form-group">
                      <label for="">Category Name :</label>
                      <b id="ti"/>
                    </div>

                    </div>
                    </div>
                  </div>
</div>
{{-- Modal Form Edit and Delete Post --}}
<div id="myModal"class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="modal">
          <div class="form-group">
            <label class="control-label col-sm-2"for="fid">ID</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fid" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-2"for="t">Category Name</label>
            <div class="col-sm-10">
            <input type="name" class="form-control" id="t">
            </div>
          </div>

        </form>
                {{-- Form Delete Post --}}
        <!-- <div class="deleteContent">
          Are You sure want to delete <span class="title"></span>?
          <span class="hidden id"></span>
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn actionBtn" data-dismiss="modal">
          <span id="footer_action_button" class="glyphicon"></span>
        </button>
        <button type="button" class="btn btn-warning" data-dismiss="modal">
          <span class="glyphicon glyphicon"></span>close
        </button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
{{-- ajax Form Add Post--}}
  $('.create-modal').on('click', function() {
    $('#create').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Add Category');
  });
  $("#add").click(function() {
    $.ajax({
      type: 'POST',
      url: 'addItem',
      data: {
        '_token': $('input[name=_token]').val(),
        'name': $('input[name=name]').val(),

      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        } else {
          $('.error').remove();

          $('#table').append("<tr class='category" + data.id + "'>"+
          "<td>" + data.id + "</td>"+
          "<td>" + data.name + "</td>"+
          "<td  align='center'><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-pencil'></span></button></td>"+
          "</tr>");
        }
      },
    });
    $('#name').val('');
  });

// function Edit POST
$(document).on('click', '.edit-modal', function() {
$('#footer_action_button').text(" Update Category");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit');
$('.modal-title').text('Edit Category');
$('.deleteContent').hide();
$('.form-horizontal').show();
$('#fid').val($(this).data('id'));
$('#t').val($(this).data('name'));
$('#myModal').modal('show');
});

$('.modal-footer').on('click', '.edit', function() {
  $.ajax({
    type: 'POST',
    url: 'editItem',
    data: {
'_token': $('input[name=_token]').val(),
'id': $("#fid").val(),
'name': $('#t').val(),

    },
success: function(data) {
      $('.category' + data.id).replaceWith(" "+
      "<tr class='category" + data.id + "'>"+
      "<td>" + data.id + "</td>"+
      "<td>" + data.name + "</td>"+
      "<td align='center'><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-name='" + data.name + "'><span class='glyphicon glyphicon-pencil'></span></button></td>"+
      "</tr>");
    }
  });
});

// form Delete function


  // Show function
  $(document).on('click', '.show-modal', function() {
  $('#show').modal('show');
  $('#i').text($(this).data('id'));
  $('#ti').text($(this).data('name'));
  $('.modal-title').text('Show Category');
  });
</script>
@endsection
