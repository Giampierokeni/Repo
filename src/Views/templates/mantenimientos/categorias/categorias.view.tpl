<script>
    document.addEventListener("DOMContentLoaded", async ()=>{
        const categorias =  await fetchJson('Mantenimientos-Categorias-CategoriasJson');
        alert(JSON.stringify(categorias));
    });
</script>