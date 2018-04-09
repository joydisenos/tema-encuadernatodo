<div class="wrap">
    <h2><?php _e( 'Lista de Servicios', 'encuadernatodo' ); ?> <a href="<?php echo admin_url( 'admin.php?page=presupuesto&action=new' ); ?>" class="add-new-h2"><?php _e( 'Agregar', 'encuadernatodo' ); ?></a></h2>

    <form method="post">
        <input type="hidden" name="page" value="ttest_list_table">

        <?php
        $list_table = new encuadernatodo_lista_servicios();
        $list_table->prepare_items();
        $list_table->search_box( 'search', 'search_id' );
        $list_table->display();
        ?>
    </form>
</div>