<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./resources/css/app.css">
    <title>products</title>
    <style>
        .container{
            margin: 5% auto;


        }
        .filter{
            background: greenyellow;
            padding: 1%;
            border-radius: 10px;
            max-height: 800px;
        }
        .products{
             max-height: 1500px;
            padding: 1% 3%;

        }
        .input{
        margin-bottom: 2%;
        }
        .product{
             height: 110px;
        }
        .button{
            border-radius: 10px;
            box-shadow: 0px 0px 15px 32px steelblue inset;
            padding: 1%;
            width: 150px;
            margin: 0 0 0 35%;
        }
        .card{
            background: tomato;
        }
    </style>
</head>
<body>


<div class="container">

    <div class="row">
        <div class="filter col-2" >
            <div class="input col-12" >
                <input class="form-control" type="text" placeholder="search" aria-label=".form-control-lg example"></div>
            <div class="input col-12">
                <h2>Categoies</h2>
                <?php  $category = DB::table('categories')->get(); ?>

            @foreach($category as $categorys)

                <div class="form-check">
                    <input class="check form-check-input" type="checkbox" value="{{$categorys->id}}" id="{{$categorys->id}}">
                    <label class="form-check-label" for="{{$categorys->id}}">
                        {{$categorys->category_name}}
                    </label>
                </div>
                @endforeach
             </div>
            <div class="input col-12">
                <h3>Brand</h3>
<?php        $brands = DB::table('brand')->get(); ?>
            @foreach($brands as $brand)

                    <div class="form-check">
                        <input class="check form-check-input" type="checkbox" value="{{$brand->id}}" id="{{$brand->id}}">
                        <label class="form-check-label" for="{{$brand->id}}">
                            {{$brand->brand_name}}
                        </label>
                    </div>
                @endforeach
             </div>
        </div>

        <div class="col-1" >
        </div>
        <div class="products col-9" >
            <div class="row justify-content-between"  id="updateDiv"   >
                @foreach($products as $product)
                    <div class="product col-5"       >
                        <div class="card" style="width:100%;max-height: 110px">
                            <div class="card-body" >
                                <h5 class="card-title">{{$product->product_name}}</h5>
                            </div>
                        </div>
                    </div>




                @endforeach


        </div>
        </div>
    </div>
    </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    $(function () {

        $('.check').click(function (){

            var brand = [];
            $('.check').each(function (){
                if($(this).is(":checked")){
                    brand.push($(this).val());
                }
            });
            Find = brand.toString();

            $.ajax({
                type: 'get',
                dataType: 'html',
                url: '',
                data: "brand=" + Find,
                success: function (response) {
                    console.log(response);
                    $('#updateDiv').html(response);
                }
            });
        });
    });
</script>
 </html>
