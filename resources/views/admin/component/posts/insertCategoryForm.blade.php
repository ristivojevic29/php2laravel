<li class="list-group-item d-flex px-3">
    <form method="post">
        @csrf
        <div class="input-group">
            <input type="text" class="form-control" id="imeKategorije" name="imeKategorije" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button id="ubaciKategoriju" class="btn btn-white px-2" type="button">
                    <i class="material-icons">add</i>
                </button>
            </div>
        </div>
    </form>
</li>
