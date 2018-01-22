{{-- calling layouts \ app.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-4">

  </div>
  <div class="col-md-8">
    <h3>Invoice Form <a href="#" class="create-modal btn btn-success btn-sm">ADD
      <i class="glyphicon glyphicon-plus"></i></a></h3>
  </div>
</div>

<div class="row">
  <div class="container">
      <div class="row">

          <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
              <div class="row">
                  <div class="col-xs-6 col-sm-6 col-md-6">
                      <address>
                          <strong id="cust_name">Elf Cafe</strong><br>

                          <abbr title="Phone">P:</abbr> <span id="phn">(213) 484-6829</span>
                      </address>
                  </div>
                  <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                      <p>
                          <em>Date:<input type="text" id="mydate" /></em>


                      </p>
                      <p style="margin-right:19%">
                        Invoice No:<em id="inv_no"> 34522677W</em>
                      </p>
                  </div>
              </div>
              <div class="row">
                  <div class="text-center">
                      <h1>Receipt</h1>
                  </div>
                  </span>
                  <table class="table table-hover">
                      <thead>
                          <tr>
                              <th>Product</th>
                              <th>Quantity</th>
                              <th class="text-center">Price(BDT)</th>
                              <th class="text-center">Total</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <td class="col-md-9"></td>
                              <td class="col-md-1" style="text-align: center">  </td>
                              <td class="col-md-1 text-center"></td>
                              <td class="col-md-1 text-center"></td>
                          </tr>
                          <tr>
                              <td>   </td>
                              <td>   </td>
                              <td class="text-right">

                              <p>
                                  <strong >Discount: </strong>
                              </p></td>
                              <td class="text-center">
                              <p>
                                  <strong id="disc"></strong>
                              </p>
                              </td>
                          </tr>
                          <tr>
                              <td>   </td>
                              <td>   </td>
                              <td class="text-right"><h4><strong>Total: </strong></h4></td>
                              <td class="text-center text-danger"><h4><strong id="gr_total"></strong></h4></td>
                          </tr>
                      </tbody>
                  </table>
                  <button type="button" class="btn btn-success btn-lg btn-block">
                      Pay Now   <span class="glyphicon glyphicon-chevron-right"></span>
                  </button></td>
              </div>
          </div>
      </div>
</div>
{{-- Modal Form Create Post --}}
<div id="create-invoice" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
        {{ csrf_field() }}
        <form class="form-horizontal" role="form">
          <div class="form-group row add">

            <label class="control-label col-sm-4" for="title">Invoice No:</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="invoice_no" name="invoice_no"
              placeholder="Enter Your Invoice No." required><br>
            </div>

            <label class="control-label col-sm-4" for="customer_name">Customer Name:</label>
            <div class="col-sm-6">
               <select class="form-control" id="customer_name">
                @foreach ($customers as $customer)
                    <option value="{{ $customer->name}}">{{ $customer->name }}</option>
                @endforeach
              </select>
                <br>
             </div>

             <label class="control-label col-sm-4" for="catname">Product Name:</label>
             <div class="col-sm-6">
                <select class="form-control" id="product_name">
                 @foreach ($products as $product)
                     <option value="{{ $product->p_name}}">{{ $product->p_name }}</option>
                 @endforeach
               </select>
                 <br>
              </div>


            <label class="control-label col-sm-4" for="title">Quantity</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="quantity" name="quantity"
              placeholder="Enter Qunatity" required><br>
            </div>

            <label class="control-label col-sm-4" for="title">Discount(%)</label>
            <div class="col-sm-6">
              <input type="text" class="form-control" id="discount" name="discount"
              placeholder="Enter Discount" required><br>
            </div>

          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button class="btn btn-warning" type="submit" id="add-invoice">
              <span class="glyphicon glyphicon-plus"></span>Create Invoice
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
    $('#create-invoice').modal('show');
    $('.form-horizontal').show();
    $('.modal-title').text('Create Invoice');
  });

  $("#add-invoice").click(function() {

    $.ajax({
      type: 'POST',
      url: 'addInvoice',
      data: {
        '_token': $('input[name=_token]').val(),
        'invoice_no': $('input[name=invoice_no]').val(),
        'customer_name': $( "#customer_name option:selected" ).text(),
        'product_name': $( "#product_name option:selected" ).text(),
        'quantity': $('input[name=quantity]').val(),
        'discount': $('input[name=discount]').val(),


      },
      success: function(data){
        if ((data.errors)) {
          $('.error').removeClass('hidden');
          $('.error').text(data.errors.name);
        } else {
          $('.error').remove();


          $('#inv_no').text(data.invoice_no);
          $('#cust_name').text(data.customer_name);
          $('#disc').text(data.discount+"%");
          $('#gr_total').text(data.grnd_price+"Tk");
          $('table tbody tr:eq(0) td:eq(0)').text(data.product_name);
          $('table tbody tr:eq(0) td:eq(1)').text(data.quantity);
          $('table tbody tr:eq(0) td:eq(2)').text(data.unit_price);
          $('table tbody tr:eq(0) td:eq(3)').text(data.total_price);
          $('#invoice_no').val('');
          $('#quantity').val('');
          $('#discount').val('');
          $('#create-invoice').modal('hide');
        }
      },
    });

  });

$("#mydate").datepicker().datepicker("setDate", new Date());



</script>
@endsection
