<footer class="page-footer font-small bg-success pt-4">
    <div class="container-fluid text-center text-md-left">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-4">
                <h3 class="tulisanfooter">manggatiga</h3>
                <ul class="tulisanfooter">
                    <li>Mario</li>
                    <li>Baik</li>
                    <li>Hebat</li>
                    <li>Suci</li>
                </ul>
            </div>
            <div class="col-4">
                <h4 class="tulisanfooter">Social Media</h4>
                <ul class="tulisanfooter">
                    <li>PH</li>
                    <li>HH</li>
                    <li>Np</li>
                </ul>
            </div>
            <div class="col-3">
                <h4 class="tulisanfooter">Call Center</h4>
                <ul class="tulisanfooter">
                    <li>(123) 12345</li>
                    <li>(321) 54321</li>
                    <li>(111) 33333</li>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class="tulisanfooter">
        <?php if($this->session->userdata('user')=='ADMINISTRATORMWB'){
            echo '<button class="btn btn-primary" onclick="LoginAdmin()">CMS</button>';
            echo '<script>' ;
            echo "let bas='".base_url()."'\n";
            echo 'function LoginAdmin(){';
            echo 'window.location.href = bas+"cms/Admin"';
            echo '}';
            echo '</script>';
        } ?>
        <div class="footer-copyright text-center">manggatiga.com</div>
        <div class="footer-copyright text-center py-3">© <?php echo date("Y")?> Copyright PT. Cerdas Sekali</div>
    </div>
</footer>