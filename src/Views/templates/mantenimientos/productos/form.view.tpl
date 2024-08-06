<section class="grid">
    <section class="row">
        <h2 class="col-12 col-m-6 offset-m-3 depth-1 p-4">{{modeDsc}}</h2>
    </section>
</section>
<section class="grid">
    <section class="row my-4">
    <form class="col-12 col-m-6 offset-m-3 depth-1" action="index.php?page=Mantenimientos-Productos-Producto&mode={{mode}}&id={{id}}" method="POST" >
        <input type="hidden" name="id" value="{{id}}">
        <input type="hidden" name="xsrftk" value="{{xsrftk}}">
        <input type="hidden" name="mode" value="{{mode}}">
        <div class="row my-4">
            <label class="col-4" for="prdprd">Código:</label>
            <input class="col-8" type="text" name="prdprd" id="prdprd" value="{{id}}" readonly>
        </div>
        <div class="row my-4">
            <label class="col-4" for="prddsc">Descripción:</label>
            <input class="col-8" type="text" name="name" id="prddsc" value="{{name}}" required {{isReadOnly}}>
            {{with errors}}
                {{if error_name}}
                    {{foreach error_name}}
                        <div class="col-12 error">{{this}}</div>
                    {{endfor error_name}}
                {{endif error_name}}
            {{endwith errors}}
        </div>
        <div class="row my-4">
            <label class="col-4" for="category">Categoría:</label>
            <select class="col-8" type="text" name="category" id="category" {{if isReadOnly}} readonly disabled {{endif isReadOnly}}>
                {{foreach categories}}
                    <option value="{{category_id}}" {{categorySelected}}>{{category_name}}</option>
                {{endfor categories}}
            </select>   
            {{with errors}}
                {{if error_category}}
                    {{foreach error_category}}
                        <div class="col-12 error">{{this}}</div>
                    {{endfor error_category}}
                {{endif error_category}}
            {{endwith errors}}
        </div>
        <div class="row my-4">
            <label class="col-4" for="prdprc">Precio:</label>
            <input class="col-8" type="number" name="price" id="prdprc" value="{{price}}" required {{isReadOnly}}>
            {{with errors}}
                {{if error_price}}
                    {{foreach error_price}}
                        <div class="col-12 error">{{this}}</div>
                    {{endfor error_price}}
                {{endif error_price}}
            {{endwith errors}}
        </div>
        <div class="row my-4">
            <label class="col-4" for="prdctd">Cantidad:</label>
            <input class="col-8" type="number" name="stock" id="prdctd" value="{{stock}}" required {{isReadOnly}}>
            {{with errors}}
                {{if error_stock}}
                    {{foreach error_stock}}
                        <div class="col-12 error">{{this}}</div>
                    {{endfor error_stock}}
                {{endif error_stock}}
            {{endwith errors}}
        </div>
        <div class="row my-4">
            <label class="col-4" for="prdest">Estado:</label>
            <select class="col-8" name="status" id="prdest" required {{if isReadOnly}} readonly disabled {{endif isReadOnly}}>
                <option value="ACT" {{prdestACT}}>Activo</option>
                <option value="INA" {{prdestINA}}>Inactivo</option>
            </select>
            {{with errors}}
                {{if error_status}}
                    {{foreach error_status}}
                        <div class="col-12 error">{{this}}</div>
                    {{endfor error_status}}
                {{endif error_status}}
            {{endwith errors}}
        </div>
        <div class="row flex-end">
            {{ifnot isDisplay}}
                <button type="submit" class="primary mx-2">
                    <i class="fa-solid fa-check"></i>&nbsp;
                    Guardar
                </button>
            {{endifnot isDisplay}}
            <button type="button" onclick="window.location='index.php?page=Mantenimientos-Productos-Productos'">
                <i class="fa-solid fa-xmark"></i>
                Cancelar
            </button>
        </div>
    </form>
    </section>
</section>