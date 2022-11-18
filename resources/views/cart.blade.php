<!DOCTYPE html>
<html>
<head>
    <title>Cart | Ecommerce Dynamic Web Template</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0" />
    <meta http-equiv="Content-Language" content="en-US" />
    <meta name="description" content="Dynamic responsive Ecommerce free web template" />
    <meta name="keywords" content="Ecommerce template, Ecommerce free responsive template, free template" />
    <meta name="author" content="Maniruzzaman Akash">

    <!-- CSS links -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />

    
    <!-- Animate.css -->
    <link type="text/css" rel="stylesheet" href="css/animate.css" />

    <!-- Owl Carousel CSS-->
    <link type="text/css" rel="stylesheet" href="css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" href="css/owl.theme.default.min.css" />



    <!-- Mega navigation bar -->
    <link rel="stylesheet" type="text/css" media="all" href="css/webslidemenu.css" />

    <!-- Main css link -->
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <link rel="icon" href="images/logo.png" />

    <!-- Scripts -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    
</head>
<body>
    <!-- End Header Main, logo, search bar,cart -->
    <div class="content-area">
        <div class="container">
            <div class="cart-page">
                <h2>Cart</h2>
                <form action="#">
                    <table class="table">
                        <thead>
                            <tr>
                                <th width="40%">Item</th>
                                <th width="10%">Quantity</th>
                                <th width="20%">Unit Price</th>
                                <th width="20%">Total Price</th>
                                <th width="10%">Delete</th>
                            </tr>
                        </thead>

                        <tbody>

                                @foreach ($barangs as $key => $barang)
                                <tr>
                                    <td>
                                        <img src="images/product-slide/product2.png" width="50" alt="" class="img img-thumbnail pull-left">
                                            <span class="pull-left cart-product-option">
                                                <strong>{{$barang->name}}</strong><br />
                                                <strong>{{$barang->code}}</strong><br />
                                            </span>
                                        <div class="clearfix"></div>
                                    </td>
                                    <td><input type="number" min="0" name="product_quantity_p{{$key+1}}" value="0" class="form-control product_quantity_p{{$key+1}}" /></td>
                                    <td>{{$barang->amount}}</td>
                                    <td>
                                        <p class="total_ammount_p{{$key+1}}"></p>
                                    </td>
                                    <td>
                                        <p>x</p>
                                    </td>
                                </tr> 
                                @endforeach

                                <tr>
                                    <td></td>
                                    <td colspan="1"><strong>Total:</strong></td>
                                    <td></td>
                                    <td>
                                        <p><span class="total_product_sum">0</span></p>
                                    </td>
                                    <td></td>
                                    <div class="clearfix"></div>

                                </tr>
                                        
                                <tr>
                                    <td colspan="5">
                                        <div id="contact">
                                            <button type="button" class="btn btn-success btn-lg pull-right margin-right-20" data-toggle="modal" data-target="#contact-modal">Add Cart</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>

                        <input type="hidden" name="totalAmount" class="totalAmount">

                        <div id="contact-modal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <a class="close" data-dismiss="modal">×</a>
                                        <h3>Kode Diskon</h3>
                                    </div>
                                    <form id="contactForm" name="contact" role="form">
                                        <div>
                                            <div class="modal-body">				
                                                <div class="form-group">
                                                    <input type="text" name="codePromo" class="form-control codePromo">
                                                </div>				
                                            </div>
                                            <div class="modal-footer">					
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" id="buttonSubmit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </form>
                </div> <!--End Cart page-->
                <script type="text/javascript">

                    var product_price_p1 = 455000;
                    var product_price_p2 = 336000;
                    var total_product_sum = 0;

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $(document).ready(function(){

                        $('.product_quantity_p1, .product_quantity_p2').bind('keyup mouseup change click keydown focus', (function(){

                            var quantity_p1 = $('.product_quantity_p1').val();
                            var quantity_p2 = $('.product_quantity_p2').val();

                            total_ammount_p1 = quantity_p1 * product_price_p1;
                            total_ammount_p2 = quantity_p2 * product_price_p2;

                            $('.total_product_sum').html(total_product_sum+"");
                            $('.total_ammount_p1').html(total_ammount_p1+"");
                            $('.total_ammount_p2').html(total_ammount_p2+"");
                            total_product_sum = total_ammount_p1 + total_ammount_p2;
                            $('.total_product_sum').html(total_product_sum+"");
                            $('.totalAmount').html(total_product_sum+"");
                            $('.totalAmount').val(total_product_sum);
                        }));
                    });

                    $("#buttonSubmit").click(function(){
                        var data = {}
                        data.codePromo = $('.codePromo').val()
                        data.totalAmount = $('.totalAmount').val()
                        data.items = []

                        var quantity_p1 = $('.product_quantity_p1').val();
                        var quantity_p2 = $('.product_quantity_p2').val();

                        if( quantity_p1 > 0 ){
                            data.items.push(
                                {
                                    code: "FA4532",
                                    qty: quantity_p1,
                                    amount: product_price_p1 * quantity_p1
                                }
                            )
                        }

                        if( quantity_p2 > 0 ){
                            data.items.push(
                                {
                                    code: "FA3518",
                                    qty: quantity_p2,
                                    amount: product_price_p2 * quantity_p2
                                }
                            )
                        }

                        console.log( data )

                        $.ajax({
                            type:'POST',
                            url:"api/checkValidationDiscount",
                            data:data,
                            success:function(data){
                                alert("Selamat Anda mendapat Diskon : "+data.data);
                            }
                        });
                    });
                    
                </script>
            </div> <!-- End Container inside Content Area -->
        </div> <!-- End content Area class -->


    </div> <!-- End wrapper -->

    

<!-- Scripts -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/owl.carousel.min.js"></script>

<script src="js/wow.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/webslidemenu.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>
