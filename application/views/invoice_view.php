<!DOCTYPE html>
<html>

<head>
    <!--<meta charset="utf-8">-->
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    
    <title></title>
    <style type="text/css">
   
    .main {
        align-items: center;
        width: 800px;
        border: 1px solid #E5E4E2;
        padding: 30px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }

    .btn_top {
        border-radius: 25px;
        border: 2px solid blue;
        background: white;
        padding: 5px 20px 5px 20px;

    }

    .btn_top1 {
        border-radius: 25px;
        border: 2px solid blue;
        background: blue;
        color: white;
        padding: 5px 10px 5px 10px;
        float: right;
    }

    .logo {
        padding: 30px;
        color: gray;
        margin-left: 325px;
        margin-top: 1px;
    }

    .col {
        width: 50%;
    }

    .input_box {
        margin: 2px;
        padding: 5px 15px 5px 15px;
        border: none;
        border-radius: 25px;
        

    }

    .fs {
        font-size: 20px;
        /*width: 500px;*/
    }

    .fs2 {
        font-size: 15px;
    }

    .input_box:focus {
        outline: 0 !important;
        box-shadow: none;
        border-radius: 5px;
        border: solid 1.5px #009cde;

    }

    .d_flex {
        display: flex;
    }

    .mt {
        margin-top: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    .title {
        border: 1px solid #ddd;
        border-bottom: 2px solid #ddd;
        padding: 5px;
        background: #f8f8f8;
    }

    .add {
        color: blue;
    }

    .subtotal {

        display: flex;
        justify-content: space-between;

    }

    .total {
        display: flex;
        justify-content: space-between;
        /*    margin-right: 170px;*/
        border: 1px solid skyblue;
        margin-top: 20px;
        padding: 10px;
        background-color: #E9F8FF;
    }

    .img_text {
        position: absolute;
        color: #36ABE0;
        transform: translate(45%, -300%);

    }
    </style>
</head>

<body>
    <div style="display: flex; justify-content: center;">

        <section class="main">
         
            <div class="row d-flex">
            <div style="margin-top: 50px; margin-bottom: -90px;">
                <img style='height:200px;width: 200px;' src="<?php echo base_url('assets/invoice/'.$invoice[$k]->logo) ?>">
                <!-- <h3 class="img_text"> + Add business logo</h3> -->
            </div>
            <div>
                <h1 class="logo">INVOICE</h1>
            </div>
            </div>
            <div class="d_flex">
                <div class=" col col1">

                    <div class="">
                        <input type="text" class="input_box fs" value='<?php echo $invoice[$k]->company_name ?>' name="company_name" placeholder="Your Company name"
                            readonly>
                    </div>
                    <!--<div class="">-->
                    <!--    <input type="text" class="input_box fs2" name="" value='<?php echo $frname ?>' placeholder="Your name" readonly>-->
                    <!--</div>-->
                    <div class="">
                        <input type="text" class="input_box fs2" name="" value='<?php echo $fremail ?>' placeholder="Email Address" readonly>
                    </div>
                </div>

                <div class=" col col2" >
                    <div>
                        <label>Invoice#:</label>
                        <input type="text" class="input_box fs2" name="" value='<?php echo $invoice[$k]->invoiceno ?>' placeholder="0001" readonly>
                    </div>
                    <div>
                        <label>Due date:</label>
                        <input type="text" class="input_box fs2 " name="" value='<?php echo date('d-m-Y');  ?>' placeholder="12/24/2022" readonly>
                    </div>
                    <div>
                        <label>Currency:</label>
                        <input type="text" class="input_box fs2" name="" value="<?php echo $invoice[$k]->currency ?>" placeholder="USD" readonly>
                    </div>
                </div>
            </div>
            <div class="mt">
                <h3>Bill To:</h3>
                <!-- <div class="">
                    <input type="text" class="input_box fs2" name="" placeholder="Customer name" readonly>
                </div> -->
                <div class="">
                    <input type="text" class="input_box fs2" name="" style="    width: 216px;" value='<?php echo $toEmail ?>' placeholder="Customer email address" readonly>
                </div>
            </div>
            <table>
                <tr class="title">
                    <td style="width: 50%; padding-left:15px;">
                        <h4>Description</h4>
                    </td>
                    <td width: 12%; text-align: right; padding-right:18px;>
                        <h4>Quantity</h4>
                    </td>
                    <td style="width: 18%;text-align: right;padding-right:18px;">
                        <h4>Price</h4>
                    </td>
                    <td style="width: 15%; text-align: center; padding-right:0px !important">
                        <h4>Amount</h>
                    </td>
                </tr>

                <tr style=" padding-left:15px; border-bottom: 2px solid #ddd;">
                    <td class="tableitem">
                        <div class="">
                            <input type="text" class="input_box fs2" name="" value='<?php echo $invoice[$k]->product ?>' placeholder="item" readonly>
                        </div>
                    </td>
                    <td class="tableitem">
                        <div class="">
                            <input type="text" class="input_box fs2" name="" value='<?php echo $invoice[$k]->quntity ?>' placeholder="1" readonly>
                        </div>
                    </td>
                    <td class="tableitem">
                        <div class="">
                            <input type="text" class="input_box fs2" name="" value='<?php echo $invoice[$k]->price  ?>' placeholder="0.0" readonly>
                        </div>
                    </td>
                    <td class="tableitem">
                        <p class="itemtext"><?php echo $invoice[$k]->price *1 ?></p>
                    </td>
                </tr>
                <!--
            <tr style=" padding-left:15px; border-bottom: 2px solid #ddd;">
            <td class="tableitem">
              <a><h4 class="add"> + Add another line item</h4></a>
            </td>
        </tr> -->
            </table>
            <div class="d_flex mt">
                <div class="col">
                    <textarea class="input_box" style="width: 80%; font-size:16px;" rows="5" cols="50" placeholder="Note to recipient" readonly><?php echo $invoice[$k]->note ?></textarea>
                </div>
                <div class=" col col2">
                    <div class="subtotal">
                        <label class="fs">Subtotal</label>
                        <h4 style="margin-left: 290px;"><?php echo $invoice[$k]->price ?></h4>
                    </div>
                    <hr>
                    <div style="margin-top:10px ;">
                        <label class="fs">Shipping</label>
                        <input type="text" style="float: right; text-align: right;" value='<?php echo $invoice[$k]->tax ?>' class="input_box fs2 " name=""
                            placeholder="$0.00" readonly>
                    </div>

                    <div class="total">
                        <label class="fs">Total</label>
                        <h4 style="margin-left: 300px;"><?php echo $invoice[$k]->price + $invoice[$k]->tax;  ?></h4>
                    </div>
                </div>
            </div>
        </section>
    </div>

</body>

</html>