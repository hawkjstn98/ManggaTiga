<header class="header">
    <nav id="navbarutama" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <!-- Logo -->
        <div class="col-3">
            <a class="navbar-brand" href="#">manggatiga.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="container">
            <!-- Search Bar -->
            <div class="col-5 wf">
                <form class="form-inline">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
            <div class="collapse navbar-collapse col-3" id="navbarSupportedContent">
                <button id="btnLogin" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Login</button>
                <div class="col-1"></div>
                <button id="btnRegister" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Register</button>
            </div>
        </div>
    </nav>
</header>

<script>
    $(document).ready(function(){
        $("#btnLogin").click(function(){
            $("#modalLoginForm").modal();
        });
        $("#btnRegister").click(function(){
            let a = "<?php echo base_url('index.php/Redirect/register');?>";
            window.location.href = a;
        });
    });
    
</script>
