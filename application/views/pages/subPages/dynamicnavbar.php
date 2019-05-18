<!-- Navbar Kategori -->
<style>
    .dropdown:hover>.dropdown-menu{
        display: block;
    }
    .dropdown>.dropdown-toggle:active{
        pointer-events: none;
    }
</style>

<nav id="navbarsekunder" style="margin-top:4.3%;" class="navbar navbar-expand-lg navbar-light bg-success static-top">
    <!-- Button DropDown -->
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle bg-success" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Kategori
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a id="btnNotebook" class="dropdown-item" value="notebook" href="<?php echo base_url("Redirect/category");?>">Notebook</a>
            <a id="btnLcd" class="dropdown-item" value="lcd" href="<?php echo base_url("Redirect/category");?>">LCD</a>
            <a id="btnCasing" class="dropdown-item" value="casing" href="<?php echo base_url("Redirect/category");?>">Casing</a>
            <a id="btnMotherboard" class="dropdown-item" value="motherboard" href="<?php echo base_url("Redirect/category");?>">Motherboard</a>
            <a id="btnPowerSup" class="dropdown-item" value="powersupply" href="<?php echo base_url("Redirect/category");?>">Power Supply</a>
            <a id="btnProcessor"class="dropdown-item" value="processor" href="<?php echo base_url("Redirect/category");?>">Processor</a>
            <a id="btnCooler" class="dropdown-item" value="cooler" href="<?php echo base_url("Redirect/category");?>">Cooler</a>
            <a id="btnRam" class="dropdown-item" value="ram" href="<?php echo base_url("Redirect/category");?>">RAM</a>
            <a id="btnVgaCard" class="dropdown-item" value="vga" href="<?php echo base_url("Redirect/category");?>">VGA Card</a>
            <a id="btnHdd" class="dropdown-item" value="hdd" href="<?php echo base_url("Redirect/category");?>">Harddisk</a>
            <a id="btnSSD" class="dropdown-item" value="ssd" href="<?php echo base_url("Redirect/category");?>">SSD</a>
            <a id="btnKeyboard" class="dropdown-item" value="keyboard" href="<?php echo base_url("Redirect/category");?>">Keyboard</a>
            <a id="btnMouse" class="dropdown-item" value="mouse" href="<?php echo base_url("Redirect/category");?>">Mouse</a>
        </div>
        <script>
            var btnclick = function(click){
                //alert(click.currentTarget.id);
                localStorage.setItem("category",$("#"+click.currentTarget.id).html());
            }
            $('.dropdown-item').on('click', btnclick);
        </script>
    </div>
</nav>