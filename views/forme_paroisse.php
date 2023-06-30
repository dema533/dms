<div class="container-fluid bg-dark mt-4">   
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-8 col-10">
                <h3 class="slick-title">Trouver votre paroisse</h3>
                <p class="lead text-white mt-lg-3 mb-lg-5">Pour trouver votre paroisse, vous pouvez consulter la liste des paroisses ou saisir le nom de votre paroisse dans la zone de recherche.</p>
            </div>
            <form action="" method="post">
            <input type="text" name="search_box" class="form-control form-control-lg mb-2" placeholder="Votre Paroisse..." id="search_box" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" onkeyup="javascript:load_data(this.value)" onfocus="javascript:load_search_history()" />
                <button class="btn btn-primary" type="submit" name="btn_search"> Rechercher</button>
            </form>
        </div>
    </div>
</div>
<span id="search_result"></span>