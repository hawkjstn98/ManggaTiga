<div class="container-fluid" style="margin-top:40.833px;">
    <div class="row" style="margin-bottom:40px;">
        <!-- Ini buat konten list item yang uda di card-->
        <div class="col-8" style="margin-top:20px;">
            <h3>Item in Cart</h3>
            <hr>
            <div id="fieldCartCard" class="container">
                
            </div>
        </div>
        <!-- -->
        <!-- ini buat field list harga & sum total -->
        <div class="col-4">
            <div class="card">
                <h4>Shopping Summary</h4>
                <hr>
                <div class="row">
                    <div class="col-8"><h5>Total Harga</h5></div>
                    <div class="col-4"><h5 id="sumItemPrice">Rp...</h5></div></div>
                <hr>
                <button class="btn btn-primary bg-success" onclick='<?php echo base_url('/Redirect/payment');?>' type="button">Beli</button>
            </div>
        </div>
    </div>
</div>

