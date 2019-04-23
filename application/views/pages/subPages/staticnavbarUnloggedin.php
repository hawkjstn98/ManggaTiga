<header class="header">
    <nav id="navbarutama" class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
        <!-- Logo -->
        <div class="col-4">
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
            <div id="btnLogin" class="collapse navbar-collapse col-3">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">LogIn</button>
            </div>


        </div>
    </nav>
</header>

<script>
    $(document).ready(function(){
        $("#btnLogin").click(function(){
            $("#modalLoginForm").modal();
        });
    });
</script>
