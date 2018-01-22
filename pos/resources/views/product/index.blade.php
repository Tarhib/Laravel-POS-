{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-12">
    <h3>Product Lists</h3>
  </div>
</div>

<div class="row">
  <div class="table table-responsive">
    <table class="table table-bordered" id="table">
      <tr>
        <th width="150px">Product Name</th>
        <th>Category</th>
        <th> Base Price(Tk.) </th>
        <th>Profit(%)</th>
        <th>Selling Price(Tk.)</th>
        <th class="text-center" width="150px">
          <a href="#" class="create-modal-product btn btn-success btn-sm">ADD
            <i class="glyphicon glyphicon-plus"></i>
          </a>
        </th>
      </tr>
      {{ csrf_field() }}
      @foreach ($products as $value)
        <tr class="products{{$value->id}}">
          <td>{{ $value->p_name }}</td>
          <td>{{ $value->catname }}</td>
          <td>{{ $value->b_price }}</td>
          <td>{{ $value->profit }}</td>
          <td>{{ $value->s_price }}</td>

          <td align="center">
            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$value->id}}" data-p_name="{{$value->p_name}}"
              data-catname="{{$value->catname}}" data-b_price="{{$value->b_price}}" data-profit="{{$value->profit}}" data-s_price="{{$value->s_price}}" >
              <i class="fa fa-eye"></i>
            </a>
            <a href="#" class="edit-modal btn btn-warning btn-sm" data-id="{{$value->id}}" data-p_name="{{$value->p_name}}"
              data-catname="{{$value->catname}}" data-b_price="{{$value->b_price}}" data-profit="{{$value->profit}}" data-s_price="{{$value->s_price}}"  >
              <i class="glyphicon glyphicon-pencil"></i>
            </a>

          </td>
        </tr>
      @endforeach
    </table>
  </div>
  {{$products->links()}}
</div>
{{-- Modal Form Create Product --}}
<div id="create-product" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" role="form">
          <div class="form-group row add">
            <label class="control-label col-sm-4" for="p_name">Product Name:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="p_name" name="p_name"
              placeholder="Enter Your Product Name" required> <br>

            </div>

            <label class="control-label col-sm-4" for="catname">Category Name:</label>
            <div class="col-sm-6">
               <select class="form-control" id="catname">
                @foreach ($categories as $category)
                    <option value="{{ $category->name}}">{{ $category->name }}</option>
                @endforeach
              </select>
                <br>
             </div>
            <label class="control-label col-sm-4" for="b_price">Base Price :</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="b_price" name="b_price"
              placeholder="Enter Base Price" required><br>
            </div>



            <label class="control-label col-sm-4" for="profit">Profit(%):</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="profit" name="profit"
              placeholder="Enter profit" required><br>
            </div>
          </div>
        </form>



          </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add-product">
              <span class="glyphicon glyphicon-plus"></span>Save Product
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
                      <label for="">Product Name:</label>
                      <b id="p_name_show"/>
                    </div>
                    <div class="form-group">
                      <label for="">Category Name:</label>
                      <b id="catname_show"/>
                    </div>
                    <div class="form-group">
                      <label for="">Base Price :</label>
                      <b id="b_price_show"Tk/>
                    </div>
                    <div class="form-group">
                      <label for="">Profit:</label>
                      <b id="profit_show"%/>
                    </div>
                    <div class="form-group">
                      <label for="">Selling Price :</label>
                      <b id="s_price_show"Tk/>
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
          <div class="form-group row add">
            <label class="control-label col-sm-4" for="p_name">Product Name:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="p_name_edit"
              placeholder="Enter Your Product Name" required> <br>
              <input type="hidden" id="p_id">
            </div>

            <label class="control-label col-sm-4" for="catname">Category Name:</label>
            <div class="col-sm-6">
               <select class="form-control" id="catname">
                @foreach ($categories as $category)
                    <option value="{{ $category->name}}">{{ $category->name }}</option>
                @endforeach
              </select>
                <br>
             </div>
            <label class="control-label col-sm-4" for="b_price">Base Price :</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="b_price"
              placeholder="Enter Base Price" required><br>
            </div>



            <label class="control-label col-sm-4" for="profit">Profit(%):</label>
            <div class="col-sm-6">
              <input type="number" class="form-control" id="profit"
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
  $('.create-modal-product').on('click', function() {
    $('#create-product').modal('show');
     $('.form-horizontal').show();
    $('.modal-title').text('Add Product');

  });
  $("#add-product").click(function() {

    $.ajax({
      type: 'POST',
      url: 'addProduct',
      data: {
        '_token': $('input[name=_token]').val(),
        'p_name': $('input[name=p_name]').val(),
        'catname': $( "#catname option:selected" ).text(),
        'b_price': $('input[name=b_price]').val(),
        'profit': $('input[name=profit]').val(),


      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        } else {
          $('.error').remove();
          $('#table').append("<tr class='products" + data.id + "'>"+
          "<td>" + data.p_name + "</td>"+
          "<td>" + data.catname + "</td>"+
          "<td>" + data.b_price + "</td>"+
          "<td>" + data.profit + "</td>"+
          "<td>" + data.s_price + "</td>"+
          "<td  align='center'><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-p_name='" + data.p_name +
          "' data-b_price='" + data.b_price +  "' data-profit='" + data.profit + "' data-s_price='"+ data.s_price +
          "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-p_name='" + data.p_name +
          "' data-b_price='" + data.b_price +  "' data-profit='" + data.profit + "' data-s_price='"+ data.s_price +
          "'><span class='glyphicon glyphicon-pencil'></span></button> </td>"+
          "</tr>");
        }
      },
    });
    $('#p_name').val('');
    $('#catname').val('');
    $('#b_price').val('');
    $('#profit').val('');
  });


// function Edit POST

$(document).on('click', '.edit-modal', function() {

$('#footer_action_button').text(" Update Product");
$('#footer_action_button').addClass('glyphicon-check');
$('#footer_action_button').removeClass('glyphicon-trash');
$('.actionBtn').addClass('btn-success');
$('.actionBtn').removeClass('btn-danger');
$('.actionBtn').addClass('edit-product');
$('.modal-title').text('Edit Product');
$('.deleteContent').hide();
$('.form-horizontal').show();

$('#p_id').val($(this).data('id'));
$('#p_name_edit').val($(this).data('p_name'));
$('#myModal #catname option:selected').text($(this).data('catname'));
$('#myModal #b_price').val($(this).data('b_price'));
$('#myModal #profit').val($(this).data('profit'));


$('#myModal').modal('show');

});

$(document).on('click', '.edit-product', function() {
  $.ajax({
    type: 'POST',
    url: 'editProduct',
    data: {
      '_token': $('input[name=_token]').val(),
      'id': $('#p_id').val(),
      'p_name': $('#p_name_edit').val(),
      'catname': $("#myModal #catname option:selected" ).text(),
      'b_price': $('#myModal #b_price').val(),
      'profit': $('#myModal #profit').val(),
    },
success: function(data) {
      $('.products' + data.id).replaceWith(" "+
      "<tr class='products" + data.id + "'>"+
      "<td>" + data.p_name + "</td>"+
      "<td>" + data.catname + "</td>"+
      "<td>" + data.b_price + "</td>"+
      "<td>" + data.profit + "</td>"+
      "<td>" + data.s_price + "</td>"+
      "<td  align='center'><button class='show-modal btn btn-info btn-sm' data-id='" + data.id + "' data-p_name='" + data.p_name +
      "' data-b_price='" + data.b_price +  "' data-profit='" + data.profit + "' data-s_price='"+ data.s_price +
      "'><span class='fa fa-eye'></span></button> <button class='edit-modal btn btn-warning btn-sm' data-id='" + data.id + "' data-p_name='" + data.p_name +
      "' data-b_price='" + data.b_price +  "' data-profit='" + data.profit + "' data-s_price='"+ data.s_price +
      "'><span class='glyphicon glyphicon-pencil'></span></button> </td>"+
      "</tr>");
    }
  });
});
$(document).on('click', '.show-modal', function() {
$('#show').modal('show');
$('#p_name_show').text($(this).data('p_name'));
$('#catname_show').text($(this).data('catname'));
$('#b_price_show').text($(this).data('b_price')+' Tk');
$('#profit_show').text($(this).data('profit')+'%');
$('#s_price_show').text($(this).data('s_price')+' Tk');

$('.modal-title').text('Product Details');
});
</script>
@endsection
