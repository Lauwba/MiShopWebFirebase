<div class="card">
    <div class="card-body">
        <!--content here-->
        <center>
            <h4>Laporan Pedapatan Misop</h4> 
            <p>Periode <?php echo $this->Etc->tgl($start); ?> - <?php echo $this->Etc->tgl($end); ?></p>
        </center>
        <table class="table">
            <thead>
                <tr>
                    <th>Apps</th>
                    <th>Nominal</th>
                </tr>
            </thead>            
            <tbody>
                <tr>
                    <td>mi-Shop</td>
                    <td><span id="shop"></span></td>
                <tr>
                    <td>mi-Service</td>
                    <td><span id="service"></span></td>
                <tr>
                    <td>mi-Bike</td>
                    <td><span id="mibike"></span></td>
                <tr>
                    <td>mi-Car</td>
                    <td><span id="micar"></span></td>
                </tr>
                <tr>
                    <td>mi-Express</td>
                    <td><span id="miexpress"></span></td>
                </tr>
                <tr>
                    <td><strong>Total Pendapatan Mishop</strong></td>
                    <td><strong><span id="total"></span></strong></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<script>
//    $(document).ready(function () {
//        var shop_id = $("#shop").html();
//        alert(parseInt(shop_id));
//    });
</script>